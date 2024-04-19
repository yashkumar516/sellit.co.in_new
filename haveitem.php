<?php include 'hideheader.php' ?>
<?php include 'include/haveitem1.php'; ?>
<?php include 'include/calenquiry.php' ?>
<?php 
$selectModel = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$mid' "));
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
                        <?php echo $selectquery['subcategory_name'] ?> </span> Mobile</h1>
            </div>

        </div>
    </div>
</section>

<section class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 px-0" id="selllimg">
                <div class="row pt-2 px-2 ">
                    <div class="col-4 text-right"> <img src="admin/img/<?php echo $selectModel['product_image'] ?>"
                            class="img-fluid" width="75%" alt=""></div>
                    <div class="col-6">
                        <h1 class="sum-heading pt-4 "><?php echo $selectModel['product_name'] ?></h1>
                        <p class="qty ">215+ Device Sold with us</p>
                    </div>
                </div>
                <hr>

                <div class="device px-3" id="deviceEvaluation">
                    <h1 class="sum-heading ">Device Evaluation</h1>
                    <p id="devicedetail" class="mt-2 title"><?php echo $devicedetail ?></p>
                    <p id="call"><?php echo $callin ?></p>
                    <p id="screen"><?php echo $screenin ?></p>
                    <p id="body"><?php echo $bodyin ?></p>
                    <p id="warHtml"><?php echo $warin ?></p>
                    <!-- screen start -->
                    <p id="screenconditionHtml" class="mt-2 title"><?php echo $screencondition ?></p>
                    <p id="touchHtml"><?php echo $touchin ?></p>
                    <p id="spotHtml"><?php echo $spotin ?></p>
                    <p id="linesHtml"><?php echo $linesin ?></p>
                    <p id="physicalHtml"><?php echo $physicalin ?></p>
                    <!-- bodystart -->
                    <p id="overallHtml" class="mt-2 title"><?php echo $overallcondition ?></p>
                    <p id="ScratchesHtml"><?php echo $Scratchesin ?></p>
                    <p id="dentsHtml"><?php echo $dentsin ?></p>
                    <p id="sideHtml"><?php echo $sidein ?></p>
                    <p id="bentHtml"><?php echo $bentin ?></p>
                    <!-- warrent strt -->
                    <p id="mobage" class="mt-2 title"><?php echo $mobage ?></p>
                    <p id="ageHtml"><?php echo $agein ?></p>
                    <!-- functional start -->
                    <p id="functional" class="mt-2 title"><?php echo $functional ?></p>
                    <p id="copydisplayHtml"><?php echo $copydisplayin ?></p>
                    <p id="frontcamHtml"><?php echo $frontcamin ?></p>
                    <p id="backcamHtml"><?php echo $backcamin ?></p>
                    <p id="volumeHtml"><?php echo $volumein ?></p>
                    <p id="fingertouchHtml"><?php echo $fingertouchin ?></p>
                    <p id="speakerHtml"><?php echo $speakerin ?></p>
                    <p id="powerHtml"><?php echo $powerin ?></p>
                    <p id="chargingHtml"><?php echo $chargingin ?></p>
                    <p id="faceHtml"><?php echo $facein ?></p>
                    <p id="audioHtml"><?php echo $audioin ?></p>
                    <p id="camglass"><?php echo $camglassin ?></p>
                    <p id="wifiHtml"><?php echo $wifiin  ?></p>
                    <p id="silentHtml"><?php echo $silentin ?></p>
                    <p id="batteryHtml"><?php echo $batteryin ?></p>
                    <p id="bluetoothHtml"><?php echo $bluetoothin ?></p>
                    <p id="vibrateHtml"><?php echo $vibratein ?></p>
                    <p id="microHtml"><?php echo $microin ?></p>

                    <!-- accesiers start -->
                    <!-- <p id="dohaveHtml" class="mt-2 title"></p> -->
                    <p id="dohave" class="mt-2 title"></p>
                    <p id="chargerHtml"></p>
                    <p id="earphoneHtml"></p>
                    <p id="boximeiHtml"></p>
                    <p id="billimeiHtml"></p>
                </div>
            </div>
            <div class="col-lg-6 haveitem mx-uto">
                <div class="card">
                    <p class="ques">Do you have the following?</p>

                    <div class="row ">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                            <input id="toggle1" class="acceseries" name="charger" type="checkbox" value="yes">
                            <label for="toggle1">
                                <img src="assets/images/item/1.jpg" class="img-fluid" alt="">
                                <div class="radi-text">
                                    <p class="text-center">Original Charger of Device</p>
                                </div>

                            </label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                            <input id="toggle2" class="acceseries" name="earphone" type="checkbox" value="yes">
                            <label for="toggle2">
                                <img src="assets/images/item/3.jpg" class="img-fluid" alt="">
                                <div class="radi-text">
                                    <p class="text-center">Original Earphones</p>
                                </div>
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                            <input id="toggle3" class="acceseries" name="boximei" type="checkbox" value="yes">
                            <label for="toggle3">
                                <img src="assets/images/item/2.jpg" class="img-fluid" alt="">
                                <div class="radi-text">
                                    <p class="text-center">Box with same IMEI</p>
                                </div>
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                            <input id="toggle4" class="acceseries" name="billimei" type="checkbox" value="yes">
                            <label for="toggle4">
                                <img src="assets/images/item/4.jpg" class="img-fluid" alt="">
                                <div class="radi-text">
                                    <p class="text-center">Bill with same IMEI</p>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <?php
                        if(isset($_SESSION['user'])){
                            ?>
                        <form method="POST">
                            <div class="form-group">
                                <input type="hidden" id="warin" name="warin">
                                <input type="hidden" id="war" name="war">
                                <!-- accesries start -->
                                <input type="hidden" id="charger" name="charger" value="">
                                <input type="hidden" id="chargerin" name="chargerin" value="">
                                <input type="hidden" id="earphone" name="earphone" value="">
                                <input type="hidden" id="earphonein" name="earphonein" value="">
                                <input type="hidden" id="boximei" name="boximei" value="">
                                <input type="hidden" id="boximeiin" name="boximeiin" value="">
                                <input type="hidden" id="billimei" name="billimei" value="">
                                <input type="hidden" id="billimeiin" name="billimeiin" value="">
                                <input type="hidden" id="mobilevalue" name="mobile" value="">
                                <input type="hidden" id="userid" name="uid" value="" required>
                                <input type="hidden" class="form-control py-2 px-2 my-3" name="name" id="name"
                                    placeholder=" Enter your Name" required>

                                <input type="hidden" id="code" name="code" class="form-control py-2 px-2 my-3"
                                    placeholder=" Code" required>
                                <button type="submit" name="otpverify" class="btn contin-btn text-white">Continue <i
                                        class="fas fa-arrow-right"></i></button>
                            </div>
                        </form>
                        <?php
                        }else{
                      ?>
                        <a data-toggle="modal" data-target="#myModal2"><button class="btn contin-btn" type="submit"
                                name="questions"> Continue <i class="fas fa-arrow-right"></i></button></a>
                        <?php
                      }
                      ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- model box start -->
