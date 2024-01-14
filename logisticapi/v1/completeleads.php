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

function GENERATELOGS_API($DATA,$BLOCK,$flag=0) {
        $file_name = "/var/log/aakarist/completelead.txt";
        if(file_exists($file_name)) {
                $fp     =       fopen($file_name,"a+");
                fwrite($fp, date("Y-m-d H:i:s")."\t");
                if($flag==1){
                        fwrite($fp,"(".$BLOCK.")\n");
                        fwrite($fp,print_r($DATA,true));
                        fwrite($fp,"\n\n");
                }
                else{
                        fwrite($fp,"(".$BLOCK.")=====".$DATA."\n");
                }
                fclose($fp);
        }
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
GENERATELOGS_API($_POST,"[request packet]",1);
    if(!empty($_POST['vendorid']) && !empty($_POST['lead_id']) && !empty($_POST['flag']) && !empty($_POST['IMEI']) && !empty($_FILES['pic1']) && !empty($_FILES['pic2']) && !empty($_FILES['pic3']) && !empty($_FILES['pic4'])){
        if(!empty($_POST['extraamount'])){
        $extraamount = $_POST['extraamount'];   
        }else{
        $extraamount = 0;  
        }
        $user_obj->vendorid = $_POST['vendorid'];
        $user_obj->lead_id = $_POST['lead_id'];
        $leid = $_POST['lead_id'];
        $venid = $_POST['vendorid'];
        if(isset($_POST['ajent_id'])){
        $user_obj->ajentid = $_POST['ajent_id'];
        }
        $user_obj->status = $_POST['flag'];
        $user_obj->IMEI = $_POST['IMEI'];
        $user_obj->pic1 = rand(10,20).uniqid().str_replace(' ','_',$_FILES['pic1']['name']);
        $user_obj->pic2 = rand(10,20).uniqid().str_replace(' ','_',$_FILES['pic2']['name']);
        $user_obj->pic3 = rand(10,20).uniqid().str_replace(' ','_',$_FILES['pic3']['name']);
        $user_obj->pic4 = rand(10,20).uniqid().str_replace(' ','_',$_FILES['pic4']['name']);
        $user_obj->aadharfront = rand(10,20).uniqid().str_replace(' ','_',$_FILES['aadharfront']['name']);
        $user_obj->aadharback = rand(10,20).uniqid().str_replace(' ','_',$_FILES['aadharback']['name']);
        $user_obj->pic1temp = $_FILES['pic1']['tmp_name'];
        $user_obj->pic2temp = $_FILES['pic2']['tmp_name'];
        $user_obj->pic3temp = $_FILES['pic3']['tmp_name'];
        $user_obj->pic4temp = $_FILES['pic4']['tmp_name'];
        $user_obj->aadharfronttemp = $_FILES['aadharfront']['tmp_name'];
        $user_obj->aadharbacktemp = $_FILES['aadharback']['tmp_name'];
        $user_obj->extraamount = $extraamount;
        $leadup = $user_obj->leadcomplete();
        if(!empty($leadup) && $leadup == "update successfully"){
            
          move_uploaded_file($user_obj->pic1temp,"../../admin/img/mobileimages/".$user_obj->pic1);
          move_uploaded_file($user_obj->pic2temp,"../../admin/img/mobileimages/".$user_obj->pic2);
          move_uploaded_file($user_obj->pic3temp,"../../admin/img/mobileimages/".$user_obj->pic3);
          move_uploaded_file($user_obj->pic4temp,"../../admin/img/mobileimages/".$user_obj->pic4);
          move_uploaded_file($user_obj->aadharfronttemp,"../../admin/img/mobileimages/".$user_obj->aadharfront);
          move_uploaded_file($user_obj->aadharbacktemp,"../../admin/img/mobileimages/".$user_obj->aadharback);
          
          $addid = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `address` WHERE `enquid` = '$leid' "));
          $addressid = $addid['addressid'];
          $customeraddress = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `address1` WHERE `id` = '$addressid' "));
          $custadd = $customeraddress['flatno'].' '.$customeraddress['landmark'].' '.$customeraddress['city'].' '.$customeraddress['state'];
          $vendoraddress = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `vendors` WHERE `id` = '$venid' "));
          $vendadd = $vendoraddress['presentadd'].' '.$vendoraddress['city'];
          http_response_code(200);
          $result = json_encode(array(
            "status" => "1",
            "lead_status"=>$user_obj->status,
            "message" => $leadup,
            "customeraddress" =>"$custadd",
            "vendoraddress" => "$vendadd"
          ));
          GENERATELOGS_API($result,"[complete lead response]",1);
          echo $result;
        }else{
            http_response_code(200);
            echo json_encode(array(
             "status" => 0,
             "message" => "$leadup"
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