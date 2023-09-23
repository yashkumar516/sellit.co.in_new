 <!-- include header start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
<!-- end sidebar -->
<?php 
$cid = $_REQUEST['id'];
if(isset($_POST['coupan']))
{
	$coupanname = $_POST['couponName'];
	$coupanvalue = $_POST['couponAmount'];
	$coupantype = $_POST['stockStatus'];
	$coupandsec = $_POST['couponDescription'];
	$cartmin = $_POST['minvalue'];
	$insertquery = mysqli_query($con,"UPDATE `coupan` SET `coupan_name`='$coupanname',`coupan_value`='$coupanvalue',`coupan_type`='$coupantype',`cart_min_value`='$cartmin',`coupandesc`='$coupandsec' WHERE `id` = '$cid' ");
													
	if($insertquery)
	{
	   echo	'<script>
		alert("update successfully");
		window.location.href = "ecommerce-coupons-list.php";
		</script>';	
	}
	else
	{
		echo	'<script>
		alert("not not updated");
		window.location.href = "ecommerce-coupons-list.php";
		</script>';	
	}
}
?>
				
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Coupon</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>eCommerce</span></li>
								<li><span>Coupons</span></li>
							</ol>
					<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
				</div>
			</header>

					<!-- start: page -->
					<form  action="#" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="tabs-modern row" style="min-height: 490px;">
											<div class="col-lg-2-5 col-xl-1-5">
												<div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
										      		<a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" role="tab" aria-controls="general" aria-selected="true"><i class="bx bx-cog mr-2"></i> General</a>
										      		<!-- <a class="nav-link" id="usage-restriction-tab" data-toggle="pill" href="#usage-restriction" role="tab" aria-controls="usage-restriction" aria-selected="false"><i class="bx bx-block mr-2"></i> Usage Restriction</a>
										      		<a class="nav-link" id="usage-limits-tab" data-toggle="pill" href="#usage-limits" role="tab" aria-controls="usage-limits" aria-selected="false"><i class="bx bx-timer mr-2"></i> Usage Limits</a> -->
										    	</div>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="tab-content" id="tabContent">
                                                    <!-- php fetch start -->
                                                    <?php 
                                                       $cquery = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `coupan` WHERE `id` = '$cid'"));
                                                    ?>
                                                    <!-- php fetch end -->
										      		<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Coupon Code</label>
															<div class="col-lg-7 col-xl-6">
																<input type="text" class="form-control form-control-modern" name="couponName" value="<?php echo $cquery['coupan_name'] ?>" required />
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Discount Type</label>
															<div class="col-lg-7 col-xl-6">
																<select class="form-control form-control-modern" name="stockStatus">
																	<option value="percentage" selected value="<?php echo $cquery['coupan_type'] ?>"><?php echo $cquery['coupan_type'] ?></option>
																	<option value="fixed-amount">Fixed_Amount</option>
																	<option value="percentage">Percentege</option>
																</select>
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Coupon Amount</label>
															<div class="col-lg-7 col-xl-6">
																<input type="text" class="form-control form-control-modern" name="couponAmount" value="<?php echo $cquery['coupan_value'] ?>" required />
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Cart Minimum value</label>
															<div class="col-lg-7 col-xl-6">
																<input type="text" class="form-control form-control-modern" name="minvalue" value="<?php echo $cquery['cart_min_value'] ?>" required />
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Description</label>
															<div class="col-lg-7 col-xl-6">
																<textarea class="form-control form-control-modern" name="couponDescription" rows="6"><?php echo $cquery['coupandesc'] ?></textarea>
															</div>
														</div>
										      		</div>
										      		<div class="tab-pane fade" id="usage-restriction" role="tabpanel" aria-labelledby="usage-restriction-tab">
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Minimum Spend</label>
															<div class="col-lg-7 col-xl-6">
																<input type="text" class="form-control form-control-modern" name="couponMinimumSpend" value="" placeholder="No minimum" />
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Maximum Spend</label>
															<div class="col-lg-7 col-xl-6">
																<input type="text" class="form-control form-control-modern" name="couponMaximumSpend" value="" placeholder="No maximum" />
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Individual Use Only?</label>
															<div class="col-lg-7 col-xl-6">
																<div class="checkbox">
																	<label class="my-2">
																		<input type="checkbox" value="">
																		Check this box if the coupon cannot be used in conjunction with other coupons.
																	</label>
																</div>
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Exclude Sale Items?</label>
															<div class="col-lg-7 col-xl-6">
																<div class="checkbox">
																	<label class="my-2">
																		<input type="checkbox" value="">
																		Check this box if the coupon should not apply to items on sale. Per-item coupons will only work if the item is not on sale. Per-cart coupons will only work if there are items in the cart that are not on sale.
																	</label>
																</div>
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Products</label>
															<div class="col-lg-7 col-xl-6">
																<select multiple data-plugin-selectTwo class="form-control form-control-modern" name="couponProducts" data-plugin-options='{ "placeholder": "Search for a product..." }'>
																	<option value=""></option>
																	<option value="product1">Porto Bag</option>
																	<option value="product2">Porto Shoes</option>
																	<option value="product3">Porto Jacket</option>
																</select>
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Exclude Products</label>
															<div class="col-lg-7 col-xl-6">
																<select multiple data-plugin-selectTwo class="form-control form-control-modern" name="couponExcludeProducts" data-plugin-options='{ "placeholder": "Search for a product..." }'>
																	<option value=""></option>
																	<option value="product1">Porto Bag</option>
																	<option value="product2">Porto Shoes</option>
																	<option value="product3">Porto Jacket</option>
																</select>
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Product Categories</label>
															<div class="col-lg-7 col-xl-6">
																<select multiple data-plugin-selectTwo class="form-control form-control-modern" name="couponProductCategories" data-plugin-options='{ "placeholder": "Search for a product category..." }'>
																	<option value="any">Any Category</option>
																	<option value="product1">Bags</option>
																	<option value="product2">Shoes</option>
																	<option value="product3">Jackets</option>
																</select>
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Exclude Categories</label>
															<div class="col-lg-7 col-xl-6">
																<select multiple data-plugin-selectTwo class="form-control form-control-modern" name="couponExcludeCategories" data-plugin-options='{ "placeholder": "Search for a product category..." }'>
																	<option value="none">None</option>
																	<option value="product1">Bags</option>
																	<option value="product2">Shoes</option>
																	<option value="product3">Jackets</option>
																</select>
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Allowed E-mails</label>
															<div class="col-lg-7 col-xl-6">
																<input type="text" class="form-control form-control-modern" name="couponAllowedEmails" value="" />
															</div>
														</div>
										      		</div>
										      		<div class="tab-pane fade" id="usage-limits" role="tabpanel" aria-labelledby="usage-limits-tab">
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Usage Limit Per Coupon</label>
															<div class="col-lg-7 col-xl-6">
																<input type="text" class="form-control form-control-modern" name="couponUsageLimitPerCoupon" value="" placeholder="Unlimited Usage" />
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Limit Usage to X Items</label>
															<div class="col-lg-7 col-xl-6">
																<input type="text" class="form-control form-control-modern" name="couponLimitUsageXItems" value="" placeholder="Apply to all qualifying items in cart" />
															</div>
														</div>
														<div class="form-group row align-items-center">
															<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Usage Limit Per User</label>
															<div class="col-lg-7 col-xl-6">
																<input type="text" class="form-control form-control-modern" name="couponUsageLimitPerUser" value="" placeholder="Unlimited Usage" />
															</div>
														</div>
										      		</div>
										    	</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
						<div class="row action-buttons">
							<div class="col-12 col-md-auto">
								<button type="submit" name="coupan" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-save text-4 mr-2"></i> Save Coupon
								</button>
							</div>
							<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
								<a href="#" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
							</div>
							<!-- <div class="col-12 col-md-auto ml-md-auto mt-3 mt-md-0">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-trash text-4 mr-2"></i> Delete Coupon
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
		
		<!-- Specific Page Vendor -->		<script src="vendor/jquery-validation/jquery.validate.js"></script>		<script src="vendor/select2/js/select2.js"></script>		<script src="vendor/dropzone/dropzone.js"></script>		<script src="vendor/pnotify/pnotify.custom.js"></script>


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
		<script src="js/examples/examples.ecommerce.form.js"></script>

	</body>
</html>