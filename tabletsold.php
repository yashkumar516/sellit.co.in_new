<?php include 'hideheader.php' ?>
<?php
$mid = $_REQUEST['mid'];
$bid = $_REQUEST['bid'];
$vid = $_REQUEST['vid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
$selectquery = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
$selectupto = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `tabletsvarient` WHERE `product_name` = '$mid' && `vid` = '$vid' "));
?>
<div class="container-fluid" id="sold">
    <div class="row">
        <div class="col-12 col-lg-7 mx-auto py-5" id="soldpage">
         <h3>Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span>Tablet </h3>
    </div>
</div> 
    <br><br>
    <div class="row pb-5">
        <div class="col-12 col-lg-7 mx-auto">
            <div class="row h-10">
                <div class="col-4 col-lg-4 "><img src="admin/img/<?php echo $selectmodel['product_image'] ?>" width="90%" class="img-fluid" alt=""></div>
                <div class="col-8 col-lg-6 my-auto offset-lg-1">
                    <h1><?php echo $selectmodel['product_name'] ?></h1>
                    <!-- <p>215+ Devices sold with us</p> -->
                    <h1 class="sp1 my-3">Get Upto</h1>
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
                        <a href="tablet-query.php?mid=<?php echo $mid ?>&&bid=<?php echo $bid ?>&&vid=<?php echo $vid ?>">
                            <button class="btn contin-btn">Get Exact Value <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer1.php' ?>