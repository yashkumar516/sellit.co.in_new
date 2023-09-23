<?php include 'includes/confile.php' ?>
<?php
$productid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$productid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `product` SET `status`='inactive' WHERE `id` = '$productid'");
    header('refresh:0;url=tabletlist.php');
}
else
{
    mysqli_query($con,"UPDATE `product` SET `status`='active' WHERE `id` = '$productid'"); 
    header('refresh:0;url=tabletlist.php');   
}
?>