 <!-- include header start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
 <?php 
  $lid = $_REQUEST['id'];
  error_reporting(E_ALL);
  ini_set('display_errors', 1); 
  $uid = mysqli_fetch_assoc( mysqli_query( $con, "SELECT * FROM `enquiry` WHERE `id` = '$lid' " ) ); 
	$genorderid = $uid["genorderid"];
 ?>
 <style>
body,
html {
    margin: 0;
    padding: 0;
    height: 100%;
    background-color: #f5f5f8;
    overflow-x: hidden
}

.iframe-container {
    position: relative;
    width: 100%;
    height: 180vh;
    /* Full height of viewport */
    overflow: hidden;
    /* Hide scrollbars */
    overflow-x: hidden;
    overflow-y: hidden;
    /* Hide horizontal scroll */

}

iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    /* Remove border */
}
 </style>

 <!-- end sidebar -->
 <section role="main" class="content-body content-body-modern mt-0">
     <header class="page-header page-header-left-inline-breadcrumb">
         <h2 class="font-weight-bold text-6">Order #<?php echo $lid ?> Details</h2>
         <div class="right-wrapper">
             <ol class="breadcrumbs">
                 <li><span>Home</span></li>
                 <li><span>eCommerce</span></li>
                 <li><span>Orders</span></li>
             </ol>

             <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
         </div>
     </header>

     <div class="iframe-container">
         <iframe src=<?php echo "https://sellit.co.in/receipt.php?eId=".$genorderid?> name="iframe_a"
             scrolling="no"></iframe>
     </div>

 </section>
 </div>

 </section>

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
 <script src="vendor/select2/js/select2.js"></script>


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
 <!-- Examples -->
 <script src="js/examples/examples.header.menu.js"></script>
 <script src="js/examples/examples.ecommerce.orders.detail.js"></script>

 </body>
 </html>