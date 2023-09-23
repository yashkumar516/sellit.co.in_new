<?php
if (isset($_POST['otpverify'])) {
  $bid = $_REQUEST['bid'];
  $mid = $_REQUEST['mid'];
  $vid = $_REQUEST['vid'];
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
  $switch = $_POST['switch'];
  $frontcam = $_POST['touchscreen'];
  $backcma = $_POST['battery'];
  $wifi = $_POST['wifi'];
  $speaker = $_POST['speaker'];
  $powerbutton = $_POST['charging'];
  $charging = $_POST['dc'];
  $microphone = $_POST['button'];
  $battery = $_POST['optical'];
  $volumebtn = $_POST['bluetooth'];
  $warin = $_POST['warin'];
  $age = $_POST['age'];
  $bluetooth = $_POST['bt'];
  $finger = $_POST['finger'];
  $gps = $_POST['gps'];
  $scondition = $_POST['condition'];
  $pcondition = $_POST['pcondition'];
  //functional question start
  $charger = $_POST['charger'];
  $pencil = $_POST['strap'];
  $boximei = $_POST['boximei'];
  $billimei = $_POST['billimei'];
  // age and warrenty start
  if(!empty($warin))
  {
    if($warin == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty"){
      $warrenty = $foutofwarrenty;
      $ageded = 0;
    }
    elseif($warin == ""){
      $warrenty = 0;
      if($age != null){
        if($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months"){
            $ageded = $fbelow3;
        }elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months"){
            $ageded = $fa3to6;
        }
        elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months"){
            $ageded = $fa6to11;
        }
        elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months"){
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
        if($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months"){
            $ageded = $fbelow3;
        }elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months"){
            $ageded = $fa3to6;
        }
        elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months"){
            $ageded = $fa6to11;
        }
        elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months"){
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
  if($switch == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no"){
   $switchded = $fswitchof;  
  }else{
   $switchded = 0; 
  }
}else{
   $switchded = 0; 
 }

if ($frontcam != null) {
  if ($frontcam ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Front Camera not working") {
   $frontcamded = $fFrontcam;
  }
}
else{
  $frontcamded = 0;
}

if ($backcma != null) {
  if ($backcma ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Back Camera not working") {
   $backcmaded = $fbackcam;
  }
}
else{
  $backcmaded = 0;
}

if ($wifi != null) {
  if ($wifi ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Wifi not working") {
   $wifided = $fwifi;
  }
}
else{
  $wifided = 0;
}

if ($speaker != null) {
  if ($speaker ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Speakers not working") {
     $speakerded = $fspeaker;
  }
}
else{
  $speakerded = 0;
}

if ($powerbutton != null) {
  if ($powerbutton ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Power/Home Button not working") {
   $powerbuttonded = $fpowerhome;
  }
}
else{
  $powerbuttonded = 0;
}

if ($charging != null) {
  if ($charging ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Charging Port not working") {
   $chargingded = $fcharging;
  }
}
else{
  $chargingded = 0;
}

if ($microphone != null) {
  if ($microphone ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Microphone not working") {
   $microphoneded = $fmicrophone;
  }
}
else{
  $microphoneded = 0;
}

if ($battery != null) {
  if ($battery ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Battery not working") {
   $batteryded = $fbattery;
  }
}
else{
  $batteryded = 0;
}

if ($volumebtn != null) {
  if ($volumebtn ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Volume Button not working") {
   $volumebtnded = $fvolumebutton;
  }
}
else{
  $volumebtnded = 0;
}

if ($bluetooth != null) {
  if ($bluetooth ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bluetooth not working") {
   $bluetoothded = $fbluetooth;
  }
}
else{
  $bluetoothded = 0;
}

if ($finger != null) {
  if ($finger ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Finger Print not working") {
   $fingerded = $ffingerprint;
  }
}
else{
  $fingerded = 0;
}

if ($gps != null) {
  if ($gps ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>GPS not working") {
      $gpsded = $fgps;
  }
}
else{
  $gpsded = 0;
}

if ($scondition != null) {
  if ($scondition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>flawless") {
    $sconditionded = $fsflawless;
  }elseif($scondition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>good") {
    $sconditionded = $fsgood;
  }elseif($scondition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>averege") {
    $sconditionded = $fsaverege;
  }elseif($scondition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>below averege") {
    $sconditionded = $fsdamaged;
  }
}
else{
  $sconditionded = 0;
}


if ($pcondition != null) {
  if ($pcondition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>flawless") {
    $pconditionded = $fpflawless;
  }elseif($pcondition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>good") {
    $pconditionded = $fpgood;
  }elseif($pcondition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>averege") {
    $pconditionded = $fpaverege;
  }elseif($pcondition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>below averege") {
    $pconditionded = $fpdamaged;
  }
}
else{
  $pconditionded = 0;
}

// accesseries question start
if ($charger != null) {
if ($charger ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Charger") {
    $chargerded = 0;
}
}
else{
$chargerded = $fcharger;
}

if ($pencil != null) {
if ($pencil ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original S Pen") {
    $penciled = 0;
}
}
else{
$penciled = $fpencil;
}

if ($boximei != null) {
if ($boximei ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Box") {
    $boximeided = 0;
}
}
else{
$boximeided = $fbox;
}

