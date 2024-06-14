<?php include 'admin/includes/confile.php' ?>
<?php
  if(isset($_POST['series'])){
    $seriesid = $_POST['series'];
    $selectModel = mysqli_query($con,"SELECT * FROM `product` WHERE `status` = 'active' AND `childcategoryid` = '$seriesid'");
    while($modelData = mysqli_fetch_assoc($selectModel))
    {
   ?>

<div class="col-lg-2 col-4 mt-4">
    <a href="tabletvarient.php?id=<?php echo $modelData['id'] ?>&&bid=<?php echo $modelData['subcategoryid'] ?>">
        <div class="text-center" id="md">
            <img style="margin-top: 15px;" src="admin/img/<?php echo $modelData['product_image'] ?>" width="100%"
                class="img-fluid" alt="">
    </a>
    <span class="sum-heading1 text-center mt-3"><?php echo $modelData['product_name'] ?></span>
</div>
</a>
</div>
<?php
    }
    
  }

?>