<?php include "hideheader.php"; ?>
<?php
$vid = $_REQUEST["vid"];
$bid = $_REQUEST["bid"];
$mid = $_REQUEST["mid"];
include "include/mobileage1.php";
$selectModel = mysqli_fetch_assoc(
    mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' ")
);
?>
<?php
include_once "./classes/checkModelValue.php";
$modelManager = new CheckModelValue($con);
$selectquery = $modelManager->getProductBrandValue($bid, $mid);

// $selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
?>
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="sell-header">Sell Old <span class="sell-title-head">
                        <?php echo $selectquery[
                            "subcategory_name"
                        ]; ?> </span> Mobile</h1>
            </div>

        </div>
    </div>
</section>
<section class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 px-0" id="selllimg">
                <div class="row pt-2 px-2 ">
                    <div class="col-4 text-right"> <img src="admin/img/<?php echo $selectModel[
                        "product_image"
                    ]; ?>" class="img-fluid" width="75%" alt=""></div>
                    <div class="col-6">
                        <h1 class="sum-heading pt-4 "><?php echo $selectModel[
                            "product_name"
                        ]; ?></h1>
                        <p class="qty ">215+ Device Sold with us</p>
                    </div>
                </div>
                <hr>
                <div class="device px-3" id="deviceEvaluation">
                    <h1 class="sum-heading ">Device Evaluation</h1>
                    <p id="devicedetailHtml" class="mt-2 title"><?php echo $devicedetail; ?></p>
                    <p id="callHtml"><?php echo $callin; ?></p>
                    <p id="screenHtml"><?php echo $screenin; ?></p>
                    <p id="bodyHtml"><?php echo $bodyin; ?></p>
                    <p id="warHtml"><?php echo $warin; ?></p>
                    <!-- screen start -->
                    <p id="screenconditionHtml" class="mt-2 title"><?php echo $screencondition; ?></p>
                    <p id="touchHtml"><?php echo $touchin; ?></p>
                    <p id="spotHtml"><?php echo $spotin; ?></p>
                    <p id="linesHtml"><?php echo $linesin; ?></p>
                    <p id="physicalHtml"><?php echo $physicalin; ?></p>
                    <!-- bodystart -->
                    <p id="overallHtml" class="mt-2 title"><?php echo $overallcondition; ?></p>
                    <p id="ScratchesHtml"><?php echo $Scratchesin; ?></p>
                    <p id="dentsHtml"><?php echo $dentsin; ?></p>
                    <p id="sideHtml"><?php echo $sidein; ?></p>
                    <p id="bentHtml"><?php echo $bentin; ?></p>
                    <!-- warrent strt -->
                    <p id="mobageHtml" class="mt-2 title"></p>
                    <p id="ageHtml"></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mobileage">
                <p class="ques">What is your Mobile age?</p>
                <!-- <form action="functional.php?vid=<?php echo $vid; ?>&&bid=<?php echo $bid; ?>&&mid=<?php echo $mid; ?>"
                    method="post">  -->
                <form action="" method="post" name="form" id="myForm">

                    <div class="card">
                        <div class="row mx-auto pt-1">

                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 mobileage-col pt-2">
                                <label for="toggle1" class="px-2">
                                    <input id="toggle1" name="age" class="age" value="under3" type="radio" <?php echo $age === "under3"
                                            ? 'checked="checked"'
                                            : ""; ?> required>
                                    <span>Below 3 Months</span>
                                </label>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 mobileage-col pt-2">
                                <label for="toggle2" class="px-2">
                                    <input id="toggle2" name="age" class="age" value="under6" type="radio" <?php echo $age === "under6"
                                            ? 'checked="checked"'
                                            : ""; ?> required>

                                    <span>3 to 6 Months</span>
                                </label>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 mobileage-col pt-2">
                                <label for="toggle3" class="px-2">
                                    <input id="toggle3" name="age" class="age" value="under11" type="radio" <?php echo $age === "under11"
                                            ? 'checked="checked"'
                                            : ""; ?> required>

                                    <span>6 to 11 Months</span>
                                </label>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 mobileage-col pt-2">
                                <label for="toggle4" class="px-2">
                                    <input id="toggle4" name="age" class="age" value="above11" type="radio" <?php echo $age === "above11"
                                            ? 'checked="checked"'
                                            : ""; ?> required>

                                    <span>Above 11 Months</span>
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <input type="hidden" id="war" name="war">
                        <input type="hidden" id="warin" name="warin">
                        <input type="hidden" name="devicedetail" value="Device Details">

                        <!-- mobileage start -->
                        <input type="hidden" id="mobagein" name="mobage" value="Mobile Age">
                        <input type="hidden" id="age" name="age" value="">
                        <input type="hidden" id="agein" name="agein" value="">
                        <button class="btn contin-btn submit2" type="submit" name="questions">Continue <i
                                class="fas fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include "footer1.php"; ?>