if ($billimei != null) {
if ($billimei ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Valid Bill") {
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

//enquiry code start

if($switch != null){
  $switchwat = explode("</i>",$switch);
}else{
  $switchwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($frontcam != null){
$frontcamwat = explode("</i>",$frontcam);
}else{
$frontcamwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($backcma != null){
$backcmawat = explode("</i>",$backcma);
}else{
$backcmawat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($wifi != null){
$wifiwat = explode("</i>",$wifi);
}else{
$wifiwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($speaker != null){
$speakerwat = explode("</i>",$speaker);
}else{
$speakerwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($powerbutton != null){
$powerbuttonwat = explode("</i>",$powerbutton);
}else{
$powerbuttonwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($charging != null){
$chargingwat = explode("</i>",$charging);
}else{
$chargingwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($microphone != null){
$microphonewat = explode("</i>",$microphone);
}else{
$microphonewat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($battery != null){
$batterywat = explode("</i>",$battery);
}else{
$batterywat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($volumebtn != null){
$volumebtnwat = explode("</i>",$volumebtn);
}else{
$volumebtnwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

// start 3
if($bluetooth != null){
  $bluetoothwat = explode("</i>",$bluetooth);
  }else{
  $bluetoothwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

if($finger != null){
    $fingerwat = explode("</i>",$finger);
    }else{
    $fingerwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
 }

if($gps != null){
      $gpswat = explode("</i>",$gps);
      }else{
      $gpswat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }
// end 3 

if($warin != null){
$warinwat = explode("</i>",$warin);
}else{
$warinwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($age != null){
$agewat = explode("</i>",$age);
}else{
$agewat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($scondition != null){
$sconditionwat = explode("</i>",$scondition);
}else{
$sconditionwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($pcondition != null){
$pconditionwat = explode("</i>",$pcondition);
}else{
$pconditionwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($charger != null){
$chargerwat = explode("</i>",$charger);
}else{
$chargerwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($pencil != null){
$pencilwat = explode("</i>",$pencil);
}else{
$pencilwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($boximei != null){
  $boximeiwat = explode("</i>",$boximei);
  }else{
  $boximeiwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

if($billimei != null){
    $billimeiwat = explode("</i>",$billimei);
    }else{
    $billimeiwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

if(isset($_SESSION['user'])){
$user = $_SESSION['user'];
$gennorderr = "MOB".time();
$insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`brandid`,`modelid`,`model_name`,`mimg`,`offerprice`,
`switchof`,`front_camera`,`back_camera`,`wifi`,`speaker`,`power_btn`,`charging_port`,`microphone`,`battery`,`volume`,
`bluetooth`,`finger_touch`,`gps`,`warenty`,`age`,`conditions`,`pcondition`,`charger`,`pencil`,`boximei`,`billimei`,`varientid`) VALUES('$gennorderr','$user','$catid','$bid','$mid','$mobilename','$modelimg','$offerprice',
'$switchwat[1]','$frontcamwat[1]','$backcmawat[1]','$wifiwat[1]','$speakerwat[1]','$powerbuttonwat[1]','$chargingwat[1]',
'$microphonewat[1]','$batterywat[1]','$volumebtnwat[1]','$bluetoothwat[1]','$fingerwat[1]','$gpswat[1]','$warinwat[1]','$agewat[1]',
'$sconditionwat[1]','$pconditionwat[1]','$chargerwat[1]','$pencilwat[1]','$boximeiwat[1]','$billimeiwat[1]','$vid') ");
if($insertenquiry)
{ 
$lastidquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT `id` FROM `enquiry` ORDER BY `id` DESC LIMIT 1 "));
if($lastidquery){
$lastid = $lastidquery['id'];
echo "<script>
 window.location.href = 'price-summary.php?enid='+ $lastid;
</script>";
}
}else{
echo '<script>
alert("enquiry not inserted");
</script>';
}

}else{
$mobile = $_POST['mobile'];
$user = $_POST['uid'];
$code = $_POST['code'];
$name = $_POST['name'];

//start verifycode
  if($code == $_SESSION['otp']){
      if($user != ''){
           $_SESSION['user'] = $user;
           $user = $_SESSION['user']; 
      }else{
           $query = mysqli_query($con,"INSERT INTO `userrecord` (`mobile`,`name`) VALUES('$mobile','$name')");
         if( $query){
             $seluid = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `mobile` = '$mobile' ORDER BY `id` DESC  LIMIT 1  "));
             if($seluid){
                $user = $seluid['id'];
                 $_SESSION['user'] = $user; 
             }
         }
      }
//  end verify code

$gennorderr = "MOB".time();
$insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`brandid`,`modelid`,`model_name`,`mimg`,`offerprice`,
`switchof`,`front_camera`,`back_camera`,`wifi`,`speaker`,`power_btn`,`charging_port`,`microphone`,`battery`,`volume`,
`bluetooth`,`finger_touch`,`gps`,`warenty`,`age`,`conditions`,`pcondition`,`charger`,`pencil`,`boximei`,`billimei`,`varientid`) VALUES('$gennorderr','$user','$catid','$bid','$mid','$mobilename','$modelimg','$offerprice',
'$switchwat[1]','$frontcamwat[1]','$backcmawat[1]','$wifiwat[1]','$speakerwat[1]','$powerbuttonwat[1]','$chargingwat[1]',
'$microphonewat[1]','$batterywat[1]','$volumebtnwat[1]','$bluetoothwat[1]','$fingerwat[1]','$gpswat[1]','$warinwat[1]','$agewat[1]',
'$sconditionwat[1]','$pconditionwat[1]','$chargerwat[1]','$pencilwat[1]','$boximeiwat[1]','$billimeiwat[1]','$vid') ");
if($insertenquiry)
{ 
$lastidquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT `id` FROM `enquiry` ORDER BY `id` DESC LIMIT 1 "));
$lastid = $lastidquery['id'];

 echo "<script>
        window.location.href = 'price-summary.php?enid='+ $lastid;
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
//enquiry coding end 
}

