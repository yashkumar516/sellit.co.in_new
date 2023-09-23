<?php include 'includes/confile.php' ?>
<?php
$pinid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `pincode` WHERE `id` = '$pinid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `pincode` SET `status`='inactive' WHERE `id` = '$pinid'");
    header('refresh:0;url=pin-list.php');
}
else
{
    mysqli_query($con,"UPDATE `pincode` SET `status`='active' WHERE `id` = '$pinid'"); 
    header('refresh:0;url=pin-list.php');   
}
?>