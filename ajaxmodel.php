<?php include 'admin/includes/confile.php' ?>
<?php
  if(isset($_POST['series'])){
    $id = $_REQUEST['id'];
    // echo "id-".$id;
    $seriesid = $_POST['series'];
    $selectmodel = mysqli_query($con,"SELECT * FROM `product` WHERE `status` = 'active' AND `childcategoryid` = '$seriesid'");
    while($armodel = mysqli_fetch_assoc($selectmodel))
    {
   ?>

<div class="col-lg-2 col-4 mt-4">
    <!-- <a href="../../variant.php?id=<?php echo $armodel['id'] ?>&&bid=<?php echo $armodel['subcategoryid'] ?>"> -->
    <a
        href="../../sell-old-phones/sell-old-<?= strtolower($subcatname['subcategory_name'].'-'.strtolower(str_replace(' ','-',$armodel['product_name']))).'/'.$armodel['id'].'_'.$armodel['subcategoryid'] ?>">
        <div class="text-center" id="md">
            <img style="margin-top: 15px;" src="../../admin/img/<?php echo $armodel['product_image'] ?>" width="100%"
                class="img-fluid" alt="">
    </a>
    <span class="sum-heading1 text-center mt-3"><?php echo $armodel['product_name'] ?></span>
</div>
</a>
</div>
<?php
    }
    
  }

?>