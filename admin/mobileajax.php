<?php include 'includes/confile.php' ?>

<?php 
 $id = $_POST['mid'];
 $select  = mysqli_query($con,"SELECT * FROM `product` WHERE `subcategoryid` = '$id' AND `status` = 'active' ");
 ?>
  <option value="">choose model</option>
 <?php
 while($ar = mysqli_fetch_assoc($select))
 {
     $subname = $ar['product_name'];
    $subid= $ar["id"];
    echo "<option value='$subid'>$subname</option>";
 }
?>