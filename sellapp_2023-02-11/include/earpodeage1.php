
<?php
if(isset($_POST['query']))
{
    $speaker = $_POST['screenin'];
    $connectivity = $_POST['bodyin'];
    $switch = $_POST['callin'];
    $physicalissue = $_POST['warin']; 
    $warrenty = $_POST['warrenty']; 
    $condition = "";
}
else if(isset($_POST['earbudage']))
{
    $speaker = $_POST['screenin'];
    $connectivity = $_POST['bodyin'];
    $switch = $_POST['callin'];
    $physicalissue = $_POST['warin']; 
    $warrenty = $_POST['warrenty']; 
    $condition = $_POST['condition']; 
  
}
?>