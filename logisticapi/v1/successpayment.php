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
 if(isset($_POST['vendor_id']) && isset($_POST['paymenttype']) && isset($_POST['razorpay_payment_id']) && isset($_POST['razorpay_order_id']) && isset($_POST['razorpay_signature']) && isset($_POST['razorpayaccountid']) && isset($_POST['status']) && isset($_POST['amount'])){
        $user_obj->razorpay_payment_id = $_POST['razorpay_payment_id'];
        $user_obj->razorpay_order_id = $_POST['razorpay_order_id'];
        $user_obj->razorpay_signature = $_POST['razorpay_signature'];
        $user_obj->razorpayaccountid = $_POST['razorpayaccountid'];
        $user_obj->status = $_POST['status'];
        $user_obj->amount = $_POST['amount']/100;
        $user_obj->vendor_id = $_POST['vendor_id'];
        $user_obj->paymenttype = $_POST['paymenttype'];
        $transaction = $user_obj->update_transaction();
        if(!empty($transaction)){
         http_response_code(200);
         echo json_encode(array(
         "status" => "1",
         "message" => "payment updated succeffuly on this transaction"
    ));     
        }else{
           http_response_code(200);
          echo json_encode(array(
        "status" => 1,
        "message" => "not updated"
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