<?php  
require dirname(__DIR__)."/../env.php";
// Use the constants in your script

$dbHost = $_SERVER['DB_HOST'];
$dbUsername = $_SERVER['DB_USERNAME'];
$dbPassword = $_SERVER['DB_PASSWORD'];
$dbDatabase = $_SERVER['DB_DATABASE'];

$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase); 
?>