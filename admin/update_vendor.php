  <!-- header and slider start -->

  <?php include 'includes/header.php' ?>
  <?php include 'includes/sidebar.php' ?>
  <!-- header and slider end  -->
		  <?php
            $id = $_REQUEST['id'];
            $fetchvendor = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `vendors` WHERE `id` = '$id'"));
          ?>

				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Vendor Name</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>Vendor</span></li>
							</ol>
                             <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<form  action="updatevendor.php?vid=<?= $id ?>" method="post" enctype="multipart/form-data">
                    <h2 class="text-capitalize">Register Vendor</h2>
						<div class="row">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<!-- <div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bx-camera"></i>
												<h2 class="card-big-info-title">Vendor Detail</h2>
												<p class="card-big-info-desc">Upload your Vendor detail</p>
											</div> -->
											<div class="col-12">
                                            
												<div class="form-group row align-items-center">
													<div class="col-4 my-3">
													<div class="form-group row align-items-center">
													<label class="col-4 control-label text-center mb-0">Name<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8">
														<input type="text" class="form-control form-control-modern" name="name" value="<?= $fetchvendor['name'] ?>" required />
													</div>
												  </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4 control-label text-center mb-0">Mobile No.<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
														<input type="text" class="form-control form-control-modern" name="mobileno" value="<?= $fetchvendor['mobileno'] ?>" required />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Alternate No.</label>
													<div class="col-8 ">
														<input type="text" class="form-control form-control-modern" name="alternateno" value="<?= $fetchvendor['alternateno'] ?>" />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">E-mail.<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
														<input type="text" class="form-control form-control-modern" name="email" value="<?= $fetchvendor['email'] ?>" readonly required />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Present Address</label> 
													<div class="col-8 ">
														<textarea class="form-control form-control-modern" name="presentadd" id="" ><?= $fetchvendor['presentadd'] ?></textarea>
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Permanent Address</label> 
													<div class="col-8 ">
														<textarea class="form-control form-control-modern" name="permanentadd" id="" ><?= $fetchvendor['permanentadd'] ?></textarea>
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4 control-label text-center mb-0">City</label>
													<div class="col-8 ">
														<input type="text" class="form-control form-control-modern" name="city" value="<?= $fetchvendor['city'] ?>" required />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Pincode<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
														<input type="number" class="form-control form-control-modern" name="pincode" value="<?= $fetchvendor['pincode'] ?>" required />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Marital Status</label>
													<div class="col-8 ">
														<input type="text" class="form-control form-control-modern" name="marital" value="<?= $fetchvendor['maritalstatus'] ?>" />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Shop Name</label>
													<div class="col-8 ">
														<input type="text" class="form-control form-control-modern" name="shopname" value="<?= $fetchvendor['shopname'] ?>" required />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Shop Address</label> 
													<div class="col-8 ">
														<textarea class="form-control form-control-modern" name="shopadd" id="" required><?= $fetchvendor['shopadd'] ?></textarea>
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-12 my-3">
                                                   <h3>Account Details</h3>
                                                   </div>

                                                   <div class="col-6 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Account Holder Name<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
														<input type="text" class="form-control form-control-modern" name="accountholder" value="<?= $fetchvendor['accountholder'] ?>" required />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-6 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Account No.<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
														<input type="number" class="form-control form-control-modern" name="accountno" value="<?= $fetchvendor['accountno'] ?>" required />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-6 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">IFSC code<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
														<input type="text" class="form-control form-control-modern" name="ifsc" value="<?= $fetchvendor['ifccode'] ?>" required />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-6 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Bank Name<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
														<input type="text" class="form-control form-control-modern" name="bankname" value="<?= $fetchvendor['bankname'] ?>" required />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-12 my-3">
                                                   <h3 class="">Upload document</h3>
                                                   </div>
                                                  
                                                   <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
                                                 
													<label class="col-4  control-label text-center mb-0">Owner Photograph<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
                                                    <img src="img/vendors/<?= $fetchvendor['ownerphoto'] ?>" width ="100px" alt="">
                                                        <input type="hidden" name="ownerimg1" value="<?= $fetchvendor['ownerphoto'] ?>">
														<input type="file" class="form-control form-control-modern" name="ownerimg" value="" />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Upload visiting card<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
                                                    <img src="img/vendors/<?= $fetchvendor['visitingphoto'] ?>" width ="100px" alt="">
                                                    <input type="hidden" name="visitingcard1" value="<?= $fetchvendor['visitingphoto'] ?>">
														<input type="file" class="form-control form-control-modern" name="visitingcard" value="" />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Aadhar card<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
                                                    <img src="img/vendors/<?= $fetchvendor['aadharphoto'] ?>" width ="100px" alt="">
                                                    <input type="hidden" name="adharcard1" value="<?= $fetchvendor['aadharphoto'] ?>">
														<input type="file" class="form-control form-control-modern" name="adharcard" value="" />
													</div>
												   </div>
                                                  </div>

                                                  <div class="col-4 my-3">
												  <div class="form-group row align-items-center">
													<label class="col-4  control-label text-center mb-0">Bank Copy<span class="text-danger" style="font-size:1.3rem" >*</span></label>
													<div class="col-8 ">
                                                    <img src="img/vendors/<?= $fetchvendor['bankphoto'] ?>" width ="100px" alt="">
                                                    <input type="hidden" name="bankcopy1" value="<?= $fetchvendor['bankphoto'] ?>">
														<input type="file" class="form-control form-control-modern" name="bankcopy" value="" />
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
								<button type="submit" name="vendor" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-save text-4 mr-2"></i> Save category
								</button>
							</div>
							<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
								<a href="" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
							</div>
							<!-- <div class="col-12 col-md-auto ml-md-auto mt-3 mt-md-0">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-trash text-4 mr-2"></i> Delete Shop-all
								</a>
							</div> -->
						</div>
					</form>
					<!-- end: page -->
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