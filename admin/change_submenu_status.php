<?php include 'includes/confile.php' ?>
<?php
$submenuid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `submenu` WHERE `id` = '$submenuid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `submenu` SET `status`='inactive' WHERE `id` = '$submenuid'");
    header('refresh:0;url=submenu_list.php');
}
else
{
    mysqli_query($con,"UPDATE `submenu` SET `status`='active' WHERE `id` = '$submenuid'"); 
    header('refresh:0;url=submenu_list.php');   
}
?>