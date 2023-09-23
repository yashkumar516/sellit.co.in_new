<?php
session_start();
include 'config.php';
if(isset($_REQUEST['vid']) && isset($_REQUEST['bid']) && isset($_REQUEST['mid'])){
    $vid = $_POST['vid'];
    $bid = $_POST['bid'];
    $mid = $_POST['mid'];
    $user = $_POST['uid'];
    $wage = 0;
    $formwar = 0;
    $touch = 0 ;
    $sspot = 0;
    $slines = 0;
    $sphysial = 0;
    $bbent = 0;
    $bdents = 0;
    $bside = 0;
    $ssscrathes = 0;
    $warrenty = 0;
    $screendeduction = 0 ;
    $selectupto = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `varient` WHERE `status` = 'active' AND `id` = '$vid' "));
    $uptovalue = $selectupto['uptovalue'];
    $selectnodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `status` = 'active' AND `id` = '$mid' "));
    $modelimg = $selectnodel['product_image'];
    $mobilename = $selectnodel['product_name'];
    $catid = $selectnodel['categoryid'];
    // brand questions start
    $selectbrand = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `id` = '$bid' "));
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
    $selectquestion = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `questions` WHERE `status` = 'active' AND `product_name` = '$mid' "));
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
//   post data
    $formcall = $_POST['callin'];
    $formscreen = $_POST['screenin'];
    $formsbody = $_POST['bodyin'];
    $formwar = $_POST['warin'];
    $formtouch = $_POST['touch'];
    $formspot = $_POST['spot'];
    $formlines = $_POST['lines'];
    $formphysical = $_POST['physical'];
    $formdents = $_POST['dents'];
    $formside = $_POST['side'];
    $formbent = $_POST['bent'];
    $formage = $_POST['age'];
    $Scratches = $_POST['Scratches'];
    //  functional question start
    $copydisplay = $_POST['copydisplay'];
    $formfrontcamin = $_POST['frontcamin'];
    $formbackcamin = $_POST['backcamin'];
    $formvolumein = $_POST['volumein'];
    $formfingertouchin = $_POST['fingertouchin'];
    $formspeaker = $_POST['speakerin'];
    $formchargingin = $_POST['chargingin'];
    $formfacein = $_POST['facein'];
    $formaudioin = $_POST['audioin'];
    $formcamglassin = $_POST['camglassin'];
    $formwifiin = $_POST['wifiin'];
    $formsilentin = $_POST['silentin'];
    $formbattryin = $_POST['battryin'];
    $formbluetoothin = $_POST['bluetoothin'];
    $formvibratein = $_POST['vibratein'];
    $formmicroin = $_POST['microin'];
    $powerin = $_POST['powerin'];
    $formcharger = $_POST['charger'];
    $formearphone = $_POST['earphone'];
    $formboximei = $_POST['boximei'];
    $formbillimei = $_POST['billimei'];
    // warrenty and age calculation start
   if(!empty($formwar))
    {
     if(strcmp($formwar,"Mobile Out of Warranty")==0 || strcmp($formwar,"Mobile Out of Warranty")==0){
     $warrenty = $above11;
     }
     elseif($formage != null){
      if(strcmp($formage,"Under 3 Months")==0){
       $warrenty = $threemonths;
      }
      elseif(strcmp($formage,"3 To 6 Months")==0){
        $warrenty = $threeto6months;
      }
      elseif(strcmp($formage,"6 To 11 Months")==0){
        $warrenty = $sixto11months;
      }
      elseif(strcmp($formage,"Above 11 Months")==0){
        $warrenty = $above11;
      }
    }
    $wrrded = ($warrenty/100)*$uptovalue;
    $updatedupto = $uptovalue-$wrrded;
   }
  //  calculations start here
  if ($formtouch != null && $formspot != null && $formlines != null && $formphysical != null) {
   if (strcmp($formtouch,"Touch Working")==0) {
      $touch = 0;
    }else{
        $touch =  $touchscreen;
    }
    
   if (strcmp($formspot,"Large/ heavy visible spots on screen")==0) {
          $sspot = $largespot;
     } elseif (strcmp($formspot,"Multiple visible spots on screen")==0) {
          $sspot = $multiplespot;
     } elseif (strcmp($formspot,"Minor discoloration or small spots on screen")==0) {
          $sspot = $minorspot;
    } elseif (strcmp($formspot,"No spots on screen")==0) {
          $sspot = $nospot;
     }

     if (strcmp($formlines,"Display faded along corners")==0) {
      $slines = $displayfade;
     } elseif (strcmp($formlines,"Multiple lines on Display")==0) {
      $slines = $multilines;
     } elseif (strcmp($formlines,"No line(s) on Display")==0) {
      $slines = $nolines;
    }

    if (strcmp($formphysical,"Screen cracked/ glass broken")==0) {
      $sphysial = $crackedscreen;
     } elseif (strcmp($formphysical,"Damaged/ Torn screen on edges")==0) {
      $sphysial = $damegescreen;
    } elseif (strcmp($formphysical,"Heavy scratches on screen")==0) {
      $sphysial = $heavyscracthes;
    } elseif (strcmp($formphysical,"1-2 scratches on screen")==0) {
      $sphysial = $scratches12;
    } elseif (strcmp($formphysical,"No scratches on screen")==0) {
      $sphysial = $noscratches;
    }

    if(($touch+$sspot+$slines+$sphysial)>=100){
        $screendeduction = $displayvalue;
     }else{
        $screendeduction = ($touch+$sspot+$slines+$sphysial)/100 * $displayvalue;
     }
   }
  elseif($formtouch != null && $formspot == null && $formlines == null && $formphysical == null){
  if (strcmp($formtouch,"Touch Faulty")==0) {
    $screendeduction = $displayvalue;
  }

}
// screen and call questions calculation start
if ($formcall != null) {
  if (strcmp($formcall,"Able To Take Calls")==0) {
      $call = 0;
  } elseif (strcmp($formcall,"Not Able To Take Calls")==0) {
      $call = $callvalue;
  }
}
if ($formdents != null) {
    if (strcmp($formdents,"Multiple/heavy visible body dents")==0) {
        $bdents = $heavydents;
    } elseif (strcmp($formdents,"2 or less minor body dents")==0) {
        $bdents = $dents2;
    } elseif (strcmp($formdents,"No dents")==0) {
        $bdents = $nodents;
    }
}
if ($formbent != null) {
    if (strcmp($formbent,"Bent/ curved panel")==0) {
        $bbent = $bentcurvedpanel;
    } elseif (strcmp($formbent,"Loose screen (Gap in screen and body)")==0) {
        $bbent = $loosescreen;
    } elseif (strcmp($formbent,"Phone not bent")==0) {
        $bbent = $nobents;
    }
}

if ($formside != null) {
    if (strcmp($formside,"Cracked/ broken side or back panel")==0) {
        $bside = $crackedsideback;
    } elseif (strcmp($formside,"Missing side or back panel")==0) {
        $bside = $missingsideback;
    } elseif (strcmp($formside,"No defect on side or back panel")==0) {
        $bside = $nodefectssideback;
    }
}
if ($Scratches != null) {
    if (strcmp($Scratches,"Major scratches")==0) {
        $ssscrathes = $majorscratch;
    } elseif (strcmp($Scratches,"Less than 2 scratches")==0) {
        $ssscrathes = $bodyscratches2;
    } elseif (strcmp($Scratches,"No scratches")==0) {
        $ssscrathes = $nobodysratches;
    }
}
// accesseries question start
if ($formcharger != null) {
    if (strcmp($formcharger,"Original Charger of Device")==0) {
        $dcharger = 0;
    }
}
else{
    $dcharger = $charger;
}
if ($formearphone != null) {
    if (strcmp($formearphone,"Original Earphones of Device")==0) {
        $rphone = 0;
    }
}
else{
    $rphone = $earphone;
}
if ($formboximei != null) {
    if (strcmp($formboximei,"Box with same IMEI")==0) {
        $box = 0;
    }
}
else{
    $box = $boximei;
}
if ($formbillimei != null) {
    if (strcmp($formbillimei,"Bill with same IMEI")==0) {
        $bill = 0;
    }
}
else{
    $bill = $billimei;
}
// accesseries quuestion end
$sumpercentvalue = $call + $bdents + $bbent + $bside + $ssscrathes + $dcharger + $rphone + $box + $bill;
$netdeductpercenet = ($sumpercentvalue/100)*$updatedupto;
// functional calculation start here
if ($formfrontcamin != null) {
    if (strcmp($formfrontcamin,"Front Camera not working")==0) {
        $fcam = $front_camera;
    }
}else{
    $fcam = 0 ;
}
// new question start here
if ($copydisplay != null) {
  if (strcmp($copydisplay,"Copy Display")==0) {
      $cdisplay = $displaycopy;
  }
}else{
  $cdisplay = 0 ;
}
// new question end
if ($formbackcamin != null) {
    if (strcmp($formbackcamin,"Back Camera not working")==0) {
        $bcam = $back_camera;
    }
}else{
    $bcam = 0;
}
if ($formvolumein != null) {
    if (strcmp($formvolumein,"Volume Button not working")==0) {
        $vol = $volume;
    }
}else{
    $vol = 0;
}
if ($formfingertouchin != null) {
    if (strcmp($formfingertouchin,"Finger Touch not working")==0) {
        $finger =  $finger_touch;
    }
}else{
    $finger = 0;
}
if ($formspeaker != null) {
    if (strcmp($formspeaker,"Speaker not working")==0) {
        $speak =  $speaker;
    }
}else{
    $speak =0;
}
if ($formchargingin != null) {
    if (strcmp($formchargingin,"Charging Port not working")==0) {
        $charginpot =  $charging_port;
    }
}else{
    $charginpot = 0;
}
if ($formfacein != null) {
    if (strcmp($formfacein,"Face Sensor not working")==0) {
        $face =  $face_sensor;
    }
}else{
    $face =0;
}
if ($formaudioin != null) {
    if (strcmp($formaudioin,"Audio Receiver not working")==0) {
        $audio = $audio_receiver;
    }
}else{
    $audio = 0;
}
if ($formcamglassin != null) {
    if (strcmp($formcamglassin,"Camera Glass Broken")==0) {
        $camglass = $camera_glass;
    }
}else{
    $camglass = 0 ;
}
if ($formwifiin != null) {
    if (strcmp($formwifiin,"WiFi not working")==0) {
        $mobwifi = $wifi;
    }
}else{
    $mobwifi = 0 ;
}
if ($formsilentin != null) {
    if (strcmp($formsilentin,"Silent Button not working")==0) {
        $silbtn = $silent_btn;
    }
}else{
    $silbtn = 0 ;
}
if ($formbattryin != null) {
    if (strcmp($formbattryin,"Battery not working")==0) {
        $batt = $battery;
    }
}else{
    $batt = 0;
}
if ($formbluetoothin != null) {
    if (strcmp($formbluetoothin,"Bluetooth not working")==0) {
        $baluetooth = $bluetooth;
    }
}else{
    $baluetooth = 0;
}
if ($formvibratein != null) {
    if (strcmp($formvibratein,"Vibrator is not working")==0) {
        $vibration = $vibrator;
    }
}else{
    $vibration = 0;
}
if ($formmicroin != null) {
    if (strcmp($formmicroin,"Microphone is not working")==0) {
        $micro = $microphone;
    }
}else{
    $micro = 0;
}
if ($powerin != null) {
    if (strcmp($powerin,"Power Button not working")==0) {
        $powder = $power_btn;
    }
}else{
    $powder = 0;
}
  //functions questions calculation start
  $sumflatvalue=$fcam + $cdisplay + $bcam + $vol + $finger + $speak +  $charginpot +  $face + $audio + $camglass + $mobwifi + $silbtn + $batt +  $baluetooth + $vibration +  $micro +  $powder;
  $offerprice = $updatedupto - ($netdeductpercenet + $sumflatvalue + $screendeduction);
  $offerprice = round($offerprice);
  $offerprice = round($offerprice/10)*10;

  $gennorderr = "MOB".time();
  $insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`modelid`,`brandid`,`varientid`,`model_name`,`mimg`,`offerprice`,`callvalue`,`warenty`,`age`,`touchscreen`,`screenspot`,`screenlines`,`screenphysicalcondition`,`bodyscratches`,
  `bodydents`,`sidebackpanel`,`bodybents`,`charger`,`earphone`,`boximei`,`billimei`,`copydisplay`,`front_camera`,`back_camera`,`volume`,`finger_touch`,`speaker`,`power_btn`,`face_sensor`,
  `charging_port`,`audio_receiver`,`camera_glass`,`wifi`,`silent_btn`,`battery`,`bluetooth`,`vibrator`,`microphone`) VALUES('$gennorderr','$user','$catid','$mid','$bid','$vid','$mobilename','$modelimg','$offerprice','$formcall','$formwar',
  '$formage','$formtouch','$formspot','$formlines','$formphysical','$Scratches','$formdents','$formside','$formbent','$formcharger','$formearphone','$formboximei','$formbillimei','$copydisplay','$formfrontcamin',
  '$formbackcamin','$formvolumein','$formfingertouchin','$formspeaker','$powerin','$formfacein','$formchargingin','$formaudioin','$formcamglassin','$formwifiin','$formsilentin','$formbattryin','$formbluetoothin',
  '$formvibratein','$formmicroin') ");

  if($insertenquiry)
  {
    $enqid = mysqli_insert_id($con);
    $list = [
	    'status' => 'success',
	     'enqid' => "$enqid",
              'offerprice' => "$offerprice",
              'message' => 'lead create succefully'
          ];
          echo json_encode($list);
  }else{
   $list = [
              'status' => 'failed',
              'message' => 'lead not create'
          ];
          echo json_encode($list);
  }

?>

