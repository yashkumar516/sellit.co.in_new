

<?php include 'includes/confile.php' ?>
<?php
$fid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `shop_feature` WHERE `id` = '$fid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'shop-feature-list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'shop-feature-list.php';
    </script>";
}
?>