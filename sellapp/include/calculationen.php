
<?php
if (isset($_POST['otpverify'])) {
    $bid = $_REQUEST['bid'];
    $mid = $_REQUEST['mid'];
    $selectnodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `status` = 'active' AND `id` = '$mid' "));
    $modelimg = $selectnodel['product_image'];
    $mobilename = $selectnodel['product_name'];
    $catid = $selectnodel['categoryid'];
    // model questions start
    $selectquestion = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `watchquestions` WHERE `status` = 'active' AND `product_name` = '$mid' "));
    $uptovalue = $selectquestion['uptovalue'];
    $switchof = $selectquestion['switchof'];
    $under3 = $selectquestion['under3'];
    $u3to6 = $selectquestion['3to6'];
    $u6to11 = $selectquestion['6to11'];
    $above11 = $selectquestion['above11'];
    $touchfaulty = $selectquestion['touchfaulty'];
    $fwifi = $selectquestion['wifi'];
    $batteryfault = $selectquestion['batteryfault'];
    $magnetic = $selectquestion['magnetic'];
    $sidebutton = $selectquestion['sidebutton'];
    $digitalcrown = $selectquestion['digitalcrown'];
    $fspeaker = $selectquestion['speaker'];
    $opticalheart = $selectquestion['opticalheart'];
    $bluetoothfault = $selectquestion['bluetoothfault'];
    $fcharger = $selectquestion['charger'];
    $box = $selectquestion['box'];
    $fstrap = $selectquestion['strap'];
    $bill = $selectquestion['bill'];
    $flawless = $selectquestion['flawless'];
    $good = $selectquestion['good'];
    $averege = $selectquestion['averege'];
    $belowavere = $selectquestion['belowavere'];
    $outofwarrenty = $selectquestion['outofwarrenty'];
    // model questions end

    // user questions 
    $switch = $_POST['switch'];
    $touchscreen = $_POST['touchscreen'];
    $battery = $_POST['battery'];
    $wifi = $_POST['wifi'];
    $speaker = $_POST['speaker'];
    $charging = $_POST['charging'];
    $dc = $_POST['dc'];
    $button = $_POST['button'];
    $optical = $_POST['optical'];
    $bluetooth = $_POST['bluetooth'];
    $warin = $_POST['warin'];
    $age = $_POST['age'];
    $condition = $_POST['condition'];
    //  functional question start
    $charger = $_POST['charger'];
    $strap = $_POST['strap'];
    $boximei = $_POST['boximei'];
    $billimei = $_POST['billimei'];
 
if(!empty($warin))
{
  if($warin == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty"){
    $warrenty = $outofwarrenty;
    $ageded = 0;
  }
  elseif($warin == ""){
    $warrenty = 0;
    if($age != null){
      if($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months"){
         $ageded = $under3;
      }elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months"){
          $ageded = $u3to6;
      }
      elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months"){
          $ageded = $u6to11;
      }
      elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months"){
          $ageded = $above11;
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
         $ageded = $under3;
      }elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months"){
          $ageded = $u3to6;
      }
      elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months"){
          $ageded = $u6to11;
      }
      elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months"){
          $ageded = $above11;
      }else{
          $ageded = 0;
      }
    }else{
      $ageded = 0;
    }
  }
  
 $updatedupto = $uptovalue - ($warrenty/100)*$uptovalue;
//  calculations start here
if($switch != null){
   if($switch == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no"){
    $switchded = $switchof;  
   }else{
    $switchded = 0; 
   }
}else{
    $switchded = 0; 
}


if($condition != null){
  if($condition == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>flawless"){
    $conditionded = $flawless;
  }elseif($condition == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>good"){
    $conditionded = $good;
  }elseif($condition == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>averege"){
    $conditionded = $averege;
  }elseif($condition == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>below averege"){
    $conditionded = $belowavere;
  }else{
    $conditionded = 0;
  }
}else{
  $conditionded = 0;
}

if ($touchscreen != null) {
  if ($touchscreen ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Screen Touch - Faulty") {
   $touchfaultded = $touchfaulty;
  }
}
else{
  $touchfaultded = 0;
}

if ($battery != null) {
  if ($battery ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Battery is faulty") {
    $batteryded = $batteryfault;
  }
}
else{
  $batteryded = 0;
}


if ($wifi != null) {
  if ($wifi ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Wifi is faulty") {
    $wifided = $fwifi;
  }
}
else{
  $wifided = 0;
}

if ($speaker != null) {
  if ($speaker ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Speakers is faulty") {
    $speakerded = $fspeaker;
  }
}
else{
  $speakerded = 0;
}

if ($charging != null) {
  if ($charging ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Magnetic charging port is faulty") {
    $chargingded = $magnetic;
  }
}
else{
  $chargingded = 0;
}

if ($dc != null) {
  if ($dc ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Digital crown is faulty"){
    $dcded = $digitalcrown;
  }
}
else{
  $dcded = 0;
}

if ($button != null) {
  if ($button ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Side button is faulty"){
    $buttonded = $sidebutton;
  }
}
else{
  $buttonded = 0;
}

if ($optical != null) {
  if ($optical ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Optical heart sensor is faulty"){
    $opticalded = $opticalheart;
  }
}
else{
  $opticalded = 0;
}

