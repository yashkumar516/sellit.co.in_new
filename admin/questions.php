 
<!-- include header and sidebar start -->
<?php include 'includes/header.php' ?>		
<?php include 'includes/sidebar.php' ?>
<!-- end sidebar  header -->
 <?php
if(isset($_POST['product']))
{
	$category = $_POST['categoryname'];
	$subcategory = $_POST['subcategory'];
	$childcategory = $_POST['childcategory'];
	$product_name = $_POST['model'];
	$copydisplay = $_POST['copydisplay'];
	$front_camera = $_POST['frontFcamera'];
	$back_camera = $_POST['BackFcamera'];
	$volume = $_POST['Volume'];
	$finger_touch = $_POST['Finger'];
	$speaker = $_POST['speeker'];
	$power_btn = $_POST['power'];
	$face_sensor = $_POST['face'];
	$charging_port = $_POST['charging'];
	$audio_receiver = $_POST['audio'];
	$camera_glass = $_POST['cglass'];
	$wifi = $_POST['wifi'];
	$silent_btn = $_POST['silent'];
	$battery = $_POST['battery'];
	$bluetooth = $_POST['bt'];
	$vibrator = $_POST['vibrate'];
	$microphone = $_POST['mic'];
	$displayvalue = $_POST['displayvalue'];
	$query = mysqli_query($con,"INSERT INTO `questions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`copydisplay`,`front_camera`,`back_camera`,`volume`,`finger_touch`,`speaker`,
	`power_btn`,`face_sensor`,`charging_port`,`audio_receiver`,`camera_glass`,`wifi`,`silent_btn`,`battery`,`bluetooth`,`vibrator`,`microphone`,`displayvalue`)
	                                VALUES('$category','$subcategory','$childcategory','$product_name','$copydisplay','$front_camera','$back_camera','$volume','$finger_touch','$speaker',
									'$power_btn','$face_sensor','$charging_port','$audio_receiver','$camera_glass','$wifi','$silent_btn','$battery','$bluetooth',
									'$vibrator','$microphone','$displayvalue')");
		if($query)
		{
			echo "<script> alert('insert successfully');
			window.location.href = 'question-list.php'
			</script>";
		}
		  else
		  {
			echo "<script> alert('insert unsuccessfully');
			window.location.href = 'question-list.php';
			
			</script>";  
		  }
     }
   ?>
				
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Questions</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>eCommerce</span></li>
								<li><span>Varient</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<form  action="" method="post" enctype="multipart/form-data" >
							<div class="row">
								<div class="col">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-2-5 col-xl-1-5">
													<i class="card-big-info-icon bx bx-box"></i>
													<h2 class="card-big-info-title">Question Info</h2>
												</div>
												<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Category</label>
														<div class="col-lg-7 col-xl-6">
														<select name="categoryname" id="category"  class="form-control form-control-modern" name="categoryname" onchange="callsubcat()" required>
														<option value=""  class="form-control form-control-modern"> select category</option>
														   <?php
															  $fetch = mysqli_query($con,"SELECT * FROM `category` WHERE `status` = 'active'");
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
														<option value=""  class="form-control form-control-modern"> Select Brand</option>
														</select>
																											
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Series</label>
														<div class="col-lg-7 col-xl-6">
														<select name="childcategory" id="childcategory"  class="form-control form-control-modern" onchange="mobilemodel()" >
														<option value=""  class="form-control form-control-modern">select Series</option>
														</select>
																											
														</div>
                                                    </div>
                                                    <div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Model</label>
														<div class="col-lg-7 col-xl-6">
														<select name="model" id="model"  class="form-control form-control-modern" >
														<option value=""  class="form-control form-control-modern">select Model</option>
														</select>
																											
														</div>
													</div>													
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>

                            	<!-- display questions -->
							<h1 style="text-align:center;">Display value</h1>
							<div class="row">					
								<div class="col pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body" style="background:none;">
											<div class="row">
												<div class="col-4 px-0">
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Display Value</label>
														<div class="col-lg-9 col-xl-8 p-0">
														 <input type="text" class="form-control form-control-modern" name="displayvalue" placeholder="Flate value" required>		
														</div>
													</div>
														
												
												</div>
											</div>
										</div>
									</section>
								</div>
							
							
							</div>

							<!-- display questions -->
							<h1 style="text-align:center;">Functional Questions</h1>
							<div class="row">					
								<div class="col pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 px-0">
	
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Front Camera</label>
														<div class="col-lg-9 col-xl-8 p-0">
														 <input type="text" class="form-control form-control-modern" name="frontFcamera" placeholder="Flate value" required>		
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Back Camera</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="BackFcamera" placeholder="Flate value" required>
														 		
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Volume Button</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="Volume" placeholder="Flate value" required>
																
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Finger Touch</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="Finger" placeholder="Flate value" required>
													
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Speeker</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="speeker" placeholder="Flate value" required>
															
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Power Botton</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="power" placeholder="Flate value" required>
														
														</div>
													</div>	
																
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 px-0">
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Copy display</label>
														<div class="col-lg-9 col-xl-8 p-0">
														 <input type="text" class="form-control form-control-modern" name="copydisplay" placeholder="Flate value" required>		
														</div>
												</div>
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Audio Recever</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="audio" placeholder="Flate value" required>
															
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Camera Glass</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="cglass" placeholder="Flate value" required>
											
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Wifi Value</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="wifi" placeholder="Flate value" required>
														
														</div>
													</div>
                                                    
                                                    <div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Silent Button</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="silent" placeholder="Flate value" required>
														
														</div>
													</div>	
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Battery Value</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="battery" placeholder="Flate value" required>
														
														</div>
													</div>										
												</div>
												
											</div>
										</div>
									</section>
								</div>
								<div class="col pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 px-0">
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Charging Port</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="charging" placeholder="Flate value" required>
															
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Face Sensor</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="face" placeholder="Flate value" required>
															
														</div>
													</div>	
														
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Vibration Value</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="vibrate" placeholder="Flate value" required>
															
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Microphone Value</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="mic" placeholder="Flate value" required>
													
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Bluetooth</label>
														<div class="col-lg-7 col-xl-8">
														 <input type="text" class="form-control form-control-modern" name="bt" placeholder="Flate value" required>
															
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
									<i class="bx bx-save text-4 mr-2"></i> Save Values
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
			$.ajax({
				  method: "post",
				  url : "mobileajax.php",
				  data:{mid:id},
				  dataType: "html",
				  success:function(result)
				  {
					   $('#model').html(result);
				  }
			});
		}
	}
</script>

<script>
    function mobilemodel(){
        var id = $('#childcategory').val();
		if(id != null)
		{
			$.ajax({
				  method: "post",
				  url : "modelajax.php",
				  data:{sid:id},
				  dataType: "html",
				  success:function(result)
				  {
                   $('#model').html(result);   
				  }
			});
		}
    }
</script>
