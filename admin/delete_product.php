<?php include 'includes/confile.php' ?>
<?php
$productid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `product` WHERE `id` = '$productid'");
$deletevarient= mysqli_query($con,"DELETE FROM `varient` WHERE `product_name` = '$productid'");
$deletequestion= mysqli_query($con,"DELETE FROM `questions` WHERE `product_name` = '$productid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'product-list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'product-list.php';
    </script>";
}
?>