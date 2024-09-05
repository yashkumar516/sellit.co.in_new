<?php session_start(); ?>
<?php
include "admin/includes/confile.php";
if (isset($_POST["mobile"])) {
  $phone = $_POST["mobile"];
  $otp = mt_rand(100000, 999999);
  $_SESSION["otp"] = $otp; // fasttosmms api start
  $fields = [
    "variables_values" => "$otp",
    "route" => "otp",

    "numbers" => "$phone",
  ];
  $curl = curl_init();
  curl_setopt_array($curl, [
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
    CURLOPT_HTTPHEADER => [
      "authorization: Q6BoCfJIKi05yDOvm8aSgUGbYrLpER7NseA93cuFxWTXZVkq2h3h1n57sJNfZtRGkS8LyqI2VBrKPEYv",
      "accept: */*",
      "cache-control: no-cache",
      "content-type: application/json",
    ],
  ]);
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  $row = mysqli_fetch_assoc(
    mysqli_query(
      $con,
      "SELECT * FROM `userrecord` WHERE `mobile` = '$phone' "
    )
  );
  if ($row != "") {
    $uid = $row["id"];
    echo $uid;
  } else {
    echo "";
  } // if ($err) { //   echo "cURL Error #:" . $err; // } else { //   echo $response; // } // fasttosmsmapiend // echo $_SESSION['otp'] ;

  // Process your response here
  // $email = $_POST['email']; // $otp = mt_rand(100000,999999);

  // $_SESSION['otp'] = $otp; //    $subject = "otp"; //    $body = "Hi $email.  your one time password is = $otp"; //    $sender = "From: kyash2656@gmail.com"; //    if(mail($email,$subject,$body,$sender)) //    { //      echo '<script>
  //        alert("Email send"); //       </script>';
  //      } //       else{ //       echo "<script> alert('Email not send') </script>"; //        }
}
?>