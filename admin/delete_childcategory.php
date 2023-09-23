<?php include 'includes/confile.php' ?>
<?php
$id = $_REQUEST['id'];
$bid = $_REQUEST['bid'];
$delete = mysqli_query($con,"DELETE FROM `childcategory` WHERE `id` = '$id'");
if($delete)
{
   $deleteproduct = mysqli_query($con,"DELETE FROM `product` WHERE `childcategoryid` = '$id'");
   $deletevarien= mysqli_query($con,"DELETE FROM `tabletquestions` WHERE `childcategoryid` = '$id'");
   $deletevari= mysqli_query($con,"DELETE FROM `questions` WHERE `childcategoryid` = '$id'");
   if($deleteproduct){
    $deletevarient= mysqli_query($con,"DELETE FROM `watchquestions` WHERE `childcategoryid` = '$id'");
    if($deletevarient){
      echo "<script>
      alert ('delete successfully');
      window.location.href = 'series-list.php?id=$bid';
      </script>";
    }
   }
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'series-list.php?id=$bid';
    </script>";
}
?>

