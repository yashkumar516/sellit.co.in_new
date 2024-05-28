<?php
  class Users{
      private $conn;

      public function  __construct($db){
          $this->conn = $db;
      }
        
        public function check_email(){
          $usr_obj = $this->conn->prepare("SELECT * FROM vendors where email = ? && password = ?");
          $usr_obj->bind_param("ss",$this->email,$this->password);
          if($usr_obj->execute()){
            $data = $usr_obj->get_result();
            return $data->fetch_assoc();
          }
          return array();
        }
        
         public function check_email1(){
          $usr_obj = $this->conn->prepare("SELECT * FROM ajents where email = ? && password = ?");
          $usr_obj->bind_param("ss",$this->email,$this->password);
          if($usr_obj->execute()){
            $data = $usr_obj->get_result();
            return $data->fetch_assoc();
          }
          return array();
        }

        public function get_all_leads(){
          $leadobj = $this->conn->prepare("SELECT *  FROM enquiry INNER JOIN vendors on  enquiry.vendor_id  = vendors.id
          INNER JOIN address on address.enquid = enquiry.id
          INNER  JOIN address1 on address1.id = address.addressid 
          where enquiry.vendor_id = ? && enquiry.status = ?");
          $leadobj->bind_param("ss",$this->vendorid,$this->status);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
         public function get_ajent_leads(){
          $leadobj = $this->conn->prepare("SELECT *  FROM enquiry INNER JOIN vendors on  enquiry.vendor_id  = vendors.id
          INNER JOIN address on address.enquid = enquiry.id
          INNER  JOIN address1 on address1.id = address.addressid 
          where vendor_id = ? && ajentid = ? && enquiry.status = ?");
          $leadobj->bind_param("sss",$this->vendorid,$this->ajentid,$this->status);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
        public function lead_description(){
        //$leadobj = $this->conn->prepare("SELECT *  FROM `enquiry` LEFT  JOIN `userrecord` on userrecord.id = enquiry.userid LEFT  JOIN `useraccount` on useraccount.enquiryid = enquiry.id  LEFT  JOIN `address` on address.enquid = enquiry.id LEFT  JOIN `address1` on address1.id = address.addressid  where  vendor_id = ? && enquiry.id = ?");
        //   $leadobj = $this->conn->prepare("SELECT *  FROM `enquiry` LEFT  JOIN `varient` on varient.id = enquiry.varientid LEFT  JOIN `userrecord` on userrecord.id = enquiry.userid LEFT  JOIN `useraccount` on useraccount.enquiryid = enquiry.id  LEFT  JOIN `address` on address.enquid = enquiry.id LEFT  JOIN `address1` on address1.id = address.addressid  where  vendor_id = ? && enquiry.id = ?");
          $leadobj = $this->conn->prepare("SELECT *  FROM `enquiry` LEFT  JOIN `userrecord` on userrecord.id = enquiry.userid LEFT  JOIN `useraccount` on useraccount.enquiryid = enquiry.id  LEFT  JOIN `address` on address.enquid = enquiry.id LEFT  JOIN `address1` on address1.id = address.addressid  where  vendor_id = ? && enquiry.id = ?");
          $leadobj->bind_param("ss",$this->vendorid,$this->lead_id);
          $leadobj->execute();
          return $leadobj->get_result();

        }
        
         public function leadupdate(){
          $lead_obj = $this->conn->prepare("update `enquiry` set `status` = ? where vendor_id = ? && id = ?");
          $lead_obj->bind_param("sss",$this->status,$this->vendorid,$this->lead_id);
          if($lead_obj->execute()){
            $selvendor = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM `vendors` WHERE `id` = '$this->vendorid' "));
            if($selvendor){
                $mainbalane = $selvendor['mainwallet'];
                $mainonhold = $selvendor['mainonhold'];
                $updatemainbalance = $mainbalane - $this->amount;
                $updatemainhold = $mainonhold + $this->amount;
                $updatevendor = mysqli_query($this->conn,"UPDATE `vendors` SET `mainwallet` = '$updatemainbalance',`mainonhold` = '$updatemainhold' WHERE `id` = '$this->vendorid'");
                if($updatevendor){
                   $data = "successfully"; 
                }else{
                   $data = ""; 
                }
            }else{
            $data = "";
            }
          }else{
            $data = "";
          }
          return $data;
        }
        
        public function check_ajant(){
          $ajant_obj = $this->conn->prepare("SELECT * FROM ajents where email = ? ");
          $ajant_obj->bind_param("s",$this->email);
          if($ajant_obj->execute()){
            $data = $ajant_obj->get_result();
            return $data;
          }
          return array();
        }
        
        public function check_ajant1(){
          $ajant_obj = $this->conn->prepare("SELECT * FROM ajents where email = ? AND id != ?");
          $ajant_obj->bind_param("ss",$this->email,$this->ajentid);
          if($ajant_obj->execute()){
            $data = $ajant_obj->get_result();
            return $data;
          }
          return array();
        }
        
         public function deleteajent(){
          $ajant_obj = $this->conn->prepare("DELETE FROM ajents where vendorid = ? AND id = ?");
          $ajant_obj->bind_param("ss",$this->vendorid,$this->ajentid);
          if($ajant_obj->execute()){
            $data = "delete";
          }else{
              $data = "";
          }
          return $data;
        }
        
         public function create_ajant(){
          $ajant_obj = $this->conn->prepare("INSERT INTO ajents(`vendorid`,`ajentname`,`email`,`password`,`phone`,`adhar`,`image`,`address`) VALUES(?,?,?,?,?,?,?,?)");
          $ajant_obj->bind_param("ssssssss",$this->vendorid,$this->name,$this->email,$this->password,$this->phone,$this->adhar,$this->image,$this->address);
          if($ajant_obj->execute()){
            $data = "success create";
          }else{
              $data = "";
          }
           return $data; 
        }
        
         public function get_all_ajents(){
          $leadobj = $this->conn->prepare("SELECT * FROM `ajents` where vendorid = ? && status = 'active'");
          $leadobj->bind_param("s",$this->vendorid);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
          public function assignlead(){
          $lead_obj = $this->conn->prepare("update `enquiry` set `ajentid` = ? where vendor_id = ? && id = ?");
          $lead_obj->bind_param("sss",$this->ajentid,$this->vendorid,$this->leadid);
          if($lead_obj->execute()){
           $data = "update successfuly";
          }else{
               $data = "";
          }
          return $data;
        }
        
         public function update_ajant(){
          $lead_obj = $this->conn->prepare("update `ajents` set `ajentname` = ?,`email` = ?,`phone` = ?,`address` = ? where id = ? && vendorid = ?");
          $lead_obj->bind_param("ssssss",$this->name,$this->email,$this->phone,$this->address,$this->ajentid,$this->vendorid);
          if($lead_obj->execute()){
           $data = "update successfuly";
          }else{
               $data = "";
          }
          return $data;
        }
        
        
        public function get_today_leads(){
        //   $leadobj = $this->conn->prepare("SELECT *  FROM enquiry INNER JOIN vendors on  enquiry.vendor_id  = vendors.id
        //   INNER JOIN address on address.enquid = enquiry.id
        //   INNER JOIN varient on varient.id = enquiry.varientid
        //   INNER  JOIN address1 on address1.id = address.addressid 
        //   where enquiry.vendor_id = ? && enquiry.status = ? && address.day = ? && address.day1 = ? && address.year = ?");
        $leadobj = $this->conn->prepare("SELECT *  FROM enquiry INNER JOIN vendors on  enquiry.vendor_id  = vendors.id
          INNER JOIN address on address.enquid = enquiry.id
          INNER  JOIN address1 on address1.id = address.addressid 
          where enquiry.vendor_id = ? && enquiry.status = ? && address.day = ? && address.day1 = ? && address.year = ?");
          $leadobj->bind_param("sssss",$this->vendorid,$this->status,$this->year,$this->day,$this->newdate);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
        public function get_todayajent_leads(){
          $leadobj = $this->conn->prepare("SELECT *  FROM enquiry INNER JOIN vendors on  enquiry.vendor_id  = vendors.id
          INNER JOIN address on address.enquid = enquiry.id
          INNER JOIN varient on varient.id = enquiry.varientid
          INNER  JOIN address1 on address1.id = address.addressid 
          where enquiry.ajentid = ? && enquiry.status = ? && address.day = ? && address.day1 = ? && address.year = ?");
          $leadobj->bind_param("sssss",$this->ajentid,$this->status,$this->year,$this->day,$this->newdate);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
        
         public function leadscheduled(){
         $lead_obj = $this->conn->prepare("update `address` set `soon` = ?,`time` = ?,`day` = ?,`day1` = ?,`year` = ? ,`reason` = ? where enquid = ? ");
          $lead_obj->bind_param("sssssss",$this->soon,$this->scheduletime,$this->date,$this->month,$this->year,$this->reason,$this->lead_id);
          if($lead_obj->execute()){
           $data = "update successfuly";
          }else{
               $data = "";
          }
          return $data;
        }
        
          public function leadcomplete(){
              $lid = $this->lead_id;
              $uid = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM `enquiry` WHERE `id` = '$lid' "));
              $customerid = $uid['userid'];
              $amount = $uid['offerprice'];
              $accountdetail = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM `useraccount` WHERE `userid` = '$customerid' && `enquiryid` = '$lid' "));
              $accountno = $accountdetail['accountno'];
              $ifsccode = $accountdetail['ifsc'];
              $userrecord = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM `userrecord` WHERE `id` = '$customerid'"));
              $usermobileno = $userrecord['mobile'];
              $name = $userrecord['name'];
              // $upiid = $accountdetail['upi'];
              // new code start
              date_default_timezone_set("Asia/Calcutta"); 
              Global $code;
              $len=16;
              $last=-1;
              $upi = $accountdetail['upi'];
              for ($i=0;$i<$len;$i++)
              {
                do
                  {
                   $next_digit=mt_rand(0,9);
                  }
                while ($next_digit == $last);
                  $last=$next_digit;
                  $code.=$next_digit;
                  }
                if(!empty($upi)){
                 $reques_params = [
                 "device-id"=> "400438400438400438400438",
                 "mobile"=> "9999943343",
                 "channel-code"=> "MICICI",
                 "profile-id"=> "209147462",
                 "seq-no"=> date('YmdHis'),
                 "account-provider"=> "74",
                 "use-default-acc"=> "D",
                 "payee-va"=>"$upi",
                 "payer-va"=> "sellit@icici",
                 "amount"=> "$amount",
                 "pre-approved"=> "P",
                 "default-debit"=> "N",
                 "default-credit"=> "N",
                 "txn-type"=> "merchantToPersonPay",
                 "remarks"=> "none",
                 "mcc"=> "5969",
                 "merchant-type"=> "ENTITY",
                 ];
                 
                $headers = array(
                "cache-control: no-cache",
                "accept: application/json",
                "content-type: application/json",
                "apikey: XepAX6zW6qRSkm8G6JYoQxWweVOEbi4H",
                "x-priority:1000"
                );
                
                }else{
                  $reques_params = [
                "localTxnDtTime"=>date('YmdHis'),
                "beneAccNo"=> "$accountno",
                "beneIFSC"=> "$ifsccode",
                "amount"=>"$amount",
                "tranRefNo"=>time(),
                "paymentRef"=> "FTTransferP2A",
                "senderName"=>"Sellit",
                "mobile"=>"$usermobileno",
                "retailerCode"=> "rcode",
                "passCode"=> "f2af31d8bf5947f1bf1192574bc2a115",
                "bcID"=> "IBCCUD01001",
                "crpId"=>"PRACHICIB1",
                "crpUsr"=>"USER3",
                "aggrId"=> "CUST0767"
                ];
                
                $headers = array(
                "cache-control: no-cache",
                "accept: application/json",
                "content-type: application/json",
                "apikey: XepAX6zW6qRSkm8G6JYoQxWweVOEbi4H",
                "x-priority:0100"
                );
            }
                
        //common part of apis 
         $apostData = json_encode($reques_params);
                $sessionKey = $code; 
                $fp= fopen("keys/prod_public.txt","r");
                $pub_key_string=fread($fp,8192);
                //fclose($fp);
                openssl_get_publickey($pub_key_string);
                openssl_public_encrypt($sessionKey,$encryptedKey,$pub_key_string); // RSA

                $iv = $code; //str_repeat("\0", 16);

                $encryptedData = openssl_encrypt($apostData, 'aes-128-cbc', $sessionKey, OPENSSL_RAW_DATA, $iv); // AES

                $request = [
                "requestId"=> "req_".time(),
                "encryptedKey"=> base64_encode($encryptedKey),
                "iv"=> base64_encode($iv),
                "encryptedData"=> base64_encode($encryptedData),
                "oaepHashingAlgorithm"=> "NONE",
                "service"=> "",
                "clientInfo"=> "",
                "optionalParam"=> ""
                ];

                $apostData = json_encode($request);

                $httpUrl = "https://apibankingone.icicibank.com/api/v1/composite-payment";

                $acurl = curl_init();
                curl_setopt_array($acurl, array(
                 CURLOPT_URL => $httpUrl,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_ENCODING => "",
                 CURLOPT_MAXREDIRS => 10,
                 CURLOPT_TIMEOUT => 300,
                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                 CURLOPT_CUSTOMREQUEST => "POST",
                 CURLOPT_POSTFIELDS => $apostData,
                 CURLOPT_HTTPHEADER => $headers,
                ));
 
                $aresponse = curl_exec($acurl);

                $aerr = curl_error($acurl);
                $httpcode = curl_getinfo($acurl, CURLINFO_HTTP_CODE);

                if ($aerr) {
    
                 echo "cURL Error #:" . $aerr;
                 } else {
                     
                 $fp= fopen("keys/prod_private.pem","r");
                 $priv_key=fread($fp,8192);
                 fclose($fp);
                 $res = openssl_get_privatekey($priv_key, "");
                 $data = json_decode($aresponse);
                 openssl_private_decrypt(base64_decode($data->encryptedKey), $key, $priv_key);
                 $encData = openssl_decrypt(base64_decode($data->encryptedData),"aes-128-cbc",$key,OPENSSL_PKCS1_PADDING);
                 $newsource = substr($encData, 16);

                 $output = json_decode($newsource);
                 $TransactionStatus = $output->success;
                 if(!empty($upi)){
                  $response = str_replace("'"," ",$output->response);
                  $message = str_replace("'"," ",$output->message);
                  $BankRRN = $output->BankRRN;
                  $UpiTranlogId = $output->UpiTranlogId;
                  $UserProfile = $output->UserProfile;
                  $SeqNo = $output->SeqNo;
                 }else{
                  $ActCode = $output->ActCode;
                  $response = str_replace("'"," ",$output->Response);
                  $BankRRN = $output->BankRRN;
                  $BeneName = str_replace("'"," ",$output->BeneName);
                  $TransRefNo = $output->TransRefNo;
                 }
            }
          //common part api end 
          //new code end  
          if($TransactionStatus == 1){     
          $ajant_obj = $this->conn->prepare("UPDATE `enquiry` set `status`= ?,`emino`= ?,`pic1`= ?,`pic2`= ?,`pic3`= ?,`pic4`= ?,`extraamount`= ?,`aadharfront`= ?,`aadharback`= ? WHERE `id`= ? && `vendor_id`= ? ");
          $ajant_obj->bind_param("sssssssssii",$this->status,$this->IMEI,$this->pic1,$this->pic2,$this->pic3,$this->pic4,$this->extraamount,$this->aadharfront,$this->aadharback,$this->lead_id,$this->vendorid);
          if($ajant_obj->execute()){
            //additional code start
            if(!empty($upi)){
                $query = mysqli_query($this->conn,"INSERT INTO `customertransactions`(`lead_id`,`userid`,`amount`,`type`,`success`,`response`,`message`,`BankRRN`,`UpiTranlogId`,`UserProfile`,`SeqNo`)
                         VALUES('$lid','$customerid','$amount','UPI','$TransactionStatus','$response','$message','$BankRRN','$UpiTranlogId','$UserProfile','$SeqNo')");
            }else{
               $query = mysqli_query($this->conn,"INSERT INTO `customertransactions`(`lead_id`,`userid`,`amount`,`type`,`success`,`response`,`BankRRN`,`TransRefNo`,`BeneName`,`ActCode`)
                         VALUES('$lid','$customerid','$amount','IMPS','$TransactionStatus','$response','$BankRRN','$TransRefNo','$BeneName','$ActCode')"); 
            }
            //additional code end
            if($query){
              $data = "update successfully";
            }else{
              $data = "update successfully but history of payment not saved";  
            }
          }else{
              $data = "not update";
          }
          }else{
              $data = "trasnaction failed";  
          }
           return $data;    
              
          }
          
          public function leadtobecomplete(){
          $ajant_obj = $this->conn->prepare("UPDATE `enquiry` set `status`= ?,`failreason`= ?,`offerprice`= ?,`pic1`= ?,`pic2`= ?,`pic3`= ?,`pic4`= ?,`customerprice`= ? WHERE `id`= ? && `vendor_id`= ? ");
          $ajant_obj->bind_param("ssssssssii",$this->status,$this->reason,$this->offerprice,$this->pic1,$this->pic2,$this->pic3,$this->pic4,$this->customerprice,$this->lead_id,$this->vendorid);
          if($ajant_obj->execute()){
            $data = "update successfully";
          }else{
              $data = "";
          }
           return $data;    
          }
        
        public function agentselfie(){
          $ajant_obj = $this->conn->prepare("UPDATE `enquiry` set `selfie`= ? WHERE `id`= ? && `vendor_id`= ? ");
          $ajant_obj->bind_param("sii",$this->selfie,$this->lead_id,$this->vendorid);
          if($ajant_obj->execute()){
            $data = "update successfully";
          }else{
              $data = "";
          }
           return $data; 
        }
 
      }
      
?>