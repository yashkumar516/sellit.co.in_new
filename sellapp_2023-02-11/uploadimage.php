<?php include 'header.php' ?>
<?php 
if(isset($_REQUEST['enid']) && isset($_REQUEST['uid'])){
    $enqid = $_REQUEST['enid'];
    $uid = $_REQUEST['uid'];
    $enquirydetail = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `enquiry` WHERE `id` = '$enqid' "));
}

if(isset($_POST['submit'])){
    $deviceimg = str_replace(" ","_",$_FILES['image']['name']);
      move_uploaded_file($_FILES['image']['tmp_name'], "admin/img/".str_replace(" ","_",$_FILES['image']['name']));
    $query = mysqli_query($con,"UPDATE `enquiry` SET `modelimage` = '$deviceimg' WHERE `id` = '$enqid' ") ;
    if($query){
      echo "<script>
            window.location.href = 'addaddress.php?enid='+$enqid+'&&uid='+$uid;
        </script>";
    }else{
        echo '<script>
           alert("image not inserted  ");
        </script>';
    }
}

?>
<section class="product-detail text-left py-5">
    <div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 uploadimage">
                <h1 class="upload-heading mb-0">Upload Image</h1>
                <!--<p class="sub-heading">Device Invoice</p>-->
                <h1 class="uploade-page my-3">Please upload your device invoice</h1>
                <div class="row">
                <div class="upload-btn-wrapper col-7 col-lg-6" for="myfile">
                    <button class="btn"><i class="fas fa-plus-circle"></i> <br><p class="">Click to Upload</p>
                    <input type="file" name="image" class="deviceimage" id="myfile" value="" />
                    </button>
                </div>
              
                <div class="upload-btn-wrapper col-4 col-lg-5 text-center" id="imagepreview"> 
                <img src="" alt="img-preview" class="image-preview_image" width="180px" height="130px">
                </div>
                </div>
            </div>
            
            <div class="col-lg-5 col-md-5 col-sm-12 col-12 d-flex justify-content-end price-summary">
                <div class="card">
                    <h1>Price Summary</h1>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2">
                            <p class="charges">Base Price</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2 d-flex justify-content-end">
                            <p class="rate"> <strong> ₹<?php  echo $enquirydetail['offerprice'] ?></strong></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2">
                            <p class="charges">Pickup Charges</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2 d-flex justify-content-end">
                            <p class="rate">Free <strike>₹100</strike></p>
                        </div>
                     
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2">
                            <p class="charges">Total Amount</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-2 d-flex justify-content-end">
                            <p class="rate"><strong>₹<?php  echo $enquirydetail['offerprice'] ?></strong></p>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                      <button type="submit" name="submit" class="btn contin-btn">Get Paid  <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            </div>
      </form>
    </div>
</section>

<?php include 'footer1.php' ?>

<script>
    const myfile = document.getElementById("myfile");
    const previewContainer = document.getElementById("imagepreview");
    const previewimage = previewContainer.querySelector(".image-preview_image");
    const image = previewContainer.querySelector(".deviceimage");

    myfile.addEventListener("change",function(){
         const file = this.files[0];
         if(file){
             const reader = new FileReader();
             reader.addEventListener("load", function(){
                previewimage.setAttribute("src", this.result);
                image.setAttribute("value", this.result);
             });

             reader.readAsDataURL(file);
         }
    });
</script>
