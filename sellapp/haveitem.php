
<?php include 'header.php'; ?>
<?php include 'include/haveitem1.php'; ?>
<?php include 'include/calenquiry.php' ?>
<?php 
$selectmodel = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$mid' "));
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
        <div class="row haveitem ">
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
                 <p id="devicedetail"><?php echo  $devicedetail ?></p>
                 <p id="call"><?php echo $call ?></p>
                <p id="screen"><?php echo $screen ?></p>
                <p id="body"><?php echo $body ?></p>
                <p id="war"><?php echo $war ?></p>
                <p id="warr" style="display:none"><?php echo $war ?></p>
                <!-- screen start -->
                <p id="screencondition"><?php echo $screencondition ?></p>
                <p id="touch"><?php echo $touchwork ?></p>
                <p id="spot"><?php echo $spot ?></p>
                <p id="lines"><?php echo $lines ?></p>
                <p id="physical"><?php echo $physical ?></p>
                <!-- bodystart -->
                <p id="overall"><?php echo $overallcondition ?></p>
                <p id="Scratches"><?php echo $Scratches ?></p>
                <p id="dents"><?php echo $dents ?></p>
                <p id="side"><?php echo $side ?></p>
                <p id="bent"><?php echo $bents?></p>
                 <!-- warrent strt -->
                 <p id="mobage"><?php echo $mobage ?></p>
                 <p id="age"><?php echo $age ?></p>
                <!-- functional start -->
                <p id="functional"><?php echo $functional ?></p>
                <p id="copydisplay"><?php echo $copydisplay ?></p>
                <p id="frontcam"><?php echo $frontcamin ?></p>
                <p id="backcam"><?php echo $backcamin ?></p>
                <p id="volume"><?php echo $volumein ?></p>
                <p id="fingertouch"><?php echo $fingertouchin ?></p>
                <p id="speaker"><?php echo $speakerin ?></p>
                <p id="power"><?php echo $powerin ?></p>
                <p id="charging"><?php echo $chargingin ?></p>
                <p id="face"><?php echo $facein ?></p>
                <p id="audio"><?php echo $audioin ?></p>
                <p id="camglass"><?php echo $camglassin ?></p>
                <p id="wifi"><?php echo $wifiin  ?></p>
                <p id="silent"><?php echo $silentin ?></p>
                <p id="battry"><?php echo $battryin ?></p>
                <p id="bluetooth"><?php echo $bluetoothin ?></p>
                <p id="vibrate"><?php echo $vibratein ?></p>
                <p id="micro"><?php echo $microin ?></p>
                <!-- accesiers start -->
                <p id="dohave"></p>
                <p id="charger"></p>
                <p id="earphone" ></p>
                <p id="boximei"></p>
                <p id="billimei"></p>
                </div>
            </div>
                <div class="col-12 mx-auto ques text-center">Do you have the following?</div>
       
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                          <input id="toggle1" class="acceseries" name="charger" type="checkbox" value="yes">
                          <label for="toggle1">
                                <img src="assets/images/item/1.jpg"  class="img-fluid" alt="">
                                <div class="radi-text">
                                    <p class="text-center">Original Charger of Device</p>
                                </div>
    
                            </label>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                              <input id="toggle2" class="acceseries" name="earphone" type="checkbox" value="yes">
                              <label for="toggle2">
                                  <img src="assets/images/item/3.jpg"  class="img-fluid" alt="">
                                  <div class="radi-text">
                                      <p class="text-center">Original Earphones</p>
                                </div>
                            </label>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                              <input id="toggle3" class="acceseries" name="boximei" type="checkbox" value="yes">
                              <label for="toggle3">
                                  <img src="assets/images/item/2.jpg"  class="img-fluid" alt="">
                                  <div class="radi-text">
                                      <p class="text-center">Box with same IMEI</p>
                                </div>
                            </label>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                              <input id="toggle4" class="acceseries" name="billimei" type="checkbox" value="yes">
                              <label for="toggle4">
                                  <img src="assets/images/item/4.jpg"  class="img-fluid" alt="">
                                  <div class="radi-text">
                                      <p class="text-center">Bill with same IMEI</p>
                                </div>
                            </label>
                          </div>
                 
                    <div class="col-12 text-center mt-4">
                      <?php
                        if(isset($_SESSION['user'])){
                            ?>
                            <form method="POST">
                            <div class="form-group text-center">
                                          <input type="hidden" id="callin" name="callin" value="<?php echo $call ?>" >
                                            <input type="hidden" id="screenin" name="screenin" value="<?php echo $screen ?>" >
                                            <input type="hidden" id="bodyin" name="bodyin" value="<?php echo $body ?>" >
                                            <input type="hidden" id="warin" name="warin"  > 
                                              <!-- screen start -->
                                              <input type="hidden" id="touchin" name="touch" value="<?php echo $touchwork ?>">
                                            <input type="hidden" id="spotin" name="spot" value="<?php echo $spot ?>">
                                            <input type="hidden" id="linesin" name="lines" value="<?php echo $lines ?>" >
                                            <input type="hidden" id="physicalin" name="physical" value="<?php echo $physical ?>" >
                                            <input type="hidden" id="screencondition" name="screencondition" value="<?php echo $screencondition ?>">
                                            <!-- body start -->
                                            <input type="hidden" id="devicedetail" name="devicedetail" value="Device Details">
                                            <input type="hidden" id="Scratchesin" name="Scratches" value="<?php echo $Scratches ?>" >
                                            <input type="hidden" id="dentsin" name="dents" value="<?php echo $dents ?>" >
                                            <input type="hidden" id="sidein" name="side" value="<?php echo $side ?>" >
                                            <input type="hidden" id="bentin" name="bent" value="<?php echo $bents ?>" >
                                            <input type="hidden" id="overallcondition" name="overallcondition" value="<?php echo  $overallcondition ?>" >
                                            <input type="hidden" id="functional" name="functional" value="Functional Condition" >
                                            <input type="hidden" id="functional" name="assesires" value="Do you have the following?" >
                                             <!-- mobile age  -->
                                            <input type="hidden" id="mobagein" name="mobage" value="<?php echo $mobage ?>">
                                            <input type="hidden" id="agein" name="age" value="<?php echo $age ?>">
                                            <!-- functional start -->
                                            <input type="hidden" id="copydisplay" name="copydisplay" value="<?php echo $copydisplay ?>">
                                            <input type="hidden" id="frontcamin" name="frontcamin" value="<?php echo $frontcamin ?>">
                                            <input type="hidden" id="backcamin" name="backcamin" value="<?php echo $backcamin ?>">
                                            <input type="hidden" id="volumein" name="volumein" value="<?php echo $volumein ?>">
                                            <input type="hidden" id="fingertouchin" name="fingertouchin" value="<?php echo $fingertouchin ?>">
                                            <input type="hidden" id="speakerin" name="speakerin" value="<?php echo $speakerin ?>">
                                            <input type="hidden" id="powerin" name="powerin" value="<?php echo $powerin ?>">
                                            <input type="hidden" id="chargingin" name="chargingin" value="<?php echo $chargingin ?>">
                                            <input type="hidden" id="facein" name="facein" value="<?php echo $facein ?>">
                                            <input type="hidden" id="audioin" name="audioin" value="<?php echo $audioin ?>">
                                            <input type="hidden" id="camglassin" name="camglassin" value="<?php echo $camglassin ?>">
                                            <input type="hidden" id="wifiin" name="wifiin" value="<?php echo $wifiin ?>">
                                            <input type="hidden" id="#silentin" name="silentin" value="<?php echo $silentin ?>">
                                            <input type="hidden" id="battryin" name="battryin" value="<?php echo $battryin ?>">
                                            <input type="hidden" id="bluetoothin" name="bluetoothin" value="<?php echo $bluetoothin ?>">
                                            <input type="hidden" id="vibratein" name="vibratein" value="<?php echo $vibratein ?>">
                                            <input type="hidden" id="microin" name="microin" value="<?php echo $microin ?>">
                                            <!-- accesries start -->
                                            <input type="hidden" id="chargerin" name="charger" value="" >
                                            <input type="hidden" id="earphonein" name="earphone" value="" >
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
    <form method="POST">
    <div class="form-group">
                  <input type="hidden" id="callin" name="callin" value="<?php echo $call ?>" >
                    <input type="hidden" id="screenin" name="screenin" value="<?php echo $screen ?>" >
                    <input type="hidden" id="bodyin" name="bodyin" value="<?php echo $body ?>" >
                    <input type="hidden" id="warin" name="warin"  > 
                      <!-- screen start -->
                      <input type="hidden" id="touchin" name="touch" value="<?php echo $touchwork ?>">
                    <input type="hidden" id="spotin" name="spot" value="<?php echo $spot ?>">
                    <input type="hidden" id="linesin" name="lines" value="<?php echo $lines ?>" >
                    <input type="hidden" id="physicalin" name="physical" value="<?php echo $physical ?>" >
                    <input type="hidden" id="screencondition" name="screencondition" value="<?php echo $screencondition ?>">
                    <!-- body start -->
                    <input type="hidden" id="devicedetail" name="devicedetail" value="Device Details">
                    <input type="hidden" id="Scratchesin" name="Scratches" value="<?php echo $Scratches ?>" >
                    <input type="hidden" id="dentsin" name="dents" value="<?php echo $dents ?>" >
                    <input type="hidden" id="sidein" name="side" value="<?php echo $side ?>" >
                    <input type="hidden" id="bentin" name="bent" value="<?php echo $bents ?>" >
                    <input type="hidden" id="overallcondition" name="overallcondition" value="<?php echo  $overallcondition ?>" >
                    <input type="hidden" id="functional" name="functional" value="Functional Condition" >
                    <input type="hidden" id="functional" name="assesires" value="Do you have the following?" >
                     <!-- mobile age  -->
                    <input type="hidden" id="mobagein" name="mobage" value="<?php echo $mobage ?>">
                    <input type="hidden" id="agein" name="age" value="<?php echo $age ?>">
                    <!-- functional start -->
                    <input type="hidden" id="copydisplay" name="copydisplay" value="<?php echo $copydisplay ?>">
                    <input type="hidden" id="frontcamin" name="frontcamin" value="<?php echo $frontcamin ?>">
                    <input type="hidden" id="backcamin" name="backcamin" value="<?php echo $backcamin ?>">
                    <input type="hidden" id="volumein" name="volumein" value="<?php echo $volumein ?>">
                    <input type="hidden" id="fingertouchin" name="fingertouchin" value="<?php echo $fingertouchin ?>">
                    <input type="hidden" id="speakerin" name="speakerin" value="<?php echo $speakerin ?>">
                    <input type="hidden" id="powerin" name="powerin" value="<?php echo $powerin ?>">
                    <input type="hidden" id="chargingin" name="chargingin" value="<?php echo $chargingin ?>">
                    <input type="hidden" id="facein" name="facein" value="<?php echo $facein ?>">
                    <input type="hidden" id="audioin" name="audioin" value="<?php echo $audioin ?>">
                    <input type="hidden" id="camglassin" name="camglassin" value="<?php echo $camglassin ?>">
                    <input type="hidden" id="wifiin" name="wifiin" value="<?php echo $wifiin ?>">
                    <input type="hidden" id="#silentin" name="silentin" value="<?php echo $silentin ?>">
                    <input type="hidden" id="battryin" name="battryin" value="<?php echo $battryin ?>">
                    <input type="hidden" id="bluetoothin" name="bluetoothin" value="<?php echo $bluetoothin ?>">
                    <input type="hidden" id="vibratein" name="vibratein" value="<?php echo $vibratein ?>">
                    <input type="hidden" id="microin" name="microin" value="<?php echo $microin ?>">
                    <!-- accesries start -->
                    <input type="hidden" id="chargerin" name="charger" value="" >
                    <input type="hidden" id="earphonein" name="earphone" value="" >
                    <input type="hidden" id="boximeiin" name="boximei" value="" >
                    <input type="hidden" id="billimeiin" name="billimei" value="" >
                    <input type="hidden" id="mobilevalue" name="mobile" value="" >
                    <input type="hidden" id="userid" name="uid" value="" required>
                    <input type="text" class="form-control py-2 px-2 my-3" name="name" id="name" placeholder=" Enter your Name" required>
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
					 $('#code').val(result); 
				  }
            });
            jQuery.ajax({
                  method: "post",
                  url : "createuser.php",
                  data:{mobile:mob},
				  dataType: "html",
				  success:function(result)
				  {
					 $('#userid').val(result); 
				  }
            });
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
            $('#charger').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Charger of Device");
            $('#chargerin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Charger of Device");
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
            $('#earphone').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Earphones of Device");
            $('#earphonein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Original Earphones of Device");
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
            $('#boximei').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Box with same IMEI");
            $('#boximeiin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Box with same IMEI");
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
             var waren = $("#warr").html();
            $('#dohave').html("Do you have the following?");
            $('#billimei').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bill with same IMEI");
            $('#billimeiin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bill with same IMEI");
            if(waren =='<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" aria-hidden="true"></i>Mobile Under Warranty'){
            $("#war").html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>Mobile Under Warranty");
            $("#warin").val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>Mobile Under Warranty");
            }
            else if(waren =='<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" aria-hidden="true"></i>Mobile Out of Warranty'){
                $("#war").html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>Mobile Out of Warranty");
            $("#warin").val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' aria-hidden='true'></i>Mobile Out of Warranty");
            }
           
        }
      }
        else{
            $('#dohave').html("Do you have the following?");
            $('#billimei').html("");
            $('#billimeiin').val("");
            $("#war").html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty");
            $("#warin").val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty");
          }
       });
    });
</script>
<!-- question calculation start here -->

<script>
$(document).ready(function(){
    var billimei = $("input[type=checkbox][name=billimei]:checked").val();
    if(billimei == "yes"){
        // $("#war").html("<php echo $war ?>");
        //     $("#warin").val("<php echo $war ?>");
    }else{
        $('#war').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty");
        $('#warin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty");
    }
});
</script>