<script>
$(document).ready(function() {
    function handleSubmit(event) {
        event.preventDefault(); // Prevent default form submission

        // Get form element by ID
        var form = document.getElementById("myForm");

        // Create empty object to store form data
        var formData = {};

        // Loop through each form element and add its name and value to the formData object
        for (var i = 0; i < form.elements.length; i++) {
            var element = form.elements[i];
            if (element.type !== "submit") { // Exclude submit button
                formData[element.name] = element.value;
            }
        }

        // var age = $("input[type=radio][name=age]:checked").val();
        formData["page"] = "mobileAgePage";
        // Display the form data
        // console.log(formData);
        $.ajax({
            type: "POST",
            url: "session/set_session_all_question.php", // Replace with the path to your PHP script
            data: formData,
            success: function(response) {
                // Handle success response if needed
                console.log({
                    response
                });
                // window.location.href =
                //     "functional.php?vid=<?php echo $vid; ?>&bid=<?php echo $bid; ?>&mid=<?php echo $mid; ?>";
                window.location.replace(
                    "functional.php?vid=<?php echo $vid; ?>&bid=<?php echo $bid; ?>&mid=<?php echo $mid; ?>"
                );

            },
            error: function(xhr, status, error) {
                // Handle error response if needed
                console.error({
                    error
                });
            }
        });
        // You can now send this formData to a server using AJAX or perform any other operation with it.
    }

    // Attach form submission event listener
    var form = document.getElementById("myForm");
    form.addEventListener("submit", handleSubmit);
})
</script>
<script>
$(document).ready(function() {

    // window.history.go(-1);
    // window.history.replaceState("Set Product ", "",
    //     "product-query.php?vid=<?php echo $vid; ?>&bid=<?php echo $bid; ?>&mid=<?php echo $mid; ?>")

    function ageCondition() {

        var age = $("input[type=radio][name=age]:checked").val();

        if (age == "under3") {
            $('#mobageHtml').html("Mobile Age");
            $('#ageHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months"
            );
            $('#agein').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months"
            );
            $('#age').val('under3');
            $('#warHtml').html('<?php echo $warin; ?>');
            $('#warin').val('<?php echo $warin; ?>');
            $('#war').val('<?php echo $war; ?>');
        } else if (age == "under6") {
            $('#mobageHtml').html("Mobile Age");
            $('#ageHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months"
            );
            $('#agein').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months"
            );
            $('#age').val('under6');
            $('#warHtml').html('<?php echo $warin; ?>');
            $('#warin').val('<?php echo $warin; ?>');
            $('#war').val('<?php echo $war; ?>');
        } else if (age == "under11") {
            $('#mobageHtml').html("Mobile Age");
            $('#ageHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months"
            );
            $('#agein').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months"
            );
            $('#age').val('under11');
            $('#warHtml').html('<?php echo $warin; ?>');
            $('#warin').val('<?php echo $warin; ?>');
            $('#war').val('<?php echo $war; ?>');
        } else if (age == "above11") {
            $('#mobageHtml').html("Mobile Age");
            $('#warHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
            $('#warin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
            $('#war').val('no');
            $('#ageHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months"
            );
            $('#agein').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months"
            );
            $('#age').val('above11');
        }
    }
    $(".age").click(function() {
        ageCondition()
    });

    $('.age').ready(function() {
        ageCondition()
    })
});
</script>
<script>
$(document).ready(function() {
    $('.war').click(function() {
        var warrenty = $('#warHtml').html();
        $("#warin").val(warrenty);
    })
    $('.war').ready(function() {
        var warrenty = $('#warHtml').html();
        $("#warin").val(warrenty);
    })
});
</script>