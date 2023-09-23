<?php include 'includes/confile.php' ?>
<?php
$bid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `questions` WHERE `id` = '$bid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `questions` SET `status`='inactive' WHERE `id` = '$bid'");
    header('refresh:0;url=question-list.php');
}
else
{
    mysqli_query($con,"UPDATE `questions` SET `status`='active' WHERE `id` = '$bid'"); 
    header('refresh:0;url=question-list.php');   
}
?>