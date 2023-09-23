<?php include 'includes/confile.php' ?>
<?php
  if(isset($_POST['uploadcsv'])){
      $filename = $_FILES['csvfile']['tmp_name'];
      if($_FILES['csvfile']['size'] > 0)
      {
          $file = fopen($filename, 'r');
          while(($getdata = fgetcsv($file, 1000, ",")) !== FALSE)
          {
              $updatequery = mysqli_query($con,"UPDATE `earpodequestions` SET `switchof`= '$getdata[3]',`speaker/mic`='$getdata[4]',`connectivity`='$getdata[5]',
              `flawless`='$getdata[6]',`good`='$getdata[7]',`averege`='$getdata[8]',`belowaverege`='$getdata[9]',`charger`='$getdata[10]',`cable`='$getdata[11]',`invoice`='$getdata[12]',`outofwarrenty`='$getdata[13]',
              `below3`='$getdata[14]',`3to6`='$getdata[15]',`6to11`='$getdata[16]',`above11`='$getdata[17]',`uptovalue`='$getdata[18]' WHERE `product_name`= '$getdata[0]' ");
          }
          if($updatequery){
               echo '<script>
                      alert("update successfully");
                      window.location.href = "addear.php";
                    </script>';
          }
      }
  }
?>