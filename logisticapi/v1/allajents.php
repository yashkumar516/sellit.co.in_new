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
     
    if(!empty($_POST['vendorid'])){ 
    $user_obj->vendorid = $_POST['vendorid'];
    $leads = $user_obj->get_all_ajents();
    if($leads->num_rows>0){
        while($arr = $leads->fetch_assoc()){
            $id = $arr['id'];
            $leadinfo[]=array(
              "id" => "$id",
              "ajentname" => $arr['ajentname'],
              "ajentimage" =>"https://sellit.co.in/admin/img/vendors/".$arr['image'],
              "email" => $arr['email'],
              "phone" => $arr['phone'],
              "address" => $arr['address'],
              "status" =>  $arr['status'],
            );
        }

        http_response_code(200);
        echo json_encode(array(
            "status" => "1",
            "ajent_information" => $leadinfo,
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
        "message" => "pLEASE pass the vendor id "
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