<?php
include 'session_validate.php';
$adminemail = $_SESSION['email'];
$fetchadmindetail = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `users` WHERE `user_email` = '$adminemail'"));
$adminname = $fetchadmindetail['username'];
?>
<!doctype html>
<html class="modern fixed has-top-menu has-left-sidebar-half" data-style-switcher-options="{'changeLogo': false}">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Sellit</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,600,700,800,900" rel="stylesheet"
        type="text/css">
    <!-- sweet -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <!-- sweet -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/animate/animate.css">

    <link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

    <link href='https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <!-- <link href='https://sellit.co.in/admin/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'> -->

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="vendor/dropzone/basic.css" />
    <link rel="stylesheet" href="vendor/dropzone/dropzone.css" />
    <link rel="stylesheet" href="vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
    <link rel="stylesheet" href="vendor/pnotify/pnotify.custom.css" />

    <!--(remove-empty-lines-end)-->

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />


    <!-- Theme Layout -->
    <link rel="stylesheet" href="css/layouts/modern.css" />
    <!--(remove-empty-lines-end)-->



    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="master/style-switcher/style.switcher.localstorage.js"></script>
    <!-- ckeditor -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>


</head>

<body>
    <section class="body">

        <!-- start: header -->
        <header class="header header-nav-menu header-nav-links">
            <div class="logo-container">
                <a href="ecommerce-dashboard.php" class="logo p-0"><img
                        src="https://sellit.co.in/assets/images/logo-1.png" class="logo-image" width="200"
                        alt="Porto Admin" />
                    <!-- <img src="img/logo-default.png" class="logo-image-mobile" width="90" height="41" alt="Porto Admin" />		 -->
                </a>
                <button class="btn header-btn-collapse-nav d-lg-none" data-toggle="collapse" data-target=".header-nav">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

                <a class="btn search-toggle d-none d-md-inline-block d-xl-none" data-toggle-class="active"
                    data-target=".search"><i class="bx bx-search"></i></a>

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <span
                            class="profile-picture profile-picture-as-text text-uppercase"><?php echo substr($adminname, 0, 2) ?></span>
                        <div class="profile-info profile-info-no-role" data-lock-name="John Doe"
                            data-lock-email="johndoe@okler.com"> <span class="name">Hi, <strong
                                    class="font-weight-semibold"><?php echo $adminname ?></strong></span>
                        </div>
                        <i class="fas fa-chevron-down text-color-dark"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <!-- <li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="bx bx-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="bx bx-lock-open-alt"></i> Lock Screen</a>
								</li> -->
                            <li>
                                <a role="menuitem" tabindex="-1" href="logout.php"><i class="bx bx-log-out"></i>
                                    Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div id="spinner-div" class="">
            <div id="spinner-inner" class="">
                <div class="text-center m-auto">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>