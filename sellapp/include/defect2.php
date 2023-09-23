<?php
if(isset($_POST['query']))
  {
      $screen = $_POST['screenin'];
      $body = $_POST['bodyin'];
      $call = $_POST['callin'];
      $war = $_POST['warin'];
      $devicedetail = $_POST['devicedetail'];
       // screen condition start
    $screencondition = "";
    $touch = "";
    $spot = "";
    $lines = "";
      $physical = "";
  }
 else if(isset($_POST['screen']))
  {
    $screen = $_POST['screenin'];
    $body = $_POST['bodyin'];
    $call = $_POST['callin'];
    $war = $_POST['warin'];
    $devicedetail = $_POST['devicedetail'];
    // screen condition start
    $screencondition = $_POST['screencondition'];
      $touch = $_POST['touch'];
      $spot = $_POST['spot'];
      $lines = $_POST['lines'];
      $physical = $_POST['physical'];
  }
  ?>