<?php
date_default_timezone_set("Asia/Calcutta"); 
$reques_params = [
  "localTxnDtTime"=>date('YmdHis'),
                "beneAccNo"=> "004601585225",
                "beneIFSC"=> "ICIC0000046",
                "amount"=>"287.00",
                "tranRefNo"=>time(),
                "paymentRef"=> "FTTransferP2A",
                "senderName"=>"Sellit",
                "mobile"=>"9999943343",
                "retailerCode"=> "rcode",
                "passCode"=> "f2af31d8bf5947f1bf1192574bc2a115",
                "bcID"=> "IBCCUD01001",
                "crpId"=>"PRACHICIB1",
                "crpUsr"=>"USER3",
                "aggrId"=> "CUST0767"
];
$apostData = json_encode($reques_params);
$sessionKey = 1234567890123456; 
echo "<=========request packet =========>";
print_r($apostData);
echo "</br>";
$fp= fopen("prod_public.txt","r");
$pub_key_string=fread($fp,8192);
//fclose($fp);
openssl_get_publickey($pub_key_string);
openssl_public_encrypt($sessionKey,$encryptedKey,$pub_key_string); // RSA

$iv = 1234567890123456; //str_repeat("\0", 16);

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
echo "<=========encrited packet =========>";
print_r($apostData);
$httpUrl = "https://apibankingone.icicibank.com/api/v1/composite-payment";

$headers = array(
      "cache-control: no-cache",
                "accept: application/json",
                "content-type: application/json",
                "apikey: XepAX6zW6qRSkm8G6JYoQxWweVOEbi4H",
                "x-priority:0100"
);
echo "<=========header packet =========>";
print_r($headers);
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
print_r("<<========httpcode=========>>");
print_r($httpcode);

if ($aerr) {
    
    echo "cURL Error #:" . $aerr;
} else {
    
    $fp= fopen("prod_private.pem","r");
    $priv_key=fread($fp,8192);
    fclose($fp);
    $res = openssl_get_privatekey($priv_key, "");
    $data = json_decode($aresponse);
    openssl_private_decrypt(base64_decode($data->encryptedKey), $key, $priv_key);
    $encData = openssl_decrypt(base64_decode($data->encryptedData),"aes-128-cbc",$key,OPENSSL_PKCS1_PADDING);
    $newsource = substr($encData, 16);

    $output = json_decode($newsource);
    print_r("<<========output=========>>");
    echo "<pre>";
    print_r($output);
}
