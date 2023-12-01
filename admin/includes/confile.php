<?php  
require dirname(__DIR__)."/../env.php";
// Use the constants in your script
$host = DB_HOST;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$database = DB_DATABASE; 
$con = mysqli_connect($host, $username, $password, $database); 
?>