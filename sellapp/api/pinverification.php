<?php 
   include 'config.php';
 if(isset($_REQUEST['pincode'])){
    $pin = $_REQUEST['pincode'];
    $rows = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `pincodes` WHERE `Pincode` = '$pin' "));
    if($rows >= 1){
       $data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `pincodes` WHERE `Pincode` = '$pin' "));
      echo json_encode(array(
        'status' => 'success',"message"=>"we are available at this location", "state"=>$data['StateName'],"city"=>$data['District'],"pincode"=>$data['Pincode']));
    }else{ 
        echo json_encode(array(
          'status' => 'failed', "message"=>"We are currently available in Delhi NCR only"));
    }
 }
?>