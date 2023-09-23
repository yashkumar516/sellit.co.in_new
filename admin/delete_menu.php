

<?php include 'includes/confile.php' ?>
<?php
$menuid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `menu_mgt` WHERE `id` = '$menuid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'menu_list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'menu_list.php';
    </script>";
}
?>