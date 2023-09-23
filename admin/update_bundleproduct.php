 
<!-- include header and sidebar start -->
<?php include 'includes/header.php' ?>		
<?php include 'includes/sidebar.php' ?>
<!-- end sidebar  header  -->

 <?php
 $bunid = $_REQUEST['id'];
if(isset($_POST['product']))
{
	$skinconcern = $_POST['skinconcern'];
	$productname = $_POST['productName'];
	$regularprice = $_POST['regularPrice'];
	$saleprice = $_POST['salePrice'];
	$productdesc = $_POST['productDescription'];
	$productimage = str_replace(" ","_",$_FILES['productImage']['name']);
	move_uploaded_file($_FILES['productImage']['tmp_name'], "../assets/images/bundle/".str_replace(" ","_",$_FILES['productImage']['name'])); 
	$query = mysqli_query($con,"UPDATE `bundle_product` SET `pname`='$productname',`pdesc`='$productdesc',`pskin`='$skinconcern',`prprice`='$regularprice',`psprice`='$saleprice',`pimage`='$productimage' WHERE `id` = '$bunid' ");
	                                
		  if($query)
		  {
			  echo "<script> alert('update successfully');
			  window.location.href = 'bundleproduct-list.php';
			  
			  </script>";
		  }
		  else
		  {
			echo "<script> alert('update unsuccessfully');
			window.location.href = 'bundleproduct-list.php';
			
			</script>";  
		  }
}
 ?>
				
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Product Name</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>eCommerce</span></li>
								<li><span>Products</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

                    <!-- start: page -->
                    <?php 
                     $fetchprod = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `bundle_product` WHERE `id` = '$bunid' "));
                    ?>
						<form  action="#" method="post" enctype="multipart/form-data" >
							<div class="row">
								<div class="col">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-2-5 col-xl-1-5">
													<i class="card-big-info-icon bx bx-box"></i>
													<h2 class="card-big-info-title">General Info</h2>
													<p class="card-big-info-desc">Add here the product description with all details and necessary information.</p>
												</div>
												<div class="col-lg-3-5 col-xl-4-5">
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Skin-concern</label>
														<div class="col-lg-7 col-xl-6">
														<select name="skinconcern" id="scinconcern"  class="form-control form-control-modern" name="categoryname">
														<option value="<?php echo $fetchprod['pskin'] ?>"  class="form-control form-control-modern"><?php echo $fetchprod['pskin'] ?></option>
														<?php
															  $fetchskin = mysqli_query($con,"SELECT * FROM `skinconcern` WHERE `status` = 'active'");
															   while($arrskin= mysqli_fetch_assoc($fetchskin))
															   {
														     ?>
                                                             <option value="<?php echo $arrskin['skin_name'] ?>"  class="form-control form-control-modern"><?php echo $arrskin['skin_name'] ?></option>
															 <?php
															   }
															   ?>
														</select>
																											
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Product Name</label>
														<div class="col-lg-7 col-xl-6">
															<input type="text" class="form-control form-control-modern" name="productName" value="<?php echo $fetchprod['pname'] ?>" required />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Product Description</label>
														<div class="col-lg-7 col-xl-6">
															<textarea class="form-control form-control-modern" name="productDescription" rows="6"><?php echo $fetchprod['pdesc'] ?></textarea>
														</div>
													</div>
						
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-2-5 col-xl-1-5">
													<i class="card-big-info-icon bx bx-camera"></i>
													<h2 class="card-big-info-title">Product Image</h2>
													<p class="card-big-info-desc">Upload your Product image. You can add multiple images</p>
												</div>
												<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Product Image</label>
														<div class="col-lg-7 col-xl-6">
                                                            <img src="../assets/images/bundle/<?php echo $fetchprod['pimage'] ?>" width="150px" alt="">
															<input type="file" class="form-control form-control-modern" name="productImage" value="<?php echo $fetchprod['pimage'] ?>" required />
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="tabs-modern row" style="min-height: 490px;">
												<div class="col-lg-2-5 col-xl-1-5">
													<div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
											      		<a class="nav-link" id="price-tab" data-toggle="pill" href="#price" role="tab" aria-controls="price" aria-selected="true">Price</a>
		
											    	</div>
												</div>
												<div class="col-lg-3-5 col-xl-4-5">
													<div class="tab-content" id="tabContent">
											      		<div class="tab-pane fade show active" id="price" role="tabpanel" aria-labelledby="price-tab">
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Regular Price ($)</label>
																<div class="col-lg-7 col-xl-6">
																	<input type="text" class="form-control form-control-modern" name="regularPrice" value="<?php echo $fetchprod['prprice'] ?>" required />
																</div>
															</div>
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Sale Price ($)</label>
																<div class="col-lg-7 col-xl-6">
																	<input type="text" class="form-control form-control-modern" name="salePrice" value="<?php echo $fetchprod['psprice'] ?>" />
																</div>
																
															</div>
                                                
											</div>
										</div>
									</section>
								</div>
							</div>
							<div class="row action-buttons">
								<div class="col-12 col-md-auto">
								
								<button type="submit" name="product" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-save text-4 mr-2"></i> Save Product
								</button>
								</div>
								<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
									<a href="#" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
								</div>
								<!-- <div class="col-12 col-md-auto ml-md-auto mt-3 mt-md-0">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
							      <i class="bx bx-trash text-4 mr-2"></i> Delete Product
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

