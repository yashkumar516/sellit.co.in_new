<?php 
include 'includes/confile.php';
$id = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `homebanner` WHERE `id` = '$id' ");
if($delete)
{
    header('refresh:0;url=homebanner-list.php');
}
?>