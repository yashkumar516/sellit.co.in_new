<?php include 'includes/confile.php' ?>
<?php
$productid = $_REQUEST['id']; 
$varientId = $_REQUEST['vid']; 
$deletevarient= mysqli_query($con,"DELETE FROM `varient` WHERE `id` = '$varientId'");
$query = "SELECT COUNT(*) AS `id`  FROM `varient` WHERE `product_name`='$productid'";

$result = $con->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $rowCount = $row['id']; 
    echo "rowCount--".$rowCount;
    if(!($rowCount > 0) ){
      $delete = mysqli_query($con,"DELETE FROM `product` WHERE `id` = '$productid'");
      $deletequestion= mysqli_query($con,"DELETE FROM `questions` WHERE `product_name` = '$productid'");
    }
}
if($deletevarient)
{
  echo "<script>
    alert ('delete successfully');
    window.location.href = 'ecommerce-products-form.php';
    </script>";
}
else
{
  echo "<script>
    alert ('delete unsuccessfully');
    window.location.href = 'ecommerce-products-form.php';
    </script>";
}
?>