<?php include 'header.php' ?>
<?php
if (isset($_POST['mobileverification'])) {
  $mobilenumber = $_POST['phone'];
  $phone = '91' . $_POST['phone'];
  $otp = mt_rand(100000, 999999);
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
  if ($response != '') {
    $row = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `userrecord` WHERE `mobile` = '$mobilenumber' "));
    if ($row >= 1) {
      $seluser = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `userrecord` WHERE `mobile` = '$mobilenumber' "));
      if ($seluser) {
        $_SESSION['user'] =  $seluser['id'];
        echo "<script>
                window.location.href = 'loginverification.php?mob='+$mobilenumber;
                </script>";
      }
    } else {
      echo "<script>
                window.location.href = 'loginverification.php?mob='+$mobilenumber;
                </script>";
    }
  }
}
?>
<section id="loginfo">
  <div class="container-fluid">
    <div class="row p-5" id="signmob">

      <div class="col-12 col-lg-11 mx-auto my-auto text-center ">
        <img src="assets/images/Group 494.png" class="img-fluid" alt="img">
        <h1 class="text-white my-4">Welcome To Sell It</h1>
        <div class="row">
          <div class="col-11 col-lg-4 mx-auto">
            <form action="" method="post" id="myformmobile">
              <div class="form-group">
                <input type="text" class="form-control py-2 px-2 my-3" name="phone" id="mobile" placeholder=" Mobile Number" required>
                <button type="submit" name="mobileverification" class="form-control col-lg-6 col-8 py-2 px-2 mx-auto my-3"> <b> Continue </b></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer1.php' ?>