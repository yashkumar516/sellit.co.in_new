<?php include 'hideheader.php' ?>
<?php
$bid = $_REQUEST['bid'];
$mid = $_REQUEST['mid'];
$vid = $_REQUEST['vid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
if(isset($_POST['query'])){
    $switch  = $_POST['switch'];
}else{
    $switch = '';
}
?>
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="sell-header">Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span>Tablet</h1>
            </div>
        </div>
    </div>
</section>
<section class="product-detail">
    <div class="container">
        <div class="row">
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
                    <p id="devicedetail">Does the Tablet Switch On?</p>
                    <p id="call"><?php echo $switch ?></p>
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
                    <p id="finger"></p>
                    <p id="bt"></p>
                    <p id="gps"></p>
                </div>
            </div>
            <div class="col-lg-7 fun">
                <div class="card">
                    <h1 class="pro-det">Functional or Physical Problems</h1>
                    <form action="tabletage.php?bid=<?php echo $bid ?>&&mid=<?php echo $mid ?>&&vid=<?php echo $vid ?>" method="post">
                        <div class="row ">
                            <!-- new question start -->
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle0" class="functional" name="copydisplay" type="checkbox" value="yes">
                                <label for="toggle0">
                                    <img src="assets/images/tablequest/front.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Front Camera not working</p>
                                    </div>
                                </label>
                            </div>
                            <!-- new question end -->
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle1" class="functional" name="frontcam" type="checkbox" value="yes">
                                <label for="toggle1">
                                    <img src="assets/images/tablequest/back.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Back Camera not working</p>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle2" class="functional" name="backcam" type="checkbox" value="yes">
                                <label for="toggle2">
                                    <img src="assets/images/tablequest/wifi.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Wifi not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle3" class="functional" name="volume" type="checkbox" value="yes">
                                <label for="toggle3">
                                    <img src="assets/images/tablequest/speaker.jpg" class="img-fluid" alt="">
                                    <div class=functional>
                                        <p class="text-center">Speakers not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle4" class="functional" name="fingertouch" type="checkbox" value="yes">
                                <label for="toggle4">
                                    <img src="assets/images/tablequest/power.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Power/Home Button not working</p>
                                    </div>
                                </label>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle5" class="functional" name="speaker" type="checkbox" value="yes">
                                <label for="toggle5">
                                    <img src="assets/images/tablequest/battery.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Charging Port not working</p>
                                    </div>

                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle6" class="functional" name="power" type="checkbox" value="yes">
                                <label for="toggle6">
                                    <img src="assets/images/tablequest/microphone.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Microphone not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle7" class="functional" name="charging" type="checkbox" value="yes">
                                <label for="toggle7">
                                    <img src="assets/images/tablequest/battery.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Battery not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle8" class="functional" name="face" type="checkbox" value="yes">
                                <label for="toggle8">
                                    <img src="assets/images/tablequest/volume.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Volume Button not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle9" class="functional" name="fingerprint" type="checkbox" value="yes">
                                <label for="toggle9">
                                    <img src="assets/images/tablequest/finger.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Finger Print not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle10" class="functional" name="gps" type="checkbox" value="yes">
                                <label for="toggle10">
                                    <img src="assets/images/tablequest/gps.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">GPS not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle11" class="functional" name="bt" type="checkbox" value="yes">
                                <label for="toggle11">
                                    <img src="assets/images/tablequest/bluetooth.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Bluetooth not working</p>
                                    </div>
                                </label>

                            </div>
                       
                        </div>
                        <div class="text-center mt-4">
                            <input type="hidden" id="callin" name="switch" value="<?php echo $switch ?>">
                            <!-- functional start -->
                            <input type="hidden" id="warin" name="warin">
                            <input type="hidden" id="copydisplayin" name="touchscreen" value="">
                            <input type="hidden" id="frontcamin" name="battery" value="">
                            <input type="hidden" id="backcamin" name="wifi" value="">
                            <input type="hidden" id="volumein" name="speaker" value="">
                            <input type="hidden" id="fingertouchin" name="charging" value="">
                            <input type="hidden" id="speakerin" name="dc" value="">
                            <input type="hidden" id="powerin" name="button" value="">
                            <input type="hidden" id="chargingin" name="optical" value="">
                            <input type="hidden" id="facein" name="bluetooth" value="">
                            <!-- new -->
                            <input type="hidden" id="btin" name="bt" value="">
                            <input type="hidden" id="fingerin" name="finger" value="">
                            <input type="hidden" id="gpsin" name="gps" value="">
                            <button class="btn contin-btn" type="submit" name="functionquestions">Continue <i class="fas fa-arrow-right"></i></button>
                        </div><br>
                    </form>
                </div>


            </div>
        </div>

    </div>
</section>
<?php include 'footer1.php' ?>
<script>
    $(document).ready(function() {
        // Scratches start
        $('.functional').click(function() {
            var frontcam = $("input[type=checkbox][name=frontcam]:checked").val();
            if (frontcam == "yes") {
                $('#functional').html("Functional Condition");
                $('#frontcam').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Back Camera not working");
                $('#frontcamin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Back Camera not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#frontcam').html("");
                $('#frontcamin').val("");
            }

            var backcam = $("input[type=checkbox][name=backcam]:checked").val();
            if (backcam == "yes") {
                $('#functional').html("Functional Condition");
                $('#backcam').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Wifi not working");
                $('#backcamin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Wifi not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#backcam').html("");
                $('#backcamin').val("");
            }

            var volume = $("input[type=checkbox][name=volume]:checked").val();
            if (volume == "yes") {
                $('#functional').html("Functional Condition");
                $('#volume').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Speakers not working");
                $('#volumein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Speakers not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#volume').html("");
                $('#volumein').val("");
            }

            var finertouch = $("input[type=checkbox][name=fingertouch]:checked").val();
            if (finertouch == "yes") {
                $('#functional').html("Functional Condition");
                $('#fingertouch').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Power/Home Button not working");
                $('#fingertouchin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Power/Home Button not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#fingertouch').html("");
                $('#fingertouchin').val("");
            }

            var speaker = $("input[type=checkbox][name=speaker]:checked").val();
            if (speaker == "yes") {
                $('#functional').html("Functional Condition");
                $('#speaker').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Charging Port not working");
                $('#speakerin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Charging Port not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#speaker').html("");
                $('#speakerin').val("");
            }

            var power = $("input[type=checkbox][name=power]:checked").val();
            if (power == "yes") {
                $('#functional').html("Functional Condition");
                $('#power').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Microphone not working");
                $('#powerin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Microphone not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#power').html("");
                $('#powerin').val("");
            }

            var charging = $("input[type=checkbox][name=charging]:checked").val();
            if (charging == "yes") {
                $('#functional').html("Functional Condition");
                $('#charging').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Battery not working");
                $('#chargingin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Battery not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#charging').html("");
                $('#chargingin').val("");
            }

            var face = $("input[type=checkbox][name=face]:checked").val();
            if (face == "yes") {
                $('#functional').html("Functional Condition");
                $('#face').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Volume Button not working");
                $('#facein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Volume Button not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#face').html("");
                $('#facein').val("");
            }

            
            var bt = $("input[type=checkbox][name=bt]:checked").val();
            if (bt == "yes") {
                $('#functional').html("Functional Condition");
                $('#bt').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bluetooth not working");
                $('#btin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bluetooth not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#bt').html("");
                $('#btin').val("");
            }

            
            var finger = $("input[type=checkbox][name=fingerprint]:checked").val();
            if (finger == "yes") {
                $('#functional').html("Functional Condition");
                $('#finger').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Finger Print not working");
                $('#fingerin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Finger Print not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#finger').html("");
                $('#fingerin').val("");
            }

            
            var gps = $("input[type=checkbox][name=gps]:checked").val();
            if (gps == "yes") {
                $('#functional').html("Functional Condition");
                $('#gps').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>GPS not working");
                $('#gpsin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>GPS not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
            } else {
                $('#functional').html("Functional Condition");
                $('#gps').html("");
                $('#gpsin').val("");
            }

            //new question start 
            var copydisplay = $("input[type=checkbox][name=copydisplay]:checked").val();
            if (copydisplay == "yes") {
                $('#functional').html("Functional Condition");
                $('#copydisplay').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Front Camera not working");
                $('#copydisplayin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Front Camera not working");
                // $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
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
        $('.functional').click(function() {
            var frontcam = $("input[type=checkbox][name=frontcam]:checked").val();
            var backcam = $("input[type=checkbox][name=backcam]:checked").val();
            var volume = $("input[type=checkbox][name=volume]:checked").val();
            var finertouch = $("input[type=checkbox][name=fingertouch]:checked").val();
            var speaker = $("input[type=checkbox][name=speaker]:checked").val();
            var power = $("input[type=checkbox][name=power]:checked").val();
            var charging = $("input[type=checkbox][name=charging]:checked").val();
            var face = $("input[type=checkbox][name=face]:checked").val();
            var copydisplay = $("input[type=checkbox][name=copydisplay]:checked").val();
            if(frontcam != "yes" && backcam != "yes" && volume != "yes" && finertouch != "yes" && speaker != "yes" && power != "yes"
              && charging != "yes" && face != "yes" && copydisplay != "yes" ){
                $('#warin').val('');
             }
        })
    });
</script>