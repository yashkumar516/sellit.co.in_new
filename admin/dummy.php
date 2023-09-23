 
<!-- include header and sidebar start -->
<?php include 'includes/header.php' ?>		
<?php include 'includes/sidebar.php' ?>
<!-- end sidebar  header  -->

 <?php
 $productid = $_REQUEST['id'];
if(isset($_POST['product']))
{
	$upload[] = str_replace(" ","_",($_FILES['multipleImage']['name']));
	$categoryname = $_POST['categoryname'];
	$skinconcern = $_POST['skinconcern'];
	$agegroup = $_POST['agegroup'];
	$productname = $_POST['productName'];
	$productqty = $_POST['productqty'];
	$regularprice = $_POST['regularPrice'];
	$saleprice = $_POST['salePrice'];
	$productdesc = $_POST['productDescription'];
	$productimage = str_replace(" ","_",$_FILES['productImage']['name']);
	move_uploaded_file($_FILES['productImage']['tmp_name'], "../assets/images/productimage/".str_replace(" ","_",$_FILES['productImage']['name']));
   
	$productvideo = str_replace(" ","_",$_FILES['video']['name']);
	move_uploaded_file($_FILES['video']['tmp_name'], "../assets/images/productimage/".str_replace(" ","_",$_FILES['video']['name']));
 
	if($productimage == null && $productvideo == null && $upload[]== null)

	$query = mysqli_query($con,"UPDATE `product` SET `category_name`='$categoryname',`skinconcern_name`='$skinconcern',`agegroup_name`='$agegroup',`product_name`='$productname',`product_quantity`='$productqty',`product_descrip`='$productdesc',`regular_price`='$regularprice',`sale_price`='$saleprice',`product_image`='$productimage',`video`='$productvideo' WHERE `id` = '$productid'");
		  if($query)
		  {
			//  multiple image concept start
			 $multipleimagesdelete = mysqli_query($con,"DELETE FROM `multiple_product_images` WHERE `p_id` = '$productid' ");
			 if($multipleimagesdelete)
			 {
				foreach ($_FILES['multipleImage']['tmp_name'] as $key => $val ) {
					$filename = str_replace(" ","_",$_FILES['multipleImage']['name'][$key]);
					$filesize = $_FILES['multipleImage']['size'][$key];
					$filetempname = $_FILES['multipleImage']['tmp_name'][$key];
					move_uploaded_file($_FILES['multipleImage']['tmp_name'][$key],"../assets/images/productimage/".str_replace(" ","_",$_FILES['multipleImage']['name'][$key]));
					$multipleimg = mysqli_query($con,"INSERT INTO `multiple_product_images`(`p_id`,`name`) VALUES('$productid','$filename') ");
					
					 }
				   
					 if($multipleimg)
					 {
						echo "<script> alert('update successfully');
						window.location.href = 'product-list.php';
				   </script>";
					 }
					 else
					 {
						echo "<script> alert(' not update ');
						window.location.href = 'product-list.php';
				   </script>"; 
					 }
				
			 } 
			 else
			 {
				echo "<script> alert(' not delete ');
				window.location.href = 'product-list.php';
		   </script>"; 
			 }
			// multiple image concept end
              
		  }
		  else
		  {
            echo "<script>
             alert('update unsuccessfully');
             window.location.href = 'product-list.php';
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
                                                <?php 
                                                $fetchproduct = mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$productid'");
												$arproduct = mysqli_fetch_assoc($fetchproduct);
                                                ?>
												<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Category</label>
														<div class="col-lg-7 col-xl-6">
														<select name="categoryname" id="category"  class="form-control form-control-modern" name="categoryname">
														<option value="<?php echo $arproduct['category_name'] ?>"  class="form-control form-control-modern" selected><?php echo $arproduct['category_name'] ?></option>
														   <?php
															  $fetch = mysqli_query($con,"SELECT * FROM `category` WHERE `status` = 'active'");
															   while($arr= mysqli_fetch_assoc($fetch))
															   {
														     ?>
                                                             <option value="<?php echo $arr['category_name'] ?>"  class="form-control form-control-modern"><?php echo $arr['category_name'] ?></option>
															 <?php
															   }
															   ?>
														</select>			
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Skin-concern</label>
														<div class="col-lg-7 col-xl-6">
														<select name="skinconcern" id="scinconcern"  class="form-control form-control-modern" name="categoryname">
														<option value="<?php echo $arproduct['skinconcern_name'] ?>" selected class="form-control form-control-modern"> <?php echo $arproduct['skinconcern_name'] ?></option>
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
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Age_Group</label>
														<div class="col-lg-7 col-xl-6">
														<select name="agegroup" id="scinconcern"  class="form-control form-control-modern" name="categoryname">
														<option value="<?php echo $arproduct['agegroup_name'] ?>" selected  class="form-control form-control-modern"><?php echo $arproduct['agegroup_name'] ?></option>
														<?php
															  $fetchage = mysqli_query($con,"SELECT * FROM `agegroup` WHERE `status` = 'active'");
															   while($arrage= mysqli_fetch_assoc($fetchage))
															   {
														     ?>
                                                             <option value="<?php echo $arrage['age'] ?>" class="form-control form-control-modern"><?php echo $arrage['age'] ?></option>
															 <?php
															   }
															   ?>
														</select>
																											
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Product Name</label>
														<div class="col-lg-7 col-xl-6">
															<input type="text" class="form-control form-control-modern" name="productName" value="<?php echo $arproduct['product_name'] ?>" required />
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Product Quantity</label>
														<div class="col-lg-7 col-xl-6">
															<input type="text" class="form-control form-control-modern" name="productqty" value="<?php echo $arproduct['product_quantity'] ?>" required />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Product Description</label>
														<div class="col-lg-7 col-xl-6">
															<textarea class="form-control form-control-modern" name="productDescription" rows="6"><?php echo $arproduct['product_descrip'] ?></textarea>
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
                                                        <img src="../assets/images/productimage/<?php echo $arproduct['product_image'] ?>" alt="img" width="200px">
														<input type="file" class="form-control form-control-modern" name="productImage" id="productImage" value="<?php echo $arproduct['product_image'] ?>" accept="productImage/*" />
                                                        </div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select multiple Image</label>
														<div class="col-lg-7 col-xl-6">
															
															<div class="row">
															<?php
															  $fetchmultimg = mysqli_query($con,"SELECT * FROM `multiple_product_images` WHERE `p_id` = '$productid' ");
															  while($arrmul=mysqli_fetch_assoc($fetchmultimg))
															  {
															?>
																<div class="col-lg-2 col-xl-2"><img src="../assets/images/productimage/<?php echo $arrmul['name'] ?>" width="100px" alt=""></div>
																<?php
															  }
										                      ?>
															</div>
														  <input type="file" class="form-control form-control-modern" name="multipleImage[]" multiple="multiple" value="" />
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Upload Video</label>
														<div class="col-lg-7 col-xl-6">
														<video class="demo cursor" width="110px" height="80px"> <source src="../assets/images/productimage/<?php echo $arproduct['video'] ?>" type="video/mp4"> <source src="mov_bbb.ogg" type="video/ogg"> </video>
															<input type="file" class="form-control form-control-modern" name="video" value="<?php echo $arproduct['product_image'] ?>" />
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
											      		<!-- <a class="nav-link" id="inventory-tab" data-toggle="pill" href="#inventory" role="tab" aria-controls="inventory" aria-selected="false">Inventory</a>
											      		<a class="nav-link" id="shipping-tab" data-toggle="pill" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">Shipping</a>
											      		<a class="nav-link" id="linked-products-tab" data-toggle="pill" href="#linked-products" role="tab" aria-controls="linked-products" aria-selected="false">Linked Products</a>
											      		<a class="nav-link" id="attributes-tab" data-toggle="pill" href="#attributes" role="tab" aria-controls="attributes">Attributes</a>
											      		<a class="nav-link" id="advanced-tab" data-toggle="pill" href="#advanced" role="tab" aria-controls="advanced">Advanced</a> -->
											    	</div>
												</div>
												<div class="col-lg-3-5 col-xl-4-5">
													<div class="tab-content" id="tabContent">
											      		<div class="tab-pane fade show active" id="price" role="tabpanel" aria-labelledby="price-tab">
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Regular Price ($)</label>
																<div class="col-lg-7 col-xl-6">
																	<input type="text" class="form-control form-control-modern" name="regularPrice" value="<?php echo $arproduct['regular_price'] ?>" required />
																</div>
															</div>
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Sale Price ($)</label>
																<div class="col-lg-7 col-xl-6">
																	<input type="text" class="form-control form-control-modern" name="salePrice" value="<?php echo $arproduct['sale_price'] ?>" />
																</div>
															</div>
											      		</div>
                                                <div class="tab-pane fade" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">SKU</label>
																<div class="col-lg-7 col-xl-6">
																	<input type="text" class="form-control form-control-modern" name="sku" value=""  />
																</div>
															</div>
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Manage Stock?</label>
																<div class="col-lg-7 col-xl-6">
																	<div class="checkbox">
																		<label class="my-2">
																			<input type="checkbox" value="">
																			Enable stock management at product level
																		</label>
																	</div>
																</div>
															</div>
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Stock Status</label>
																<div class="col-lg-7 col-xl-6">
																	<select class="form-control form-control-modern" name="stockStatus">
																		<option value="in-stock" selected>In Stock</option>
																		<option value="out-of-stock">Out of Stock</option>
																		<option value="on-backorder">On Backorder</option>
																	</select>
																</div>
															</div>
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Sold Individually</label>
																<div class="col-lg-7 col-xl-6">
																	<div class="checkbox">
																		<label class="my-2">
																			<input type="checkbox" value="">
																			Enable this to only allow one of this item to be bought in a single order
																		</label>
																	</div>
																</div>
															</div>
											      		</div>
											      		<div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Weight (oz)</label>
																<div class="col-lg-7 col-xl-6">
																	<input type="text" class="form-control form-control-modern" name="weight" value="" />
																</div>
															</div>
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Dimensions (in)</label>
																<div class="col-lg-7 col-xl-6">
																	<div class="row">
																		<div class="col-xl-4 mb-3 mb-xl-0">
																			<input type="text" class="form-control form-control-modern" name="dimensionsLength" value="" placeholder="Length" />
																		</div>
																		<div class="col-xl-4 mb-3 mb-xl-0">
																			<input type="text" class="form-control form-control-modern" name="dimensionsWidth" value="" placeholder="Width" />
																		</div>
																		<div class="col-xl-4">
																			<input type="text" class="form-control form-control-modern" name="dimensionsHeight" value="" placeholder="Height" />
																		</div>
																	</div>
																</div>
															</div>
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Shipping Class</label>
																<div class="col-lg-7 col-xl-6">
																	<select class="form-control form-control-modern" name="shippingclass">
																		<option value="in-stock" selected>No Shipping Class</option>
																		<option value="out-of-stock">International</option>
																		<option value="on-backorder">National</option>
																	</select>
																</div>
															</div>
											      		</div>
											      		<div class="tab-pane fade" id="linked-products" role="tabpanel" aria-labelledby="linked-products-tab">
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Upsells</label>
																<div class="col-lg-7 col-xl-6">
																	<select multiple data-plugin-selectTwo class="form-control form-control-modern" name="upSells" data-plugin-options='{ "placeholder": "Search for a product..." }'>
																		<option value=""></option>
																		<option value="product1">Porto Bag</option>
																		<option value="product2">Porto Shoes</option>
																		<option value="product3">Porto Jacket</option>
																	</select>
																</div>
															</div>
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Cross-sells</label>
																<div class="col-lg-7 col-xl-6">
																	<select multiple data-plugin-selectTwo class="form-control form-control-modern" name="crossSells" data-plugin-options='{ "placeholder": "Search for a product..." }'>
																		<option value=""></option>
																		<option value="product1">Porto Bag</option>
																		<option value="product2">Porto Shoes</option>
																		<option value="product3">Porto Jacket</option>
																	</select>
																</div>
															</div>
											      		</div>
											      		<div class="tab-pane fade" id="attributes" role="tabpanel" aria-labelledby="attributes-tab">
															<div class="ecommerce-attributes-wrapper">
																<div class="form-group row justify-content-center ecommerce-attribute-row">
																	<div class="col-xl-3">
																		<label class="control-label">Name</label>
																		<input type="text" class="form-control form-control-modern" name="attName" value="Size" />
																		<div class="checkbox mt-3 mb-3 mb-lg-0">
																			<label class="my-2">
																				<input type="checkbox" name="attVisible" value="1" checked>
																				Visible on the product page
																			</label>
																		</div>
																	</div>
																	<div class="col-xl-6">
																		<a href="#" class="ecommerce-attribute-remove text-color-danger float-right">Remove</a>
																		<label class="control-label">Value(s)</label>
																		<textarea class="form-control form-control-modern" name="attValue" rows="4" placeholder="Enter some text, or some attributes by | separating values">Small|Medium|Big</textarea>
																	</div>
																</div>
																<div class="form-group row justify-content-center ecommerce-attribute-row">
																	<div class="col-xl-3">
																		<label class="control-label">Name</label>
																		<input type="text" class="form-control form-control-modern" name="attName" value="Color" />
																		<div class="checkbox mt-3 mb-3 mb-lg-0">
																			<label class="my-2">
																				<input type="checkbox" name="attVisible" value="1" checked>
																				Visible on the product page
																			</label>
																		</div>
																	</div>
																	<div class="col-xl-6">
																		<a href="#" class="ecommerce-attribute-remove text-color-danger float-right">Remove</a>
																		<label class="control-label">Value(s)</label>
																		<textarea class="form-control form-control-modern" name="attValue" rows="4" placeholder="Enter some text, or some attributes by | separating values">Blue|Red|Green</textarea>
																	</div>
																</div>
															</div>
															<div class="row justify-content-center mt-4">
																<div class="col-xl-9 text-right">
																	<a href="#" class="ecommerce-attribute-add-new btn btn-primary btn-px-4 btn-py-2">+ Add New</a>
																</div>
															</div>
											      		</div>
											      		<div class="tab-pane fade" id="advanced" role="tabpanel" aria-labelledby="advanced-tab">
															<div class="form-group row">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Purchase Note</label>
																<div class="col-lg-7 col-xl-6">
																	<textarea class="form-control form-control-modern" name="purchaseNote" rows="6"></textarea>
																</div>
															</div>
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Menu Order</label>
																<div class="col-lg-7 col-xl-6">
																	<input type="text" class="form-control form-control-modern" name="menuOrder" value="" />
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

