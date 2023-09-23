<!--<php include 'header.php' ?>-->
<?php
 if(isset($_SESSION['otp']) && isset($_REQUEST['mob'])){
      $otp = $_SESSION['otp'];
      $number = $_REQUEST['mob'];
   }
   if(isset($_POST['otp'])){
    $otp1 = $_POST['otpverify'];
    if($otp == $otp1){
    $rows = mysqli_num_rows(mysqli_query($con,"SELECT * From `userrecord` WHERE `mobile` = '$number'"));
    if($rows > 0){
    $seluser = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `mobile` = '$number'"));
     if($seluser){
      $_SESSION['user'] = $seluser['id'];
      unset($_SESSION['otp']);    
      echo "<script>
            window.location.href = 'index.php';
          </script>";
      }
    }else{
    $inquery = mysqli_query($con,"INSERT INTO `userrecord` (`mobile`,`name`) VALUES('$number','$name') ");
    if($inquery){
    $seluser = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` ORDER BY `id` DESC LIMIT 1"));
    if($seluser){
      $_SESSION['user'] = $seluser['id'];
      unset($_SESSION['otp']);     
      echo "<script>
          window.location.href = 'index.php';
          </script>";
      }
     }
    }
  }else{
     echo "<script>
          alert('Enter Correct Otp');
         </script>";  
  }
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
<section>
          <div class="container-fluid">
            <div class="row p-5" id="signmob">
          
                    <div class="col-12 col-lg-11 mx-auto my-auto text-center ">
                        <img src="assets/images/Group 494.png" alt="img" >
                        <h1 class="text-white my-4">Welcome To Sell It</h1>
                        <div class="row">
                        <div class="col-11 col-lg-4 mx-auto">
                        <form  method="POST">
                        <div class="form-group">
                        <?php if(!isset($_SESSION['user'])){ ?>
                        <input type="text" class="form-control py-2 px-2 my-3" name="name" id="name" placeholder=" Enter your Name" required>
                        <?php } ?>
                        <input type="text" class="form-control py-2 px-2 my-3" name="otpverify" id="mobile" value="" placeholder=" Enter your otp" required>
                        <button type="submit" name="otp" class="form-control col-lg-6 col-8 py-2 px-2 mx-auto my-3"> <b> Continue </b></button>
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
