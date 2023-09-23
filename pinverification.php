<?php 
 include_once('admin/includes/confile.php');
 if(isset($_POST['pin'])){
    $pin = $_POST['pin'];
    $rows = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `pincodes` WHERE `Pincode` = '$pin' "));
    if($rows >= 1){
       $data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `pincodes` WHERE `Pincode` = '$pin' "));
      echo json_encode(array("error"=>'no',"state"=>$data['StateName'],"city"=>$data['District']));
    }else{
        echo json_encode(array("error"=>'yes'));
    }
 }
?>