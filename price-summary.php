
<?php include 'hideheader.php' ?>
<?php
if(isset($_REQUEST['enid'])){
    $enqid = $_REQUEST['enid'];
    $seleenq = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `enquiry` WHERE `id` = ' $enqid' "));
    $offerprice = $seleenq['offerprice'];
    $catid = $seleenq['catid'];
    $mid = $seleenq['modelid'];
    $modelenq = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$mid'"));
    $categoryenq = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `category` WHERE `id` = '$catid'"));
}
?>
<!--<section class="sell-section">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 mx-auto">-->
<!--                <h1 class="sell-header">Sell Old <php echo $modelenq['product_name'] ?>  <php echo $categoryenq['category_name'] ?>  Model</h1>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section class="product-detail mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-5 col-5 ">
              <img src="admin/img/<?php echo $seleenq['mimg'] ?>" class="img-fluid" width="80%" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-7 col-7 variant">
              <h1 class="sum-heading text-left"><?php echo $seleenq['model_name'] ?></h1>
              <p class="ques text-left">Our Offer Price </p>
              <?php
               if($offerprice >= 1){
              ?>
              <h1 class="sp text-left">Rs. <?php echo $offerprice ?>/-</h1>
              <?php
              }else{
              ?>
            <h1 class="sum-heading text-danger text-left">we'r sorry</h1>
              <?php
               }
              ?>
              <p class="ques text-left">(The value is based on the condition of the product mentioned by you)</p>
            </div>
            <?php
              if($offerprice >= 1){
            ?>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12 price-summary">
                <div class="card">
                    <h1>Price Summary</h1>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1">
                            <p class="charges">Base Price</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1 d-flex justify-content-end">
                            <p class="rate"> <strong> ₹<?php echo round($seleenq['offerprice']) ?></strong></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1">
                            <p class="charges">Pickup Charges</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1 d-flex justify-content-end">
                            <p class="rate">Free <strike> ₹100 </strike></p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1">
                            <p class="charges">Total Amount</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1 d-flex justify-content-end">
                            <p class="rate"><strong>₹<?php echo round($seleenq['offerprice']) ?></strong></p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="uploadimage.php?enid=<?php echo  $enqid ?>&&uid=<?php echo $seleenq['userid'] ?>"><button class="btn contin-btn">Get Paid <i class="fas fa-arrow-right"></i></button></a>
                    </div>
                </div>
            </div>
             <?php
               }else{
             ?>
               <div class="col-lg-5 col-md-5 col-sm-12 col-12 d-none price-summary">
                <div class="card">
                    <h1>Price Summary</h1>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1">
                            <p class="charges">Base Price</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1 d-flex justify-content-end">
                            <p class="rate">₹<?php echo round($seleenq['offerprice']) ?></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1">
                            <p class="charges">Pickup Charges</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1 d-flex justify-content-end">
                            <p class="rate">Free <strike> ₹100 </strike></p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1">
                            <p class="charges">Total Amount</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1 d-flex justify-content-end">
                            <p class="rate">₹<?php echo round($seleenq['offerprice']) ?></p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="uploadimage.php?enid=<?php echo  $enqid ?>&&uid=<?php echo $seleenq['userid'] ?>"><button class="btn contin-btn">Get Paid <i class="fas fa-arrow-right"></i></button></a>
                    </div>
                </div>
            </div>
             <?php
              }
              ?>
        </div>
    </div>
</section>

<?php include 'footer1.php' ?>