<div class="modal right fade " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="container">
                <div class="row" id="signmob">

                    <div class="col-12 col-lg-11 mx-auto my-auto text-center ">
                        <img src="assets/images/Group 494.png" alt="img" width="50%">
                        <h1 class="text-white my-4">Welcome To Sell It</h1>
                        <div class="row">
                            <div class="col-11 col-lg-10 mx-auto">
                                <form action="" method="post" id="myformmobile">
                                    <div class="form-group">
                                        <input type="text" class="form-control py-2 px-2 my-3" name="phone" id="mobile"
                                            placeholder=" Enter your Mobile Number" required>
                                        <button type="submit" name="mobileverification"
                                            class="form-control col-lg-6 col-8 py-2 px-2 mx-auto my-3"> <b> Continue
                                            </b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!--2nd model box start -->
<div class="modal right fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="container my-auto">
                <div class="row" id="signmob">

                    <div class="col-12 col-lg-12 mx-auto my-auto text-center p-5 img-responsive">
                        <img src="assets/images/Group 494.png" alt="img" width="50%">
                        <h1 class="text-white mt-2 title">Enter OTP</h1>
                        <div class="row">
                            <div class="col-11 col-lg-12 mx-auto">
                                <form method="POST">
                                    <div class="form-group">
                                        <input type="hidden" id="war" name="war" value="<?php echo $war ?>">
                                        <input type="hidden" id="warin" name="warin">
                                        <!-- accesries start -->
                                        <input type="hidden" id="charger" name="charger" value="">
                                        <input type="hidden" id="chargerin" name="chargerin" value="">
                                        <input type="hidden" id="earphone" name="earphone" value="">
                                        <input type="hidden" id="earphonein" name="earphonein" value="">
                                        <input type="hidden" id="boximei" name="boximei" value="">
                                        <input type="hidden" id="boximeiin" name="boximeiin" value="">
                                        <input type="hidden" id="billimei" name="billimei" value="">
                                        <input type="hidden" id="billimeiin" name="billimeiin" value="">
                                        <input type="hidden" id="mobilevalue" name="mobile" value="">
                                        <input type="hidden" id="userid" name="uid" value="" required>

                                        <input type="text" class="form-control py-2 px-2 my-3 loginuser" name="name"
                                            id="name" placeholder=" Enter your Name" required>
                                        <input type="email" class="form-control py-2 px-2 my-3 loginuser" name="email"
                                            id="name" placeholder="Enter your Email" required>
                                        <input type="text" id="code" name="code" class="form-control py-2 px-2 my-3"
                                            placeholder=" Code" required>
                                        <button type="submit" name="otpverify"
                                            class="form-control col-lg-6 col-10 py-2 px-2 mx-auto my-3"> <b> Verify OTP
                                            </b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer1.php' ?>
