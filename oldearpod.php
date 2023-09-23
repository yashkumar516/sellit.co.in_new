<?php include 'hideheader.php' ?>
<?php
$id = $_REQUEST['id'];
?>
<?php
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$id' "));
?>
<section class="sell-section">
    <h1 class="sell-header text-center">Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span>Earbuds</h1>
</section>
<!-- select product -->
<section class="select-product">
    <div class="container">
        <div class="col-lg-12 mx-auto">
            <h1 class="select pb-3">Select Earbuds</h1>
            <div class="row" id="ajaxrespon">
                <?php
                $selectmodel = mysqli_query($con, "SELECT * FROM `product` WHERE `status` = 'active' AND `subcategoryid` = '$id'");
                while ($armodel = mysqli_fetch_assoc($selectmodel)) {
                ?>
                    <div class="col-lg-2 col-4 mt-2 px-1">
                        <a href="earpodsold.php?id=<?php echo $armodel['id'] ?>&&bid=<?php echo $id ?>">
                            <div class="text-center" id="md">
                                <img style="margin-top: 15px;" src="admin/img/<?php echo $armodel['product_image'] ?>" width="100%" class="img-fluid" alt="">
                                 <div class="container mn px-1">
                                <div class="row h-100 "> 
                                <div class="col-12 my-auto">
                                <span class="sum-heading1 text-center mt-3"><?php echo $armodel['product_name'] ?></span>
                                  </div>
                                </div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php include 'footerear.php' ?>
<script>
    function getmodel(gid) {
        var sid = gid;
        if (sid != null) {
            $.ajax({
                method: "post",
                url: "ajaxwatch.php",
                data: {
                    series: sid
                },
                dataType: "html",
                success: function(result) {
                    $("#ajaxrespon").html('');
                    $("#ajaxrespon").html(result);
                }
            });
        }
    }
</script>