<?php

$call = "";
$screen = "";
$body = "";
$war ="";

$callin = "";
$screenin = "";
$bodyin = "";
$warin ="";
 
 

$_PAGE_DATA = isset($_SESSION['mobileAgePage']) && count($_SESSION['mobileAgePage']) >0? $_SESSION['mobileAgePage']:$_SESSION["currentData"];

// print_r($_SESSION["mobileAgePage"]);
// echo "<br/>----------";
// print_r($_PAGE_DATA);
if (isset($_PAGE_DATA['callin']) && isset($_PAGE_DATA['screenin']) && isset($_PAGE_DATA['bodyin']) && isset($_PAGE_DATA['warin'])) {
  // Session variables are set, so retrieve them
  $callin = $_PAGE_DATA['callin'];
  $screenin = $_PAGE_DATA['screenin'];
  $bodyin = $_PAGE_DATA['bodyin'];
  $warin = $_PAGE_DATA['warin'];
  $call = $_PAGE_DATA['call'];
  $screen = $_PAGE_DATA['screen'];
  $body = $_PAGE_DATA['body'];
  $war = $_PAGE_DATA['war'];
  $params = $_PAGE_DATA['params']; 
 
} 
 
// if (!isset($_SESSION['mobileAgePage'])) {
//   $redurl = "Location: product-query.php?" . $params;
  
//   // flush(); // Flush the buffer
//   ob_start();
//   // header($redurl);
//   exit; // Ensure that no further PHP code is executed after the redirection
//   return;
// }  s
$screencondition = isset($_PAGE_DATA['screencondition'])? $_PAGE_DATA['screencondition']:"";
$touch = isset($_PAGE_DATA['touch'])? $_PAGE_DATA['touch']:"";
$spot = isset($_PAGE_DATA['spot'])? $_PAGE_DATA['spot']:"";
$lines = isset($_PAGE_DATA['lines'])? $_PAGE_DATA['lines']:""; 
$physical = isset($_PAGE_DATA['physical'])? $_PAGE_DATA['physical']:""; 
$touchin = isset($_PAGE_DATA['touchin'])? $_PAGE_DATA['touchin']:"";
$spotin = isset($_PAGE_DATA['spotin'])? $_PAGE_DATA['spotin']:"";
$linesin = isset($_PAGE_DATA['linesin'])? $_PAGE_DATA['linesin']:""; 
$physicalin = isset($_PAGE_DATA['physicalin'])? $_PAGE_DATA['physicalin']:""; 
//   body start
$devicedetail = isset($_PAGE_DATA['devicedetail'])? $_PAGE_DATA['devicedetail']:""; 
$Scratches = isset($_PAGE_DATA['Scratches'])? $_PAGE_DATA['Scratches']:""; 
$dents = isset($_PAGE_DATA['dents'])? $_PAGE_DATA['dents']:""; 
$side = isset($_PAGE_DATA['side'])? $_PAGE_DATA['side']:""; 
$bent = isset($_PAGE_DATA['bent'])? $_PAGE_DATA['bent']:""; 
$Scratchesin = isset($_PAGE_DATA['Scratchesin'])? $_PAGE_DATA['Scratchesin']:""; 
$dentsin = isset($_PAGE_DATA['dentsin'])? $_PAGE_DATA['dentsin']:""; 
$sidein = isset($_PAGE_DATA['sidein'])? $_PAGE_DATA['sidein']:""; 
$bentin = isset($_PAGE_DATA['bentin'])? $_PAGE_DATA['bentin']:""; 
$overallcondition = isset($_PAGE_DATA['overallcondition'])? $_PAGE_DATA['overallcondition']:""; 
  
// age start
$age = isset($_PAGE_DATA['age'])? $_PAGE_DATA['age']:""; 
$agein = isset($_PAGE_DATA['agein'])? $_PAGE_DATA['agein']:""; 
$mobage = isset($_PAGE_DATA['mobage'])? $_PAGE_DATA['mobage']:""; 
 
