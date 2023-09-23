<?php 
include 'includes/confile.php';
$reviewid = $_REQUEST['id'];
$reviewstatus= mysqli_query($con,"SELECT * FROM `product_reviews` WHERE `id` = '$reviewid' ");
$arriview = mysqli_fetch_assoc($reviewstatus);
$status = $arriview['status'];
 if($status == 'active')
 {
     $updatequery = mysqli_query($con,"UPDATE `product_reviews` SET `status` = 'inactive' WHERE `id` = '$reviewid'");
     header('refresh:0;url=product_reviews_list.php');
 }
 else
 {
    $updatequery = mysqli_query($con,"UPDATE `product_reviews` SET `status` = 'active' WHERE `id` = '$reviewid'");
    header('refresh:0;url=product_reviews_list.php');   
 }
?>