<?php 
include 'config.php';
if(isset($_POST['uid'])){
    $uid = mysqli_real_escape_string($con,$_POST['uid']);
    $enquiryid = mysqli_real_escape_string($con,$_POST['enquiryid']);
    $accountno = mysqli_real_escape_string($con,$_POST['accountno']);
    $confirmaccountno = mysqli_real_escape_string($con,$_POST['confirmaccountno']);
    $beneficiaryname = mysqli_real_escape_string($con,$_POST['beneficiaryname']);
    $ifsc = mysqli_real_escape_string($con,$_POST['ifsc']);
    $bankname = mysqli_real_escape_string($con,$_POST['bankname']);
    $insertquery = mysqli_query($con,"INSERT INTO `useraccount`(`userid`,`enquiryid`,`accountno`,`confirmaccountno`,`beneficiarname`,`ifsc`,`bankname`)
                                                   VALUES('$uid','$enquiryid','$accountno','$confirmaccountno','$beneficiaryname','$ifsc','$bankname')");
    if($insertquery){
        $list = [
                'status' => 'success',
                'message' => 'account added successfully'
            ];
    }else{
          $list = [
                'status' => 'failed',
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
