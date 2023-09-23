<?php include 'includes/confile.php' ?>
<?php
$ageid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `agegroup` WHERE `id` = '$ageid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'age-group-list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'age-group-list.php';
    </script>";
}
?>