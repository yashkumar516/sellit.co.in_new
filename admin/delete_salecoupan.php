<?php include 'includes/confile.php' ?>
<?php
$bunid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `salecoupan` WHERE `id` = '$bunid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'uploadcoupanbanner-list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'uploadcoupanbanner-list.php';
    </script>";
}
?>