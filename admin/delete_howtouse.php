<?php include 'includes/confile.php' ?>
<?php
$id = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `howtouse` WHERE `id` = '$id'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'list-use.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'list-use.php';
    </script>";
}
?>