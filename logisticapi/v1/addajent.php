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

    if(!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['vendorid']) && !empty($_FILES['adhar']) && !empty($_FILES['image']) && !empty($_POST['address'])){
        $user_obj->email = $_POST['email'];
        $ajant_dat = $user_obj->check_ajant();
        if( $ajant_dat->num_rows>0){
            http_response_code(503);
            echo json_encode(array(
            "status" => "0",
            "message" => "email already exist please try with another"
          ));  
        }else{
        $user_obj->email = $_POST['email'];
        $password = explode('@',$_POST['email']);
        $password = $password[0];
        $user_obj->password = $password;
        $user_obj->name = $_POST['name'];
        $user_obj->phone = $_POST['phone'];
        $user_obj->vendorid = $_POST['vendorid'];
        $user_obj->address = $_POST['address'];
        $user_obj->adhar = rand(10, 20).uniqid().str_replace(' ','_',$_FILES['adhar']['name']);
        $user_obj->image = rand(10, 20).uniqid().str_replace(' ','_',$_FILES['image']['name']);
        $user_obj->adhartemp = $_FILES['adhar']['tmp_name'];
        $user_obj->imagetemp = $_FILES['image']['tmp_name'];
        $adharsize = $_FILES['adhar']['size'];
        $imagesize = $_FILES['image']['size'];
        
        $ajant_dat = $user_obj->create_ajant();
        if(!empty($ajant_dat)){
        move_uploaded_file($user_obj->imagetemp,"../../admin/img/vendors/".$user_obj->image);
        move_uploaded_file($user_obj->adhartemp,"../../admin/img/vendors/".$user_obj->adhar);
        http_response_code(200);
        echo json_encode(array(
        "status" => "1",
        "message" => "agant created successfully"
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