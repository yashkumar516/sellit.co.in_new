
<?php
 session_start();
include 'config.php';
if (isset($_REQUEST['mid'])){
    $bid = $_REQUEST['bid'];
    $mid = $_REQUEST['mid'];
    $user = $_POST['uid'];
    $selectnodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `status` = 'active' AND `id` = '$mid' "));
    $modelimg = $selectnodel['product_image'];
    $mobilename = $selectnodel['product_name'];
    $catid = $selectnodel['categoryid'];
    // model questions start
    $selectquestion = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `watchquestions` WHERE `status` = 'active' AND `product_name` = '$mid' "));
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
  if($warin == "out of Warranty"){
    $warrenty = $outofwarrenty;
    $ageded = 0;
  }
  elseif($warin == ""){
    $warrenty = 0;
    if($age != null){
      if($age == "Under 3 Months"){
         $ageded = $under3;
      }elseif($age == "3 To 6 Months"){
          $ageded = $u3to6;
      }
      elseif($age == "6 To 11 Months"){
          $ageded = $u6to11;
      }
      elseif($age == "Above 11 Months"){
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
      if($age == "Under 3 Months"){
         $ageded = $under3;
      }elseif($age == "3 To 6 Months"){
          $ageded = $u3to6;
      }
      elseif($age == "6 To 11 Months"){
          $ageded = $u6to11;
      }
      elseif($age == "Above 11 Months"){
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
   if($switch == "no"){
    $switchded = $switchof;  
   }else{
    $switchded = 0; 
   }
 }else{
    $switchded = 0; 
 }

if($condition != null){
  if($condition == "flawless"){
    $conditionded = $flawless;
  }elseif($condition == "good"){
    $conditionded = $good;
  }elseif($condition == "averege"){
    $conditionded = $averege;
  }elseif($condition == "below averege"){
    $conditionded = $belowavere;
  }else{
    $conditionded = 0;
  }
}else{
  $conditionded = 0;
}

if ($touchscreen != null) {
  if ($touchscreen ==  "Screen Touch - Faulty") {
   $touchfaultded = $touchfaulty;
  }
}
else{
  $touchfaultded = 0;
}

if ($battery != null) {
  if ($battery ==  "Battery is faulty") {
    $batteryded = $batteryfault;
  }
}
else{
  $batteryded = 0;
}


if ($wifi != null) {
  if ($wifi ==  "Wifi is faulty") {
    $wifided = $fwifi;
  }
}
else{
  $wifided = 0;
}

if ($speaker != null) {
  if ($speaker ==  "Speakers is faulty") {
    $speakerded = $fspeaker;
  }
}
else{
  $speakerded = 0;
}

if ($charging != null) {
  if ($charging ==  "Magnetic charging port is faulty") {
    $chargingded = $magnetic;
  }
}
else{
  $chargingded = 0;
}

if ($dc != null) {
  if ($dc ==  "Digital crown is faulty"){
    $dcded = $digitalcrown;
  }
}
else{
  $dcded = 0;
}

if ($button != null) {
  if ($button ==  "Side button is faulty"){
    $buttonded = $sidebutton;
  }
}
else{
  $buttonded = 0;
}

if ($optical != null) {
  if ($optical ==  "Optical heart sensor is faulty"){
    $opticalded = $opticalheart;
  }
}
else{
  $opticalded = 0;
}

if ($bluetooth != null) {
  if ($bluetooth ==  "Bluetooth is faulty"){
    $bluetoothded = $bluetoothfault;
  }
}
else{
  $bluetoothded = 0;
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

if ($strap != null) {
    if ($strap ==  "strap") {
        $strapded = 0;
    }
}
else{
    $strapded = $fstrap;
}

if ($boximei != null) {
    if ($boximei ==  "Box") {
        $boximeided = 0;
    }
}
else{
    $boximeided = $box;
}

if ($billimei != null) {
    if ($billimei ==  "Bill") {
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

   $gennorderr = "MOB".time();
   $insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`modelid`,`model_name`,`mimg`,`offerprice`,
  `switchof`,`billimei`,`boximei`,`stap`,`charger`,`bluetooth`,`opticalheart`,`sidebutton`,`digitalcrown`,`charging_port`,
  `speaker`,`wifi`,`battery`,`touchscreen`,`conditions`,`age`,`warenty`) VALUES('$gennorderr','$user','$catid','$mid','$mobilename','$modelimg','$offerprice','$switch','$billimei','$boximei','$strap','$charger','$bluetooth','$optical','$button','$dc','$charging','$speaker','$wifi','$battery','$touchscreen','$condition','$age','$warin') ");
     if($insertenquiry) { 
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
}
?>





