<?php include 'includes/confile.php' ?>
<?php
$categoryid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `category` WHERE `id` = '$categoryid'");
$arr = mysqli_fetch_assoc($query);
$checkmenustatus = $arr['menu_status'];
if($checkmenustatus=='active')
{
    mysqli_query($con,"UPDATE `category` SET `menu_status`='inactive' WHERE `id` = '$categoryid'");
    header('refresh:0;url=ecommerce-category-list.php');
}
else
{
    mysqli_query($con,"UPDATE `category` SET `menu_status`='active' WHERE `id` = '$categoryid'"); 
    header('refresh:0;url=ecommerce-category-list.php');   
}
?>