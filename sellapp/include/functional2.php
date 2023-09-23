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
      // age start
      $age = $_POST['age'];
      $mobage = $_POST['mobage'];
  }
  else if(isset($_POST['questions2']))
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
      // age start
      $age = "";
      $mobage = "";
  }
  else if(isset($_POST['query']))
  {
    $devicedetail = $_POST['devicedetail'];
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
     // age start
     $age = "";
     $mobage = "";
  }
  else if(isset($_POST['screen']))
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
       // age start
       $age = "";
       $mobage = "";
  }
?>