<?php 
include 'config.php';

function GENERATELOGS_API($DATA,$BLOCK,$flag=0) {
    $file_name = "/var/log/aakarist/addaddress.txt";
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
GENERATELOGS_API($_REQUEST,'request data',1);
if(isset($_POST['uid'])){
    $uid = mysqli_real_escape_string($con,$_POST['uid']);
    $enquid = mysqli_real_escape_string($con,$_POST['enquid']);
    $addressid = mysqli_real_escape_string($con,$_POST['addressid']);
    $day = mysqli_real_escape_string($con,$_POST['day']);
    $month = mysqli_real_escape_string($con,$_POST['month']);
    $year = mysqli_real_escape_string($con,$_POST['year']);
    $time = mysqli_real_escape_string($con,$_POST['time']);
    $soon = mysqli_real_escape_string($con,$_POST['soon']);
    $insertquery = mysqli_query($con,"INSERT INTO `address`(`uid`,`enquid`,`soon`,`addressid`,`day`,`day1`,`year`,`time`)
                                                   VALUES('$uid','$enquid','$soon','$addressid','$day','$month','$year','$time')");
    if($insertquery){
        $list = [
                'status' => 'success',
                'message' => 'address added successfully'
            ];
    }else{
          $list = [
                'status' => 'failed',
                'message' => 'query failed try again'
            ];
    }   
    echo json_encode($list);
}else{
        $list = [
                'status' => '0',
                'message' => 'Enter the values'
            ];
    echo json_encode($list);
}
