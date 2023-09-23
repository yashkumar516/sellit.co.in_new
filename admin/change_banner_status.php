<?php include 'includes/confile.php' ?>
<?php
$bannerid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `banner` WHERE `id` = '$bannerid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `banner` SET `status`='inactive' WHERE `id` = '$bannerid'");
    header('refresh:0;url=banner-list.php');
}
else
{
    mysqli_query($con,"UPDATE `banner` SET `status`='active' WHERE `id` = '$bannerid'"); 
    header('refresh:0;url=banner-list.php');   
}
?>