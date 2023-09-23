<?php
session_start();
include 'config.php';
if ( isset($_REQUEST['mid'])) {
  $bid = mysqli_real_escape_string($con,$_REQUEST['bid']);
  $mid = mysqli_real_escape_string($con,$_REQUEST['mid']);
  $user = mysqli_real_escape_string($con,$_POST['uid']);
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
    if($warrenty == "Earbud Out of Warranty"){
      $dedwarrenty = $foutofwarrenty;
      $ageded = 0;
    }
    else{
      $dedwarrenty = 0;
      if($age != null){
        if($age == "Under 3 Months"){
           $ageded = $fbelow3;
        }elseif($age == "3 To 6 Months"){
            $ageded = $f3to6;
        }
        elseif($age == "6 To 11 Months"){
            $ageded = $f6to11;
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
      $dedwarrenty = 0;
      if($age != null){
        if($age == "Under 3 Months"){
           $ageded = $fbelow3;
        }elseif($age == "3 To 6 Months"){
            $ageded = $f3to6;
        }
        elseif($age == "6 To 11 Months"){
            $ageded = $f6to11;
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
    $updatedupto = $fuptovalue - ($dedwarrenty/100)*$fuptovalue;
  // age warrenty end 
  //  calculations start here
if($switch != null){
  if($switch == "Not Able To switch on"){
   $switchded = $fswitchof;  
  }else{
   $switchded = 0; 
  }
}else{
   $switchded = 0; 
 }

if ($speaker != null) {
  if ($speaker ==  "issues in speaker/mic") {
   $speakerded = $fspeaker;
  }else{
    $speakerded = 0;
  }
}
else{
  $speakerded = 0;
}

if ($connectivity != null) {
  if ($connectivity ==  "issues in connectivity"){
   $connectivityded = $fconnectivity;
  }else{
    $connectivityded = 0;
  }
}
else{
  $connectivityded = 0;
}

if ($condition != null) {
  if ($condition ==  "flawless") {
    $conditionded = $fflawless;
  }elseif($condition ==  "good") {
    $conditionded = $fgood;
  }elseif($condition ==  "averege") {
    $conditionded = $faverege;
  }elseif($condition ==  "below averege") {
    $conditionded = $fbelowaverege;
  }
}
else{
  $conditionded = 0;
}

// accesseries question start
if ($charger != null) {
if ($charger ==  "original charging case") {
    $chargerded = 0;
}
}
else{
$chargerded = $fcharger;
}

if ($cable != null) {
if ($cable ==  "charging cable") {
    $cableed = 0;
}
}
else{
$cableed = $fcable;
}

if ($invoice != null) {
if ($invoice ==  "invoice") {
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

$gennorderr = "MOB".time();
$insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`modelid`,`model_name`,`mimg`,`offerprice`,
`switchof`,`speaker`,`connectivity`,`physicalissue`,`warenty`,`conditions`,`age`,`charger`,`cable`,`billimei`) VALUES('$gennorderr','$user','$catid','$mid','$mobilename','$modelimg','$offerprice',
'$switch','$speaker','$connectivity','$physicalissue','$warrenty','$condition','$age','$charger','$cable','$invoice') ");
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
//enquiry coding end 
}

?>


