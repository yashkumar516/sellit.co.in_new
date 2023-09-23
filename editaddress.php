<?php include 'hideheader.php' ?>
<?php
if (isset($_REQUEST['enid']) && isset($_REQUEST['uid']) && isset($_REQUEST['id'])) {
   $enqid = $_REQUEST['enid'];
   $id = $_REQUEST['id'];
   $uid = $_REQUEST['uid'];
   $fetchaddress = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `address1` WHERE `id` = '$id' "));
}
if (isset($_POST['submit'])) {
   $location = $_POST['location'];
   $flatno = $_POST['flatno'];
   $landmark = $_POST['landmark'];
   $pincode = $_POST['pincode'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $type = $_POST['type'];
   $insertquery = mysqli_query($con, "UPDATE `address1` SET `location`='$location',`flatno`='$flatno',`landmark`='$landmark',`pincode`='$pincode',`city`='$city',
     `state`='$state',`addtype`='$type' WHERE `id` = '$id'");
   if ($insertquery) {
      echo "<script>
            window.location.href='addaddress.php?enid='+$enqid+'&&uid='+$uid;
           </script>";
   } else {
      echo '<script>
      alert(" not inserted ");
     </script>';
   }
}
?>
<section>
   <div class="container dash-detail">
      <div class="col-xl-9 col-lg-9 col-12 card">
         <div class="row shadow py-5">
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
               <div class="nav col nav-pills col-lg-12 col-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a href="#tab3" class="nav-link square-pill mb-3  mr-3 col-lg-12 active" id="Ingredients-tab" data-toggle="pill" role="tab" aria-controls="Ingredients-tab" aria-selected="false">
                     Saved Addresses
                  </a>
               </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-12 tab-content-detail mb-2">
               <div class="tab-content" id="v-pills-tabContent">

                  <div class="tab-pane fade show active" id="tab3" role="tabpanel" aria-labelledby="Ingredients-tab">
                     <div class="row">
                        <div class="col-lg-11 mx-auto add-form">
                           <form action="" method="post">
                              <div class="form-group">
                                 <input type="text" class="form-control" name="location" placeholder="Enter Address" value="<?php echo $fetchaddress['location'] ?>" required>
                              </div>
                              <div class="form-group">
                                 <input type="text" class="form-control" name="flatno" placeholder="Enter flat no/ office/ floor*" value="<?php echo $fetchaddress['flatno'] ?>" required>
                              </div>
                              <div class="form-group">
                                 <input type="text" class="form-control" name="landmark" placeholder="Land mark*" value="<?php echo $fetchaddress['landmark'] ?>" required>
                              </div>
                              <div class="form-group">
                                 <input type="text" class="form-control" id="pin" name="pincode" value="<?php echo $fetchaddress['pincode'] ?>" placeholder="Pincode*" maxlength="6" onkeyup="validateInput(event)" required>
                                 <span id="error"></span>
                              </div>
                              <div class="form-group">
                                 <input type="text" class="form-control" name="city" id="citdy" placeholder="City*" value="<?php echo $fetchaddress['city'] ?>" readonly required>
                              </div>
                              <div class="form-group">
                                 <input type="text" class="form-control" name="state" id="statedy" placeholder="State*" value="<?php echo $fetchaddress['state'] ?>" readonly required>
                              </div>
                              <p class="save-as">Save as</p>
                              <?php
                              if ($fetchaddress['addtype'] == "Home") {
                              ?>
                                 <label class="radio-inline pl-3">
                                    <input type="radio" name="type" value="Home" checked> Home
                                 </label>
                                 <label class="radio-inline pl-3">
                                    <input type="radio" name="type" value="Office"> Office
                                 </label>
                                 <label class="radio-inline pl-3">
                                    <input type="radio" name="type" value="Other"> Other
                                 </label>
                              <?php
                              } elseif ($fetchaddress['addtype'] == "Office") {
                              ?>
                                 <label class="radio-inline pl-3">
                                    <input type="radio" name="type" value="Home"> Home
                                 </label>
                                 <label class="radio-inline pl-3">
                                    <input type="radio" name="type" value="Office" checked> Office
                                 </label>
                                 <label class="radio-inline pl-3">
                                    <input type="radio" name="type" value="Other"> Other
                                 </label>
                              <?php
                              } elseif ($fetchaddress['addtype'] == "Other") {
                              ?>
                                 <label class="radio-inline pl-3">
                                    <input type="radio" name="type" value="Home"> Home
                                 </label>
                                 <label class="radio-inline pl-3">
                                    <input type="radio" name="type" value="Office"> Office
                                 </label>
                                 <label class="radio-inline pl-3">
                                    <input type="radio" name="type" value="Other" checked> Other
                                 </label>
                              <?php
                              }
                              ?>
                              <div class="pt-3">
                                 <button type="submit" id="sibm" name="submit" class="btn conti-btn">Continue</button>

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
</section>

<?php include 'footer1.php' ?>

<script>
   $(document).ready(function() {
      $('#pin').change(function() {
         var pin = $('#pin').val();
         if (pin != '') {
            $.ajax({
               type: 'POST',
               url: 'pinverification.php',
               data: 'pin=' + pin,
               dataType: 'html',
               success: function(msg) {
                  var data = jQuery.parseJSON(msg);
                  if (data['error'] == "no") {
                     $('#sibm').removeAttr("disabled", "disabled");
                     $('#error').html('<p class="text-success">we are available at this location</p>');
                     $('#statedy').val(data['state']);
                     $('#citdy').val(data['city']);
                  } else {
                     $('#sibm').attr("disabled", "disabled");
                     $('#error').html('<p class="text-danger">We are currently available in Delhi NCR only</p>')
                  }
               }
            });
         }
      })
   })
</script>

<script>
   function validateInput(event) {
      var input = event.target;
      var value = input.value;
      var digitsOnly = value.replace(/\D/g, '');
      input.value = digitsOnly;
   }
</script>