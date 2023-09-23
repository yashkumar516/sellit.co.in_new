<?php
Session_start();
include 'admin/includes/confile.php';
if(isset($_SESSION['user']))
{
    unset($_SESSION['user']);
    header('refresh:0; url=index.php');
}else{
    header('refresh:0; url=index.php');
}
?>