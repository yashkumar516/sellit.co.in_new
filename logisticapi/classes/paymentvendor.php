<?php
  class Users{
      private $conn;

      public function  __construct($db){
          $this->conn = $db;
      }
        
      public function transaction(){
           $transaction = $this->conn->prepare("INSERT INTO transaction(`orderid`,`vendorid`,`vendorrazorpayaccountid`,`paymenttype`,`paid_amount`,`to_be_paid`,`created_at`,`paymentstatus`) 
           VALUES(?,?,?,?,?,?,?,?)");
           $transaction->bind_param("ssssssss",$this->orderid,$this->vendorid,$this->razorpayaccountid,$this->paymenttype,$this->amount_paid,$this->amount_due,$this->created_at,$this->paymentstatus);
           if($transaction->execute()){
            $data = "success_create";
          }else{
              $data = "";
          }
           return $data;
      }
      
      public function update_transaction(){
           $transaction = $this->conn->prepare("UPDATE transaction SET `paymentid`=?,`signature`=?,`paid_amount`=?,`paymentstatus`=? WHERE `orderid`=? && `vendorid`=? && `vendorrazorpayaccountid`=?");
           $transaction->bind_param("sssssss",$this->razorpay_payment_id,$this->razorpay_signature,$this->amount,$this->status,$this->razorpay_order_id,$this->vendor_id,$this->razorpayaccountid);
           if($transaction->execute()){
        //   order_detail entry
           $order_detail = $this->conn->prepare("INSERT INTO walletdetail(`paymentid`,`vendorid`,`razaccountid`,`amount`,`paymenttype`)
           VALUES(?,?,?,?,?)");
           $order_detail->bind_param("sssss",$this->razorpay_payment_id,$this->vendor_id,$this->razorpayaccountid,$this->amount,$this->paymenttype);
           if($order_detail->execute()){
            // new code start
              $getmainbal = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM `vendors` WHERE `id` ='$this->vendor_id' AND `razorpayaccountid` ='$this->razorpayaccountid'"));
              if($getmainbal){
              if(strcasecmp($this->paymenttype,"mainwallet") == 0 ){
              $total = $getmainbal['mainwallet']+$this->amount; 
              $updbal = mysqli_query($this->conn,"UPDATE `vendors` SET `mainwallet` = '$total' WHERE `id`='$this->vendor_id' AND `razorpayaccountid`='$this->razorpayaccountid' ");
              if($updbal){
                $data = "sucessfull_inserted";  
              }
             }elseif(strcasecmp($this->paymenttype,"commissionwallet") == 0 ){
              $total = $getmainbal['commissionwallet']+$this->amount; 
              $updbal = mysqli_query($this->conn,"UPDATE `vendors` SET `commissionwallet` = '$total' WHERE `id`='$this->vendor_id' AND `razorpayaccountid`='$this->razorpayaccountid' ");
              if($updbal){
                $data = "sucessfull_inserted";  
              }
             }
              }else{
                 $data = '';  
              }
            // new code end
           }else{
            $data = '';
           }
           return $data;
         //   order_detail entry end
          }else{
              $data = "";
              return $data;
          }
      }
      
    public function admindetail(){
         $usr_obj = $this->conn->prepare("SELECT * FROM vendors where id = ? && razorpayaccountid = ?");
          $usr_obj->bind_param("ss",$this->vendor_id,$this->razorpayaccountid);
          if($usr_obj->execute()){
            $data = $usr_obj->get_result();
            return $data->fetch_assoc();
          }
          return array();
    }  
    
    public function admindaccount(){
        $leadobj = $this->conn->prepare("SELECT *  FROM `walletdetail` where  vendorid = ? && razaccountid = ?");
          $leadobj->bind_param("ss",$this->vendor_id,$this->razorpayaccountid);
          $leadobj->execute();
          return $leadobj->get_result();
    }
      
}
      
?>