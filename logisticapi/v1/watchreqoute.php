<?php
session_start();
ini_set("display_errors",1);
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: POST");
header("Content-type:application/json; charset=UTF-8");
include_once("../config/database.php");
include_once("../classes/calculation.php");

$db = new  Database();
$connection = $db->connect();
$checkleadquestions = new  Calculation($connection);

 if($_SERVER['REQUEST_METHOD'] === "POST"){    
    if(!empty($_POST['vendorid']) && !empty($_POST['lead_id']) && !empty($_POST['cat_id']) && !empty($_POST['deviceid'])){
        
        $switch = $_POST['switch'];
        $touchscreen = $_POST['touchscreen'];
        $battery = $_POST['battery'];
        $wifi = $_POST['wifi'];
        $speaker = $_POST['speaker'];
        $charging =  $_POST['charging'];
        // functional start
        $dc = $_POST['dc'];
        $button = $_POST['button'];
        $optical = $_POST['optical'];
        $bluetooth = $_POST['bluetooth'];
        $warin = $_POST['warin'];
        $age = $_POST['age'];
        $condition = $_POST['condition'];
        $charger = $_POST['charger'];
        $strap = $_POST['strap'];
        $boximei = $_POST['boximei'];
        $billimei = $_POST['billimei'];
     
        // questions end calculation part start
        
        $checkleadquestions->vendorid = $_POST['vendorid'];
        $checkleadquestions->lead_id = $_POST['lead_id'];
        $checkleadquestions->cat_id = $_POST['cat_id'];
        $checkleadquestions->deviceid = $_POST['deviceid'];
        $checkleadquestions->ajentid = $_POST['ajentid'];
        $leads = $checkleadquestions->checkwatchquestions();
        if($leads->num_rows>0){
         $selectquestion = $leads->fetch_assoc();
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
     
    
        // warrrenty and age calculation start
            if(strcmp($warin,"out of Warranty")==0){
               $warrenty = $outofwarrenty;
               $ageded = 0;
            }elseif(!empty($age)){
              $warrenty = 0;
             if(strcmp($age,"Under 3 Months")==0){
                 $ageded = $under3;
             }elseif(strcmp($age,"3 To 6 Months")==0){
                 $ageded = $u3to6;
             }elseif(strcmp($age,"6 To 11 Months")==0){
                 $ageded = $u6to11;
             }elseif(strcmp($age,"Above 11 Months")==0){
                 $ageded = $above11;
             }else{
                 $ageded = 0; 
             }
            }else{
             $warrenty = 0;
             $ageded = 0;
            }
         // warrrenty and age calculation end
         
        $updateuptovalue =$uptovalue - ($warrenty/100)*$uptovalue;
         
        if(!empty($condition)){
             if(strcmp($condition,"flawless")==0){
                 $conditionded = $flawless;
             }elseif(strcmp($condition,"good")==0){
                 $conditionded = $good;
             }elseif(strcmp($condition,"averege")==0){
                 $conditionded = $averege;
             }elseif(strcmp($condition,"below averege")==0){
                 $conditionded = $belowavere;
             }else{
                 $conditionded = 0; 
             }
         }else{
             $conditionded = 0;
         }
         
            if(!empty($switch)){
              if(strcmp($switch,"yes")==0){
                 $switchded = 0;  
              }else{
                 $switchded = $switchof;
              }
             }else{
                $switchded = $switchof;
             }
           
          if(!empty($charger)){
              if(strcmp($charger,"Original Charger")==0){
                 $chargerded = 0;  
              }else{
                 $chargerded = $fcharger;
              }
          }else{
              $chargerded = $fcharger;
          }
           
          if(!empty($strap)){
              if(strcmp($strap,"strap")==0){
                 $strapded = 0;  
              }else{
                 $strapded = $fstrap;
              }
          }else{
                $strapded = $fstrap;
          }
           
          if(!empty($boximei)){
              if(strcmp($boximei,"Box")==0){
                 $boxded = 0;  
              }else{
                 $boxded = $box;
              }
          }else{
              $boxded = $box;
          }
           
            if(!empty($billimei)){
              if(strcmp($billimei,"Bill")==0){
                 $billded = 0;  
              }else{
                 $billded = $bill;
              }
          }else{
              $billded = $bill;
          }
           
             if(!empty($speaker)){
              if(strcmp($speaker,"Speakers is faulty")==0){
                 $speakerded = $fspeaker;  
              }else{
                 $speakerded = 0;
              }
          }else{
              $speakerded = 0;
          }
           
          if(!empty($wifi)){
              if(strcmp($wifi,"Wifi is faulty")==0){
                 $wifided = $wifisel;  
              }else{
                 $wifided = 0;
              }
          }else{
                 $wifided = 0;
          }
           
          if(!empty($battery)){
              if(strcmp($battery,"Battery is faulty")==0){
                 $batteryded = $batteryfault;  
              }else{
                 $batteryded = 0;
              }
          }else{
                 $batteryded = 0;
          }
           
          if(!empty($bluetooth)){
              if(strcmp($bluetooth,"Bluetooth is faulty")==0){
                 $bluetoothded = $bluetoothfault;  
              }else{
                 $bluetoothded = 0;
              }
          }else{
                 $bluetoothded = 0;
          }
           
          if(!empty($touchscreen)){
              if(strcmp($touchscreen,"Screen Touch - Faulty")==0){
                 $touchscreended = $touchfaulty;
              }else{
                 $touchscreended = 0;
              }
          }else{
                 $touchscreended = 0;
          }
          
          if(!empty($button)){
              if(strcmp($button,"Side button is faulty")==0){
                 $buttonded = $sidebutton;
              }else{
                 $buttonded = 0;
              }
          }else{
                 $buttonded = 0;
          }
          
          if(!empty($optical)){
              if(strcmp($optical,"Optical heart sensor is faulty")==0){
                 $opticalded = $opticalheart;
              }else{
                 $opticalded = 0;
              }
          }else{
                 $opticalded = 0;
          }
          
          if(!empty($dc)){
              if(strcmp($dc,"Digital crown is faulty")==0){
                 $dcded = $digitalcrown;
              }else{
                 $dcded = 0;
              }
          }else{
                 $dcded = 0;
          }
          
          if(!empty($charging)){
              if(strcmp($charging,"Magnetic charging port is faulty")==0){
                 $charginged = $magnetic;
              }else{
                 $chargingded = 0;
              }
          }else{
                 $chargingded = 0;
          }
           
          $sumpercentvalue = $conditionded + $switchded + $chargerded + $strapded + $boxded + $billded + $speakerded + $wifided + $batteryded + 
                             $bluetoothded + $touchscreended + $buttonded + $opticalded + $dcded + $chargingded + $ageded;
          $netdeductpercenet = ($sumpercentvalue/100)*$updateuptovalue;
          
          $offerprice = $updateuptovalue - ($netdeductpercenet);
          $offerprice = round($offerprice);
          $offerpricef = round($offerprice/10)*10;

        // main calculation end
        
        // lead update start
        $checkleadquestions->lead_id = $_POST['lead_id'];
        $checkleadquestions->offerprice = $offerpricef;
        $checkleadquestions->switchof = $switch;
        $checkleadquestions->touchscreen = $touchscreen;
        $checkleadquestions->battery = $battery;
        $checkleadquestions->wifi = $wifi;
        $checkleadquestions->speaker = $speaker;
        $checkleadquestions->charging = $charging;
        $checkleadquestions->dc = $dc;
        $checkleadquestions->button = $button;
        $checkleadquestions->optical = $optical;
        $checkleadquestions->bluetooth = $bluetooth;
        $checkleadquestions->warin = $warin;
        $checkleadquestions->age = $age;
        $checkleadquestions->condition = $condition;
        $checkleadquestions->charger = $charger;
        $checkleadquestions->strap = $strap;
        $checkleadquestions->boximei = $boximei;
        $checkleadquestions->billimei = $billimei;
        
        $leadsupdate = $checkleadquestions->watchleadquestionsupdate();
        if(!empty($leadsupdate)){
        http_response_code(200);
        echo json_encode(array(
        "status" => "1",
        "message" => "reqoute successfully"
        ));
        }else{
        http_response_code(200);
        echo json_encode(array(
        "status" => "1",
        "message" => "failed"
        )); 
        }
        
        // lead update end 
        
        }else{
            
        http_response_code(200);
        echo json_encode(array(
        "status" => 0,
        "message" => "no recordfound"
        ));
    
        }
    
    }else{
          http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "pLEASE pass the vendorid,lead_id,cat_id,deviceid,varientid"
    ));
    }
    }else{
    http_response_code(503);
    echo json_encode(array(
        "status" => 0,
        "message" => "pLEASE SELECT POST DATA TYPE"
    ));
}

?>