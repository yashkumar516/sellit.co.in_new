<?php include 'header.php' ?>
<?php
   // if(isset($_POST['query'])){
   //     $name = $_POST['name'];
   //     $email = $_POST['email'];
   //     $phone = $_POST['phone'];
   //     $reason = $_POST['reason'];
   //     $messege = $_POST['messege'];
   //     if( preg_match("/^[a-zA-Z-' ]*$/",$name) && !strstr( $name, 'http' ) && preg_match("/^[a-zA-Z-' ]*$/",$messege) 
   //      && !strstr( $messege, 'http' )){
   //     $querycontact = mysqli_query($con,"INSERT INTO `query`(`name`,`email`,`phone`,`reason`,`messege`)
   //     VALUES('$name','$email','$phone','$reason','$messege')");
   //     if($querycontact){
   //         echo '<script>
   //        alert("ssubmitted successfully");
   //        window.location.href = "'.$_SERVER['HTTP_REFERER'].'";
   //        </script>';  
   //     }else{
   //         echo '<script>
   //        alert("try again");
   //        window.location.href = "'.$_SERVER['HTTP_REFERER'].'";
   //        </script>';  
   //     }
   //     }else{
   //       echo '<script>
   //        alert("special character and urls not allowed");
   //        window.location.href = "'.$_SERVER['HTTP_REFERER'].'";
   //        </script>'; 
   //     }
   // }
   ?>
<section class="py-5" style="background-color: #f1f8f8;">
    <div class="container sell">
        <div class="col-lg-12 col-12  mx-auto card">
            <div class="row" id="sell">
                <div class="col-lg-12 col-12">
                    <form method="post" class="p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" required="" name="name" placeholder="Your Name"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required="" name="email" placeholder="Your Email"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="number" maxlength="10" class="form-control" name="phone" placeholder="Phone"
                                required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" required name="reason">
                                <option class="form-control">Screen Replacment</option>
                                <option class="form-control">Order related issue</option>
                                <option class="form-control">Money Refund</option>
                                <option class="form-control">Claim Warranty</option>
                                <option class="form-control">Technician related issue</option>
                                <option class="form-control">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea id="" cols="30" rows="7" class="form-control" name="messege"
                                placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" name="query" class="btn py-3 px-5 text-white"
                                style="background-color:#23699D;">
                        </div>
                    </form>
                </div>
                <div class="col-lg-12 col-12">
                    <h5> <b>Address:</b> </h5>
                    <h6>CUDA TECH</h6>
                    <p>H NO. 1G -44, BP, FARIDABAD - 999, FARIDABAD,
                        Faridabad, Haryana, 121001 <br> Contact : 6262616060 </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer1.php' ?>