<?php
session_start();
ini_set("display_errors",1);
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: POST");
header("Content-type:application/json; charset=UTF-8");
include_once("../config/database.php");
include_once("../classes/users.php");

$db = new  Database();
$connection = $db->connect();
$user_obj = new  Users($connection);

 if($_SERVER['REQUEST_METHOD'] === "POST"){    
    if(!empty($_POST['vendorid']) && !empty($_POST['lead_id'])){
    $user_obj->vendorid = $_POST['vendorid'];
    $user_obj->lead_id = $_POST['lead_id'];
    // ajent number start
    $ajentnumber = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `enquiry` where `id` = '$user_obj->lead_id' "));
     $agentid = $ajentnumber['ajentid'];
             $rows = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM `ajents` WHERE `id` = '$agentid' "));
             if($rows > 0){
               $fetchaj = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `ajents` WHERE `id` = '$agentid' "));     
               $agentnumber = $fetchaj['phone'];     
             }else{
               $agentnumber = "";  
             }
    // ajent number end
    $leads = $user_obj->lead_description();
    if($leads->num_rows>0){
        while($arr = $leads->fetch_assoc()){
            // pickup date time start
             
            if(!empty($arr['soon'])){
                $day = $arr['soon'];
                 $month = '';
                $year = '';
            }else{
                $day = $arr['day'];
                $month = $arr['day1'];
                $year = $arr['year'];
            };
            
             if(!empty($arr['callvalue'])){
                $call = $arr['callvalue'];
            }else{
                $call = "working";
            }
            
            if(!empty($arr['touchscreen'])){
                $touchsc = $arr['touchscreen'];
            }else{
                $touchsc = "Touch Working";
            }
            
             if(!empty($arr['screenspot'])){
                $display_spot = $arr['screenspot'];
            }else{
                $display_spot = "No spots on screen";
            }
            
             if(!empty($arr['screenlines'])){
                $screenlines = $arr['screenlines'];
            }else{
                $screenlines = "No line(s) on Display";
            }
            
            if(!empty($arr['screenphysicalcondition'])){
                $Screen_Condition = $arr['screenphysicalcondition'];
            }else{
                $Screen_Condition = "No scratches on screen";
            }
            
            if(!empty($arr['front_camera'])){
                $front_camera = $arr['front_camera'];
            }else{
                $front_camera = "working";
            }
            
            if(!empty($arr['back_camera'])){
                $back_camera = $arr['back_camera'];
            }else{
                $back_camera = "working";
            }
            
            if(!empty($arr['wifi'])){
                $wifi = $arr['wifi'];
            }else{
                $wifi = "working";
            }
            
            if(!empty($arr['volume'])){
                $volume_button = $arr['volume'];
            }else{
                $volume_button = "working";
            }
            
            if(!empty($arr['battery'])){
                $battery = $arr['battery'];
            }else{
                $battery = "working";
            }
            
            if(!empty($arr['speaker'])){
                $speaker = $arr['speaker'];
            }else{
                $speaker = "working";
            }
            
            if(!empty($arr['finger_touch'])){
                $finger_touch = $arr['finger_touch'];
            }else{
                $finger_touch = "working";
            }
            if(!empty($arr['charging_port'])){
                $charging_port = $arr['charging_port'];
            }else{
                $charging_port = "working";
            }
            if(!empty($arr['power_btn'])){
                $power_btn = $arr['power_btn'];
            }else{
                $power_btn = "working";
            }
            if(!empty($arr['face_sensor'])){
                $face_sensor = $arr['face_sensor'];
            }else{
                $face_sensor = "working";
            }
            if(!empty($arr['age'])){
                $mobile_age = $arr['age'];
            }else{
                $mobile_age = "Above 11 Months";
            }
             if(!empty($arr['warenty'])){
                $warrenty = $arr['warenty'];
            }else{
                $warrenty = "";
            }
            if(!empty($arr['bodyscratches'])){
                $body_scratches = $arr['bodyscratches'];
            }else{
                $body_scratches = "No scratches";
            }
            if(!empty($arr['bodydents'])){
                $body_dents = $arr['bodydents'];
            }else{
                $body_dents = "No dents";
            }
            if(!empty($arr['sidebackpanel'])){
                $side_back_panel = $arr['sidebackpanel'];
            }else{
                $side_back_panel = "No defect on side or back panel";
            }
            if(!empty($arr['bodybents'])){
                $body_bents = $arr['bodybents'];
            }else{
                $body_bents = "Phone not bent";
            }
            if(!empty($arr['charger'])){
                $charger = $arr['charger'];
            }else{
                $charger = "Not Available";
            }
            if(!empty($arr['earphone'])){
                $earphone = $arr['earphone'];
            }else{
                $earphone = "Not Available";
            }
            if(!empty($arr['boximei'])){
                $box = $arr['boximei'];
            }else{
                $box = "Not Available";
            }
            if(!empty($arr['billimei'])){
                $bill = $arr['billimei'];
            }else{
                $bill = "Not Available";
            }
            if(!empty($arr['audio_receiver'])){
                $audio_receiver = $arr['audio_receiver'];
            }else{
                $audio_receiver = "working";
            }
            if(!empty($arr['camera_glass'])){
                $camera_glass = $arr['camera_glass'];
            }else{
                $camera_glass = "working";
            }
            if(!empty($arr['copydisplay'])){
                $copydisplay = $arr['copydisplay'];
            }else{
               $copydisplay = "no copy display"; 
            }
            if(!empty($arr['silent_btn'])){
                $silent_btn = $arr['silent_btn'];
            }else{
                $silent_btn = "working";
            }
            if(!empty($arr['bluetooth'])){
                $bluetooth = $arr['bluetooth'];
            }else{
                $bluetooth = "working";
            }
            if(!empty($arr['vibrator'])){
                $vibrator = $arr['vibrator'];
            }else{
                $vibrator = "working";
            }
            if(!empty($arr['microphone'])){
                $microphone = $arr['microphone'];
            }else{
                $microphone = "working";
            }
            if(!empty($arr['switchof'])){
                $switch_of_on = $arr['switchof'];
            }else{
                $switch_of_on = "working";
            }
            if(!empty($arr['magnetic'])){
                $magnetic_tape = $arr['magnetic'];
            }else{
                $magnetic_tape= "working";
            }
            if(!empty($arr['digitalcrown'])){
                $digitalcrown = $arr['digitalcrown'];
            }else{
                $digitalcrown = "working";
            }
            if(!empty($arr['opticalheart'])){
                $opticalheart = $arr['opticalheart'];
            }else{
                $opticalheart = "working";
            }
            if(!empty($arr['stap'])){
                $watch_strap = $arr['stap'];
            }else{
                $watch_strap = "working";
            }
            if(!empty($arr['pencil'])){
                $pencil = $arr['pencil'];
            }else{
                $pencil = "working";
            }
            if(!empty($arr['conditions'])){
                $overall_conditions = $arr['conditions'];
            }else{
                $overall_conditions = "working";
            }
            if(!empty($arr['pcondition'])){
                $physical_tablet_conditions = $arr['pcondition'];
            }else{
                $physical_tablet_conditions = "working";
            }
            if(!empty($arr['sidebutton'])){
                $sidebutton = $arr['sidebutton'];
            }else{
                $sidebutton = "working";
            }
            if(!empty($arr['gps'])){
                $gps = $arr['gps'];
            }else{
                $gps = "working";
            }
            if(!empty($arr['connectivity'])){
                $connectivity = $arr['connectivity'];
            }else{
                $connectivity = "working";
            }
            if(!empty($arr['physicalissue'])){
                $physical_issue = $arr['physicalissue'];
            }else{
                $physical_issue = "working";
            }
            if(!empty($arr['cable'])){
                $cable = $arr['cable'];
            }else{
                $cable = "working";
            }
            if(!empty($arr['cable'])){
                $cable = $arr['cable'];
            }else{
                $cable = "working";
            }
            if($arr['offerprice'] >= 100){
                $offerprice = $arr['offerprice'];
            }else{
                 $offerprice = "sorry we can't purchase";
            }
            if($arr['customerprice'] != null){
              $customerasking = $arr['customerprice'];
            }else{
              $customerasking = "";  
            }
             if($arr['customerprice'] != null){
              $customerasking = $arr['customerprice'];
            }else{
              $customerasking = "";  
            }
            // picup date time end
            
            $catid = $arr['catid'];
            $varientId = $arr['varientid'];
            // query for varient start
            if($catid == 1){
              $vi = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `varient` WHERE `id` = '$varientId' "));
              $VNAME = $vi['varient'];
            }elseif($catid == 3){
              $vi = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `tabletsvarient` WHERE `Vid` = '$varientId' "));
              $VNAME = $vi['varient'];  
            }else{
               $VNAME = null; 
            }
            // query for varient start
            $mid = $arr['modelid'];
            $leadinfo[]=array(
              "ordersequence" => $arr['genorderid'],
              "cat_id" => "$catid",
              "deviceid" => "$mid",
              "varientid" => "$varientId",
              "varientname" => "$VNAME",
              "brandid" => $arr['brandid'],
              "lead_id" => $arr['enquiryid'],
              "vendorid" => $arr['vendor_id'],
              "ajentid" => $arr['ajentid'],
              "model_name" => $arr['model_name'],
              "imageurl" => "https://sellit.co.in/admin/img/".$arr['mimg'],
              "price" => $offerprice,
              "customeraskingprice" =>  $customerasking,
              "lead_status" =>  $arr['status'],
              "lead_pick" => $arr['soon'],
              "lead_pick_date" => $day,
               "lead_pick_month" =>  $month,
               "lead_pick_year" => $year,
              "lead_pick_time" => $arr['time'],
              "lead_scheduled_to" => $arr['choseday'],
              "customer_id" => $arr['userid'],
               "name" => $arr['name'],
               "mobile" => $arr['mobile'],
               "city" => $arr['city'],
               "location" => $arr['pincode'],
               "flat/houseno" => $arr['flatno'],
               "state" => $arr['state'],
               "landmark" => $arr['landmark'],
               "latitude" => "$arr[latitude]",
               "longitude" => "$arr[logitude]",
               "phonecall" => $call,
               "touch_screen" => $touchsc,
               "display_spot" => $display_spot,
               "screenlines" => $screenlines,
               "Screen_Condition" => $Screen_Condition,
               "front_camera" => $front_camera,
               "back_camera" => $back_camera,
               "wifi" => $wifi,
               "volume_button" => $volume_button,
               "battery" => $battery,
               "speaker" => $speaker,
               "finger_touch" => $finger_touch,
               "charging_port" => $charging_port,
               "power_btn" => $power_btn,
               "face_sensor" => $face_sensor,
               "mobile_age" => $mobile_age,
               "warrenty" => $warrenty,
               "body_scratches" => $body_scratches,
               "body_dents" => $body_dents,
               "side_back_panel" => $side_back_panel,
               "body_bents" => $body_bents,
               "charger" => $charger,
               "earphone" => $earphone,
               "box" => $box,
               "bill" => $bill,
               "audio_receiver" => $audio_receiver,
               "camera_glass" => $camera_glass,
               "silent_btn" => $silent_btn,
               "bluetooth" => $bluetooth,
               "vibrator" => $vibrator,
               "microphone" => $microphone,
               "switch_of_on" => $switch_of_on,
               "magnetic_tape" => $magnetic_tape,
               "digitalcrown" => $digitalcrown,
               "opticalheart" => $opticalheart,
               "watch_strap" => $watch_strap,
               "pencil" => $pencil,
               "overall_conditions" => $overall_conditions,
               "physical_tablet_conditions" => $physical_tablet_conditions,
               "sidebutton" => $sidebutton,
               "gps" => $gps,
               "connectivity" => $connectivity,
               "physical_issue" => $physical_issue,
               "cable" => $cable,
               "copy_display"=>$copydisplay,
               "bank_name" => $arr['bankname'],
               "accountnumber" => $arr['accountno'],
               "ifsccode" => $arr['ifsc'],
               "beneficiary_name" => $arr['beneficiarname'],
               "upiid" => $arr['upi'],
            ); 
        }
        
        http_response_code(200);
        echo json_encode(array(
            "status" => "1",
            "ajentmobnum" => $agentnumber, 
            "leads_description" => $leadinfo,
            // JSON_FORCE_OBJECT
        ));

    }else{
        http_response_code(200);
        echo json_encode(array(
            "status" => 0,
            "message" => "no records found"
        ));
    }
    }else{
          http_response_code(200);
    echo json_encode(array(
        "status" => 0,
        "message" => "pLEASE pass the vendor id"
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