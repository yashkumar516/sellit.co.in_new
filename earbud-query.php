<?php include 'hideheader.php' ?>
<?php
$mid = $_REQUEST['mid'];
$bid = $_REQUEST['bid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
?>
<?php
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
?>
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h1 class="sell-header">Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span>Earbuds </h1>
            </div>
        </div>
    </div>
</section>

<section class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 px-0" id="selllimg">
                <div class="row pt-2 px-2 ">
                    <div class="col-4 text-right"><img src="admin/img/<?php echo $selectmodel['product_image'] ?>" class="img-fluid" width="75%" alt=""></div>
                    <div class="col-6">
                        <h1 class="sum-heading pt-4 "><?php echo $selectmodel['product_name'] ?></h1>
                        <p class="qty ">215+ Device Sold with us</p>
                    </div>
                </div>
                <hr>
                <div class="device px-3">
                    <h1 class="sum-heading ">Device Evaluation</h1>
                    <p id="devicedetail"></p>
                    <p id="call"></p>
                    <p id="screen"></p>
                    <p id="body"></p>
                    <p id="war"></p>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="" method="post" name="form">
                    <div class="questionborder">
                        <h1 class="pro-det">Tell us a few things about your device!</h1>
                        <h1 class="ques">1. Does the Earbuds switch on?</h1>
                        <p class="check">We currently only accept devices that switch on</p>
                        <div class="row pl-4" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggle-on" class="call" name="call" type="radio" value="yes" required><label for="toggle-on">Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggle-off" class="call" name="call" type="radio" value="no" required><label for="toggle-off">No</label></div>
                        </div>
                        <h1 class="ques">2. Are there any speaker/mic issues in your device?</h1>
                        <p class="check">Check your device for issues like voice cracks, faulty speakers, faint sounds</p>
                        <div class="row pl-4" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggle2-on" class="screen" name="screen" type="radio" value="yes" required><label for="toggle2-on">Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggle2-off" class="screen" name="screen" type="radio" value="no" required><label for="toggle2-off">No</label></div>
                        </div>
                        <h1 class="ques">3. Are there any connectivity issues in your device?</h1>
                        <p class="check">Check your device's bluetooth connectivity for both left and right earbuds</p>
                        <div class="row pl-4" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggle3-on" class="body" name="body" type="radio" value="yes" required><label for="toggle3-on">Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggle3-off" class="body" name="body" type="radio" value="no" required><label for="toggle3-off">No</label></div>
                        </div>
                        <h1 class="ques">4. Are there any physical issues on your device?</h1>
                        <p class="check"> Check your device's charging case, body and buttons' condition carefully</p>
                        <div class="row pl-4 warrrrr" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggle4-on" class="war" name="war" type="radio" value="yes" required><label for="toggle4-on">Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggl-war" class="war" name="war" type="radio" value="no" required><label for="toggl-war">No</label></div>
                        </div>
                        <div class="text-center mt-3">
                            <input type="hidden" id="callin" name="callin" value="">
                            <input type="hidden" id="screenin" name="screenin" value="">
                            <input type="hidden" id="bodyin" name="bodyin" value="">
                            <input type="hidden" id="warin" name="warin">
                             <input type="hidden" id="warrenty" name="warrenty" >
                            <input type="hidden" name="devicedetail" value="Device Details">
                            <button class="btn contin-btn submit" type="submit" name="query" disabled="disabled" id="postGender">Continue <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <!-- calculation start -->
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
            var mid = $("#mid").val();
            var bid = $("#bid").val();
            var war = $("input[type=radio][name=war]:checked").val();
            if (war == "yes") {
                document.form.action = "earpodecondition.php?mid=" + mid + "&&bid=" + bid;
            }else{
                document.form.action = "earpodeage.php?mid=" + mid + "&&bid=" + bid;
            }

        })
    })
</script>
<script>
    $(document).ready(function() {
        //    call start
        $('.call').click(function() {
            var call = $("input[type=radio][name=call]:checked").val();
            if (call == "yes") {
                $('#devicedetail').html("Device Details");
                $('#call').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To switch on");
                $('#callin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To switch on");
            } else if (call == "no") {
                $('#devicedetail').html("Device Details");
                $('#call').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To switch on");
                $('#callin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To switch on");
                $('#warrenty').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty");
            }
        })
        // screen start
        $('.screen').click(function() {
            var screenvalue = $("input[type=radio][name=screen]:checked").val();
            if (screenvalue == "yes") {
                $('#screen').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>issues in speaker/mic");
                $('#screenin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>issues in speaker/mic");
                $('#warrenty').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty");
            } else if (screenvalue == "no") {
                $('#screen').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no issues in speaker/mic");
                $('#screenin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no issues in speaker/mic");
            }
        })
        // body start
        $('.body').click(function() {
            var body = $("input[type=radio][name=body]:checked").val();
            if (body == "yes") {
                $('#body').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>issues in connectivity");
                $('#bodyin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>issues in connectivity");
                $('#warrenty').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty");
            } else if (body == "no") {
                $('#body').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no issues in connectivity");
                $('#bodyin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no issues in connectivity");
            }
        })
        // warrenty start
        $('.war').click(function() {
            var war = $("input[type=radio][name=war]:checked").val();
            if (war == "yes") {
                $('#war').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>physical issues");
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>physical issues");
            } else if (war == "no") {
                $('#war').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no physical issues");
                $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no physical issues");
            }
        })
    });
</script>