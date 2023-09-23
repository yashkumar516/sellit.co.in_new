<?php include 'includes/confile.php' ?>
<?php
$id = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `video` WHERE `id` = '$id'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'video-list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'video-list.php';
    </script>";
}
?>