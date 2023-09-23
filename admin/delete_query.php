<?php 
include 'includes/confile.php';
$cutomerid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `query` WHERE `id` = '$cutomerid' ");
if($delete)
{
    header('refresh:0;url=query.php');
}
?>