unset($_SESSION["mobileAgePage"]['copydisplay']);
unset($_SESSION["mobileAgePage"]['functional']);
unset($_SESSION["mobileAgePage"]['frontcam']);
unset($_SESSION["mobileAgePage"]['backcam']);
unset($_SESSION["mobileAgePage"]['volume']);
unset($_SESSION["mobileAgePage"]['fingertouch']);
unset($_SESSION["mobileAgePage"]['speaker']);
unset($_SESSION["mobileAgePage"]['power']);
unset($_SESSION["mobileAgePage"]['charging']);
unset($_SESSION["mobileAgePage"]['face']);
unset($_SESSION["mobileAgePage"]['audio']);
unset($_SESSION["mobileAgePage"]['camglass']);
unset($_SESSION["mobileAgePage"]['wifi']);
unset($_SESSION["mobileAgePage"]['silent']);
unset($_SESSION["mobileAgePage"]['battry']);
unset($_SESSION["mobileAgePage"]['bluetooth']);
unset($_SESSION["mobileAgePage"]['vibrate']);
unset($_SESSION["mobileAgePage"]['micro']);

unset($_SESSION["mobileAgePage"]['copydisplayin']);
unset($_SESSION["mobileAgePage"]['functionalin']);
unset($_SESSION["mobileAgePage"]['frontcamin']);
unset($_SESSION["mobileAgePage"]['backcamin']);
unset($_SESSION["mobileAgePage"]['volumein']);
unset($_SESSION["mobileAgePage"]['fingertouchin']);
unset($_SESSION["mobileAgePage"]['speakerin']);
unset($_SESSION["mobileAgePage"]['powerin']);
unset($_SESSION["mobileAgePage"]['chargingin']);
unset($_SESSION["mobileAgePage"]['facein']);
unset($_SESSION["mobileAgePage"]['audioin']);
unset($_SESSION["mobileAgePage"]['camglassin']);
unset($_SESSION["mobileAgePage"]['wifiin']);
unset($_SESSION["mobileAgePage"]['silentin']);
unset($_SESSION["mobileAgePage"]['battryin']);
unset($_SESSION["mobileAgePage"]['bluetoothin']);
unset($_SESSION["mobileAgePage"]['vibratein']);
unset($_SESSION["mobileAgePage"]['microin']);


unset($_SESSION["currentData"]['copydisplay']);
unset($_SESSION["currentData"]['functional']);
unset($_SESSION["currentData"]['frontcam']);
unset($_SESSION["currentData"]['backcam']);
unset($_SESSION["currentData"]['volume']);
unset($_SESSION["currentData"]['fingertouch']);
unset($_SESSION["currentData"]['speaker']);
unset($_SESSION["currentData"]['power']);
unset($_SESSION["currentData"]['charging']);
unset($_SESSION["currentData"]['face']);
unset($_SESSION["currentData"]['audio']);
unset($_SESSION["currentData"]['camglass']);
unset($_SESSION["currentData"]['wifi']);
unset($_SESSION["currentData"]['silent']);
unset($_SESSION["currentData"]['battry']);
unset($_SESSION["currentData"]['bluetooth']);
unset($_SESSION["currentData"]['vibrate']);
unset($_SESSION["currentData"]['micro']);

