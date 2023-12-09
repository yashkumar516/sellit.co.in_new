<?php include 'hideheader.php' ?>
<?php
$id = $_REQUEST['id'];
$bid = $_REQUEST['bid'];
?>

<?php
$selectBrand = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
?>
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="sell-header">Sell Old <span class="sell-title-head">
                        <?php echo $selectBrand['subcategory_name'] ?> </span> Tablet</h1>
            </div>
        </div>
    </div>
</section>


<section class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center" id="varimg">
                <?php
                $selectBrand = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id`='$id' "));
                ?>
                <img src="admin/img/<?php echo $selectBrand['product_image'] ?>" class="img-fluid" width="50%" alt="">
            </div>
            <div class="col-lg-7 col-12 variant mx-auto">
                <h1 class="sum-heading "><?php echo $selectBrand['product_name'] ?></h1>
                <p class="ques">Choose a variant</p>
                <div class="card">
                    <div class="row pt-3">
                        <?php
                        $selectVariant = mysqli_query($con, "SELECT * FROM `tabletsvarient` WHERE `product_name`='$id' AND `status`='active' ");
                        while ($variantData = mysqli_fetch_assoc($selectVariant)) {
                        ?>

                        <!-- <div class="col-lg-3 col-md-3 col-sm-4 col-4 variant-col ">
                                <input id="toggle1" class="varient" name="varient" type="radio" value=" " required>
                                <label for="toggle1"> </label>
                            </div> -->

                        <div class="col-lg-4 col-md-3 col-sm-4 col-6 my-1 variant-col ">
                            <label>
                                <input id="toggle1" class="varient" name="varient" type="radio"
                                    value="<?php echo $variantData['vid'] ?>">
                                <span><?php echo $variantData['varient'] ?></span>
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
</section>

<?php include 'footer1.php' ?>

<script>
$(document).ready(function() {
    $('.varient').click(function() {
        var varient = $("input[type=radio][name=varient]:checked").val();
        var mid = $("#mid").val();
        var bid = $("#bid").val();
        window.location.href = "tabletsold.php?vid=" + varient + "&&bid=" + bid + "&&mid=" + mid;
    });
});
</script>