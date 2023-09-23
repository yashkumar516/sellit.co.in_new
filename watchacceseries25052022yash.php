
<?php include 'hideheader.php' ?>
<?php 
$bid = $_REQUEST['bid'];
$mid = $_REQUEST['mid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$mid' "));
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
include 'include/calculationen.php';
if(isset($_POST['watchage'])){
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
    $watchage = $_POST['age'];
    $condition = $_POST['condition'];
    $war = $_POST['warin'];
  }
?>
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="sell-header">Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span>Watch </h1>
            </div>   
           
        </div>
    </div>
</section>
<section class="product-detail">
    <div class="container">
        <div class="row">
        <div class="col-lg-5 px-0" id="selllimg">
                <div class="row pt-2 px-2 ">
                    <div class="col-4 text-right"> <img src="admin/img/<?php echo $selectmodel['product_image'] ?>" class="img-fluid" width="75%"  alt=""></div>
                    <div class="col-6"> 
                      <h1 class="sum-heading pt-4 "><?php echo $selectmodel['product_name'] ?></h1>
                      <p class="qty ">215+ Device Sold with us</p>
                      </div>
                </div>
                <hr>
                <div class="device px-3" >
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
                    <p id="mobage">Watch Age</p>
                    <p id="age"><?php echo $watchage ?></p>
                    <p id="watchcondion">Watch Condition</p>
                    <p id="condition"><?php echo $condition ?></p>
                <!-- accesiers start -->
                    <p id="dohave"></p>
                    <p id="charger"></p>
                    <p id="earphone" ></p>
                    <p id="boximei"></p>
                    <p id="billimei"></p>
                </div>
            </div>
            <div class="col-lg-6 haveitem mx-uto">
                <div class="card">
                <p class="ques">Do you have the following?</p>
       
                    <div class="row ">
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                          <input id="toggle1" class="acceseries" name="charger" type="checkbox" value="yes">
                          <label for="toggle1">
                                <img src="assets/images/item/1.jpg"  class="img-fluid" alt="">
                                <div class="radi-text">
                                    <p class="text-center">Charger</p>
                                </div>
    
                            </label>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                              <input id="toggle2" class="acceseries" name="earphone" type="checkbox" value="yes">
                              <label for="toggle2">
                                  <img src="assets/images/item/3.jpg"  class="img-fluid" alt="">
                                  <div class="radi-text">
                                      <p class="text-center">Strap</p>
                                </div>
                            </label>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                              <input id="toggle3" class="acceseries" name="boximei" type="checkbox" value="yes">
                              <label for="toggle3">
                                  <img src="assets/images/item/2.jpg"  class="img-fluid" alt="">
                                  <div class="radi-text">
                                      <p class="text-center">Box</p>
                                </div>
                            </label>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                              <input id="toggle4" class="acceseries" name="billimei" type="checkbox" value="yes">
                              <label for="toggle4">
                                  <img src="assets/images/item/4.jpg"  class="img-fluid" alt="">
                                  <div class="radi-text">
                                      <p class="text-center">Bill</p>
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
                            <!-- mobileage start -->
                            <input type="hidden" id="warin" name="warin" value="<?php echo $war ?>">
                            <input type="hidden" id="agein" name="age" value="<?php echo $watchage ?>">
                            <input type="hidden" id="conditionin" name="condition" value="<?php echo $condition ?>">

                                            <!-- accesries start -->
                                            <input type="hidden" id="chargerin" name="charger" value="" >
                                            <input type="hidden" id="earphonein" name="strap" value="" >
                                            <input type="hidden" id="boximeiin" name="boximei" value="" >
                                            <input type="hidden" id="billimeiin" name="billimei" value="" >
                                            <input type="hidden" id="mobilevalue" name="mobile" value="" >
                                            <input type="hidden" id="userid" name="uid" value="" required>
                                            <input type="hidden" class="form-control py-2 px-2 my-3" name="name" id="name" placeholder=" Enter your Name" required>
                                            <input type="hidden" id="code" name="code" class="form-control py-2 px-2 my-3" placeholder=" Code" required>
                                <button type="submit" name="otpverify" class="btn contin-btn text-white">Continue <i class="fas fa-arrow-right"></i></button>
                            </div>
                         </form>
                            <?php
                        }else{
                      ?>
                      <a  data-toggle="modal" data-target="#myModal2"><button class="btn contin-btn" type="submit" name="questions"> Continue <i class="fas fa-arrow-right"></i></button></a> 
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
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
          <div class="container">
            <div class="row" id="signmob">
          
                    <div class="col-12 col-lg-11 mx-auto my-auto text-center ">
                        <img src="assets/images/Group 494.png" alt="img" width="50%" >
                        <h1 class="text-white my-4">Welcome To Sell It</h1>
                        <div class="row">
                        <div class="col-11 col-lg-10 mx-auto">
                        <form action="" method="post" id="myformmobile">
                        <div class="form-group">
                        <input type="text" class="form-control py-2 px-2 my-3" name="phone" id="mobile" placeholder=" Enter your Mobile Number" required>
                        <button type="submit" name="mobileverification" class="form-control col-lg-6 col-8 py-2 px-2 mx-auto my-3"> <b> Continue </b></button>
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
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
            <div class="container my-auto">
                 <div class="row" id="signmob">

   <div class="col-12 col-lg-12 mx-auto my-auto text-center p-5 img-responsive">
    <img src="assets/images/Group 494.png" alt="img" width="50%" >
    <h1 class="text-white mt-2">Enter OTP</h1>
    <div class="row">
    <div class="col-11 col-lg-12 mx-auto">
    <form  method="POST">
    <div class="form-group">
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
                     <!-- mobileage start -->
                     <input type="hidden" id="warin" name="warin" value="<?php echo $war ?>">
                     <input type="hidden" id="agein" name="age" value="<?php echo $watchage ?>">
                     <input type="hidden" id="conditionin" name="condition" value="<?php echo $condition ?>">
                     <input type="hidden" name="mid" value="<?php echo $mid ?>" required>
                     <input type="hidden" name="bid" value="<?php echo $bid ?>" required>
                    <!-- accesries start -->
                    <input type="hidden" id="chargerin" name="charger" value="" >
                    <input type="hidden" id="earphonein" name="strap" value="" >
                    <input type="hidden" id="boximeiin" name="boximei" value="" >
                    <input type="hidden" id="billimeiin" name="billimei" value="" >
                    <input type="hidden" id="mobilevalue" name="mobile" value="" >
                    <input type="hidden" id="userid" name="uid" value="" required>
                    <input type="text" class="form-control py-2 px-2 my-3 loginuser" name="name" id="name" placeholder="Enter your Name" required>
                    <input type="text" id="code" name="code" class="form-control py-2 px-2 my-3" placeholder=" Code" required>
                    <button type="submit" name="otpverify" class="form-control col-lg-6 col-10 py-2 px-2 mx-auto my-3"> <b> Verify OTP </b></button>
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
 $(document).ready(function(){
    $("#myformmobile").on('submit',function(e){
        $('#myModal2').modal('hide');
        $('#myModal1').modal('show');
        e.preventDefault();
        var mob = $("#mobile").val(); 
        $('#mobilevalue').val(mob); 
        if(mob != null){
        jQuery.ajax({
                  method: "post",
                  url : "mobileverify.php",
                  data:{mobile:mob},
				  dataType: "html",
				  success:function(result)
				  {
					   if(result != ''){
					     $('.loginuser').addClass('d-none');
					      $('.loginuser').removeAttr('required');
					      $('#userid').val(result); 
					 } 
				  }
            });
    //         jQuery.ajax({
    //               method: "post",
    //               url : "createuser.php",
    //               data:{mobile:mob},
				//   dataType: "html",
				//   success:function(result)
				//   {
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
        if(charger == "yes")
        {
            $('#dohave').html("Do you have the following?");
            $('#charger').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Charger");
            $('#chargerin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Charger");
        }
        else{
            $('#dohave').html("Do you have the following?");
            $('#charger').html("");
            $('#chargerin').val("");
        }

        var earphone = $("input[type=checkbox][name=earphone]:checked").val();
        if(earphone == "yes")
        {
            $('#dohave').html("Do you have the following?");
            $('#earphone').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>strap");
            $('#earphonein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>strap");
        }
        else{
            $('#dohave').html("Do you have the following?");
            $('#earphone').html("");
            $('#earphonein').val("");
        }
        var boximei = $("input[type=checkbox][name=boximei]:checked").val();
        if(boximei == "yes")
        {
            $('#dohave').html("Do you have the following?");
            $('#boximei').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Box");
            $('#boximeiin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Box");
        }
        else{
            $('#dohave').html("Do you have the following?");
            $('#boximei').html("");
            $('#boximeiin').val("");
        }

        var billimei = $("input[type=checkbox][name=billimei]:checked").val();
        if(billimei != null){
        if(billimei == "yes")
        {    
            $('#dohave').html("Do you have the following?");
            $('#billimei').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bill");
            $('#billimeiin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bill");   
            $('#warin').val("<?php echo $war ?>");
        }
      }
        else{
            $('#dohave').html("Do you have the following?");
            $('#billimei').html("");
            $('#billimeiin').val("");
            $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
          }
       });
    });
</script>
<!-- question calculation start here -->
<script>
$(document).ready(function(){
    var billimei = $("input[type=checkbox][name=billimei]:checked").val();
    if(billimei == "yes"){
            $("#warin").val("<?php echo $war ?>");
    }else{
        $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of Warranty");
    }
});
</script>