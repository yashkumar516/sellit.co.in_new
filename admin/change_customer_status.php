<?php 
include 'includes/confile.php';
$cutomerid = $_REQUEST['id'];
$customerdelete = mysqli_query($con,"SELECT * FROM `user_detail` WHERE `id` = '$cutomerid' ");
$arcustomer = mysqli_fetch_assoc($customerdelete);
$status = $arcustomer['status'];
 if($status == 'active')
 {
     $updatequery = mysqli_query($con,"UPDATE `user_detail` SET `status` = 'inactive' WHERE `id` = '$cutomerid'");
     header('refresh:0;url=ecommerce-customers-list.php');
 }
 else
 {
    $updatequery = mysqli_query($con,"UPDATE `user_detail` SET `status` = 'active' WHERE `id` = '$cutomerid'");
    header('refresh:0;url=ecommerce-customers-list.php');   
 }
?>