<?php   
if (isset($_SERVER['DB_PASSWORD']) && !empty($_SERVER['DB_PASSWORD'])) {
    $dbHost = $_SERVER['DB_HOST'];
    $dbUsername = $_SERVER['DB_USERNAME'];
    $dbPassword = $_SERVER['DB_PASSWORD'];
    $dbDatabase = $_SERVER['DB_DATABASE'];
} else {
    $dbHost = "localhost";
    $dbUsername = "sellit";
    $dbPassword = 'demo';
    $dbDatabase = "sellit";
}

$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase); 
?>