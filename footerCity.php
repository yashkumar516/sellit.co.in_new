<section class="top-selling" style="background-color: #fff;">
    <div class="container top-selling-div">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-lg-3 col-2"></div>
                    <div class="col-lg-6 col-8" id="choosebrand">
                        <h3 class="top-sell-heading text-center pb-4"> Top Selling Brands </h3>
                    </div>
                    <div class="col-lg-3 col-2"></div>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-carousel-12 owl-theme col-12">
            <?php
      $queryBrand = mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `top` = 'active' AND `category_id` = '1' ");
      while ($brandData = mysqli_fetch_assoc($queryBrand)) {
      ?>
            <div class="item my-3">
                <a
                    href="/sell-old-mobile-phones/sell-old-<?= strtolower($brandData['subcategory_name']) ?>/<?php echo $brandData['id'];  ?>">
                    <img src="admin/img/<?php echo $brandData['subcategory_image'];  ?>" class="img-fluid box1" alt="">
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
                    <h3 class="top-sell-heading text-center pb-4"> Why Sell On SELL IT</h3>
                </div>
                <div class="col-lg-3 col-2"></div>
            </div>
        </div>

        <div class="owl-carousel owl-theme col-12">

            <div class=" col-12 mx-1 my-3 text-center">
                <div class="row nice"
                    style="margin-top:-5px; border-radius: 20px; margin-left:1px; margin-right:1px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                    <div class="col-lg-12 col-12">
                        <div class="col-6 mx-auto">
                            <img src="assets/images/safe.png" alt=""></a>
                        </div>
                        <h3 class="why-sell-heading"> Safe & Secure </h3>
                        <p class="why-sell-detail text-justify">Select your device & we'll help you
                            unlock the best selling price based
                            on the present conditions of your
                            gadget & the current market price.</p>
                    </div>
                </div>
            </div>

            <div class=" col-12 text-center">
                <div class="row nice"
                    style="margin-top:10px; border-radius: 20px; margin-left:1px; margin-right:1px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                    <div class="col-lg-12 col-12 ">
                        <div class="col-6 mx-auto">
                            <a><img src="assets/images/instant.png" alt=""></a>
                        </div>
                        <h3 class="why-sell-heading"> Instant Payment </h3>
                        <p class="why-sell-detail text-justify">On accepting the price offered for your device, we'll
                            arrange a free pick up.
                            And instant money will be wired to your account.</p>
                    </div>
                </div>
            </div>

            <div class=" col-12 text-center">
                <div class="row nice"
                    style="margin-top:10px; border-radius: 20px; margin-left:1px; margin-right:1px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                    <div class="col-lg-12 col-12 ">
                        <div class="col-6 mx-auto">
                            <a><img src="assets/images/bestprice.png" alt=""></a>
                        </div>
                        <h3 class="why-sell-heading"> Best Price </h3>
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
        <h3 class="top-sell-heading text-center pb-4"> Customer Review</h3>

    </div>
    <div class="container">
        <div class="owl-carousel owl-theme ">
            <?php
        $fetchreview = mysqli_query($con, "SELECT * FROM `product_reviews` WHERE `status` = 'active'  ");
        while ($arrrev = mysqli_fetch_assoc($fetchreview)) {
        ?>
            <div class="col-12 my-3 mx-1">
                <div class="row p-3 nice" style="margin-top:10px; border-radius: 20px;
         margin-left:1px; margin-right:1px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
         height:270px;overflow:hidden;">

                    <div class="col-lg-2 col-2 px-0">
                        <img src="assets/images/face.png" alt="" class="img-fluid" width="59px">
                    </div>
                    <div class="col-lg-5 col-8 mb-0  pb-0">
                        <h6 class="reviwer-name"><?php echo $arrrev['rname'] ?></h6>
                        <h3 class="reviewer-heading"><?php echo $arrrev['rcity'] ?></h3>
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
        <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
        <div class="elfsight-app-bd76e8ba-7f84-42bb-86fb-eaacb15615d1"></div>
    </div>
    <?php
if(isset($_SESSION['user'])){
?>
    <div class="text-center d-none" style="margin-top: 40px;">
        <button class="btn brand-btn sm-brand mt-3" style="background-color: #fff; color: black;" data-toggle="modal"
            data-target=".bd-example-modal-lg">Write Review</button>
    </div>
    <?php
}else{
  ?>
    <div class="text-center d-none" style="margin-top: 40px;">
        <button class="btn brand-btn sm-brand mt-3" style="background-color: #fff; color: black;" data-toggle="modal"
            data-target=".bd-example-modal-lg">Write Review</button>
    </div>
    <?php 
}
?>
    </div>
</section>

<section class="wht-new" style="background-color: #fff">
    <div class="container">
        <div class="col-lg-11 mx-auto wht-new-div">
            <!-- <h6 class="">What’s new</h6> -->
            <div class="row ">
                <div class="col-lg-3 text-center">
                    <img src="assets/images/whts-new.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-8" id="new">
                    <h3 class="">Hello! <br>Click on icon to download the app.</h3>
                    <p class="">Download the app to effortlessly sell your old device!</p>
                    <!-- <form action="newsletter.php" method="post">
            <div class="row search">
              <div class="input-group col-lg-6 col-8" style="height: 5px;">
                <input type="number" class="form-control mob-no" style="border-color: #8b99a7;" placeholder="Enter Mobile Phone" name="newsletter">
              </div>
              <div class="text-center col-lg-3 col-2">
                <button class="btn brand-btn sm-brand" name="newsuser" style="background-color: #fff;padding:4px; margin-top:8px; padding: 8px; padding-left: 14px; padding-right: 14px; font-size: 15px;">Send Link<i aria-hidden="true"></i></button>
              </div>
            </div>
          </form> -->
                    <div class="row">
                        <div class="col">
                            <a href="https://play.google.com/store/apps/details?id=com.sellitcx.sellit&pli=1"><img
                                    src="assets/images/playstore.png" alt="" class="img-fluid"></a>
                        </div>
                        <div class="col">
                            <a href="https://apps.apple.com/in/app/sell-it-sell-your-old-gadgets/id6444784798"> <img
                                    src="assets/images/applestore.png" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer-color">
    <div class="col-lg-10 col-md-10 col-sm-12 col-11 mx-auto footer-details">
        <hr>
        <div class="d-flex justify-content-center">
            <img src="assets/images/footer-logo2.png" alt="">
        </div>
        <div class="d-flex justify-content-center">
            <img src="assets/images/footer-text1.png" alt="">
        </div>
        <div class="container-fluid mt-5">
            <div class="row">
                <!-- <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-options">
          <h3 class="footer-heading">Services</h3>
          <ul type="none">
            <a href="">
              <li>Sell Mobile</li>
            </a>
            <a href="">
              <li>Sell Tablet</li>
            </a>
            <a href="">
              <li>Sell Watch</li>
            </a>
          </ul>
        </div> -->
                <!-- <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-options">
          <h3 class="footer-heading">Company</h3>
          <ul type="none">
            <a href="about.php">
              <li>About Us</li>
            </a>
            <a href=""><li>careers</li></a>
          </ul>
        </div> -->
                <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-options">
                    <h3 class="footer-heading">Sell Devices</h3>
                    <ul type="none">
                        <a href="/sell-old-mobile-phones/1">
                            <li>Mobiles</li>
                        </a>
                        <a href="/tabletbrand.php?id=3">
                            <li>Tablets</li>
                        </a>
                        <a href="/watchbrand.php?id=2">
                            <li>Watches</li>
                        </a>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-options">
                    <h3 class="footer-heading">Help & Support</h3>
                    <ul type="none">
                        <a href="/faq.php">
                            <li>FAQ</li>
                        </a>
                        <a href="/contact.php">
                            <li>Contact Us</li>
                        </a>
                        <!--<a href="warrenty.php">-->
                        <!--  <li>Warranty Policy</li>-->
                        <!--</a>-->
                        <!--<a href="refund.php">-->
                        <!--  <li>Refund Policy</li>-->
                        <!--</a>-->

                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-options">
                    <h3 class="footer-heading">More Info</h3>
                    <ul type="none">
                        <!--<a href="terms-conditions.php">-->
                        <!--  <li>Terms & Conditions</li>-->
                        <!--</a>-->
                        <!--<a href="privacy-policy.php">-->
                        <!--  <li>Privacy Policy</li>-->
                        <!--</a>-->
                        <a href="/about.php">
                            <li>About Us</li>
                        </a>
                    </ul>
                </div>

                <div class="col-lg-3 col-6">
                    <h3 class="footer-heading">Contact Us</h3>
                    <!-- <h6>CUDA TECH</h6>
                 <p>H NO. 1G -44, BP, FARIDABAD - 999, FARIDABAD,
                   Faridabad, Haryana, 121001 Contact : 9992333184 </p> -->
                    <h6> <a href="mailto:info@sellit.co.in"><img src="assets/images/email-icon.png" class="px-1"
                                alt="inbox" width="10%"> info@sellit.co.in </a></h6>
                    <h6> <a href="tel:+6262616060"><img src="assets/images/mov.png" class="px-1" alt="inbox"
                                width="10%">6262616060</a></h6>
                </div>

                <div class="col-lg-3 col-6">
                    <h3 class="footer-heading">Follow Us</h3>
                    <div class="footer-social-icon">
                        <!-- <a href="twitter.com/sellit.co.in"><img src="assets/images/1.png" class="px-1" alt="twitter" width="17%"></a> -->
                        <!-- <a href=""><img src="assets/images/2.png" class="px-1" alt="inbox" width="17%"></a> -->
                        <a href="https://www.facebook.com/sellit.co.in"><img src="assets/images/3.png" class="px-1"
                                alt="facebook" width="17%"></a>
                        <a href="https://www.instagram.com/sellit.co.in/"><img src="assets/images/4.png" class="px-1"
                                alt="instagram" width="17%"></a>
                    </div>
                </div>

                <hr style="border: 1px solid black">

                <div class="d-flex justify-content-center">
                    <!--<h6 class="footer-end"><b>Designed by:- <a href="https://aakarist.com/" style="color:black;"> Aakarist Pvt. Ltd.</a></b></h6>-->
                </div>

            </div>
        </div>
</footer>
<!-- rating model box -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content py-5">
            <h4 class="text-center" style="color:#23699D;"> Please Give your Reviews And Rating.. </h4>
            <hr>
            <div class="container px-5">
                <form action="reviews.php" method="post">
                    <div class="form-group">
                        <div class="rateyo" id="rating" data-rateyo-rating="0" data-rateyo-num-stars="5"
                            data-rateyo-score="3">
                        </div>
                        <span class='result'>0</span>
                        <input type="hidden" name="rating" value="">
                    </div>
                    <div class="form-group my-1">
                        <input type="text" name="rname" class="form-control" placeholder="Enter Your Name"
                            style="color:#23699D;" required>
                    </div>
                    <div class="form-group my-1">
                        <input type="text" name="rcity" class="form-control" placeholder="Enter Your City"
                            style="color:#23699D;" required>
                    </div>
                    <div class="form-group my-1">
                        <textarea class="form-control" name="msg" placeholder="please write your riview" maxlength="200"
                            style="color:#23699D;" required></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn text-white" name="review"
                            style="background-color:#23699D;">Submit</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
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
    loop: true,
    margin: 12,
    // nav:true,
    responsive: {
        0: {
            items: 3
        },
        600: {
            items: 4
        },
        1000: {
            items: 6
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
<?php 
        $httpHost = $_SERVER['HTTP_HOST'];
        if($httpHost==="localhost"){
            echo '<script src="/sellit/admin/js/imageReplace.js"></script>';
        } else{
            echo '<script src="/admin/js/imageReplace.js"></script>';
        }
    ?>
</body>

</html>
<!-- ajax data start -->
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
<!-- model start -->
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
<!-- model end -->
<!--earbud start-->
<script>
$(document).ready(function() {
    $("#earbudsearch").keyup(function() {
        var search = $("#earbudsearch").val();
        if (search != '') {
            $.ajax({
                method: "post",
                url: "foundearbud.php",
                data: {
                    search: search
                },
                dataType: "html",
                success: function(result) {
                    $('.filterear').fadeIn();
                    $(".filterear").css("display", "block");
                    $('.responseear').html(result);
                }
            });
        } else {
            $('.filterear').fadeOut();
            $(".filterear").css("display", "none");
            $('.responseear').html("");
        }
    })
    $("#tabletsearch").focusout(function() {
        $('.filterear').fadeOut();
        $('#earbudsearch').val("");
    })
});
</script>
<!--eaerbud end-->
<!-- tablet started -->
<script>
$(document).ready(function() {
    $("#tabletsearch").keyup(function() {
        var search = $("#tabletsearch").val();
        if (search != '') {
            $.ajax({
                method: "post",
                url: "foundtablet.php",
                data: {
                    search: search
                },
                dataType: "html",
                success: function(result) {
                    $('.filter1').fadeIn();
                    $(".filter1").css("display", "block");
                    $('.response1').html(result);
                }
            });
        } else {
            $('.filter1').fadeOut();
            $(".filter1").css("display", "none");
            $('.response1').html("");
        }
    })
    $("#tabletsearch").focusout(function() {
        $('.filter1').fadeOut();
        $('#tabletsearch').val("");
    })
});
</script>
<!-- tablet end -->
<!-- watch started -->
<script>
$(document).ready(function() {
    $("#watchsearch").keyup(function() {
        var search = $("#watchsearch").val();
        if (search != '') {
            $.ajax({
                method: "post",
                url: "foundwatch.php",
                data: {
                    search: search
                },
                dataType: "html",
                success: function(result) {
                    $('.filter2').fadeIn();
                    $(".filter2").css("display", "block");
                    $('.response2').html(result);
                }
            });
        } else {
            $('.filter2').fadeOut();
            $(".filter2").css("display", "none");
            $('.response2').html("");
        }
    })
    $("#watchsearch").focusout(function() {
        $('.filter2').fadeOut();
        $('#watchsearch').val("");
    })
});
</script>
<!-- watch end -->
<!-- ajax data end -->

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