<?php include 'includes/confile.php' ?>
<?php
$indeid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `indegre_list` WHERE `id` = '$indeid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `indegre_list` SET `status`='inactive' WHERE `id` = '$indeid'");
    header('refresh:0;url=indegrediants_list.php');
}
else
{
    mysqli_query($con,"UPDATE `indegre_list` SET `status`='active' WHERE `id` = '$indeid'"); 
    header('refresh:0;url=indegrediants_list.php');   
}
?>