<?php 
include 'includes/confile.php';
$reviewid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `product_reviews` WHERE `id` = '$reviewid' ");
if($delete)
{
    header('refresh:0;url=product_reviews_list.php');
}
?>