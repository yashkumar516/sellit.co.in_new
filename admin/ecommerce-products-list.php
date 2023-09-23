 <!-- include header start -->
 <?php include 'includes/header.php' ?>			
<?php include 'includes/sidebar.php' ?>
<?php
//  new php pagination start
$per_page=8;
 $start=0;
 $current_page=1;
 if(isset($_GET['start']))
 {
     $start=$_GET['start'];
     $current_page=$start;
     $start--;
     $start=$start*$per_page;
 }
 $record=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `product` WHERE `status` = 'active' "));
 $pagi = ceil($record/$per_page); 
?>
<!-- end sidebar -->
				
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Products</h2>
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
					<div class="ecommerce-form-sidebar-overlay-wrapper">
						<div class="ecommerce-form-sidebar-overlay-body">
							<a href="#" class="ecommerce-form-sidebar-overlay-close"><i class="bx bx-x"></i></a>
							<div class="scrollable h-100 loading-overlay-showing" data-plugin-scrollable>
								<div class="loading-overlay">
									<div class="bounce-loader">
										<div class="bounce1"></div>
										<div class="bounce2"></div>
										<div class="bounce3"></div>
									</div>
								</div>
								<div class="ecommerce-form-sidebar-overlay-content scrollable-content px-3 pb-3 pt-1"></div>
							</div>
						</div>
					</div>
					<div class="row justify-content-center justify-content-sm-between">
						<div class="col-sm-auto text-center mb-4 mb-sm-0 mt-2 mt-sm-0">
							<a href="ecommerce-products-form.php" class="ecommerce-sidebar-link btn btn-primary btn-md font-weight-semibold btn-py-2 px-4" data-ajax-url="ajax/ajax-products-form-empty.html">+ Add Product</a>
						</div>
						<div class="col-sm-auto">
							<form action="http://preview.oklerthemes.com/porto-admin/3.0.0/ecommerce-products-list.html" class="search search-style-1 search-style-1-light mx-auto" method="GET">
								<div class="input-group">
									<input type="text" class="form-control" name="product-term" id="product-term" placeholder="Search Product">
									<span class="input-group-append">
										<button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
									</span>
								</div>
							</form>
						</div>
					</div>
					<div class="row row-gutter-sm mb-5">
						<!-- <div class="col-lg-2-5 col-xl-1-5 mb-4 mb-lg-0">
							<div class="filters-sidebar-wrapper bg-light rounded">
								<div class="card card-modern">
									<div class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										</div>
										<h4 class="card-title">ELECTRONICS</h4>
									</div>
									<div class="card-body">
										<ul class="list list-unstyled mb-0">
											<li><a href="#">Smart TVs</a></li>
											<li><a href="#">Cameras</a></li>
											<li><a href="#">Headphones</a></li>
											<li><a href="#">Games</a></li>
										</ul>
									</div>
								</div>
								<hr class="solid opacity-7">
								<div class="card card-modern">
									<div class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										</div>
										<h4 class="card-title">PRICE</h4>
									</div>
									<div class="card-body">
										<div class="slider-range-wrapper">
											<div class="m-md slider-primary slider-modern" data-plugin-slider data-plugin-options='{ "half_values": true, "values": [ 25, 270 ], "range": true, "max": 300 }' data-plugin-slider-output="#priceRange" data-plugin-slider-link-values-to="#priceRangeValues">
												<input id="priceRange" type="hidden" value="25, 270" />
											</div>
											<form class="d-flex align-items-center justify-content-between mb-2" method="get">
												<span id="priceRangeValues" class="price-range-values">
													Price $<span class="min price-range-low">25</span> - $<span class="max price-range-high">270</span>
												</span>
												<input type="hidden" class="hidden-price-range-low" name="priceLow" value="" />
												<input type="hidden" class="hidden-price-range-high" name="priceHigh" value="" />
												<button type="submit" class="btn btn-primary btn-h-1 font-weight-semibold rounded-0 btn-px-3 btn-py-1 text-2">FILTER</button>
											</form>
										</div>
									</div>
								</div>
								<hr class="solid opacity-7">
								<div class="card card-modern">
									<div class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										</div>
										<h4 class="card-title">SIZES</h4>
									</div>
									<div class="card-body">
										<ul class="list list-inline list-filter mb-0">
											<li class="list-inline-item">
												<a href="#">S</a>
											</li>
											<li class="list-inline-item">
												<a href="#" class="active">M</a>
											</li>
											<li class="list-inline-item">
												<a href="#">L</a>
											</li>
											<li class="list-inline-item">
												<a href="#">XL</a>
											</li>
											<li class="list-inline-item">
												<a href="#">2XL</a>
											</li>
											<li class="list-inline-item">
												<a href="#">3XL</a>
											</li>
										</ul>
									</div>
								</div>
								<hr class="solid opacity-7">
								<div class="card card-modern">
									<div class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										</div>
										<h4 class="card-title">BRANDS</h4>
									</div>
									<div class="card-body">
										<ul class="list list-unstyled mb-0">
											<li><a href="#">Adidas <span class="float-right">18</span></a></li>
											<li><a href="#">Camel <span class="float-right">22</span></a></li>
											<li><a href="#">Samsung Galaxy <span class="float-right">05</span></a></li>
											<li><a href="#">Seiko <span class="float-right">68</span></a></li>
											<li><a href="#">Sony <span class="float-right">03</span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div> -->
						<div class="col-lg-3-9 col-xl-4-8">
							<div class="row row-gutter-sm">
								<!-- start -->
								<?php 
                                  $fetchproduct = mysqli_query($con,"SELECT * FROM `product` WHERE `status` = 'active' LIMIT $start,$per_page");
								  while($arproduct = mysqli_fetch_assoc($fetchproduct))
								  {
								?>
								<div class="col-sm-6 col-xl-3 mb-4" id="<?php echo $arproduct['product_name'] ?>">
									<div class="card card-modern card-modern-alt-padding">
										<div class="card-body bg-light">
											<div class="image-frame mb-2">
												<div class="image-frame-wrapper">
													<!-- <div class="image-frame-badges-wrapper">
														<span class="badge badge-ecommerce badge-danger">27% OFF</span>
													</div> -->
													<a href="ecommerce-products-form.php"><img src="../assets/images/productimage/<?php echo $arproduct['product_image'] ?>" class="img-fluid" alt="Product Short Name" /></a>
												</div>
											</div>
											<small><a href="ecommerce-products-form.php" class="ecommerce-sidebar-link text-color-grey text-color-hover-primary text-decoration-none"><?php echo $arproduct['category_name'] ?></a></small>
											<h4 class="text-4 line-height-2 mt-0 mb-2"><a href="ecommerce-products-form.php" class="ecommerce-sidebar-link text-color-dark text-color-hover-primary text-decoration-none"><?php echo $arproduct['product_name'] ?></a></h4>
											<!-- <div class="stars-wrapper">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div> -->
											<div class="product-price">
												<div class="regular-price on-sale"><?php echo $arproduct['regular_price'] ?></div>
												<div class="sale-price"><?php echo $arproduct['sale_price'] ?></div>
											</div>
										</div>
									</div>
								</div>
								<?php
								  }
								?>
								<!-- end -->
							
							</div>
							<div class="row row-gutter-sm justify-content-between">
								<div class="col-lg-auto order-2 order-lg-1">
									<p class="text-center text-lg-left mb-0">Showing 1-<?php echo $per_page ?> of <?php echo $record ?> results</p>
								</div>
								<div class="col-lg-auto order-1 order-lg-2 mb-3 mb-lg-0">
									<nav aria-label="Page navigation example">
									  	<ul class="pagination pagination-modern pagination-modern-spacing justify-content-center justify-content-lg-start mb-0">
									    	<li class="page-item">
									      		<a class="page-link prev" href="#" aria-label="Previous">
										        	<span><i class="fas fa-chevron-left" aria-label="Previous"></i></span>
										      	</a>
									    	</li>
											<?php

                                                for($i=1;$i<=$pagi;$i++)
                                                {
                                                $class='';
                                                 if($current_page == $i)
                                                 {
                                                $class='active';
                                                }
                                                ?>
                                                <li id="page" class="page-item <?php echo $class ?> " ><a class="page-link" href="?start=<?php echo urlencode($i) ?>"><?php echo $i ?></a></li>
                                                <?php
                                                }
                                                ?>
										    <li class="page-item">
										      	<a class="page-link next" href="#page" aria-label="Next">
										        	<span><i class="fas fa-chevron-right" aria-label="Next"></i></span>
										      	</a>
										    </li>
									  	</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
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
		
		<!-- Specific Page Vendor -->		<script src="vendor/jquery-ui/jquery-ui.js"></script>		<script src="vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>		<script src="vendor/jquery-validation/jquery.validate.js"></script>		<script src="vendor/select2/js/select2.js"></script>		<script src="vendor/dropzone/dropzone.js"></script>		<script src="vendor/pnotify/pnotify.custom.js"></script>


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
		<script src="js/examples/examples.ecommerce.sidebar.overlay.js"></script>

	</body>
</html>

<!-- search script start here -->

<script type="text/javascript">

        $("#product-term").keyup(function(){		
               var productname=document.getElementById("product-term").value;	
                 var productbox = [<?php
                      $aquer=mysqli_query($con,"SELECT * FROM `product`");               		
                       while($arr=mysqli_fetch_assoc($aquer))
                            {
                               $array = json_encode($arr['product_name']);
                                 echo $array.",";   
                                      }
                          ?> ]
                for(var i=0; i < productbox.length; i++)
                {
               if(productbox[i].toUpperCase().indexOf(productname.toUpperCase())!=-1)
               {
                   
                document.getElementById(productbox[i]).style.display = "block";
               }
               else{
                   
                document.getElementById(productbox[i]).style.display = "none";   
               }


                }

            });
    </script> 

<!-- search script end here -->