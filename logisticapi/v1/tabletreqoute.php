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
    if(!empty($_POST['vendorid']) && !empty($_POST['lead_id']) && !empty($_POST['cat_id']) && !empty($_POST['deviceid']) && !empty($_POST['varientid'])){
        
        $switch = $_POST['switch'];
        $warin = $_POST['warin'];
        $tabletageage = $_POST['tabletage'];
        $screencondition = $_POST['screencondition'];
        $physicalconditon = $_POST['physicalconditon'];
         $varientid =  $_POST['varientid'];
        // functional start
        $frontcamera = $_POST['frontcamera'];
        $backcamera = $_POST['backcamera'];
        $volumebutton = $_POST['volumebutton'];
        $speaker = $_POST['speaker'];
        $powerbutton = $_POST['powerbutton'];
        $chargingport = $_POST['chargingport'];
        $battery = $_POST['battery'];
        $bluetooth = $_POST['bluetooth'];
        $gps = $_POST['gps'];
        $fingerprint = $_POST['fingerprint'];
        $wifi = $_POST['wifi'];
        $microphone = $_POST['microphone'];
        
        // functional end
        
        $charger = $_POST['charger'];
        $pen = $_POST['pen'];
        $boximei = $_POST['box'];
        $billimei = $_POST['bill'];
        
        // questions end calculation part start
        
        $checkleadquestions->vendorid = $_POST['vendorid'];
        $checkleadquestions->lead_id = $_POST['lead_id'];
        $checkleadquestions->cat_id = $_POST['cat_id'];
        $checkleadquestions->deviceid = $_POST['deviceid'];
        $checkleadquestions->brandid = $_POST['brandid'];
        $checkleadquestions->ajentid = $_POST['ajentid'];
        $leads = $checkleadquestions->checktabletquestions();
        if($leads->num_rows>0){
         $selectbrand = $leads->fetch_assoc();
         $switchofsel = $selectbrand['switchof'];
         $threemonthssel = $selectbrand['below3'];
         $threeto6monthssel = $selectbrand['3to6'];
         $sixto11monthssel = $selectbrand['6to11'];
         $above11sel = $selectbrand['above11'];
         $outofwarrn = $selectbrand['outofwarrenty'];

        // accessries questions
         $chargersel = $selectbrand['charger'];
         $pencilsel = $selectbrand['pencil'];
         $boxsel = $selectbrand['box'];
         $billsel = $selectbrand['bill'];
        // brand questions end
         
        //  functional question start
          $front_camerasel = $selectbrand['Frontcam'];
          $back_camerasel  = $selectbrand['backcam'];
          $volumebtnsel = $selectbrand['volumebutton'];
          $fingerprintsel = $selectbrand['fingerprint'];
          $speakersel = $selectbrand['speaker'];
          $powertnsel = $selectbrand['power/home'];
          $chargingsel = $selectbrand['charging'];
          $wifisel = $selectbrand['wifi'];
          $batterysel = $selectbrand['battery'];
          $bluetoothsel = $selectbrand['bluetooth'];
          $microphonesel = $selectbrand['microphone'];
          $gpssel = $selectbrand['gps']; 
          
          $sflawless = $selectbrand['sflawless'];
          $sgood = $selectbrand['sgood'];
          $saverege = $selectbrand['saverege'];
          $sdamaged = $selectbrand['sdamaged'];
          
          $pflawless = $selectbrand['pflawless'];
          $pgood = $selectbrand['pgood'];
          $paverege = $selectbrand['paverege'];
          $pdamaged = $selectbrand['pdamaged'];
         //  functional questions end 
         // offer price start
         $offf = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `tabletsvarient` WHERE `vid` = '$varientid' "));
          $offerprice = $offf['uptovalue'];
         // offer price end 
        //  main calculation start
        // warrrenty and age calculation start
            if(strcmp($warin,"out of Warranty")==0){
               $warrenty = $outofwarrn;
               $ageded = 0;
            }elseif(!empty($tabletageage)){
                $warrenty = 0;
             if(strcmp($tabletageage,"Under 3 Months")==0){
                 $ageded = $threemonthssel;
             }elseif(strcmp($tabletageage,"3 To 6 Months")==0){
                 $ageded = $threeto6monthssel;
             }elseif(strcmp($tabletageage,"6 To 11 Months")==0){
                 $ageded = $sixto11monthssel;
             }elseif(strcmp($tabletageage,"Above 11 Months")==0){
                 $ageded = $above11sel;
             }else{
                 $ageded = 0; 
             }
            }else{
             $warrenty = 0;
             $ageded = 0;
            }
         // warrrenty and age calculation end
         
        $updateuptovalue =$offerprice - ($warrenty/100)*$offerprice;
         
        if(!empty($screencondition)){
             if(strcmp($screencondition,"flawless")==0){
                 $screenconditionded = $sflawless;
             }elseif(strcmp($screencondition,"good")==0){
                 $screenconditionded = $sgood;
             }elseif(strcmp($screencondition,"averege")==0){
                 $screenconditionded = $saverege;
             }elseif(strcmp($screencondition,"below averege")==0){
                 $screenconditionded = $sdamaged;
             }else{
                 $screenconditionded = 0; 
             }
         }else{
             $screenconditionded = 0;
         }
         
         if(!empty($physicalconditon)){
             if(strcmp($physicalconditon,"flawless")==0){
                 $physicalconditonded = $pflawless;
             }elseif(strcmp($physicalconditon,"good")==0){
                 $physicalconditonded = $pgood;
             }elseif(strcmp($physicalconditon,"averege")==0){
                 $physicalconditonded = $paverege;
             }elseif(strcmp($physicalconditon,"below averege")==0){
                 $physicalconditonded = $pdamaged;
             }else{
                 $physicalconditonded = 0; 
             }
         }else{
             $physicalconditonded = 0;
         }
           
            if(!empty($switch)){
              if(strcmp($switch,"yes")==0){
                 $switchded = 0;  
              }else{
                 $switchded = $switchofsel;
              }
             }else{
                $switchded = $switchofsel;
             }
           
          if(!empty($charger)){
              if(strcmp($charger,"Original Charger")==0){
                 $chargerded = 0;  
              }else{
                 $chargerded = $chargersel;
              }
          }else{
              $chargerded = $chargersel;
          }
           
          if(!empty($pen)){
              if(strcmp($pen,"Original S Pen")==0){
                 $pended = 0;  
              }else{
                 $pended = $pencilsel;
              }
          }else{
                $pended = $pencilsel;
          }
           
            if(!empty($boximei)){
              if(strcmp($boximei,"Original Box")==0){
                 $boxded = 0;  
              }else{
                 $boxded = $boxsel;
              }
          }else{
              $boxded = $boxsel;
          }
           
            if(!empty($billimei)){
              if(strcmp($billimei,"Valid Bill")==0){
                 $billded = 0;  
              }else{
                 $billded = $billsel;
              }
          }else{
              $billded = $billsel;
          }
           
             if(!empty($frontcamera)){
              if(strcmp($frontcamera,"Front Camera not working")==0){
                 $frontcameraded = $front_camerasel;  
              }else{
                 $frontcameraded = 0;
              }
          }else{
              $frontcameraded = 0;
          }
           
            if(!empty($backcamera)){
              if(strcmp($backcamera,"Back Camera not working")==0){
                 $backcameraded = $back_camerasel;  
              }else{
                 $backcameraded = 0;
              }
          }else{
              $backcameraded = 0;
          }
           
            if(!empty($volumebutton)){
              if(strcmp($volumebutton,"Volume Button not working")==0){
                 $volumebuttonded = $volumebtnsel;  
              }else{
                 $volumebuttonded = 0;
              }
          }else{
              $volumebuttonded = 0;
          }
           
            if(!empty($fingerprint)){
            if(strcmp($fingerprint,"Finger Print not working")==0){
                $fingerprintded = $fingerprintsel;  
              }else{
                 $fingerprintded = 0;
              }
          }else{
              $fingerprintded = 0;
          }
           
             if(!empty($speaker)){
              if(strcmp($speaker,"Speakers not working")==0){
                 $speakerded = $speakersel;  
              }else{
                 $speakerded = 0;
              }
          }else{
              $speakerded = 0;
          }
           
            if(!empty($powerbutton)){
              if(strcmp($powerbutton,"Power/Home Button not working")==0){
                 $powerbuttonded = $powertnsel;  
              }else{
                 $powerbuttonded = 0;
              }
          }else{
              $powerbuttonded = 0;
          }
           
            if(!empty($chargingport)){
              if(strcmp($chargingport,"Charging Port not working")==0){
                 $chargingportded = $chargingsel;  
              }else{
                 $chargingportded = 0;
              }
          }else{
              $chargingportded = 0;
          }
           
          if(!empty($wifi)){
              if(strcmp($wifi,"Wifi not working")==0){
                 $wifided = $wifisel;  
              }else{
                 $wifided = 0;
              }
          }else{
                 $wifided = 0;
          }
           
          if(!empty($battery)){
              if(strcmp($battery,"Battery not working")==0){
                 $batteryded = $batterysel;  
              }else{
                 $batteryded = 0;
              }
          }else{
                 $batteryded = 0;
          }
           
          if(!empty($bluetooth)){
              if(strcmp($bluetooth,"Bluetooth not working")==0){
                 $bluetoothded = $bluetoothsel;  
              }else{
                 $bluetoothded = 0;
              }
          }else{
                 $bluetoothded = 0;
          }
           
          if(!empty($microphone)){
              if(strcmp($microphone,"Microphone not working")==0){
                 $microphoneded = $microphonesel;
              }else{
                 $microphoneded = 0;
              }
          }else{
                 $microphoneded = 0;
          }
           
          if(!empty($gps)){
              if(strcmp($gps,"GPS not working")==0){
                 $gpsded = $gpssel;
              }else{
                 $gpsded = 0;
              }
          }else{
                 $gpsded = 0;
          }
           
          $sumpercentvalue = $screenconditionded + $physicalconditonded + $switchded + $chargerded + $pended + $boxded + $billded + $frontcameraded + $backcameraded + $volumebuttonded + $fingerprintded + $speakerded 
          + $powerbuttonded + $chargingportded + $wifided + $batteryded + $bluetoothded + $microphoneded + $gpsded +$ageded;
          $netdeductpercenet = ($sumpercentvalue/100)*$updateuptovalue;
          
          $offerprice = $updateuptovalue - ($netdeductpercenet);
          $offerprice = round($offerprice);
          $offerpricef = round($offerprice/10)*10;

        // main calculation end
        
        // lead update start
        $checkleadquestions->lead_id = $_POST['lead_id'];
        $checkleadquestions->offerprice = $offerpricef;
        $checkleadquestions->switchof = $switch;
        $checkleadquestions->warin  = $warin;
        $checkleadquestions->screencondition = $screencondition;
        $checkleadquestions->physicalconditon = $physicalconditon;
        $checkleadquestions->tabletageage  = $tabletageage;
        $checkleadquestions->frontcamera = $frontcamera; 
        $checkleadquestions->backcamera = $backcamera;
        $checkleadquestions->volumebutton = $volumebutton;
        $checkleadquestions->fingerprint = $fingerprint ;
        $checkleadquestions->speaker= $speaker ;
        $checkleadquestions->powerbutton = $powerbutton; 
        $checkleadquestions->chargingport = $chargingport; 
        $checkleadquestions->wifi = $wifi ;
        $checkleadquestions->battery = $battery ;
        $checkleadquestions->bluetooth = $bluetooth; 
        $checkleadquestions->microphone = $microphone;
        $checkleadquestions->gps = $gps;
        $checkleadquestions->charger = $charger ;
        $checkleadquestions->pen = $pen ;
        $checkleadquestions->boximei = $boximei ;
        $checkleadquestions->billimei = $billimei ;
        $leadsupdate = $checkleadquestions->tabletleadquestionsupdate();
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