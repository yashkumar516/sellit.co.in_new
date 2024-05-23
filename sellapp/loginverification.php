<?php include 'header.php' ?>
<?php
 if(isset($_SESSION['otp']) && isset($_REQUEST['mob'])){
      $otp = $_SESSION['otp'];
      $number = $_REQUEST['mob'];
   }
   if(isset($_POST['otp'])){
      $name = $_POST['name'];
      $otp1 = $_POST['otpverify'];
      if(isset($_SESSION['user'])){
      if($otp == $otp1){
      echo  "<script>
               window.location.href = 'userdashboard.php';
             </script>";
    }
   }else{
    if($otp == $otp1){
    $inquery = mysqli_query($con,"INSERT INTO `userrecord` (`mobile`,`name`) VALUES('$number','$name') ");
    if($inquery){
    $seluser = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` ORDER BY `id` DESC LIMIT 1"));
    if($seluser){
      $_SESSION['user'] = $seluser['id'];
      echo "<script>
          window.location.href = 'userdashboard.php';
          </script>";
   }
  }
  }
 } 
}
?>
<section>
          <div class="container-fluid">
            <div class="row p-5" id="signmob">
          
                    <div class="col-12 col-lg-11 mx-auto my-auto text-center ">
                        <img src="assets/images/Group 494.png" class="img-fluid" alt="img" >
                        <h1 class="text-white my-4">Welcome To Sell It</h1>
                        <div class="row">
                        <div class="col-11 col-lg-4 mx-auto">
                        <form  method="POST">
                        <div class="form-group">
                        <input type="text" class="form-control py-2 px-2 my-3" name="name" id="name" placeholder=" Enter your Name" required>
                        <input type="text" class="form-control py-2 px-2 my-3" name="otpverify" id="mobile" value="<?php echo $otp ?>" placeholder=" Enter your otp" required>
                        <button type="submit" name="otp" class="form-control col-lg-6 col-8 py-2 px-2 mx-auto my-3"> <b> Continue </b></button>
                        </div>
                        </form>
                        </div>
                        </div>
                    </div>

                </div>
                </div>
</section>

<?php include 'footer1.php' ?>


