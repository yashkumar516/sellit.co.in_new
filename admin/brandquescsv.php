<?php include 'includes/confile.php' ?>
<?php
  if(isset($_POST['uploadcsv'])){
      $filename = $_FILES['csvfile']['tmp_name'];
      if($_FILES['csvfile']['size'] > 0)
      {
          $file = fopen($filename, 'r');
          while(($getdata = fgetcsv($file, 1000, ",")) !== FALSE)
          {    
              $updatequery = mysqli_query($con,"UPDATE `subcategory` SET `callvalue`= '$getdata[2]',`3months`='$getdata[3]',
              `3to6months`='$getdata[4]',`6to11months`='$getdata[5]',`above11`='$getdata[6]',`touchscreen`='$getdata[7]',
              `largespot`='$getdata[8]',`multiplespot`='$getdata[9]',`minorspot`='$getdata[10]',`nospot`='$getdata[11]',
              `displayfade`='$getdata[12]',`multilines`='$getdata[13]',`nolines`='$getdata[14]',`crackedscreen`='$getdata[15]',
              `damegescreen`='$getdata[16]',`heavyscracthes`='$getdata[17]',`12scratches`='$getdata[18]',`noscratches`='$getdata[19]',
              `majorscratch`='$getdata[20]',`2bodyscratches`='$getdata[21]',`nobodysratches`='$getdata[22]',`heavydents`='$getdata[23]',
              `2dents`='$getdata[24]',`nodents`='$getdata[25]',`crackedsideback`='$getdata[26]',`missingsideback`='$getdata[27]',
              `nodefectssideback`='$getdata[28]',`bentcurvedpanel`='$getdata[29]',`loosescreen`='$getdata[30]',`nobents`='$getdata[31]',
              `charger`='$getdata[32]',`earphone`='$getdata[33]',`boximei`='$getdata[34]',`billimei`='$getdata[35]' WHERE `id`= '$getdata[0]' ");

          }
          if($updatequery){
             echo '<script>
                   alert("update successfully");
                   window.location.href = "brandquestions.php";
                   </script>';
          }
      }
  }
?>