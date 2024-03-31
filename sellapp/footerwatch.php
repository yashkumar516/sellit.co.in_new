<style>
  .why-sell-detail {
    font-size: 15px;
    color: black;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    overflow: hidden;
    -webkit-box-orient: vertical;
  }

  .why-sell-detail:hover{
    overflow: visible;
    -webkit-line-clamp: 10;
    -webkit-box-orient: vertical;
}
</style>



<section class="top-selling" style="background-color: #fff;">
  <div class="container top-selling-div">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-12 col-12 mx-auto">
        <div class="row">
          <div class="col-lg-3 col-2"></div>
          <div class="col-lg-6 col-8" id="choosebrand">
            <h1 class="top-sell-heading text-center pb-4"> Top Selling Watches </h1>
          </div>
          <div class="col-lg-3 col-2"></div>
        </div>
      </div>
    </div>
    <div class="owl-carousel owl-carousel-12 owl-theme col-12">
      <?php
      $selectquery = mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `top` = 'active' AND `category_id` = '2' ");
      while ($artop = mysqli_fetch_assoc($selectquery)) {
      ?>
        <div class="item my-3">
          <a href="oldwatch.php?id=<?php echo $artop['id'];  ?>">
            <img src="../admin/img/<?php echo $artop['subcategory_image'];  ?>" class="img-fluid box1" alt="">
          </a>
        </div>
      <?php
      }
      ?>

    </div>
  </div>
</section>

