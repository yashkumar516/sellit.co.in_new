<?php include 'includes/confile.php' ?>
<?php
$indeid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `indegre_list` WHERE `id` = '$indeid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'indegrediants_list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'indegrediants_list.php';
    </script>";
}
?>