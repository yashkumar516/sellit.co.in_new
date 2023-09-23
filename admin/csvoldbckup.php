<?php include 'includes/confile.php' ?>
<?php
  if(isset($_POST['uploadcsv'])){
      $filename = $_FILES['csvfile']['tmp_name'];
      if($_FILES['csvfile']['size'] > 0)
      {
          $file = fopen($filename, 'r');
          while(($getdata = fgetcsv($file, 1000, ",")) !== FALSE)
          {    
              $updatequery = mysqli_query($con,"UPDATE `questions` SET `displayvalue`= '$getdata[6]',`copydisplay`='$getdata[7]',
              `front_camera`='$getdata[8]',`back_camera`='$getdata[9]',`volume`='$getdata[10]',`finger_touch`='$getdata[11]',
              `speaker`='$getdata[12]',`power_btn`='$getdata[13]',`face_sensor`='$getdata[14]',`charging_port`='$getdata[15]',
              `audio_receiver`='$getdata[16]',`camera_glass`='$getdata[17]',`wifi`='$getdata[18]',`silent_btn`='$getdata[19]',
              `battery`='$getdata[20]',`bluetooth`='$getdata[21]',`vibrator`='$getdata[22]',`microphone`='$getdata[23]' WHERE `product_name`= '$getdata[0]' ");
              
              $updatevarient = mysqli_query($con,"UPDATE `varient` SET `product_name` = '$getdata[0]',`varient` = '$getdata[3]',`uptovalue` = '$getdata[4]' WHERE `id` = '$getdata[1]'");
          }
          if($updatequery){
              echo '<script>
                      alert("update successfully");
                      window.location.href = "ecommerce-products-form.php";
                    </script>';
          }
      }
  }
?>