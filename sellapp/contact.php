<?php include 'header.php' ?>
<?php
 if(isset($_POST['query'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $reason = $_POST['reason'];
     $messege = $_POST['messege'];
     $querycontact = mysqli_query($con,"INSERT INTO `query`(`name`,`email`,`phone`,`reason`,`messege`)
     VALUES('$name','$email','$phone','$reason','$messege')");
 }
?>
<section class="py-5" style="background-color: #f1f8f8;">
    <div class="container sell">

        <div class="col-lg-12 col-12  mx-auto card">
<div class="row" id="sell">
 <div class="col-lg-12 col-12">
<form method="post" class="p-5 contact-form">
<div class="form-group">
<input type="text" class="form-control" required="" name="name" placeholder="Your Name" required>
</div>
<div class="form-group">
<input type="text" class="form-control" required="" name="email" placeholder="Your Email" required>
</div>
<div class="form-group">
<input type="text" maxlength="10" class="form-control" name="phone" placeholder="Phone" required>
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
<textarea id="" cols="30" rows="7" class="form-control" name="messege" placeholder="Message"></textarea>
</div>
<div class="form-group">
<input type="submit" value="Send Message" name="query" class="btn py-3 px-5 text-white" style="background-color:#23699D;" >
</div>
</form>
</div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer1.php' ?>

