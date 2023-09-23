
<?php include 'admin/includes/confile.php' ?>
<?php
  if(isset($_POST['search'])){
      $search  = $_POST['search'];
      $query = mysqli_query($con,"SELECT * FROM `product` WHERE `product_name` LIKE '%$search%' ");
      $row = mysqli_num_rows($query);
      if($row > 0){
          while($armodal = mysqli_fetch_assoc($query)){
            ?>
              <a href="<?php if($armodal['categoryid'] == '1'){ echo 'variant.php?id='.$armodal['id'].'&&bid='.$armodal['subcategoryid']; }elseif($armodal['categoryid'] == '3'){ echo 'tabletsold.php?id='.$armodal['id'].'&&bid='.$armodal['subcategoryid']; }elseif($armodal['categoryid'] == '2'){ echo 'watchsold.php?id='.$armodal['id'].'&&bid='.$armodal['subcategoryid']; }elseif($armodal['categoryid'] == '4'){ echo 'earpodsold.php?id='.$armodal['id'].'&&bid='.$armodal['subcategoryid']; }  ?>"><li class="py-2"><?php echo $armodal['product_name'] ?></li></a> 
            <?php
          }
      }else{
        echo "<li>No modal found</li>";
      }
  }
?>