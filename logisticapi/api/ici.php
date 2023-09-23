<?php
date_default_timezone_set("Asia/Calcutta"); 

$len=16;
$last=-1;
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

$reques_params = [
"tranRefNo" => "abc12345",
 "amount" => "1",
 "senderAcctNo" => "000451000301",
 "beneAccNo" => "000405002777",
 "beneName" => "Mehul",
 "beneIFSC" => "SBIN0003060",
 "narration1" =>  "Test",
 "crpId" =>  " PRACHICIB1",
 "crpUsr" =>  " USER3",
 "aggrId" =>  " AGGRID",
 "urn" =>  "759969775cff4dcc8b8c63402e645da3",
 "aggrName" =>  " AGGRNAME",
 "txnType" =>  "RGS",
 " WORKFLOW_REQD" =>  "N" 

];
$apostData = json_encode($reques_params);
// print_r("<<========apostData=========>>");
// echo "<pre>";
// print_r($apostData);
$sessionKey = $code; //hash('MD5', time(), true); //16 byte session key

$fp= fopen("prod_public.txt","r");
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

// print_r("<<========request=========>>");
// print_r($request);

$apostData = json_encode($request);
print_r("<<========apostData=========>>");
print_r($apostData);
$httpUrl = "https://apibankingonesandbox.icicibank.com/api/v1/composite-payment";
// print_r("<<========httpUrl=========>>");
// print_r($httpUrl);
$headers = array(
    "cache-control: no-cache",
    "accept: application/json",
    "content-type: application/json",
    "apikey: m9gS9ommoQBAwAJOQReKLhddos4r5NGY",
    "x-priority:0010"
);
// print_r("<<========headers=========>>");
// print_r($headers);

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
print_r("<<========aresponse=========>>");
print_r($aresponse);
$aerr = curl_error($acurl);
$httpcode = curl_getinfo($acurl, CURLINFO_HTTP_CODE);
print_r("<<========httpcode=========>>");
print_r($httpcode);


?>