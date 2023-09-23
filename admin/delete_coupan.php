<?php include 'includes/confile.php' ?>
<?php
$coupan = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `coupan` WHERE `id` = '$coupan'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'ecommerce-coupons-list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'ecommerce-coupons-list.php';
    </script>";
}
?>