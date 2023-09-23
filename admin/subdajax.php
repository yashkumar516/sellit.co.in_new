<?php include 'includes/confile.php' ?>

<?php 
 $id = $_POST['cid'];
 $select  = mysqli_query($con,"SELECT * FROM `subcategory` WHERE `category_id` = '$id' AND `status` = 'active' ");
 ?>
 <option value=''>choose your brand</option>
 <?php
 while($ar = mysqli_fetch_assoc( $select))
 {
     $subname = $ar['subcategory_name'];
    $subid= $ar["id"];
    echo "<option value='$subid'>$subname</option>";
 }
?>