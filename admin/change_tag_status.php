<?php include 'includes/confile.php' ?>
<?php
$secid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `tags` WHERE `id` = '$secid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `tags` SET `status`='inactive' WHERE `id` = '$secid'");
    header('refresh:0;url=tag-list.php');
}
else
{
    mysqli_query($con,"UPDATE `tags` SET `status`='active' WHERE `id` = '$secid'"); 
    header('refresh:0;url=tag-list.php');   
}
?>