<?php include 'header.php' ?>
<?php
 if(isset($_SESSION['user'])){
    $uid = $_SESSION['user'];
?>
<section>
        <div class="container mt-5">
        <div class=" col-12 card">
        <div class="row shadow py-5">
         <div class="col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="nav col nav-pills col-lg-12 col-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a href="#tab3" class="nav-link square-pill mb-3 text-uppercase mr-3 col-lg-12 active show" id="Ingredients-tab" data-toggle="pill" role="tab" aria-controls="Ingredients-tab" aria-selected="true">
                 orders
               </a>  
              <a href="#tab1" class="nav-link square-pill mb-3 mr-3 text-uppercase col-lg-12" id="vision-tab" data-toggle="pill" role="tab" aria-controls="vision-tab" aria-selected="false">
                  saved address
               </a>
               <a href="#tab2" class="nav-link square-pill mb-3 text-uppercase mr-3 col-lg-12" id="mission-tab" data-toggle="pill" role="tab" aria-controls="mission-tab" aria-selected="false">
                  account details
               </a>   
                 <a href="logout.php" class="nav-link square-pill mb-3 text-uppercase mr-3 col-lg-12" >
                  logout
               </a>  
            </div>
         </div>
         <div class="col-lg-9 col-md-9 col-sm-12 col-12 tab-content-detail mb-2">
            <div class="tab-content" id="v-pills-tabContent">
               <div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="vision-tab">
               <div class="row">
                     <?php
                     $selectadd = mysqli_query($con,"SELECT * FROM `address1` WHERE `uid` = '$uid'  ");
                     while($aradd = mysqli_fetch_assoc($selectadd)){
                   ?>
                     <div class="col-lg-11 userdash mb-2">
                
                        <p class="mb-1"><b>Location:</b>    <?php echo $aradd['location'] ?></p>
                        <p class="mb-1"><b>fatT Number:</b>    <?php echo $aradd['flatno'] ?></p>
                        <p class="mb-1"><b>Land Mark:</b>    <?php echo $aradd['landmark'] ?></p> 
                        <p class="mb-1"><b>Pin Code:</b>   <?php echo $aradd['pincode'] ?></p>
                        <p class="mb-1"><b>City:</b>    <?php echo $aradd['city'] ?></p>
                        <p class="mb-1"><b>State:</b>   <?php echo $aradd['state'] ?></p>
                        <p class="mb-1"><b>Address venue:</b>   <?php echo $aradd['addtype'] ?></p>
                      
                     </div>
                       <?php
                         }
                       ?>
                  </div>
               </div>
               <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="mission-tab">
               <div class="row">
                     <?php
                     $selectacc =  mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `useraccount` WHERE `userid` = '$uid'  "));
                     if($selectacc != null){
                   ?>
                     <div class="col-lg-11 userdash mb-2">
                        <p class="mb-1"><b>Account No:</b>    <?php echo $selectacc['accountno'] ?></p>
                        <p class="mb-1"><b>IFSC :</b>    <?php echo $selectacc['ifsc'] ?></p>
                        <p class="mb-1"><b>Bankname:</b>    <?php echo $selectacc['bankname'] ?></p> 
                        <p class="mb-1"><b>Beneficiarname:</b>   <?php echo $selectacc['beneficiarname'] ?></p>
                        <p class="mb-1"><b>UPI ID:</b>   <?php echo $selectacc['upi'] ?></p>
                        <p class="mb-1"><b>PAYTM NO:</b>   <?php echo $selectacc['paytm'] ?></p>
                      </div>
                      <?php
                       }
                      ?>
                    </div>
                  </div>
                  <div class="tab-pane fade active show" id="tab3" role="tabpanel" aria-labelledby="Ingredients-tab">
               <div class="row">
                     <?php
                     $selectenq = mysqli_query($con,"SELECT * FROM `enquiry` WHERE `userid` = '$uid'  ");
                     while($arenq = mysqli_fetch_assoc($selectenq)){
                   ?>
                     <div class="col-lg-11 userdash mb-2">
                     <div class="row">
                     <div class="col-7" >
                        <p class="mb-1"><b>Date:</b>    <?php echo date('d/m/y',strtotime($arenq['modify_date']))  ?> </p>
                        <p class="mb-1"><b>Mobile Name:</b>    <?php echo $arenq['model_name'] ?></p>
                        <p class="mb-1"><b>Status:</b>    <?php echo $arenq['status'] ?></p> 
                        <p class="mb-1"><b>Sell Amount:</b>   ₹<?php echo $arenq['offerprice'] ?></p>
                       </div>
                       <div class="col-5">
                       <img src="admin/img/<?php echo $arenq['mimg'] ?>" alt="" width="40%">
                       </div>
                      </div>
                     </div>
                       <?php
                         }
                       ?>
                  </div>
         </div>
               </div>
           
      </div>
      </div>
    </div>
        </section>
<?php include 'footer1.php' ?>
<?php
 }else{
   echo "<script>
    window.location.href = 'login.php';
    </script>";
 }?>