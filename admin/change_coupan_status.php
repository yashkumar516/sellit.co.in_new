<?php include 'includes/confile.php' ?>
<?php
$coupanid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `coupan` WHERE `id` = '$coupanid'");
$arr = mysqli_fetch_assoc($query);
$checkmenustatus = $arr['status'];
if($checkmenustatus=='active')
{
    mysqli_query($con,"UPDATE `coupan` SET `status`='inactive' WHERE `id` = '$coupanid'");
    header('refresh:0;url=ecommerce-coupons-list.php');
}
else
{
    mysqli_query($con,"UPDATE `coupan` SET `status`='active' WHERE `id` = '$coupanid'"); 
    header('refresh:0;url=ecommerce-coupons-list.php');   
}
?>