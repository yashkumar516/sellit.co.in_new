<?php 
include 'config.php';
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $enquiryid = $_POST['enquiryid'];
    $accountno = $_POST['accountno'];
    $confirmaccountno = $_POST['confirmaccountno'];
    $beneficiaryname = $_POST['beneficiaryname'];
    $ifsc = $_POST['ifsc'];
    $bankname = $_POST['bankname'];
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