unset($_SESSION["currentData"]['copydisplayin']);
unset($_SESSION["currentData"]['functionalin']);
unset($_SESSION["currentData"]['frontcamin']);
unset($_SESSION["currentData"]['backcamin']);
unset($_SESSION["currentData"]['volumein']);
unset($_SESSION["currentData"]['fingertouchin']);
unset($_SESSION["currentData"]['speakerin']);
unset($_SESSION["currentData"]['powerin']);
unset($_SESSION["currentData"]['chargingin']);
unset($_SESSION["currentData"]['facein']);
unset($_SESSION["currentData"]['audioin']);
unset($_SESSION["currentData"]['camglassin']);
unset($_SESSION["currentData"]['wifiin']);
unset($_SESSION["currentData"]['silentin']);
unset($_SESSION["currentData"]['battryin']);
unset($_SESSION["currentData"]['bluetoothin']);
unset($_SESSION["currentData"]['vibratein']);
unset($_SESSION["currentData"]['microin']);
unset($_SESSION["functionalPage"]);
$_SESSION["functionalPage"]= array();
// echo "<br/> mobileAgePage---";
// print_r($_SESSION["mobileAgePage"]);
// echo "<br/> currentData---";
// print_r($_SESSION["currentData"])
  //functional start  
  // $copydisplay = isset($_PAGE_DATA['copydisplay'])? $_PAGE_DATA['copydisplay']:""; 
  // $functional = isset($_PAGE_DATA['functional'])? $_PAGE_DATA['functional']:"";
  
  // $frontcam = isset($_PAGE_DATA['frontcam'])? $_PAGE_DATA['frontcam']:"";  
  // $backcam = isset($_PAGE_DATA['backcam'])? $_PAGE_DATA['backcam']:""; 
  // $volume = isset($_PAGE_DATA['volume'])? $_PAGE_DATA['volume']:""; 
  // $fingertouch = isset($_PAGE_DATA['fingertouch'])? $_PAGE_DATA['fingertouch']:""; 

  // $speaker = isset($_PAGE_DATA['speaker'])? $_PAGE_DATA['speaker']:""; 
  // $power = isset($_PAGE_DATA['power'])? $_PAGE_DATA['power']:""; 
  // $charging = isset($_PAGE_DATA['charging'])? $_PAGE_DATA['charging']:""; 
  // $face = isset($_PAGE_DATA['face'])? $_PAGE_DATA['face']:""; 

  // $audio = isset($_PAGE_DATA['audio'])? $_PAGE_DATA['audio']:""; 
  // $camglass = isset($_PAGE_DATA['camglass'])? $_PAGE_DATA['camglass']:""; 
  // $wifi = isset($_PAGE_DATA['wifi'])? $_PAGE_DATA['wifi']:""; 
  // $silent = isset($_PAGE_DATA['silent'])? $_PAGE_DATA['silent']:""; 
      
  // $battry = isset($_PAGE_DATA['battry'])? $_PAGE_DATA['battry']:""; 
  // $bluetooth = isset($_PAGE_DATA['bluetooth'])? $_PAGE_DATA['bluetooth']:""; 
  // $vibrate = isset($_PAGE_DATA['vibrate'])? $_PAGE_DATA['vibrate']:""; 
  // $micro = isset($_PAGE_DATA['micro'])? $_PAGE_DATA['micro']:""; 
       
  // $copydisplayin = isset($_PAGE_DATA['copydisplayin'])? $_PAGE_DATA['copydisplayin']:"";
  // $functionalin = isset($_PAGE_DATA['functionalin'])? $_PAGE_DATA['functionalin']:""; 
  // $frontcamin = isset($_PAGE_DATA['frontcamin'])? $_PAGE_DATA['frontcamin']:""; 
  // $backcamin = isset($_PAGE_DATA['backcamin'])? $_PAGE_DATA['backcamin']:""; 
  // $volumein = isset($_PAGE_DATA['volumein'])? $_PAGE_DATA['volumein']:""; 
  // $fingertouchin = isset($_PAGE_DATA['fingertouchin'])? $_PAGE_DATA['fingertouchin']:""; 

  // $speakerin = isset($_PAGE_DATA['speakerin'])? $_PAGE_DATA['speakerin']:""; 
  // $powerin = isset($_PAGE_DATA['powerin'])? $_PAGE_DATA['powerin']:""; 
  // $chargingin = isset($_PAGE_DATA['chargingin'])? $_PAGE_DATA['chargingin']:""; 
  // $facein = isset($_PAGE_DATA['facein'])? $_PAGE_DATA['facein']:""; 

  // $audioin = isset($_PAGE_DATA['audioin'])? $_PAGE_DATA['audioin']:""; 
  // $camglassin = isset($_PAGE_DATA['camglassin'])? $_PAGE_DATA['camglassin']:""; 
  // $wifiin = isset($_PAGE_DATA['wifiin'])? $_PAGE_DATA['wifiin']:""; 
  // $silentin = isset($_PAGE_DATA['silentin'])? $_PAGE_DATA['silentin']:""; 
      
  // $battryin = isset($_PAGE_DATA['battryin'])? $_PAGE_DATA['battryin']:""; 
  // $bluetoothin = isset($_PAGE_DATA['bluetoothin'])? $_PAGE_DATA['bluetoothin']:""; 
  // $vibratein = isset($_PAGE_DATA['vibratein'])? $_PAGE_DATA['vibratein']:""; 
  // $microin = isset($_PAGE_DATA['microin'])? $_PAGE_DATA['microin']:""; 
       


