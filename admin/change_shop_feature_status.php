<?php include 'includes/confile.php' ?>
<?php
$fid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `shop_feature` WHERE `id` = '$fid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `shop_feature` SET `status`='inactive' WHERE `id` = '$fid'");
    header('refresh:0;url=shop-feature-list.php');
}
else
{
    mysqli_query($con,"UPDATE `shop_feature` SET `status`='active' WHERE `id` = '$fid'"); 
    header('refresh:0;url=shop-feature-list.php');   
}
?>