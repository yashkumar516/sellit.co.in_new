<?php
if (isset($_POST['otpverify'])) {
  $bid = $_REQUEST['bid'];
  $mid = $_REQUEST['mid'];
  $selectnodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `status` = 'active' AND `id` = '$mid' "));
  $modelimg = $selectnodel['product_image'];
  $mobilename = $selectnodel['product_name'];
  $catid = $selectnodel['categoryid'];
  // model questions start
  $selectquestion = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `earpodequestions` WHERE `status` = 'active' AND `product_name` = '$mid' "));
  $fuptovalue = $selectquestion['uptovalue'];
  $fswitchof = $selectquestion['switchof'];
  $fspeaker = $selectquestion['speaker/mic'];
  $fconnectivity = $selectquestion['connectivity'];
  $fcharger = $selectquestion['charger'];
  $fcable = $selectquestion['cable'];
  $finvoice = $selectquestion['invoice'];
  $foutofwarrenty = $selectquestion['outofwarrenty'];
  $fbelow3 = $selectquestion['below3'];
  $f3to6 = $selectquestion['3to6'];
  $f6to11 = $selectquestion['6to11'];
  $fabove11 = $selectquestion['above11'];

  $fflawless = $selectquestion['flawless'];
  $fgood = $selectquestion['good'];
  $faverege = $selectquestion['averege'];
  $fbelowaverege = $selectquestion['belowaverege'];
  // model questions end
  // user questions 
  $switch = $_POST['switch'];
  $speaker = $_POST['speaker'];
  $connectivity = $_POST['connectivity'];
  $physicalissue = $_POST['physicalissue'];
  $warrenty = $_POST['warrenty'];
  $condition = $_POST['condition'];
  $age = $_POST['age'];
  $charger = $_POST['charger'];
  $cable = $_POST['cable'];
  $invoice = $_POST['invoice'];
  // age and warrenty start
  if(!empty($warrenty))
  {
    if($warrenty == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty"){
      $dedwarrenty = $foutofwarrenty;
      $ageded = 0;
    }
    else{
      $dedwarrenty = 0;
      if($age != null){
        if($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months"){
           $ageded = $fbelow3;
        }elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months"){
            $ageded = $f3to6;
        }
        elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months"){
            $ageded = $f6to11;
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
      $dedwarrenty = 0;
      if($age != null){
        if($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months"){
           $ageded = $fbelow3;
        }elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months"){
            $ageded = $f3to6;
        }
        elseif($age == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months"){
            $ageded = $f6to11;
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
    $updatedupto = $fuptovalue - ($dedwarrenty/100)*$fuptovalue;
  // age warrenty end 
  //  calculations start here
if($switch != null){
  if($switch == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To switch on"){
   $switchded = $fswitchof;  
  }else{
   $switchded = 0; 
  }
}else{
   $switchded = 0; 
 }

if ($speaker != null) {
  if ($speaker ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>issues in speaker/mic") {
   $speakerded = $fspeaker;
  }else{
    $speakerded = 0;
  }
}
else{
  $speakerded = 0;
}

if ($connectivity != null) {
  if ($connectivity ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>issues in connectivity"){
   $connectivityded = $fconnectivity;
  }else{
    $connectivityded = 0;
  }
}
else{
  $connectivityded = 0;
}

if ($condition != null) {
  if ($condition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>flawless") {
    $conditionded = $fflawless;
  }elseif($condition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>good") {
    $conditionded = $fgood;
  }elseif($condition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>averege") {
    $conditionded = $faverege;
  }elseif($condition ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>below averege") {
    $conditionded = $fbelowaverege;
  }
}
else{
  $conditionded = 0;
}

// accesseries question start
if ($charger != null) {
if ($charger ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>original charging case") {
    $chargerded = 0;
}
}
else{
$chargerded = $fcharger;
}

if ($cable != null) {
if ($cable ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>charging cable") {
    $cableed = 0;
}
}
else{
$cableed = $fcable;
}

if ($invoice != null) {
if ($invoice ==  "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>invoice") {
  $invoiceded = 0;
}
}
else{
$invoiceded = $finvoice;
}

// calculate 

$sumpercentvalue = $switchded + $ageded + $speakerded + $connectivityded + $conditionded + $chargerded + $cableed + $invoiceded;
$netdeductpercenet = ($sumpercentvalue/100)*$updatedupto;
$offerprice = $updatedupto - $netdeductpercenet;
$offerprice = round($offerprice/10)*10;

//enquiry code start

if($switch != null){
  $switchwat = explode("</i>",$switch);
}else{
  $switchwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($speaker != null){
$speakerwat = explode("</i>",$speaker);
}else{
$speakerwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($connectivity != null){
$connectivitywat = explode("</i>",$connectivity);
}else{
$connectivitywat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($physicalissue != null){
$physicalissuewat = explode("</i>",$physicalissue);
}else{
$physicalissuewat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($warrenty != null){
$warrentywat = explode("</i>",$warrenty);
}else{
$warrentywat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
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

if($charger != null){
$chargerwat = explode("</i>",$charger);
}else{
$chargerwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($cable != null){
$cablewat = explode("</i>",$cable);
}else{
$cablewat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if($invoice != null){
$invoicewat = explode("</i>",$invoice);
}else{
$invoicewat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
}

if(isset($_SESSION['user'])){
$user = $_SESSION['user'];
$insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`userid`,`catid`,`modelid`,`model_name`,`mimg`,`offerprice`,
`switchof`,`speaker`,`connectivity`,`physicalissue`,`warenty`,`conditions`,`age`,`charger`,`cable`,`billimei`) VALUES('$user','$catid','$mid','$mobilename','$modelimg','$offerprice',
'$switchwat[1]','$speakerwat[1]','$connectivitywat[1]','$physicalissuewat[1]','$warrentywat[1]','$conditionwat[1]','$agewat[1]',
'$chargerwat[1]','$cablewat[1]','$invoicewat[1]') ");
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
$insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`userid`,`catid`,`modelid`,`model_name`,`mimg`,`offerprice`,
`switchof`,`speaker`,`connectivity`,`physicalissue`,`warenty`,`conditions`,`age`,`charger`,`cable`,`billimei`) VALUES('$user','$catid','$mid','$mobilename','$modelimg','$offerprice',
'$switchwat[1]','$speakerwat[1]','$connectivitywat[1]','$physicalissuewat[1]','$warrentywat[1]','$conditionwat[1]','$agewat[1]',
'$chargerwat[1]','$cablewat[1]','$invoicewat[1]') ");
if($insertenquiry)
{ 
$lastidquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT `id` FROM `enquiry` ORDER BY `id` DESC LIMIT 1 "));
if($lastidquery){
$lastid = $lastidquery['id'];
$_SESSION['user'] = $user;
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

