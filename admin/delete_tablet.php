<?php include 'includes/confile.php' ?>
<?php
$productid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `product` WHERE `id` = '$productid'");
 mysqli_query($con,"DELETE FROM `tabletsvarient` WHERE `product_name` = '$productid'");
 mysqli_query($con,"DELETE FROM `tabletquestions` WHERE `product_name` = '$productid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'tabletlist.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'tabletlist.php';
    </script>";
}
?>