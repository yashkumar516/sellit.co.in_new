<?php include 'includes/confile.php' ?>
<?php
$id = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `vendors` WHERE `id` = '$id'");
$arr = mysqli_fetch_assoc($query);
$checkmenustatus = $arr['status'];
if($checkmenustatus=='active')
{
    mysqli_query($con,"UPDATE `vendors` SET `status`='inactive' WHERE `id` = '$id'");
    header('refresh:0;url=vendorlist.php');
}
else
{
    mysqli_query($con,"UPDATE `vendors` SET `status`='active' WHERE `id` = '$id'"); 
    header('refresh:0;url=vendorlist.php');   
}
?>