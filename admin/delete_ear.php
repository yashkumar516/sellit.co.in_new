<?php include 'includes/confile.php' ?>
<?php
$productid = $_REQUEST['id'];
$delete = mysqli_query($con,"DELETE FROM `product` WHERE `id` = '$productid'");
$deletequestion= mysqli_query($con,"DELETE FROM `watchquestions` WHERE `product_name` = '$productid'");
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'earlist.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'earlist.php';
    </script>";
}
?>