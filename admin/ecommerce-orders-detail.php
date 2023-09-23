 <!-- include header start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
 <?php 
  $oid = $_REQUEST['id'];
  if(isset($_POST['update']))
  {
	  $orderstatus = $_POST['orderStatus'];
	  $updatequery = mysqli_query($con,"UPDATE `order` SET `status` = '$orderstatus' WHERE `id` = '$oid'");
	  if($updatequery)
	  {
		 echo '<script>
		 alert("status updated"); 
		  </script>';
	  }
	  else
	  {
		echo '<script>
		alert("status notupdated"); 
		 </script>';  
	  }
  }
 ?>
	<!-- end sidebar -->
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Order #<?php echo $oid ?> Details</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>eCommerce</span></li>
								<li><span>Orders</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<form class="order-details action-buttons-fixed" method="post">
						<div class="row">
							<div class="col-xl-4 mb-4 mb-xl-0">
								<?php 
                                 $orderquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `order` WHERE `id` = '$oid'"));
								?>
								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">General</h2>
									</div>
									<div class="card-body">
										<div class="form-row">
											<div class="form-group col mb-3">
												<label>Status</label>
												<select class="form-control form-control-modern" name="orderStatus" required>
													<option value="<?php echo $orderquery['status'] ?>" selected><?php echo $orderquery['status'] ?></option>
													<option value="OnHold">OnHold</option>
													<option value="Complete">Complete</option>
													<option value="Complete">Processing</option>
												</select>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col mb-3">
												<label>Date Created</label>
												<div class="date-time-field">
													<div class="date">
														<input type="text" class="form-control form-control-modern" name="orderDate" value="<?php echo date('d/m/y',strtotime($orderquery['modify_date'])) ?>" required data-plugin-datepicker data-plugin-options='{"orientation": "bottom", "format": "yyyy-mm-dd"}' />
													</div>
													<div class="time">
														<span class="px-2">@</span>
														<input type="text" class="form-control form-control-modern text-center" name="orderTimeHour" value="<?php echo date('h',strtotime($orderquery['modify_date'])) ?>" required />
														<span class="px-2">:</span>
														<input type="text" class="form-control form-control-modern text-center" name="orderTimeMin" value="<?php echo date('i',strtotime($orderquery['modify_date'])) ?>" required />
													</div>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col mb-3">
												<label>Customer</label>
												<select class="form-control form-control-modern" name="orderCustomer" required data-plugin-selectTwo>
													<option value="<?php echo $orderquery['id'] ?>" selected><?php echo $orderquery['username'] ?></option>
												</select>
											</div>
										</div>
									</div>
								</div>

							</div>
							<div class="col-xl-8">
								
								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Addresses</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-auto mr-xl-5 pr-xl-5 mb-4 mb-xl-0">
												<h3 class="text-color-dark font-weight-bold text-4 line-height-1 mt-0 mb-3">BILLING</h3>
												<?php
												  $billingquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user_billing` WHERE `orderid` = '$oid' "));
												  if($billingquery != null)
												  {
												?>
												<ul class="list list-unstyled list-item-bottom-space-0">
													<li><?php echo $billingquery['country'] ?></li>
													<li><?php echo $billingquery['state'] ?></li>
													<li><?php echo $billingquery['city'] ?></li>
													<li><?php echo $billingquery['postcode'] ?></li>
													<li><?php echo $billingquery['street_address'] ?></li>
												</ul>
												<strong class="d-block text-color-dark">Email address:</strong>
												<a href="mailto:<?php echo $billingquery['email'] ?>"><li><?php echo $billingquery['email'] ?></li></a>
												<strong class="d-block text-color-dark mt-3">Phone:</strong>
												<a href="tel:+5551234" class="text-color-dark"><?php echo $billingquery['phone'] ?></a>
												<?php
												}
												else{
												?>
                                                  	<ul class="list list-unstyled list-item-bottom-space-0">
													<li>Country</li>
													<li>State</li>
													<li>City</li>
													<li>postcode</li>
													<li>Street</li>
												</ul>
												<strong class="d-block text-color-dark">Email address:</strong>
												<a href="mailto:"><li>E-mail</li></a>
												<strong class="d-block text-color-dark mt-3">Phone:</strong>
												<a href="tel:+5551234" class="text-color-dark">phone</a>
												<?php
												}
												?>
											</div>
											<div class="col-xl-auto pl-xl-5">
												<h3 class="font-weight-bold text-color-dark text-4 line-height-1 mt-0 mb-3">SHIPPING</h3>
												<?php
												  $shippingquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user_billing` WHERE `orderid` = '$oid' "));
												  if($shippingquery != null)
												  {
												?>
												<ul class="list list-unstyled list-item-bottom-space-0">
													<li><?php echo $shippingquery['country'] ?></li>
													<li><?php echo $shippingquery['state'] ?></li>
													<li><?php echo $shippingquery['city'] ?></li>
													<li><?php echo $shippingquery['postcode'] ?></li>
													<li><?php echo $shippingquery['street_address'] ?></li>
													
												</ul>
												<strong class="d-block text-color-dark">Email address:</strong>
												<a href="mailto:<?php echo $shippingquery['email'] ?>"><?php echo $shippingquery['email'] ?></a>
												<strong class="d-block text-color-dark mt-3">Phone:</strong>
												<a href="tel:+5551234" class="text-color-dark"><?php echo $shippingquery['phone'] ?></a>
												<?php
												}
												else{
												?>
                                             		<ul class="list list-unstyled list-item-bottom-space-0">
													<li>Country</li>
													<li>State</li>
													<li>City</li>
													<li>Postcode</li>
													<li>Street Address</li>
													
												</ul>
												<strong class="d-block text-color-dark">Email address:</strong>
												<a href="mailto:">E-mail</a>
												<strong class="d-block text-color-dark mt-3">Phone:</strong>
												<a href="tel:+5551234" class="text-color-dark">Phone</a>
												<?php
												}
												?>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col">
								
								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Products</h2>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-ecommerce-simple table-ecommerce-simple-border-bottom table-striped mb-0" style="min-width: 380px;">
												<thead>
													<tr>
														<th width="8%" class="pl-4">ID</th>
														<th width="65%">Name</th>
														<th width="5%" class="text-right">Cost</th>
														<th width="7%" class="text-right">Qty</th>
														<th width="5%" class="text-right">Total</th>
													</tr>
												</thead>
												<tbody>
													<?php
													  $orderdetailquery = mysqli_query($con,"SELECT * from `order_detail` WHERE `orderid` = '$oid' ");
													  while($arod = mysqli_fetch_assoc($orderdetailquery))
													  {
													?>
													<tr>
														<td class="pl-4"><a href="ecommerce-products-form.html"><strong><?php echo $arod['id'] ?></strong></a></td>
														<td><a href="#"><strong><?php echo $arod['p_name'] ?></strong></a></td>
														<td class="text-right">₹<?php echo $arod['price'] ?></td>
														<td class="text-right"><?php echo $arod['qty'] ?></td>
														<td class="text-right">₹<?php echo $arod['total'] ?></td>
													</tr>
													<?php
													}
													?>
												</tbody>
											</table>
										</div>

										<div class="row justify-content-end flex-column flex-lg-row my-3">
										<div class="col-auto mr-5">
												<!-- <h3 class="font-weight-bold text-color-dark text-4 mb-3">Shipping</h3>
												<span class="d-flex align-items-center">
													Flat Rate
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs">$20.00</b>
												</span> -->
											</div>
											<?php
											  $amount = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `order` WHERE `id` =  '$oid' "));
											  $count = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `order_detail` WHERE `orderid` = '$oid' "));
											?>
											<div class="col-auto mr-5">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Items Subtotal</h3>
												<span class="d-flex align-items-center">
													<?php echo $count ?> Items
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs">₹<?php echo  $amount['total'] ?></b>
												</span>
											</div>
							
											<div class="col-auto">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Order Total</h3>
												<span class="d-flex align-items-center justify-content-lg-end">
													<strong class="text-color-dark text-5">₹<?php echo  $amount['total'] ?></strong>
												</span>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="row action-buttons">
							<div class="col-12 col-md-auto">
								<button type="submit" name="update" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-save text-4 mr-2"></i> Update Order
								</button>
							</div>
							<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
								<a href="#" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
							</div>
							<!-- <div class="col-12 col-md-auto ml-md-auto mt-3 mt-md-0">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-trash text-4 mr-2"></i> Delete Order
								</a>
							</div> -->
						</div>
					</form>
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
		
		<!-- Specific Page Vendor -->		<script src="vendor/select2/js/select2.js"></script>


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
		<script src="js/examples/examples.ecommerce.orders.detail.js"></script>

	</body>
</html>