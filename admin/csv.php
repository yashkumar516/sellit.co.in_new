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
             
             $getdata[1] = intval($getdata[1]);
             $getdata[24] = intval($getdata[24]);
             
              $updatevarient = mysqli_query($con,"UPDATE `varient` SET `product_name` = '$getdata[0]',`varient` = '$getdata[3]',`uptovalue` = '$getdata[4]' WHERE `id` = '$getdata[1]'");
              
               mysqli_query($con,"UPDATE `subcategory` SET `callvalue` = '$getdata[25]',`3months` = '$getdata[26]',`3to6months` = '$getdata[27]',`6to11months` = '$getdata[28]',`above11` = '$getdata[29]'
               ,`touchscreen` = '$getdata[30]' ,`largespot` = '$getdata[31]',`multiplespot` = '$getdata[32]',`minorspot` = '$getdata[33]',`nospot` = '$getdata[34]',`displayfade` = '$getdata[35]',`multilines` = '$getdata[36]'
               ,`nolines` = '$getdata[37]',`crackedscreen` = '$getdata[38]',`damegescreen` = '$getdata[39]',`heavyscracthes` = '$getdata[40]',`12scratches` = '$getdata[41]',`noscratches` = '$getdata[42]'
               ,`majorscratch` = '$getdata[43]',`2bodyscratches` = '$getdata[44]',`nobodysratches` = '$getdata[45]',`heavydents` = '$getdata[46]',`2dents` = '$getdata[47]',`nodents` = '$getdata[48]'
               ,`crackedsideback` = '$getdata[49]',`missingsideback` = '$getdata[50]',`nodefectssideback` = '$getdata[51]',`bentcurvedpanel` = '$getdata[52]',`loosescreen` = '$getdata[53]'
               ,`nobents` = '$getdata[54]',`charger` = '$getdata[55]',`earphone` = '$getdata[56]',`boximei` = '$getdata[57]',`billimei` = '$getdata[58]'  WHERE `id` = '$getdata[24]'");
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