<section class="top-selling" style="background-color: #fff;">
  <div class="container top-selling-div">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-12 col-12 mx-auto">
        <div class="row">
          <div class="col-lg-3 col-2"></div>
          <div class="col-lg-6 col-8" id="choosebrand">
            <h1 class="top-sell-heading text-center pb-4"> Top Selling Models </h1>
          </div>
          <div class="col-lg-3 col-2"></div>
        </div>
      </div>
    </div>
  <!-- </div>
  <div class="container mb-5"> -->
  <div class="owl-carousel owl-carousel-12 owl-theme col-12">
      <?php
      $selectmodel = mysqli_query($con, "SELECT * FROM `product` WHERE `status` = 'active' AND `best` = 'active' AND `categoryid` = '2'");
      while ($armodel = mysqli_fetch_assoc($selectmodel)) {
      ?>
        <div class="item my-3">
          <a href="watchsold.php?id=<?php echo $armodel['id'] ?>&&bid=<?php echo $armodel['subcategoryid'] ?>">
            <div class="text-center" id="md">
              <img src="../admin/img/<?php echo $armodel['product_image'];  ?>" class="img-fluid" alt="">
              <span class="sum-heading1 text-center" style="color:black;"><?php echo $armodel['product_name'] ?></span>
            </div>
          </a>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>

<section class="why-sell" style="background-color: #fff">
  <div class="container why-sell-div">
    <div class="col-lg-12 col-12 mx-auto">
      <div class="row">
        <div class="col-lg-3 col-2"></div>
        <div class="col-lg-6 col-8" id="choosebrand">
          <h1 class="top-sell-heading text-center pb-4"> Why Sell On SELL IT</h1>
        </div>
        <div class="col-lg-3 col-2"></div>
      </div>
    </div>

    <div class="owl-carousel owl-theme col-12">

      <div class=" col-12 mx-1 my-3 text-center">
        <div class="row nice" style="margin-top:-5px; border-radius: 20px; margin-left:1px; margin-right:1px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
          <div class="col-lg-12 col-12">
            <div class="col-6 mx-auto">
            <img src="assets/images/safe.png" alt=""></a>
            </div>
            <h1 class="why-sell-heading"> Safe & Secure </h1>
            <p class="why-sell-detail text-justify">Select your device & we'll help you
              unlock the best selling price based
              on the present conditions of your
              gadget & the current market price.</p>
          </div>
        </div>
      </div>

      <div class=" col-12 text-center">
        <div class="row nice" style="margin-top:10px; border-radius: 20px; margin-left:1px; margin-right:1px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
          <div class="col-lg-12 col-12 ">
            <div class="col-6 mx-auto">
            <a><img src="assets/images/instant.png" alt=""></a>
            </div>
            <h1 class="why-sell-heading"> Instant Payment </h1>
            <p class="why-sell-detail text-justify">On accepting the price offered for your device, we'll arrange a free pick up.
              And instant money will be wired to your account.</p>
          </div>
        </div>
      </div>

      <div class=" col-12 text-center">
        <div class="row nice" style="margin-top:10px; border-radius: 20px; margin-left:1px; margin-right:1px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
          <div class="col-lg-12 col-12 ">
            <div class="col-6 mx-auto" >
            <a><img src="assets/images/bestprice.png" alt=""></a>
            </div>
            <h1 class="why-sell-heading"> Best Price </h1>
            <p class="why-sell-detail text-justify">Instant cash will be handed over to
              you at time of pickupor through
              payment mode of your choice.why-sell-detail text-justify </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="reviewer">
  <div class="col-lg-12 col-12" id="choosebrand">
    <h1 class="top-sell-heading text-center pb-4"> Customer Review</h1>
  </div>
  <div class="container">
      <div class="owl-carousel owl-theme ">
        <?php
        $fetchreview = mysqli_query($con, "SELECT * FROM `product_reviews` WHERE `status` = 'active'  ");
        while ($arrrev = mysqli_fetch_assoc($fetchreview)) {
        ?>
        <div class="col-12 my-3 mx-1" >
        <div class="row p-3 nice" style="margin-top:10px; border-radius: 20px;
         margin-left:1px; margin-right:1px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
         height:270px;overflow:hidden;"> 
     
              <div class="col-lg-2 col-2 px-0">
                <img src="assets/images/face.png" alt="" class="img-fluid" width="59px">
              </div>
              <div class="col-lg-5 col-8 mb-0  pb-0">
                <h6 class="reviwer-name"><?php echo $arrrev['rname'] ?></h6>
                <h1 class="reviewer-heading"><?php echo $arrrev['rcity'] ?></h1>
              </div>
              <div class="col-4 col-lg-5 reviewer-rating d-flex justify-content-end px-0">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </div>
            <div class="col-12">
            <p class="why-sell-detail text-justify">
              <?php echo $arrrev['rmsg'] ?>
              </p>
            </div>
        </div>
          </div>
        <?php
        }
        ?>
      </div>
  </div>
<?php
if(isset($_SESSION['user'])){
?>
  <div class="text-center" style="margin-top: 40px;">
    <button class="btn brand-btn sm-brand mt-3" style="background-color: #fff; color: black;" data-toggle="modal" data-target=".bd-example-modal-lg">Write Review</button>
  </div>
<?php
}else{
  ?>
 <div class="text-center d-none" style="margin-top: 40px;">
    <button class="btn brand-btn sm-brand mt-3" style="background-color: #fff; color: black;" data-toggle="modal" data-target=".bd-example-modal-lg">Write Review</button>
  </div>
<?php 
}
?>
  </div>
</section>

<section class="wht-new" style="background-color: #fff">
  <div class="container">
    <div class="col-lg-11 mx-auto wht-new-div">
      <h6 class="">What’s new</h6>
      <div class="row ">
        <div class="col-lg-3 text-center">
          <img src="assets/images/whts-new.png" alt="" class="img-fluid">
        </div>
        <div class="col-lg-8" id="new">
          <h1 class="">Hello! <br>Get a link to download the app.</h1>
          <p class="">Enter your mobile number to receive the app download link</p>
          <form action="newsletter.php" method="post">
            <div class="row search">
              <div class="input-group col-lg-6 col-8" style="height: 5px;">
                <input type="number" class="form-control mob-no" style="border-color: #8b99a7;" placeholder="Enter Mobile Phone" name="newsletter">
              </div>

              <div class="text-center col-lg-3 col-2">
                <button class="btn brand-btn sm-brand" name="newsuser" style="background-color: #fff;padding:4px; margin-top:8px; padding: 8px; padding-left: 14px; padding-right: 14px; font-size: 15px;">Send Link<i aria-hidden="true"></i></button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- rating model box -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content py-5">
      <h4 class="text-center" style="color:#23699D;"> Please Give your Reviews And Rating.. </h4>
      <hr>
      <div class="container px-5">
        <form action="reviews.php" method="post">
          <div class="form-group">
            <div class="rateyo" id="rating" data-rateyo-rating="0" data-rateyo-num-stars="5" data-rateyo-score="3">
            </div>
            <span class='result'>0</span>
            <input type="hidden" name="rating" value="">
          </div>
          <div class="form-group my-1">
            <input type="text" name="rname" class="form-control" placeholder="Enter Your Name" style="color:#23699D;" required>
          </div>
          <div class="form-group my-1">
            <input type="text" name="rcity" class="form-control" placeholder="Enter Your City" style="color:#23699D;" required>
          </div>
          <div class="form-group my-1">
            <textarea class="form-control" name="msg" placeholder="please write your riview" maxlength = "200" style="color:#23699D;" required></textarea>
          </div>
          <div class="form-group text-center">
            <button type="submit" class="btn text-white" name="review" style="background-color:#23699D;">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- rating model box end -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<!-- rating script -->
<script>
  $(function() {
    $("#rating").rateYo({
      ratedFill: "#23699D"
    });

  })
</script>
<script>
  $(function() {
    $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
      var rating = data.rating;
      $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
      $(this).parent().find('.result').text('Rating :' + rating);
      $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
    });

  });
