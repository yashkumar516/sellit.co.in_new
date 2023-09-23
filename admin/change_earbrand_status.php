<?php include 'includes/confile.php' ?>
<?php
$id = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `subcategory` WHERE `id` = '$id'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `subcategory` SET `status`='inactive' WHERE `id` = '$id'");
    header('refresh:0;url=earbrandlist.php');
}
else
{
    mysqli_query($con,"UPDATE `subcategory` SET `status`='active' WHERE `id` = '$id'"); 
    header('refresh:0;url=earbrandlist.php');   
}
?>