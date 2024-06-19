<?php
class Leads
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function completeLead()
    {
        $lid = $this->lead_id;
        $result = mysqli_query($this->conn, "SELECT * FROM `enquiry` WHERE `id` = '$lid'");
        $uid = mysqli_fetch_assoc($result);
        
        $customerid = $uid["userid"];
        $genorderid = $uid["genorderid"];
        $amount = $this->extraamount;
        $extraAmount = $this->extraamount - $uid['offerprice'];
        
        $result = mysqli_query($this->conn, "SELECT * FROM `useraccount` WHERE `userid` = '$customerid' AND `enquiryid` = '$lid'");
        $accountdetail = mysqli_fetch_assoc($result);
        
        $accountno = $accountdetail["accountno"];
        $ifsccode = $accountdetail["ifsc"];
        
        $result = mysqli_query($this->conn, "SELECT * FROM `userrecord` WHERE `id` = '$customerid'");
        $userrecord = mysqli_fetch_assoc($result);
        
        $usermobileno = $userrecord["mobile"];
        $name = $userrecord["name"];
        
        // Generate unique code
        date_default_timezone_set("Asia/Calcutta");
        $code = $this->generateUniqueCode(16);
        $upi = $accountdetail["upi"];
        
        // Prepare request parameters
        if (!empty($upi)) {
            $reques_params = $this->prepareUpiRequestParams($upi, $amount);
        } else {
            $reques_params = $this->prepareImpsRequestParams($accountno, $ifsccode, $amount, $usermobileno);
        }
        
        $headers = $this->getHeaders();
        $encryptedRequest = $this->encryptRequest($reques_params, $code);
        
        $httpUrl = "https://apibankingone.icicibank.com/api/v1/composite-payment";
        $aresponse = $this->sendRequest($httpUrl, $encryptedRequest, $headers);
        
        $data = $this->handleResponse($aresponse, $upi, $lid, $customerid, $amount, $extraAmount, $usermobileno, $genorderid);
        
        return $data;
    } 
    
    private function generateUniqueCode($length)
    {
        $code = '';
        $last = -1;
        for ($i = 0; $i < $length; $i++) {
            do {
                $next_digit = mt_rand(0, 9);
            } while ($next_digit == $last);
            $last = $next_digit;
            $code .= $next_digit;
        }
        return $code;
    }
    
    private function prepareUpiRequestParams($upi, $amount)
    {
        return [
            "device-id" => "400438400438400438400438",
            "mobile" => "9999943343",
            "channel-code" => "MICICI",
            "profile-id" => "209147462",
            "seq-no" => date("YmdHis"),
            "account-provider" => "74",
            "use-default-acc" => "D",
            "payee-va" => $upi,
            "payer-va" => "sellit@icici",
            "amount" => $amount,
            "pre-approved" => "P",
            "default-debit" => "N",
            "default-credit" => "N",
            "txn-type" => "merchantToPersonPay",
            "remarks" => "none",
            "mcc" => "5969",
            "merchant-type" => "ENTITY",
        ];
    }
    
    private function prepareImpsRequestParams($accountno, $ifsccode, $amount, $usermobileno)
    {
        return [
            "localTxnDtTime" => date("YmdHis"),
            "beneAccNo" => $accountno,
            "beneIFSC" => $ifsccode,
            "amount" => $amount,
            "tranRefNo" => time(),
            "paymentRef" => "FTTransferP2A",
            "senderName" => "Sellit",
            "mobile" => $usermobileno,
            "retailerCode" => "rcode",
            "passCode" => "f2af31d8bf5947f1bf1192574bc2a115",
            "bcID" => "IBCCUD01001",
            "crpId" => "PRACHICIB1",
            "crpUsr" => "USER3",
            "aggrId" => "CUST0767",
        ];
    }
    
    private function getHeaders()
    {
        return [
            "cache-control: no-cache",
            "accept: application/json",
            "content-type: application/json",
            "apikey: XepAX6zW6qRSkm8G6JYoQxWweVOEbi4H",
            "x-priority:1000",
        ];
    }
    
    private function encryptRequest($requestParams, $sessionKey)
    {
        $requestData = json_encode($requestParams);
        $fp = fopen("keys/prod_public.txt", "r");
        $pub_key_string = fread($fp, 8192);
        openssl_get_publickey($pub_key_string);
        openssl_public_encrypt($sessionKey, $encryptedKey, $pub_key_string);
        
        $iv = $sessionKey;
        $encryptedData = openssl_encrypt($requestData, "aes-128-cbc", $sessionKey, OPENSSL_RAW_DATA, $iv);
        
        return [
            "requestId" => "req_" . time(),
            "encryptedKey" => base64_encode($encryptedKey),
            "iv" => base64_encode($iv),
            "encryptedData" => base64_encode($encryptedData),
            "oaepHashingAlgorithm" => "NONE",
            "service" => "",
            "clientInfo" => "",
            "optionalParam" => "",
        ];
    }
    
    private function sendRequest($url, $requestData, $headers)
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($requestData),
            CURLOPT_HTTPHEADER => $headers,
        ]);
        
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        
        if ($err) {
            throw new Exception("cURL Error #: " . $err);
        }
        
        return $response;
    }
    
    private function handleResponse($response, $upi, $lid, $customerid, $amount, $extraAmount, $usermobileno, $genorderid)
    {
        $fp = fopen("keys/prod_private.pem", "r");
        $priv_key = fread($fp, 8192);
        fclose($fp);
        $res = openssl_get_privatekey($priv_key, "");
        $data = json_decode($response);
        
        openssl_private_decrypt(base64_decode($data->encryptedKey), $key, $priv_key);
        $encData = openssl_decrypt(base64_decode($data->encryptedData), "aes-128-cbc", $key, OPENSSL_PKCS1_PADDING);
        $newsource = substr($encData, 16);
        
        $output = json_decode($newsource);
        $TransactionStatus = $output->success;
        
        if ($TransactionStatus == 1) {
            $ajant_obj = $this->conn->prepare(
                "UPDATE `enquiry` SET `status`= ?,`emino`= ?,`pic1`= ?,`pic2`= ?,`pic3`= ?,`pic4`= ?,`extraamount`= ?,`aadharfront`= ?,`aadharback`= ? WHERE `id`= ? AND `vendor_id`= ?"
            );
            $ajant_obj->bind_param(
                "sssssssssii",
                $this->status,
                $this->IMEI,
                $this->pic1,
                $this->pic2,
                $this->pic3,
                $this->pic4,
                $extraAmount,
                $this->aadharfront,
                $this->aadharback,
                $this->lead_id,
                $this->vendorid
            );
            
            if ($ajant_obj->execute()) {
                if (!empty($upi)) {
                    $this->logTransaction($lid, $customerid, $amount, "UPI", $TransactionStatus, $output);
                } else {
                    $this->logTransaction($lid, $customerid, $amount, "IMPS", $TransactionStatus, $output);
                }
                
                $this->sendSmsNotification($usermobileno, $genorderid);
                return "update successfully";
            } else {
                return "not update";
            }
        } else {
            $ajant_obj = $this->conn->prepare(
                "UPDATE `enquiry` SET `status`= ?,`emino`= ?,`pic1`= ?,`pic2`= ?,`pic3`= ?,`pic4`= ?,`extraamount`= ?,`aadharfront`= ?,`aadharback`= ? WHERE `id`= ? AND `vendor_id`= ?"
            );
            $ajant_obj->bind_param(
                "sssssssssii",
                $this->status,
                $this->IMEI,
                $this->pic1,
                $this->pic2,
                $this->pic3,
                $this->pic4,
                $extraAmount,
                $this->aadharfront,
                $this->aadharback,
                $this->lead_id,
                $this->vendorid
            );
            if ($ajant_obj->execute()) {
            
                $this->sendSmsNotification($usermobileno, $genorderid);
                return "update successfully";
            } else {
                return "not update";
            }
            // return "transaction failed";
        }
    } 
    
    private function logTransaction($lid, $customerid, $amount, $type, $TransactionStatus, $output)
    {
        if ($type == "UPI") {
            $query = "INSERT INTO `customertransactions`(`lead_id`, `userid`, `amount`, `type`, `success`, `response`, `message`, `BankRRN`, `UpiTranlogId`, `UserProfile`, `SeqNo`)
                      VALUES('$lid','$customerid','$amount','UPI','$TransactionStatus','{$output->response}','{$output->message}','{$output->BankRRN}','{$output->UpiTranlogId}','{$output->UserProfile}','{$output->SeqNo}')";
        } else {
            $query = "INSERT INTO `customertransactions`(`lead_id`, `userid`, `amount`, `type`, `success`, `response`, `BankRRN`, `TransRefNo`, `BeneName`, `ActCode`)
                      VALUES('$lid','$customerid','$amount','IMPS','$TransactionStatus','{$output->Response}','{$output->BankRRN}','{$output->TransRefNo}','{$output->BeneName}','{$output->ActCode}')";
        }
        mysqli_query($this->conn, $query);
    }
    
    private function sendSmsNotification($usermobileno, $genorderid)
    {
        $fields = [
            "language" => "english",
            "route" => "q",
            "numbers" => $usermobileno,
            "message" => "SellIt online payment receipt. https://sellit.co.in/receipt.php?eId=" . $genorderid,
        ];
        
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => [
                "authorization: Q6BoCfJIKi05yDOvm8aSgUGbYrLpER7NseA93cuFxWTXZVkq2h3h1n57sJNfZtRGkS8LyqI2VBrKPEYv",
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json",
            ],
        ]);
        curl_exec($ch);
        curl_close($ch);
    }
    
}

?>