<?php
function GENERATELOGS_API($DATA, $BLOCK, $flag = 0)
{
  $file_name = "/var/log/aakarist/mobilecalculation";
  if (file_exists($file_name)) {
    $fp  =  fopen($file_name, "a+");
    fwrite($fp, date("Y-m-d H:i:s") . "\t");
    if ($flag == 1) {
      fwrite($fp, "(" . $BLOCK . ")\n");
      fwrite($fp, print_r($DATA, true));
      fwrite($fp, "\n\n");
    } else {
      fwrite($fp, "(" . $BLOCK . ")=====" . $DATA . "\n");
    }
    fclose($fp);
  }
}


if (isset($_REQUEST['vid']) && isset($_REQUEST['bid']) && isset($_REQUEST['mid'])) {
  $vid = trim($_REQUEST['vid']);
  $bid = $_REQUEST['bid'];
  $mid = $_REQUEST['mid'];
  $wage = 0;
  $formwar = 0;
  $touch = 0;
  $sspot = 0;
  $slines = 0;
  $sphysial = 0;
  $bbent = 0;
  $bdents = 0;
  $bside = 0;
  $ssscrathes = 0;
  $warrenty = 0;
  $screendeduction = 0;

  //    GENERATELOGS_API($_REQUEST, "REQUEST PACKET", 1);

  $selectupto = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `varient` WHERE `status` = 'active' AND `id` = '$vid' "));
  $uptovalue = $selectupto['uptovalue'];
  $selectnodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `status` = 'active' AND `id` = '$mid' "));
  $modelimg = $selectnodel['product_image'];
  $mobilename = $selectnodel['product_name'];
  $catid = $selectnodel['categoryid'];
  // brand questions start
  
include_once "./classes/checkModelValue.php";
$modelManager = new CheckModelValue($con);
$selectbrand = $modelManager->getProductBrandValue($bid, $mid);
        
  // $selectbrand = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `id` = '$bid' "));

  //    GENERATELOGS_API($selectbrand, "brand questions value", 1);

  $callvalue = $selectbrand['callvalue'];
  $threemonths = $selectbrand['3months'];
  $threeto6months = $selectbrand['3to6months'];
  $sixto11months = $selectbrand['6to11months'];
  $above11 = $selectbrand['above11'];
  // screen question start
  $touchscreen = $selectbrand['touchscreen'];
  $largespot = $selectbrand['largespot'];
  $multiplespot = $selectbrand['multiplespot'];
  $minorspot = $selectbrand['minorspot'];
  $nospot = $selectbrand['nospot'];
  $displayfade = $selectbrand['displayfade'];
  $multilines = $selectbrand['multilines'];
  $nolines = $selectbrand['nolines'];
  $crackedscreen = $selectbrand['crackedscreen'];
  $damegescreen = $selectbrand['damegescreen'];
  $heavyscracthes = $selectbrand['heavyscracthes'];
  $scratches12 = $selectbrand['12scratches'];
  $noscratches = $selectbrand['noscratches'];
  // body questions starts
  $majorscratch = $selectbrand['majorscratch'];
  $bodyscratches2 = $selectbrand['2bodyscratches'];
  $nobodysratches = $selectbrand['nobodysratches'];
  $heavydents = $selectbrand['heavydents'];
  $dents2 = $selectbrand['2dents'];
  $nodents = $selectbrand['nodents'];
  $crackedsideback = $selectbrand['crackedsideback'];
  $missingsideback = $selectbrand['missingsideback'];
  $nodefectssideback = $selectbrand['nodefectssideback'];
  $bentcurvedpanel = $selectbrand['bentcurvedpanel'];
  $loosescreen = $selectbrand['loosescreen'];
  $nobents = $selectbrand['nobents'];

  // accessries questions
  $charger = $selectbrand['charger'];
  $earphone = $selectbrand['earphone'];
  $boximei = $selectbrand['boximei'];
  $billimei = $selectbrand['billimei'];
  // brand questions end

  // model questions start

  $selectquestion = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `questions` WHERE `product_name` = '$mid' "));
  //    GENERATELOGS_API($selectquestion, "mobile quesions value", 1);

  $displaycopy = $selectquestion['copydisplay'];
  $front_camera = $selectquestion['front_camera'];
  $back_camera = $selectquestion['back_camera'];
  $volume = $selectquestion['volume'];
  $finger_touch = $selectquestion['finger_touch'];
  $speaker = $selectquestion['speaker'];
  $power_btn = $selectquestion['power_btn'];
  $face_sensor = $selectquestion['face_sensor'];
  $charging_port = $selectquestion['charging_port'];
  $audio_receiver = $selectquestion['audio_receiver'];
  $camera_glass = $selectquestion['camera_glass'];
  $wifi = $selectquestion['wifi'];
  $silent_btn = $selectquestion['silent_btn'];
  $battery = $selectquestion['battery'];
  $bluetooth = $selectquestion['bluetooth'];
  $vibrator = $selectquestion['vibrator'];
  $microphone = $selectquestion['microphone'];
  $displayvalue = $selectquestion['displayvalue'];
  // model questions end
};
?>
<?php
if (isset($_POST['otpverify'])) {

  GENERATELOGS_API($selectquestion, "mobile quesions value", 1);
  GENERATELOGS_API($selectbrand, "brand questions value", 1);
  GENERATELOGS_API($_REQUEST, "REQUEST PACKET", 1);

  // $formcall = $_SESSION['call'];
  // $formcallin = $_SESSION['callin'];
  // $formscreen = $_SESSION['screen'];
  // $formscreenin = $_SESSION['screenin'];
  // $formsbody = $_SESSION['body'];
  // $formsbodyin = $_SESSION['bodyin'];
  // $formwar = $_SESSION['war'];
  // $formwarin = $_SESSION['warin'];
  // $formtouch = $_SESSION['touch'];
  // $formspot = $_SESSION['spot'];
  // $formlines = $_SESSION['lines'];
  // $formphysical = $_SESSION['physical'];
  // $formdents = $_SESSION['dents'];
  // $formside = $_SESSION['side'];
  // $formbent = $_SESSION['bent'];
  // $formage = $_SESSION['age'];
  // $Scratches = $_SESSION['Scratches'];
  // //  functional question start
  // $copydisplay = $_SESSION['copydisplay'];
  // $formfrontcam = $_SESSION['frontcam'];
  // $formbackcam = $_SESSION['backcam'];
  // $formvolume = $_SESSION['volume'];
  // $formfingertouch = $_SESSION['fingertouch'];
  // $formspeaker = $_SESSION['speaker'];
  // $formcharging = $_SESSION['charging'];
  // $formface = $_SESSION['face'];
  // $formaudio = $_SESSION['audio'];
  // $formcamglass = $_SESSION['camglass'];
  // $formwifi = $_SESSION['wifi'];
  // $formsilent = $_SESSION['silent'];
  // $formbattry = $_SESSION['battery'];
  // $formbluetooth = $_SESSION['bluetooth'];
  // $formvibrate = $_SESSION['vibrate'];
  // $formmicro = $_SESSION['micro'];
  // $power = $_SESSION['power'];
  // $formcharger = $_POST['charger'];
  // $formearphone = $_POST['earphone'];
  // $formboximei = $_POST['boximei'];
  // $formbillimei = $_POST['billimei'];
  $_PAGE_DATA =  $_SESSION["currentData"];

  // Initialize variables to default values
$formcall = isset($_PAGE_DATA['call']) ? $_PAGE_DATA['call'] : '';
$formcallin = isset($_PAGE_DATA['callin']) ? $_PAGE_DATA['callin'] : '';
$formscreen = isset($_PAGE_DATA['screen']) ? $_PAGE_DATA['screen'] : '';
$formscreenin = isset($_PAGE_DATA['screenin']) ? $_PAGE_DATA['screenin'] : '';
$formsbody = isset($_PAGE_DATA['body']) ? $_PAGE_DATA['body'] : '';
$formsbodyin = isset($_PAGE_DATA['bodyin']) ? $_PAGE_DATA['bodyin'] : '';
$formwar = isset($_PAGE_DATA['war']) ? $_PAGE_DATA['war'] : '';
$formwarin = isset($_PAGE_DATA['warin']) ? $_PAGE_DATA['warin'] : '';

$formtouch = isset($_PAGE_DATA['touch']) ? $_PAGE_DATA['touch'] : '';
$formspot = isset($_PAGE_DATA['spot']) ? $_PAGE_DATA['spot'] : '';
$formlines = isset($_PAGE_DATA['lines']) ? $_PAGE_DATA['lines'] : '';
$formphysical = isset($_PAGE_DATA['physical']) ? $_PAGE_DATA['physical'] : '';
$formdents = isset($_PAGE_DATA['dents']) ? $_PAGE_DATA['dents'] : '';
$formside = isset($_PAGE_DATA['side']) ? $_PAGE_DATA['side'] : '';
$formbent = isset($_PAGE_DATA['bent']) ? $_PAGE_DATA['bent'] : '';
$formage = isset($_PAGE_DATA['age']) ? $_PAGE_DATA['age'] : '';
$Scratches = isset($_PAGE_DATA['Scratches']) ? $_PAGE_DATA['Scratches'] : '';

// Functional question start
$copydisplay = isset($_PAGE_DATA['copydisplay']) ? $_PAGE_DATA['copydisplay'] : '';
$formfrontcam = isset($_PAGE_DATA['frontcam']) ? $_PAGE_DATA['frontcam'] : '';
$formbackcam = isset($_PAGE_DATA['backcam']) ? $_PAGE_DATA['backcam'] : '';
$formvolume = isset($_PAGE_DATA['volume']) ? $_PAGE_DATA['volume'] : '';
$formfingertouch = isset($_PAGE_DATA['fingertouch']) ? $_PAGE_DATA['fingertouch'] : '';
$formspeaker = isset($_PAGE_DATA['speaker']) ? $_PAGE_DATA['speaker'] : '';
$formcharging = isset($_PAGE_DATA['charging']) ? $_PAGE_DATA['charging'] : '';
$formface = isset($_PAGE_DATA['face']) ? $_PAGE_DATA['face'] : '';
$formaudio = isset($_PAGE_DATA['audio']) ? $_PAGE_DATA['audio'] : '';
$formcamglass = isset($_PAGE_DATA['camglass']) ? $_PAGE_DATA['camglass'] : '';
$formwifi = isset($_PAGE_DATA['wifi']) ? $_PAGE_DATA['wifi'] : '';
$formsilent = isset($_PAGE_DATA['silent']) ? $_PAGE_DATA['silent'] : '';
$formbattry = isset($_PAGE_DATA['battery']) ? $_PAGE_DATA['battery'] : '';
$formbluetooth = isset($_PAGE_DATA['bluetooth']) ? $_PAGE_DATA['bluetooth'] : '';
$formvibrate = isset($_PAGE_DATA['vibrate']) ? $_PAGE_DATA['vibrate'] : '';
$formmicro = isset($_PAGE_DATA['micro']) ? $_PAGE_DATA['micro'] : '';
$power = isset($_PAGE_DATA['power']) ? $_PAGE_DATA['power'] : '';

// For POST data
$formcharger = isset($_POST['charger']) ? $_POST['charger'] : '';
$formearphone = isset($_POST['earphone']) ? $_POST['earphone'] : '';
$formboximei = isset($_POST['boximei']) ? $_POST['boximei'] : '';
$formbillimei = isset($_POST['billimei']) ? $_POST['billimei'] : '';


  
  // $formtouchin = $_SESSION['touchin'];
  // $formspotin = $_SESSION['spotin'];
  // $formlinesin = $_SESSION['linesin'];
  // $formphysicalin = $_SESSION['physicalin'];
  // $formdentsin = $_SESSION['dentsin'];
  // $formsidein = $_SESSION['sidein'];
  // $formbentin = $_SESSION['bentin'];
  // $formagein = $_SESSION['agein'];
  // $Scratchesin = $_SESSION['Scratchesin'];
  // //  functional question start
  // $copydisplayin = $_SESSION['copydisplayin'];
  // $formfrontcamin = $_SESSION['frontcamin'];
  // $formbackcamin = $_SESSION['backcamin'];
  // $formvolumein = $_SESSION['volumein'];
  // $formfingertouchin = $_SESSION['fingertouchin'];
  // $formspeakerin = $_SESSION['speakerin'];
  // $formchargingin = $_SESSION['chargingin'];
  // $formfacein = $_SESSION['facein'];
  // $formaudioin = $_SESSION['audioin'];
  // $formcamglassin = $_SESSION['camglassin'];
  // $formwifiin = $_SESSION['wifiin'];
  // $formsilentin = $_SESSION['silentin'];
  // $formbattryin = $_SESSION['batteryin'];
  // $formbluetoothin = $_SESSION['bluetoothin'];
  // $formvibratein = $_SESSION['vibratein'];
  // $formmicroin = $_SESSION['microin'];
  // $powerin = $_SESSION['powerin'];
  
  // $formchargerin = $_POST['chargerin'];
  // $formearphonein = $_POST['earphonein'];
  // $formboximeiin = $_POST['boximeiin'];
  // $formbillimeiin = $_POST['billimeiin'];
  // Session variables with isset validation and default values
$formtouchin = isset($_PAGE_DATA['touchin']) ? $_PAGE_DATA['touchin'] : '';
$formspotin = isset($_PAGE_DATA['spotin']) ? $_PAGE_DATA['spotin'] : '';
$formlinesin = isset($_PAGE_DATA['linesin']) ? $_PAGE_DATA['linesin'] : '';
$formphysicalin = isset($_PAGE_DATA['physicalin']) ? $_PAGE_DATA['physicalin'] : '';
$formdentsin = isset($_PAGE_DATA['dentsin']) ? $_PAGE_DATA['dentsin'] : '';
$formsidein = isset($_PAGE_DATA['sidein']) ? $_PAGE_DATA['sidein'] : '';
$formbentin = isset($_PAGE_DATA['bentin']) ? $_PAGE_DATA['bentin'] : '';
$formagein = isset($_PAGE_DATA['agein']) ? $_PAGE_DATA['agein'] : '';
$Scratchesin = isset($_PAGE_DATA['Scratchesin']) ? $_PAGE_DATA['Scratchesin'] : '';

// Functional questions for Session variables
$copydisplayin = isset($_PAGE_DATA['copydisplayin']) ? $_PAGE_DATA['copydisplayin'] : '';
$formfrontcamin = isset($_PAGE_DATA['frontcamin']) ? $_PAGE_DATA['frontcamin'] : '';
$formbackcamin = isset($_PAGE_DATA['backcamin']) ? $_PAGE_DATA['backcamin'] : '';
$formvolumein = isset($_PAGE_DATA['volumein']) ? $_PAGE_DATA['volumein'] : '';
$formfingertouchin = isset($_PAGE_DATA['fingertouchin']) ? $_PAGE_DATA['fingertouchin'] : '';
$formspeakerin = isset($_PAGE_DATA['speakerin']) ? $_PAGE_DATA['speakerin'] : '';
$formchargingin = isset($_PAGE_DATA['chargingin']) ? $_PAGE_DATA['chargingin'] : '';
$formfacein = isset($_PAGE_DATA['facein']) ? $_PAGE_DATA['facein'] : '';
$formaudioin = isset($_PAGE_DATA['audioin']) ? $_PAGE_DATA['audioin'] : '';
$formcamglassin = isset($_PAGE_DATA['camglassin']) ? $_PAGE_DATA['camglassin'] : '';
$formwifiin = isset($_PAGE_DATA['wifiin']) ? $_PAGE_DATA['wifiin'] : '';
$formsilentin = isset($_PAGE_DATA['silentin']) ? $_PAGE_DATA['silentin'] : '';
$formbattryin = isset($_PAGE_DATA['batteryin']) ? $_PAGE_DATA['batteryin'] : '';
$formbluetoothin = isset($_PAGE_DATA['bluetoothin']) ? $_PAGE_DATA['bluetoothin'] : '';
$formvibratein = isset($_PAGE_DATA['vibratein']) ? $_PAGE_DATA['vibratein'] : '';
$formmicroin = isset($_PAGE_DATA['microin']) ? $_PAGE_DATA['microin'] : '';
$powerin = isset($_PAGE_DATA['powerin']) ? $_PAGE_DATA['powerin'] : '';

// POST data variables with isset validation and default values
$formchargerin = isset($_POST['chargerin']) ? $_POST['chargerin'] : '';
$formearphonein = isset($_POST['earphonein']) ? $_POST['earphonein'] : '';
$formboximeiin = isset($_POST['boximeiin']) ? $_POST['boximeiin'] : '';
$formbillimeiin = isset($_POST['billimeiin']) ? $_POST['billimeiin'] : '';

  // warrenty and age calculation start
  // echo "formwar".$formwar;
  if (!empty($formwar)) {
    if ($formwar==="no" ) {
      $warrenty = $above11;
    } else if ($formage != null) {
      if($formage ==="under3"){
        $warrenty = $threemonths;
      } else if ($formage ==="under6"){
        $warrenty = $threeto6months;
      } else if ($formage ==="under11"){
        $warrenty = $sixto11months;
      } else if ($formage ==="above11"){
        $warrenty = $above11;
      } 
    }
    $wrrded = ($warrenty / 100) * $uptovalue;
    $updatedupto = $uptovalue - $wrrded;
  }
  //  calculations start here
  if ($formtouch != null && $formspot != null && $formlines != null && $formphysical != null) {

    if ( $formtouch==="yes" ) {
      $touch = 0;
    } else {
      $touch =  $touchscreen;
    }
    if($formspot==="largespot"){
      $sspot = $largespot;
    } else if($formspot==="multiplespot"){
      $sspot = $multiplespot;
    } else if($formspot==="minorspot"){
      $sspot = $minorspot;
    } else if($formspot==="nospot"){
      $sspot = $nospot;
    }
    
// largespot , multiplespot, minorspot , nospot
// displayfaded, multiplelines, noline
// cracked, damaged, heavyscratches, 1-2scratches, noscratches
 
    if ($formlines==="displayfaded") {
      $slines = $displayfade;
    } else if ($formlines==="multiplelines") {
      $slines = $multilines;
    } else if ($formlines==="noline") {
      $slines = $nolines;
    }

    if ($formphysical==="cracked") {
      $sphysial = $crackedscreen;
    } elseif ($formphysical==="damaged") {
      $sphysial = $damegescreen;
    } elseif ($formphysical==="heavyscratches") {
      $sphysial = $heavyscracthes;
    } elseif ($formphysical==="1-2scratches") {
      $sphysial = $scratches12;
    } elseif ($formphysical==="noscratches") {
      $sphysial = $noscratches;
    }

    if (($touch + $sspot + $slines + $sphysial) >= 100) {
      $screendeduction = $displayvalue;
    } else {
      $screendeduction = ($touch + $sspot + $slines + $sphysial) / 100 * $displayvalue;
    }
  } elseif ($formtouch != null && $formspot == null && $formlines == null && $formphysical == null) {
    if ( $formtouch==="no") {
      $screendeduction = $displayvalue;
    }
  }
  // screen and call questions calculation start
  if ($formcall != null) {
    if ($formcall==="yes") {
      $call = 0;
    } else if ($formcall==="no") {
      $call = $callvalue;
    }
  }
  if ($formdents != null) {
    if ($formdents=== "Multiple/heavy visible body dents") {
      $bdents = $heavydents;
    } elseif ($formdents=== "2 or less minor body dents") {
      $bdents = $dents2;
    } elseif ($formdents=== "No dents") {
      $bdents = $nodents;
    }
  }
  
  if ($formbent != null) {
    if ($formbent=== "Bent/ curved panel") {
      $bbent = $bentcurvedpanel;
    } elseif ($formbent=== "Loose screen (Gap in screen and body)") {
      $bbent = $loosescreen;
    } elseif ($formbent=== "Phone not bent") {
      $bbent = $nobents;
    }
  }

  if ($formside != null) {
    if ($formside==="Cracked/ broken side or back panel") {
      $bside = $crackedsideback;
    } elseif ($formside=== "Missing side or back panel") {
      $bside = $missingsideback;
    } elseif ($formside=== "No defect on side or back panel") {
      $bside = $nodefectssideback;
    }
  }
  // Major scratches, Less than 2 scratches, No scratches
  // Multiple/heavy visible body dents, 2 or less minor body dents, No dents
  // Cracked/ broken side or back panel, Missing side or back panel, No defect on side or back panel
  // Bent/ curved panel, Loose screen (Gap in screen and body), Phone not bent
  if ($Scratches != null) {
    if ($Scratches=== "Major scratches") {
      $ssscrathes = $majorscratch;
    } elseif ($Scratches=== "Less than 2 scratches") {
      $ssscrathes = $bodyscratches2;
    } elseif ($Scratches=== "No scratches") {
      $ssscrathes = $nobodysratches;
    }
  }
  // accesseries question start
  if ($formcharger != null) {
    if ($formcharger==="yes") {
      $dcharger = 0;
    }
  } else {
    $dcharger = $charger;
  }
  if ($formearphone != null) {
    if ($formearphone==="yes") {
      $rphone = 0;
    }
  } else {
    $rphone = $earphone;
  }
  if ($formboximei != null) {
    if ($formboximei==="yes") {
      $box = 0;
    }
  } else {
    $box = $boximei;
  }
  if ($formbillimei != null) {
    if ($formbillimei==="yes") {
      $bill = 0;
    }
  } else {
    $bill = $billimei;
  }
  // accesseries quuestion end
  $sumpercentvalue = $call + $bdents + $bbent + $bside + $ssscrathes + $dcharger + $rphone + $box + $bill;
  $netdeductpercenet = ($sumpercentvalue / 100) * $updatedupto;
  // functional calculation start here
  if ($formfrontcam != null) {
    if ($formfrontcam==="yes") {
      $fcam = $front_camera;
    }
  } else {
    $fcam = 0;
  }
  // new question start here
  if ($copydisplay != null) {
    if ($copydisplay==="yes") {
      $cdisplay = $displaycopy;
    }
  } else {
    $cdisplay = 0;
  }
  // new question end
  if ($formbackcam != null) {
    if ($formbackcam==="yes") {
      $bcam = $back_camera;
    }
  } else {
    $bcam = 0;
  }
  if ($formvolume != null) {
    if ($formvolume==="yes") {
      $vol = $volume;
    }
  } else {
    $vol = 0;
  }
  if ($formfingertouch != null) {
    if ($formfingertouch==="yes") {
      $finger =  $finger_touch;
    }
  } else {
    $finger = 0;
  }
  if ($formspeaker != null) {
    if ($formspeaker==="yes") {
      $speak =  $speaker;
    }
  } else {
    $speak = 0;
  }
  if ($formcharging != null) {
    if ($formcharging==="yes") {
      $charginpot =  $charging_port;
    }
  } else {
    $charginpot = 0;
  }
  if ($formface != null) {
    if ($formface==="yes") {
      $face =  $face_sensor;
    }
  } else {
    $face = 0;
  }
  if ($formaudio != null) {
    if ($formaudio==="yes") {
      $audio = $audio_receiver;
    }
  } else {
    $audio = 0;
  }
  if ($formcamglass != null) {
    if ($formcamglass==="yes") {
      $camglass = $camera_glass;
    }
  } else {
    $camglass = 0;
  }
  if ($formwifi != null) {
    if ($formwifi==="yes") {
      $mobwifi = $wifi;
    }
  } else {
    $mobwifi = 0;
  }
  if ($formsilent != null) {
    if ($formsilent==="yes") {
      $silbtn = $silent_btn;
    }
  } else {
    $silbtn = 0;
  }
  if ($formbattry != null) {
    if ($formbattry==="yes") {
      $batt = $battery;
    }
  } else {
    $batt = 0;
  }
  if ($formbluetooth != null) {
    if ($formbluetooth==="yes") {
      $baluetooth = $bluetooth;
    }
  } else {
    $baluetooth = 0;
  }
  if ($formvibrate != null) {
    if ($formvibrate==="yes") {
      $vibration = $vibrator;
    }
  } else {
    $vibration = 0;
  }
  if ($formmicro != null) {
    if ($formmicro==="yes") {
      $micro = $microphone;
    }
  } else {
    $micro = 0;
  }
  if ($power != null) {
    if ($power==="yes") {
      $powder = $power_btn;
    }
  } else {
    $powder = 0;
  }
  // functions questions calculation start
  $sumflatvalue = $fcam + $cdisplay + $bcam + $vol + $finger + $speak +  $charginpot +  $face + $audio + $camglass + $mobwifi + $silbtn + $batt +  $baluetooth + $vibration +  $micro +  $powder;
  $offerprice = $updatedupto - ($netdeductpercenet + $sumflatvalue + $screendeduction);
  // echo "<br/>";
  // echo  "----------updatedupto-----".$updatedupto;
  // echo  "----------netdeductpercenet-----".$netdeductpercenet;
  // echo  "----------sumflatvalue-----".$sumflatvalue;
  // echo  "----------screendeduction-----".$screendeduction;
  // echo  "----------row1-----".$offerprice;
  $offerprice = round($offerprice);
  // echo "<br/>";
  // echo "----------row2-----".$offerprice;
  $offerprice = round($offerprice / 10) * 10;
  // echo "<br/>";
  // echo "----------row3-----".$offerprice;
  // exit();
  // enquiry start
  if (isset($_POST['otpverify'])) {
   
    // mobile and code end
    if ($formcallin != null) {
      $callcell = explode("</i>", $formcallin);
    } else {
      $callcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    } 
    if ($formscreenin != null) {
      $screencell = explode("</i>", $formscreenin);
    } else {
      $screencell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formsbodyin != null) {
      $bodycell = explode("</i>", $formsbodyin);
    } else {
      $bodycell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formwarin != null) {
      $warcell = explode("</i>", $formwarin);
    } else {
      $warcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formtouchin != null) {
      $touchcell = explode("</i>", $formtouchin);
    } else {
      $touchcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formspotin != null) {
      $spotcell = explode("</i>", $formspotin);
    } else {
      $spotcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formlinesin != null) {
      $linescell = explode("</i>", $formlinesin);
    } else {
      $linescell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formphysicalin != null) {
      $physicalcell = explode("</i>", $formphysicalin);
    } else {
      $physicalcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formdentsin != null) {
      $dentscell = explode("</i>", $formdentsin);
    } else {
      $dentscell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formsidein != null) {
      $sidecell = explode("</i>", $formsidein);
    } else {
      $sidecell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formbentin != null) {
      $bentcell = explode("</i>", $formbentin);
    } else {
      $bentcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formagein != null) {
      $agecell = explode("</i>", $formagein);
    } else {
      $agecell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($Scratchesin != null) {
      $scratchcell = explode("</i>", $Scratchesin);
    } else {
      $scratchcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formfrontcamin != null) {
      $frontcamcell = explode("</i>", $formfrontcamin);
    } else {
      $frontcamcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    // new question start
    if ($copydisplayin != null) {
      $copdisplaycell = explode("</i>", $copydisplayin);
    } else {
      $copdisplaycell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }
    // new question end

    if ($formbackcamin != null) {
      $backcamcell = explode("</i>", $formbackcamin);
    } else {
      $backcamcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formvolumein != null) {
      $volumecell = explode("</i>", $formvolumein);
    } else {
      $volumecell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formfingertouchin != null) {
      $fingercell = explode("</i>", $formfingertouchin);
    } else {
      $fingercell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formspeakerin != null) {
      $speakercell = explode("</i>", $formspeakerin);
    } else {
      $speakercell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formchargingin != null) {
      $chargingcell = explode("</i>", $formchargingin);
    } else {
      $chargingcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formfacein != null) {
      $facecell = explode("</i>", $formfacein);
    } else {
      $facecell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formaudioin != null) {
      $audiocell = explode("</i>", $formaudioin);
    } else {
      $audiocell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formcamglassin != null) {
      $camglasscell = explode("</i>", $formcamglassin);
    } else {
      $camglasscell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formwifiin != null) {
      $wificell = explode("</i>", $formwifiin);
    } else {
      $wificell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formsilentin != null) {
      $silentbtncell = explode("</i>", $formsilentin);
    } else {
      $silentbtncell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formbattryin != null) {
      $battrycell = explode("</i>", $formbattryin);
    } else {
      $battrycell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formbluetoothin != null) {
      $bluetoothcell = explode("</i>", $formbluetoothin);
    } else {
      $bluetoothcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formvibratein != null) {
      $vibratecell = explode("</i>", $formvibratein);
    } else {
      $vibratecell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formmicroin != null) {
      $microcell = explode("</i>", $formmicroin);
    } else {
      $microcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($powerin != null) {
      $powercell = explode("</i>", $powerin);
    } else {
      $powercell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formchargerin != null) {
      $chargercell = explode("</i>", $formchargerin);
    } else {
      $chargercell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formearphonein != null) {
      $earphonecell = explode("</i>", $formearphonein);
    } else {
      $earphonecell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formboximeiin != null) {
      $boxcell = explode("</i>", $formboximeiin);
    } else {
      $boxcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if ($formbillimeiin != null) {
      $billcell = explode("</i>", $formbillimeiin);
    } else {
      $billcell = explode("</i>", "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
    }

    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $gennorderr = "MOB" . time();
      $insertenquiry = mysqli_query($con, "INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`modelid`,`brandid`,`varientid`,`model_name`,`mimg`,`offerprice`,`callvalue`,`warenty`,`age`,`touchscreen`,`screenspot`,`screenlines`,`screenphysicalcondition`,`bodyscratches`,
      `bodydents`,`sidebackpanel`,`bodybents`,`charger`,`earphone`,`boximei`,`billimei`,`copydisplay`,`front_camera`,`back_camera`,`volume`,`finger_touch`,`speaker`,`power_btn`,`face_sensor`,
      `charging_port`,`audio_receiver`,`camera_glass`,`wifi`,`silent_btn`,`battery`,`bluetooth`,`vibrator`,`microphone`,`platform_type`) VALUES('$gennorderr','$user','$catid','$mid','$bid','$vid','$mobilename','$modelimg','$offerprice','$callcell[1]','$warcell[1]',
      '$agecell[1]','$touchcell[1]','$spotcell[1]','$linescell[1]','$physicalcell[1]','$scratchcell[1]','$dentscell[1]','$sidecell[1]','$bentcell[1]','$chargercell[1]','$earphonecell[1]','$boxcell[1]','$billcell[1]','$copdisplaycell[1]','$frontcamcell[1]',
      '$backcamcell[1]','$volumecell[1]','$fingercell[1]','$speakercell[1]','$powercell[1]','$facecell[1]','$chargingcell[1]','$audiocell[1]','$camglasscell[1]','$wificell[1]','$silentbtncell[1]','$battrycell[1]','$bluetoothcell[1]',
      '$vibratecell[1]','$microcell[1]','website') ");

      if ($insertenquiry) {
        $lastidquery = mysqli_fetch_assoc(mysqli_query($con, "SELECT `id` FROM `enquiry` ORDER BY `id` DESC LIMIT 1 "));
        if ($lastidquery) {
          $lastid = $lastidquery['id'];
          mysqli_query($con, "UPDATE `enquiry` SET  `vendor_id`='15' WHERE `id` = '$lastid'");
          $redurl = $publicUrl."price-summary.php?vid=$vid&mid=$mid&bid=$bid&enid=$lastid";
          GENERATELOGS_API($redurl, "redirect url", 1);
          $_SESSION['generateQnquiry']=true;
          echo '<script>
               window.location.assign("' . $redurl . '");
               </script>';
        }
      } else {
        echo '<script>
        alert("enquiry not inserted");
        </script>';
      }
    } else {
      
      $mobile = $_POST['mobile'];
      $uid = $_POST['uid'];
      $code = $_POST['code'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      //start verifycode
      if ($code == $_SESSION['otp']) {
        if ($uid != '') {
          $_SESSION['user'] = $uid;
          $uid = $_SESSION['user'];
        } else {
          $query = mysqli_query($con, "INSERT INTO `userrecord` (`mobile`,`name`,`email`) VALUES('$mobile','$name','$email')");
          if ($query) {
            $seluid = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `userrecord` WHERE `mobile` = '$mobile' ORDER BY `id` DESC  LIMIT 1  "));
            if ($seluid) {
              $uid = $seluid['id'];
              $_SESSION['user'] = $uid;
            }
          }
        }
        //  end verify code

        $gennorderr = "MOB" . time();
        $insertenquiry = mysqli_query($con, "INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`modelid`,`brandid`,`varientid`,`model_name`,`mimg`,`offerprice`,`callvalue`,`warenty`,`age`,`touchscreen`,`screenspot`,`screenlines`,`screenphysicalcondition`,`bodyscratches`,
      `bodydents`,`sidebackpanel`,`bodybents`,`charger`,`earphone`,`boximei`,`billimei`,`copydisplay`,`front_camera`,`back_camera`,`volume`,`finger_touch`,`speaker`,`power_btn`,`face_sensor`,
      `charging_port`,`audio_receiver`,`camera_glass`,`wifi`,`silent_btn`,`battery`,`bluetooth`,`vibrator`,`microphone`,`platform_type`) VALUES('$gennorderr','$uid','$catid','$mid','$bid','$vid','$mobilename','$modelimg','$offerprice','$callcell[1]','$warcell[1]',
      '$agecell[1]','$touchcell[1]','$spotcell[1]','$linescell[1]','$physicalcell[1]','$scratchcell[1]','$dentscell[1]','$sidecell[1]','$bentcell[1]','$chargercell[1]','$earphonecell[1]','$boxcell[1]','$billcell[1]','$copdisplaycell[1]','$frontcamcell[1]',
      '$backcamcell[1]','$volumecell[1]','$fingercell[1]','$speakercell[1]','$powercell[1]','$facecell[1]','$chargingcell[1]','$audiocell[1]','$camglasscell[1]','$wificell[1]','$silentbtncell[1]','$battrycell[1]','$bluetoothcell[1]',
      '$vibratecell[1]','$microcell[1]', 'web') ");
        if ($insertenquiry) {
          $lastidquery = mysqli_fetch_assoc(mysqli_query($con, "SELECT `id` FROM `enquiry` ORDER BY `id` DESC LIMIT 1 "));
          $lastid = $lastidquery['id'];
          mysqli_query($con, "UPDATE `enquiry` SET  `vendor_id`='15' WHERE `id` = '$lastid'");

          $redurl = $publicUrl."price-summary.php?vid=$vid&mid=$mid&bid=$bid&enid=$lastid";
          GENERATELOGS_API($redurl, "redirect url", 1);
          $_SESSION['generateQnquiry']=true;
          echo '<script>
               window.location.assign("' . $redurl . '");
               </script>';
        } else {
          echo '<script>
    alert("enquiry not inserted");
    </script>';
        }
      } else {
        echo '<script>
    alert("code not matched");
    </script>';
      }
    }
  }
  //enquiry coding end 
}
?>