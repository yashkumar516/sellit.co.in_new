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

    http_response_code(200);
    echo json_encode(array(
    "status" => 0,
    "message" => "created"
    )); 
}