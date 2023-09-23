<?php
  class Users{
      private $conn;

      public function  __construct($db){
          $this->conn = $db;
      }
        
        public function check_email(){
          $usr_obj = $this->conn->prepare("SELECT * FROM vendors where email = ? && password = ?");
          $usr_obj->bind_param("ss",$this->email,$this->password);
          if($usr_obj->execute()){
            $data = $usr_obj->get_result();
            return $data->fetch_assoc();
          }
          return array();
        }
        
         public function check_email1(){
          $usr_obj = $this->conn->prepare("SELECT * FROM ajents where email = ? && password = ?");
          $usr_obj->bind_param("ss",$this->email,$this->password);
          if($usr_obj->execute()){
            $data = $usr_obj->get_result();
            return $data->fetch_assoc();
          }
          return array();
        }

        public function get_all_leads(){
          $leadobj = $this->conn->prepare("SELECT *  FROM enquiry INNER JOIN vendors on  enquiry.vendor_id  = vendors.id
          INNER JOIN address on address.enquid = enquiry.id
          INNER  JOIN address1 on address1.id = address.addressid 
          where enquiry.vendor_id = ? && enquiry.status = ?");
          $leadobj->bind_param("ss",$this->vendorid,$this->status);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
         public function get_ajent_leads(){
          $leadobj = $this->conn->prepare("SELECT *  FROM enquiry INNER JOIN vendors on  enquiry.vendor_id  = vendors.id
          INNER JOIN address on address.enquid = enquiry.id
          INNER  JOIN address1 on address1.id = address.addressid 
          where vendor_id = ? && ajentid = ? && enquiry.status = ?");
          $leadobj->bind_param("sss",$this->vendorid,$this->ajentid,$this->status);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
        public function lead_description(){
        //$leadobj = $this->conn->prepare("SELECT *  FROM `enquiry` LEFT  JOIN `userrecord` on userrecord.id = enquiry.userid LEFT  JOIN `useraccount` on useraccount.enquiryid = enquiry.id  LEFT  JOIN `address` on address.enquid = enquiry.id LEFT  JOIN `address1` on address1.id = address.addressid  where  vendor_id = ? && enquiry.id = ?");
        //   $leadobj = $this->conn->prepare("SELECT *  FROM `enquiry` LEFT  JOIN `varient` on varient.id = enquiry.varientid LEFT  JOIN `userrecord` on userrecord.id = enquiry.userid LEFT  JOIN `useraccount` on useraccount.enquiryid = enquiry.id  LEFT  JOIN `address` on address.enquid = enquiry.id LEFT  JOIN `address1` on address1.id = address.addressid  where  vendor_id = ? && enquiry.id = ?");
          $leadobj = $this->conn->prepare("SELECT *  FROM `enquiry` LEFT  JOIN `userrecord` on userrecord.id = enquiry.userid LEFT  JOIN `useraccount` on useraccount.enquiryid = enquiry.id  LEFT  JOIN `address` on address.enquid = enquiry.id LEFT  JOIN `address1` on address1.id = address.addressid  where  vendor_id = ? && enquiry.id = ?");
          $leadobj->bind_param("ss",$this->vendorid,$this->lead_id);
          $leadobj->execute();
          return $leadobj->get_result();

        }
        
         public function leadupdate(){
          $lead_obj = $this->conn->prepare("update `enquiry` set `status` = ? where vendor_id = ? && id = ?");
          $lead_obj->bind_param("sss",$this->status,$this->vendorid,$this->lead_id);
          if($lead_obj->execute()){
            $selvendor = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM `vendors` WHERE `id` = '$this->vendorid' "));
            if($selvendor){
                $mainbalane = $selvendor['mainwallet'];
                $mainonhold = $selvendor['mainonhold'];
                $updatemainbalance = $mainbalane - $this->amount;
                $updatemainhold = $mainonhold + $this->amount;
                $updatevendor = mysqli_query($this->conn,"UPDATE `vendors` SET `mainwallet` = '$updatemainbalance',`mainonhold` = '$updatemainhold' WHERE `id` = '$this->vendorid'");
                if($updatevendor){
                   $data = "successfully"; 
                }else{
                   $data = ""; 
                }
            }else{
            $data = "";
            }
          }else{
            $data = "";
          }
          return $data;
        }
        
        public function check_ajant(){
          $ajant_obj = $this->conn->prepare("SELECT * FROM ajents where email = ? ");
          $ajant_obj->bind_param("s",$this->email);
          if($ajant_obj->execute()){
            $data = $ajant_obj->get_result();
            return $data;
          }
          return array();
        }
        
        public function check_ajant1(){
          $ajant_obj = $this->conn->prepare("SELECT * FROM ajents where email = ? AND id != ?");
          $ajant_obj->bind_param("ss",$this->email,$this->ajentid);
          if($ajant_obj->execute()){
            $data = $ajant_obj->get_result();
            return $data;
          }
          return array();
        }
        
         public function deleteajent(){
          $ajant_obj = $this->conn->prepare("DELETE FROM ajents where vendorid = ? AND id = ?");
          $ajant_obj->bind_param("ss",$this->vendorid,$this->ajentid);
          if($ajant_obj->execute()){
            $data = "delete";
          }else{
              $data = "";
          }
          return $data;
        }
        
         public function create_ajant(){
          $ajant_obj = $this->conn->prepare("INSERT INTO ajents(`vendorid`,`ajentname`,`email`,`password`,`phone`,`adhar`,`image`,`address`) VALUES(?,?,?,?,?,?,?,?)");
          $ajant_obj->bind_param("ssssssss",$this->vendorid,$this->name,$this->email,$this->password,$this->phone,$this->adhar,$this->image,$this->address);
          if($ajant_obj->execute()){
            $data = "success create";
          }else{
              $data = "";
          }
           return $data; 
        }
        
         public function get_all_ajents(){
          $leadobj = $this->conn->prepare("SELECT * FROM `ajents` where vendorid = ? && status = 'active'");
          $leadobj->bind_param("s",$this->vendorid);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
          public function assignlead(){
          $lead_obj = $this->conn->prepare("update `enquiry` set `ajentid` = ? where vendor_id = ? && id = ?");
          $lead_obj->bind_param("sss",$this->ajentid,$this->vendorid,$this->leadid);
          if($lead_obj->execute()){
           $data = "update successfuly";
          }else{
               $data = "";
          }
          return $data;
        }
        
         public function update_ajant(){
          $lead_obj = $this->conn->prepare("update `ajents` set `ajentname` = ?,`email` = ?,`phone` = ?,`address` = ? where id = ? && vendorid = ?");
          $lead_obj->bind_param("ssssss",$this->name,$this->email,$this->phone,$this->address,$this->ajentid,$this->vendorid);
          if($lead_obj->execute()){
           $data = "update successfuly";
          }else{
               $data = "";
          }
          return $data;
        }
        
        
        public function get_today_leads(){
        //   $leadobj = $this->conn->prepare("SELECT *  FROM enquiry INNER JOIN vendors on  enquiry.vendor_id  = vendors.id
        //   INNER JOIN address on address.enquid = enquiry.id
        //   INNER JOIN varient on varient.id = enquiry.varientid
        //   INNER  JOIN address1 on address1.id = address.addressid 
        //   where enquiry.vendor_id = ? && enquiry.status = ? && address.day = ? && address.day1 = ? && address.year = ?");
        $leadobj = $this->conn->prepare("SELECT *  FROM enquiry INNER JOIN vendors on  enquiry.vendor_id  = vendors.id
          INNER JOIN address on address.enquid = enquiry.id
          INNER  JOIN address1 on address1.id = address.addressid 
          where enquiry.vendor_id = ? && enquiry.status = ? && address.day = ? && address.day1 = ? && address.year = ?");
          $leadobj->bind_param("sssss",$this->vendorid,$this->status,$this->year,$this->day,$this->newdate);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
        public function get_todayajent_leads(){
          $leadobj = $this->conn->prepare("SELECT *  FROM enquiry INNER JOIN vendors on  enquiry.vendor_id  = vendors.id
          INNER JOIN address on address.enquid = enquiry.id
          INNER JOIN varient on varient.id = enquiry.varientid
          INNER  JOIN address1 on address1.id = address.addressid 
          where enquiry.ajentid = ? && enquiry.status = ? && address.day = ? && address.day1 = ? && address.year = ?");
          $leadobj->bind_param("sssss",$this->ajentid,$this->status,$this->year,$this->day,$this->newdate);
          $leadobj->execute();
          return $leadobj->get_result();
        }
        
        
         public function leadscheduled(){
         $lead_obj = $this->conn->prepare("update `address` set `soon` = ?,`time` = ?,`day` = ?,`day1` = ?,`year` = ? ,`reason` = ? where enquid = ? ");
          $lead_obj->bind_param("sssssss",$this->soon,$this->scheduletime,$this->date,$this->month,$this->year,$this->reason,$this->lead_id);
          if($lead_obj->execute()){
           $data = "update successfuly";
          }else{
               $data = "";
          }
          return $data;
        }
        
          public function leadcomplete(){
          $ajant_obj = $this->conn->prepare("UPDATE `enquiry` set `status`= ?,`emino`= ?,`pic1`= ?,`pic2`= ?,`pic3`= ?,`pic4`= ?,`extraamount`= ?,`aadharfront`= ?,`aadharback`= ? WHERE `id`= ? && `vendor_id`= ? ");
          $ajant_obj->bind_param("sssssssssii",$this->status,$this->IMEI,$this->pic1,$this->pic2,$this->pic3,$this->pic4,$this->extraamount,$this->aadharfront,$this->aadharback,$this->lead_id,$this->vendorid);
          if($ajant_obj->execute()){
            $data = "update successfully";
          }else{
              $data = "";
          }
           return $data;    
              
          }
          
          public function leadtobecomplete(){
          $ajant_obj = $this->conn->prepare("UPDATE `enquiry` set `status`= ?,`failreason`= ?,`offerprice`= ?,`pic1`= ?,`pic2`= ?,`pic3`= ?,`pic4`= ?,`customerprice`= ? WHERE `id`= ? && `vendor_id`= ? ");
          $ajant_obj->bind_param("ssssssssii",$this->status,$this->reason,$this->offerprice,$this->pic1,$this->pic2,$this->pic3,$this->pic4,$this->customerprice,$this->lead_id,$this->vendorid);
          if($ajant_obj->execute()){
            $data = "update successfully";
          }else{
              $data = "";
          }
           return $data;    
          }
        
        public function agentselfie(){
          $ajant_obj = $this->conn->prepare("UPDATE `enquiry` set `selfie`= ? WHERE `id`= ? && `vendor_id`= ? ");
          $ajant_obj->bind_param("sii",$this->selfie,$this->lead_id,$this->vendorid);
          if($ajant_obj->execute()){
            $data = "update successfully";
          }else{
              $data = "";
          }
           return $data; 
        }
 
      }
      
?>