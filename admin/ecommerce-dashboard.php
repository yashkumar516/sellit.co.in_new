 <!-- include header start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
			<!-- end sidebar -->
				
				<section role="main" class="content-body content-body-modern">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Dashboard</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>eCommerce Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<style>
				      	.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
                            background-color: #00c0ef !important;
                        }
						.small-box {
                       border-radius: 3px;
                       position: relative;
                       display: block;
                       margin-bottom: 20px;
                       box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
                        }
						.small-box .icon {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 0;
    font-size: 90px;
    color: rgba(0,0,0,0.15);
}
.content {
    min-height: 250px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}
.small-box>.inner {
    padding: 10px;
}
.small-box>.small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}
.small-box h3, .small-box p {
    z-index: 5;
	color: white;
}

.small-box h3 {
    font-size: 38px;
    font-weight: bold;
    margin: 0 0 17px 0;
    white-space: nowrap;
    padding: 0;
}
					</style>

					<!-- start: page -->
					<?php 
					   $rowcutomer = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `userrecord`"));
					   $rowleads = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `enquiry`"));
					   $rowleadsavai = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `enquiry` WHERE `status` = 'Available'"));
					   $rowleadscomplete = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `enquiry` WHERE `status` = 'Complete'"));
					   $rownewsletter= mysqli_num_rows(mysqli_query($con,"SELECT * FROM `newsletter` "));
					?>
					<section class="content" >	
					<div class="row">
					<div class="col-3">
					  <div class="small-box" style="background-color:#8ED2C9;">
                         <div class="inner">
                        <h3> <?php echo  $rowcutomer ?> </h3>

                          <p>Total Customer</p>
                        </div>
                           <div class="icon">
                           <i class="fa fa-users"></i>
                        </div>
                           <a href="customer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
					</div>

					<div class="col-3">
					  <div class="small-box" style="background-color:#FFB85F;">
                         <div class="inner">
                        <h3><?php echo $rowleads ?></h3>

                          <p>Total Leads</p>
                        </div>
                           <div class="icon">
                           <i class="fas fa-list"></i>
                        </div>
                           <a class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
					</div>

					<div class="col-3">
					  <div class="small-box" style="background-color:#FF7A5A;">
                         <div class="inner">
                        <h3><?php echo  $rowleadsavai  ?></h3>

                          <p>Total Available Leads</p>
                        </div>
                           <div class="icon">
						   <i class="fas fa-align-right"></i>
                        </div>
                           <a href="avaibaleleads.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
					</div>

					<div class="col-3">
					  <div class="small-box " style="background-color:#00AAA0;">
                         <div class="inner">
                        <h3><?php echo $rowleadscomplete ?></h3>

                          <p>Total Complete Leads</p>
                        </div>
                           <div class="icon">
                           <i class="fas fa-check-double"></i>
                        </div>
                           <a href="completeleads.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
					</div>
					<div class="col-3">
					  <div class="small-box " style="background-color:#06A2CB;">
                         <div class="inner">
                        <h3><?php echo $rownewsletter ?></h3>

                          <p>Total Newsletter</p>
                        </div>
                           <div class="icon">
                           <i class="fas fa-mail-bulk"></i>
                        </div>
                           <a href="newsletter.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
					</div>
					</div>
					</section>
		
					
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close d-md-none">
							Collapse <i class="fas fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark"></div>
			
								<ul>
									<li>
										<time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>

		</section>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>		<script src="master/style-switcher/style.switcher.js"></script>		<script src="vendor/popper/umd/popper.min.js"></script>		<script src="vendor/bootstrap/js/bootstrap.js"></script>		<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		<script src="vendor/common/common.js"></script>		<script src="vendor/nanoscroller/nanoscroller.js"></script>		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>		<script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->		<script src="vendor/raphael/raphael.js"></script>		<script src="vendor/morris/morris.js"></script>		<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>		<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>


		<!--(remove-empty-lines-end)-->
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		<script>		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)		  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');		  ga('create', 'UA-42715764-8', 'auto');		  ga('send', 'pageview');		</script>
		<!-- Examples -->
		<script src="js/examples/examples.header.menu.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
		<script src="js/examples/examples.ecommerce.dashboard.js"></script>
		<script src="js/examples/examples.ecommerce.datatables.list.js"></script>

	</body>
</html>
<!-- start change status script -->
<script>
    function changestatus(gid) { 
    var id = gid;
	 var status = document.getElementById("status").value;
      swal({ title: "warning",
       text: "Press ok if you want to change status",
       type: "warning"}).then(confirm => {
      if (confirm) {
              window.location.href = 'change_lead_status.php?id='+id+'&&status='+status;
          }
           });
         
       }
       </script>
<!-- start change status script -->
