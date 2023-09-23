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

    if(!empty($_POST['vendorid']) && !empty($_POST['ajentid'])){
        $user_obj->vendorid = $_POST['vendorid'];
        $user_obj->ajentid = $_POST['ajentid'];
        $leadup = $user_obj->deleteajent();
        if(!empty($leadup)){
            http_response_code(200);
          echo json_encode(array(
            "status" => "1",
            "message" => "ajent delete successfully"
          ));  
        }else{
            http_response_code(200);
            echo json_encode(array(
             "status" => 0,
             "message" => "ajent not delete"
            )); 
        }  
    }else{
    http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "please enter the vendorid and lead_id"
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