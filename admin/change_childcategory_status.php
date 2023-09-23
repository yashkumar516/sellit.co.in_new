<?php include 'includes/confile.php' ?>
<?php
$id = $_REQUEST['id'];
$bid = $_REQUEST['bid'];
$query = mysqli_query($con,"SELECT * FROM `childcategory` WHERE `id` = '$id'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `childcategory` SET `status`='inactive' WHERE `id` = '$id'");
    header("refresh:0;url=series-list.php?id=$bid");

}
else
{
    mysqli_query($con,"UPDATE `childcategory` SET `status`='active' WHERE `id` = '$id'"); 
    header("refresh:0;url=series-list.php?id=$bid");   
}
?>