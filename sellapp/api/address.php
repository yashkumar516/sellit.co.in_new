<?php 
include 'config.php';
if(isset($_POST['uid'])){
    $uid = mysqli_real_escape_string($con,$_POST['uid']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $flatno = mysqli_real_escape_string($con,$_POST['flatno']);
    $landmark = mysqli_real_escape_string($con,$_POST['landmark']);
    $pincode = mysqli_real_escape_string($con,$_POST['pincode']);
    $city = mysqli_real_escape_string($con,$_POST['city']);
    $state = mysqli_real_escape_string($con,$_POST['state']);
    $addresstype = mysqli_real_escape_string($con,$_POST['addresstype']);
    $insertquery = mysqli_query($con,"INSERT INTO `address1`(`uid`,`location`,`flatno`,`landmark`,`pincode`,`city`,`state`,`addtype`)
                                                   VALUES('$uid','$address','$flatno','$landmark','$pincode','$city','$state','$addresstype')");
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
