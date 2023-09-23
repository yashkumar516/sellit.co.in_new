<?php include 'includes/confile.php' ?>
<?php
$productid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$productid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['best'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `product` SET `best`='inactive' WHERE `id` = '$productid'");
    header('refresh:0;url=earlist.php');
}
else
{
    mysqli_query($con,"UPDATE `product` SET `best`='active' WHERE `id` = '$productid'"); 
    header('refresh:0;url=earlist.php');   
}
?>