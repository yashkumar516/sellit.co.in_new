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

    if(!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['vendorid']) && !empty($_POST['ajentid']) && !empty($_POST['address'])){
        $user_obj->email = $_POST['email'];
        $user_obj->ajentid = $_POST['ajentid'];
        $ajant_dat = $user_obj->check_ajant1();
        if( $ajant_dat->num_rows>0){
            http_response_code(503);
            echo json_encode(array(
            "status" => "0",
            "message" => "email already exist please try with another"
          ));  
        }else{
        $user_obj->email = $_POST['email'];
        $user_obj->vendorid = $_POST['vendorid'];
        $user_obj->ajentid = $_POST['ajentid'];
        $user_obj->name = $_POST['name'];
        $user_obj->phone = $_POST['phone'];
        $user_obj->address = $_POST['address'];
        $ajant_dat = $user_obj->update_ajant();
        if(!empty($ajant_dat)){
        http_response_code(200);
        echo json_encode(array(
        "status" => "1",
        "message" => "agant update successfully"
        )); 
        }
      }
        
    }else{
    http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "please enter all fields of agent"
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