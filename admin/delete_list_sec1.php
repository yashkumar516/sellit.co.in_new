<?php include 'includes/confile.php' ?>
<?php
$listid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `product_detail1` WHERE `id` = '$listid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'list_sec1.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'list_sec1.php';
    </script>";
}
?>