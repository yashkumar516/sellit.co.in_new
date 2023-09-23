<?php 
include 'config.php';
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $enquid = $_POST['enquid'];
    $addressid = $_POST['addressid'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $time = $_POST['time'];
    $soon = $_POST['soon'];
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
