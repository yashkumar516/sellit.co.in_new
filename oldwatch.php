<?php include "hideheader.php"; ?>
<?php $id = $_REQUEST["id"]; ?>

<?php $selectquery = mysqli_fetch_assoc(
    mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$id' ")
); ?>

<section class="sell-section">
    <h1 class="sell-header text-center">Sell Old <span class="sell-title-head">
            <?php echo $selectquery["subcategory_name"]; ?> </span>Watch </h1>
</section>


<!-- galaxy  -->
<?php
$selectseries = mysqli_query(
    $con,
    "SELECT * FROM `childcategory` WHERE `status` = 'active' AND `subcatid` = '$id'"
);
$row = mysqli_num_rows($selectseries);
if ($row >= 1) { ?>
<section class="galaxy">
    <div class="container">
        <div class="col-lg-12 mx-auto">
            <h6 class="select mb-3">Select Watch Series</h6>

            <div class="row">
                <?php while ($arseries = mysqli_fetch_assoc($selectseries)) { ?>
                <div class="col-lg-2 col-6"><button class="box2"
                        onclick="return getmodel(<?php echo $arseries["id"]; ?>)"> <b>
                            <?php echo $arseries["childcategory"]; ?> </b></button></div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>
<?php }
?>

<!-- select product -->
<section class="select-product">
    <div class="container">
        <div class="col-lg-12 mx-auto">
            <h1 class="select pb-3">Select Watch </h1>
            <div class="row" id="ajaxrespon">
                <?php
                $queryModel = mysqli_query(
                    $con,
                    "SELECT * FROM `product` WHERE `status` = 'active' AND `subcategoryid` = '$id'"
                );
                while ($modelData = mysqli_fetch_assoc($queryModel)) { ?>
                <div class="col-lg-2 col-4 mt-2 px-1">
                    <a href="watchsold.php?id=<?php echo $modelData["id"]; ?>&&bid=<?php echo $id; ?>">
                        <div class="text-center" id="md">
                            <img style="margin-top: 15px;" src="admin/img/<?php echo $modelData["product_image"]; ?>"
                                width="100%" class="img-fluid" alt="">
                            <div class="container mn px-1">
                                <div class="row h-100 ">
                                    <div class="col-12 my-auto">
                                        <span
                                            class="sum-heading1 text-center mt-3"><?php echo $modelData["product_name"]; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <?php }
                ?>
            </div>
        </div>

    </div>

</section>
<?php include "footerwatch.php"; ?>

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