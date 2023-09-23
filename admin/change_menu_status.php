<?php include 'includes/confile.php' ?>
<?php
$menuid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `menu_mgt` WHERE `id` = '$menuid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `menu_mgt` SET `status`='inactive' WHERE `id` = '$menuid'");
    header('refresh:0;url=menu_list.php');
}
else
{
    mysqli_query($con,"UPDATE `menu_mgt` SET `status`='active' WHERE `id` = '$menuid'"); 
    header('refresh:0;url=menu_list.php');   
}
?>