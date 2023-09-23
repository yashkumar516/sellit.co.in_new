<?php
  class Calculation{
      private $conn;

      public function  __construct($db){
          $this->conn = $db;
      }
         public function checkquestions(){
          $leadobj = $this->conn->prepare("SELECT *  FROM `subcategory` INNER JOIN `questions` ON subcategory.id = questions.subcategoryid INNER JOIN `varient` ON varient.product_name = questions.product_name where subcategory.id = ?
          AND questions.product_name = ? AND varient.id = ?");
          $leadobj->bind_param("sss",$this->brandid,$this->deviceid,$this->varientid);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
        public function leadquestionsupdate(){
           //new code started
           $vendorold = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM `vendors` WHERE `id` = '$this->callrecieve' "));
          //new code ended
          $lead_obj = $this->conn->prepare("update `enquiry` set `offerprice` = ?,`callvalue` = ?,`age` = ?,`touchscreen` = ?,`screenspot` = ?,`screenlines` = ?,`screenphysicalcondition` = ?,`bodyscratches` = ?,
          `bodydents` = ?,`sidebackpanel` = ?,`bodybents` = ?,`charger` = ?,`earphone` = ?,`boximei` = ?,`billimei` = ?,`copydisplay` = ?,`front_camera` = ?,`back_camera` = ?,`volume` = ?,`finger_touch` = ?,
          `speaker` = ?,`power_btn` = ?,`face_sensor` = ?,`charging_port` = ?,`audio_receiver` = ?,`camera_glass` = ?,`wifi` = ?,`silent_btn` = ?,`battery` = ?,`bluetooth` = ?,`vibrator` = ?,`microphone` = ?,`warenty` = ?
          where id = ?");
          $lead_obj->bind_param("ssssssssssssssssssssssssssssssssss",$this->offerprice,$this->callrecieve,$this->mobileage,$this->touchscreen,$this->screenspot,$this->screenlines,$this->screenphysicalcondition,$this->bodyscratches,$this->bodydents,$this->bodysidebackpanel,$this->bodybent,$this->charger,$this->earphone,$this->boximei,$this->billimei,$this->copydisplay,$this->frontcamera,$this->backcamera,$this->volumebutton,$this->fingertouch,$this->speaker,$this->powerbutton,$this->facesensor,$this->chargingport,$this->audioreciever,$this->cameraglass,$this->wifi,$this->silentbutton,$this->battery,$this->bluetooth,$this->vibrate,$this->microphone,$this->warrin,$this->lead_id);
          if($lead_obj->execute()){
             $data = "success";
            return $data;
          }else{
              $data = "";
            return $data;
          }
        }
        
        
        public function checktabletquestions(){
             $leadobj = $this->conn->prepare("SELECT *  FROM `tabletquestions` WHERE product_name  = ? AND categoryid = ? ");
          $leadobj->bind_param("ss",$this->deviceid,$this->cat_id);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
        public function tabletleadquestionsupdate(){
          $lead_obj = $this->conn->prepare("update `enquiry` set `offerprice` = ?,`switchof` = ?,`front_camera` = ?,`back_camera` = ?,`wifi` = ?,`speaker` = ?,`power_btn` = ?,`charging_port` = ?,
          `microphone` = ?,`battery` = ?,`volume` = ?,`bluetooth` = ?,`finger_touch` = ?,`gps` = ?,`warenty` = ?,`age` = ?,`conditions` = ?,`pcondition` = ?,`charger` = ?,
          `pencil` = ?,`boximei` = ?,`billimei` = ? where id = ?");
          $lead_obj->bind_param("sssssssssssssssssssssss",$this->offerprice,$this->switchof,$this->frontcamera,$this->backcamera,$this->wifi,$this->speaker,$this->powerbutton,$this->chargingport,
          $this->microphone,$this->battery,$this->volumebutton,$this->bluetooth,$this->fingerprint,$this->gps,$this->warin,$this->tabletageage,$this->screencondition,$this->physicalconditon,
          $this->charger,$this->pen,$this->boximei,$this->billimei,$this->lead_id);
          if($lead_obj->execute()){
             $data = "success";
            return $data;
          }else{
              $data = "";
            return $data;
          }
        }
        
        public function checkwatchquestions(){
          $leadobj = $this->conn->prepare("SELECT *  FROM `watchquestions` WHERE product_name  = ? AND categoryid = ? ");
          $leadobj->bind_param("ss",$this->deviceid,$this->cat_id);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
          public function watchleadquestionsupdate(){
          $lead_obj = $this->conn->prepare("update `enquiry` set `offerprice`=?,`switchof`=?,`billimei`=?,`boximei`=?,`stap`=?,`charger`=?,
          `bluetooth`=?,`opticalheart`=?,`sidebutton`=?,`digitalcrown`=?,`charging_port`=?,`speaker`=?,`wifi`=?,`battery`=?,`touchscreen`=?,
          `conditions`=?,`age`=?,`warenty`=? where id = ?");
          $lead_obj->bind_param("sssssssssssssssssss",$this->offerprice,$this->switchof,$this->billimei,$this->boximei,$this->strap,$this->charger,
          $this->bluetooth,$this->optical,$this->button,$this->dc,$this->charging,$this->speaker,$this->wifi,$this->battery,$this->touchscreen,
          $this->condition,$this->age,$this->warin,$this->lead_id);
          if($lead_obj->execute()){
             $data = "success";
            return $data;
          }else{
              $data = "";
            return $data;
          }
        }
        
        
        
      }
      
?>