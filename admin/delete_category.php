<?php include 'includes/confile.php' ?>
<?php
$category = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `category` WHERE `id` = '$category'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'ecommerce-category-list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'ecommerce-category-list.php';
    </script>";
}
?>