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

    if(!empty($_POST['vendorid']) && !empty($_POST['lead_id']) && !empty($_POST['ajent_id']) && !empty($_FILES['selfie'])){
        
        $user_obj->vendorid = $_POST['vendorid'];
        $user_obj->lead_id = $_POST['lead_id'];
        $user_obj->ajentid = $_POST['ajent_id'];
        $user_obj->selfie = rand(10,20).uniqid().str_replace(' ','_',$_FILES['selfie']['name']);
        $user_obj->selfietemp = $_FILES['selfie']['tmp_name'];
        $leadup = $user_obj->agentselfie();
        if(!empty($leadup)){
          move_uploaded_file($user_obj->selfietemp,"../../admin/img/mobileimages/".$user_obj->selfie);
          http_response_code(200);
          echo json_encode(array(
            "status" => "1",
            "message" => $leadup
          ));  
        }else{
            http_response_code(200);
            echo json_encode(array(
             "status" => 0,
             "message" => "lead not update"
            )); 
        }  
    }else{
    http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "please enter all the parameters"
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