// $screencondition = isset($_SESSION['screencondition'])? $_SESSION['screencondition']:"";
// $touch = isset($_SESSION['touch'])? $_SESSION['touch']:"";
// $spot = isset($_SESSION['spot'])? $_SESSION['spot']:"";
// $lines = isset($_SESSION['lines'])? $_SESSION['lines']:""; 
// $physical = isset($_SESSION['physical'])? $_SESSION['physical']:""; 
// $touchin = isset($_SESSION['touchin'])? $_SESSION['touchin']:"";
// $spotin = isset($_SESSION['spotin'])? $_SESSION['spotin']:"";
// $linesin = isset($_SESSION['linesin'])? $_SESSION['linesin']:""; 
// $physicalin = isset($_SESSION['physicalin'])? $_SESSION['physicalin']:""; 
// //   body start
// $devicedetail = isset($_SESSION['devicedetail'])? $_SESSION['devicedetail']:""; 
// $Scratches = isset($_SESSION['Scratches'])? $_SESSION['Scratches']:""; 
// $dents = isset($_SESSION['dents'])? $_SESSION['dents']:""; 
// $side = isset($_SESSION['side'])? $_SESSION['side']:""; 
// $bent = isset($_SESSION['bent'])? $_SESSION['bent']:""; 
// $Scratchesin = isset($_SESSION['Scratchesin'])? $_SESSION['Scratchesin']:""; 
// $dentsin = isset($_SESSION['dentsin'])? $_SESSION['dentsin']:""; 
// $sidein = isset($_SESSION['sidein'])? $_SESSION['sidein']:""; 
// $bentin = isset($_SESSION['bentin'])? $_SESSION['bentin']:""; 
// $overallcondition = isset($_SESSION['overallcondition'])? $_SESSION['overallcondition']:""; 
  
// // age start
// $age = isset($_SESSION['age'])? $_SESSION['age']:""; 
// $agein = isset($_SESSION['agein'])? $_SESSION['agein']:""; 
// $mobage = isset($_SESSION['mobage'])? $_SESSION['mobage']:""; 
 

//   //functional start  
//   $copydisplay = isset($_SESSION['copydisplay'])? $_SESSION['copydisplay']:""; 
//   $functional = isset($_SESSION['functional'])? $_SESSION['functional']:"";
  
//   $frontcam = isset($_SESSION['frontcam'])? $_SESSION['frontcam']:"";  
//   $backcam = isset($_SESSION['backcam'])? $_SESSION['backcam']:""; 
//   $volume = isset($_SESSION['volume'])? $_SESSION['volume']:""; 
//   $fingertouch = isset($_SESSION['fingertouch'])? $_SESSION['fingertouch']:""; 

//   $speaker = isset($_SESSION['speaker'])? $_SESSION['speaker']:""; 
//   $power = isset($_SESSION['power'])? $_SESSION['power']:""; 
//   $charging = isset($_SESSION['charging'])? $_SESSION['charging']:""; 
//   $face = isset($_SESSION['face'])? $_SESSION['face']:""; 

//   $audio = isset($_SESSION['audio'])? $_SESSION['audio']:""; 
//   $camglass = isset($_SESSION['camglass'])? $_SESSION['camglass']:""; 
//   $wifi = isset($_SESSION['wifi'])? $_SESSION['wifi']:""; 
//   $silent = isset($_SESSION['silent'])? $_SESSION['silent']:""; 
      
