<?php include 'hideheader.php' ?>
<?php
if (isset($_REQUEST['enid']) && isset($_REQUEST['uid'])) {
   $enqid = $_REQUEST['enid'];
   $uid = $_REQUEST['uid'];
   $selectacountdetail = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `useraccount` WHERE  `userid` = '$uid'"));
}
if (isset($_POST['account'])) {
   $accountno = $_POST['accountno'];
   $conaccountno = $_POST['conaccountno'];
   $benefiname = $_POST['benefiname'];
   $ifsc = $_POST['ifsc'];
   $bankname = $_POST['bankname'];
   if ($accountno == $conaccountno) {
      $insertbank = mysqli_query($con, "INSERT INTO `useraccount` (`userid`,`enquiryid`,`accountno`,`confirmaccountno`,`beneficiarname`,`ifsc`,`bankname`)
                                                 VALUES('$uid','$enqid','$accountno','$conaccountno','$benefiname','$ifsc','$bankname')");
      if ($insertbank) {
         echo "<script>
           window.location.href = 'selling-price.php?enid='+$enqid;
          </script>";
      }
   } else {
      echo "<script>
            alert('your acount number not mathced with confirm account number');
     </script>";
   }
} elseif (isset($_POST['upi'])) {
   $upi = $_POST['upiid'];
   $insertupi = mysqli_query($con, "INSERT INTO `useraccount` (`userid`,`enquiryid`,`upi`)
                                                 VALUES('$uid','$enqid','$upi')");
   if ($insertupi) {
      echo "<script>
           window.location.href = 'selling-price.php?enid='+$enqid;
          </script>";
   }
} elseif (isset($_POST['paytm'])) {
   $paytm = $_POST['paytmno'];
   $insertpaytm = mysqli_query($con, "INSERT INTO `useraccount` (`userid`,`enquiryid`,`paytm`)
   VALUES('$uid','$enqid','$paytm')");
   if ($insertpaytm) {
      echo "<script>
      window.location.href = 'selling-price.php?enid='+$enqid;
    </script>";
   }
}
?>
<section>
   <?php
   if ($selectacountdetail != null) {
   ?>
      <div class="container dash-detail">
         <div class="col-xl-9 col-lg-9 col-12 card">
            <div class="row shadow py-5">
               <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="nav col nav-pills col-lg-12 col-12" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                     <a href="#tab3" class="nav-link square-pill mb-3 text-uppercase  mr-3 col-lg-12 active"
                        id="Ingredients-tab" data-toggle="pill" role="tab" aria-controls="Ingredients-tab"
                        aria-selected="false">
                        bank transfer
                     </a>
                     <!-- <a href="#tab1" class="nav-link square-pill mb-3 mr-3 text-uppercase col-lg-12 " id="vision-tab" data-toggle="pill" role="tab" aria-controls="vision-tab" aria-selected="true">
                  upi
               </a> -->
                     <!-- <a href="#tab2" class="nav-link square-pill mb-3 text-uppercase mr-3 col-lg-12 " id="mission-tab" data-toggle="pill" role="tab" aria-controls="mission-tab" aria-selected="false">-->
                     <!--    paytm-->
                     <!-- </a>   -->
                  </div>
               </div>
               <div class="col-lg-9 col-md-9 col-sm-12 col-12 tab-content-detail mb-2">
                  <div class="tab-content" id="v-pills-tabContent">
                     <div class="tab-pane fade show " id="tab1" role="tabpanel" aria-labelledby="vision-tab">
                        <div class="row">
                           <div class="col-lg-11 mx-auto add-form">
                              <form method="post">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="upiid"
                                       value="<?php echo $selectacountdetail['upi'] ?>" placeholder="UPI id*"
                                       rerquired>
                                 </div>

                                 <div class="pt-3">
                                    <button type="submit" name="upi" class="btn conti-btn">Continue</button>
                                 </div>
                              </form>

                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade " id="tab2" role="tabpanel" aria-labelledby="mission-tab">
                        <div class="row">
                           <div class="col-lg-11 mx-auto add-form">
                              <form method="post">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="paytmno"
                                       value="<?php echo $selectacountdetail['paytm'] ?>"
                                       placeholder="Enter your mobile number*" required>
                                 </div>
                                 <div class="pt-3">
                                    <button type="submit" name="paytm" class="btn conti-btn">Continue</button>

                                 </div>
                              </form>

                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade show active" id="tab3" role="tabpanel"
                        aria-labelledby="Ingredients-tab">
                        <div class="row">
                           <div class="col-lg-11 mx-auto add-form">
                              <form method="post">
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="accountno"
                                       onkeyup="validateInput(event)" name="accountno"
                                       placeholder="Account No*"
                                       value="<?php echo $selectacountdetail['accountno'] ?>" maxlength="16"
                                       required>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="conaccountno"
                                       onkeyup="validateInput(event)" name="conaccountno"
                                       placeholder="Confirm Account no*"
                                       value="<?php echo $selectacountdetail['confirmaccountno'] ?>"
                                       maxlength="16" required>
                                    <p class="conaccountno"></p>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="befname" readonly
                                       name="benefiname" placeholder="Beneficiary Name*"
                                       value="<?php echo $selectacountdetail['beneficiarname'] ?>" required>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="ifscode" name="ifsc"
                                       placeholder="IFSC Code*"
                                       value="<?php echo $selectacountdetail['ifsc'] ?>" required>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="bankname"
                                       placeholder="Bank Name*"
                                       value="<?php echo $selectacountdetail['bankname'] ?>" required>
                                 </div>

                                 <div class="pt-3">
                                    <button type="submit" name="account" id="banksubmit"
                                       class="btn conti-btn ">Continue</button>
                                    <p class="banksubmit"></p>
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
   <?php
   } else {
   ?>
      <div class="container dash-detail">
         <div class="col-xl-9 col-lg-9 col-12 card">
            <div class="row shadow py-5">
               <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="nav col nav-pills col-lg-12 col-12" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                     <a href="#tab3" class="nav-link square-pill mb-3 text-uppercase  mr-3 col-lg-12 active"
                        id="Ingredients-tab" data-toggle="pill" role="tab" aria-controls="Ingredients-tab"
                        aria-selected="false">
                        bank transfer
                     </a>
                     <!--<a href="#tab1" class="nav-link square-pill mb-3 mr-3 text-uppercase col-lg-12 " id="vision-tab" data-toggle="pill" role="tab" aria-controls="vision-tab" aria-selected="true">-->
                     <!--    upi-->
                     <!-- </a>-->
                     <!-- <a href="#tab2" class="nav-link square-pill mb-3 text-uppercase mr-3 col-lg-12 " id="mission-tab" data-toggle="pill" role="tab" aria-controls="mission-tab" aria-selected="false">-->
                     <!--    paytm-->
                     <!-- </a>   -->
                  </div>
               </div>
               <div class="col-lg-9 col-md-9 col-sm-12 col-12 tab-content-detail mb-2">
                  <div class="tab-content" id="v-pills-tabContent">
                     <div class="tab-pane fade show " id="tab1" role="tabpanel" aria-labelledby="vision-tab">
                        <div class="row">
                           <div class="col-lg-11 mx-auto add-form">
                              <form method="post">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="upiid" placeholder="UPI id*"
                                       rerquired>
                                 </div>

                                 <div class="pt-3">
                                    <button type="submit" name="upi" class="btn conti-btn ">Continue</button>

                                 </div>
                              </form>

                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade " id="tab2" role="tabpanel" aria-labelledby="mission-tab">
                        <div class="row">
                           <div class="col-lg-11 mx-auto add-form">
                              <form method="post">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="paytmno"
                                       placeholder="Enter your mobile number*" required>
                                 </div>
                                 <div class="pt-3">
                                    <button type="submit" name="paytm" class="btn conti-btn">Continue</button>

                                 </div>
                              </form>

                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade show active" id="tab3" role="tabpanel"
                        aria-labelledby="Ingredients-tab">
                        <div class="row">
                           <div class="col-lg-11 mx-auto add-form">
                              <form method="post">
                                 <div class="form-group">
                                    <input type="text" class="form-control" onkeyup="validateInput(event)"
                                       id="accountno" name="accountno" placeholder="Account No*" maxlength="16"
                                       required>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" onkeyup="validateInput(event)"
                                       id="conaccountno" name="conaccountno" placeholder="Confirm Account no*"
                                       maxlength="16" required>
                                    <p class="conaccountno"></p>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="befname" readonly
                                       name="benefiname" placeholder="Beneficiary Name*" required>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="ifscode" name="ifsc"
                                       placeholder="IFSC Code*" required>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="bankname"
                                       placeholder="Bank Name*" required>
                                 </div>

                                 <div class="pt-3">
                                    <button type="submit" name="account" id="banksubmit" class="btn conti-btn"
                                       disabled>Continue</button>
                                    <p class="banksubmit"></p>
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
   <?php
   }
   ?>
</section>

<?php include 'footer1.php' ?>

<script>
   $(document).ready(function() {
      $('#accountno,#conaccountno,#ifscode').change(function() {
         var accountno = $("#accountno").val();
         var ifscode = $("#ifscode").val();
         if (accountno != '' && ifscode != '') {
            $.ajax({
               url: "bankverify.php",
               method: 'POST',
               data: {
                  accountno: accountno,
                  ifscode: ifscode
               },
               cache: false,
               success: function(html) {
                  var arr = html.split("#");
                  if (arr[0] == 200) {
                     $('#befname').val(arr[1]);
                     $('#banksubmit').removeAttr('disabled');
                     $('.banksubmit').html(
                        '<span class="text-success" >Verified Account Successfully</span>'
                     );
                  } else {
                     $('#banksubmit').attr('disabled');
                     $('.banksubmit').html(
                        '<span class="text-danger" >Account not verified</span>');
                  }
               }
            });
         }
      })
   })
</script>

<script>
   $(document).ready(function() {
      $('#conaccountno, #accountno').keyup(function() {
         var accountno = $("#accountno").val();
         var conaccountno = $("#conaccountno").val();
         if ((accountno != '' && conaccountno != '') && (accountno != conaccountno)) {
            $('.conaccountno').html(
               '<span class="text-danger">confirm account number not matched</span>');
         } else {
            $('.conaccountno').html('<span class="text-success"></span>');
         }
      });
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