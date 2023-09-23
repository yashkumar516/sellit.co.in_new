
<?php
if(isset($_POST['questions']))
{
    $screen = $_POST['screenin'];
    $body = $_POST['bodyin'];
    $call = $_POST['callin'];
    $war = $_POST['warin'];
     //   screen start
     $screencondition = $_POST['screencondition'];
     $touch = $_POST['touch'];
     $spot = $_POST['spot'];
     $lines = $_POST['lines'];
     $physical = $_POST['physical'];
     //   body start
    $devicedetail = $_POST['devicedetail'];
    $Scratches = $_POST['Scratches'];
    $dents = $_POST['dents'];
    $side = $_POST['side'];
    $bents = $_POST['bent'];
    $overallcondition = $_POST['overallcondition'];
  
}
else if(isset($_POST['query']))
{
    $screen = $_POST['screenin'];
    $body = $_POST['bodyin'];
    $call = $_POST['callin'];
    $war = $_POST['warin'];
     //   screen start
     $screencondition = "";
     $touch = "";
     $spot = "";
     $lines = "";
     $physical = "";
     //   body start
    $devicedetail = "";
    $Scratches = "";
    $dents = "";
    $side = "";
    $bents = "";
    $overallcondition = "";
  
}
else if(isset($_POST['screen2']))
{
      $screen = $_POST['screenin'];
      $body = $_POST['bodyin'];
      $call = $_POST['callin'];
      $war = $_POST['warin'];
     //   screen start
     $screencondition = $_POST['screencondition'];
     $touch = $_POST['touch'];
     $spot = $_POST['spot'];
     $lines = $_POST['lines'];
     $physical = $_POST['physical'];
     //   body start
    $devicedetail = "";
    $Scratches = "";
    $dents = "";
    $side = "";
    $bents = "";
    $overallcondition = "";
  
}
?>