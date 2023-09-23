<?php include 'hideheader.php' ?>
<?php
$bid = $_REQUEST['bid'];
$mid = $_REQUEST['mid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
if(isset($_POST['query'])){
    $speaker = $_POST['screenin'];
    $connectivity = $_POST['bodyin'];
    $switch = $_POST['callin'];
    $physicalissue = $_POST['warin']; 
    $warrenty = $_POST['warrenty']; 
}
?>
<section class="sell-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h1 class="sell-header">Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span>Earbuds</h1>
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
          <p id="watchcondion"></p>
          <p id="condition"></p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 mobileage">
        <p class="ques">What is your Mobile age?</p>
        <form action="earpodeage.php?bid=<?php echo $bid ?>&&mid=<?php echo $mid ?>" method="post">

          <div class="card">
            <div class="row mx-auto pt-1">

              <div class="col-lg-5 col-md-5 col-sm-5 col-5 mobileage-col py-2">
                <label for="toggle1" class="px-2">
                  <input id="toggle1" name="war" class="war" value="flawless" type="radio" required>
                  <span>Flawless</span>
                  <ul id="conditionwatch">
                  <li>Looks Like Brand New</li>
                  <li>No Imperfections!</li>
                  </ul>
                </label>
                

              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-5 mobileage-col py-2">
                <label for="toggle2" class="px-2">
                  <input id="toggle2" name="war" class="war" value="good" type="radio" required>
                  <span>Good</span>
                  <ul id="conditionwatch">
                  <li>Minor Scratches</li>
                  <li>Normal signs of usage </li>
                  <li>No dents or bent on Corners</li>
                  </ul>
                </label>
              

              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-5 mobileage-col py-2">
                <label for="toggle3" class="px-2">
                  <input id="toggle3" name="war" class="war" value="averege" type="radio" required>
                  <span>Averege</span>
                  <ul id="conditionwatch">
                  <li>Moderate to heavy scratches</li>
                  <li>Slight wear,dent</li>
                  </ul>
                </label>
               
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-5 mobileage-col py-2">
                <label for="toggle4" class="px-2">
                  <input id="toggle4" name="war" class="war" value="below averege" type="radio" required>
                  <span>Below Averege</span>
                  <ul id="conditionwatch">
                  <li>Deep scratches</li>
                  <li>major dents or warping </li>
                  <li>Glass Broken </li>
                  </ul>
                </label>
              </div>

            </div>
          </div>
          <div class="text-center mt-4">
          <input type="hidden" id="callin" name="callin" value="<?= $switch ?>">
          <input type="hidden" id="screenin" name="screenin" value="<?= $speaker ?>">
          <input type="hidden" id="bodyin" name="bodyin" value="<?= $connectivity ?>">
          <input type="hidden" id="warin" name="warin" value="<?= $physicalissue ?>">
          <input type="hidden" id="warrenty" name="warrenty" value="<?= $warrenty ?>">
          <input type="hidden" id="conditionin" name="condition" value="">
          <button class="btn contin-btn" name="earbudage">Continue <i class="fas fa-arrow-right"></i></button>
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
      if (war == "flawless") {
        $('#watchcondion').html("Earbud Condition");
        $('#condition').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>flawless");
        $('#conditionin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>flawless");
        // $('#war').html('<php echo $war ?>');
      } else if (war == "good") {
        $('#watchcondion').html("Earbud Condition");
        $('#condition').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>good");
        $('#conditionin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>good");
        // $('#war').html('<php echo $war ?>');
      } else if (war == "averege") {
        $('#watchcondion').html("Earbud Condition");
        $('#warrenty').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty");
        $('#condition').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>averege");
        $('#conditionin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>averege");
        // $('#war').html('<php echo $war ?>');
      } else if (war == "below averege") {
        $('#watchcondion').html("Earbud Condition");
        $('#warrenty').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty");
        $('#condition').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>below averege");
        $('#conditionin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>below averege");
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