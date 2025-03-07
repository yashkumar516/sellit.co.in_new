<?php
session_start();
include 'includes/confile.php';
if (isset($_POST['user'])) {
    $email = $_POST['email'];
    $pass = $_POST['pwd'];
    $query = mysqli_query(
        $con,
        "SELECT * FROM `users` WHERE `user_email` = '$email'"
    );
    $row = mysqli_num_rows($query);
    if ($row == 1) {
        $fetpas = mysqli_fetch_assoc(
            mysqli_query(
                $con,
                "SELECT * FROM `users` WHERE `user_email` = '$email'"
            )
        );
        $has_pass = $fetpas['password'];
        // echo 'password', $has_pass;
        if ($pass == $has_pass) {
            $_SESSION['email'] = $email;
            header('location:ecommerce-dashboard.php');
        } else {
            echo '<script>
	             alert("please enter yout correct password ");
	        </script>';
        }
    } else {
        header('refresh:0');
    }
}
?>
<!doctype html>
<html class="fixed">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,800,900|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/animate/animate.css">

    <link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

    <!--(remove-empty-lines-end)-->

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />


    <!--(remove-empty-lines-end)-->



    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="master/style-switcher/style.switcher.localstorage.js"></script>

</head>
<body>
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <a href="http://preview.oklerthemes.com/" class="logo float-left">
                <img src="https://sellit.co.in/assets/images/logo-1.png" height="74" alt="Porto Admin" />
            </a>

            <div class="panel card-sign">
                <div class="card-title-sign mt-3 text-right">
                    <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Sign In</h2>
                </div>
                <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <div class="input-group">
                                <input name="email" type="email" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="clearfix">
                                <label class="float-left">Password</label>
                                <a href="pages-recover-password.php" class="float-right">Lost Password?</a>
                            </div>
                            <div class="input-group">
                                <input name="pwd" type="password" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="RememberMe" name="rememberme" type="checkbox" />
                                    <label for="RememberMe">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" name="user" class="btn btn-primary mt-2">Sign In</button>
                            </div>
                        </div>

                        <!-- <span class="mt-3 mb-3 line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							<div class="mb-1 text-center">
								<a class="btn btn-facebook mb-3 ml-1 mr-1" href="#">Connect with <i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-twitter mb-3 ml-1 mr-1" href="#">Connect with <i class="fab fa-twitter"></i></a>
							</div> -->

                        <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a></p>

                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2017. All Rights Reserved.</p>
        </div>
    </section>
    <!-- end: page -->

    <!-- Vendor -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="master/style-switcher/style.switcher.js"></script>
    <script src="vendor/popper/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="vendor/common/common.js"></script>
    <script src="vendor/nanoscroller/nanoscroller.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
    <script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Specific Page Vendor -->


    <!--(remove-empty-lines-end)-->

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>
    <!-- Analytics to Track Preview Website -->
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-42715764-8', 'auto');
    ga('send', 'pageview');
    </script>
</body>
</html>