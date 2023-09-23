 
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
	$productname = $_POST['modelname'];
	$productimage = getimagesize($_FILES['modelimg']['tmp_name']);
	if(isset($productimage['mime'])){
	if($productimage['mime'] == "image/png"){
	$pimg = imagecreatefrompng($_FILES['modelimg']['tmp_name']);
    if(isset($pimg)){	
	 $out_img = time().random_int(100000, 999999).'.webp';
	 imagewebp($pimg,"img/".$out_img,100);
	$query = mysqli_query($con,"INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`)
	                                VALUES('$category','$subcategory','$childcategory','$productname','$out_img')");
		if($query)
		{
		   $mmid = mysqli_fetch_assoc(mysqli_query($con,"SELECT LAST_INSERT_ID() AS `id` FROM `product`"));
		   $mid = $mmid['id'];
		   $quinsert = mysqli_query($con,"INSERT INTO `questions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`)
			VALUES('$category','$subcategory','$childcategory','$mid') ");
			if($quinsert){
		      $varient = $_POST['varient'];
			  $upto = $_POST['upto'];
			  foreach($varient as $key => $value){
			  $insertvarient = mysqli_query($con,"INSERT INTO `varient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
			          VALUES('$category','$subcategory','$childcategory','$mid','$value','$upto[$key]')");
		    }
		   if($insertvarient){
			echo "<script> alert('varient successfully');
			
			
			</script>";
		   }else{
			echo "<script> alert('varient unsuccessfully');
		
			
			</script>";
		   }
		}
		  else
		  {
			echo "<script> alert('insert unsuccessfully');
		
			
			</script>";  
		  } 
	 }
	}else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
   }elseif($productimage['mime'] == "image/jpeg"){
    //   new started
	$pimg = imagecreatefromjpeg($_FILES['modelimg']['tmp_name']);
    if(isset($pimg)){	
	 $out_img = time().random_int(100000, 999999).'.webp';
	 imagewebp($pimg,"img/".$out_img,100);
	$query = mysqli_query($con,"INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`)
	                                VALUES('$category','$subcategory','$childcategory','$productname','$out_img')");
		if($query)
		{
		   $mmid = mysqli_fetch_assoc(mysqli_query($con,"SELECT LAST_INSERT_ID() AS `id` FROM `product`"));
		   $mid = $mmid['id'];
		   $quinsert = mysqli_query($con,"INSERT INTO `questions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`)
			VALUES('$category','$subcategory','$childcategory','$mid') ");
			if($quinsert){
		      $varient = $_POST['varient'];
			  $upto = $_POST['upto'];
			  foreach($varient as $key => $value){
			  $insertvarient = mysqli_query($con,"INSERT INTO `varient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
			          VALUES('$category','$subcategory','$childcategory','$mid','$value','$upto[$key]')");
		    }
		   if($insertvarient){
			echo "<script> alert('varient successfully');
			
			
			</script>";
		   }else{
			echo "<script> alert('varient unsuccessfully');
		
			
			</script>";
		   }
		}
		  else
		  {
			echo "<script> alert('insert unsuccessfully');
		
			
			</script>";  
		  } 
	 }
	}else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
    // new end 
   }else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
  }else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
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
								<li><span>Models</span></li>
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
													<h2 class="card-big-info-title">General Info</h2>
													<p class="card-big-info-desc">Add here the Model description with all details and necessary information.</p>
												</div>
												<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Category</label>
														<div class="col-lg-7 col-xl-6">
														<select name="categoryname" id="category"  class="form-control form-control-modern" name="categoryname" onchange="callsubcat()" required>
														<!-- pre selected code start -->
                                                          <?php
                                                           if(isset($_POST['product'])){
															   $c = $_POST['categoryname'];
															  $cf = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `category` WHERE `id` = '$c'"));
															  ?>
                                                             	<option value="<?php echo $cf['id'] ?>"  class="form-control form-control-modern" selected><?php echo $cf['category_name'] ?></option>
															  <?php
														   }
														  ?>
													
														<!-- pre selected code end -->
														<option value=""  class="form-control form-control-modern"> select category</option>
														   <?php
															  $fetch = mysqli_query($con,"SELECT * FROM `category` WHERE `status` = 'active' AND `id` = 1");
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
															<!-- pre selected code start -->
															<?php
                                                           if(isset($_POST['product'])){
															  $b = $_POST['subcategory'];
															  $bf = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `id` = '$b'"));
															  ?>
                                                             	<option value="<?php echo $bf['id'] ?>"  class="form-control form-control-modern" selected><?php echo $bf['subcategory_name'] ?></option>
															  <?php
														   }
														  ?>
													
														<!-- pre selected code end -->
														<option value=""  class="form-control form-control-modern"> Select Brand</option>
														</select>
																											
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select Series</label>
														<div class="col-lg-7 col-xl-6">
														<select name="childcategory" id="childcategory"  class="form-control form-control-modern">
															<!-- pre selected code start -->
															<?php
                                                           if(isset($_POST['product'])){
															  $s = $_POST['childcategory'];
															  $sf = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `childcategory` WHERE `id` = '$s'"));
															  ?>
                                                              <option value="<?php echo $sf['id'] ?>"  class="form-control form-control-modern" selected><?php echo $sf['childcategory'] ?></option>
															  <?php
														   }
														  ?>
													
														<!-- pre selected code end -->
														<option value=""  class="form-control form-control-modern">select Series</option>
														</select>
																											
														</div>
													</div>

													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Model Name</label>
														<div class="col-lg-7 col-xl-6">
														<input type="text" name="modelname" class="form-control form-control-modern" required >
																											
														</div>
													</div>

													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Model Image(155*155 px)</label>
														<div class="col-lg-7 col-xl-6">
														<input type="file" name="modelimg" class="form-control form-control-modern" required >
																											
														</div>
													</div>

												<div class="form-group align-items-center" id="tag">
                                                    <div class="row">
												     <div class="col-1">
														<label class=" control-label text-lg-right mb-0">varient</label>
													 </div>
														<div class="col-3">
															<input type="text" class="form-control form-control-modern" name="varient[]" value="" required />
														</div>
													
													  <div class="col-2">
														<label class=" control-label text-lg-right mb-0">upto value</label>
													  </div>
														<div class="col-4">
															<input type="text" class="form-control form-control-modern" name="upto[]"  value="" required />
														</div>

														<div class="col-2">
															<button class="btn btn-primary" width="100%" id="addtag">add model</button>
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
									<i class="bx bx-save text-4 mr-2"></i> Save Model
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

					<!-- start question table -->
					<div class="row mt-5">
					    
					<!--uptovalue from excel start-->
					<!-- <div class="card card-modern " >
						
									<div class="datatables-header-footer-wrapper">
										<div class="datatable-header">
											<div class="row align-items-center mb-3">
												<div class="col-12 col-lg-auto mb-3 mb-lg-0">

												</div>
											</div>
											<div class="col-5 mx-auto">
										       <form action="uptocsv.php" enctype="multipart/form-data" method="POST" >
                                               <div class="row">
											   <div class="col-8" >
										       <input type="file" class="form form-control" name="uptofile" required >
											   </div>
											    <div class="col-4" >
										       <input type="submit" class="btn btn-primary" value="upload" name="pricecsv" >
											   </div>
											   </div>
										       </form>
										</div>
										</div>
										
										<table class=" table-responsive table-bordered table-striped mb-0 " id="varintmobupto" style="min-width: 550px;">
										
											<thead>
												<tr>
										         <th width="20%">varient Id</th>
										          <th width="20%">model Name</th>
										          <th width="20%">model Brand</th>
										          <th width="20%">model Varient</th>
										          <th width="20%">model Upto Value</th>
												</tr>
											</thead>
											<tbody>
											    <php
											     $selectvarientupto = mysqli_query($con,"SELECT varient.id as vid,varient.varient,varient.uptovalue,product.product_name as model,
											     subcategory.subcategory_name FROM varient LEFT JOIN product on varient.product_name = product.id LEFT JOIN subcategory on product.subcategoryid = subcategory.id");
											     while($arv = mysqli_fetch_assoc($selectvarientupto)){
											    ?>
												<tr>
												 <td><= $arv['vid'] ?></td>
										          <td><= $arv['model'] ?></td>
										          <td><= $arv['subcategory_name'] ?></td>
										          <td><= $arv['varient'] ?></td>
										          <td><= $arv['uptovalue'] ?></td>
												</tr>
												<php
											     }
											     ?>
											</tbody>
										</table>
										<hr class="solid mt-5 opacity-4">
										<div class="datatable-footer">
											<div class="row align-items-center justify-content-between mt-3">
												<div class="col-lg-auto text-center order-3 order-lg-2">
													<div class="results-info-wrapper"></div>
												</div>
												<div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
													<div class="pagination-wrapper"></div>
												</div>
											</div>
										</div>
									</table>
								</div>

						</div> -->
					<!--uptovalue from excel end-->
							
							<div class="card card-modern">
						
									<div class="datatables-header-footer-wrapper">
										<div class="datatable-header">
											<div class="row align-items-center mb-3">
												<div class="col-12 col-lg-auto mb-3 mb-lg-0">
													<!-- <a href="ecommerce-products-form.php" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ Add Model</a> -->
												</div>
											</div>
											<div class="col-5 mx-auto">
										       <form action="csv.php" enctype="multipart/form-data" method="POST" >
                                               <div class="row">
											   <div class="col-8" >
										       <input type="file" class="form form-control" name="csvfile" required >
											   </div>
											    <div class="col-4" >
										       <input type="submit" class="btn btn-primary" value="upload" name="uploadcsv" >
											   </div>
											   </div>
										       </form>
										</div>
										</div>
										
										<table class="table table-responsive table-striped mb-0 " id="datatable-ecommerce-list" style="min-width: 550px;">
										
											<thead>
												<tr>
													<th>ID</th>
													<th>varientid</th>
													<th>Model Name</th>
													<th>Varient Name</th>
													<th>Varient Price</th>
													<th>Brand Name</th>
													<th>Display Value</th>
													<th>Copy Display</th>
													<th>Front Camera</th>
													<th>Back Camera</th>
													<th>Volume Button</th>
													<th>Finger Touch</th>
													<th>Speaker</th>
													<th>Power Button</th>
													<th>Face Sensor</th>
													<th>Charging Port</th>
													<th>Audio Reciever</th>
													<th>Camera Glass </th>
													<th>Wifi</th>
													<th>Silent Button</th>
													<th>Battery</th>
													<th>Bluetooth</th>
													<th>Vibrator</th>
													<th>microphone</th>
												</tr>
											</thead>
											<tbody>
											<!-- fetch category details start -->
											  <?php
												$fetchproduct = mysqli_query($con,"SELECT questions.product_name as pid,varient.id as vid,questions.displayvalue,questions.copydisplay,questions.front_camera, 
												questions.back_camera,questions.volume,questions.finger_touch,questions.speaker,questions.power_btn,questions.face_sensor,questions.charging_port,questions.audio_receiver,
												questions.camera_glass,questions.wifi,questions.silent_btn,questions.battery,questions.bluetooth,questions.vibrator,questions.microphone,varient.varient,varient.uptovalue 
												FROM `questions` JOIN `varient` ON varient.product_name = questions.product_name WHERE questions.categoryid = '1'");
												while($arproduct = mysqli_fetch_assoc($fetchproduct))
												{
													$productid = $arproduct['pid'];    
													$row = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$productid' "));
													if($row >= 1){
													$selproduct = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$productid' "));
													$brndid = $selproduct['subcategoryid']; 
													$fetchbb = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `id` = '$brndid'")); 
												} 
												                             
											  ?>
											<!-- fetch category details end -->
												<tr>
													<td><strong><?php echo $productid ?></strong></td>
													<td><strong><?php echo $arproduct ['vid'] ?></strong></td>
													<td><?php echo $selproduct['product_name'] ?></td>
													<td><?php echo $arproduct['varient'] ?></td>
													<td><?php echo $arproduct['uptovalue'] ?></td>
													<td class="text-capitalize"><?php echo $fetchbb['subcategory_name'] ?></td>
													<td><?php echo $arproduct['displayvalue'] ?></td>
													<td><?php echo $arproduct['copydisplay'] ?></td>
													<td><?php echo $arproduct['front_camera'] ?></td>
													<td><?php echo $arproduct['back_camera'] ?></td>
													<td><?php echo $arproduct['volume'] ?></td>
													<td><?php echo $arproduct['finger_touch'] ?></td>
													<td><?php echo $arproduct['speaker'] ?></td>
													<td><?php echo $arproduct['power_btn'] ?></td>
													<td><?php echo $arproduct['face_sensor'] ?></td>
													<td><?php echo $arproduct['charging_port'] ?></td>
													<td><?php echo $arproduct['audio_receiver'] ?></td>	
													<td><?php echo $arproduct['camera_glass'] ?></td>
													<td><?php echo $arproduct['wifi'] ?></td>
													<td><?php echo $arproduct['silent_btn'] ?></td>
													<td><?php echo $arproduct['battery'] ?></td>
													<td><?php echo $arproduct['bluetooth'] ?></td>
													<td><?php echo $arproduct['vibrator'] ?></td>
													<td><?php echo $arproduct['microphone'] ?></td>
												</tr>
												<?php
												}
												?>											
											</tbody>
										</table>
										<hr class="solid mt-5 opacity-4">
										<div class="datatable-footer">
											<div class="row align-items-center justify-content-between mt-3">
												<!-- <div class="col-md-auto order-1 mb-3 mb-lg-0">
													<div class="d-flex align-items-stretch">
														<select class="form-control select-style-1 bulk-action mr-3" name="bulk-action" style="min-width: 170px;">
															<option value="" selected>Bulk Actions</option>
															<option value="delete">Delete</option>
														</select>
														<a href="#" class="bulk-action-apply btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Apply</a>
													</div>
												</div> -->
												<div class="col-lg-auto text-center order-3 order-lg-2">
													<div class="results-info-wrapper"></div>
												</div>
												<div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
													<div class="pagination-wrapper"></div>
												</div>
											</div>
										</div>
									</table>
								</div>

						</div>
			
				</div>
					<!-- end question table -->

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
	<script src="js/examples/examples.ecommerce.form.js"></script>
	<script src="js/examples/examples.header.menu.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
	<script  src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
		<script type="text/javascript">
               $(document).ready(function() {
            $('.table').DataTable( {
               dom: 'Bfrtip',
               buttons: [
             'csv'
            ]
           } );
          } );
        </script>
     	<script>
        $(document).ready(function() {
        var table = $('#datatable-ecommerce-list').DataTable();
        } );
       </script>
       
       
       <!--varient model upto start-->
       	<script type="text/javascript">
               $(document).ready(function() {
            $('#varintmobupto').DataTable( {
               dom: 'Bfrtip',
               buttons: [
             'csv' 
            ]
           } );
          } );
        </script>
		
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

<!-- <script>
 $('#modelform').on('submit',function(e){
	$.ajax({
		url:"savemodel.php",
		type:"post",
		data: $(this).serialize(),
		success:function(result){
			alert(result);
		}
	});
    e.preventDefault();
 });
</script> -->
