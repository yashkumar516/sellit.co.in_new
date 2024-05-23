<?php include 'header.php' ?>
<?php
include 'include/functional2.php';
$vid = $_REQUEST['vid'];
$bid = $_REQUEST['bid'];
$mid = $_REQUEST['mid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
?>

<?php
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
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
<section class="product-detail">
            <div class="col-lg-5 px-0" id="selllimg">
                <div class="row pt-2 px-2 ">
                    <div class="col-4 text-right"> <img src="admin/img/<?php echo $selectmodel['product_image'] ?>" class="img-fluid" width="75%" alt=""></div>
                    <div class="col-6">
                        <h1 class="sum-heading pt-4 "><?php echo $selectmodel['product_name'] ?></h1>
                        <p class="qty ">215+ Device Sold with us</p>
                    </div>
                </div>
                <hr>
                <div class="device px-3">
                    <h1 class="sum-heading ">Device Evaluation</h1>
                    <p id="devicedetail"><?php echo $devicedetail ?></p>
                    <p id="call"><?php echo $call ?></p>
                    <p id="screen"><?php echo $screen ?></p>
                    <p id="body"><?php echo $body ?></p>
                    <p id="war"><?php echo $war ?></p>
                    <!-- screen start -->
                    <p id="screencondition"><?php echo $screencondition ?></p>
                    <p id="touch"><?php echo $touch ?></p>
                    <p id="spot"><?php echo $spot ?></p>
                    <p id="lines"><?php echo $lines ?></p>
                    <p id="physical"><?php echo $physical ?></p>
                    <!-- bodystart -->
                    <p id="overall"><?php echo $overallcondition ?></p>
                    <p id="Scratches"><?php echo $Scratches ?></p>
                    <p id="dents"><?php echo $dents ?></p>
                    <p id="side"><?php echo $side ?></p>
                    <p id="bent"><?php echo $bents ?></p>
                    <!-- warrent strt -->
                    <p id="mobage"><?php echo $mobage ?></p>
                    <p id="age"><?php echo $age ?></p>
                    <!-- functional start -->
                    <p id="functional"></p>
                    <p id="copydisplay"></p>
                    <p id="frontcam"></p>
                    <p id="backcam"></p>
                    <p id="volume"></p>
                    <p id="fingertouch"></p>
                    <p id="speaker"></p>
                    <p id="power"></p>
                    <p id="charging"></p>
                    <p id="face"></p>
                    <p id="audio"></p>
                    <p id="camglass"></p>
                    <p id="wifi"></p>
                    <p id="silent"></p>
                    <p id="battry"></p>
                    <p id="bluetooth"></p>
                    <p id="vibrate"></p>
                    <p id="micro"></p>

                </div>
            </div>
</section>
<div class="container-fluid fun" >
                    <form action="haveitem.php?vid=<?php echo $vid ?>&&bid=<?php echo $bid ?>&&mid=<?php echo $mid ?>" method="post">
                    <h1 class="pro-det text-center">Functional or Physical Problems</h1>
                        <div class="row ">
                            <!-- new question start -->
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle0" class="functional" name="copydisplay" type="checkbox" value="yes">
                                <label for="toggle0">
                                    <img src="assets/images/functional/1.jpg" class="img-fluid" alt="">
                                    <div class="container">
                                    <div class="row functional h-100">
                                        <p class="text-center my-auto mx-auto">Copy Display</p>
                                    </div>
                                    </div>
                                </label>
                            </div>
                            <!-- new question end -->
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle1" class="functional" name="frontcam" type="checkbox" value="yes">
                                <label for="toggle1">
                                    <img src="assets/images/functional/1.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Front Camera not working</p>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle2" class="functional" name="backcam" type="checkbox" value="yes">
                                <label for="toggle2">
                                    <img src="assets/images/functional/2.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Back Camera not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle3" class="functional" name="volume" type="checkbox" value="yes">
                                <label for="toggle3">
                                    <img src="assets/images/functional/3.jpg" class="img-fluid" alt="">
                                    <div class=functional>
                                        <p class="text-center">Volume Button not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle4" class="functional" name="fingertouch" type="checkbox" value="yes">
                                <label for="toggle4">
                                    <img src="assets/images/functional/4.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Finger Touch not working</p>
                                    </div>
                                </label>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle5" class="functional" name="speaker" type="checkbox" value="yes">
                                <label for="toggle5">
                                    <img src="assets/images/functional/5.jpg" class="img-fluid" alt="">
                                    <div class="container">
                                    <div class="row functional h-100">
                                        <p class="text-center my-auto mx-auto">Speaker not working</p>
                                    </div>
                                    </div>

                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle6" class="functional" name="power" type="checkbox" value="yes">
                                <label for="toggle6">
                                    <img src="assets/images/functional/6.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Power Button not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle7" class="functional" name="charging" type="checkbox" value="yes">
                                <label for="toggle7">
                                    <img src="assets/images/functional/7.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Charging Port not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle8" class="functional" name="face" type="checkbox" value="yes">
                                <label for="toggle8">
                                    <img src="assets/images/functional/8.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Face Sensor not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle9" class="functional" name="audio" type="checkbox" value="yes">
                                <label for="toggle9">
                                    <img src="assets/images/functional/9.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Audio Receiver not working</p>
                                    </div>

                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle10" class="functional" name="camglass" type="checkbox" value="yes">
                                <label for="toggle10">
                                    <img src="assets/images/functional/2.jpg" class="img-fluid" alt="">
                                     <div class="container">
                                    <div class="functional row h-100">
                                        <p class="text-center my-auto mx-auto">Camera Glass Broken</p>
                                    </div>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle11" class="functional" name="wifi" type="checkbox" value="yes">
                                <label for="toggle11">
                                    <img src="assets/images/functional/11.jpg" class="img-fluid" alt="">
                                    <div class="container">
                                    <div class="functional row h-100">
                                        <p class="text-center my-auto mx-auto">WiFi not working</p>
                                    </div>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle12" class="functional" name="silent" type="checkbox" value="yes">
                                <label for="toggle12">
                                    <img src="assets/images/functional/12.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Silent Button not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle13" class="functional" name="battery" type="checkbox" value="yes">
                                <label for="toggle13">
                                    <img src="assets/images/functional/13.jpg" class="img-fluid" alt="">
                                    <div class="container">
                                    <div class="functional row h-100">
                                        <p class="text-center my-auto mx-auto">Battery not working</p>
                                    </div>
                                    </div>

                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle14" class="functional" name="bluetooth" type="checkbox" value="yes">
                                <label for="toggle14">
                                    <img src="assets/images/functional/14.jpg" class="img-fluid" alt="">
                                      <div class="container">
                                    <div class="functional row h-100">
                                        <p class="text-center my-auto mx-auto">Bluetooth not working</p>
                                    </div>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle15" class="functional" name="vibrate" type="checkbox" value="yes">
                                <label for="toggle15">
                                    <img src="assets/images/functional/15.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Vibrator is not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle16" class="functional" name="micro" type="checkbox" value="yes">
                                <label for="toggle16">
                                    <img src="assets/images/functional/16.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Microphone not working</p>
                                    </div>
                                </label>

                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <input type="hidden" id="callin" name="callin" value="<?php echo $call ?>">
                            <input type="hidden" id="screenin" name="screenin" value="<?php echo $screen ?>">
                            <input type="hidden" id="bodyin" name="bodyin" value="<?php echo $body ?>">
                            <input type="hidden" id="warin" name="warin">
                            <!-- screen start -->
                            <input type="hidden" id="touchin" name="touch" value="<?php echo $touch ?>">
                            <input type="hidden" id="spotin" name="spot" value="<?php echo $spot ?>">
                            <input type="hidden" id="linesin" name="lines" value="<?php echo $lines ?>">
                            <input type="hidden" id="physicalin" name="physical" value="<?php echo $physical ?>">
                            <input type="hidden" id="screencondition" name="screencondition" value="<?php echo $screencondition ?>">
                            <!-- body start -->
                            <input type="hidden" id="devicedetail" name="devicedetail" value="Device Details">
                            <input type="hidden" id="Scratchesin" name="Scratches" value="<?php echo $Scratches ?>">
                            <input type="hidden" id="dentsin" name="dents" value="<?php echo $dents ?>">
                            <input type="hidden" id="sidein" name="side" value="<?php echo $side ?>">
                            <input type="hidden" id="bentin" name="bent" value="<?php echo $bents ?>">
                            <input type="hidden" id="overallcondition" name="overallcondition" value="<?php echo $overallcondition ?>">
                            <input type="hidden" id="functional" name="functional" value="Functional Condition">
                            <!-- mobile age  -->
                            <input type="hidden" id="mobagein" name="mobage" value="<?php echo $mobage ?>">
                            <input type="hidden" id="agein" name="age" value="<?php echo $age ?>">
                            <!-- functional start -->
                            <input type="hidden" id="copydisplayin" name="copydisplayin" value="">
                            <input type="hidden" id="frontcamin" name="frontcamin" value="">
                            <input type="hidden" id="backcamin" name="backcamin" value="">
                            <input type="hidden" id="volumein" name="volumein" value="">
                            <input type="hidden" id="fingertouchin" name="fingertouchin" value="">
                            <input type="hidden" id="speakerin" name="speakerin" value="">
                            <input type="hidden" id="powerin" name="powerin" value="">
                            <input type="hidden" id="chargingin" name="chargingin" value="">
                            <input type="hidden" id="facein" name="facein" value="">
                            <input type="hidden" id="audioin" name="audioin" value="">
                            <input type="hidden" id="camglassin" name="camglassin" value="">
                            <input type="hidden" id="wifiin" name="wifiin" value="">
                            <input type="hidden" id="silentin" name="silentin" value="">
                            <input type="hidden" id="battryin" name="battryin" value="">
                            <input type="hidden" id="bluetoothin" name="bluetoothin" value="">
                            <input type="hidden" id="vibratein" name="vibratein" value="">
                            <input type="hidden" id="microin" name="microin" value="">
                            <button class="btn contin-btn" type="submit" name="questions">Continue <i class="fas fa-arrow-right"></i></button>
                        </div><br>
                     
                    </form>
        </div>
<?php include 'footer1.php' ?>

<script>
    $(document).ready(function() {
        // Scratches start
        $('.functional').click(function() {
            var frontcam = $("input[type=checkbox][name=frontcam]:checked").val();
            if (frontcam == "yes") {
                $('#functional').html("Functional Condition");
                $('#frontcam').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Front Camera not working");
                $('#frontcamin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Front Camera not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#frontcam').html("");
                $('#frontcamin').val("");
            }

            var backcam = $("input[type=checkbox][name=backcam]:checked").val();
            if (backcam == "yes") {
                $('#functional').html("Functional Condition");
                $('#backcam').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Back Camera not working");
                $('#backcamin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Back Camera not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#backcam').html("");
                $('#backcamin').val("");
            }

            var volume = $("input[type=checkbox][name=volume]:checked").val();
            if (volume == "yes") {
                $('#functional').html("Functional Condition");
                $('#volume').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Volume Button not working");
                $('#volumein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Volume Button not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#volume').html("");
                $('#volumein').val("");
            }

            var finertouch = $("input[type=checkbox][name=fingertouch]:checked").val();
            if (finertouch == "yes") {
                $('#functional').html("Functional Condition");
                $('#fingertouch').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Finger Touch not working");
                $('#fingertouchin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Finger Touch not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#fingertouch').html("");
                $('#fingertouchin').val("");
            }

            var speaker = $("input[type=checkbox][name=speaker]:checked").val();
            if (speaker == "yes") {
                $('#functional').html("Functional Condition");
                $('#speaker').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Speaker not working");
                $('#speakerin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Speaker not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#speaker').html("");
                $('#speakerin').val("");
            }

            var power = $("input[type=checkbox][name=power]:checked").val();
            if (power == "yes") {
                $('#functional').html("Functional Condition");
                $('#power').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Power Button not working");
                $('#powerin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Power Button not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#power').html("");
                $('#powerin').val("");
            }

            var charging = $("input[type=checkbox][name=charging]:checked").val();
            if (charging == "yes") {
                $('#functional').html("Functional Condition");
                $('#charging').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Charging Port not working");
                $('#chargingin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Charging Port not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#charging').html("");
                $('#chargingin').val("");
            }

            var face = $("input[type=checkbox][name=face]:checked").val();
            if (face == "yes") {
                $('#functional').html("Functional Condition");
                $('#face').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Face Sensor not working");
                $('#facein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Face Sensor not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#face').html("");
                $('#facein').val("");
            }

            var audio = $("input[type=checkbox][name=audio]:checked").val();
            if (audio == "yes") {
                $('#functional').html("Functional Condition");
                $('#audio').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Audio Receiver not working");
                $('#audioin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Audio Receiver not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#audio').html("");
                $('#audioin').val("");
            }

            var camglass = $("input[type=checkbox][name=camglass]:checked").val();
            if (camglass == "yes") {
                $('#functional').html("Functional Condition");
                $('#camglass').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Camera Glass Broken");
                $('#camglassin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Camera Glass Broken");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#camglass').html("");
                $('#camglassin').val("");
            }

            var wifi = $("input[type=checkbox][name=wifi]:checked").val();
            if (wifi == "yes") {
                $('#functional').html("Functional Condition");
                $('#wifi').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>WiFi not working");
                $('#wifiin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>WiFi not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#wifi').html("");
                $('#wifiin').val("");
            }

            var silent = $("input[type=checkbox][name=silent]:checked").val();
            if (silent == "yes") {
                $('#functional').html("Functional Condition");
                $('#silent').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Silent Button not working");
                $('#silentin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Silent Button not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#silent').html("");
                $('#silentin').val("");
            }
            var battery = $("input[type=checkbox][name=battery]:checked").val();
            if (battery == "yes") {
                $('#functional').html("Functional Condition");
                $('#battry').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Battery not working");
                $('#battryin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Battery not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#battry').html("");
                $('#battryin').val("");
            }
            var bluetooth = $("input[type=checkbox][name=bluetooth]:checked").val();
            if (bluetooth == "yes") {
                $('#functional').html("Functional Condition");
                $('#bluetooth').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bluetooth not working");
                $('#bluetoothin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bluetooth not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#bluetooth').html("");
                $('#bluetoothin').val("");
            }

            var vibrate = $("input[type=checkbox][name=vibrate]:checked").val();
            if (vibrate == "yes") {
                $('#functional').html("Functional Condition");
                $('#vibrate').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Vibrator is not working");
                $('#vibratein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Vibrator is not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#vibrate').html("");
                $('#vibratein').val("");
            }

            var micro = $("input[type=checkbox][name=micro]:checked").val();
            if (micro == "yes") {
                $('#functional').html("Functional Condition");
                $('#micro').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Microphone is not working");
                $('#microin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Microphone is not working");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#micro').html("");
                $('#microin').val("");
            }
            //new question start 
            var copydisplay = $("input[type=checkbox][name=copydisplay]:checked").val();
            if (copydisplay == "yes") {
                $('#functional').html("Functional Condition");
                $('#copydisplay').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Copy Display");
                $('#copydisplayin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Copy Display");
                $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            } else {
                $('#functional').html("Functional Condition");
                $('#copydisplay').html("");
                $('#copydisplayin').val("");
            }
            //new question end 
        });
    });
</script>

<script>
    $(document).ready(function() {
        var $warrenty = $('#war').html();
        $("#warin").val($warrenty);
    });
</script>

<script>
    $(document).ready(function() {
        $('.functional').click(function() {
            var frontcam = $("input[type=checkbox][name=frontcam]:checked").val();
            var backcam = $("input[type=checkbox][name=backcam]:checked").val();
            var volume = $("input[type=checkbox][name=volume]:checked").val();
            var finertouch = $("input[type=checkbox][name=fingertouch]:checked").val();
            var speaker = $("input[type=checkbox][name=speaker]:checked").val();
            var power = $("input[type=checkbox][name=power]:checked").val();
            var charging = $("input[type=checkbox][name=charging]:checked").val();
            var face = $("input[type=checkbox][name=face]:checked").val();
            var audio = $("input[type=checkbox][name=audio]:checked").val();
            var camglass = $("input[type=checkbox][name=camglass]:checked").val();
            var wifi = $("input[type=checkbox][name=wifi]:checked").val();
            var silent = $("input[type=checkbox][name=silent]:checked").val();
            var battery = $("input[type=checkbox][name=battery]:checked").val();
            var bluetooth = $("input[type=checkbox][name=bluetooth]:checked").val();
            var vibrate = $("input[type=checkbox][name=vibrate]:checked").val();
            var micro = $("input[type=checkbox][name=micro]:checked").val();
            var copydisplay = $("input[type=checkbox][name=copydisplay]:checked").val();
            if (frontcam != "yes" && backcam != "yes" && volume != "yes" && finertouch != "yes" && speaker != "yes" && power != "yes" && charging != "yes" && face != "yes" && audio != "yes" && camglass != "yes" &&
                wifi != "yes" && silent != "yes" && battery != "yes" && bluetooth != "yes" && vibrate != "yes" && micro != "yes" && copydisplay != "yes") {
                $('#war').html('<?php echo $war ?>');
                $('#warin').val('<?php echo $war ?>');
            }

        })
    });
</script>