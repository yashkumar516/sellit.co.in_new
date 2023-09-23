<?php include 'includes/confile.php' ?>
<?php
$id = $_REQUEST['id'];
$deletesubcat = mysqli_query($con,"DELETE FROM `subcategory` WHERE `id` = '$id'");
$deletechildcat= mysqli_query($con,"DELETE FROM `childcategory` WHERE `subcatid` = '$id'");
$deleteproduct= mysqli_query($con,"DELETE FROM `product` WHERE `subcategoryid` = '$id'");
$deletevarient= mysqli_query($con,"DELETE FROM `varient` WHERE `subcategoryid` = '$id'");
if($deletesubcat)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'subcategory-list.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'subcategory-list.php';
    </script>";
}
?>