<?php
session_start();
ini_set("display_errors",1);
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: POST");
header("Content-type:application/json; charset=UTF-8");
include_once("../config/database.php");
include_once("../classes/paymentvendor.php");

// razorpay start
include_once("razorpay/Razorpay.php");
use Razorpay\Api\Api;
$keyid='rzp_live_4Gabs2fSUnGih5';
$secretkey='MD7nTKQ9hN5MspAK5cLwh7Jt';
$api=new Api($keyid,$secretkey);
// razorpay end

$db = new  Database();
$connection = $db->connect();
$user_obj = new  Users($connection);

if($_SERVER['REQUEST_METHOD'] === "POST"){
 if(isset($_POST['vendorid']) && isset($_POST['paymentype']) && isset($_POST['amount']) && isset($_POST['razorpayaccountid'])){
    $amount = $_POST['amount'];
    $vendordetail = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `vendors` WHERE `id` =$_POST[vendorid] "));
     if(!empty($vendordetail)){
      $order=$api->order->create(array(
      'amount'=>$amount,
      'payment_capture'=>1,
      'currency'=>'INR',
      ));
    // update code start
    if($order){
        $user_obj->vendorid = $_POST['vendorid'];
        $user_obj->orderid = $order['id'];
        $user_obj->razorpayaccountid = $_POST['razorpayaccountid'];
        $user_obj->paymenttype = $_POST['paymentype'];
        $user_obj->paymentstatus = $order['status'];
        $user_obj->created_at = $order['created_at'];
        $user_obj->amount_paid = $order['amount_paid'];
        $user_obj->amount_due = $order['amount_due']/100;
        $email_dat = $user_obj->transaction();
        
        if(!empty($email_dat)){
             http_response_code(200);
            echo json_encode(array(
                        "vendorid" => $_POST['vendorid'],
                        "amounttype" => $_POST['paymentype'],
                        "status"=>"1",
                        "id"=> $order['id'],
                        "entity"=> $order['entity'],
                        "amount"=> $amount,
                        "amount_paid"=> "$order[amount_paid]",
                        "amount_due"=> $amount,
                        "currency"=> $order['currency'],
                        "receipt"=> "$order[receipt]",
                        "status"=> $order['status'],
                        "attempts"=> "$order[attempts]",
                        "notes"=> [],
                        "created_at"=> "$order[created_at]",
                       ));
        }else{
                 http_response_code(200);
                 echo json_encode(array(
        "status" => 1,
        "message" => "order id no created"
    ));
        }
    }
    // update code end
   
     }else{
          http_response_code(200);
    echo json_encode(array(
        "status" => 1,
        "message" => "there is no vendor for this id"
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