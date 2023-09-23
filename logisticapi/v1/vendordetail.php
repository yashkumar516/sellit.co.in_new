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
        $admin = $user_obj->admindetail();
        if(!empty($admin)){
         http_response_code(200);
         echo json_encode(array(
         "status" => "1",
         "name" => $admin['name'],
         "partner_id" => "$admin[id]",
         "main_balance" => "$admin[mainwallet]",
         "commission_balance" => "$admin[commissionwallet]",
         "image" => "https://sellit.co.in/admin/img/vendors/".$admin['ownerphoto'],
         
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