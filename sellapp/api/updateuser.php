<?php 
include 'config.php';
if(isset($_POST['uid'])){
    $uid = mysqli_real_escape_string($con,$_POST['uid']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $alternateno = mysqli_real_escape_string($con,$_POST['alternateno']);
    $insertquery = mysqli_query($con,"UPDATE `userrecord` SET `name`='$name',`email`='$email',`alternateno`='$alternateno' WHERE `id` = '$uid'");
    if($insertquery){
        $list = [
                'status' => 'success',
                'message' => 'update successfully'
            ];
    }else{
          $list = [
                'status' => "UPDATE `userrecord` SET `name`='$name',`email`='$email',`alternateno`='$alternateno' WHERE `id` = '$uid'",
                'message' => 'query failed try again'
            ];
    }   
    
    echo json_encode($list);
    
  }else{
        $list = [
                'status' => '0',
                'message' => 'Enter the values'
            ];
    echo json_encode($list);
 }
