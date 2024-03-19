<?php include 'header.php' ?>
<?php 
  if(isset($_REQUEST['enid']) && isset($_REQUEST['uid'])){
      $enquid = $_REQUEST['enid'];
      $uid = $_REQUEST['uid'];
      $seleenq = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `enquiry` WHERE `id` = '$enquid' "));
    $offerprice = $seleenq['offerprice'];
  }

  if(isset($_POST['appointment'])){
    if(isset($_POST['son'])){
    $soon = $_POST['son'];
    }else{
       $soon = '';  
    }
    if(isset($_POST['day'])){
      $dayt = $_POST['day'];   
    }else{
      $dayt = '';  
    }
    if(isset($_POST['chooseday'])){
    $chooseday = $_POST['chooseday'];
    }else{
    $chooseday = '';   
    }
    
    // new start
     if(!empty($dayt)){
         $date = date("y",strtotime($dayt));
         $year = date("d",strtotime($dayt));
         $m = date("m",strtotime($dayt));
         $day = date("F", mktime(0, 0, 0, $m, $year));
     }else{
          $date = date("d",strtotime($chooseday));
         $year = date("y",strtotime($chooseday));
          $m = date("m",strtotime($chooseday));
         $day = date("F", mktime(0, 0, 0, $m, $year));
     }
    // new end
      if(isset($_POST['time'])){
      $time = $_POST['time'];
      }else{
      $time = '';  
      }
    $insert = mysqli_query($con,"UPDATE `address` SET `soon`='$soon',`choseday`='$chooseday',`day`='$date',`day1`='$day',`year`='$year',`time`='$time' WHERE `uid` = '$uid' AND `enquid` = '$enquid'");
    if($insert){
      echo "<script>
        window.location.href='payment.php?enid='+$enquid+'&&uid='+$uid;
        </script>";
    }
  }
?>
<section class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto" >
            <form method="post">
           <div class="row" >
            <div class="col-lg-7 col-md-7 col-sm-12 col-12 appointment">
                <h1 class="appointment-heading ">Schedule Appointment</h1>                
                <p class="sub-heading"> <input type="checkbox"  id="mycheck"  name="son" value="As soon as possible" onclick="myfunction()" > As soon as possible</p>
                <hr>
                <div id="shi">
                <h1 class="appointment-heading ">Please select your preferable pickup date</h1>   
                <div class="row pt-3">
                    <?php
                    $m = date("m"); // Month value
                    $de = date("d"); //today's date
                    $y = date("Y"); // Year value
                    $oneday =  mktime(0,0,0,$m,($de+1),$y); 
                    $twoday =  mktime(0,0,0,$m,($de+2),$y);  
                    ?>
                      <div class="col-lg-3 col-6">
                      <input id="toggle1" class="notrequired" name="day" type="radio" value="<?php echo date("d-m-y") ?>"><label for="toggle1"><?php echo date('d l') ?></label>
                    </div>
                    <div class="col-lg-3 col-6">
                        <input id="toggle2" class="notrequired" name="day" type="radio" value="<?php echo date("d-m-y", $oneday) ?>" ><label for="toggle2"><?php echo date('d l', $oneday) ?></label>
                    </div>
                    <div class="col-lg-3 col-6">
                        <input id="toggle3" class="notrequired" name="day" type="radio" value="<?php echo date("d-m-y", $twoday ) ?>" ><label for="toggle3"><?php echo date('d l', $twoday ) ?></label>
                    </div>
                    <div class="col-lg-3 col-6">
                          <input id="toggle4" name="chooseday" type="date">                     
                      </div>
                </div>
                <hr>
                <h1 class="appointment-heading pt-3">Your availability on that day</h1>   
                <div class="row pt-3 label2">
                      <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                      <input id="toggle5" class="notrequired" name="time" type="radio" value="10:00AM-12:00PM" required><label for="toggle5">10:00 AM - 12:00 PM</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <input id="toggle6" class="notrequired" name="time" type="radio" value="12:00AM-02:00PM" required><label for="toggle6">12:00 AM - 02:00 PM</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <input id="toggle7" class="notrequired" name="time" type="radio" value="02:00AM-04:00PM" required><label for="toggle7">02:00 AM - 04:00 PM</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <input id="toggle8" class="notrequired" name="time" type="radio" value="04:00AM-06:00PM" required><label for="toggle8">04:00 AM - 06:00 PM</label>                     
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <input id="toggle9" class="notrequired" name="time" type="radio" value="06:00AM-08:00PM" required><label for="toggle9">06:00 AM - 08:00 PM</label>
                    </div>
                    
                </div>
              </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 price-summary">
                <div class="card">
                    <h1>Price Summary</h1>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6  py-1">
                            <p class="charges">Base Price</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 py-1 d-flex justify-content-end">
                            <p class="rate"> <strong>₹<?= $offerprice ?></strong></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 py-1 col-6">
                            <p class="charges">Pickup Charges</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 py-1 col-6 d-flex justify-content-end">
                            <p class="rate">Free <strike> ₹100 </strike></p>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 py-1 col-6">
                            <p class="charges">Total Amount</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 py-1 col-6 d-flex justify-content-end">
                            <p class="rate"> <strong>₹<?= $offerprice ?></strong></p>
                        </div>
                    </div>
                    <div class="text-center py-2">
                    <button type="submit" name="appointment"  class="btn contin-btn">Get Paid  <i class="fas fa-arrow-right"></i></button>
                   </div>
                </div>
              
            </div>
           </div>
           </form>
            </div>
            </div>
    </div>
</section>

<?php include 'footer1.php' ?>

<!-- checkbox script start -->
<script type="text/javascript">
function myfunction()
{
  var checkBox = document.getElementById("mycheck");
  var text = document.getElementById("shi");
  if (checkBox.checked == true){
    shi.style.display = "none";
  } else {
    shi.style.display = "block";
  }
}
</script>

<!-- checkbox script end -->

<script>
    $(document).ready(function(){
     $("#mycheck").on('click',function(){
        $('.notrequired').removeAttr("required");
     })
    });
</script>