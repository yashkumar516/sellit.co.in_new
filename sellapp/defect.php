<?php include 'header.php' ?>
<?php
include 'include/defect2.php';
$vid = $_REQUEST['vid'];
$bid = $_REQUEST['bid'];
$mid = $_REQUEST['mid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$mid' "));
?>

<?php
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
?>
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h1 class="sell-header">Sell Old <span class="sell-title-head"> <?php echo $selectquery['subcategory_name'] ?> </span> Mobile</h1>
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
                 <p id="devicedetail"><?php echo  $devicedetail ?></p>
                 <p id="call"><?php echo $call ?></p>
                <p id="screen"><?php echo $screen ?></p>
                <p id="body"><?php echo $body ?></p>
                <p id="war"><?php echo $war ?></p>
                <!-- screenconditions start -->
                <p id="screencondition"><?php echo $screencondition ?></p>
                <p id="touch"><?php echo $touch ?></p>
                <p id="spot"><?php echo $spot ?></p>
                <p id="lines"><?php echo $lines ?></p>
                <p id="physical"><?php echo $physical ?></p>
                <!-- body conditions start -->
                <p id="overall"></p>
                <p id="Scratches"></p>
                <p id="dents"></p>
                <p id="side"></p>
                <p id="bent"></p>
                </div>
            </div>
            <div class="col-lg-7 defect">
                <div class="modscren">
                <h1 class="defect-heading">Tell us more about your device's body defects</h1>

                <p class="ques">Scratches on Phone Body</p>
                <!-- <p class="sub-heading">Check your device for cellular network connectivity issues.</p> -->
                <form action="mobileage.php?vid=<?php echo $vid ?>&&bid=<?php echo $bid ?>&&mid=<?php echo $mid ?>" method="post">
                <div class="row pt-3">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle1"  class="Scratches" name="Scratches" type="radio" value="Major scratches" required>
                      <label for="toggle1">
                            <img src="assets/images/defect/7.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">Major scratches </p>
                            </div>

                        </label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle2" class="Scratches" name="Scratches" type="radio" value="Less than 2 scratches" required>
                      <label for="toggle2">
                            <img src="assets/images/defect/10.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">Less than 2 scratches</p>
                            </div>

                        </label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle3" class="Scratches" name="Scratches" type="radio" value="No scratches" required>
                      <label for="toggle3">
                            <img src="assets/images/defect/3.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">No scratches</p>
                            </div>

                        </label>
                      </div>
                </div>

                <p class="ques">Dents on Phone Body</p>
                <!-- <p class="sub-heading">Check for dents on phone body</p> -->
                <div class="row pt-3">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle4" class="dents" name="dents" type="radio" value="Multiple/heavy visible body dents" required>
                      <label for="toggle4">
                            <img src="assets/images/defect/6.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">Multiple/heavy visible body dents</p>
                            </div>

                        </label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle5" class="dents" name="dents" type="radio" value="2 or less minor body dents" required>
                      <label for="toggle5">
                            <img src="assets/images/defect/4.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">Less than 2 dents</p>
                            </div>

                        </label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle6" class="dents" name="dents" type="radio" value="No dents" required>
                      <label for="toggle6">
                            <img src="assets/images/defect/3.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">No deents</p>
                            </div>
                        </label>
                      </div>
                </div>

                <p class="ques">Phone Side/Back Panel Condition</p>
                <!-- <p class="sub-heading">Check your device's side & back panels</p> -->
                <div class="row pt-3">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle7" class="side" name="side" type="radio" value="Cracked/ broken side or back panel" required>
                      <label for="toggle7">
                            <img src="assets/images/defect/1.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">Cracked/ broken side or back panel</p>
                            </div>

                        </label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle8" class="side" name="side" type="radio" value="Missing side or back panel" required>
                      <label for="toggle8">
                            <img src="assets/images/defect/5.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">Missing side or back panel</p>
                            </div>

                        </label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle9" class="side" name="side" type="radio" value="No defect on side or back panel" required>
                      <label for="toggle9">
                            <img src="assets/images/defect/2.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">No defect on side or back panel</p>
                            </div>

                        </label>
                      </div>
                </div>

                <p class="ques">Bent Phone or Loose Screen</p>
                <!-- <p class="sub-heading">Check for dents on phone body</p> -->
                <div class="row pt-3">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle10" name="bent" class="bent" type="radio" value="Bent/ curved panel" required>
                      <label for="toggle10">
                            <img src="assets/images/defect/9.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">Bent/ curved panel</p>
                            </div>

                        </label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle11" name="bent" class="bent" type="radio" value="Loose screen (Gap in screen and body)" required>
                      <label for="toggle11">
                            <img src="assets/images/defect/8.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">Loose screen (Gap in screen and body)</p>
                            </div>

                        </label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <input id="toggle12" name="bent" class="bent" type="radio" value="Phone not bent" required>
                      <label for="toggle12">
                            <img src="assets/images/defect/2.jpg"  class="img-fluid" alt="">
                            <div class="radi-text">
                                <p class="text-center">No Bents</p>
                            </div>

                        </label>
                      </div>
                </div>
                <div class="text-center mt-5">
                <input type="hidden" id="callin" name="callin" value="<?php echo $call ?>">
                    <input type="hidden" id="screenin" name="screenin" value="<?php echo $screen ?>">
                    <input type="hidden" id="bodyin" name="bodyin" value="<?php echo $body ?>">
                    <input type="hidden" id="warin" name="warin" >  
                    <input type="hidden"  name="devicedetail" value="Device Details">
                    <input type="hidden" id="touchin" name="touch" value="<?php echo $touch ?>">
                    <input type="hidden" id="spotin" name="spot" value="<?php echo $spot ?>">
                    <input type="hidden" id="linesin" name="lines" value="<?php echo $lines ?>" >
                    <input type="hidden" id="physicalin" name="physical" value="<?php echo $physical ?>" >
                    <input type="hidden" id="screencondition" name="screencondition" value="<?php echo $screencondition ?>">
                    <input type="hidden" id="Scratchesin" name="Scratches" value="">
                    <input type="hidden" id="dentsin" name="dents" value="">
                    <input type="hidden" id="sidein" name="side" value="">
                    <input type="hidden" id="bentin" name="bent" value="">
                    <input type="hidden" id="overallcondition" name="overallcondition" value="Phone's Overall Condition">
                   <button class="btn contin-btn" name="questions">Continue  <i class="fas fa-arrow-right"></i></button>
                </div>
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
    $('.Scratches').click(function() {
      var Scratches = $("input[type=radio][name=Scratches]:checked").val();
        if(Scratches == "Major scratches")
        {
            $('#overall').html("Phone's Overall Condition");
            $('#Scratches').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Major scratches");
            $('#war').html('<?php echo $war ?>');
            $('#Scratchesin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Major scratches");
        }
        else if(Scratches == "Less than 2 scratches"){   
            $('#overall').html("Phone's Overall Condition");
            $('#Scratches').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Less than 2 scratches");
            $('#war').html('<?php echo $war ?>');
            $('#Scratchesin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Less than 2 scratches");
        }
        else if(Scratches == "No scratches"){   
            $('#overall').html("Phone's Overall Condition");
            $('#Scratches').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No scratches");
            $('#war').html('<?php echo $war ?>');
            $('#Scratchesin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No scratches");
        }
    });
      // dents start
      $('.dents').click(function() {
      var dents = $("input[type=radio][name=dents]:checked").val();
        if(dents == "Multiple/heavy visible body dents")
        {
            $('#overall').html("Phone's Overall Condition");
            $('#dents').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Multiple/heavy visible body dents");
            $('#dentsin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Multiple/heavy visible body dents");
        }
        else if(dents == "2 or less minor body dents"){   
            $('#overall').html("Phone's Overall Condition");
            $('#dents').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>2 or less minor body dents");
            $('#dentsin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>2 or less minor body dents");
        }
        else if(dents == "No dents"){   
            $('#overall').html("Phone's Overall Condition");
            $('#dents').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No dents");
            $('#dentsin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No dents");
        }
    })
      // side start
      $('.side').click(function() {
      var side = $("input[type=radio][name=side]:checked").val();
        if(side == "Cracked/ broken side or back panel")
        {
            $('#overall').html("Phone's Overall Condition");
            $('#side').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Cracked/ broken side or back panel");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#sidein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Cracked/ broken side or back panel");
        }
        else if(side == "Missing side or back panel"){   
            $('#overall').html("Phone's Overall Condition");
            $('#side').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Missing side or back panel");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#sidein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Missing side or back panel");
        }
        else if(side == "No defect on side or back panel"){   
            $('#overall').html("Phone's Overall Condition");
            $('#side').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No defect on side or back panel");
            $('#sidein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No defect on side or back panel");
        }
    })
      // bent start
      $('.bent').click(function() {
      var bent = $("input[type=radio][name=bent]:checked").val();
        if(bent == "Bent/ curved panel")
        {
            $('#overall').html("Phone's Overall Condition");
            $('#bent').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bent/ curved panel");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#bentin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Bent/ curved panel");
        }
        else if(bent == "Loose screen (Gap in screen and body)"){   
            $('#overall').html("Phone's Overall Condition");
            $('#bent').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Loose screen (Gap in screen and body)");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#bentin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Loose screen (Gap in screen and body)");
        }
        else if(bent == "Phone not bent"){   
            $('#overall').html("Phone's Overall Condition");
            $('#bent').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone not bent");
            $('#bentin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Phone not bent");
        }
    })
  });
</script>

<!-- start warrenty  -->

<script>
$(document).ready(function(){
  $('.bent, .side, .dents, .Scratches').click(function() {
    var $warrenty = $('#war').html();
    $("#warin").val($warrenty);
  })
});
</script>

<script>
$(document).ready(function(){
$('.bent, .side, .dents, .Scratches').click(function(){
    var bent = $("input[type=radio][name=bent]:checked").val();
    var side = $("input[type=radio][name=side]:checked").val();
    if(bent == "Phone not bent" && side == "No defect on side or back panel" ){
        $('#war').html('<?php echo $war ?>');
        $('#warin').val('<?php echo $war ?>');
    }
   
  })
});
</script>
