<?php include 'includes/confile.php' ?>
<?php
$secid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `product_detail4` WHERE `id` = '$secid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `product_detail4` SET `status`='inactive' WHERE `id` = '$secid'");
    header('refresh:0;url=list_sec4.php');
}
else
{
    mysqli_query($con,"UPDATE `product_detail4` SET `status`='active' WHERE `id` = '$secid'"); 
    header('refresh:0;url=list_sec4.php');   
}
?>