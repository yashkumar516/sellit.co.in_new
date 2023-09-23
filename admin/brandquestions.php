 
<!-- include header and sidebar start -->
<?php include 'includes/header.php' ?>		
<?php include 'includes/sidebar.php' ?>
<!-- end sidebar  header -->
				
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
										       <form action="brandquescsv.php" enctype="multipart/form-data" method="POST" >
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
                                                <th>Brand Name</th>
                                                <th>Call Not Recieve</th>
                                                <th>3 Months</th>
                                                <th>3 to 6 Months</th>
                                                <th>6 to 11 Months</th>
                                                <th>Above 11 Months</th>
                                                <th>Touchscreen</th>
                                                <th>Largespot</th>
                                                <th>Multiplespots</th>
                                                <th>Minorspots</th>
                                                <th>Nospot</th>
                                                <th>Display Faded</th>
                                                <th>Multilines</th>
                                                <th>Nolines</th>
                                                <th>Cracked Screen</th>
                                                <th>Damage Screen</th>
                                                <th>Heavy Screcthes</th>
                                                <th>1-2 Screcthes</th>
                                                <th>No Screcthes</th>
                                                <th>Major Screcthes</th>
                                                <th>Less than 2 Body scratches</th>
                                                <th>No Body Screcthes</th>
                                                <th>Heavy Dents</th>
                                                <th>Less than 2 dents</th>
                                                <th>No dents</th>
                                                <th>Cracked Side Back Panel</th>
                                                <th>Missing Side Back Panel</th>
                                                <th>No Defect On Side Back Panel</th>
                                                <th>Bent / Curved Panel</th>
                                                <th>Loose Screen Or Gap in Screen</th>
                                                <th>No Bents</th>
                                                <th>Charger</th>
                                                <th>Earphone</th>
                                                <th>Boximei</th>
                                                <th>Billimei</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php 
                                          $fetchbrques = mysqli_query($con,"SELECT * FROM `subcategory` WHERE `category_id` = '1' ");
                                          while($ar = mysqli_fetch_assoc($fetchbrques)){
                                         ?>
                                        <!-- fetch category details start -->
                                            <tr>
                                                <td><strong><?= $ar['id'] ?></strong></td>
                                                <td><strong><?= $ar['subcategory_name'] ?></strong></td>
                                                <td><?= $ar['callvalue'] ?></td>
                                                <td><?= $ar['3months'] ?></td>
                                                <td><?= $ar['3to6months'] ?></td>
                                                <td><?= $ar['6to11months'] ?></td>
                                                <td><?= $ar['above11'] ?></td>
                                                <td><?= $ar['touchscreen'] ?></td>
                                                <td><?= $ar['largespot'] ?></td>
                                                <td><?= $ar['multiplespot'] ?></td>
                                                <td><?= $ar['minorspot'] ?></td>
                                                <td><?= $ar['nospot'] ?></td>
                                                <td><?= $ar['displayfade'] ?></td>
                                                <td><?= $ar['multilines'] ?></td>
                                                <td><?= $ar['nolines'] ?></td>
                                                <td><?= $ar['crackedscreen'] ?></td>
                                                <td><?= $ar['damegescreen'] ?></td>	
                                                <td><?= $ar['heavyscracthes'] ?></td>
                                                <td><?= $ar['12scratches'] ?></td>
                                                <td><?= $ar['noscratches'] ?></td>
                                                <td><?= $ar['majorscratch'] ?></td>
                                                <td><?= $ar['2bodyscratches'] ?></td>
                                                <td><?= $ar['nobodysratches'] ?></td>
                                                <td><?= $ar['heavydents'] ?></td>
                                                <td><?= $ar['2dents'] ?></td>
                                                <td><?= $ar['nodents'] ?></td>
                                                <td><?= $ar['crackedsideback'] ?></td>
                                                <td><?= $ar['missingsideback'] ?></td>
                                                <td><?= $ar['nodefectssideback'] ?></td>
                                                <td><?= $ar['bentcurvedpanel'] ?></td>	
                                                <td><?= $ar['loosescreen'] ?></td>
                                                <td><?= $ar['nobents'] ?></td>
                                                <td><?= $ar['charger'] ?></td>
                                                <td><?= $ar['earphone'] ?></td>
                                                <td><?= $ar['boximei'] ?></td>
                                                <td><?= $ar['billimei'] ?></td>
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

