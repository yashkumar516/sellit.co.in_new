<?php include 'header.php' ?>
<?php
$bid = $_REQUEST['bid'];
$mid = $_REQUEST['mid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
if(isset($_POST['functionquestions'])){
  $switch  = $_POST['switch'];
  $touchscreen = $_POST['touchscreen'];
  $battery = $_POST['battery'];
  $wifi = $_POST['wifi'];
  $speaker = $_POST['speaker'];
  $charging = $_POST['charging'];
  $dc = $_POST['dc'];
  $button = $_POST['button'];
  $optical = $_POST['optical'];
  $bluetooth = $_POST['bluetooth'];
  $war = $_POST['warin'];
//   new
  $bt = $_POST['bt'];
  $finger = $_POST['finger'];
  $gps = $_POST['gps'];
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
      <div class="col-lg-6 px-0" id="selllimg">
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
          <p id="devicedetail">Does the watch Switch On?</p>
                    <p id="call"><?php echo $switch ?></p>
                    <!-- functional start -->
                    <p id="functional">Functional Condition</p>
                    <p id="copydisplay"><?php echo $optical ?></p>
                    <p id="frontcam"><?php echo $touchscreen ?></p>
                    <p id="backcam"><?php echo $battery ?></p>
                    <p id="volume"><?php echo $wifi ?></p>
                    <p id="fingertouch"><?php echo $speaker ?></p>
                    <p id="speaker"><?php echo $charging ?></p>
                    <p id="power"><?php echo $dc ?></p>
                    <p id="charging"><?php echo $button ?></p>
                    <p id="face"><?php echo $bluetooth ?></p>
                    <p id="finger"><?php echo $finger ?></p>
                    <p id="bt"><?php echo $bt ?></p>
                    <p id="gps"><?php echo $gps ?></p>
          <!-- warrent strt -->
          <p id="mobage"></p>
          <p id="age"></p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 mobileage">
        <p class="ques">What is your Mobile age?</p>
        <form action="tablescreencondition.php?bid=<?php echo $bid ?>&&mid=<?php echo $mid ?>" method="post">
      
            <div class="row mx-auto pt-1">
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle1" class="px-2">
                  <input id="toggle1" name="war" class="war" value="under3" type="radio" required>
                  <span>Below 3 Months</span>
                </label>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle2" class="px-2">
                  <input id="toggle2" name="war" class="war" value="under6" type="radio" required>
                  <span>3 to 6 Months</span>
                </label>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle3" class="px-2">
                  <input id="toggle3" name="war" class="war" value="under11" type="radio" required>
                  <span>6 to 11 Months</span>
                </label>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle4" class="px-2">
                  <input id="toggle4" name="war" class="war" value="above11" type="radio" required>
                  <span>Above 11 Months</span>
                </label>
              </div>

            </div>
   
          <div class="text-center mt-4">
          <input type="hidden" id="callin" name="switch" value="<?php echo $switch ?>">
                            <!-- functional start -->
                            <!-- <input type="hidden" id="warin" name="warin"> -->
                            <input type="hidden" id="copydisplayin" name="touchscreen" value="<?php echo $touchscreen ?>">
                            <input type="hidden" id="frontcamin" name="battery" value="<?php echo $battery ?>">
                            <input type="hidden" id="backcamin" name="wifi" value="<?php echo $wifi ?>">
                            <input type="hidden" id="volumein" name="speaker" value="<?php echo $speaker ?>">
                            <input type="hidden" id="fingertouchin" name="charging" value="<?php echo $charging ?>">
                            <input type="hidden" id="speakerin" name="dc" value="<?php echo $dc ?>">
                            <input type="hidden" id="powerin" name="button" value="<?php echo $button ?>">
                            <input type="hidden" id="chargingin" name="optical" value="<?php echo $optical ?>">
                            <input type="hidden" id="facein" name="bluetooth" value="<?php echo $bluetooth ?>">
                            <input type="hidden" id="btin" name="bt" value="<?php echo $bt ?>">
                            <input type="hidden" id="fingerin" name="finger" value="<?php echo $finger ?>">
                            <input type="hidden" id="gpsin" name="gps" value="<?php echo $gps ?>">
                            <input type="hidden" id="warin" name="warin" value="<?php echo $war ?>">
            <!-- mobileage start -->
            <input type="hidden" id="agein" name="age" value="">
            <button class="btn contin-btn" name="watchage">Continue <i class="fas fa-arrow-right"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include 'footer1.php' ?>
<script>
  $(document).ready(function() {
    $(".war").click(function() {

      var war = $("input[type=radio][name=war]:checked").val();
      if (war == "under3") {
        $('#mobage').html("Watch Age");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months");
        // $('#war').html('<php echo $war ?>');
      } else if (war == "under6") {
        $('#mobage').html("Watch Age");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months");
        // $('#war').html('<php echo $war ?>');
      } else if (war == "under11") {
        $('#mobage').html("Watch Age");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months");
        // $('#war').html('<php echo $war ?>');
      } else if (war == "above11") {
        $('#mobage').html("Watch Age");
        $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months");
      }
    });
  });
</script>
<!-- <script>
  $(document).ready(function() {
    $('.war').click(function() {
      var warrenty = $('#war').html();
      $("#warin").val(warrenty);
    })
  });
</script> -->