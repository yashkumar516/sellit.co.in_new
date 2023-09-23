<?php
session_start();
ini_set("display_errors",1);
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: POST");
header("Content-type:application/json; charset=UTF-8");
include_once("../config/database.php");
include_once("../classes/paymentvendor.php");

$db = new  Database();
$connection = $db->connect();
$user_obj = new  Users($connection);

if($_SERVER['REQUEST_METHOD'] === "POST"){
 if(isset($_POST['vendor_id']) && isset($_POST['razorpayaccountid'])){
        $user_obj->razorpayaccountid = $_POST['razorpayaccountid'];
        $user_obj->vendor_id = $_POST['vendor_id'];
        $admin = $user_obj->admindaccount();
        if($admin->num_rows>0){
        while($arr = $admin->fetch_assoc()){
            
            $transaction[] = array(
                             'amount' => $arr['amount'],
                             'payment_type' => $arr['paymenttype'],
                             'transactiontype' => $arr['transactiontype'],
                             'created_at' => $arr['datetime']
                );
        }
         http_response_code(200);
         echo json_encode(array(
         "status" => "1",
         "vendor_transaction" => $transaction,
         
    ));     
        }else{
           http_response_code(200);
          echo json_encode(array(
        "status" => 1,
        "message" => "no record found"
    ));   
        }
 }else{
    http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "please paas the required crediantls"
    )); 
 }
}else{
    http_response_code(503);
    echo json_encode(array(
        "status" => 0,
        "message" => "method should be post"
    ));
 }
?>