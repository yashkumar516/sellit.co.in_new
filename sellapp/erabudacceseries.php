
<?php include 'header.php'; ?>
<?php 
$bid = $_REQUEST['bid'];
$mid = $_REQUEST['mid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$mid' "));
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
include 'include/earpodecalculation.php';
if(isset($_POST['earage'])){
    $speaker = $_POST['screenin'];
    $connectivity = $_POST['bodyin'];
    $switch = $_POST['callin'];
    $physicalissue = $_POST['warin']; 
    $warrenty = $_POST['warrenty']; 
    $condition = $_POST['condition']; 
    $earbudage = $_POST['age']; 
  }
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
                 <p id="devicedetail">Device Details</p>
                 <p id="call"><?= $switch ?></p>
                 <p id="screen"><?= $speaker ?></p>
                 <p id="body"><?= $connectivity ?></p>
                 <p id="war"><?= $physicalissue ?></p>
                 <p id="watchcondion">Earbud Condition</p>
                 <p id="condition"><?= $condition ?></p>
                 <p id="mobage">Earbud Age</p>
                 <p id="age"><?= $earbudage ?></p>
                <!-- accesiers start -->
                <p id="dohave"></p>
                <p id="charger"></p>
                <p id="earphone" ></p>
                <p id="billimei"></p>
                </div>
            </div>
            <div class="col-lg-6 haveitem mx-uto">
                <p class="ques">Do you have the following?</p>
       
                    <div class="row ">
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                          <input id="toggle1" class="acceseries" name="charger" type="checkbox" value="yes">
                          <label for="toggle1">
                                <img src="assets/images/item/1.jpg"  class="img-fluid" alt="">
                                <div class="radi-text">
                                    <p class="text-center">original charging case</p>
                                </div>
    
                            </label>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                              <input id="toggle2" class="acceseries" name="earphone" type="checkbox" value="yes">
                              <label for="toggle2">
                                  <img src="assets/images/item/3.jpg"  class="img-fluid" alt="">
                                  <div class="radi-text">
                                      <p class="text-center">charging cable</p>
                                </div>
                            </label>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-6 haveitem-col">
                              <input id="toggle4" class="acceseries" name="billimei" type="checkbox" value="yes">
                              <label for="toggle4">
                                  <img src="assets/images/item/4.jpg"  class="img-fluid" alt="">
                                  <div class="radi-text">
                                      <p class="text-center">invoice</p>
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
                            <input type="hidden" id="callin" name="switch" value="<?= $switch ?>">
                            <input type="hidden" id="screenin" name="speaker" value="<?= $speaker ?>">
                            <input type="hidden" id="bodyin" name="connectivity" value="<?= $connectivity ?>">
                            <input type="hidden" id="warin" name="physicalissue" value="<?= $physicalissue ?>">
                            <input type="hidden" id="warrenty" name="warrenty" value="<?= $warrenty ?>">
                            <input type="hidden" id="conditionin" name="condition" value="<?= $condition ?>">
                            <input type="hidden" id="agein" name="age" value="<?= $earbudage ?>">

                                            <!-- accesries start -->
                                            <input type="hidden" id="chargerin" name="charger" value="" >
                                            <input type="hidden" id="earphonein" name="cable" value="" >
                                            <input type="hidden" id="billimeiin" name="invoice" value="" >
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
    <input type="hidden" id="callin" name="switch" value="<?= $switch ?>">
                    <input type="hidden" id="screenin" name="speaker" value="<?= $speaker ?>">
                    <input type="hidden" id="bodyin" name="connectivity" value="<?= $connectivity ?>">
                    <input type="hidden" id="warin" name="physicalissue" value="<?= $physicalissue ?>">
                    <input type="hidden" id="warrenty" name="warrenty" value="<?= $warrenty ?>">
                    <input type="hidden" id="conditionin" name="condition" value="<?= $condition ?>">
                    <input type="hidden" id="agein" name="age" value="<?= $earbudage ?>">

                                            <!-- accesries start -->
                    <input type="hidden" id="chargerin" name="charger" value="" >
                    <input type="hidden" id="earphonein" name="cable" value="" >
                    <input type="hidden" id="billimeiin" name="invoice" value="" >
                    <input type="hidden" id="mobilevalue" name="mobile" value="" >
                    <input type="hidden" id="userid" name="uid" value="" required>
                    <input type="hidden" id="mobilevalue" name="mobile" value="" >
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
            $('#charger').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>original charging case");
            $('#chargerin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>original charging case");
        }
        else{
            $('#dohave').html("Do you have the following?");
            $('#charger').html("");
            $('#chargerin').val("");
            $('#warrenty').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty");
        }

        var earphone = $("input[type=checkbox][name=earphone]:checked").val();
        if(earphone == "yes")
        {
            $('#dohave').html("Do you have the following?");
            $('#earphone').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>charging cable");
            $('#earphonein').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>charging cable");
        }
        else{
            $('#dohave').html("Do you have the following?");
            $('#earphone').html("");
            $('#earphonein').val("");
        }
        var billimei = $("input[type=checkbox][name=billimei]:checked").val();
        if(billimei != null){
        if(billimei == "yes")
        {    
            $('#dohave').html("Do you have the following?");
            $('#billimei').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>invoice");
            $('#billimeiin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>invoice");   
            $('#warrenty').val("<?php echo $warrenty ?>");
        }
      }
        else{
            $('#dohave').html("Do you have the following?");
            $('#billimei').html("");
            $('#billimeiin').val("");
            $('#warrenty').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty");
          }
       });
    });
</script>
<!-- question calculation start here -->
<script>
$(document).ready(function(){
    var billimei = $("input[type=checkbox][name=billimei]:checked").val();
    if(billimei == "yes"){
            $("#warrenty").val("<?php echo $warrenty ?>");
    }else{
        $('#warrenty').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Earbud Out of Warranty");
    }
});
</script>