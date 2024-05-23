<?php include '../admin/includes/confile.php' ?>
<?php
  if(isset($_POST['search'])){
      $search  = $_POST['search'];
      $query = mysqli_query($con,"SELECT * FROM `product` WHERE `categoryid` = 1 AND `product_name` LIKE '%$search%'");
      $row = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `product` WHERE `product_name` LIKE '%$search%' "));
      if($row > 0){
          while($armodal = mysqli_fetch_assoc($query)){
            ?>
              <a href="variant.php?id=<?php echo $armodal['id'] ?>&&bid=<?php echo $armodal['subcategoryid'] ?>"><li class="py-2"><?php echo $armodal['product_name'] ?></li></a> 
            <?php
          }
      }else{
        echo "<li>No modal found</li>";
      }
  }
?>