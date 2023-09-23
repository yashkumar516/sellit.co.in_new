<?php include 'includes/confile.php' ?>
<?php
$bid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `salecoupan` WHERE `id` = '$bid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `salecoupan` SET `status`='inactive' WHERE `id` = '$bid'");
    header('refresh:0;url=uploadcoupanbanner-list.php');
}
else
{
    mysqli_query($con,"UPDATE `salecoupan` SET `status`='active' WHERE `id` = '$bid'"); 
    header('refresh:0;url=uploadcoupanbanner-list.php');   
}
?>