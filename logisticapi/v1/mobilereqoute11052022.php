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
    if(!empty($_POST['vendorid']) && !empty($_POST['lead_id']) && !empty($_POST['cat_id']) && !empty($_POST['deviceid']) && isset($_POST['ajentid']) && !empty($_POST['varientid']) && !empty($_POST['brandid'])){
        
        $callrecieve = $_POST['callrecieve'];
        $touchscreen = $_POST['touchscreen'];
        $screenspot = $_POST['screenspot'];
        $screenlines = $_POST['screenlines'];
        $screenphysicalcondition = $_POST['screenphysicalcondition'];
        $bodyscratches = $_POST['bodyscratches'];
        $bodydents = $_POST['bodydents'];
        $bodysidebackpanel = $_POST['bodysidebackpanel'];
        $bodybent = $_POST['bodybent'];
        $mobileage = $_POST['mobileage'];
        $warrin = $_POST['warrin'];  
        // functional start
        
        $copydisplay = $_POST['copydisplay'];
        $frontcamera = $_POST['frontcamera'];
        $backcamera = $_POST['backcamera'];
        $volumebutton = $_POST['volumebutton'];
        $fingertouch = $_POST['fingertouch'];
        $speaker = $_POST['speaker'];
        $powerbutton = $_POST['powerbutton'];
        $chargingport = $_POST['chargingport'];
        $facesensor = $_POST['facesensor'];
        $audioreciever = $_POST['audioreciever'];
        $cameraglass = $_POST['cameraglass'];
        $wifi = $_POST['wifi'];
        $silentbutton = $_POST['silentbutton'];
        $battery = $_POST['battery'];
        $bluetooth = $_POST['bluetooth'];
        $vibrate = $_POST['vibrate'];
        $microphone = $_POST['microphone'];
        
        // functional end
        
        $charger = $_POST['charger'];
        $earphone = $_POST['earphone'];
        $boximei = $_POST['boximei'];
        $billimei = $_POST['billimei'];
        
        // questions end calculation part start
        
        $checkleadquestions->vendorid = $_POST['vendorid'];
        $checkleadquestions->lead_id = $_POST['lead_id'];
        $checkleadquestions->cat_id = $_POST['cat_id'];
        $checkleadquestions->deviceid = $_POST['deviceid'];
        $checkleadquestions->varientid = $_POST['varientid'];
        $checkleadquestions->brandid = $_POST['brandid'];
        $checkleadquestions->ajentid = $_POST['ajentid'];
        $leads = $checkleadquestions->checkquestions();
        if($leads->num_rows>0){
         $selectbrand = $leads->fetch_assoc();
         $callvaluesel = $selectbrand['callvalue'];
         $threemonthssel = $selectbrand['3months'];
         $threeto6monthssel = $selectbrand['3to6months'];
         $sixto11monthssel = $selectbrand['6to11months'];
         $above11sel = $selectbrand['above11'];
         // screen question start
         $touchscreensel = $selectbrand['touchscreen'];
         $largespotsel = $selectbrand['largespot'];
         $multiplespotsel = $selectbrand['multiplespot'];
         $minorspotsel = $selectbrand['minorspot'];
         $nospotsel = $selectbrand['nospot'];
         $displayfadesel = $selectbrand['displayfade'];
         $multilinessel = $selectbrand['multilines'];
         $nolinessel = $selectbrand['nolines'];
         $crackedscreensel = $selectbrand['crackedscreen'];
         $damegescreensel = $selectbrand['damegescreen'];
         $heavyscracthessel = $selectbrand['heavyscracthes'];
         $scratches12sel = $selectbrand['12scratches'];
         $noscratchessel = $selectbrand['noscratches'];
         // body questions starts
         $majorscratchsel = $selectbrand['majorscratch'];
         $bodyscratches2sel = $selectbrand['2bodyscratches'];
         $nobodysratchessel = $selectbrand['nobodysratches'];
         $heavydentssel = $selectbrand['heavydents'];
         $dents2sel = $selectbrand['2dents'];
         $nodentssel = $selectbrand['nodents'];
         $crackedsidebacksel = $selectbrand['crackedsideback'];
         $missingsidebacksel = $selectbrand['missingsideback'];
         $nodefectssidebacksel = $selectbrand['nodefectssideback'];
         $bentcurvedpanelsel = $selectbrand['bentcurvedpanel'];
         $loosescreensel = $selectbrand['loosescreen'];
         $nobentssel = $selectbrand['nobents'];

        // accessries questions
         $chargersel = $selectbrand['charger'];
         $earphonesel = $selectbrand['earphone'];
         $boximeisel = $selectbrand['boximei'];
         $billimeisel = $selectbrand['billimei'];
        // brand questions end
         
        //  functional question start
          $displayvaluesel = $selectbrand['displayvalue'];
          $copydisplaysel = $selectbrand['copydisplay'];
          $front_camerasel = $selectbrand['front_camera'];
          $back_camerasel  = $selectbrand['back_camera'];
          $volumebtnsel = $selectbrand['volume'];
          $finger_touchsel = $selectbrand['finger_touch'];
          $speakersel = $selectbrand['speaker'];
          $power_btnsel = $selectbrand['power_btn'];
          $face_sensorsel = $selectbrand['face_sensor'];
          $charging_portsel = $selectbrand['charging_port'];
          $audio_receiversel = $selectbrand['audio_receiver'];
          $camera_glasssel = $selectbrand['camera_glass'];
          $wifisel = $selectbrand['wifi'];
          $silent_btnsel = $selectbrand['silent_btn'];
          $batterysel = $selectbrand['battery'];
          $bluetoothsel = $selectbrand['bluetooth'];
          $vibratorsel = $selectbrand['vibrator'];
          $microphonesel = $selectbrand['microphone'];
         //  functional questions end 
         // offer price start
          $offerprice = $selectbrand['uptovalue'];
         // offer price end 
         
        //  main calculation start
            
         if(!empty($mobileage)){
             if(strcmp($mobileage,"Under 3 Months")==0){
                 $warrenty = $threemonthssel;
             }elseif(strcmp($mobileage,"3 To 6 Months")==0){
                 $warrenty = $threeto6monthssel;
             }elseif(strcmp($mobileage,"6 To 11 Months")==0){
                 $warrenty = $sixto11monthssel;
             }elseif(strcmp($mobileage,"Above 11 Months")==0){
                 $warrenty = $above11sel;
             }else{
                 $warrenty = 0; 
             }
         }else{
             $warrenty = 0;
         }
          $updateuptovalue =$offerprice - ($warrenty/100)*$offerprice;
          
        //   screen calculation
          if(!empty($touchscreen) && !empty($screenspot) && !empty($screenlines) && !empty($screenphysicalcondition)){
              if(strcmp($touchscreen,"Touch Faulty") == 0){
                  $screendeduction = $displayvaluesel;
              }elseif(strcmp($touchscreen,"Touch Working") == 0){
                 $touch = 0; 
              if(strcmp($screenspot,"Large/ heavy visible spots on screen") == 0){
                  $spot = $largespotsel;
              }elseif(strcmp($screenspot,"Multiple visible spots on screen")==0){
                  $spot = $multiplespotsel;
              }elseif(strcmp($screenspot,"Minor discoloration or small spots on screen")==0){
                  $spot = $minorspotsel;
              }elseif(strcmp($screenspot,"No spots on screen")==0){
                  $spot = $nospotsel; 
              }else{
                  $spot = 0;  
              }
              
              if(strcmp($screenlines,"Display faded along corners")==0){
                  $lines = $displayfadesel;
              }elseif(strcmp($screenlines,"Multiple lines on Display")==0){
                  $lines = $multilinessel; 
              }elseif(strcmp($screenlines,"No line(s) on Display")==0){
                  $lines = $nolinessel; 
              }else{
                  $lines = 0;  
              }
              
              if(strcmp($screenphysicalcondition,"Screen cracked/ glass broken")==0){
                 $screenphysical = $crackedscreensel;
              }elseif(strcmp($screenphysicalcondition,"Damaged/ Torn screen on edges")==0){
                 $screenphysical = $damegescreensel;
              }elseif(strcmp($screenphysicalcondition,"Heavy scratches on screen")==0){
                 $screenphysical = $heavyscracthessel;
              }elseif(strcmp($screenphysicalcondition,"1-2 scratches on screen")==0){
                 $screenphysical = $scratches12sel;
              }elseif(strcmp($screenphysicalcondition,"No scratches on screen")==0){
                 $screenphysical = $noscratchessel;
              }else{
                 $screenphysical = 0;
              }
                
               if(($touch+$spot+$lines+$screenphysical)>=100){
                   $screendeduction = $displayvaluesel;
                }else{
                  $screendeduction = ($touch+$spot+$lines+$screenphysical)/100 * $displayvaluesel;  
                }
                
              }else{
                 $screendeduction = 0;
              }
              }else{
                 $screendeduction = 0;
              }
          
           //   screen calculation end
          //   body and acceseries question calculation start
          
           if(!empty($callrecieve)){
              if(strcmp($callrecieve,"Able To Take Calls")==0){
                  $call = 0;
              }elseif(strcmp($callrecieve,"Not Able To Take Calls")==0){
                  $call = $callvaluesel;
              }else{
                 $call = 0; 
              }
           }else{
               $call = 0;
           }
           
           if(!empty($bodyscratches)){
               if(strcmp($bodyscratches,"Major scratches")==0){
                 $bscratches = $majorscratchsel;  
               }elseif(strcmp($bodyscratches,"Less than 2 scratches")==0){
                 $bscratches = $bodyscratches2sel;  
               }elseif(strcmp($bodyscratches,"No scratches")==0){
                 $bscratches = $nobodysratchessel;  
               }else{
                 $bscratches = 0;
               }
           }else{
                 $bscratches = 0;
           }
           
            if(!empty($bodydents)){
               if(strcmp($bodydents,"Multiple/heavy visible body dents")==0){
                 $bdents = $heavydentssel;  
               }elseif(strcmp($bodydents,"2 or less minor body dents")==0){
                 $bdents = $dents2sel;  
               }elseif(strcmp($bodydents,"No dents")==0){
                 $bdents = $nodentssel;  
               }else{
                 $bdents = 0;
               }
           }else{
                 $bdents = 0;
           }
           
            if(!empty($bodysidebackpanel)){
               if(strcmp($bodysidebackpanel,"Cracked/ broken side or back panel")==0){
                 $bsideback = $crackedsidebacksel;  
               }elseif(strcmp($bodysidebackpanel,"Missing side or back panel")==0){
                 $bsideback = $missingsidebacksel;  
               }elseif(strcmp($bodysidebackpanel,"No defect on side or back panel")==0){
                 $bsideback = $nodefectssidebacksel;  
               }else{
                 $bsideback = 0;
               }
           }else{
                 $bsideback = 0;
           }
           
           if(!empty($bodybent)){
               if(strcmp($bodybent,"Bent/ curved panel")==0){
                 $bbent = $bentcurvedpanelsel;  
               }elseif(strcmp($bodybent,"Loose screen (Gap in screen and body)")==0){
                 $bbent = $loosescreensel;  
               }elseif(strcmp($bodybent,"Phone not bent")==0){
                 $bbent = $nobentssel;  
               }else{
                 $bbent = 0;
               }
           }else{
                 $bbent = 0;
           }
           
           if(!empty($charger)){
               if(strcmp($charger,"Original Charger of Device")==0){
                 $chargerded = 0;  
               }else{
                 $chargerded = $chargersel;
               }
           }else{
               $chargerded = $chargersel;
           }
           
           if(!empty($earphone)){
               if(strcmp($earphone,"Original Earphones of Device")==0){
                 $earphoneded = 0;  
               }else{
                 $earphoneded = $earphonesel;
               }
           }else{
               $earphoneded = $earphonesel;
           }
           
            if(!empty($boximei)){
               if(strcmp($boximei,"Box with same IMEI")==0){
                 $boximeided = 0;  
               }else{
                 $boximeided = $boximeisel;
               }
           }else{
               $boximeided = $boximeisel;
           }
           
            if(!empty($billimei)){
               if(strcmp($billimei,"Bill with same IMEI")==0){
                 $billimeided = 0;  
               }else{
                 $billimeided = $billimeisel;
               }
           }else{
               $billimeided = $billimeisel;
           }
           
           $sumpercentvalue = $call + $bdents + $bbent + $bsideback + $bscratches + $chargerded + $earphoneded + $boximeided + $billimeided;
           $netdeductpercenet = ($sumpercentvalue/100)*$updateuptovalue;
           
         //   body and acceseries question calculation end  
         //  functional questions calculation start
         if(!empty($copydisplay)){
               if(strcmp($copydisplay,"Copy Display")==0){
                 $copydisplayded = $copydisplaysel;  
               }else{
                 $copydisplayded = 0;
               }
           }else{
               $copydisplayded = 0;
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
           
             if(!empty($fingertouch)){
               if(strcmp($fingertouch,"Finger Touch not working")==0){
                 $fingertouchded = $finger_touchsel;  
               }else{
                 $fingertouchded = 0;
               }
           }else{
               $fingertouchded = 0;
           }
           
           if(!empty($speaker)){
               if(strcmp($speaker,"Speaker not working")==0){
                 $speakerded = $speakersel;  
               }else{
                 $speakerded = 0;
               }
           }else{
               $speakerded = 0;
           }
           
             if(!empty($powerbutton)){
               if(strcmp($powerbutton,"Power Button not working")==0){
                 $powerbuttonded = $power_btnsel;  
               }else{
                 $powerbuttonded = 0;
               }
           }else{
               $powerbuttonded = 0;
           }
           
               if(!empty($chargingport)){
               if(strcmp($chargingport,"Charging Port not working")==0){
                 $chargingportded = $charging_portsel;  
               }else{
                 $chargingportded = 0;
               }
           }else{
               $chargingportded = 0;
           }
           
           if(!empty($facesensor)){
               if(strcmp($facesensor,"Face Sensor not working")==0){
                 $facesensorded = $face_sensorsel;  
               }else{
                 $facesensorded = 0;
               }
           }else{
               $facesensorded = 0;
           }
           
            if(!empty($audioreciever)){
               if(strcmp($audioreciever,"Audio Receiver not working")==0){
                 $audiorecieverded = $audio_receiversel;  
               }else{
                 $audiorecieverded = 0;
               }
           }else{
               $audiorecieverded = 0;
           }
           
            if(!empty($cameraglass)){
               if(strcmp($cameraglass,"Camera Glass Broken")==0){
                 $cameraglassded = $camera_glasssel;  
               }else{
                 $cameraglassded = 0;
               }
           }else{
                 $cameraglassded = 0;
           }
           
           if(!empty($wifi)){
               if(strcmp($wifi,"WiFi not working")==0){
                 $wifided = $wifisel;  
               }else{
                 $wifided = 0;
               }
           }else{
                 $wifided = 0;
           }
           
            if(!empty($silentbutton)){
               if(strcmp($silentbutton,"Silent Button not working")==0){
                 $silentbuttonded = $silent_btnsel;  
               }else{
                 $silentbuttonded = 0;
               }
           }else{
                 $silentbuttonded = 0;
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
           
           if(!empty($vibrate)){
               if(strcmp($vibrate,"Vibrator is not working")==0){
                 $vibrateded = $vibratorsel;
               }else{
                 $vibrateded = 0;
               }
           }else{
                 $vibrateded = 0;
           }
           
            if(!empty($microphone)){
               if(strcmp($microphone,"Microphone is not working")==0){
                 $microphoneded = $microphonesel;
               }else{
                 $microphoneded = 0;
               }
           }else{
                 $microphoneded = 0;
           }
           $sumflatvalue=$frontcameraded + $copydisplayded + $backcameraded + $volumebuttonded + $fingertouchded + $speakerded +  $chargingportded +  $facesensorded + $audiorecieverded + $cameraglassded + $wifided +
           $silentbuttonded + $batteryded +  $bluetoothded + $vibrateded +  $microphoneded +  $powerbuttonded;
         //  functional question calculation end 
          
          $offerprice = $updateuptovalue - ($netdeductpercenet + $sumflatvalue + $screendeduction);
          $offerprice = round($offerprice);
          $offerprice = round($offerprice/10)*10;

        // main calculation end
        
        // lead update start
        $checkleadquestions->lead_id = $_POST['lead_id'];
        $checkleadquestions->offerprice = $offerprice;
        $checkleadquestions->callrecieve = $callrecieve;
        $checkleadquestions->touchscreen = $touchscreen; 
        $checkleadquestions->screenspot = $screenspot; 
        $checkleadquestions->screenlines = $screenlines; 
        $checkleadquestions->screenphysicalcondition = $screenphysicalcondition;
        $checkleadquestions->bodyscratches = $bodyscratches ;
        $checkleadquestions->bodydents = $bodydents ;
        $checkleadquestions->bodysidebackpanel = $bodysidebackpanel; 
        $checkleadquestions->bodybent = $bodybent ;
        $checkleadquestions->mobileage  = $mobileage ;
        $checkleadquestions->warrin  = $warrin;
        $checkleadquestions->copydisplay = $copydisplay; 
        $checkleadquestions->frontcamera = $frontcamera ;
        $checkleadquestions->backcamera = $backcamera ;
        $checkleadquestions->volumebutton = $volumebutton;
        $checkleadquestions->fingertouch = $fingertouch ;
        $checkleadquestions->speaker= $speaker ;
        $checkleadquestions->powerbutton = $powerbutton; 
        $checkleadquestions->chargingport = $chargingport; 
        $checkleadquestions->facesensor = $facesensor ;
        $checkleadquestions->audioreciever = $audioreciever; 
        $checkleadquestions->cameraglass = $cameraglass ;
        $checkleadquestions->wifi = $wifi ;
        $checkleadquestions->silentbutton = $silentbutton; 
        $checkleadquestions->battery = $battery ;
        $checkleadquestions->bluetooth = $bluetooth; 
        $checkleadquestions->vibrate = $vibrate ;
        $checkleadquestions->microphone = $microphone; 
        $checkleadquestions->charger = $charger ;
        $checkleadquestions->earphone = $earphone ;
        $checkleadquestions->boximei = $boximei ;
        $checkleadquestions->billimei = $billimei ;
        $checkleadquestions->vendorid = $_POST['vendorid'];
        $leadsupdate = $checkleadquestions->leadquestionsupdate();
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
        "message" => "pLEASE pass the vendorid,lead_id,cat_id,deviceid,varientid,brandid "
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