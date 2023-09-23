<!-- header and slider start -->
<?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
 <!-- header and slider end  -->
		  
		  <?php
				if(isset($_POST['submit']))
				{
					$cat_id = $_POST['category'];
					$subcat_id = $_POST['subcategory'];
					$name = $_POST['Name'];
					foreach($name as $key => $value){
				    $query = mysqli_query($con,"INSERT INTO `childcategory` (`categoryid`,`subcatid`,`childcategory`)
					 values('$cat_id','$subcat_id','$value') ");
					}
					if($query)
					{
						echo "<script> alert(' insert successfully');
						window.location.href = 'child-category-list.php';
						</script>";
					}
					else
					{
						echo "<script> alert('  insert not successfully');
						window.location.href = 'child-category-list.php';
						</script>";	
					}
				}
		  ?>

				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6"> Series Name</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>eCommerce</span></li>
								<li><span>Series</span></li>
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
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bx-camera"></i>
												<h2 class="card-big-info-title">Series Detail</h2>
												<p class="card-big-info-desc">Upload Series Detail</p>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center">
													<div class="col">

													
													<div class="form-group row align-items-center">
													<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0"> Select category</label>
													<div class="col-lg-7 col-xl-6">
														<select name="category" id="category" class="form-control form-control-modern" onchange="callsubcat()">
														<option value="">choose your category</option>
														<?php
														$selectcat = mysqli_query($con,"SELECT * FROM `category` WHERE `id` != '4' ");
														while($ar = mysqli_fetch_assoc($selectcat))
														{
														?>
                                                        <option value="<?php echo $ar['id'] ?>" ><?php echo $ar['category_name'] ?></option>
														<?php
														}
														?>
														</select>
													</div>
												</div>

												<div class="form-group row align-items-center">
													<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0"> Select Brand</label>
													<div class="col-lg-7 col-xl-6">
														<select name="subcategory" id="subcategory" class="form-control form-control-modern">
														<option value="">choose your brand</option>
														</select>
													</div>
												</div>
												<div class="form-group align-items-center" id="tag">
												<div class="row">
													<label class="col-3 control-label text-lg-right mb-0"> Series Name</label>
													<div class="col-lg-6 col-xl-6">
														<input type="text" class="form-control form-control-modern" name="Name[]" value="" required />
													
													</div>
													<div class="col-3">
													<button class="btn btn-primary" id="addtag">add more</button>
													</div>
												</div>

												</div>

							
														<!-- <div id="dropzone-form-image" class="dropzone-modern dz-square">													
														    <span class="dropzone-upload-message text-center">
																<i class="bx bxs-cloud-upload"></i>
																<b class="text-color-primary">Drag/Upload</b> your image here.
															</span>	
														</div> -->
			                                        
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
								<button type="submit" name="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-save text-4 mr-2"></i> Save Series
								</button>
							</div>
							<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
								<a href="#" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
							</div>
							<!-- <div class="col-12 col-md-auto ml-md-auto mt-3 mt-md-0">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-trash text-4 mr-2"></i> Delete Skin Type
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
		
		<!-- Specific Page Vendor -->		<script src="vendor/jquery-validation/jquery.validate.js"></script>		<script src="vendor/dropzone/dropzone.js"></script>		<script src="vendor/pnotify/pnotify.custom.js"></script>


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
	var html = '<div class="row my-1" id="rmtag"><label class="col-3 control-label text-lg-right"> Series Name</label><div class="col-lg-6 col-xl-6"><input type="text" class="form-control form-control-modern" name="Name[]" value="" required /></div><div class="col-3"><a id="removed">X</a></div></div>';
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