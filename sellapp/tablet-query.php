<?php include 'header.php' ?>
<?php
$mid = $_REQUEST['mid'];
$bid = $_REQUEST['bid'];
$selectmodel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$mid' "));
$selectquery =mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
?>
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
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
                    <div class="col-4 text-right"><img src="admin/img/<?php echo $selectmodel['product_image'] ?>" class="img-fluid" width="75%" alt=""></div>
                    <div class="col-6">
                        <h1 class="sum-heading pt-4 "><?php echo $selectmodel['product_name'] ?></h1>
                        <p class="qty ">215+ Device Sold with us</p>
                    </div>
                </div>
                <hr>
                <div class="device px-3">
                    <h1 class="sum-heading ">Device Evaluation</h1>
                    <p id="devicedetail"></p>
                    <p id="call"></p>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="" method="post" name="form">
                    <div class="questionborder">
                        <h1 class="pro-det">Tell us a few things about your device!</h1>
                        <h1 class="ques">Does the watch Switch On ?</h1>
                        <div class="row pl-4" id="ynrow">
                            <div class="col-lg-5 col-6"><input id="toggle-yes" class="call" name="call" type="radio" value="yes" required><label for="toggle-yes">Yes</label></div>
                            <div class="col-lg-5 col-6"><input id="toggle-no" class="call" name="call" type="radio" value="no" required><label for="toggle-no">No</label></div>
                        </div>
                        <div class="text-center mt-3" id="noonswitch">
                        <button class="btn contin-btn submit" type="submit" name="query" disabled="disabled" id="postGender">Continue <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <!-- calculation start -->
                    <input type="hidden" id="mid" value="<?php echo $mid ?>">
                    <input type="hidden" id="bid" value=" <?php echo $bid ?>">
                    <!-- calculation end -->
                </form>
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
    <form action="include/calculationen1.php?mid=<?php echo $mid ?>&&bid=<?php echo $bid ?>" method="POST">
    <div class="form-group">
    <input type="hidden" id="callen" name="switch" value="">
    <input type="hidden" id="waren" name="warin" value="">
    <input type="hidden" id="userid" name="uid" value="" required>
    <input type="text" class="form-control py-2 px-2 my-3" name="name" id="name" placeholder=" Enter your Name" required>
    <input type="text" id="code" name="code" class="form-control py-2 px-2 my-3" placeholder=" Code" required>
    <button type="submit" name="query" class="form-control col-lg-6 col-10 py-2 px-2 mx-auto my-3"><b> Verify OTP </b></button>
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
<!-- model box end -->
<?php include 'footer1.php' ?>
<script>
    $("input:radio").change(function() {
        $("#postGender").prop("disabled", false);
    });
</script>
<?php
 if(isset($_SESSION['user'])){
?>
<script>
    $(document).ready(function() {
        $('.call').click(function(){
            var call = $("input[type=radio][name=call]:checked").val();
            var mid = $("#mid").val();
            var bid = $("#bid").val();
            if(call == "yes"){
                $('#noonswitch').html('<input type="hidden" id="callin" name="switch" value=""><button class="btn contin-btn submit" type="submit" name="query" id="postGender">Continue <i class="fas fa-arrow-right"></i></button>');
                $('#devicedetail').html("Does the watch Switch On?");
                $('#call').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>yes");
                $('#callin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>yes");  
                document.form.action = "tabletfunctional.php?mid="+mid+"&&bid="+bid;
            } else if (call == "no"){
                $('#noonswitch').html('<input type="hidden" id="callin" name="switch" value=""><input type="hidden" id="waren" name="warin" value=""><button class="btn contin-btn submit" type="submit" name="query" id="postGender">Continue <i class="fas fa-arrow-right"></i></button>');
                $('#devicedetail').html("Does the watch Switch On?");
                $('#call').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no");
                $('#callin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no");
                $('#waren').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of warrenty");
                document.form.action = "include/calculationtablet1.php?mid="+mid+"&&bid="+bid; 
            }
        }) 
    });
</script>
<?php
 }else{
?>
<script>
    $(document).ready(function(){
        $('.call').click(function() {
            var call = $("input[type=radio][name=call]:checked").val();
            var mid = $("#mid").val();
            var bid = $("#bid").val();
            if (call == "yes") {
                $('#noonswitch').html('<input type="hidden" id="callin" name="switch" value=""><button class="btn contin-btn submit" type="submit" name="query" id="postGender">Continue <i class="fas fa-arrow-right"></i></button>');
                $('#devicedetail').html("Does the watch Switch On?");
                $('#call').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>yes");
                $('#callin').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>yes");  
                document.form.action = "tabletfunctional.php?mid="+mid+"&&bid="+bid;
            } else if (call == "no") {
                $('#noonswitch').html('<a data-toggle="modal" data-target="#myModal2"><button class="btn contin-btn"> Continue <i class="fas fa-arrow-right"></i></button></a>');
                $('#devicedetail').html("Does the watch Switch On?");
                $('#call').html("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no");
                $('#callen').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>no");
                $('#waren').val("<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>out of warrenty");
                // document.form.action = "watchfunctional.php?mid=" + mid + "&&bid=" + bid; 
            }
        }) 
    });
</script>
<?php
}
?>
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