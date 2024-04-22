<?php include 'hideheader.php' ?>
<?php
include 'include/productnew2.php';
$vid = $_REQUEST['vid'];
$bid = $_REQUEST['bid'];
$mid = $_REQUEST['mid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$mid' "));
?>

<?php
include_once "./classes/checkModelValue.php";
$modelManager = new CheckModelValue($con);
$selectBrand = $modelManager->getProductBrandValue($bid, $mid);
            
// $selectBrand =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
?>
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="sell-header">Sell Old <span class="sell-title-head">
                        <?php echo $selectBrand['subcategory_name'] ?> </span> Mobile</h1>
            </div>
        </div>
    </div>

</section>

<section class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 px-0" id="selllimg">
                <div class="row pt-2 px-2 ">
                    <div class="col-4 text-right"> <img src="admin/img/<?php echo $selectmodel['product_image'] ?>"
                            class="img-fluid" width="50%" alt=""></div>
                    <div class="col-6">
                        <h1 class="sum-heading pt-4 "><?php echo $selectmodel['product_name'] ?></h1>
                        <p class="qty ">215+ Device Sold with us</p>
                    </div>
                </div>
                <hr>
                <div class="device px-3" id="deviceEvaluation">
                    <h1 class="sum-heading ">Device Evaluation</h1>
                    <p id="devicedetail" class="mt-2 title"><?php echo  $devicedetail ?></p>
                    <p id="call"><?php echo $callin ?></p>
                    <p id="screen"><?php echo $screenin ?></p>
                    <p id="body"><?php echo $bodyin ?></p>
                    <p id="warHtml"><?php echo $warin ?></p>
                    <p id="screencondition" class="mt-2 title"></p>
                    <p id="touchHtml"></p>
                    <p id="spotHtml"></p>
                    <p id="linesHtml"></p>
                    <p id="physicalHtml"></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 product-new">
                <div class="modscren">
                    <!-- <form action="defect.php?vid=<?php echo $vid ?>&&bid=<?php echo $bid ?>&&mid=<?php echo $mid ?>"
                        method="post">  -->
                    <form action="" method="post" name="form" id="myForm">
                        <h1 class="pro-det text-left">Tell us a few things about your device!</h1>
                        <p class="ques text-left">Is your device's touch screen working properly?</p>
                        <div class="row mb-3" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggle-on" class="touch" name="touch" type="radio"
                                    value="yes" <?php echo $touch === "yes" ? 'checked="checked"' : ''; ?>><label
                                    for="toggle-on" required>Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggle-off" class="touch" name="touch" type="radio"
                                    value="no" <?php echo $touch === "no" ? 'checked="checked"' : ''; ?>><label
                                    for="toggle-off" required>No</label></div>
                        </div>
                        <hr>

                        <div class="card" style="box-shadow: 0 0px 0px 0 rgb(0 0 0 / 20%);border:0px;padding:0px;">
                            <p class="ques text-left">Dead Pixels/Spots on Screen</p>
                            <div class="row radio-select pt-3">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle1" class="spot" name="spot" type="radio" value="largespot"
                                        <?php echo $spot === "largespot" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle1">
                                        <img src="assets/images/Large heavy visible spots on screen.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">Large visible spots on screen</p>
                                        </div>

                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle2" class="spot" name="spot" type="radio" value="multiplespot"
                                        <?php echo $spot === "multiplespot" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle2">
                                        <img src="assets/images/3 or more minor spots on screen.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">Multiple visible spots on screen</p>
                                        </div>

                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle3" class="spot" name="spot" type="radio" value="minorspot"
                                        <?php echo $spot === "minorspot" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle3">
                                        <img src="assets/images/1-2 minor spots on screen.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">Minor small spots on screen</p>
                                        </div>

                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle4" class="spot" name="spot" type="radio" value="nospot"
                                        <?php echo $spot === "nospot" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle4">
                                        <img src="assets/images/No line(s) on Display.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">No spots on screen</p>
                                        </div>

                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="box-shadow: 0 0px 0px 0 rgb(0 0 0 / 20%);border:0px;padding:0px;">
                            <p class="ques text-left">Visible Lines on Screen</p>
                            <div class="row radio-select pt-3">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle5" class="lines" name="lines" type="radio" value="displayfaded"
                                        <?php echo $lines === "displayfaded" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle5">
                                        <img src="assets/images/Display faded along edges.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">Display faded along corners</p>
                                        </div>

                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle6" class="lines" name="lines" type="radio" value="multiplelines"
                                        <?php echo $lines === "multiplelines" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle6">
                                        <img src="assets/images/Visible line(s) on display.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">Multiple lines on Display</p>
                                        </div>

                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle7" class="lines" name="lines" type="radio" value="noline"
                                        <?php echo $lines === "noline" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle7">
                                        <img src="assets/images/No line(s) on Display.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">No line(s) on Display</p>
                                        </div>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="box-shadow: 0 0px 0px 0 rgb(0 0 0 / 20%);border:0px;padding:0px;">
                            <p class="ques text-left">Screen Physical Condition</p>
                            <div class="row radio-select pt-3">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle8" class="physical" name="physical" type="radio" value="cracked"
                                        <?php echo $physical === "cracked" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle8">
                                        <img src="assets/images/Screen cracked glass broken.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">Screen cracked/ glass broken</p>
                                        </div>

                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle9" class="physical" name="physical" type="radio" value="damaged"
                                        <?php echo $physical === "damaged" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle9">
                                        <img src="assets/images/Screen cracked glass broken.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">Damaged/ Torn screen on edges</p>
                                        </div>

                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle10" class="physical" name="physical" type="radio"
                                        value="heavyscratches"
                                        <?php echo $physical === "heavyscratches" ? 'checked="checked"' : ''; ?>
                                        required>
                                    <label for="toggle10">
                                        <img src="assets/images/More than 2 scratches on screen.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">Heavy scratches on screen</p>
                                        </div>

                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle11" class="physical" name="physical" type="radio"
                                        value="1-2scratches"
                                        <?php echo $physical === "1-2scratches" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle11">
                                        <img src="assets/images/1-2 scratches on screen.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">1-2 scratches on screen</p>
                                        </div>

                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <input id="toggle12" class="physical" name="physical" type="radio"
                                        value="noscratches"
                                        <?php echo $physical === "noscratches" ? 'checked="checked"' : ''; ?> required>
                                    <label for="toggle12">
                                        <img src="assets/images/No line(s) on Display.jpg" id="sc"
                                            class="img-fluid pt-2" alt="">
                                        <div class="newproduct">
                                            <p class="text-center">No scratches on screen</p>
                                        </div>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <input type="hidden" id="war" name="war">
                            <input type="hidden" id="warin" name="warin">
                            <input type="hidden" name="devicedetail" value="Device Details">
                            <input type="hidden" id="touchin" name="touchin" value="">
                            <input type="hidden" id="touch" name="touch" value="">
                            <input type="hidden" id="spot" name="spot" value="">
                            <input type="hidden" id="spotin" name="spotin" value="">
                            <input type="hidden" id="lines" name="lines" value="">
                            <input type="hidden" id="linesin" name="linesin" value="">
                            <input type="hidden" id="physical" name="physical" value="">
                            <input type="hidden" id="physicalin" name="physicalin" value="">
                            <input type="hidden" id="screencondition" name="screencondition" value="Screen Condition">
                            <button class="btn contin-btn" name="screen">Continue <i
                                    class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer1.php' ?>

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
        formData["page"] = "productNewPage";
        $.ajax({
            type: "POST",
            url: "session/set_session_all_question.php", // Replace with the path to your PHP script
            data: formData,
            success: function(response) {
                // Handle success response if needed
                console.log({
                    response
                });
                window.location.replace(
                    "mobileage.php?vid=<?php echo $vid ?>&bid=<?php echo $bid ?>&mid=<?php echo $mid ?>"
                );
                // window.location.href =
                //     "mobileage.php?vid=<?php echo $vid ?>&bid=<?php echo $bid ?>&mid=<?php echo $mid ?>";

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
    const iconString =
        '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>';
    // touhscreen start
    function touchCondition() {
        var touch = $("input[type=radio][name=touch]:checked").val();
        if (touch == "yes") {
            $('#screencondition').html("Screen Condition");
            $('#touchHtml').html(
                `${iconString} Touch Working`
            );
            $('#warHtml').html('<?php echo $warin ?>');
            $('#warin').val('<?php echo $warin ?>');
            $('#war').val('<?php echo $war ?>');
            $('#touchin').val(
                `${iconString} Touch Working`
            );
            $('#touch').val("yes");
            $('.physical, .lines, .spot').attr("required", "true");
            $('.card').show();
        } else if (touch == "no") {
            $('#screencondition').html("Screen Condition");
            $('#touchHtml').html(
                `${iconString} Touch Faulty`
            );
            $('#warHtml').html(
                `${iconString} Mobile Out of Warranty`
            );
            $('#warin').val(
                `${iconString} Mobile Out of Warranty`
            );
            $('#war').val("no");
            $('#touchin').val(
                `${iconString} Touch Faulty`
            );
            $('#touch').val("no");
            $('#spot,#lines,#physical').html("");
            $('#spotin,#linesin,#physicalin').val("");
            $('.card').hide();
            $('.physical, .lines, .spot').removeAttr("required");

        }
    }
    // spot start
    function spotCondition() {
        var spot = $("input[type=radio][name=spot]:checked").val();
        if (spot == "largespot") {

            $('#spotHtml').html(
                `${iconString} Large/ heavy visible spots on screen`
            );

            $('#warHtml').html(
                `${iconString} Mobile Out of Warranty`
            );
            $('#warin').val(
                `${iconString} Mobile Out of Warranty`
            );
            $('#war').val("no");
            $('#spotin').val(
                `${iconString} Large/ heavy visible spots on screen`
            );
            $('#spot').val("largespot");
        } else if (spot == "multiplespot") {
            $('#spotHtml').html(
                `${iconString} Multiple visible spots on screen`
            );
            $('#warHtml').html(
                `${iconString} Mobile Out of Warranty`
            );
            $('#warin').val(
                `${iconString} Mobile Out of Warranty`
            );
            $('#war').val("no");
            $('#spotin').val(
                `${iconString} Multiple visible spots on screen`
            );
            $('#spot').val("multiplespot");
        } else if (spot == "minorspot") {
            $('#spotHtml').html(
                `${iconString} Minor discoloration or small spots on screen`
            );

            $('#warHtml').html(
                `${iconString} Mobile Out of Warranty`
            );
            $('#warin').val(
                `${iconString} Mobile Out of Warranty`
            );
            $('#war').val("no");
            $('#spotin').val(
                `${iconString} Minor discoloration or small spots on screen`
            );
            $('#spot').val("minorspot");
        } else if (spot == "nospot") {
            $('#spotHtml').html(
                `${iconString} No spots on screen`
            );
            $('#spotin').val(
                `${iconString} No spots on screen`
            );
            $('#spot').val("nospot");
        }
    }

    // lines start
    function linesCondition() {
        var lines = $("input[type=radio][name=lines]:checked").val();
        if (lines == "displayfaded") {

            $('#linesHtml').html(
                `${iconString} Display faded along corners`
            );
            $('#warHtml').html(
                `${iconString} Mobile Out of Warranty`
            );
            $('#warin').val(
                `${iconString} Mobile Out of Warranty`
            );
            $('#war').val("no");
            $('#linesin').val(
                `${iconString} Display faded along corners`
            );
            $('#lines').val("displayfaded");
        } else if (lines == "multiplelines") {
            $('#linesHtml').html(
                `${iconString} Multiple lines on Display`
            );
            $('#warHtml').html(
                `${iconString} Mobile Out of Warranty`
            );
            $('#warin').val(
                `${iconString} Mobile Out of Warranty`
            );
            $('#war').val("no");
            $('#linesin').val(
                `${iconString} Multiple lines on Display`
            );
            $('#lines').val("multiplelines");
        } else if (lines == "noline") {
            $('#linesHtml').html(
                `${iconString} No line(s) on Display`
            );
            $('#linesin').val(
                `${iconString} No line(s) on Display`
            );
            $('#lines').val("noline");
        }
    }

    // physical start
    function physicalCondition() {
        var physical = $("input[type=radio][name=physical]:checked").val();
        if (physical == "cracked") {
            $('#physicalHtml').html(
                `${iconString} Screen cracked/ glass broken`
            );
            $('#warHtml').html(
                `${iconString} Mobile Out of Warranty`
            );
            $('#warin').val(
                `${iconString} Mobile Out of Warranty`
            );
            $('#war').val("no");
            $('#physicalin').val(
                `${iconString} Screen cracked/ glass broken`
            );
            $('#physical').val("cracked");
        } else if (physical == "damaged") {
            $('#physicalHtml').html(
                `${iconString} Damaged/ Torn screen on edges`
            );
            $('#warHtml').html(
                `${iconString} Mobile Out of Warranty`
            );
            $('#warin').val(
                `${iconString} Mobile Out of Warranty`
            );
            $('#war').val("no");
            $('#physicalin').val(
                `${iconString} Damaged/ Torn screen on edges`
            );
            $('#physical').val("damaged");
        } else if (physical == "heavyscratches") {
            $('#physicalHtml').html(
                `${iconString} Heavy scratches on screen`
            );
            $('#physicalin').val(
                `${iconString} Heavy scratches on screen`
            );
            $('#physical').val("heavyscratches");
        } else if (physical == "1-2scratches") {
            $('#physicalHtml').html(
                `${iconString} 1-2 scratches on screen`
            );
            $('#physicalin').val(
                `${iconString} 1-2 scratches on screen`
            );
            $('#physical').val("1-2scratches");
        } else if (physical == "noscratches") {
            $('#physicalHtml').html(
                `${iconString} No scratches on screen`
            );
            $('#physicalin').val(
                `${iconString} No scratches on screen`
            );
            $('#physical').val("noscratches");
        }
    }
    $('.touch').click(function() {
        touchCondition()
    });
    $('.touch').ready(function() {
        touchCondition()
    });

    $('.spot').click(function() {
        spotCondition()
    });
    $('.spot').ready(function() {
        spotCondition()
    });

    $('.lines').click(function() {
        linesCondition()
    });
    $('.lines').ready(function() {
        linesCondition()
    });

    // physical start
    $('.physical').click(function() {
        physicalCondition()
    });
    $('.physical').ready(function() {
        physicalCondition()
    });
});
</script>

<script>
$(document).ready(function() {

    const iconString =
        '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>';

    function allCondition() {
        var touch = $("input[type=radio][name=touch]:checked").val();
        var spot = $("input[type=radio][name=spot]:checked").val();
        var lines = $("input[type=radio][name=lines]:checked").val();
        var physical = $("input[type=radio][name=physical]:checked").val();
        if (touch == "yes" && spot == "nospot" && lines == "noline" && (physical == "noscratches" || physical ==
                "heavyscratches" || physical == "1-2scratches")) {
            $('#warHtml').html('<?php echo $warin ?>');
            $('#warin').val('<?php echo $warin ?>');
            $('#war').val('<?php echo $war ?>');
        } else {
            $('#warHtml').html(
                `${iconString} Mobile Out of Warranty`
            );
            $('#warin').val(
                `${iconString} Mobile Out of Warranty`
            );
            $('#war').val("no");
        }
        var $warrenty = $('#warHtml').html();
        $("#warin").val($warrenty);
    }
    $('.touch, .physical, .lines, .spot').click(function() {
        allCondition()
    })
    $('.touch, .physical, .lines, .spot').ready(function() {
        allCondition()
    })
});
</script>


<script>
$(document).ready(function() {
    $('.spot, .physical, .lines').click(function() {
        var spot = $("input[type=radio][name=spot]:checked").val();
        var physical = $("input[type=radio][name=physical]:checked").val();
        var lines = $("input[type=radio][name=lines]:checked").val();
        if (spot == "nospot" && physical == "noscratches" && lines == "noline") {
            $('#warHtml').html(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile under Warranty'
            );
            $('#warin').val(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Under Warranty'
            );
            $('#war').val("yes");
        }

    })
    $('.spot, .physical, .lines').ready(function() {
        var spot = $("input[type=radio][name=spot]:checked").val();
        var physical = $("input[type=radio][name=physical]:checked").val();
        var lines = $("input[type=radio][name=lines]:checked").val();
        if (spot == "nospot" && physical == "noscratches" && lines == "noline") {
            $('#warHtml').html(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile under Warranty'
            );
            $('#warin').val(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Under Warranty'
            );
            $('#war').val("yes");
        }

    })
});
</script>


<script>
$(document).ready(function() {
    $('.spot, .physical, .lines').click(function() {
        var spot = $("input[type=radio][name=spot]:checked").val();
        var physical = $("input[type=radio][name=physical]:checked").val();
        var lines = $("input[type=radio][name=lines]:checked").val();
        if (spot == "nospot" && physical == "noscratches" && lines == "noline") {
            $('#war').html(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile under Warranty'
            );
            $('#warin').val(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Under Warranty'
            );
        }

    })
});
</script>