<?php
 
include 'config.php'; 
if (isset($_POST['uid'])) {
    $uid = $_POST['uid'];
    $row = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `userrecord` WHERE `id` = $uid "));
    if ($row >= 1) {
        // Update status to 'active', and update name and email
        $update_query = "UPDATE `userrecord` SET `status` = 'inactive'  WHERE `id` =  $uid";
        mysqli_query($con, $update_query); 
        $list = [
            'status' => 'success', 
            'message' => 'user removed successfully.'
        ];
        echo json_encode($list);
    } else {
        $list = [
            'status' => '0',
            'message' => 'user does not exist.'
        ];
        echo json_encode($list);
    }  
    
} else {
    $list = [
        'status' => '0',
        'message' => 'method should be post.'
    ];
    echo json_encode($list);
}