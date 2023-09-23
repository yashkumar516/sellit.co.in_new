<?php include 'includes/confile.php' ?>
<?php
$ageid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `agegroup` WHERE `id` = '$ageid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `agegroup` SET `status`='inactive' WHERE `id` = '$ageid'");
    header('refresh:0;url=age-group-list.php');
}
else
{
    mysqli_query($con,"UPDATE `agegroup` SET `status`='active' WHERE `id` = '$ageid'"); 
    header('refresh:0;url=age-group-list.php');   
}
?>