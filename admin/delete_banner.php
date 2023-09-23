<?php include 'includes/confile.php' ?>
<?php
$bannerid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `banner` WHERE `id` = '$bannerid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'banner-list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'banner-list.php';
    </script>";
}
?>