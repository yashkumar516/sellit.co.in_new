<?php session_start() ?>
<?php
include '../admin/includes/confile.php';
if(isset($_POST['mobile'])){
 $phone = '91'.$_POST['mobile'];
 $otp = mt_rand(100000,999999);
 $_SESSION['otp'] = $otp;
// Account details
$apiKey = urlencode('7ZOCaAkcDMc-AEAXeNi0odPIHsyPuUkYkivMYxhONf');	
// Message details
$numbers = array($phone);
$sender = urlencode('600010');
$message = rawurlencode('Hi there, thank you for sending your first test message from Textlocal. See how you can send effective SMS campaigns here: https://tx.gl/r/2nGVj/');
$numbers = implode(',', $numbers);
// Prepare data for POST request
$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $_SESSION['otp'] ;
// Process your response here

    // $email = $_POST['email'];
    // $otp = mt_rand(100000,999999);
    // $_SESSION['otp'] = $otp;

    //    $subject = "otp";
    //    $body = "Hi $email.  your one time password is = $otp";
    //    $sender = "From: kyash2656@gmail.com";
    //    if(mail($email,$subject,$body,$sender))
    //    {
    //      echo '<script>
    //        alert("Email send");
    //       </script>';
    //      }
    //       else{
    //       echo "<script> alert('Email not send') </script>";
//        }
}
?>