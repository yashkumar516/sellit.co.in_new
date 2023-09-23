 <!-- include header start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
			<!-- end sidebar -->
				
				<section role="main" class="content-body content-body-modern">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Dashboard</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>eCommerce Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col">
							
							<div class="card card-modern ">
							
								<div class="card-body">
									<div class="datatables-header-footer-wrapper">
									
										<table class="table table-ecommerce-simple table-striped mb-0" id="datatable-ecommerce-list" style="min-width: 640px;">
											<thead>
												<tr>
													<!-- <th width="3%"><input type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2" value="" /></th> -->
													<th width="5%">ID</th>
													<th width="9%">Action</th>
													<th width="13%">Model Name</th>
													<th width="13%">Contact</th>
													<th width="13%">Offerprice</th>
													<th width="13%">Pickup Date</th>
													<th width="13%">Pickup Time</th>
													<th width="13%">Status</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$orderquery = mysqli_query($con,"SELECT * FROM `enquiry` WHERE `status` = 'Available' ");
												while($arorder = mysqli_fetch_assoc($orderquery))
												{
												   $uid = $arorder['userid'];
												   $enquid = $arorder['id'];
												   $conact = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `id` = '$uid' "));
												   $rowadd = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `address` WHERE `enquid` = '$enquid' "));
												   if($rowadd == 1){
												   $pickupdate = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `address` WHERE `enquid` = '$enquid' "));
												   $soon = $pickupdate['soon'];
												   $choseday = $pickupdate['choseday'];
												   $day = $pickupdate['day'];
												   $time = $pickupdate['time'];
												}else{
													$soon = null;
													$choseday = null;
													$day = null;
													$time = null;
												}
												?>
												<tr>
													<!-- <td width="30"><input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" /></td> -->
													<td><a href="ecommerce-orders-detail.php?id=<?php echo $arorder['id'] ?>"><strong><?php echo $arorder['id'] ?></strong></a></td>
													<td>
													<a title="delete"><strong><i class="fas fa-trash-alt mr-3" style="font-size:20px;"></i></strong></a>
													<a href="moreinfo.php?id=<?php echo $arorder['id'] ?>" title="more info" ><i class="fas fa-edit ml-1" style="font-size:20px;"></i></strong></a>
													</td>
													<td><?php echo $arorder['model_name'] ?></td>
													<td><?php echo $conact['mobile']  ?></td>
													<td>₹<?php echo $arorder['offerprice'] ?></td>
													<?php
                                                      if($soon != null){
													?>
													<td><?php echo $soon ?></td>
													<?php
													 }elseif($choseday != null){
													?>
                                                     <td><?php echo $choseday ?></td>
													<?php
													}elseif($day != null){
													?>
                                                     <td><?php echo $day ?></td>
													<?php
													}else{
													?>
                                                    <td>Incomplete Lead</td>
													<?php
													}
													?>
													<?php
													 if($time != null){
													?>
                                                       <td><?php echo $time ?></td>
													<?php
													  }else{
													?>
                                                    <td>Anytime</td>
													<?php
											          }
													?>
													 <td>
													 <select name="status" id="status" class="form-control" onchange="return changestatus(<?php echo $arorder['id']  ?>)">
													 <option value="<?php echo $arorder['status'] ?>" selected><?php echo $arorder['status'] ?></option>
													 <option value="Complete">Complete</option>
													 <option value="Available">Available</option>
													 </select>
													 </td>
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
														<a href="ecommerce-orders-detail.html" class="bulk-action-apply btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Apply</a>
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
		
		<!-- Specific Page Vendor -->
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
             'csv', 'excel', 'pdf'
          ]
       } );
    } );
    </script>
	<script>
     $(document).ready(function() {
    var table = $('#datatable-ecommerce-list').DataTable();
   
    } );
</script>

	</body>
</html>
<!-- start change status script -->
<script>
    function changestatus(gid) { 
    var id = gid;
	 var status = document.getElementById("status").value;
      swal({ title: "warning",
       text: "Press ok if you want to change status",
       type: "warning"}).then(confirm => {
      if (confirm) {
              window.location.href = 'change_lead_status.php?id='+id+'&&status='+status;
          }
           });
         
       }
       </script>
<!-- start change status script -->
