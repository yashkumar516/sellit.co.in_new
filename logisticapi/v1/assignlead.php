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
     
    if(!empty($_POST['vendorid']) && !empty($_POST['leadid']) && !empty($_POST['ajentid'])){ 
    $user_obj->vendorid = $_POST['vendorid'];
    $user_obj->leadid = $_POST['leadid'];
    $user_obj->ajentid = $_POST['ajentid'];
    $leads = $user_obj->assignlead();
    if(!empty($leads)){
        http_response_code(200);
        echo json_encode(array(
            "status" => "1",
            "message" => "leads asign succesfully",
            // JSON_FORCE_OBJECT
        ));

    }else{
        http_response_code(200);
        echo json_encode(array(
            "status" => 0,
            "message" => "no records found"
        ));
    }
    }else{
          http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "pLEASE pass the vendorid,leadid and ajentid"
    ));
    }

}else{
    http_response_code(503);
    echo json_encode(array(
        "status" => 0,
        "message" => "pLEASE SELECT POST DATA TYPE"
    ));
}


?>