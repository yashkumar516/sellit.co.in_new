<?php include 'includes/confile.php' ?>
<?php
$bid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `bundle_product` WHERE `id` = '$bid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `bundle_product` SET `status`='inactive' WHERE `id` = '$bid'");
    header('refresh:0;url=bundleproduct-list.php');
}
else
{
    mysqli_query($con,"UPDATE `bundle_product` SET `status`='active' WHERE `id` = '$bid'"); 
    header('refresh:0;url=bundleproduct-list.php');   
}
?>