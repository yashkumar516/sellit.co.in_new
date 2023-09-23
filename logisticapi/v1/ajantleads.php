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
    $file_name = "/var/log/aakarist/agentlead.txt";
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
<<<<<<< HEAD

     GENERATELOGS_API($_POST,"[REQUEST PACKET]",1);
=======
    
    GENERATELOGS_API($_POST,"[REQUEST PACKET]",1);
>>>>>>> 3b04bb312b95978b7b2d98f8b90770cc4121cf2b

    if(!empty($_POST['vendorid']) && !empty($_POST['ajentid']) && !empty($_POST['flag'])){ 
    $user_obj->vendorid = $_POST['vendorid'];
    $user_obj->ajentid = $_POST['ajentid'];
    $user_obj->status = $_POST['flag'];
    $leads = $user_obj->get_ajent_leads();
    if($leads->num_rows>0){
        while($arr = $leads->fetch_assoc()){
            // pickup date time start
             
            if(!empty($arr['soon'])){
                $day = $arr['soon'];
                $month = $arr['day1'];
                $year = $arr['year'];
            }else{
                $day = $arr['day'];
                $month = $arr['day1'];
                $year = $arr['year'];
            };
             if($arr['offerprice'] >= 100){
                 $offerprice = $arr['offerprice'];
             }else{
                $offerprice = "sorry we can't purchase"; 
             }
             if(isset($_POST['ajentid'])){
                 $aj = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `ajents` WHERE `id` = $_POST[ajentid]"));
                 $ajentname = $aj['ajentname'];
             }else{
               $ajentname = '';  
             }
             
               //  extra
             if(!empty($arr['varientid'])){
                 $aj = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `varient` WHERE `id` = $arr[varientid] "));
                 $varientname = $aj['varient'];
             }else{
               $varientname = '';  
             }
            // picup date time end
            $leadinfo[]=array(
              "lead_id" => $arr['enquid'],
              "vendorname" => $arr['name'],
              "ajentname" => $ajentname,
              "model_name" => $arr['model_name'],
              "varientname" => $varientname,
              "catid" => "$arr[catid]",
              "imageurl"=> "https://sellit.co.in/admin/img/".$arr['mimg'],
              "price" => $offerprice,
              "lead_pick_status" => $arr['soon'],
              "lead_pick_date" =>  $day,
              "lead_pick_month" =>  $month,
               "lead_pick_year" =>  $year,
              "lead_pick_time" => $arr['time'],
              "modify_date" =>  $arr['modify_date'],
              "city" => $arr['city'],
              "lead_status" =>  $arr['status'],
            );
        }

        http_response_code(200);
        $response =  json_encode(array(
            "status" => "1",
            "message" => "success",
            "leads_information" => $leadinfo,
            // JSON_FORCE_OBJECT
        ));
        
        GENERATELOGS_API($response,"[responce]",1);
        echo $response;
        
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
        "message" => "pLEASE pass the vendor id and status"
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
