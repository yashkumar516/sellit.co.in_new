<?php include 'hideheader.php' ?>
<?php
include 'include/functional2.php';
$vid = $_REQUEST['vid'];
$bid = $_REQUEST['bid'];
$mid = $_REQUEST['mid'];
$selectModel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
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
                    <p id="functionalHtml" class="mt-2 title"></p>
                    <p id="copydisplayHtml"></p>
                    <p id="frontcamHtml"></p>
                    <p id="backcamHtml"></p>
                    <p id="volumeHtml"></p>
                    <p id="fingertouchHtml"></p>
                    <p id="speakerHtml"></p>
                    <p id="powerv"></p>
                    <p id="chargingHtml"></p>
                    <p id="faceHtml"></p>
                    <p id="audioHtml"></p>
                    <p id="camglassHtml"></p>
                    <p id="wifiHtml"></p>
                    <p id="silentHtml"></p>
                    <p id="batteryHtml"></p>
                    <p id="bluetoothHtml"></p>
                    <p id="vibrateHtml"></p>
                    <p id="microHtml"></p>

                </div>
            </div>
            <div class="col-lg-7 fun">
                <div class="card">
                    <h1 class="pro-det">Functional or Physical Problems</h1>
                    <!-- <form action="haveitem.php?vid=<?php echo $vid ?>&&bid=<?php echo $bid ?>&&mid=<?php echo $mid ?>"
                        method="post"> -->
                    <form action="" method="post" name="form" id="myForm">

                        <div class="row ">
                            <!-- new question start -->
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle0" class="functional" name="copydisplay" type="checkbox" value="yes"
                                    <?php echo $copydisplay === "yes" ? 'checked="checked"' : ''; ?>>
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
                                <input id="toggle1" class="functional" name="frontcam" type="checkbox" value="yes"
                                    <?php echo $frontcam === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle1">
                                    <img src="assets/images/functional/1.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Front Camera not working</p>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle2" class="functional" name="backcam" type="checkbox" value="yes"
                                    <?php echo $backcam === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle2">
                                    <img src="assets/images/functional/2.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Back Camera not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle3" class="functional" name="volume" type="checkbox" value="yes"
                                    <?php echo $volume === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle3">
                                    <img src="assets/images/functional/3.jpg" class="img-fluid" alt="">
                                    <div class=functional>
                                        <p class="text-center">Volume Button not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle4" class="functional" name="fingertouch" type="checkbox" value="yes"
                                    <?php echo $fingertouch === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle4">
                                    <img src="assets/images/functional/4.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Finger Touch not working</p>
                                    </div>
                                </label>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle5" class="functional" name="speaker" type="checkbox" value="yes"
                                    <?php echo $speaker === "yes" ? 'checked="checked"' : ''; ?>>
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
                                <input id="toggle6" class="functional" name="power" type="checkbox" value="yes"
                                    <?php echo $power === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle6">
                                    <img src="assets/images/functional/6.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Power Button not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle7" class="functional" name="charging" type="checkbox" value="yes"
                                    <?php echo $charging === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle7">
                                    <img src="assets/images/functional/7.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Charging Port not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle8" class="functional" name="face" type="checkbox" value="yes"
                                    <?php echo $face === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle8">
                                    <img src="assets/images/functional/8.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Face Sensor not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle9" class="functional" name="audio" type="checkbox" value="yes"
                                    <?php echo $audio === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle9">
                                    <img src="assets/images/functional/9.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Audio Receiver not working</p>
                                    </div>

                                </label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle10" class="functional" name="camglass" type="checkbox" value="yes"
                                    <?php echo $camglass === "yes" ? 'checked="checked"' : ''; ?>>
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
                                <input id="toggle11" class="functional" name="wifi" type="checkbox" value="yes"
                                    <?php echo $wifi === "yes" ? 'checked="checked"' : ''; ?>>
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
                                <input id="toggle12" class="functional" name="silent" type="checkbox" value="yes"
                                    <?php echo $silent === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle12">
                                    <img src="assets/images/functional/12.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Silent Button not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle13" class="functional" name="battery" type="checkbox" value="yes"
                                    <?php echo $battery === "yes" ? 'checked="checked"' : ''; ?>>
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
                                <input id="toggle14" class="functional" name="bluetooth" type="checkbox" value="yes"
                                    <?php echo $bluetooth === "yes" ? 'checked="checked"' : ''; ?>>
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
                                <input id="toggle15" class="functional" name="vibrate" type="checkbox" value="yes"
                                    <?php echo $vibrate === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle15">
                                    <img src="assets/images/functional/15.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Vibrator is not working</p>
                                    </div>
                                </label>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 fun-col">
                                <input id="toggle16" class="functional" name="micro" type="checkbox" value="yes"
                                    <?php echo $micro === "yes" ? 'checked="checked"' : ''; ?>>
                                <label for="toggle16">
                                    <img src="assets/images/functional/16.jpg" class="img-fluid" alt="">
                                    <div class="functional">
                                        <p class="text-center">Microphone not working</p>
                                    </div>
                                </label>

                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <input type="hidden" id="war" name="war">
                            <input type="hidden" id="warin" name="warin">
                            <!-- mobile age  -->
                            <!-- <input type="hidden" id="mobagein" name="mobage" value="<?php echo $mobage ?>">
                            <input type="hidden" id="agein" name="age" value="<?php echo $age ?>"> -->
                            <!-- functional start -->
                            <input type="hidden" id="functional" name="functional" value="Functional Condition">
                            <input type="hidden" id="copydisplay" name="copydisplay" value="">
                            <input type="hidden" id="copydisplayin" name="copydisplayin" value="">
                            <input type="hidden" id="frontcam" name="frontcam" value="">
                            <input type="hidden" id="frontcamin" name="frontcamin" value="">
                            <input type="hidden" id="backcam" name="backcam" value="">
                            <input type="hidden" id="backcamin" name="backcamin" value="">
                            <input type="hidden" id="volume" name="volume" value="">
                            <input type="hidden" id="volumein" name="volumein" value="">
                            <input type="hidden" id="fingertouch" name="fingertouch" value="">
                            <input type="hidden" id="fingertouchin" name="fingertouchin" value="">
                            <input type="hidden" id="speaker" name="speaker" value="">
                            <input type="hidden" id="speakerin" name="speakerin" value="">
                            <input type="hidden" id="power" name="power" value="">
                            <input type="hidden" id="powerin" name="powerin" value="">
                            <input type="hidden" id="charging" name="charging" value="">
                            <input type="hidden" id="chargingin" name="chargingin" value="">
                            <input type="hidden" id="face" name="face" value="">
                            <input type="hidden" id="facein" name="facein" value="">
                            <input type="hidden" id="audio" name="audio" value="">
                            <input type="hidden" id="audioin" name="audioin" value="">
                            <input type="hidden" id="camglass" name="camglass" value="">
                            <input type="hidden" id="camglassin" name="camglassin" value="">
                            <input type="hidden" id="wifi" name="wifi" value="">
                            <input type="hidden" id="wifiin" name="wifiin" value="">
                            <input type="hidden" id="silent" name="silent" value="">
                            <input type="hidden" id="silentin" name="silentin" value="">
                            <input type="hidden" id="battery" name="battery" value="">
                            <input type="hidden" id="batteryin" name="batteryin" value="">
                            <input type="hidden" id="bluetooth" name="bluetooth" value="">
                            <input type="hidden" id="bluetoothin" name="bluetoothin" value="">
                            <input type="hidden" id="vibrate" name="vibrate" value="">
                            <input type="hidden" id="vibratein" name="vibratein" value="">
                            <input type="hidden" id="micro" name="micro" value="">
                            <input type="hidden" id="microin" name="microin" value="">
                            <button class="btn contin-btn" type="submit" name="questions">Continue <i
                                    class="fas fa-arrow-right"></i></button>
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
        formData["page"] = "functionalPage";
        // Display the form data
        console.log(formData);
        $.ajax({
            type: "POST",
            url: "session/set_session_all_question.php", // Replace with the path to your PHP script
            data: formData,
            success: function(response) {
                // Handle success response if needed
                console.log({
                    response
                });
                // window.location.href = "functional.php?vid=" + vid + "&mid=" + mid + "&bid=" + bid;
                window.location.replace(
                    "haveitem.php?vid=<?php echo $vid ?>&bid=<?php echo $bid ?>&mid=<?php echo $mid ?>"
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
    console.log("--------------------copydisplay-------------");
    const iconString =
        "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;'></i>"
    // Scratches start
    function outOfWarranty() {

        $('#warHtml').html(
            iconString + "Mobile Out of Warranty"
        );
        $('#warin').val(
            iconString + "Mobile Out of Warranty"
        );
        $('#war').val("no");
    }

    function setOnClickValue(id, value, htmlValue) {
        $('#functionalHtml').html("Functional Condition");
        $(`#${id}Html`).html(
            htmlValue !== "" ? `${iconString} ${htmlValue}` : ""
        );
        $(`#${id}in`).val(
            htmlValue !== "" ? `${iconString} ${htmlValue}` : ""
        );
        $(`#${id}`).val(value);
    }

    function CheckedInput() {
        var frontcam = $("input[type=checkbox][name=frontcam]:checked").val();
        if (frontcam == "yes") {
            setOnClickValue("frontcam", "yes", "Front Camera not working");
            outOfWarranty();
        } else {
            setOnClickValue("frontcam", "", "");
        }

        var backcam = $("input[type=checkbox][name=backcam]:checked").val();
        if (backcam == "yes") {
            setOnClickValue("backcam", "yes", "Back Camera not working");
            outOfWarranty();
        } else {
            setOnClickValue("backcam", "", "");
        }

        var volume = $("input[type=checkbox][name=volume]:checked").val();
        if (volume == "yes") {
            setOnClickValue("volume", "yes", "Volume Button not working");
            outOfWarranty();
        } else {
            setOnClickValue("volume", "", "");
        }

        var fingertouch = $("input[type=checkbox][name=fingertouch]:checked").val();
        if (fingertouch == "yes") {
            setOnClickValue("fingertouch", "yes", "Finger Touch not working");
            outOfWarranty();
        } else {
            setOnClickValue("fingertouch", "", "");
        }

        var speaker = $("input[type=checkbox][name=speaker]:checked").val();
        if (speaker == "yes") {
            setOnClickValue("speaker", "yes", "Speaker not working");
            outOfWarranty();
        } else {
            setOnClickValue("speaker", "", "");
        }

        var power = $("input[type=checkbox][name=power]:checked").val();
        if (power == "yes") {
            setOnClickValue("power", "yes", "Power Button not working");
            outOfWarranty();
        } else {
            setOnClickValue("power", "", "");
        }

        var charging = $("input[type=checkbox][name=charging]:checked").val();
        if (charging == "yes") {
            setOnClickValue("charging", "yes", "Charging Port not working");
            outOfWarranty();
        } else {
            setOnClickValue("charging", "", "");
        }

        var face = $("input[type=checkbox][name=face]:checked").val();
        if (face == "yes") {
            setOnClickValue("face", "yes", "Face Sensor not working");
            outOfWarranty();
        } else {
            setOnClickValue("face", "", "");
        }
        var audio = $("input[type=checkbox][name=audio]:checked").val();
        if (audio == "yes") {
            setOnClickValue("audio", "yes", "Audio Receiver not working");
            outOfWarranty();
        } else {
            setOnClickValue("audio", "", "");
        }

        var camglass = $("input[type=checkbox][name=camglass]:checked").val();
        if (camglass == "yes") {
            setOnClickValue("camglass", "yes", "Camera Glass Broken");
            outOfWarranty();
        } else {
            setOnClickValue("camglass", "", "");
        }

        var wifi = $("input[type=checkbox][name=wifi]:checked").val();
        if (wifi == "yes") {
            setOnClickValue("wifi", "yes", "WiFi not working");
            outOfWarranty();
        } else {
            setOnClickValue("wifi", "", "");
        }

        var silent = $("input[type=checkbox][name=silent]:checked").val();
        if (silent == "yes") {
            setOnClickValue("silent", "yes", "Silent Button not working");
            outOfWarranty();
        } else {
            setOnClickValue("silent", "", "");
        }

        var battery = $("input[type=checkbox][name=battery]:checked").val();
        if (battery == "yes") {
            setOnClickValue("battery", "yes", "Battery not working");
            outOfWarranty();
        } else {
            setOnClickValue("battery", "", "");
        }

        var bluetooth = $("input[type=checkbox][name=bluetooth]:checked").val();
        if (bluetooth == "yes") {
            setOnClickValue("bluetooth", "yes", "Bluetooth not working");
            outOfWarranty();
        } else {
            setOnClickValue("bluetooth", "", "");
        }

        var vibrate = $("input[type=checkbox][name=vibrate]:checked").val();
        if (vibrate == "yes") {
            setOnClickValue("vibrate", "yes", "Vibrator is not working");
            outOfWarranty();
        } else {
            setOnClickValue("vibrate", "", "");
        }

        var micro = $("input[type=checkbox][name=micro]:checked").val();
        if (micro == "yes") {
            setOnClickValue("micro", "yes", "Microphone is not working");
            outOfWarranty();
        } else {
            setOnClickValue("micro", "", "");
        }

        //new question start 
        var copydisplay = $("input[type=checkbox][name=copydisplay]:checked").val();
        if (copydisplay == "yes") {
            setOnClickValue("copydisplay", "yes", "Copy Display");
            outOfWarranty();
        } else {
            setOnClickValue("copydisplay", "", "");
        }

        if (frontcam != "yes" && backcam != "yes" && volume != "yes" && fingertouch != "yes" &&
            speaker != "yes" && power != "yes" && charging != "yes" && face != "yes" && audio !=
            "yes" && camglass != "yes" &&
            wifi != "yes" && silent != "yes" && battery != "yes" && bluetooth != "yes" && vibrate !=
            "yes" && micro != "yes" && copydisplay != "yes") {

            var warintyValue = "<?php echo $war ?>";

            var warinValue = iconString + "Mobile Out of Warranty"
            if (warintyValue === "yes") {
                var warinValue = iconString + "Mobile Under Warranty"
            }
            $('#warHtml').html(warinValue);
            $('#war').val("<?php echo $war ?>");
            $('#warin').val(warinValue);
            console.log("all false", "<?php echo $war ?>", warinValue)
        }
        //new question end


    }

    $('.functional').click(function() {
        CheckedInput()
    });
    $('.functional').ready(function() {
        console.log("--------------------functional-------------");
        CheckedInput()
    });
});
</script>

<script>
$(document).ready(function() {

    var $warrenty = $('#warHtml').html();
    $("#warin").val($warrenty);
    $("#war").val("<?php echo $war; ?>");
});
</script>

<script>
$(document).ready(function() {

    const iconString =
        "<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;'></i>"
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
        if (frontcam != "yes" && backcam != "yes" && volume != "yes" && finertouch != "yes" &&
            speaker != "yes" && power != "yes" && charging != "yes" && face != "yes" && audio !=
            "yes" && camglass != "yes" &&
            wifi != "yes" && silent != "yes" && battery != "yes" && bluetooth != "yes" && vibrate !=
            "yes" && micro != "yes" && copydisplay != "yes") {

            var warintyValue = "<?php echo $war ?>";

            var warinValue = iconString + "Mobile Out of Warranty"
            if (warintyValue === "yes") {
                var warinValue = iconString + "Mobile Under Warranty"
            }
            $('#warHtml').html(warinValue);
            $('#war').val("<?php echo $war ?>");
            $('#warin').val(warinValue);
        }

    })
    $('.functional').ready(function() {
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
        if (frontcam != "yes" && backcam != "yes" && volume != "yes" && finertouch != "yes" &&
            speaker != "yes" && power != "yes" && charging != "yes" && face != "yes" && audio !=
            "yes" && camglass != "yes" &&
            wifi != "yes" && silent != "yes" && battery != "yes" && bluetooth != "yes" && vibrate !=
            "yes" && micro != "yes" && copydisplay != "yes") {

            var warintyValue = "<?php echo $war ?>";

            var warinValue = iconString + "Mobile Out of Warranty"
            if (warintyValue === "yes") {
                var warinValue = iconString + "Mobile Under Warranty"
            }
            $('#warHtml').html(warinValue);
            $('#war').val("<?php echo $war ?>");
            $('#warin').val(warinValue);
        }

    })
});
</script>