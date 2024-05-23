<?php include 'header.php' ?>
<?php
include 'include/productnew2.php';
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
                    <div class="col-4 text-right"> <img src="admin/img/<?php echo $selectmodel['product_image'] ?>" class="img-fluid" width="50%"  alt=""></div>
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
                <p id="screencondition"></p>
                <p id="touch"></p>
                <p id="spot"></p>
                <p id="lines"></p>
                <p id="physical"></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 product-new">
                <div class="modscren">
                    <form action="mobileage.php?vid=<?php echo $vid ?>&&bid=<?php echo $bid ?>&&mid=<?php echo $mid ?>" method="post" >
                <h1 class="pro-det text-left">Tell us a few things about your device!</h1>
                <p class="ques text-left">Is your device's touch screen working properly?</p>
                <div class="row mb-3" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggle-on" class="touch" name="touch" type="radio" value="yes" ><label for="toggle-on" required>Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggle-off" class="touch" name="touch" type="radio" value="no" ><label for="toggle-off" required>No</label></div>
                </div>
                <hr>
                <div class="card" style="box-shadow: 0 0px 0px 0 rgb(0 0 0 / 20%);border:0px;padding:0px;">
                <p class="ques text-left" >Dead Pixels/Spots on Screen</p>
                    <div class="row radio-select pt-3">
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle1" class="spot" name="spot" type="radio" value="largespot" required>
                      <label for="toggle1">
                      <img src="assets/images/Large heavy visible spots on screen.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">Large visible spots on screen</p>
                  </div>

                        </label>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle2" class="spot" name="spot" type="radio" value="multiplespot" required>
                      <label for="toggle2">
                      <img src="assets/images/3 or more minor spots on screen.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">Multiple visible spots on screen</p>
                                </div>

                        </label>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle3" class="spot" name="spot" type="radio" value="minorspot" required>
                      <label for="toggle3">
                      <img src="assets/images/1-2 minor spots on screen.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">Minor  small spots on screen</p>
                                </div>

                        </label>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle4" class="spot" name="spot" type="radio" value="nospot" required>
                      <label for="toggle4">
                      <img src="assets/images/No line(s) on Display.jpg" id="sc"  class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">No spots on screen</p>
                                </div>

                        </label>
                      </div>
                </div>
                </div>
                
                <div class="card" style="box-shadow: 0 0px 0px 0 rgb(0 0 0 / 20%);border:0px;padding:0px;">
                  <p class="ques text-left" >Visible Lines on Screen</p>
                    <div class="row radio-select pt-3">
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle5" class="lines" name="lines" type="radio" value="displayfaded" required>
                      <label for="toggle5">
                      <img src="assets/images/Display faded along edges.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">Display faded along corners</p>
                  </div>

                        </label>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle6" class="lines" name="lines" type="radio" value="multiplelines" required>
                      <label for="toggle6">
                      <img src="assets/images/Visible line(s) on display.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">Multiple lines on Display</p>
                                </div>

                        </label>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle7" class="lines" name="lines" type="radio" value="noline" required>
                      <label for="toggle7">
                      <img src="assets/images/No line(s) on Display.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">No line(s) on Display</p>
                                </div>

                        </label>
                      </div>
                </div>
                </div>
                <div class="card" style="box-shadow: 0 0px 0px 0 rgb(0 0 0 / 20%);border:0px;padding:0px;">
                  <p class="ques text-left" >Screen Physical Condition</p>
                    <div class="row radio-select pt-3">
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle8" class="physical" name="physical" type="radio" value="cracked" required>
                      <label for="toggle8">
                      <img src="assets/images/Screen cracked glass broken.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">Screen cracked/ glass broken</p>
                  </div>

                        </label>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle9" class="physical" name="physical" type="radio" value="damaged" required>
                      <label for="toggle9">
                      <img src="assets/images/Screen cracked glass broken.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">Damaged/ Torn screen on edges</p>
                                </div>

                        </label>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle10" class="physical" name="physical" type="radio" value="heavyscratches" required>
                      <label for="toggle10">
                      <img src="assets/images/More than 2 scratches on screen.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">Heavy scratches on screen</p>
                                </div>

                        </label>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle11" class="physical" name="physical" type="radio" value="1-2scratches" required>
                      <label for="toggle11">
                      <img src="assets/images/1-2 scratches on screen.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">1-2 scratches on screen</p>
                                </div>

                        </label>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                      <input id="toggle12" class="physical" name="physical" type="radio" value="noscratches" required>
                      <label for="toggle12">
                      <img src="assets/images/No line(s) on Display.jpg" id="sc" class="img-fluid pt-2" alt="">
                      <div class="newproduct">
                      <p class="text-center">No scratches on screen</p>
                                </div>

                        </label>
                      </div>
                </div>
                </div>
                <div class="text-center mt-4">
                    <input type="hidden" id="callin" name="callin" value="<?php echo $call ?>" >
                    <input type="hidden" id="screenin" name="screenin" value="<?php echo $screen ?>" >
                    <input type="hidden" id="bodyin" name="bodyin" value="<?php echo $body ?>" >
                    <input type="hidden" id="warin" name="warin"  >
                    <input type="hidden"  name="devicedetail" value="Device Details" >
                    <input type="hidden" id="touchin" name="touch" value="" >
                    <input type="hidden" id="spotin" name="spot" value="" >
                    <input type="hidden" id="linesin" name="lines" value="" >
                    <input type="hidden" id="physicalin" name="physical" value="" >
                    <input type="hidden" id="screencondition" name="screencondition" value="Screen Condition" >
                 <button type="submit" class="btn contin-btn" name="screen2">Continue  <i class="fas fa-arrow-right"></i></button>
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
    // touhscreen start
    $('.touch').click(function() {
      var call = $("input[type=radio][name=touch]:checked").val();
        if(call == "yes")
        {
            $('#screencondition').html("Screen Condition");
            $('#touch').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Touch Working");
            $('#war').html('<?php echo $war ?>');
            $('#touchin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Touch Working");
            $('.physical, .lines, .spot').attr("required", "true");
            $('.card').show();  
        }
        else if(call == "no"){   
            $('#screencondition').html("Screen Condition");
            $('#touch').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Touch Faulty");
            $('#war').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Mobile Out of Warranty");
            $('#touchin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Touch Faulty");
            $('#spot,#lines,#physical').html("");
             $('#spotin,#linesin,#physicalin').val("");
            $('.card').hide();
            $('.physical, .lines, .spot').removeAttr("required");
        }
    });

     // spot start
     $('.spot').click(function() {
      var call = $("input[type=radio][name=spot]:checked").val();
        if(call == "largespot")
        {
            $('#spot').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Large/ heavy visible spots on screen");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#spotin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Large/ heavy visible spots on screen");
        }
        else if(call == "multiplespot"){   
            $('#spot').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Multiple visible spots on screen");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#spotin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Multiple visible spots on screen");
        }
        else if(call == "minorspot"){   
            $('#spot').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Minor discoloration or small spots on screen");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#spotin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Minor discoloration or small spots on screen");
        }
        else if(call == "nospot"){   
            $('#spot').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No spots on screen");
            $('#spotin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No spots on screen");
        }
    });
      // lines start
      $('.lines').click(function() {
      var lines = $("input[type=radio][name=lines]:checked").val();
        if(lines == "displayfaded")
        {
           
            $('#lines').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Display faded along corners");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#linesin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Display faded along corners");
        }
        else if(lines == "multiplelines"){   
            $('#lines').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Multiple lines on Display");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#linesin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Multiple lines on Display");
        }
        else if(lines == "noline"){   
            $('#lines').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No line(s) on Display");
            $('#linesin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No line(s) on Display");
        }
    });

      // physical start
      $('.physical').click(function() {
      var physical = $("input[type=radio][name=physical]:checked").val();
        if(physical == "cracked")
        {
            $('#physical').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Screen cracked/ glass broken");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#physicalin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Screen cracked/ glass broken");
        }
        else if(physical == "damaged"){   
            $('#physical').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Damaged/ Torn screen on edges");
            $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Out of Warranty');
            $('#physicalin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Damaged/ Torn screen on edges");
        }
        else if(physical == "heavyscratches"){   
            $('#physical').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Heavy scratches on screen");
            $('#physicalin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Heavy scratches on screen");
        }
        else if(physical == "1-2scratches"){   
            $('#physical').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>1-2 scratches on screen");
            $('#physicalin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>1-2 scratches on screen");
        }
        else if(physical == "noscratches"){   
            $('#physical').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No scratches on screen");
            $('#physicalin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>No scratches on screen");
        }
    });
});
</script>

<script>
$(document).ready(function(){
  $('.touch, .physical, .lines, .spot').click(function() {
    var $warrenty = $('#war').html();
    $("#warin").val($warrenty);
  })
});
</script>


<script>
$(document).ready(function(){
$('.spot, .physical, .lines').click(function(){
    var spot = $("input[type=radio][name=spot]:checked").val();
    var physical = $("input[type=radio][name=physical]:checked").val();
    var lines = $("input[type=radio][name=lines]:checked").val();
    if(spot == "nospot" && physical == "noscratches" && lines == "noline"){
      $('#war').html('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile under Warranty');
      $('#warin').val('<i class="fas fa-dot-circle" style="font-size:10px;margin-right:12px;color:#1B6C9E;" ></i>Mobile Under Warranty');
    }
   
  })
});
</script>