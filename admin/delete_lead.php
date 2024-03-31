<?php include 'includes/confile.php' ?>
<?php
$enqid = $_REQUEST['id'];
$status = $_REQUEST['status'];
$delete = mysqli_query($con,"DELETE FROM `enquiry` WHERE `id` = '$enqid'");
$deletAddress= mysqli_query($con,"DELETE FROM `address` WHERE `enquid` = '$enqid'"); 
// avaibaleleads
$reDirectPage =$status ==="Available"?"avaibaleleads.php":"totalleads.php";
// echo $reDirectPage;
if($delete)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href ='". $reDirectPage."';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = '".$reDirectPage."';
    </script>";
}
?>