<?php 
include 'includes/confile.php';
if(isset($_POST['pinno'])){
    $pincode = $_POST['pinno'];
    $selectvendors = mysqli_query($con,"SELECT * FROM `vendors` WHERE `pincode` = '$pincode' AND `status` = 'active' ");
    $count = mysqli_num_rows($selectvendors); 
    if($count >= 1){
    ?>
    <option value="">select your vender</option>
    <?php    
    while($arvendors = mysqli_fetch_assoc($selectvendors)){
    ?>
    <option value="<?= $arvendors['id'] ?>"><?= $arvendors['name'] ?></option>;
    <?php
    }
    }else{
    ?>
        <option value="" selected>No vendor at this location</option>;
    <?php
    }
   }
   ?>