<?php
session_start();
ini_set("display_errors",1);
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: POST");
header("Content-type:application/json; charset=UTF-8");
include_once("../config/database.php");
include_once("../classes/users.php");

$db = new  Database();

$connection = $db->connect();

$user_obj = new  Users($connection);

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $user_obj->email = $_POST['email'];
        $user_obj->password = $_POST['password'];
        $email_dat = $user_obj->check_email();
        if(!empty($email_dat)){
            $_SESSION['vendorid'] = $email_dat['id'];
            $vend = $_SESSION['vendorid'];
            http_response_code(200);
            echo json_encode(array(
            "status" => "1",
            "vendorid"=>"$vend",
            "role"=>$email_dat['role'],
            "vendoremail"=>$email_dat['email'],
            "vendormobile"=>$email_dat['mobileno'],
            'razorpayaccountid'=>$email_dat['razorpayaccountid'],
            "message" => "you logged in successfully"
          ));  
        }else{
         $email_dat = $user_obj->check_email1();
          if(!empty($email_dat)){
            $_SESSION['vendorid'] = $email_dat['id'];
            $vend = $_SESSION['vendorid'];
            http_response_code(200);
            echo json_encode(array(
            "status" => "1",
            "vendorid"=>$email_dat['vendorid'],
            "ajantid"=>"$vend",
            "role"=>$email_dat['role'],
            "vendoremail"=>$email_dat['email'],
            "vendormobile"=>$email_dat['phone'],
            "message" => "you logged in successfully"
          ));  
        }else{
        http_response_code(200);
        echo json_encode(array(
        "status" => 0,
        "message" => "please enter the right  crediantials"
    ));
        }
        }    
    }else{
    http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "please enter the crediantials"
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