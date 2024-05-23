<!-- <php include 'hideheader.php' ?> -->
<?php
session_start();
include 'admin/includes/confile.php';
?>
<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $usermobile = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `userrecord` WHERE `id` = '$user' "));
    if ($usermobile) {
        $number = $usermobile['name'];
    } else {
        $number = '';
    }
} else {
    $number = '';
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Best Place to Sell Old Phones | Best Website to Sell Old Phone | Cash phone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="q-24As6IUgQYlnT2-RVsVVYP07YI6kxtdMd_gNndDVg" />
    <meta name="description"
        content="Sellit.co.in is the best place sell old phones online in Delhi NCR, Delhi, Faridabad, Ghaziabad, Noida & Gurgaon. With its easy-to-use platform and top prices, it's the ideal choice for anyone who's looking the best website to Sell old Phone online quickly and easily.">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/mob.css">
    <link rel="stylesheet" href="../../assets/css/about.css">
    <script src="https://kit.fontawesome.com/695826c815.js" crossorigin="anonymous"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DYH2D4QESB"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-DYH2D4QESB');
    </script>
    <meta name="google-site-verification" content="XcbXug-z0EtzkdTsIB7RGWJ5SIBGOILe_5kUiuwdp_0"   />
</head>

<body>
    <section class="header" style="margin-bottom: -20px;" id="blockmobile">
        <div class="container-fluid ">
            <div class="row" style="background-color: white;">
                <div class="col-lg-12 col-xl-11 col-12 mx-auto">
                    <div class="row header-content">
                        <div class="col-lg-3 col-8">
                            <a href="../../index.php"><img src="../../assets/images/logo-1.png" alt=""
                                    class="logo img-fluid"></a>
                        </div>
                        <div class="col-lg-7 order-lg-2 order-sm-3 order-3 search">
                            <div class="row">
                                <div class="input-group col-lg-11 col-12">
                                    <input type="text" class="form-control" id="modalsearch"
                                        placeholder="Search your Device" name="search" autocomplete="off">
                                </div>
                                <div class="col-11 col-lg-10" id="filter">
                                    <div class="row px-5" id="modals">
                                        <ul id="ajaxresponse" type="none"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-lg-1 col-8 order-4 order-lg-3" id="headsocial">
              <div class="social-icon" style="display: none;">
                <a href="twitter.com/sellit.co.in"><img src="../../assets/images/1.png" class="px-1" alt="twitter" width="14%"></a>
                <a href=""><img src="../../assets/images/2.png" class="px-1" alt="inbox" width="14%"></a>
                <a href="facebook.com/sellit.co.in"><img src="../../assets/images/3.png" class="px-1" alt="facebook" width="14%"></a>
                <a href="instagram.com/sellit.co.in"><img src="../../assets/images/4.png" class="px-1" alt="instagram" width="14%"></a>
              </div>
            </div> -->

                        <div class="col-lg-2 text-center col-4 order-2 order-lg-4 login">
                            <!-- <a href="signup.php" class="text-white" style="text-decoration:none;"><span>Login</span></a>-->
                            <!--<img src="../../assets/images/log-in.png" alt="" id="userpic" class="img-fluid" width="30px">-->
                            <div class="row">
                                <div class="col-6">
                                    <a href="<?php if ($number == null) {
                                                    echo '../../login.php';
                                                } else {
                                                    echo '../../userdashboard.php';
                                                } ?>" class="text-primary"><img
                                            src="../../assets/images/My-profile.png" width="60%"
                                            class="img-fluid newimg22"></a>
                                </div>
                                <?php
                                if ($number == null) {
                                ?>
                                <div class="col-6">
                                    <a href="../../login.php" class="text-primary"><img
                                            src="../../assets/images/login-1.png " width="60%"
                                            class="img-fluid newimg22"></a>
                                </div>
                                <?php
                                } else {
                                ?>
                                <div class="col-6">
                                    <a href="../../logout.php" class="text-primary"><img
                                            src="../../assets/images/log-out.png" width="60%" class="img-fluid"></a>
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

    <div class="container-fluid" id="prof">
        <div class="col-10 mx-auto" id="blockmobile">
            <div class="row">
                <div class="col-lg-2 col-5 offset-lg-10 offset-8" id="userprofile">
                    <?php
                    if ($number == null) {
                    ?>
                    <a href="../../login.php">
                        <p><i class="fas fa-sign-in-alt"></i> Login</p>
                    </a>
                    <?php
                    } else {
                    ?>
                    <a href="../../userdashboard.php">
                        <p><i class="fas fa-user"></i> Profile</p>
                    </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
$id = mysqli_real_escape_string($con,$_REQUEST['id']);
$idarr = explode('_',$id);
$bid = $idarr[1];
$id = $idarr[0];
?>

    <?php
$selectquery = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$bid' "));
?>
    <section class="sell-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 class="sell-header">Sell Old <span class="sell-title-head">
                            <?php echo $selectquery['subcategory_name'] ?> </span> Mobile</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center" id="varimg">
                    <?php
                $selectquery = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id`='$id' "));
                ?>
                    <img src="../../admin/img/<?php echo $selectquery['product_image'] ?>" class="img-fluid" width="50%"
                        alt="">
                </div>
                <div class="col-lg-7 col-12 variant mx-auto">
                    <h1 class="sum-heading "><?php echo $selectquery['product_name'] ?></h1>
                    <p class="ques">Choose a variant</p>
                    <div class="card">
                        <div class="row pt-3">
                            <?php
                        $selectvarient = mysqli_query($con, "SELECT * FROM `varient` WHERE `product_name`='$id' AND `status`='active' ");
                        while ($arvariant = mysqli_fetch_assoc($selectvarient)) {
                        ?>

                            <!-- <div class="col-lg-3 col-md-3 col-sm-4 col-4 variant-col ">
                                <input id="toggle1" class="varient" name="varient" type="radio" value=" " required>
                                <label for="toggle1"> </label>
                            </div> -->

                            <div class="col-lg-4 col-md-3 col-sm-4 col-6 my-1 variant-col ">
                                <label>
                                    <input id="toggle1" class="varient" name="varient" type="radio"
                                        value="<?php echo $arvariant['id'] ?>">
                                    <span><?php echo $arvariant['varient'] ?></span>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                            <input type="hidden" id="bid" value="<?php echo $bid ?>">
                            <input type="hidden" id="mid" value="<?php echo $id  ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <php include 'footer1.php' ?> -->

    <footer class="footer-color">
        <div class="col-lg-10 col-md-10 col-sm-12 col-11 mx-auto footer-details">
            <hr>
            <div class="d-flex justify-content-center">
                <img src="../../assets/images/footer-logo2.png" alt="">
            </div>
            <div class="d-flex justify-content-center">
                <img src="../../assets/images/footer-text1.png" alt="">
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
                        <h6>E-mail: info@sellit.co.in</h6>
                    </div>

                    <div class="col-lg-3 col-6">
                        <h3 class="footer-heading">Follow Us</h3>
                        <div class="footer-social-icon">
                            <a href="https://twitter.com/sellit.co.in"><img src="../../assets/images/1.png" class="px-1"
                                    alt="twitter" width="17%"></a>
                            <a href=""><img src="../../assets/images/2.png" class="px-1" alt="inbox" width="17%"></a>
                            <a href="https://facebook.com/sellit.co.in"><img src="../../assets/images/3.png"
                                    class="px-1" alt="facebook" width="17%"></a>
                            <a href="https://instagram.com/sellit.co.in"><img src="../../assets/images/4.png"
                                    class="px-1" alt="instagram" width="17%"></a>
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
                            <textarea class="form-control" name="msg" placeholder="please write your riview"
                                maxlength="200" style="color:#23699D;" required></textarea>
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
                url: "../../modalfound.php",
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
                url: "../../modalfound1.php",
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
                url: "../../foundearbud.php",
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
                url: "../../foundtablet.php",
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
                url: "../../foundwatch.php",
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

<script>
function getmodel(gid) {
    var sid = gid;
    if (sid != null) {
        $.ajax({
            method: "post",
            url: "../../ajaxmodel.php",
            data: {
                series: sid
            },
            dataType: "html",
            success: function(result) {
                $("#ajaxrespon").html('');
                $("#ajaxrespon").html(result);
            }
        });
    }
}
</script>

<script>
$(document).ready(function() {
    $('.varient').click(function() {
        var varient = $("input[type=radio][name=varient]:checked").val();
        var mid = $("#mid").val();
        var bid = $("#bid").val();
        window.location.href = "../../sold.php?vid=" + varient + "&&bid=" + bid + "&&mid=" + mid;
    });
});
</script>