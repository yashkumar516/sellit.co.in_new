<?php 
include 'config.php';
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $address = $_POST['address'];
    $flatno = $_POST['flatno'];
    $landmark = $_POST['landmark'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $addresstype = $_POST['addresstype'];
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
