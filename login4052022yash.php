<?php
session_start();
include 'admin/includes/confile.php';
?>
<?php
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $usermobile = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `userrecord` WHERE `id` = '$user' "));
  if ($usermobile) {
    $number = $usermobile['name'];
  } else {
    $number = '';
  }
} else {
  $number = '';
}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="assets/css/mob.css">
  <link rel="stylesheet" href="assets/css/about.css">
  <script src="https://kit.fontawesome.com/695826c815.js" crossorigin="anonymous"></script>
  <title>Sell it</title>
</head>
<body>
  <div class="container-fluid" id="prof">
    <div class="col-10 mx-auto">
      <div class="row">
        <div class="col-lg-2 col-5 offset-lg-10 offset-8" id="userprofile">
          <?php
          if ($number == null) {
          ?>
            <a href="login.php">
              <p><i class="fas fa-sign-in-alt"></i> Login</p>
            </a>
          <?php
          } else {
          ?>
            <a href="userdashboard.php">
              <p><i class="fas fa-user"></i> Profile</p>
            </a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
<?php
if (isset($_POST['mobileverification'])) {
  $mobilenumber = $_POST['phone'];
  $phone = '91' . $_POST['phone'];
  $otp = mt_rand(100000, 999999);
  $_SESSION['otp'] = $otp;
// fasttosmms api start
$fields = array(
    "variables_values" => "$otp",
    "route" => "otp",
    "numbers" => "$mobilenumber",
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

  if ($response) {
      echo "<script>
                window.location.href = 'loginverification.php?mob='+$mobilenumber;
            </script>";
    }
}
?>
<section id="loginfo">
  <div class="container-fluid">
    <div class="row p-5" id="signmob">

      <div class="col-12 col-lg-11 mx-auto my-auto text-center ">
        <img src="assets/images/Group 494.png"  class=" img-fluid "alt="img">
        <h1 class="text-white my-4">Welcome To Sell It</h1>
        <div class="row">
          <div class="col-11 col-lg-4 mx-auto">
            <form action="" method="post" id="myformmobile">
              <div class="form-group">
                <input type="text" class="form-control py-2 px-2 my-3" name="phone" id="mobile" placeholder=" Enter your Mobile Number" required>
                <button type="submit" name="mobileverification" class="form-control col-lg-6 col-8 py-2 px-2 mx-auto my-3"> <b> Continue </b></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

<script>
  $(document).ready(function() {
    $("#modalsearch").keyup(function() {
      var search = $("#modalsearch").val();
      if (search != '') {
        $.ajax({
          method: "post",
          url: "modalfound.php",
          data: {
            search: search
          },
          dataType: "html",
          success: function(result) {
            $('#ajaxresponse').fadeIn();
            $("#filter").css("display", "block");
            $('#ajaxresponse').html(result);
          }
        });
      } else {
        $('#ajaxresponse').fadeOut();
        $("#filter").css("display", "none");
        $('#ajaxresponse').html("");
      }
    })
    $("#modalsearch").focusout(function() {
      $('#ajaxresponse').fadeOut();
        $('#modalsearch').val("");
    })
  });
</script>

<script>
  $(document).ready(function() {
    $("#userpic").on('click', function() {
      $("#prof").toggle();
    });
  });
</script>