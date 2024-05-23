<?php
Session_start();
include '../admin/includes/confile.php';
if(isset($_SESSION['user']))
{
    session_destroy();
    header('refresh:0; url=login.php');
}else{
    header('refresh:0; url=login.php');
}
?>