</script>

<!-- rating script end -->

<script>
  $('.owl-carousel-12').owlCarousel({
    loop:true,
    margin:12,
    // nav:true,
    responsive:{
        0:{
            items:3
        },
        600:{
            items:4
        },
        1000:{
            items:6
        }
    }
})
</script>

<script>
  $('.owl-carousel').owlCarousel({
    // loop:true,
    margin: 12,
    // nav:true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  })
</script>

</body>

</html>

<script>
  $(document).ready(function() {
    $("#modalsearch").keyup(function() {
      var search = $("#modalsearch").val();
      if (search != '') {
        $.ajax({
          method: "post",
          url: "modalfound.php",
          data: {
            search: search
          },
          dataType: "html",
          success: function(result) {
            $('#ajaxresponse').fadeIn();
            $("#filter").css("display", "block");
            $('#ajaxresponse').html(result);
          }
        });
      } else {
        $('#ajaxresponse').fadeOut();
        $("#filter").css("display", "none");
        $('#ajaxresponse').html("");
      }
    });
    $("#modalsearch").focusout(function() {
      $('#ajaxresponse').fadeOut();
        $('#modalsearch').val("");
    })
  });
</script>

<script>
  $(document).ready(function() {
    $("#searchmobile").keyup(function() {
      var search = $("#searchmobile").val();
      if (search != '') {
        $.ajax({
          method: "post",
          url: "modalfound1.php",
          data: {
            search: search
          },
          dataType: "html",
          success: function(result) {
            $('.filter').fadeIn();
            $(".filter").css("display", "block");
            $('.response').html(result);
          }
        });
      } else {
        $('.filter').fadeOut();
        $(".filter").css("display", "none");
        $('.response').html("");
      }
    })
    $("#searchmobile").focusout(function() {
      $('.filter').fadeOut();
        $('#searchmobile').val("");
    })
  });
</script>

<script>
  $(document).ready(function() {
    $("#userpic").on('click', function() {
      $("#prof").toggle();
    });
  });
</script>
<script>
  // Instantiate the Bootstrap carousel
  $('.multi-item-carousel').carousel({
    interval: false
  });

  // for every slide in carousel, copy the next slide's item in the slide.
  // Do the same for the next, next item.
  $('.multi-item-carousel .item').each(function() {
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    if (next.next().length > 0) {
      next.next().children(':first-child').clone().appendTo($(this));
    } else {
      $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
  });
</script>