<!-- open another model script-->
<script>
$(document).ready(function() {
    $("#myformmobile").on('submit', function(e) {
        $('#myModal2').modal('hide');
        $('#myModal1').modal('show');
        e.preventDefault();
        var mob = $("#mobile").val();
        $('#mobilevalue').val(mob);
        if (mob != null) {
            jQuery.ajax({
                method: "post",
                url: "mobileverify.php",
                data: {
                    mobile: mob
                },
                dataType: "html",
                success: function(result) {
                    if (result != '') {
                        $('.loginuser').addClass('d-none');
                        $('.loginuser').removeAttr('required');
                        $('#userid').val(result);
                    }
                }
            });
            //         jQuery.ajax({
            //               method: "post",
            //               url : "createuser.php",
            //               data:{mobile:mob,name:uname},
            //   dataType: "html",
            //   success:function(result)
            //   {
            //       alert(result);
            // 	 $('#userid').val(result); 
            //   }
            //         });
        }
    });
});
</script>
<!-- open another model script end -->
<script>
$(document).ready(function() {
    // Scratches start
    $('.acceseries').click(function() {
        var charger = $("input[type=checkbox][name=charger]:checked").val();
        if (charger == "yes") {
            $('#dohave').html("Do you have the following?");
            $('#chargerHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Charger of Device"
            );
            $('#chargerin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Charger of Device"
            );
            $('#charger').val("yes");
        } else {
            $('#dohave').html("Do you have the following?");
            $('#chargerHtml').html("");
            $('#chargerin').val("");
            $('#charger').val("");
        }

        var earphone = $("input[type=checkbox][name=earphone]:checked").val();
        if (earphone == "yes") {
            $('#dohave').html("Do you have the following?");
            $('#earphoneHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Earphones of Device"
            );
            $('#earphonein').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Earphones of Device"
            );
            $('#earphone').val("yes");
        } else {
            $('#dohave').html("Do you have the following?");
            $('#earphoneHtml').html("");
            $('#earphonein').val("");
            $('#earphone').val("");
        }

        var boximei = $("input[type=checkbox][name=boximei]:checked").val();
        if (boximei == "yes") {
            $('#dohave').html("Do you have the following?");
            $('#boximeiHtml').html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Box with same IMEI"
            );
            $('#boximeiin').val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Box with same IMEI"
            );
            $('#boximei').val("yes");
        } else {
            $('#dohave').html("Do you have the following?");
            $('#boximeiHtml').html("");
            $('#boximeiin').val("");
            $('#boximei').val("");
        }

        var billimei = $("input[type=checkbox][name=billimei]:checked").val();
        if (billimei != null) {
            if (billimei == "yes") {
                var waren = $("#warHtml").html();
                var war = "<?php echo $war ?>";
                console.log({
                    waren,
                    war
                }, "--1--");
                $('#dohave').html("Do you have the following?");
                $('#billimeiHtml').html(
                    "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bill with same IMEI"
                );
                $('#billimeiin').val(
                    "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bill with same IMEI"
                );
                $('#billimei').val("yes");
                if (war === "yes") {
                    console.log({
                        waren
                    }, "--2--");
                    $("#warHtml").html(
                        "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>Mobile Under Warranty"
                    );
                    $("#warin").val(
                        "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>Mobile Under Warranty"
                    );
                    $("#war").val(war);
                } else if (war === "no") {
                    console.log({
                        waren
                    }, "--3--");
                    $("#warHtml").html(
                        "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>Mobile Out of Warranty"
                    );
                    $("#warin").val(
                        "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>Mobile Out of Warranty"
                    );
                    $("#war").val(war);
                }

            }
        } else {
            $('#dohave').html("Do you have the following?");
            $('#billimeiHtml').html("");
            $('#billimeiin').val("");
            $('#billimei').val("");
            $("#warHtml").html(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );
            $("#warin").val(
                "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
            );

            $("#war").val("no");
        }
    });
});
</script>
<!-- question calculation start here -->

<script>
$(document).ready(function() {
    var billimei = $("input[type=checkbox][name=billimei]:checked").val();
    if (billimei == "yes") {
        // $("#war").html("<php echo $war ?>");
        //     $("#warin").val("<php echo $war ?>");
    } else {
        $('#warHtml').html(
            "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
        );
        $('#warin').val(
            "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty"
        );
        $('#war').val("no");
    }
});
</script>