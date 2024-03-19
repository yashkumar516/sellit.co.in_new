<?php include 'header.php' ?>
<?php
$id = $_REQUEST['id'];
$bid = $_REQUEST['bid'];
?>
<?php
$selectquery = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
?>
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="sell-header">Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span> Mobile</h1>
            </div>
        </div>
    </div>
</section>

<section class="product-detail px-2">
    <div class="container card varientbox py-2">
        <div class="row">
            <div class="col-lg-4 col-3 text-center" id="varimg">
                <?php
                $selectquery = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id`='$id' "));
                ?>
                <img src="../admin/img/<?php echo $selectquery['product_image'] ?>" class="img-fluid"  alt="">
            </div>
            <div class="col-lg-7 col-9 variant mx-auto my-auto">
                <h1 class="sum-heading "><?php echo $selectquery['product_name'] ?></h1>
            </div>
            <div class="col-12" >
                <p class="ques text-left">Choose a variant</p>
                <div class="card border-0">
                    <div class="row">
                        <?php
                        $selectvarient = mysqli_query($con, "SELECT * FROM `varient` WHERE `product_name`='$id' AND `status`='active' ");
                        while ($arvariant = mysqli_fetch_assoc($selectvarient)) {
                        ?>

                            <!-- <div class="col-lg-3 col-md-3 col-sm-4 col-4 variant-col ">
                                <input id="toggle1" class="varient" name="varient" type="radio" value=" " required>
                                <label for="toggle1"> </label>
                            </div> -->

                            <div class="col-lg-4 col-md-3 col-sm-4 col-4 variant-col my-auto">
                                <label>
                                    <input id="toggle1" class="varient" name="varient" type="radio" value="<?php echo $arvariant['id'] ?>">
                                    <span><?php echo $arvariant['varient'] ?></span>
                                </label>
                            </div>
                        <?php
                        }
                        ?>
                        <input type="hidden" id="bid" value="<?php echo $bid ?>">
                        <input type="hidden" id="mid" value="<?php echo $id  ?>">
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
</section>

<?php include 'footer1.php' ?>

<script>
    $(document).ready(function() {
        $('.varient').click(function() {
            var varient = $("input[type=radio][name=varient]:checked").val();
            var mid = $("#mid").val();
            var bid = $("#bid").val();
            window.location.href = "sold.php?vid=" + varient + "&&bid=" + bid + "&&mid=" + mid;
        });
    });
</script>