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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="q-24As6IUgQYlnT2-RVsVVYP07YI6kxtdMd_gNndDVg" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/mob.css">
    <link rel="stylesheet" href="assets/css/about.css">
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

<body oncontextmenu="return false;">
    <section class="header" style="margin-bottom: -20px;">
        <div class="container-fluid ">
            <div class="row" style="background-color: white;">
                <div class="col-lg-12 col-xl-11 col-12 mx-auto">
                    <div class="row header-content">
                        <div class="col-lg-3 col-5">
                            <a href="index.php"><img src="assets/images/logo-1.png" alt="" class="logo img-fluid"></a>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-sm-3 order-3 search">
                            <div class="row">
                                <div class="input-group col-lg-11 col-12 mx-auto">
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

                        <div class="col-lg-1 col-3  order-2 order-lg-4   " id="newpadding">

                            <div class="dropdown  ">
                                <button class="dropbtn"><img src="assets/images/city.png" alt="" class=" img-fluid">

                                </button>
                                <div class=" dropdown-content">

                                    <div class="header" style="text-align:center;">
                                        <p class="texttt mb-0 ">We are currently available in these cities</p>
                                    </div>
                                    <div class="row" style="text-align:center; background-color:white;">
                                        <div class="col-lg-6 col-12 pt-4 pb-4 mx-auto">
                                            <div class="row">
                                                <div class="col-1" id="fontsiixeee">
                                                </div>
                                                <div class="col-2" id="fontsiixeee">
                                                    <div class="row">
                                                        <div class="col-lg-8 mx-auto">
                                                            <img src="assets\images\new-delhi.png" class="img-fluid"
                                                                alt="">
                                                            Delhi
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="col-2" id="fontsiixeee">
                                                    <div class="row">
                                                        <div class="col-lg-8 mx-auto">
                                                            <img src="assets\images\faridabad.png" class="img-fluid"
                                                                alt="">
                                                            Faridabad
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-2" id="fontsiixeee">
                                                    <div class="row">
                                                        <div class="col-lg-8 mx-auto">
                                                            <img src="assets\images\gurugram.png" class="img-fluid"
                                                                alt="">
                                                            Gurugram
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-2" id="fontsiixeee">
                                                    <div class="row">
                                                        <div class="col-lg-8 mx-auto">
                                                            <img src="assets\images\ghaziabad.png" class="img-fluid"
                                                                alt="">
                                                            Ghaziabad
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-2" id="fontsiixeee">
                                                    <div class="row">
                                                        <div class="col-lg-8 mx-auto">
                                                            <img src="assets\images\noida.png" class="img-fluid" alt="">
                                                            Noida
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-lg-2 text-center col-4 order-2 order-lg-4 login">
                            <!-- <a href="signup.php" class="text-white" style="text-decoration:none;"><span>Login</span></a>-->
                            <!--<img src="assets/images/log-in.png" alt="" id="userpic" class="img-fluid" width="30px">-->
                            <div class="row">
                                <div class="col-6">
                                    <a href="<?php if ($number == null) {
                                        echo "login.php";
                                    } else {
                                        echo "userdashboard.php";
                                    } ?>" class="text-primary"><img src="assets/images/My-profile.png"
                                            class="img-fluid "></a>
                                </div>
                                <?php if ($number == null) { ?>
                                <div class="col-6">
                                    <a href="login.php" class="text-primary"><img src="assets/images/login-1.png "
                                            class="img-fluid " width="90%"></a>
                                </div>
                                <?php } else { ?>
                                <div class="col-6">
                                    <a href="logout.php" class="text-primary"><img src="assets/images/log-out.png"
                                            class="img-fluid"></a>
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
        <div class="col-10 mx-auto">
            <div class="row">
                <div class="col-lg-2 col-3 offset-lg-10 offset-8" id="userprofile">
                    <?php if ($number == null) { ?>
                    <a href="login.php">
                        <p><i class="fas fa-sign-in-alt"></i> Login</p>
                    </a>
                    <?php } else { ?>
                    <a href="userdashboard.php">
                        <p><i class="fas fa-user"></i> Profile</p>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>