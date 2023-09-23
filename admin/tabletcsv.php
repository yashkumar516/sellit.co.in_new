<?php include 'includes/confile.php' ?>
<?php
  if(isset($_POST['uploadcsv'])){
      $filename = $_FILES['csvfile']['tmp_name'];
      if($_FILES['csvfile']['size'] > 0)
      {
          $file = fopen($filename, 'r');
          while(($getdata = fgetcsv($file, 1000, ",")) !== FALSE)
          {
              $updatequery = mysqli_query($con,"UPDATE `tabletquestions` SET `switchof`= '$getdata[6]',`Frontcam`='$getdata[7]',
              `backcam`='$getdata[8]',`wifi`='$getdata[9]',`speaker`='$getdata[10]',`power/home`='$getdata[11]',`charging`='$getdata[12]',
              `battery`='$getdata[13]',`microphone`='$getdata[14]',`volumebutton`='$getdata[15]',`fingerprint`='$getdata[16]',
              `gps`='$getdata[17]',`bluetooth`='$getdata[18]',`charger`='$getdata[19]',`box`='$getdata[20]',
              `pencil`='$getdata[21]',`bill`='$getdata[22]',`sflawless`='$getdata[23]',`sgood`='$getdata[24]',
              `saverege`='$getdata[25]',`sdamaged`='$getdata[26]',`pflawless`='$getdata[27]',`pgood`='$getdata[28]',
              `paverege`='$getdata[29]',`pdamaged`='$getdata[30]',`outofwarrenty`='$getdata[31]',`below3`='$getdata[32]',
              `3to6`='$getdata[33]',`6to11`='$getdata[34]',`above11`='$getdata[35]' WHERE `product_name`= '$getdata[0]' ");
              
               mysqli_query($con,"UPDATE `tabletsvarient` SET `product_name` = '$getdata[0]',`varient` = '$getdata[3]',`uptovalue` = '$getdata[4]' WHERE `vid` = '$getdata[1]'");
          }
          if($updatequery){
               echo '<script>
                      alert("update successfully");
                      window.location.href = "addtablet.php";
                    </script>';
          }
      }
  }
?>