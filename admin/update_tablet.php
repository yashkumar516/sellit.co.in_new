 
<!-- include header and sidebar start -->
<?php include 'includes/header.php' ?>		
<?php include 'includes/sidebar.php' ?>
<!-- end sidebar  header -->
 <?php
 $pid = $_REQUEST['id'];
 $sepdetail = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$pid' "));
 $catid = $sepdetail['categoryid'];
 $subid = $sepdetail['subcategoryid'];
 $childid = $sepdetail['childcategoryid'];
if(isset($_POST['product']))
{
	$category = $_POST['categoryname'];
	$subcategory = $_POST['subcategory'];
	$childcategory = $_POST['childcategory'];
	$productname = $_POST['productName'];
	$productimage = str_replace(" ","_",$_FILES['productImage']['name']);
	if($productimage == null)
	{
		$query = mysqli_query($con,"UPDATE `product` SET `categoryid`='$category',`subcategoryid`='$subcategory',`childcategoryid`='$childcategory',`product_name`='$productname'  WHERE `id` = '$pid' ");
			  if($query)
			  {
			              mysqli_query($con,"DELETE FROM `tabletsvarient` where `product_name` = '$pid' ");
			      
			              $varient = $_POST['varient'];
			              $upto = $_POST['upto'];
			              foreach($varient as $key => $value){
			              $insertvarient = mysqli_query($con,"INSERT INTO `tabletsvarient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
			              VALUES('$category','$subcategory','$childcategory','$pid','$value','$upto[$key]')");
		                }
			      
	            echo "<script> alert('insert successfully');
					window.location.href = 'tabletlist.php';
					</script>"; 
			  }
			  else
			  {
				echo "<script> alert('insert unsuccessfully');
				window.location.href = 'tabletlist.php';
				
				</script>";  
			  }
	}
	else
	{
	 $productimage = getimagesize($_FILES['productImage']['tmp_name']);
	if(isset($productimage['mime'])){
	if($productimage['mime'] == "image/png"){
	$pimg = imagecreatefrompng($_FILES['productImage']['tmp_name']);
    if(isset($pimg)){	
	 $out_img = time().random_int(100000, 999999).'.webp';
	 imagewebp($pimg,"img/".$out_img,100);
	   $query = mysqli_query($con,"UPDATE `product` SET `categoryid`='$category',`subcategoryid`='$subcategory',`childcategoryid`='$childcategory',`product_name`='$productname',`product_image`='$out_img' WHERE `id` = '$pid' ");
		  if($query)
		  {
		      
		        mysqli_query($con,"DELETE FROM `tabletsvarient` where `product_name` = '$pid' ");
			      
			              $varient = $_POST['varient'];
			              $upto = $_POST['upto'];
			              foreach($varient as $key => $value){
			              $insertvarient = mysqli_query($con,"INSERT INTO `tabletsvarient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
			              VALUES('$category','$subcategory','$childcategory','$pid','$value','$upto[$key]')");
		                }
		      
			echo "<script> alert('insert successfully');
				window.location.href = 'tabletlist.php';
				</script>"; 
		  }
		  else
		  {
			echo "<script> alert('insert unsuccessfully');
			window.location.href = 'tabletlist.php';
			</script>";  
		  }

	}else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}	
	
	}
// 	start new 
    elseif($productimage['mime'] == "image/jpeg"){
        $pimg = imagecreatefromjpeg($_FILES['productImage']['tmp_name']);
    if(isset($pimg)){	
	 $out_img = time().random_int(100000, 999999).'.webp';
	 imagewebp($pimg,"img/".$out_img,100);
	   $query = mysqli_query($con,"UPDATE `product` SET `categoryid`='$category',`subcategoryid`='$subcategory',`childcategoryid`='$childcategory',`product_name`='$productname',`product_image`='$out_img' WHERE `id` = '$pid' ");
		  if($query)
		  {
		      
		        mysqli_query($con,"DELETE FROM `tabletsvarient` where `product_name` = '$pid' ");
			      
			              $varient = $_POST['varient'];
			              $upto = $_POST['upto'];
			              foreach($varient as $key => $value){
			              $insertvarient = mysqli_query($con,"INSERT INTO `tabletsvarient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
			              VALUES('$category','$subcategory','$childcategory','$pid','$value','$upto[$key]')");
		                }
		      
			echo "<script> alert('insert successfully');
				window.location.href = 'tabletlist.php';
				</script>"; 
		  }
		  else
		  {
			echo "<script> alert('insert unsuccessfully');
			window.location.href = 'tabletlist.php';
			</script>";  
		  }

	}else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
    }
// end new
	else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
	}else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
	}
}
 ?>
				
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Model Name</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>eCommerce</span></li>
								<li><span>Model</span></li>
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
													<p class="card-big-info-desc">Add here the Model description with all details and necessary information.</p>
												</div>
												<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Category</label>
														<div class="col-lg-7 col-xl-6">
														<select name="categoryname" id="category"  class="form-control form-control-modern" name="categoryname" onchange="callsubcat()" required>
														<?php 
                                                          $category = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `category` WHERE `id` = '$catid' "));
														?>
														<option value="<?php echo $category['id'] ?>"  class="form-control form-control-modern"><?php echo $category['category_name'] ?></option>
														   <?php
															  $fetch = mysqli_query($con,"SELECT * FROM `category` WHERE `status` = 'active' AND `id` = '3'");
															   while($arr= mysqli_fetch_assoc($fetch))
															   {
														     ?>
                                                             <option value="<?php echo $arr['id'] ?>"  class="form-control form-control-modern"><?php echo $arr['category_name'] ?></option>
															 <?php
															   }
															   ?>
														</select>			
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Brand</label>
														<div class="col-lg-7 col-xl-6">
														<select name="subcategory" id="subcategory"  class="form-control form-control-modern" onchange="callchildcat()">
														<?php 
                                                          $subcategory = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `id` = '$subid' "));
														?>
														<option value="<?php echo $subcategory['id'] ?>"  class="form-control form-control-modern"><?php echo $subcategory['subcategory_name'] ?></option>
														
														</select>
																											
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Series</label>
														<div class="col-lg-7 col-xl-6">
														<select name="childcategory" id="childcategory"  class="form-control form-control-modern" >
														<?php 
														  $childcategory = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `childcategory` WHERE `id` = '$childid' "));
				
														?>
														<option value="<?php echo $childcategory['id'] ?>"  class="form-control form-control-modern"><?php echo $childcategory['childcategory'] ?></option>
													
														</select>
																											
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">model Name</label>
														<div class="col-lg-7 col-xl-6">
															<input type="text" class="form-control form-control-modern" name="productName" value="<?php echo $sepdetail['product_name'] ?>" required />
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Product Image(155*155 px)</label>
														<div class="col-lg-7 col-xl-6">
														<img src="img/<?php echo $sepdetail['product_image'] ?>" width="100px" alt="">
															<input type="file" class="form-control form-control-modern" name="productImage" value="<?php echo $sepdetail['product_image'] ?>" />
														</div>
													</div>

													<div class="col-12">
															<p class="btn btn-primary" width="100%" id="addtag">Add Varient</p>
													</div>

                                              	<div class="form-group align-items-center" id="tag">
                                              	    
                                              	    <?php 
                                              	     $varquery = mysqli_query($con,"SELECT * FROM `tabletsvarient` WHERE `product_name` = '$pid' ");
                                              	     while($arr = mysqli_fetch_assoc($varquery )){
                                              	    ?>
                                                    <div class="row my-2">
												     <div class="col-1">
														<label class=" control-label text-lg-right mb-0">varient</label>
													 </div>
														<div class="col-3">
															<input type="text" class="form-control form-control-modern" name="varient[]" value="<?= $arr['varient'] ?>" required />
														</div>
													
													  <div class="col-2">
														<label class=" control-label text-lg-right mb-0">upto value</label>
													  </div>
														<div class="col-4">
															<input type="text" class="form-control form-control-modern" name="upto[]"  value="<?= $arr['uptovalue'] ?>" required />
														</div>
                                                         <div class="col-2"><button class="btn btn-primary" id="removed">remove</button></div>
                                                        
													</div>
													<?php } ?>
													
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
									<i class="bx bx-save text-4 mr-2"></i> Update Model
								</button>
								</div>
								<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
									<a href="tabletlist.php" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
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

<script>
$(document).ready(function(e){
	var html = '<div class="row my-3" id="rmtag"><div class="col-1"><label class=" control-label text-lg-right mb-0">Varient </label></div><div class="col-3"><input type="text" class="form-control form-control-modern" name="varient[]" value="" required /></div><div class="col-2"><label class=" control-label text-lg-right mb-0">upto value</label></div><div class="col-4"><input type="text" class="form-control form-control-modern" name="upto[]" value="" required /></div><div class="col-2"><button class="btn btn-primary" id="removed">remove</button></div></div>';
  $("#addtag").click(function(e){
     $("#tag").append(html);
  });

  $("#tag").on('click','#removed',function(e){
     $("#rmtag").remove();
  })
});
</script>

<script>
 function	callsubcat(){
		 var id = $('#category').val();
		if(id != null)
		{
			$.ajax({
				  method: "post",
				  url : "subdajax.php",
				  data:{cid:id},
				  dataType: "html",
				  success:function(result)
				  {
					  $('#subcategory').html(result);
				  }
			});
		}
	}
</script>

<script>
 function	callchildcat(){
		 var id = $('#subcategory').val();
		if(id != null)
		{
			$.ajax({
				  method: "post",
				  url : "childajax.php",
				  data:{sid:id},
				  dataType: "html",
				  success:function(result)
				  {
					  $('#childcategory').html(result);
				  }
			});
		}
	}
</script>
