<?php include "hideheader.php"; ?>
<?php
if (isset($_REQUEST["enid"]) && isset($_REQUEST["uid"])) {
    $enqid = $_REQUEST["enid"];
    $uid = $_REQUEST["uid"];
    $enquirydetail = mysqli_fetch_assoc(
        mysqli_query($con, "SELECT * FROM `enquiry` WHERE `id` = '$enqid' ")
    );
}
if (isset($_POST["submit"])) {
    $addtype = $_POST["addtype"];
    if ($addtype != null) {
        $updateadd = mysqli_query(
            $con,
            "INSERT INTO `address` (`enquid`,`uid`,`addressid`) VALUES('$enqid','$uid','$addtype') "
        );
        if ($updateadd) {
            echo "<script>
          window.location.href = 'appointment.php?enid='+$enqid+'&&uid='+$uid ;
        </script>";
        }
    } else {
        echo "<script>
       alert('please add address');
  </script>";
    }
}
if (isset($_POST["adadres"])) {
    $location = $_POST["location"]; // api code start
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL =>
        "https://maps.googleapis.com/maps/api/geocode/json?address=" .
            str_replace(" ", "+", $location) .
            "&key=AIzaSyB0ge8coHlvzVp2NPuc3a7-K-20c6SLSc8",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ]);
    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response);
    if (!empty($response->results[0])) {
        $latitude = $response->results[0]->geometry->location->lat;
        $longitude = $response->results[0]->geometry->location->lng;
    } else {
        $latitude = 0;
        $longitude = 0;
    } // api code end
    $flatno = $_POST["flatno"];
    $landmark = $_POST["landmark"];
    $pincode = $_POST["pincode"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $type = $_POST["type"];
    $insertquery = mysqli_query(
        $con,
        "INSERT INTO `address1` (`uid`,`location`,`flatno`,`landmark`,`pincode`,`city`,`state`,`addtype`,`latitude`,`logitude`)
      VALUES('$uid','$location','$flatno','$landmark','$pincode','$city','$state','$type','$latitude','$longitude')"
    );
    if ($insertquery) {
        echo "<script>
             window.location.href='addaddress.php?enid='+$enqid+'&&uid='+$uid;
            </script>";
    } else {
        echo '<script>
      alert(" not inserted ");
      </script>';
    }
}
?>
<section class="product-detail">
    <div class="container">
        <?php
        $selquery = mysqli_query(
            $con,
            "SELECT * FROM `address1` WHERE `uid` = '$uid' "
        );
        $row = mysqli_num_rows($selquery);
        if ($row >= 1) { ?>
        <form action="" method="post">
            <div class="row addaddress">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 uploadimage">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="upload-heading ">Address</h1>
                            <p class="sub-heading">Please add your address</p>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a href="savepayment.php?uid=<?php echo $uid; ?>&&enid=<?php echo $enqid; ?>"
                                id="adnewadress">+ Add New </a>
                        </div>
                    </div>
                    <?php while (
                            $araddress = mysqli_fetch_assoc($selquery)
                        ) { ?>
                    <div class="card">
                        <label class="radio-addr ">
                            <input type="radio" name="addtype" value="<?php echo $araddress["id"]; ?>" required>
                            <?php echo $araddress["addtype"]; ?>
                            <p class="address"><?php echo $araddress["location"]; ?>,
                                <?php echo $araddress["flatno"]; ?>,
                                <?php echo $araddress["landmark"]; ?>,
                                <?php echo $araddress["pincode"]; ?>, <?php echo $araddress["city"]; ?>,
                                <?php echo $araddress["state"]; ?></p>
                            <a href="editaddress.php?id=<?php echo $araddress["id"]; ?>&&enid=<?php echo $enqid; ?>&&uid=<?php echo $uid; ?>"
                                class=" px-2" id="deleteadd">
                                Edit </a>
                            <a href="deleteaaddress.php?id=<?php echo $araddress["id"]; ?>&&enid=<?php echo $enqid; ?>&&uid=<?php echo $uid; ?>"
                                class="mx-2 px-2" id="deleteadd"> Delete </a>
                        </label>
                    </div>
                    <?php } ?>

                </div>

                <div class="col-lg-5 col-md-5 col-sm-12 col-12 d-flex justify-content-end price-summary">
                    <div class="card">
                        <h1>Price Summary</h1>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2">
                                <p class="charges">Base Price</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2 d-flex justify-content-end">
                                <p class="rate">₹<?php echo $enquirydetail["offerprice"]; ?></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2">
                                <p class="charges">Pickup Charges</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
                                <p class="rate">Free <strike>₹100</strike></p>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2">
                                <p class="charges">Total Amount</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2 d-flex justify-content-end">
                                <p class="rate">₹<?php echo $enquirydetail["offerprice"]; ?></p>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" name="submit" class="btn contin-btn">Get Paid <i
                                    class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php } else { ?>
        <div class="tab-pane fade show active" id="tab3" role="tabpanel" aria-labelledby="Ingredients-tab">
            <form method="post">
                <div class="row">
                    <div class="col-lg-6 mx-auto add-form">
                        <!-- <div class="form-group">
                              <a class="btn btn-primary text-white" onclick="getlocation()">use my location</a>
                              <span id="output"></span>
                           </div> -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="location" placeholder="Enter Address"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="flatno"
                                placeholder="Enter flat no/ office/ floor*" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="landmark" placeholder="Land mark*" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="pin" name="pincode" placeholder="Pincode*"
                                maxlength="6" onkeyup="validateInput(event)" required>
                            <span id="error"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="city" id="citdy" placeholder="City*" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="state" id="statedy" placeholder="State*"
                                required>
                        </div>
                        <p class="save-as">Save as</p>

                        <label class="radio-inline pl-3">
                            <input type="radio" name="type" value="Home" checked> Home
                        </label>
                        <label class="radio-inline pl-3">
                            <input type="radio" name="type" value="Office"> Office
                        </label>
                        <label class="radio-inline pl-3">
                            <input type="radio" name="type" value="Other"> Other
                        </label>


                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12 d-flex justify-content-end price-summary">
                        <div class="card">
                            <h1>Price Summary</h1>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2">
                                    <p class="charges">Base Price</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2 d-flex justify-content-end">
                                    <p class="rate">₹<?php echo $enquirydetail["offerprice"]; ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2">
                                    <p class="charges">Pickup Charges</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
                                    <p class="rate">Free <strike>₹100</strike></p>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2">
                                    <p class="charges">Total Amount</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2 d-flex justify-content-end">
                                    <p class="rate">₹<?php echo $enquirydetail["offerprice"]; ?></p>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" id="sibm" name="adadres" class="btn contin-btn">Get Paid <i
                                        class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php }
        ?>
    </div>
</section>

<?php include "footer1.php"; ?>
<script>
$(document).ready(function() {
    $('#pin').change(function() {
        var pin = $('#pin').val();
        if (pin != '') {
            $.ajax({
                type: 'POST',
                url: 'pinverification.php',
                data: 'pin=' + pin,
                dataType: 'html',
                success: function(msg) {
                    var data = jQuery.parseJSON(msg);
                    if (data['error'] == "no") {
                        $('#sibm').removeAttr("disabled", "disabled");
                        $('#error').html(
                            '<p class="text-success">we are available at this location</p>'
                        );
                        $('#statedy').val(data['state']);
                        $('#citdy').val(data['city']);
                    } else {
                        $('#sibm').attr("disabled", "disabled");
                        $('#error').html(
                            '<p class="text-danger">We are currently available in Delhi NCR only</p>'
                        )
                    }
                }
            });
            //    We are currently serving in Delhi NCR
        }
    })
})
</script>
<script>
function validateInput(event) {
    var input = event.target;
    var value = input.value;
    var digitsOnly = value.replace(/\D/g, '');
    input.value = digitsOnly;
}
</script>