<?php include 'header.php' ?>
<?php
include 'include/earpodeage1.php';
$bid = $_REQUEST['bid'];
$mid = $_REQUEST['mid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
?>
<section class="sell-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h1 class="sell-header">Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span> Earbuds</h1>
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
          <p id="devicedetail">Device Details</p>
          <p id="call"><?= $switch ?></p>
          <p id="screen"><?= $speaker ?></p>
          <p id="body"><?= $connectivity ?></p>
          <p id="war"><?= $physicalissue ?></p>
          <p id="watchcondion">Earbud Condition</p>
          <p id="condition"><?= $condition ?></p>
          <p id="mobage"></p>
          <p id="age"></p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 mobileage">
        <p class="ques">What is your Earbuds age?</p>
        <form action="erabudacceseries.php?bid=<?php echo $bid ?>&&mid=<?php echo $mid ?>" method="post">

            <div class="row mx-auto pt-1">

              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle1" class="px-2">
                  <input id="toggle1" name="eage" class="war" value="under3" type="radio" required>
                   <span>Below 3 Months</span>
                </label>
               

              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle2" class="px-2">
                  <input id="toggle2" name="eage" class="war" value="under6" type="radio" required>
                  <span>3 to 6 Months</span>
                </label>
                

              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle3" class="px-2">
                  <input id="toggle3" name="eage" class="war" value="under11" type="radio" required>
                   <span>6 to 11 Months</span>
                </label>
               

              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-12 mobileage-col pt-2">
                <label for="toggle4" class="px-2">
                  <input id="toggle4" name="eage" class="war" value="above11" type="radio" required>
                  <span>Above 11 Months</span>
                </label>
                

              </div>

            </div>
        
          <div class="text-center mt-4">
            <!-- mobileage start -->
          <input type="hidden" id="callin" name="callin" value="<?= $switch ?>">
          <input type="hidden" id="screenin" name="screenin" value="<?= $speaker ?>">
          <input type="hidden" id="bodyin" name="bodyin" value="<?= $connectivity ?>">
          <input type="hidden" id="warin" name="warin" value="<?= $physicalissue ?>">
          <input type="hidden" id="warrenty" name="warrenty" value="<?= $warrenty ?>">
          <input type="hidden" id="conditionin" name="condition" value="<?= $condition ?>">
          <input type="hidden" id="agein" name="age" value="">
          <button class="btn contin-btn" name="earage">Continue <i class="fas fa-arrow-right"></i></button>
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

      var war = $("input[type=radio][name=eage]:checked").val();
      if (war == "under3") {
        $('#mobage').html("Earbud Age");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Under 3 Months");
        $('#war').html('');
      } else if (war == "under6") {
        $('#mobage').html("Earbud Age");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>3 To 6 Months");
        $('#war').html('');
      } else if (war == "under11") {
        $('#mobage').html("Earbud Age");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>6 To 11 Months");
        $('#warrenty').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty");
      } else if (war == "above11") {
        $('#mobage').html("Earbud Age");
        $('#warrenty').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty");
        $('#age').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months");
        $('#agein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Above 11 Months");
      }
    });
  });
</script>



