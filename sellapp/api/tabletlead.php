<?php
 session_start();
include 'config.php';
if (isset($_REQUEST['vid']) && isset($_REQUEST['bid']) && isset($_REQUEST['mid'])) {
  $bid = mysqli_real_escape_string($con,$_REQUEST['bid']);
  $mid = mysqli_real_escape_string($con,$_REQUEST['mid']);
  $vid = mysqli_real_escape_string($con,$_REQUEST['vid']);
  $user = mysqli_real_escape_string($con,$_POST['uid']);
  $varupp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `tabletsvarient` WHERE `vid` = '$vid' && `product_name` = '$mid' "));
  $selectnodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `status` = 'active' AND `id` = '$mid' "));
  $modelimg = $selectnodel['product_image'];
  $mobilename = $selectnodel['product_name'];
  $catid = $selectnodel['categoryid'];
  // model questions start
  $selectquestion = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `tabletquestions` WHERE `status` = 'active' AND `product_name` = '$mid' "));
  $fuptovalue = $varupp['uptovalue'];
  $fswitchof = $selectquestion['switchof'];
  $fFrontcam = $selectquestion['Frontcam'];
  $fbackcam = $selectquestion['backcam'];
  $fwifi = $selectquestion['wifi'];
  $fspeaker = $selectquestion['speaker'];
  $fpowerhome = $selectquestion['power/home'];
  $fcharging = $selectquestion['charging'];
  $fbattery = $selectquestion['battery'];
  $fmicrophone = $selectquestion['microphone'];
  $fvolumebutton = $selectquestion['volumebutton'];
  $ffingerprint = $selectquestion['fingerprint'];
  $fgps = $selectquestion['gps'];
  $fbluetooth = $selectquestion['bluetooth'];
  $fcharger = $selectquestion['charger'];
  $fbox = $selectquestion['box'];
  $fbill = $selectquestion['bill'];
  $fpencil = $selectquestion['pencil'];

  $fsflawless = $selectquestion['sflawless'];
  $fsgood = $selectquestion['sgood'];
  $fsaverege = $selectquestion['saverege'];
  $fsdamaged = $selectquestion['sdamaged'];

  $fpflawless = $selectquestion['pflawless'];
  $fpgood = $selectquestion['pgood'];
  $fpaverege = $selectquestion['paverege'];
  $fpdamaged = $selectquestion['pdamaged'];

  $foutofwarrenty = $selectquestion['outofwarrenty'];
  $fbelow3 = $selectquestion['below3'];
  $fa3to6 = $selectquestion['3to6'];
  $fa6to11 = $selectquestion['6to11'];
  $fabove11 = $selectquestion['above11'];
  // model questions end
  // user questions 
   $switch = mysqli_real_escape_string($con,$_POST['switch']);
  $frontcam = mysqli_real_escape_string($con,$_POST['frontcamera']);
  $backcma = mysqli_real_escape_string($con,$_POST['backcamera']);
  $wifi = mysqli_real_escape_string($con,$_POST['wifi']);
  $speaker = mysqli_real_escape_string($con,$_POST['speaker']);
  $powerbutton = mysqli_real_escape_string($con,$_POST['powerbutton']);
  $charging = mysqli_real_escape_string($con,$_POST['chargingport']);
  $microphone = mysqli_real_escape_string($con,$_POST['microphone']);
  $battery = mysqli_real_escape_string($con,$_POST['battery']);
  $volumebtn = mysqli_real_escape_string($con,$_POST['volumebtn']);
  $warin = mysqli_real_escape_string($con,$_POST['warin']);
  $age = mysqli_real_escape_string($con,$_POST['age']);
  $bluetooth = mysqli_real_escape_string($con,$_POST['bt']);
  $finger = mysqli_real_escape_string($con,$_POST['finger']);
  $gps = mysqli_real_escape_string($con,$_POST['gps']);
  $scondition = mysqli_real_escape_string($con,$_POST['condition']);
  $pcondition = mysqli_real_escape_string($con,$_POST['pcondition']);
  //functional question start
  $charger = mysqli_real_escape_string($con,$_POST['charger']);
  $pencil = mysqli_real_escape_string($con,$_POST['pencil']);
  $boximei = mysqli_real_escape_string($con,$_POST['boximei']);
  $billimei = mysqli_real_escape_string($con,$_POST['billimei']);
  // age and warrenty start
  if(!empty($warin))
  {
    if($warin == "out of Warranty"){
      $warrenty = $foutofwarrenty;
      $ageded = 0;
    }
    elseif($warin == ""){
      $warrenty = 0;
      if($age != null){
        if($age == "Under 3 Months"){
            $ageded = $fbelow3;
        }elseif($age == "3 To 6 Months"){
            $ageded = $fa3to6;
        }
        elseif($age == "6 To 11 Months"){
            $ageded = $fa6to11;
        }
        elseif($age == "Above 11 Months"){
            $ageded = $fabove11;
        }else{
            $ageded = 0;
        }
      }else{
            $ageded = 0;
      }
    }
  }else{
      $warrenty = 0;
      if($age != null){
        if($age == "Under 3 Months"){
            $ageded = $fbelow3;
        }elseif($age == "3 To 6 Months"){
            $ageded = $fa3to6;
        }
        elseif($age == "6 To 11 Months"){
            $ageded = $fa6to11;
        }
        elseif($age == "Above 11 Months"){
            $ageded = $fabove11;
        }else{
            $ageded = 0;
        }
      }else{
        $ageded = 0;
      }
    }
  // age and warrenty end
    $updatedupto = $fuptovalue - ($warrenty/100)*$fuptovalue;
  // age warrenty end 
  //  calculations start here
if($switch != null){
  if($switch == "no"){
   $switchded = $fswitchof;  
  }else{
   $switchded = 0; 
  }
}else{
   $switchded = 0; 
 }

if ($frontcam != null) {
  if ($frontcam ==  "Front Camera not working") {
   $frontcamded = $fFrontcam;
  }
}
else{
  $frontcamded = 0;
}

if ($backcma != null) {
  if ($backcma ==  "Back Camera not working") {
   $backcmaded = $fbackcam;
  }
}
else{
  $backcmaded = 0;
}

if ($wifi != null) {
  if ($wifi ==  "Wifi not working") {
   $wifided = $fwifi;
  }
}
else{
  $wifided = 0;
}

if ($speaker != null) {
  if ($speaker ==  "Speakers not working") {
     $speakerded = $fspeaker;
  }
}
else{
  $speakerded = 0;
}

if ($powerbutton != null) {
  if ($powerbutton ==  "Power/Home Button not working") {
   $powerbuttonded = $fpowerhome;
  }
}
else{
  $powerbuttonded = 0;
}

if ($charging != null) {
  if ($charging ==  "Charging Port not working") {
   $chargingded = $fcharging;
  }
}
else{
  $chargingded = 0;
}

if ($microphone != null) {
  if ($microphone ==  "Microphone not working") {
   $microphoneded = $fmicrophone;
  }
}
else{
  $microphoneded = 0;
}

if ($battery != null) {
  if ($battery ==  "Battery not working") {
   $batteryded = $fbattery;
  }
}
else{
  $batteryded = 0;
}

if ($volumebtn != null) {
  if ($volumebtn ==  "Volume Button not working") {
   $volumebtnded = $fvolumebutton;
  }
}
else{
  $volumebtnded = 0;
}

if ($bluetooth != null) {
  if ($bluetooth ==  "Bluetooth not working") {
   $bluetoothded = $fbluetooth;
  }
}
else{
  $bluetoothded = 0;
}

if ($finger != null) {
  if ($finger ==  "Finger Print not working") {
   $fingerded = $ffingerprint;
  }
}
else{
  $fingerded = 0;
}

if ($gps != null) {
  if ($gps ==  "GPS not working") {
      $gpsded = $fgps;
  }
}
else{
  $gpsded = 0;
}

if ($scondition != null) {
  if ($scondition ==  "flawless") {
    $sconditionded = $fsflawless;
  }elseif($scondition ==  "good") {
    $sconditionded = $fsgood;
  }elseif($scondition ==  "averege") {
    $sconditionded = $fsaverege;
  }elseif($scondition ==  "below averege") {
    $sconditionded = $fsdamaged;
  }
}
else{
  $sconditionded = 0;
}


if ($pcondition != null) {
  if ($pcondition ==  "flawless") {
    $pconditionded = $fpflawless;
  }elseif($pcondition ==  "good") {
    $pconditionded = $fpgood;
  }elseif($pcondition ==  "averege") {
    $pconditionded = $fpaverege;
  }elseif($pcondition ==  "below averege") {
    $pconditionded = $fpdamaged;
  }
}
else{
  $pconditionded = 0;
}

// accesseries question start
if ($charger != null) {
if ($charger ==  "Original Charger") {
    $chargerded = 0;
}
}
else{
$chargerded = $fcharger;
}

if ($pencil != null) {
if ($pencil ==  "Original S Pen") {
    $penciled = 0;
}
}
else{
$penciled = $fpencil;
}

if ($boximei != null) {
if ($boximei ==  "Original Box") {
    $boximeided = 0;
}
}
else{
$boximeided = $fbox;
}

if ($billimei != null) {
if ($billimei ==  "Valid Bill") {
  $billimeided = 0;
}
}
else{
$billimeided = $fbill;
}

// calculate 

 $sumpercentvalue = $switchded + $frontcamded + $backcmaded + $wifided + $speakerded + $powerbuttonded + $chargingded + $microphoneded + $batteryded + $volumebtnded + $bluetoothded + $fingerded + $gpsded + $sconditionded + $pconditionded + $ageded + 
                 $billimeided + $boximeided + $penciled + $chargerded;
               
$netdeductpercenet = ($sumpercentvalue/100)*$updatedupto;
$offerprice = $updatedupto - $netdeductpercenet;
$offerprice = round($offerprice);
$offerprice = round($offerprice/10)*10;

$gennorderr = "MOB".time();
$insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`brandid`,`modelid`,`model_name`,`mimg`,`offerprice`,
`switchof`,`front_camera`,`back_camera`,`wifi`,`speaker`,`power_btn`,`charging_port`,`microphone`,`battery`,`volume`,
`bluetooth`,`finger_touch`,`gps`,`warenty`,`age`,`conditions`,`pcondition`,`charger`,`pencil`,`boximei`,`billimei`,`varientid`) VALUES('$gennorderr','$user','$catid','$bid','$mid','$mobilename','$modelimg','$offerprice',
'$switch','$frontcam','$backcma','$wifi','$speaker','$powerbutton','$charging','$microphone','$battery','$volumebtn','$bluetooth','$finger','$gps','$warin','$age','$scondition','$pcondition','$charger','$pencil','$boximei','$billimei','$vid') ");
if($insertenquiry)
  {
    $enqid = mysqli_insert_id($con);
    mysqli_query($con,"UPDATE `enquiry` SET  `vendor_id`='15' WHERE `id` = '$enqid'");
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

}


