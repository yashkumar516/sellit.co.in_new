<?php   
if (isset($_SERVER['DB_PASSWORD']) && !empty($_SERVER['DB_PASSWORD'])) {
    $dbHost = $_SERVER['DB_HOST'];
    $dbUsername = $_SERVER['DB_USERNAME'];
    $dbPassword = $_SERVER['DB_PASSWORD'];
    $dbDatabase = $_SERVER['DB_DATABASE'];
    $publicUrl = $_SERVER['PUBLIC_URL'];
    $dirNameProject = $_SERVER['PROJECT_ROOT_PATH'];
    
} else {
    $dbHost = "localhost";
    $dbUsername = "sellit";
    $dbPassword = 'demo';
    $dbDatabase = "sellit";
    $publicUrl = "http://localhost/sellit/";
    $dirNameProject="";
}
 

$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase); 
?>