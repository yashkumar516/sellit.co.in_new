<?php include 'header.php' ?>
<?php
include 'include/mobileage1.php';
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
          <p id="devicedetail"><?php echo  $devicedetail ?></p>
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
          <p id="mobage"></p>
          <p id="age"></p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 mobileage">
        <p class="ques">What is your Mobile age?</p>
        <form action="functional.php?vid=<?php echo $vid ?>&&bid=<?php echo $bid ?>&&mid=<?php echo $mid ?>" method="post">
          <div class="container-fluid" >
            <div class="row pt-1">
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle1" >
                  <input id="toggle1" name="war" class="war" value="under3" type="radio" required>
                  <span>Below 3 Months</span>
                </label>
              

              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle2" >
                  <input id="toggle2" name="war" class="war" value="under6" type="radio" required>
                  <span>3 to 6 Months</span>
                </label>
             

              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle3" >
                  <input id="toggle3" name="war" class="war" value="under11" type="radio" required>
                  <span>6 to 11 Months</span>
                </label>
               

              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle4" >
                  <input id="toggle4" name="war" class="war" value="above11" type="radio" required>
                  <span>Above 11 Months</span>
                </label>
               

              </div>
              </div>
            </div>
       
          <div class="text-center mt-4">
            <input type="hidden" id="callin" name="callin" value="<?php echo $call ?>">
            <input type="hidden" id="screenin" name="screenin" value="<?php echo $screen ?>">
            <input type="hidden" id="bodyin" name="bodyin" value="<?php echo $body ?>">
            <input type="hidden" id="warin" name="warin">
            <input type="hidden" name="devicedetail" value="Device Details">
            <input type="hidden" id="touchin" name="touch" value="<?php echo $touch ?>">
            <input type="hidden" id="spotin" name="spot" value="<?php echo $spot ?>">
            <input type="hidden" id="linesin" name="lines" value="<?php echo $lines ?>">
            <input type="hidden" id="physicalin" name="physical" value="<?php echo $physical ?>">
            <input type="hidden" id="screencondition" name="screencondition" value="<?php echo $screencondition ?>">
            <input type="hidden" id="Scratchesin" name="Scratches" value="<?php echo $Scratches ?>">
            <input type="hidden" id="dentsin" name="dents" value="<?php echo $dents ?>">
            <input type="hidden" id="sidein" name="side" value="<?php echo $side ?>">
            <input type="hidden" id="bentin" name="bent" value="<?php echo $bents ?>">
            <input type="hidden" id="overallcondition" name="overallcondition" value="<?php echo $overallcondition ?>">
            <!-- mobileage start -->
            <input type="hidden" id="mobagein" name="mobage" value="Mobile Age">
            <input type="hidden" id="agein" name="age" value="">
            <button class="btn contin-btn" name="questions">Continue <i class="fas fa-arrow-right"></i></button>
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
        $('#mobage').html("Mobile Age");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months");
        $('#war').html('<?php echo $war ?>');
      } else if (war == "under6") {
        $('#mobage').html("Mobile Age");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months");
        $('#war').html('<?php echo $war ?>');
      } else if (war == "under11") {
        $('#mobage').html("Mobile Age");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months");
        $('#war').html('<?php echo $war ?>');
      } else if (war == "above11") {
        $('#mobage').html("Mobile Age");
        $('#war').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months");
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('.war').click(function() {
      var warrenty = $('#war').html();
      $("#warin").val(warrenty);
    })
  });
</script>