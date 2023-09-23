<?php
if(isset($_POST['accountno']) && $_POST['ifscode']){

$accountno = $_POST['accountno'];
$ifsc = $_POST['ifscode'];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://kyc-api.aadhaarkyc.io/api/v1/bank-verification/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
	"id_number": "'.$accountno.'",
	"ifsc": "'.$ifsc.'"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJmcmVzaCI6ZmFsc2UsImlhdCI6MTY0NzUxMTQzNiwianRpIjoiMTkxOWY3NjktNWUzYy00Mjc4LWE5ODYtMjY3OGJiOTllZjZlIiwidHlwZSI6ImFjY2VzcyIsImlkZW50aXR5IjoiZGV2LnNlbGxpdEBhYWRoYWFyYXBpLmlvIiwibmJmIjoxNjQ3NTExNDM2LCJleHAiOjE5NjI4NzE0MzYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19fQ.BLOZEPaEW8ZSUGmnllQLoF8O0EEj6ZNkfaWNf_4_LKs'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$result = json_decode($response);

$messaege = $result->message_code;
$statuscode = $result->status_code;
$name = $result->data->full_name;
// echo $response;
echo $statuscode.'#'.$name;

}















