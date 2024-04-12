<?php

$call = "";
$screen = "";
$body = "";
$war ="";

$callin = "";
$screenin = "";
$bodyin = "";
$warin ="";
 
 
print_r($_SESSION);
if (isset($_SESSION['callin']) && isset($_SESSION['screenin']) && isset($_SESSION['bodyin']) && isset($_SESSION['warin'])) {
  // Session variables are set, so retrieve them
  $callin = $_SESSION['callin'];
  $screenin = $_SESSION['screenin'];
  $bodyin = $_SESSION['bodyin'];
  $warin = $_SESSION['warin'];
  $call = $_SESSION['call'];
  $screen = $_SESSION['screen'];
  $body = $_SESSION['body'];
  $war = $_SESSION['war'];
 
} 


$screencondition = isset($_SESSION['screencondition'])? $_SESSION['screencondition']:"";
$touch = isset($_SESSION['touch'])? $_SESSION['touch']:"";
$spot = isset($_SESSION['spot'])? $_SESSION['spot']:"";
$lines = isset($_SESSION['lines'])? $_SESSION['lines']:""; 
$physical = isset($_SESSION['physical'])? $_SESSION['physical']:""; 
$touchin = isset($_SESSION['touchin'])? $_SESSION['touchin']:"";
$spotin = isset($_SESSION['spotin'])? $_SESSION['spotin']:"";
$linesin = isset($_SESSION['linesin'])? $_SESSION['linesin']:""; 
$physicalin = isset($_SESSION['physicalin'])? $_SESSION['physicalin']:""; 
//   body start
$devicedetail = isset($_SESSION['devicedetail'])? $_SESSION['devicedetail']:""; 
$Scratches = isset($_SESSION['Scratches'])? $_SESSION['Scratches']:""; 
$dents = isset($_SESSION['dents'])? $_SESSION['dents']:""; 
$side = isset($_SESSION['side'])? $_SESSION['side']:""; 
$bent = isset($_SESSION['bent'])? $_SESSION['bent']:""; 
$Scratchesin = isset($_SESSION['Scratchesin'])? $_SESSION['Scratchesin']:""; 
$dentsin = isset($_SESSION['dentsin'])? $_SESSION['dentsin']:""; 
$sidein = isset($_SESSION['sidein'])? $_SESSION['sidein']:""; 
$bentin = isset($_SESSION['bentin'])? $_SESSION['bentin']:""; 
$overallcondition = isset($_SESSION['overallcondition'])? $_SESSION['overallcondition']:""; 
  
// age start
$age = isset($_SESSION['age'])? $_SESSION['age']:""; 
$agein = isset($_SESSION['agein'])? $_SESSION['agein']:""; 
$mobage = isset($_SESSION['mobage'])? $_SESSION['mobage']:""; 
 

  //functional start  
  $copydisplay = isset($_SESSION['copydisplay'])? $_SESSION['copydisplay']:""; 
  $functional = isset($_SESSION['functional'])? $_SESSION['functional']:"";
  
  $frontcam = isset($_SESSION['frontcam'])? $_SESSION['frontcam']:"";  
  $backcam = isset($_SESSION['backcam'])? $_SESSION['backcam']:""; 
  $volume = isset($_SESSION['volume'])? $_SESSION['volume']:""; 
  $fingertouch = isset($_SESSION['fingertouch'])? $_SESSION['fingertouch']:""; 

  $speaker = isset($_SESSION['speaker'])? $_SESSION['speaker']:""; 
  $power = isset($_SESSION['power'])? $_SESSION['power']:""; 
  $charging = isset($_SESSION['charging'])? $_SESSION['charging']:""; 
  $face = isset($_SESSION['face'])? $_SESSION['face']:""; 

  $audio = isset($_SESSION['audio'])? $_SESSION['audio']:""; 
  $camglass = isset($_SESSION['camglass'])? $_SESSION['camglass']:""; 
  $wifi = isset($_SESSION['wifi'])? $_SESSION['wifi']:""; 
  $silent = isset($_SESSION['silent'])? $_SESSION['silent']:""; 
      
  $battery = isset($_SESSION['battery'])? $_SESSION['battery']:""; 
  $bluetooth = isset($_SESSION['bluetooth'])? $_SESSION['bluetooth']:""; 
  $vibrate = isset($_SESSION['vibrate'])? $_SESSION['vibrate']:""; 
  $micro = isset($_SESSION['micro'])? $_SESSION['micro']:""; 
       
  $copydisplayin = isset($_SESSION['copydisplayin'])? $_SESSION['copydisplayin']:"";
  $functionalin = isset($_SESSION['functionalin'])? $_SESSION['functionalin']:""; 
  $frontcamin = isset($_SESSION['frontcamin'])? $_SESSION['frontcamin']:""; 
  $backcamin = isset($_SESSION['backcamin'])? $_SESSION['backcamin']:""; 
  $volumein = isset($_SESSION['volumein'])? $_SESSION['volumein']:""; 
  $fingertouchin = isset($_SESSION['fingertouchin'])? $_SESSION['fingertouchin']:""; 

  $speakerin = isset($_SESSION['speakerin'])? $_SESSION['speakerin']:""; 
  $powerin = isset($_SESSION['powerin'])? $_SESSION['powerin']:""; 
  $chargingin = isset($_SESSION['chargingin'])? $_SESSION['chargingin']:""; 
  $facein = isset($_SESSION['facein'])? $_SESSION['facein']:""; 

  $audioin = isset($_SESSION['audioin'])? $_SESSION['audioin']:""; 
  $camglassin = isset($_SESSION['camglassin'])? $_SESSION['camglassin']:""; 
  $wifiin = isset($_SESSION['wifiin'])? $_SESSION['wifiin']:""; 
  $silentin = isset($_SESSION['silentin'])? $_SESSION['silentin']:""; 
      
  $batteryin = isset($_SESSION['batteryin'])? $_SESSION['batteryin']:""; 
  $bluetoothin = isset($_SESSION['bluetoothin'])? $_SESSION['bluetoothin']:""; 
  $vibratein = isset($_SESSION['vibratein'])? $_SESSION['vibratein']:""; 
  $microin = isset($_SESSION['microin'])? $_SESSION['microin']:""; 
       

  if(isset($_POST['questions']))
  {
    
    
    foreach ($_POST as $key => $value) {
      $_SESSION[$key] = $value;
    } 
// echo "-----11----questions--";
// print_r($_POST);
      $screenin = $_POST['screenin'];
      $bodyin = $_POST['bodyin'];
      $callin = $_POST['callin'];
      $warin = $_POST['warin'];
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