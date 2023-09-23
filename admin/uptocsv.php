<?php include 'includes/confile.php' ?>
<?php
  if(isset($_POST['pricecsv'])){
      $filename = $_FILES['uptofile']['tmp_name'];
      if($_FILES['uptofile']['size'] > 0)
      {
          $file = fopen($filename, 'r');
          while(($getdata = fgetcsv($file, 1000, ",")) !== FALSE)
          {
              $updatequery = mysqli_query($con,"UPDATE `varient` SET `uptovalue`= '$getdata[4]' WHERE `id`= '$getdata[0]' ");
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