<?php include 'header.php' ?>
<?php 
  if(isset($_REQUEST['uid']) && isset($_REQUEST['enid'])){
     $enqid = $_REQUEST['enid'];
     $uid = $_REQUEST['uid'];
  }
  if(isset($_POST['submit'])){
     $location = $_POST['location'];
     $flatno = $_POST['flatno'];
     $landmark = $_POST['landmark'];
     $pincode = $_POST['pincode'];
     $city = $_POST['city'];
     $state = $_POST['state'];
     $type = $_POST['type'];
     $insertquery = mysqli_query($con,"INSERT INTO `address1` (`uid`,`location`,`flatno`,`landmark`,`pincode`,`city`,`state`,`addtype`)
     VALUES('$uid','$location','$flatno','$landmark','$pincode','$city','$state','$type')");
     if($insertquery){
          echo "<script>
            window.location.href='addaddress.php?enid='+$enqid+'&&uid='+$uid;
           </script>";
     }else{
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
                              <input type="text" class="form-control" name="location" placeholder="Enter Location"  required>
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" name="flatno" placeholder="Enter flat no/ office/ floor*"  required>
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" name="landmark" placeholder="Land mark*"  required>
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" name="pincode" placeholder="Pincode*"  required>
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" name="city" placeholder="City*"  required>
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" name="state" placeholder="State*"  required>
                           </div>
                           <p class="save-as">Save as</p>
                           <label class="radio-inline pl-3">
                              <input type="radio" name="type" value="Home" checked> Home
                           </label>
                           <label class="radio-inline pl-3">
                              <input type="radio" name="type" value="Office"> Office
                           </label>
                           <label class="radio-inline pl-3">
                              <input type="radio" name="type" value="Other"> Other
                           </label>
                           <div class="pt-3">
                           <button type="submit" name="submit" class="btn conti-btn">Continue</button>

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
    

  