<?php include 'hideheader.php' ?>


<?php 

$vid = $_REQUEST['upto'];
$mid = $_REQUEST['mid'];
$bid = $_REQUEST['bid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
?>

<?php

include_once "./classes/checkModelValue.php";
$modelManager = new CheckModelValue($con);
$selectBrand = $modelManager->getProductBrandValue($bid, $mid);
                    
// $selectBrand =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));


    if (session_status() == PHP_SESSION_NONE) {
        // Start the session
        session_start();
    } 
    if (isset($_SESSION['call']) && isset($_SESSION['screen']) && isset($_SESSION['body']) && isset($_SESSION['warStatus'])) {
        // Session variables are set, so retrieve them
        $call = $_SESSION['call'];
        $screen = $_SESSION['screen'];
        $body = $_SESSION['body'];
        $war = $_SESSION['warStatus'];
    } else { 
        $call = "";
        $screen = "";
        $body = "";
        $war ="";
    }
   
?>
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
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
                    <div class="col-4 text-right"><img src="admin/img/<?php echo $selectmodel['product_image'] ?>"
                            class="img-fluid" width="75%" alt=""></div>
                    <div class="col-6">
                        <h1 class="sum-heading pt-4 "><?php echo $selectmodel['product_name'] ?></h1>
                        <p class="qty ">215+ Device Sold with us</p>
                    </div>
                </div>
                <hr>
                <div class="device px-3" id="deviceEvaluation">
                    <h1 class="sum-heading ">Device Evaluation</h1>
                    <p id="devicedetail" class="mt-2 title"></p>
                    <p id="callHtml"> </p>
                    <p id="screenHtml"></p>
                    <p id="bodyHtml"></p>
                    <p id="warHtml"></p>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="" method="post" name="form" id="myForm">
                    <div class="questionborder">
                        <h1 class="pro-det">Tell us a few things about your device!</h1>
                        <h1 class="ques">1. Are you able to make and receive calls?</h1>
                        <p class="check">Check your device for cellular network connectivity issues.</p>
                        <div class="row pl-4" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggle-on" class="call" name="call" type="radio"
                                    value="yes" <?php echo $call === "yes" ? 'checked="checked"' : ''; ?>
                                    required><label for="toggle-on">Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggle-off" class="call" name="call" type="radio"
                                    value="no" <?php echo $call === "no" ? 'checked="checked"' : ''; ?> required><label
                                    for="toggle-off">No</label></div>
                        </div>
                        <h1 class="ques">2. Are there any problems with your mobile screen?</h1>
                        <p class="check">Check your mobile screen for scratches, cracks, discoloration spots, lines or
                            touch issues.</p>
                        <div class="row pl-4" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggle2-on" class="screen" name="screen" type="radio"
                                    value="yes" <?php echo $screen === "yes" ? 'checked="checked"' : ''; ?>
                                    required><label for="toggle2-on">Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggle2-off" class="screen" name="screen"
                                    type="radio" value="no" <?php echo $screen === "no" ? 'checked="checked"' : ''; ?>
                                    required><label for="toggle2-off">No</label></div>
                        </div>
                        <h1 class="ques">3. Are there any defects on your phone body?</h1>
                        <p class="check">Check you device body (back & edges) for visible scratches and dents.</p>
                        <div class="row pl-4" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggle3-on" class="body" name="body" type="radio"
                                    value="yes" <?php echo $body === "yes" ? 'checked="checked"' : ''; ?>
                                    required><label for="toggle3-on">Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggle3-off" class="body" name="body" type="radio"
                                    value="no" <?php echo $body === "no" ? 'checked="checked"' : ''; ?> required><label
                                    for="toggle3-off">No</label></div>
                        </div>
                        <h1 class="ques">4. Is your Mobile under warranty?</h1>
                        <p class="check"> if it's under warranty. Note: Please provide valid bill of your device.</p>
                        <div class="row pl-4 warrrrr" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggl-war-on" class="war" name="war" type="radio"
                                    value="yes" <?php echo $war === "yes" ? 'checked="checked"' : ''; ?> required><label
                                    for="toggl-war-on">Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggl-war-off" class="war" name="war" type="radio"
                                    value="no" <?php echo $war === "no" ? 'checked="checked"' : ''; ?> required><label
                                    for="toggl-war-off">No</label></div>
                        </div>
                        <div class="text-center mt-3">
                            <input type="hidden" id="call" name="call" value="">
                            <input type="hidden" id="callin" name="callin" value="">
                            <input type="hidden" id="screen" name="screen" value="">
                            <input type="hidden" id="screenin" name="screenin" value="">
                            <input type="hidden" id="body" name="body" value="">
                            <input type="hidden" id="bodyin" name="bodyin" value="">
                            <input type="hidden" id="war" name="war">
                            <input type="hidden" id="warin" name="warin">
                            <input type="hidden" id="mobage" name="mobage">
                            <input type="hidden" id="age" name="age">
                            <input type="hidden" id="agein" name="agein">
                            <input type="hidden" name="devicedetail" value="Device Details">
                            <button class="btn contin-btn submit" type="submit" name="query" disabled="disabled"
                                id="postGender">Continue <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <!-- calculation start -->
                    <input type="hidden" id="vid" name="vid" value="<?php echo $vid ?>">
                    <input type="hidden" id="mid" name="mid" value="<?php echo $mid ?>">
                    <input type="hidden" id="bid" name="bid" value="<?php echo $bid ?>">
                    <!-- calculation end -->
                </form>
            </div>

        </div>

    </div>
</section>

<?php include 'footer1.php' ?>
<script>
$("input:radio").change(function() {
    $("#postGender").prop("disabled", false);
});
$("input:radio").ready(function() {
    $("#postGender").prop("disabled", false);
});
</script>

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
        const {
            vid,
            mid,
            bid,
            call,
            screen,
            body,
            war
        } = formData;
        // formData["params"] = `vid=${vid}&mid=${mid}&bid=${bid}&screen=${screen}&body=${body}&war=${war}`;
        formData["params"] = `vid=${vid}&mid=${mid}&bid=${bid}`;
        $.ajax({
            type: "POST",
            url: "session/set_session_all_question.php", // Replace with the path to your PHP script
            data: formData,
            success: function(response) {
                // Handle success response if needed
                console.log({
                    response
                });
                const {
                    params
                } = response;
                if (screen == "yes" && body == "yes" && war == "yes") {
                    window.location.href = `product-new.php?${params}`;
                } else if (screen == "no" && body == "no" && war == "no") {
                    window.location.href = `functional.php?${params}`;
                } else if (screen == "yes" && body == "no" && war == "no") {
                    window.location.href = `product-new1.php?${params}`;
                } else if (screen == "no" && body == "yes" && war == "no") {
                    window.location.href = `defect1.php?${params}`;
                } else if (screen == "no" && body == "yes" && war == "yes") {
                    window.location.href = `defect.php?${params}`;
                } else if (screen == "no" && body == "no" && war == "yes") {
                    window.location.href = `mobileage.php?${params}`;
                } else if (screen == "yes" && body == "no" && war == "yes") {
                    window.location.href = `product-new2.php?${params}`;
                } else if (screen == "yes" && body == "yes" && war == "no") {
                    window.location.href = `product-new3.php?${params}`;
                }

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
    //    call start

    function callCondition() {
        var call = $("input[type=radio][name=call]:checked").val();

        if (call == "yes") {
            $(".warrrrr").show();
            $('#devicedetail').html("Device Details");
            $('#callHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To Take Calls"
            );
            $('#callin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To Take Calls"
            );
            $("#call").val("yes");
            // $("#toggl-war-off").attr('checked', false);
            // $("#toggl-war-on").prop('checked', false);
            $('#warHtml').html("");
            $('#war').val("");

            $("#age").val("");
            $("#agein").val("");
            $("#mobage").val("");
        } else if (call == "no") {
            $("#toggl-war-off").attr('checked', true);
            $("#toggl-war-on").prop('checked', false);
            // war
            $(".warrrrr").hide();
            $('#devicedetail').html("Device Details");
            $('#callHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To Take Calls"
            );
            $('#callin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To Take Calls"
            );
            $("#call").val("no");
            $('#warHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
            $('#warin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );

            $("#war").val("no");
            $("#age").val("");
            $("#agein").val("");
            $("#mobage").val("");

        }
    }
    // screen start
    function screenCondition() {
        var screenvalue = $("input[type=radio][name=screen]:checked").val();
        if (screenvalue == "yes") {
            $('#screenHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Defective"
            );
            $('#screenin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Defective"
            );
            $("#screen").val("yes");
        } else if (screenvalue == "no") {
            $('#screenHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Flawless"
            );
            $('#screenin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Flawless"
            );
            $("#screen").val("no");
        }
    }

    // body start
    function bodyCondition() {
        var body = $("input[type=radio][name=body]:checked").val();
        if (body == "yes") {
            $('#bodyHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Defective"
            );
            $('#bodyin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Defective"
            );
            $("#body").val("yes");
        } else if (body == "no") {
            $('#bodyHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Flawless"
            );
            $('#bodyin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Flawless"
            );
            $("#body").val("no");
        }
    }

    // warrenty start
    function warCondition() {
        var war = $("input[type=radio][name=war]:checked").val();
        var call = $("input[type=radio][name=call]:checked").val();

        if (war == "yes") {
            $('#warHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Under Warranty"
            );
            $('#warin').val(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Under Warranty'
            );

            $("#war").val("yes");
            $("#age").val("");
            $("#agein").val("");
            $("#mobage").val("");
        } else if (war == "no") {

            $('#warHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
            $('#warin').val(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty'
            );
            $("#war").val("no");
            $("#age").val("");
            $("#agein").val("");
            $("#mobage").val("");
        }
        if (call == "no") {
            $(".warrrrr").hide();
        }
    }

    $('.call').click(function() {
        callCondition()
    })
    $('.call').ready(function() {
        callCondition()
    })

    $('.screen').click(function() {
        screenCondition()
    })
    $('.screen').ready(function() {
        screenCondition()
    })
    // $('.body').on('click ready', function() {
    //     bodyCondition();
    // });

    $('.body').click(function() {
        bodyCondition()
    })
    $('.body').ready(function() {
        bodyCondition()
    })
    $('.war').click(function() {
        warCondition()
    })
    $('.war').ready(function() {
        warCondition()
    })

});
</script>