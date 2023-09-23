<?php include 'includes/confile.php' ?>
<?php
  if(isset($_POST['uploadcsv'])){
      $filename = $_FILES['csvfile']['tmp_name'];
      if($_FILES['csvfile']['size'] > 0)
      {
          $file = fopen($filename, 'r');
          while(($getdata = fgetcsv($file, 1000, ",")) !== FALSE)
          {
              $updatequery = mysqli_query($con,"UPDATE `watchquestions` SET `switchof`= '$getdata[3]',`touchfaulty`='$getdata[4]',
              `wifi`='$getdata[5]',`batteryfault`='$getdata[6]',`magnetic`='$getdata[7]',`sidebutton`='$getdata[8]',`digitalcrown`='$getdata[9]',
              `speaker`='$getdata[10]',`opticalheart`='$getdata[11]',`bluetoothfault`='$getdata[12]',`charger`='$getdata[13]',
              `box`='$getdata[14]',`strap`='$getdata[15]',`bill`='$getdata[16]',`flawless`='$getdata[17]',
              `good`='$getdata[18]',`averege`='$getdata[19]',`belowavere`='$getdata[20]',`outofwarrenty`='$getdata[21]',
              `under3`='$getdata[22]',`3to6`='$getdata[23]',`6to11`='$getdata[24]',`above11`='$getdata[25]',`uptovalue`='$getdata[26]' WHERE `product_name`= '$getdata[0]' ");
          }
          if($updatequery){
               echo '<script>
                      alert("update successfully");
                      window.location.href = "addwatch.php";
                    </script>';
          }
      }
  }
?>