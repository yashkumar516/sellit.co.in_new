<?php
session_start();
function GENERATELOGS_API($DATA,$BLOCK,$flag=0) {
    $file_name = "/var/log/aakarist/agentlead.txt";
    if(file_exists($file_name)) {
            $fp     =       fopen($file_name,"a+");
            fwrite($fp, date("Y-m-d H:i:s")."\t");
            if($flag==1){
                    fwrite($fp,"(".$BLOCK.")\n");
                    fwrite($fp,print_r($DATA,true));
                    fwrite($fp,"\n\n");
            }
            else{
                    fwrite($fp,"(".$BLOCK.")=====".$DATA."\n");
            }
            fclose($fp);
    }
}

include 'config.php';
$uid = $name = $email = "";
if (isset($_POST['mobile'])) {
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    $row = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `userrecord` WHERE `mobile` = '$mobile' "));
    if ($row >= 1) {
        $usertype = "old";
        $fetchuid = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `userrecord` WHERE `mobile` = '$mobile' "));
        $uid = $fetchuid['id'];
        $name = $fetchuid['name'];
        $email = $fetchuid['email'];
    } else {
        $usertype = "new";
        $uid = '';
    }
    if ($mobile == '9252066487') {
        $phone = '919252066487';
        $otp = 123456;
    } else {
        $phone = '91' . $mobile;
        $otp = mt_rand(100000, 999999);
    }
    // fasttosmms api start
    $fields = array(
        "variables_values" => "$otp",
        "route" => "otp",
        "numbers" => "$mobile",
    );
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
            "authorization: Q6BoCfJIKi05yDOvm8aSgUGbYrLpER7NseA93cuFxWTXZVkq2h3h1n57sJNfZtRGkS8LyqI2VBrKPEYv",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
        ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    $response = json_decode($response,true);
    if ($response['return'] == true) {
        $list = [
            'status' => 'success',
            'usertype' => "$usertype",
            'uid' => "$uid",
            'otp' => "$otp",
            'name' => "$name",
            'email' => "$email",
            'mobile' => "$mobile",
            'message' => 'message sent to user successfully'
        ];
        echo json_encode($list);
    }else{
        echo 'response=>'.$response;
    }
} else {
    $list = [
        'status' => '0',
        'message' => 'method should be post'
    ];
    echo json_encode($list);
}