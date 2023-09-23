<?php include 'includes/confile.php' ?>
<?php
$secid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `keyfeatures` WHERE `id` = '$secid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `keyfeatures` SET `status`='inactive' WHERE `id` = '$secid'");
    header('refresh:0;url=list-features.php');
}
else
{
    mysqli_query($con,"UPDATE `keyfeatures` SET `status`='active' WHERE `id` = '$secid'"); 
    header('refresh:0;url=list-features.php');   
}
?>