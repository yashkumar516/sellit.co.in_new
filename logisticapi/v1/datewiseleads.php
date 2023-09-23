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
     
    if((!empty($_POST['vendorid']) || !empty($_POST['ajentid'])) && !empty($_POST['flag']) && !empty($_POST['date'])){ 
    $user_obj->status = $_POST['flag'];
    $time = $_POST['date'];
    $m = date("m"); // Month value
    $de = date("d"); //today's date
    $y = date("Y"); // Year value
    $oneday =  mktime(0,0,0,$m,($de+1),$y); 
    if($time == "today"){
       $date = date('d-m-y');
       $user_obj->newdate =  date('d',strtotime($date)); 
       $user_obj->year =  date('y',strtotime($date)); 
       $user_obj->day =  date("F",strtotime($date));
    }elseif($time == "tomorrow"){
       $newdate =  date('d-m-y',$oneday); 
       $user_obj->newdate =  date('d',strtotime($newdate)); 
       $user_obj->year =  date('y',strtotime($newdate)); 
       $user_obj->day =  date("F", strtotime($newdate));
    }
    
    if(!empty($_POST['vendorid'])){
         $user_obj->vendorid = $_POST['vendorid'];
         $leads = $user_obj->get_today_leads();
    }elseif(!empty($_POST['ajentid'])){
         $user_obj->ajentid = $_POST['ajentid'];
         $leads = $user_obj->get_todayajent_leads();
    }
             
    if($leads->num_rows>0){
        while($arr = $leads->fetch_assoc()){
                if($arr['offerprice'] >= 100){
                 $offerprice = $arr['offerprice'];
             }else{
                $offerprice = "sorry we can't purchase"; 
             }
                if(!empty($arr['ajentid'])){
                 $aj = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `ajents` WHERE `id` = $arr[ajentid] "));
                 $ajentname = $aj['ajentname'];
                 }else{
                  $ajentname = '';  
                 }
                //new code start
                $catid = $arr['catid'];
               if($catid == 1 && !empty($arr['varientid'])){
                 $aj = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `varient` WHERE `id` = $arr[varientid] "));
                 $varientname = $aj['varient'];
             }elseif($catid == 3 && !empty($arr['varientid'])){
                $aj = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `tabletsvarient` WHERE `vid` = $arr[varientid] "));
                 $varientname = $aj['varient'];
             }else{
               $varientname = '';  
             }
                // new code end
            $leadinfo[]=array(
              "lead_id" => $arr['enquid'],
              "vendorname" => $arr['name'],
              "ajentname" => $ajentname,
              "model_name" => $arr['model_name'],
              "varientname" => "$varientname", 
              "imageurl"=> "https://sellit.co.in/admin/img/".$arr['mimg'],
              "price" => $offerprice,
              "lead_pick_status" => $arr['soon'],
              "lead_pick_date" => $arr['day'],
              "lead_pick_time" => $arr['time'],
              "modify_date" =>  $arr['modify_date'],
              "city" => $arr['city'],
              "lead_status" =>  $arr['status'],
            );
        }

        http_response_code(200);
        echo json_encode(array(
            "status" => "1",
            "message" => "success",
            "leads_information" => $leadinfo,
            // JSON_FORCE_OBJECT
        ));

    }else{
     
   http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "no record found"
    ));
    
    }
    }else{
          http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "pLEASE pass the (vendorid or ajentid) and flag and date"
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