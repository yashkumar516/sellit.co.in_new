
<?php include 'includes/confile.php' ?>
<?php
$submenuid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `vendors` WHERE `id` = '$submenuid'");
if($delete)
{
  echo "<script>
    alert('delete successfully');
    window.location.href = 'vendorlist.php';
    </script>";
}
else
{
  echo "<script>
    alert('delete unsuccessfully');
    window.location.href = 'vendorlist.php';
    </script>";
}
?>