if ($bluetooth != null) {
  if ($bluetooth ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bluetooth is faulty"){
    $bluetoothded = $bluetoothfault;
  }
}
else{
  $bluetoothded = 0;
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

if ($strap != null) {
    if ($strap ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>strap") {
        $strapded = 0;
    }
}
else{
    $strapded = $fstrap;
}

if ($boximei != null) {
    if ($boximei ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Box") {
        $boximeided = 0;
    }
}
else{
    $boximeided = $box;
}

if ($billimei != null) {
    if ($billimei ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bill") {
      $billimeided = 0;
    }
}
else{
    $billimeided = $bill;
}

// accesseries quuestion end
$sumpercentvalue = $switchded + $billimeided + $boximeided + $strapded + $chargerded + $bluetoothded + $opticalded
 + $buttonded + $dcded + $chargingded + $speakerded + $wifided + $batteryded + $touchfaultded + $conditionded + $ageded;
$netdeductpercenet = ($sumpercentvalue/100)*$updatedupto;
$offerprice = $updatedupto - $netdeductpercenet;
$offerprice = round($offerprice);
$offerprice = round($offerprice/10)*10;

// mobile and code end
   if($switch != null){
       $switchwat = explode("</i>",$switch);
   }else{
       $switchwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
   }

   if($billimei != null){
    $billimeiwat = explode("</i>",$billimei);
  }else{
   $billimeiwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($boximei != null){
    $boximeiwat = explode("</i>",$boximei);
  }else{
   $boximeiwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($strap != null){
    $strapwat = explode("</i>",$strap);
  }else{
   $strapwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($charger != null){
    $chargerwat = explode("</i>",$charger);
  }else{
    $chargerwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($bluetooth != null){
    $bluetoothwat = explode("</i>",$bluetooth);
  }else{
   $bluetoothwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }
   
  if($optical != null){
    $opticalwat = explode("</i>",$optical);
  }else{
   $opticalwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($button != null){
    $buttonwat = explode("</i>",$button);
  }else{
   $buttonwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($dc != null){
    $dcwat = explode("</i>",$dc);
  }else{
    $dcwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($charging != null){
    $chargingwat = explode("</i>",$charging);
  }else{
    $chargingwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($speaker != null){
    $speakerwat = explode("</i>",$speaker);
  }else{
   $speakerwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($wifi != null){
    $wifiwat = explode("</i>",$wifi);
  }else{
    $wifiwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($battery != null){
    $batterywat = explode("</i>",$battery);
  }else{
   $batterywat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($touchscreen != null){
    $touchfaultywat = explode("</i>",$touchscreen);
  }else{
    $touchfaultywat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($condition != null){
    $conditionwat = explode("</i>",$condition);
  }else{
    $conditionwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }

  if($age != null){
    $agewat = explode("</i>",$age);
  }else{
    $agewat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
  }
 if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
  $insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`userid`,`catid`,`modelid`,`model_name`,`mimg`,`offerprice`,
  `switchof`,`billimei`,`boximei`,`stap`,`charger`,`bluetooth`,`opticalheart`,`sidebutton`,`digitalcrown`,`charging_port`,
  `speaker`,`wifi`,`battery`,`touchscreen`,`conditions`,`age`) VALUES('$user','$catid','$mid','$mobilename','$modelimg','$offerprice',
  '$switchwat[1]','$billimeiwat[1]','$boximeiwat[1]','$strapwat[1]','$chargerwat[1]','$bluetoothwat[1]','$opticalwat[1]',
  '$buttonwat[1]','$dcwat[1]','$chargingwat[1]','$speakerwat[1]','$wifiwat[1]','$batterywat[1]','$touchfaultywat[1]','$conditionwat[1]',
  '$agewat[1]') ");
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
  $uid = $_POST['uid'];
  $code = $_POST['code'];
  $name = $_POST['name'];
  $insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`userid`,`catid`,`modelid`,`model_name`,`mimg`,`offerprice`,
  `switchof`,`billimei`,`boximei`,`stap`,`charger`,`bluetooth`,`opticalheart`,`sidebutton`,`digitalcrown`,`charging_port`,
  `speaker`,`wifi`,`battery`,`touchscreen`,`conditions`,`age`) VALUES('$uid','$catid','$mid','$mobilename','$modelimg','$offerprice',
  '$switchwat[1]','$billimeiwat[1]','$boximeiwat[1]','$strapwat[1]','$chargerwat[1]','$bluetoothwat[1]','$opticalwat[1]',
  '$buttonwat[1]','$dcwat[1]','$chargingwat[1]','$speakerwat[1]','$wifiwat[1]','$batterywat[1]','$touchfaultywat[1]','$conditionwat[1]',
  '$agewat[1]') ");
  if($insertenquiry)
  { 
   $lastidquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT `id` FROM `enquiry` ORDER BY `id` DESC LIMIT 1 "));
   if($lastidquery){
   $lastid = $lastidquery['id'];
   $_SESSION['user'] = $uid;
   $user = $_SESSION['user'];
   $upuser = mysqli_query($con,"UPDATE `userrecord` SET `name` = '$name' WHERE `id` = '$user'  ");
   if($upuser){
   echo "<script>
      window.location.href = 'price-summary.php?enid='+ $lastid;
   </script>";
    }
   }
  }else{
    echo '<script>
    alert("enquiry not inserted");
    </script>';
  }
}
//enquiry coding end 
}
?>



