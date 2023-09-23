<?php
session_start();
include '../admin/includes/confile.php';
if(isset($_POST['query'])){
    $bid = $_REQUEST['bid'];
    $mid = $_REQUEST['mid'];
    $vid = $_REQUEST['vid'];
      // user question start
    $switch = $_POST['switch'];
    $warin = $_POST['warin'];
     $varupp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `tabletsvarient` WHERE `vid` = '$vid' && `product_name` = '$mid' "));
    $selectnodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `status` = 'active' AND `id` = '$mid' "));
    $modelimg = $selectnodel['product_image'];
    $mobilename = $selectnodel['product_name'];
    $catid = $selectnodel['categoryid'];
    //question query start
    $selectquestion = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `tabletquestions` WHERE `status` = 'active' AND `product_name` = '$mid' "));
    $uptovalue = $varupp['uptovalue'];
    $switchof = $selectquestion['switchof'];
    $outofwarrenty = $selectquestion['outofwarrenty'];

    // calculation start
if(!empty($warin))
 {
  if($warin == "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of warrenty"){
    $warrenty = $outofwarrenty;
  }
  elseif($warin == ""){
   $warrenty = 0;
  }
}else{
    $warrenty = 0;
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

 $sumpercentvalue = $switchded;
 $netdeductpercenet = ($sumpercentvalue/100)*$updatedupto;
 $offerprice = $updatedupto - $netdeductpercenet;
 $offerprice = round($offerprice);
$offerprice = round($offerprice/10)*10;

// enquiry start
// mobile and code end
 if($switch != null){
     $switchwat = explode("</i>",$switch);
 }else{
     $switchwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
 }

 if($warin != null){
     $warinwat = explode("</i>",$warin);
 }else{
     $warinwat = explode("</i>","<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>");
 }


 if(isset($_SESSION['user'])){
	 $user = $_SESSION['user'];
	 $gennorderr = "MOB".time();
	 $age = "Above 11 Months";
 $insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`modelid`,`model_name`,`mimg`,`offerprice`,
 `switchof`,`age`,`warenty`) VALUES('$gennorderr','$user','$catid','$mid','$mobilename','$modelimg','$offerprice',
 '$switchwat[1]','$age','$warinwat[1]') ");
 if($insertenquiry)
 { 
  $lastidquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT `id` FROM `enquiry` ORDER BY `id` DESC LIMIT 1 "));
  if($lastidquery){
  $lastid = $lastidquery['id'];
  mysqli_query($con,"UPDATE `enquiry` SET  `vendor_id`='15' WHERE `id` = '$lastid'");

  echo "<script>
     window.location.href = '../price-summary.php?enid='+ $lastid;
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
$email = $_POST['email'];

if($code == $_SESSION['otp']){
      if($user != ''){
           $_SESSION['user'] = $user;
      }else{
           $query = mysqli_query($con,"INSERT INTO `userrecord` (`mobile`,`name`,`email`) VALUES('$mobile','$name','$email')");
         if( $query){
             $seluid = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `mobile` = '$mobile' ORDER BY `id` DESC  LIMIT 1  "));
             if($seluid){
                $user = $seluid['id'];
                 $_SESSION['user'] = $user;
             }
         }
      }
      $gennorderr = "MOB".time();
      $age = "Above 11 Months";
 $insertenquiry = mysqli_query($con,"INSERT INTO `enquiry` (`genorderid`,`userid`,`catid`,`modelid`,`model_name`,`mimg`,`offerprice`,
	 `switchof`,`age`,`warenty`) VALUES('$gennorderr','$user','$catid','$mid','$mobilename','$modelimg','$offerprice','$switchwat[1]','$age','$warinwat[1]') ");

 if($insertenquiry)
 { 
  $lastidquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT `id` FROM `enquiry` ORDER BY `id` DESC LIMIT 1 "));
  if($lastidquery){
  $lastid = $lastidquery['id'];
  mysqli_query($con,"UPDATE `enquiry` SET  `vendor_id`='15' WHERE `id` = '$lastid'");
  
  $upuser = mysqli_query($con,"UPDATE `userrecord` SET `name` = '$name' WHERE `id` = '$user'  ");
  if($upuser){
  echo "<script>
     window.location.href = '../price-summary.php?enid='+ $lastid;
  </script>";
   }
  }
 }else{
   echo "<script>
   alert('query not inserted');
   </script>";
 }
 }else{
     echo '<script>
    alert("code not matched");
    </script>';
}

}
}
?>
