<?php 
   session_start();
   include 'config.php';
    if(isset($_POST['mobile'])){
      $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
      $row = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `mobile` = '$mobile' "));
      if($row >= 1){
      $data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `mobile` = '$mobile' ")); 
      $uid = $data['id'];
      $status = $data['status'];

      // Check if status is inactive
      if ($status === 'inactive') {
        $name = $_POST['name'];
        $email =$_POST['email'];
          // Update status to 'active', and update name and email
          $update_query = "UPDATE `userrecord` SET `status` = 'active', `name` = '$name', `email` = '$email' WHERE `id` =  $uid";
          mysqli_query($con, $update_query);
      }  else{

        $name = $data['name'];
        $email = $data['email'];
      }
      }else{
      $name = mysqli_real_escape_string($con,$_POST['name']);
      $email = mysqli_real_escape_string($con,$_POST['email']);
      $insert = mysqli_query($con,"INSERT INTO `userrecord`(`mobile`,`name`,`email`) values('$mobile','$name','$email')");
      $uid = LAST_INSERT_ID($con);
      }
       $list = [
               'status' => 'success',
	       'userid' => "$uid",
	       'name' => "$name",
              'email' => "$email",
              'mobile' => "$mobile", 

           ];
           echo json_encode($list);
     }else{
       $list = [
               'status' => '0',
               'message' => 'method should be post'
           ];
           echo json_encode($list);
    }
   ?>