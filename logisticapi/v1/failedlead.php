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

    if(!empty($_POST['vendorid']) && !empty($_POST['lead_id']) && !empty($_POST['flag']) && !empty($_POST['reason']) && !empty($_POST['offerprice']) && !empty($_FILES['pic1']) && !empty($_FILES['pic2']) && !empty($_FILES['pic3']) && !empty($_FILES['pic4'])){
        if(!empty($_POST['customerprice'])){
        $customerprice = $_POST['customerprice'];   
        }else{
        $customerprice = 'no demand';  
        }
        $user_obj->vendorid = $_POST['vendorid'];
        $user_obj->lead_id = $_POST['lead_id'];
        if(isset($_POST['ajent_id'])){
        $user_obj->ajentid = $_POST['ajent_id'];
        }
        $user_obj->status = $_POST['flag'];
        $user_obj->reason = $_POST['reason'];
        $user_obj->offerprice = $_POST['offerprice'];
        $user_obj->pic1 = rand(10,20).uniqid().str_replace(' ','_',$_FILES['pic1']['name']);
        $user_obj->pic2 = rand(10,20).uniqid().str_replace(' ','_',$_FILES['pic2']['name']);
        $user_obj->pic3 = rand(10,20).uniqid().str_replace(' ','_',$_FILES['pic3']['name']);
        $user_obj->pic4 = rand(10,20).uniqid().str_replace(' ','_',$_FILES['pic4']['name']);
        $user_obj->pic1temp = $_FILES['pic1']['tmp_name'];
        $user_obj->pic2temp = $_FILES['pic2']['tmp_name'];
        $user_obj->pic3temp = $_FILES['pic3']['tmp_name'];
        $user_obj->pic4temp = $_FILES['pic4']['tmp_name'];
        $user_obj->customerprice = $customerprice;
        $leadup = $user_obj->leadtobecomplete();
        if(!empty($leadup)){
            
          move_uploaded_file($user_obj->pic1temp,"../../admin/img/mobileimages/".$user_obj->pic1);
          move_uploaded_file($user_obj->pic2temp,"../../admin/img/mobileimages/".$user_obj->pic2);
          move_uploaded_file($user_obj->pic3temp,"../../admin/img/mobileimages/".$user_obj->pic3);
          move_uploaded_file($user_obj->pic4temp,"../../admin/img/mobileimages/".$user_obj->pic4);
          http_response_code(200);
          echo json_encode(array(
            "status" => "1",
            "lead_status"=>$user_obj->status,
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