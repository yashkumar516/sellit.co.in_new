<?php include 'includes/confile.php' ?>

<?php 
 $id = $_POST['sid'];
 $select  = mysqli_query($con,"SELECT * FROM `product` WHERE `childcategoryid` = '$id' AND `status` = 'active' ");
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