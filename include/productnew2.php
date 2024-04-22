<?php
  // if(isset($_POST['query']))
  // {
  //     $screen = $_POST['screenin'];
  //     $body = $_POST['bodyin'];
  //     $call = $_POST['callin'];
  //     $war = $_POST['warin'];
  //     $devicedetail = $_POST['devicedetail'];
  // }

  $call = "";
  $screen = "";
  $body = "";
  $war ="";
  
  $callin = "";
  $screenin = "";
  $bodyin = "";
  $warin ="";
  //  productNewPage
   
$_PAGE_DATA = isset($_SESSION['productNewPage']) && count($_SESSION['productNewPage']) >0 ? $_SESSION['productNewPage']:$_SESSION["currentData"];
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
   
  } 
  
  
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
   
  
    //functional start  
    $copydisplay = isset($_PAGE_DATA['copydisplay'])? $_PAGE_DATA['copydisplay']:""; 
    $functional = isset($_PAGE_DATA['functional'])? $_PAGE_DATA['functional']:"";
    
    $frontcam = isset($_PAGE_DATA['frontcam'])? $_PAGE_DATA['frontcam']:"";  
    $backcam = isset($_PAGE_DATA['backcam'])? $_PAGE_DATA['backcam']:""; 
    $volume = isset($_PAGE_DATA['volume'])? $_PAGE_DATA['volume']:""; 
    $fingertouch = isset($_PAGE_DATA['fingertouch'])? $_PAGE_DATA['fingertouch']:""; 
  
    $speaker = isset($_PAGE_DATA['speaker'])? $_PAGE_DATA['speaker']:""; 
    $power = isset($_PAGE_DATA['power'])? $_PAGE_DATA['power']:""; 
    $charging = isset($_PAGE_DATA['charging'])? $_PAGE_DATA['charging']:""; 
    $face = isset($_PAGE_DATA['face'])? $_PAGE_DATA['face']:""; 
  
    $audio = isset($_PAGE_DATA['audio'])? $_PAGE_DATA['audio']:""; 
    $camglass = isset($_PAGE_DATA['camglass'])? $_PAGE_DATA['camglass']:""; 
    $wifi = isset($_PAGE_DATA['wifi'])? $_PAGE_DATA['wifi']:""; 
    $silent = isset($_PAGE_DATA['silent'])? $_PAGE_DATA['silent']:""; 
        
    $battry = isset($_PAGE_DATA['battry'])? $_PAGE_DATA['battry']:""; 
    $bluetooth = isset($_PAGE_DATA['bluetooth'])? $_PAGE_DATA['bluetooth']:""; 
    $vibrate = isset($_PAGE_DATA['vibrate'])? $_PAGE_DATA['vibrate']:""; 
    $micro = isset($_PAGE_DATA['micro'])? $_PAGE_DATA['micro']:""; 
         
    $copydisplayin = isset($_PAGE_DATA['copydisplayin'])? $_PAGE_DATA['copydisplayin']:"";
    $functionalin = isset($_PAGE_DATA['functionalin'])? $_PAGE_DATA['functionalin']:""; 
    $frontcamin = isset($_PAGE_DATA['frontcamin'])? $_PAGE_DATA['frontcamin']:""; 
    $backcamin = isset($_PAGE_DATA['backcamin'])? $_PAGE_DATA['backcamin']:""; 
    $volumein = isset($_PAGE_DATA['volumein'])? $_PAGE_DATA['volumein']:""; 
    $fingertouchin = isset($_PAGE_DATA['fingertouchin'])? $_PAGE_DATA['fingertouchin']:""; 
  
    $speakerin = isset($_PAGE_DATA['speakerin'])? $_PAGE_DATA['speakerin']:""; 
    $powerin = isset($_PAGE_DATA['powerin'])? $_PAGE_DATA['powerin']:""; 
    $chargingin = isset($_PAGE_DATA['chargingin'])? $_PAGE_DATA['chargingin']:""; 
    $facein = isset($_PAGE_DATA['facein'])? $_PAGE_DATA['facein']:""; 
  
    $audioin = isset($_PAGE_DATA['audioin'])? $_PAGE_DATA['audioin']:""; 
    $camglassin = isset($_PAGE_DATA['camglassin'])? $_PAGE_DATA['camglassin']:""; 
    $wifiin = isset($_PAGE_DATA['wifiin'])? $_PAGE_DATA['wifiin']:""; 
    $silentin = isset($_PAGE_DATA['silentin'])? $_PAGE_DATA['silentin']:""; 
        
    $battryin = isset($_PAGE_DATA['battryin'])? $_PAGE_DATA['battryin']:""; 
    $bluetoothin = isset($_PAGE_DATA['bluetoothin'])? $_PAGE_DATA['bluetoothin']:""; 
    $vibratein = isset($_PAGE_DATA['vibratein'])? $_PAGE_DATA['vibratein']:""; 
    $microin = isset($_PAGE_DATA['microin'])? $_PAGE_DATA['microin']:""; 
          
?>