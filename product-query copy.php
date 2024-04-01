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

// // Retrieve session variables
    $call = "";
    $screen = "";
    $body = "";
    $war ="";
    if (isset($_SESSION['call']) && isset($_SESSION['screen']) && isset($_SESSION['body']) && isset($_SESSION['war'])) {
        // Session variables are set, so retrieve them
        $call = $_SESSION['call'];
        $screen = $_SESSION['screen'];
        $body = $_SESSION['body'];
        $war = $_SESSION['war'];
    } else {
        // Session variables are not set, handle this case accordingly
        // For example, you might want to set default values or redirect the user
        // to a page where these variables are set.
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
                <div class="device px-3">
                    <h1 class="sum-heading ">Device Evaluation</h1>
                    <p id="devicedetail"></p>
                    <p id="call"> </p>
                    <p id="screen"></p>
                    <p id="body"></p>
                    <p id="war"></p>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="" method="post" name="form">
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
                            <div class="col-lg-5 col-6"><input id="toggle4-on" class="war" name="war" type="radio"
                                    value="yes" <?php echo $war === "yes" ? 'checked="checked"' : ''; ?> required><label
                                    for="toggle4-on">Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggl-war" class="war" name="war" type="radio"
                                    value="no" <?php echo $war === "no" ? 'checked="checked"' : ''; ?> required><label
                                    for="toggl-war">No</label></div>
                        </div>
                        <div class="text-center mt-3">
                            <input type="hidden" id="callin" name="callin" value="">
                            <input type="hidden" id="screenin" name="screenin" value="">
                            <input type="hidden" id="bodyin" name="bodyin" value="">
                            <input type="hidden" id="warin" name="warin">
                            <input type="hidden" name="devicedetail" value="Device Details">
                            <button class="btn contin-btn submit" type="button" name="query" disabled="disabled"
                                id="postGender">Continue <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <!-- calculation start -->
                    <input type="hidden" id="vid" value="<?php echo $vid ?> ">
                    <input type="hidden" id="mid" value="<?php echo $mid ?>">
                    <input type="hidden" id="bid" value=" <?php echo $bid ?>">
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
</script>

<script>
$(document).ready(function() {
    $('.submit').click(function() {
        var vid = $("#vid").val();
        var mid = $("#mid").val();
        var bid = $("#bid").val();
        var calldeduction = $("input[type=radio][name=call]:checked").val();
        var screen = $("input[type=radio][name=screen]:checked").val();
        var body = $("input[type=radio][name=body]:checked").val();
        var war = $("input[type=radio][name=war]:checked").val();
        // Construct the data object to send via AJAX
        var data = {
            vid: vid,
            mid: mid,
            bid: bid,
            screen: screen,
            body: body,
            war: war,
            calldeduction: calldeduction
        };

        // Send an AJAX request to the PHP script to set session variables
        $.ajax({
            type: "POST",
            url: "set_session.php", // Replace with the path to your PHP script
            data: data,
            success: function(response) {
                // Handle success response if needed
                console.log(response);
                // header("Location: another_page.php");
                if (screen == "yes" && body == "yes" && war == "yes") {
                    window.location.href = "product-new.php?vid=" + vid + "&mid=" + mid +
                        "&bid=" + bid;
                } else if (screen == "no" && body == "no" && war == "no") {
                    window.location.href = "functional.php?vid=" + vid + "&mid=" + mid +
                        "&bid=" + bid;
                } else if (screen == "yes" && body == "no" && war == "no") {
                    window.location.href = "product-new1.php?vid=" + vid + "&mid=" + mid +
                        "&bid=" + bid;
                } else if (screen == "no" && body == "yes" && war == "no") {
                    window.location.href = "defect1.php?vid=" + vid + "&mid=" + mid +
                        "&bid=" + bid;
                } else if (screen == "no" && body == "yes" && war == "yes") {
                    window.location.href = "defect.php?vid=" + vid + "&mid=" + mid +
                        "&bid=" + bid;
                } else if (screen == "no" && body == "no" && war == "yes") {
                    window.location.href = "mobileage.php?vid=" + vid + "&mid=" + mid +
                        "&bid=" + bid;
                } else if (screen == "yes" && body == "no" && war == "yes") {
                    window.location.href = "product-new2.php?vid=" + vid + "&mid=" + mid +
                        "&bid=" + bid;
                } else if (screen == "yes" && body == "yes" && war == "no") {
                    window.location.href = "product-new3.php?vid=" + vid + "&mid=" + mid +
                        "&bid=" + bid;
                }

            },
            error: function(xhr, status, error) {
                // Handle error response if needed
                console.error(error);
            }
        });
    })
})
</script>
<script>
$(document).ready(function() {
    //    call start
    $('.call').click(function() {
        var call = $("input[type=radio][name=call]:checked").val();
        if (call == "yes") {
            $(".warrrrr").show();
            $('#devicedetail').html("Device Details");
            $('#call').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To Take Calls"
            );
            $('#callin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To Take Calls"
            );
            $("#toggl-war").attr('checked', false);
            $('#war').html("");
        } else if (call == "no") {
            $("#toggl-war").attr('checked', 'checked');
            $(".warrrrr").hide();
            $('#devicedetail').html("Device Details");
            $('#call').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To Take Calls"
            );
            $('#callin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To Take Calls"
            );
            $('#war').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
            $('#warin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
        }
    })
    $('.call').ready(function() {
        $("#postGender").prop("disabled", false);
        var call = $("input[type=radio][name=call]:checked").val();
        if (call == "yes") {
            $(".warrrrr").show();
            $('#devicedetail').html("Device Details");
            $('#call').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To Take Calls"
            );
            $('#callin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To Take Calls"
            );
            $("#toggl-war").attr('checked', false);
            $('#war').html("");
        } else if (call == "no") {
            $("#toggl-war").attr('checked', 'checked');
            $(".warrrrr").hide();
            $('#devicedetail').html("Device Details");
            $('#call').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To Take Calls"
            );
            $('#callin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To Take Calls"
            );
            $('#war').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
            $('#warin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
        }
    })
    // screen start
    $('.screen').click(function() {
        var screenvalue = $("input[type=radio][name=screen]:checked").val();
        if (screenvalue == "yes") {
            $('#screen').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Defective"
            );
            $('#screenin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Defective"
            );
        } else if (screenvalue == "no") {
            $('#screen').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Flawless"
            );
            $('#screenin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Flawless"
            );
        }
    })
    $('.screen').ready(function() {
        var screenvalue = $("input[type=radio][name=screen]:checked").val();
        if (screenvalue == "yes") {
            $('#screen').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Defective"
            );
            $('#screenin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Defective"
            );
        } else if (screenvalue == "no") {
            $('#screen').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Flawless"
            );
            $('#screenin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Screen Flawless"
            );
        }
    })
    // body start
    $('.body').click(function() {
        var body = $("input[type=radio][name=body]:checked").val();
        if (body == "yes") {
            $('#body').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Defective"
            );
            $('#bodyin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Defective"
            );
        } else if (body == "no") {
            $('#body').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Flawless"
            );
            $('#bodyin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Flawless"
            );
        }
    })
    $('.body').ready(function() {
        var body = $("input[type=radio][name=body]:checked").val();
        if (body == "yes") {
            $('#body').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Defective"
            );
            $('#bodyin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Defective"
            );
        } else if (body == "no") {
            $('#body').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Flawless"
            );
            $('#bodyin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone Body Flawless"
            );
        }
    })
    // warrenty start
    $('.war').click(function() {
        var war = $("input[type=radio][name=war]:checked").val();
        if (war == "yes") {
            $('#war').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Under Warranty"
            );
            $('#warin').val(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Under Warranty'
            );
        } else if (war == "no") {
            $('#war').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
            $('#warin').val(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty'
            );
        }
    })
    $('.war').ready(function() {
        var war = $("input[type=radio][name=war]:checked").val();
        if (war == "yes") {
            $('#war').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Under Warranty"
            );
            $('#warin').val(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Under Warranty'
            );
        } else if (war == "no") {
            $('#war').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
            $('#warin').val(
                '<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty'
            );
        }
    })
});
</script>