//   $battry = isset($_SESSION['battry'])? $_SESSION['battry']:""; 
//   $bluetooth = isset($_SESSION['bluetooth'])? $_SESSION['bluetooth']:""; 
//   $vibrate = isset($_SESSION['vibrate'])? $_SESSION['vibrate']:""; 
//   $micro = isset($_SESSION['micro'])? $_SESSION['micro']:""; 
       
//   $copydisplayin = isset($_SESSION['copydisplayin'])? $_SESSION['copydisplayin']:"";
//   $functionalin = isset($_SESSION['functionalin'])? $_SESSION['functionalin']:""; 
//   $frontcamin = isset($_SESSION['frontcamin'])? $_SESSION['frontcamin']:""; 
//   $backcamin = isset($_SESSION['backcamin'])? $_SESSION['backcamin']:""; 
//   $volumein = isset($_SESSION['volumein'])? $_SESSION['volumein']:""; 
//   $fingertouchin = isset($_SESSION['fingertouchin'])? $_SESSION['fingertouchin']:""; 

//   $speakerin = isset($_SESSION['speakerin'])? $_SESSION['speakerin']:""; 
//   $powerin = isset($_SESSION['powerin'])? $_SESSION['powerin']:""; 
//   $chargingin = isset($_SESSION['chargingin'])? $_SESSION['chargingin']:""; 
//   $facein = isset($_SESSION['facein'])? $_SESSION['facein']:""; 

//   $audioin = isset($_SESSION['audioin'])? $_SESSION['audioin']:""; 
//   $camglassin = isset($_SESSION['camglassin'])? $_SESSION['camglassin']:""; 
//   $wifiin = isset($_SESSION['wifiin'])? $_SESSION['wifiin']:""; 
//   $silentin = isset($_SESSION['silentin'])? $_SESSION['silentin']:""; 
      
//   $battryin = isset($_SESSION['battryin'])? $_SESSION['battryin']:""; 
//   $bluetoothin = isset($_SESSION['bluetoothin'])? $_SESSION['bluetoothin']:""; 
//   $vibratein = isset($_SESSION['vibratein'])? $_SESSION['vibratein']:""; 
//   $microin = isset($_SESSION['microin'])? $_SESSION['microin']:""; 
       

// if(isset($_POST['questions']))
// {
//     $screen = $_POST['screenin'];
//     $body = $_POST['bodyin'];
//     $call = $_POST['callin'];
//     $war = $_POST['warin'];
//      //   screen start
//      $screencondition = $_POST['screencondition'];
//      $touch = $_POST['touch'];
//      $spot = $_POST['spot'];
//      $lines = $_POST['lines'];
//      $physical = $_POST['physical'];
//      //   body start
//     $devicedetail = $_POST['devicedetail'];
//     $Scratches = $_POST['Scratches'];
//     $dents = $_POST['dents'];
//     $side = $_POST['side'];
//     $bents = $_POST['bent'];
//     $overallcondition = $_POST['overallcondition'];
  
// }
// else if(isset($_POST['query']))
// {
//     $screen = $_POST['screenin'];
//     $body = $_POST['bodyin'];
//     $call = $_POST['callin'];
//     $war = $_POST['warin'];
//      //   screen start
//      $screencondition = "";
//      $touch = "";
//      $spot = "";
//      $lines = "";
//      $physical = "";
//      //   body start
//     $devicedetail = "";
//     $Scratches = "";
//     $dents = "";
//     $side = "";
//     $bents = "";
//     $overallcondition = "";
  
// }
//   if(isset($_POST['screen2']))
// {
//       $screen = $_POST['screenin'];
//       $body = $_POST['bodyin'];
//       $call = $_POST['callin'];
//       $war = $_POST['warin'];
//      //   screen start
//      $screencondition = $_POST['screencondition'];
//      $touch = $_POST['touch'];
//      $spot = $_POST['spot'];
//      $lines = $_POST['lines'];
//      $physical = $_POST['physical'];
//      //   body start
//     $devicedetail = "";
//     $Scratches = "";
//     $dents = "";
//     $side = "";
//     $bents = "";
//     $overallcondition = "";
  
// }
?>