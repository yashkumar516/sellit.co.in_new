<?php include 'header.php' ?>
<?php
$mid = $_REQUEST['id'];
$bid = $_REQUEST['bid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
$selectquery = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
$selectupto = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `watchquestions` WHERE `product_name` = '$mid' "));
?>
<div class="container-fluid" id="sold">
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto py-5" id="soldpage">
         <h3>Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span>Watch</h3>
    </div>
</div> 
    <div class="row pb-5">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="row h-10">
                <div class="col-4 col-lg-4 "><img src="../../admin/img/<?php echo $selectmodel['product_image'] ?>" width="90%" class="img-fluid" alt=""></div>
                <div class="col-8 col-lg-6 my-auto offset-lg-1">
                    <h1><?php echo $selectmodel['product_name'] ?></h1>
                    <!-- <p>215+ Devices sold with us</p> -->
                    <h1 class="sp my-3">Get Upto</h1>
                    <?php
                     if($selectupto['uptovalue'] != null){
                    ?>
                    <h1 class="sp">Rs. <?php echo $selectupto['uptovalue'] ?>/-</h1>
                    <?php
                     }else{
                         ?>
                        <span class="class-danger" >price not defined</span>
                         <?php
                     }
                     ?>
                    <div class="mt-4">
                        <a href="watch-query.php?mid=<?php echo $mid ?>&&bid=<?php echo $bid ?>">
                            <button class="btn contin-btn">Get Exact Value <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="container py-5">
        <div class="row">
            <div class="col-4 border-right text-center"><img src="assets/images/safe.png" class="img-fluid" alt=""><h1 class="featsellit"> Safe &amp; Secure </h1></div>
            <div class="col-4 border-right text-center"><img src="assets/images/instant.png" class="img-fluid" alt=""><h1 class="featsellit"> Instant Payment </h1></div>
            <div class="col-4 text-center"><img src="assets/images/bestprice.png" class="img-fluid" alt=""><h1 class="featsellit"> Best Price </h1></div>
        </div>
    </div>
    <div class="container mt-3">
        <h1 class="top-sell-heading text-left mb-5"><u> Customer Review</u></h1>
        <?php 
         $rev = mysqli_query($con,"SELECT * FROM `product_reviews` WHERE `status` = 'active' ");
         while($ar = mysqli_fetch_assoc($rev)){
        ?>
      <div class="row">
          <div class="col-3"><img src="assets/images/face.png" alt="" class="img-fluid" width="59px"></div>
          <div class="col-9"><h6 class="reviwer-name"><?php echo $ar['rname'] ?></h6><h1 class="reviewer-heading"><?php echo $ar['rcity'] ?></h1></div>
          <div class="col-12"><p class="why-sell-detail text-justify">
          <?php echo $ar['rmsg'] ?></p>
          </div>
      </div>
      <hr>
      <?php } ?>
    </div>
<?php include 'footer1.php' ?>