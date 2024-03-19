<?php include 'header.php' ?>
 <?php 
 if(isset($_REQUEST['enid'])){
     $enqid = $_REQUEST['enid'];
     $selectenqid = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `enquiry` WHERE `id` = '$enqid' "));
 }
?>
<section>
    <div class="container">
            <div class="okay text-center">
            <i class="far fa-check-circle"></i>
            </div>
            <div class="thanku d-flex justify-content-center">
            <h2 class="text-center">Thank You!</h2>
            </div>
            <div class="ord-conf text-center">
            <p class="">Your order has been confirmed</p>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="service-detail">
                        <h3 class="service-heading">Service Details</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <p class="service-number">Device Name</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end"><?= $selectenqid['model_name'] ?></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <p class="service-number">Order Number</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">Generated</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <p class="service-number">Selling Price</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">₹<?= $selectenqid['offerprice'] ?></div>
                        
                    </div>
                </div>
            </div>
    </div>
</section>

<?php include 'footer1.php' ?>

