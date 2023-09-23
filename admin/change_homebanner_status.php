<?php include 'includes/confile.php' ?>
<?php
$indeid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `homebanner` WHERE `id` = '$indeid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `homebanner` SET `status`='inactive' WHERE `id` = '$indeid'");
    header('refresh:0;url=homebanner-list.php');
}
else
{
    mysqli_query($con,"UPDATE `homebanner` SET `status`='active' WHERE `id` = '$indeid'"); 
    header('refresh:0;url=homebanner-list.php');   
}
?>