
<?php
if(isset($_REQUEST['vid']) && isset($_REQUEST['bid']) && isset($_REQUEST['mid'])){
    $vid = $_REQUEST['vid'];
    $bid = $_REQUEST['bid'];
    $mid = $_REQUEST['mid'];
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
?>
<?php
if (isset($_POST['otpverify'])) {
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
  if(strcmp($formwar,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>Mobile Out of Warranty")==0 || strcmp($formwar,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty")==0){
    $warrenty = $above11;
  }
  elseif($formage != null){
      if(strcmp($formage,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months")==0){
       $warrenty = $threemonths;
      }
      elseif(strcmp($formage,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months")==0){
        $warrenty = $threeto6months;
      }
      elseif(strcmp($formage,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months")==0){
        $warrenty = $sixto11months;
      }
      elseif(strcmp($formage,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months")==0){
        $warrenty = $above11;
      }
    }
    $wrrded = ($warrenty/100)*$uptovalue;
    $updatedupto = $uptovalue-$wrrded;
 }
//  calculations start here
if ($formtouch != null && $formspot != null && $formlines != null && $formphysical != null) {
    
   if (strcmp($formtouch,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Touch Working")==0) {
      $touch = 0;
    }else{
        $touch =  $touchscreen;
    }

    if (strcmp($formspot,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Large/ heavy visible spots on screen")==0) {
          $sspot = $largespot;
     } elseif (strcmp($formspot,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Multiple visible spots on screen")==0) {
          $sspot = $multiplespot;
     } elseif (strcmp($formspot,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Minor discoloration or small spots on screen")==0) {
          $sspot = $minorspot;
    } elseif (strcmp($formspot,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No spots on screen")==0) {
          $sspot = $nospot;
     }

     if (strcmp($formlines,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Display faded along corners")==0) {
      $slines = $displayfade;
     } elseif (strcmp($formlines,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Multiple lines on Display")==0) {
      $slines = $multilines;
     } elseif (strcmp($formlines,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No line(s) on Display")==0) {
      $slines = $nolines;
    }

    if (strcmp($formphysical,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Screen cracked/ glass broken")==0) {
      $sphysial = $crackedscreen;
     } elseif (strcmp($formphysical,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Damaged/ Torn screen on edges")==0) {
      $sphysial = $damegescreen;
    } elseif (strcmp($formphysical,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Heavy scratches on screen")==0) {
      $sphysial = $heavyscracthes;
    } elseif (strcmp($formphysical,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>1-2 scratches on screen")==0) {
      $sphysial = $scratches12;
    } elseif (strcmp($formphysical,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No scratches on screen")==0) {
      $sphysial = $noscratches;
    }
    
    if(($touch+$sspot+$slines+$sphysial)>=100){
        $screendeduction = $displayvalue; 
     }else{
        $screendeduction = ($touch+$sspot+$slines+$sphysial)/100 * $displayvalue;
     }
   }
  elseif($formtouch != null && $formspot == null && $formlines == null && $formphysical == null){
  if (strcmp($formtouch,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Touch Faulty")==0) {
    $screendeduction = $displayvalue;
  } 
 
}
// screen and call questions calculation start
if ($formcall != null) {
  if (strcmp($formcall,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To Take Calls")==0) {
      $call = 0;
  } elseif (strcmp($formcall,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To Take Calls")==0) {
      $call = $callvalue;
  }
}
if ($formdents != null) {
    if (strcmp($formdents,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Multiple/heavy visible body dents")==0) {
        $bdents = $heavydents;
    } elseif (strcmp($formdents,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>2 or less minor body dents")==0) {
        $bdents = $dents2;
    } elseif (strcmp($formdents,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No dents")==0) {
        $bdents = $nodents;
    }
}
if ($formbent != null) {
    if (strcmp($formbent,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bent/ curved panel")==0) {
        $bbent = $bentcurvedpanel;
    } elseif (strcmp($formbent,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Loose screen (Gap in screen and body)")==0) {
        $bbent = $loosescreen;
    } elseif (strcmp($formbent,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone not bent")==0) {
        $bbent = $nobents;
    }
}

if ($formside != null) {
    if (strcmp($formside,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Cracked/ broken side or back panel")==0) {
        $bside = $crackedsideback;
    } elseif (strcmp($formside,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Missing side or back panel")==0) {
        $bside = $missingsideback;
    } elseif (strcmp($formside,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No defect on side or back panel")==0) {
        $bside = $nodefectssideback;
    }
}
if ($Scratches != null) {
    if (strcmp($Scratches,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Major scratches")==0) {
        $ssscrathes = $majorscratch;
    } elseif (strcmp($Scratches,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Less than 2 scratches")==0) {
        $ssscrathes = $bodyscratches2;
    } elseif (strcmp($Scratches,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No scratches")==0) {
        $ssscrathes = $nobodysratches;
    }
}
// accesseries question start
if ($formcharger != null) {
    if (strcmp($formcharger,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Charger of Device")==0) {
        $dcharger = 0;
    }
}
else{
    $dcharger = $charger;
}
if ($formearphone != null) {
    if (strcmp($formearphone,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Earphones of Device")==0) {
        $rphone = 0;
    }
}
else{
    $rphone = $earphone;
}
if ($formboximei != null) {
    if (strcmp($formboximei,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Box with same IMEI")==0) {
        $box = 0;
    }
}
else{
    $box = $boximei;
}
if ($formbillimei != null) {
    if (strcmp($formbillimei,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bill with same IMEI")==0) {
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
    if (strcmp($formfrontcamin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Front Camera not working")==0) {
        $fcam = $front_camera;
    }
}else{
    $fcam = 0 ;
}
// new question start here
if ($copydisplay != null) {
  if (strcmp($copydisplay,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Copy Display")==0) {
      $cdisplay = $displaycopy;
  }
}else{
  $cdisplay = 0 ;
}
// new question end
if ($formbackcamin != null) {
    if (strcmp($formbackcamin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Back Camera not working")==0) {
        $bcam = $back_camera;
    }
}else{
    $bcam = 0;
}
if ($formvolumein != null) {
    if (strcmp($formvolumein,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Volume Button not working")==0) {
        $vol = $volume;
    }
}else{
    $vol = 0;
}
if ($formfingertouchin != null) {
    if (strcmp($formfingertouchin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Finger Touch not working")==0) {
        $finger =  $finger_touch;
    }
}else{
    $finger = 0;
}
if ($formspeaker != null) {
    if (strcmp($formspeaker,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Speaker not working")==0) {
        $speak =  $speaker;
    }
}else{
    $speak =0;
}
if ($formchargingin != null) {
    if (strcmp($formchargingin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Charging Port not working")==0) {
        $charginpot =  $charging_port;
    }
}else{
    $charginpot = 0;
}
if ($formfacein != null) {
    if (strcmp($formfacein,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Face Sensor not working")==0) {
        $face =  $face_sensor;
    }
}else{
    $face =0;
}
if ($formaudioin != null) {
    if (strcmp($formaudioin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Audio Receiver not working")==0) {
        $audio = $audio_receiver;
    }
}else{
    $audio = 0;
}
if ($formcamglassin != null) {
    if (strcmp($formcamglassin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Camera Glass Broken")==0) {
        $camglass = $camera_glass;
    }
}else{
    $camglass = 0 ;
}
if ($formwifiin != null) {
    if (strcmp($formwifiin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>WiFi not working")==0) {
        $mobwifi = $wifi;
    }
}else{
    $mobwifi = 0 ;
}
if ($formsilentin != null) {
    if (strcmp($formsilentin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Silent Button not working")==0) {
        $silbtn = $silent_btn;
    }
}else{
    $silbtn = 0 ;
}
if ($formbattryin != null) {
    if (strcmp($formbattryin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Battery not working")==0) {
        $batt = $battery;
    }
}else{
    $batt = 0;
}
if ($formbluetoothin != null) {
    if (strcmp($formbluetoothin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bluetooth not working")==0) {
        $baluetooth = $bluetooth;
    }
}else{
    $baluetooth = 0;
}
if ($formvibratein != null) {
    if (strcmp($formvibratein,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Vibrator is not working")==0) {
        $vibration = $vibrator;
    }
}else{
    $vibration = 0;
}
if ($formmicroin != null) {
    if (strcmp($formmicroin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Microphone is not working")==0) {
        $micro = $microphone;
    }
}else{
    $micro = 0;
}
if ($powerin != null) {
    if (strcmp($powerin,"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Power Button not working")==0) {
        $powder = $power_btn;
    }
}else{
    $powder = 0;
}
// functions questions calculation start
$sumflatvalue=$fcam + $cdisplay + $bcam + $vol + $finger + $speak +  $charginpot +  $face + $audio + $camglass + $mobwifi + $silbtn + $batt +  $baluetooth + $vibration +  $micro +  $powder;
$offerprice = $updatedupto - ($netdeductpercenet + $sumflatvalue + $screendeduction);
$offerprice = round($offerprice);
$offerprice = round($offerprice/10)*10;
// enquiry start
if (isset($_POST['otpverify'])) {
// mobile and code end
   if($formcall != null){
       $callcell = explode("</i>",$formcall);
   }else{
       $callcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
   }

   if($formscreen != null){
    $screencell = explode("</i>",$formscreen);
  }else{
   $screencell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formsbody != null){
    $bodycell = explode("</i>",$formsbody);
  }else{
   $bodycell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formwar != null){
    $warcell = explode("</i>",$formwar);
  }else{
   $warcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formtouch != null){
    $touchcell = explode("</i>",$formtouch);
  }else{
    $touchcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formspot != null){
    $spotcell = explode("</i>",$formspot);
  }else{
   $spotcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }
   
  if($formlines != null){
    $linescell = explode("</i>",$formlines);
  }else{
   $linescell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formphysical != null){
    $physicalcell = explode("</i>",$formphysical);
  }else{
   $physicalcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formdents != null){
    $dentscell = explode("</i>",$formdents);
  }else{
    $dentscell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formside != null){
    $sidecell = explode("</i>",$formside);
  }else{
    $sidecell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formbent != null){
    $bentcell = explode("</i>",$formbent);
  }else{
   $bentcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formage != null){
    $agecell = explode("</i>",$formage);
  }else{
    $agecell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($Scratches != null){
    $scratchcell = explode("</i>",$Scratches);
  }else{
   $scratchcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formfrontcamin != null){
    $frontcamcell = explode("</i>",$formfrontcamin);
  }else{
    $frontcamcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  // new question start
  if($copydisplay != null){
    $copdisplaycell = explode("</i>",$copydisplay);
  }else{
    $copdisplaycell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }
  // new question end

  if($formbackcamin != null){
    $backcamcell = explode("</i>",$formbackcamin);
  }else{
    $backcamcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formvolumein != null){
    $volumecell = explode("</i>",$formvolumein);
  }else{
    $volumecell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formfingertouchin != null){
    $fingercell = explode("</i>",$formfingertouchin);
  }else{
    $fingercell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formspeaker != null){
    $speakercell = explode("</i>",$formspeaker);
  }else{
    $speakercell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formchargingin != null){
    $chargingcell = explode("</i>",$formchargingin);
  }else{
    $chargingcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formfacein != null){
    $facecell = explode("</i>",$formfacein);
  }else{
    $facecell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formaudioin != null){
    $audiocell = explode("</i>",$formaudioin);
  }else{
    $audiocell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formcamglassin != null){
    $camglasscell = explode("</i>",$formcamglassin);
  }else{
    $camglasscell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formwifiin != null){
    $wificell = explode("</i>",$formwifiin);
  }else{
    $wificell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formsilentin != null){
    $silentbtncell = explode("</i>",$formsilentin);
  }else{
    $silentbtncell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formbattryin != null){
    $battrycell = explode("</i>",$formbattryin);
  }else{
    $battrycell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formbluetoothin != null){
    $bluetoothcell = explode("</i>",$formbluetoothin);
  }else{
    $bluetoothcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formvibratein != null){
    $vibratecell = explode("</i>",$formvibratein);
  }else{
    $vibratecell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formmicroin != null){
    $microcell = explode("</i>",$formmicroin);
  }else{
    $microcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($powerin != null){
    $powercell = explode("</i>",$powerin);
  }else{
    $powercell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formcharger != null){
    $chargercell = explode("</i>",$formcharger);
  }else{
    $chargercell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formearphone != null){
    $earphonecell = explode("</i>",$formearphone);
  }else{
    $earphonecell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formboximei != null){
    $boxcell = explode("</i>",$formboximei);
  }else{
    $boxcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($formbillimei != null){
    $billcell = explode("</i>",$formbillimei);
  }else{
    $billcell = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

 if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $gennorderr = "MOB".time();
  $insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`modelid`,`brandid`,`varientid`,`model_name`,`mimg`,`offerprice`,`callvalue`,`warenty`,`age`,`touchscreen`,`screenspot`,`screenlines`,`screenphysicalcondition`,`bodyscratches`,
  `bodydents`,`sidebackpanel`,`bodybents`,`charger`,`earphone`,`boximei`,`billimei`,`copydisplay`,`front_camera`,`back_camera`,`volume`,`finger_touch`,`speaker`,`power_btn`,`face_sensor`,
  `charging_port`,`audio_receiver`,`camera_glass`,`wifi`,`silent_btn`,`battery`,`bluetooth`,`vibrator`,`microphone`) VALUES('$gennorderr','$user','$catid','$mid','$bid','$vid','$mobilename','$modelimg','$offerprice','$callcell[1]','$warcell[1]',
  '$agecell[1]','$touchcell[1]','$spotcell[1]','$linescell[1]','$physicalcell[1]','$scratchcell[1]','$dentscell[1]','$sidecell[1]','$bentcell[1]','$chargercell[1]','$earphonecell[1]','$boxcell[1]','$billcell[1]','$copdisplaycell[1]','$frontcamcell[1]',
  '$backcamcell[1]','$volumecell[1]','$fingercell[1]','$speakercell[1]','$powercell[1]','$facecell[1]','$chargingcell[1]','$audiocell[1]','$camglasscell[1]','$wificell[1]','$silentbtncell[1]','$battrycell[1]','$bluetoothcell[1]',
  '$vibratecell[1]','$microcell[1]') ");

  if($insertenquiry)
  { 
   $lastidquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT `id` FROM `enquiry` ORDER BY `id` DESC LIMIT 1 "));
   if($lastidquery){
   $lastid = $lastidquery['id'];
   echo "<script>
      window.location.href = 'price-summary.php?vid='+$vid+'&&mid='+$mid+'&&bid='+$bid+'&&enid='+ $lastid;
   </script>";
   }
  }else{
    echo '<script>
    alert("enquiry not inserted");
    </script>';
  }

 } 
  else{
  $mobile = $_POST['mobile'];
  $uid = $_POST['uid'];
  $code = $_POST['code'];
  $name = $_POST['name'];
  $email = $_POST['email']; 
 //start verifycode
  if($code == $_SESSION['otp']){
      if($uid != ''){
       $_SESSION['user'] = $uid;
       $uid = $_SESSION['user']; 
      }else{
           $query = mysqli_query($con,"INSERT INTO `userrecord` (`mobile`,`name`,`email`) VALUES('$mobile','$name','$email')");
         if( $query){
             $seluid = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `mobile` = '$mobile' ORDER BY `id` DESC  LIMIT 1  "));
             if($seluid){
                $uid = $seluid['id'];
                 $_SESSION['user'] = $uid; 
             }
         }
      }
//  end verify code
  
  $gennorderr = "MOB".time();
  $insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`modelid`,`brandid`,`varientid`,`model_name`,`mimg`,`offerprice`,`callvalue`,`warenty`,`age`,`touchscreen`,`screenspot`,`screenlines`,`screenphysicalcondition`,`bodyscratches`,
  `bodydents`,`sidebackpanel`,`bodybents`,`charger`,`earphone`,`boximei`,`billimei`,`copydisplay`,`front_camera`,`back_camera`,`volume`,`finger_touch`,`speaker`,`power_btn`,`face_sensor`,
  `charging_port`,`audio_receiver`,`camera_glass`,`wifi`,`silent_btn`,`battery`,`bluetooth`,`vibrator`,`microphone`) VALUES('$gennorderr','$uid','$catid','$mid','$bid','$vid','$mobilename','$modelimg','$offerprice','$callcell[1]','$warcell[1]',
  '$agecell[1]','$touchcell[1]','$spotcell[1]','$linescell[1]','$physicalcell[1]','$scratchcell[1]','$dentscell[1]','$sidecell[1]','$bentcell[1]','$chargercell[1]','$earphonecell[1]','$boxcell[1]','$billcell[1]','$copdisplaycell[1]','$frontcamcell[1]',
  '$backcamcell[1]','$volumecell[1]','$fingercell[1]','$speakercell[1]','$powercell[1]','$facecell[1]','$chargingcell[1]','$audiocell[1]','$camglasscell[1]','$wificell[1]','$silentbtncell[1]','$battrycell[1]','$bluetoothcell[1]',
  '$vibratecell[1]','$microcell[1]') ");
  if($insertenquiry)
  { 
  $lastidquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT `id` FROM `enquiry` ORDER BY `id` DESC LIMIT 1 "));
  $lastid = $lastidquery['id'];
   echo "<script>
      window.location.href = 'price-summary.php?vid='+$vid+'&&mid='+$mid+'&&bid='+$bid+'&&enid='+ $lastid;
    </script>";
   }else{
    echo '<script>
    alert("enquiry not inserted");
    </script>';
  }
}else{
     echo '<script>
    alert("code not matched");
    </script>';
}
}

}
//enquiry coding end 
}
?>
