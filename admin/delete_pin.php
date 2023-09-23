

<?php include 'includes/confile.php' ?>
<?php
$pinid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `pincode` WHERE `id` = '$pinid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'pin-list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'pin-list.php';
    </script>";
}
?>