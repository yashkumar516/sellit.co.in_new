<?php include 'includes/confile.php' ?>

<?php 
 $id = $_POST['sid'];
 $select  = mysqli_query($con,"SELECT * FROM `childcategory` WHERE `subcatid` = '$id' AND `status` = 'active' ");
 ?>
  <option value="">choose Series</option>
 <?php
 while($ar = mysqli_fetch_assoc( $select))
 {
     $subname = $ar['childcategory'];
    $subid= $ar["id"];
    echo "<option value='$subid'>$subname</option>";
 }
?>