<?php include 'hideheader.php' ?>
<?php
$vid = $_REQUEST['vid'];
$mid = $_REQUEST['mid'];
$bid = $_REQUEST['bid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
$selectvarient = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `varient` WHERE `id` = '$vid' AND `product_name`='$mid' "));
?>

<?php
$selectquery = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
?>

<div class="container-fluid" id="sold">
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto py-5" id="soldpage">
            <h3>Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span> Mobile</h3>
        </div>
    </div>
    
    <br><br><br><br>
    <div class="row pb-5">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="row h-10">
                <div class="col-4 col-lg-4 "><img src="admin/img/<?php echo $selectmodel['product_image'] ?>" width="90%" class="img-fluid" alt=""></div>
                <div class="col-8 col-lg-6 my-auto offset-lg-1">
                    <h1><?php echo $selectmodel['product_name'] ?></h1>
                    <h1><?php echo $selectvarient['varient'] ?></h1>
                    <!-- <p>215+ Devices sold with us</p> -->
                    <h1 class="sp1 my-3">Get Upto</h1>
                    <h1 class="sp">Rs. <?php echo $selectvarient['uptovalue'] ?>/-</h1>
                    <div class="mt-4">
                        <a href="product-query.php?upto=<?php echo $selectvarient['id'] ?>&&mid=<?php echo $mid ?>&&bid=<?php echo $bid ?>">
                            <button class="btn contin-btn">Get Exact Value <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer1.php' ?>