 <!-- include header start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?> 
 	<!-- end sidebar -->
				
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Video</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>eCommerce</span></li>
								<li><span>Categories</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col">
							
							<div class="card card-modern">
								<div class="card-body">
									<div class="datatables-header-footer-wrapper">
										<div class="datatable-header">
											<div class="row align-items-center mb-3">
												<div class="col-12 col-lg-auto mb-3 mb-lg-0">
													<a href="upload_video.php" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ Add Video</a>
												</div>
												<div class="col-8 col-lg-auto ml-auto mb-3 mb-lg-0">
													<div class="d-flex align-items-lg-center flex-column flex-lg-row">
														<label class="ws-nowrap mr-3 mb-0">Filter By:</label>
														<select class="form-control select-style-1 filter-by" name="filter-by">
															<option value="all" selected>All</option>
															<!-- <option value="1">ID</option>
															<option value="2">Image</option>
															<option value="3">Banner</option>
															<option value="4">Status</option>						 -->
														</select>
													</div>
												</div>
												<div class="col-4 col-lg-auto pl-lg-1 mb-3 mb-lg-0">
													<!-- <div class="d-flex align-items-lg-center flex-column flex-lg-row">
														<label class="ws-nowrap mr-3 mb-0">Show:</label>
														<select class="form-control select-style-1 results-per-page" name="results-per-page">
															<option value="12" selected>12</option>
															<option value="24">24</option>
															<option value="36">36</option>
															<option value="100">100</option>
														</select>
													</div> -->
												</div>
												<div class="col-12 col-lg-auto pl-lg-1">
													<div class="search search-style-1 search-style-1-lg mx-lg-auto">
														<div class="input-group">
															<input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="Search Banner">
															<span class="input-group-append">
																<button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<table class="table table-ecommerce-simple table-striped mb-0" id="datatable-ecommerce-list" style="min-width: 550px;">
											<thead>
												<tr>
													<th width="3%"><input type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2" value="" /></th>
													<th width="8%">ID</th>
													<th width="28%">Action</th>
													<th width="28%">video Image</th>
													<th width="28%">Last Modify</th>
													<th width="23%">Status</th>
												</tr>
											</thead>
											<tbody>
											<!-- fetch category details start -->
                                              <?php
												$fetchvideo = mysqli_query($con,"SELECT * FROM `video`");
												while($arvideo = mysqli_fetch_assoc($fetchvideo))
												{
											?>
											<!-- fetch category details end -->
											    <tr>
													<td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td>
													<td><a href="#"><strong><?php echo $arvideo['id'] ?></strong></a></td>
													<td width="23%">
														<a href="delete_video.php?id=<?php echo $arvideo['id'] ?>"><strong><i class="fas fa-trash-alt mr-3" style="font-size:20px;"></i></strong></a>
													</td>
                                                      <td>
                                                      <img src="video/<?php echo $arvideo['name'] ?>" width="100px" alt="">

                                                      <video width="200">
                                                      <source src="video/<?php echo $arvideo['name'] ?>" type="video/mp4">
                                                      <source src="video/<?php echo $arvideo['name'] ?>" type="video/ogg">
                                                     </video>
                                                      </td>
				
													<td><?php echo date('d/m/y',strtotime($arvideo['modify']))  ?></td>
													<td>
													<?php
                                                    $bid = $arvideo['id'];
													$checkstatus =$arvideo['status'];
													if($checkstatus == 'active')
													{
													   echo	'<button class="btn btn-success" onclick="return changestatus('.$bid.')">'.$checkstatus.'</button>';
													}
													else
													{
														echo'<button class="btn btn-danger" onclick="return changestatus('.$bid.')">'.$checkstatus.'</button>';	
													}
													?>
													</td>
												</tr>;
                                                <!-- row end -->
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
		
		<!-- Specific Page Vendor -->		<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>		<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>


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
		<script src="js/examples/examples.ecommerce.datatables.list.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

	</body>
</html>

<!-- status script start here -->
<script>
 function changestatus(gid) { 
var id = gid;
swal({ title: "warning",
 text: "Press ok if you want to change status",
 type: "success"}).then(okay => {
   if (okay) {
    window.location.href = 'change_video_status.php?id='+id;
  }
  else
  {
    window.location.href = 'video-list.php';   
  }
});
         
 }
   </script>
<!-- status script end here -->