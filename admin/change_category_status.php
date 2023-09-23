<?php include 'includes/confile.php' ?>
<?php
$categoryid = $_REQUEST['id'];
$query = mysqli_query($con,"SELECT * FROM `category` WHERE `id` = '$categoryid'");
$arr = mysqli_fetch_assoc($query);
$checkstatus = $arr['status'];
if($checkstatus=='active')
{
    mysqli_query($con,"UPDATE `category` SET `status`='inactive' WHERE `id` = '$categoryid'");
    // $fetchcname = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `category` WHERE `id`  ='$categoryid' "));
    // $cname = $fetchcname['category_name'];
    // mysqli_query($con,"UPDATE `product` SET `status` = 'inactive' WHERE `category_name`='$cname' ");
    header('refresh:0;url=ecommerce-category-list.php');

}
else
{
    mysqli_query($con,"UPDATE `category` SET `status`='active' WHERE `id` = '$categoryid'"); 
    header('refresh:0;url=ecommerce-category-list.php');   
}
?>