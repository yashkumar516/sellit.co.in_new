<?php include 'includes/confile.php' ?>
<?php
$bunid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `bundle_sec1` WHERE `id` = '$bunid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'bundle_sec1_list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'bundle_sec1_list.php';
    </script>";
}
?>