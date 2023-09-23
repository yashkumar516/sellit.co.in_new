 <!-- include header start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
<!-- end sidebar -->

<?php
  if(isset($_REQUEST['id'])){
      $enqid = $_REQUEST['id'];
      $enqdetail = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM  `enquiry` WHERE `id` = '$enqid' "));
	  $userid = $enqdetail['userid'];
	  $usernumber  = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `id` = '$userid' "));
	  $custoernumber = $usernumber['mobile'];
	  $rowaddress = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `address` WHERE `enquid` = '$enqid' "));
	  if($rowaddress == 1){
      $pickupdate = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `address` WHERE `enquid` = '$enqid' "));
	  $soon = $pickupdate['soon'];
      $choseday = $pickupdate['choseday'];
      $day = $pickupdate['day'];
      $time = $pickupdate['time'];
      $addressid = $pickupdate['addressid'];
	  }else{
		$pickupdate = null;
		$soon = null;
		$choseday = null;
		$day = null;
		$time = null;
      $addressid = null;
	  }
	  $rowaddress1 = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `address1` WHERE `id` = '$addressid' "));
	  if($rowaddress1 == 1){
      $addressdetail = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `address1` WHERE `id` = '$addressid' "));
	  }else{
		$addressdetail = null;
	  }
	  $rowaccountdetail = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `useraccount` WHERE `enquiryid` = '$enqid' "));
	  if($rowaccountdetail == 1){
      $accountdetail = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `useraccount` WHERE `enquiryid` = '$enqid' "));
	}else{
		$accountdetail = null;
	}
  }
?>

<?php
 if(isset($_POST['assignlead'])){
	  $pincode = $_POST['leadpin'];
	  $vendorid = $_POST['vendors'];
       $insertquery = mysqli_query($con,"UPDATE `enquiry` SET  `vendor_id`='$vendorid' WHERE `id` = '$enqid'");
	   if($insertquery){
		 echo '<script>
		    alert("lead assigned successfully");  
		   </script>';
	   }
  }
?>
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
							
							<div class="card card-modern card-modern-table-over-header">
								<div class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									</div>
									<h2 class="card-title">LEAD</h2>
								</div>
								<div class="card-body">
									<div class="datatables-header-footer-wrapper">
										<div class="datatable-header">
											<div class="row align-items-center mb-3">

												<div class="col-8 col-lg-auto ml-auto mb-3 mb-lg-0">
													<div class="d-flex align-items-lg-center flex-column flex-lg-row">
														<label class="ws-nowrap mr-3 mb-0">Filter By:</label>
														<select class="form-control select-style-1 filter-by" name="filter-by">
															<option value="all" selected>All</option>
															<!-- <option value="1">ID</option>
															<option value="2">Customer Name</option>
															<option value="3">Date</option>
															<option value="4">Total</option>
															<option value="5">Status</option> -->
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
															<input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="Search Order">
															<span class="input-group-append">
																<button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<table class="table table-ecommerce-simple table-striped mb-0" id="datatable-ecommerce-list" style="min-width: 640px;">
											<thead>
												<tr>
													<!-- <th width="3%"><input type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2" value="" /></th> -->
													<th>LEAD ID</th>
													<th>Model Detail</th>
													<th >Specification</th>
													<th >Address</th>
													<th >Pickup Date</th>
                                                    <th>Acoount Detail</th>
												</tr>
											</thead>
											<tbody>
												<tr>
                                                <td>#<?php echo $enqdetail['id'] ?></td>
												<td>
												<p class="mb-1"><b>Mobile Name:</b>    <?php echo $enqdetail['model_name']  ?></p>
												<p class="mb-1"><b>Offer Price:</b>    ₹<?php echo $enqdetail['offerprice']  ?></p>
												</td>
                                                <td>
                                                <ul>
												<?php
                                                 if($enqdetail['callvalue'] != null ){
                                                ?>
                                                <li><?php echo $enqdetail['callvalue']  ?></li>
                                                <?php
                                                }if($enqdetail['warenty'] != null ){
												?>
												<li><?php echo $enqdetail['warenty']  ?></li>
                                                <?php
												}
                                                 if($enqdetail['age'] != null ){
                                                ?>
                                                <li><?php echo $enqdetail['age']  ?></li>
                                                <?php
                                                }
                                                if($enqdetail['touchscreen'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['touchscreen']  ?></li>
                                                <?php
                                                } if($enqdetail['screenspot'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['screenspot']  ?></li>
                                                <?php
                                                } if($enqdetail['screenlines'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['screenlines']  ?></li>
                                                <?php
                                                } if($enqdetail['screenphysicalcondition'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['screenphysicalcondition']  ?></li>
                                                <?php
                                                } if($enqdetail['bodyscratches'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['bodyscratches']  ?></li>
                                                <?php
                                                } if($enqdetail['bodydents'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['bodydents']  ?></li>
                                                <?php
                                                } if($enqdetail['sidebackpanel'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['sidebackpanel']  ?></li>
                                                <?php
                                                } if($enqdetail['bodybents'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['bodybents']  ?></li>
                                                <?php
                                                } if($enqdetail['charger'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['charger']  ?></li>
                                                <?php
                                                } if($enqdetail['earphone'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['earphone']  ?></li>
                                                <?php
                                                } if($enqdetail['boximei'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['boximei']  ?></li>
                                                <?php
                                                } if($enqdetail['billimei'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['billimei']  ?></li>
                                                <?php
                                                } if($enqdetail['front_camera'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['front_camera']  ?></li>
                                                <?php
                                                } if($enqdetail['back_camera'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['back_camera']  ?></li>
                                                <?php
                                                } if($enqdetail['volume'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['volume']  ?></li>
                                                <?php
                                                } if($enqdetail['speaker'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['speaker']  ?></li>
                                                <?php
                                                } if($enqdetail['power_btn'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['power_btn']  ?></li>
                                                <?php
                                                } if($enqdetail['face_sensor'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['face_sensor']  ?></li>
                                                <?php
                                                } if($enqdetail['charging_port'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['charging_port']  ?></li>
                                                <?php
                                                } if($enqdetail['audio_receiver'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['audio_receiver']  ?></li>
                                                <?php
                                                } if($enqdetail['camera_glass'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['camera_glass']  ?></li>
                                                <?php
                                                } if($enqdetail['wifi'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['wifi']  ?></li>
                                                <?php
                                                } if($enqdetail['silent_btn'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['silent_btn']  ?></li>
                                                <?php
                                                } if($enqdetail['battery'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['battery']  ?></li>
                                                <?php
                                                } if($enqdetail['bluetooth'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['bluetooth']  ?></li>
                                                <?php
                                                } if($enqdetail['vibrator'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['vibrator']  ?></li>
                                                <?php
                                                } if($enqdetail['microphone'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['microphone']  ?></li>
                                                <?php
                                                } if($enqdetail['silent_btn'] != null){
                                                ?>
                                                <li><?php echo $enqdetail['silent_btn']  ?></li>
                                                <?php
                                                }  if($enqdetail['conditions'] != null){
                                                ?>
												<li><?php echo $enqdetail['conditions']  ?></li>
												<?php
                                                } if($enqdetail['connectivity'] != null){
                                                ?>
												<li><?php echo $enqdetail['connectivity']  ?></li>
												<?php
												  }if($enqdetail['physicalissue'] != null){
												?>
												<li><?php echo $enqdetail['physicalissue']  ?></li>
												<?php
												  }if($enqdetail['cable'] != null){
												?>
												<li><?php echo $enqdetail['cable']  ?></li>
												<?php
												  }if($enqdetail['switchof'] != null){
												?>
                                                 <li><?php echo $enqdetail['switchof']  ?></li>
												<?php
												  }
												?>
                                                </ul>
                                                </td>
                                                <td>
												<p class="mb-1" ><b>Contact:</b>  <?php echo $custoernumber ?></p>
                                                <?php 
												if($addressdetail != null){
                                                 if($addressdetail['location'] != null && $addressdetail['flatno'] != null && $addressdetail['landmark'] != null 
												 && $addressdetail['pincode'] != null && $addressdetail['city'] != null && $addressdetail['state'] != null && $addressdetail['addtype']  != null){
												?>
                                                <p class="mb-1" ><b>Loation:</b>  <?php echo $addressdetail['location'] ?></p>
                                                <p class="mb-1" ><b>Flat/Office/floor:</b>  <?php echo $addressdetail['flatno'] ?></p>
                                                <p class="mb-1" ><b>Land Mark:</b>  <?php echo $addressdetail['landmark'] ?></p>
                                                <p class="mb-1" ><b>Pincode:</b>  <?php echo $addressdetail['pincode'] ?></p>
                                                <p class="mb-1" ><b>City:</b>  <?php echo $addressdetail['city'] ?></p>
                                                <p class="mb-1" ><b>State:</b>  <?php echo $addressdetail['state'] ?></p>
                                                <p class="mb-1" ><b>Address Type:</b>  <?php echo $addressdetail['addtype'] ?></p>
                                                <?php 
                                                 }else{
                                                  echo "No Address Found On this Lead Please Contact Him ";
												}
											  }
												 ?>
                                                </td>
                                                <?php
												   if($pickupdate != null){
                                                      if($soon != null){
													?>
													<td><?php echo $soon ?></td>
													<?php
													 }elseif($choseday != null){
													?>
                                                     <td><?php echo $choseday ?>
													 <p><b>Time: </b>Anytime</p>
													 </td>
													<?php
													}elseif($day != null && $time != null){
													?>
                                                     <td><p class="mb-1"><b>Day: </b><?php echo $day ?></p>
													 <p><b class="mb-1">Time: </b><?php echo $time ?></p>
													 </td>
													<?php
													}
												   }else{
													    echo "<td> no address found </td>";
												   }
													?>
                                                    <?php
													if($accountdetail != null){
                                                     if($accountdetail['accountno']  != null && $accountdetail['beneficiarname'] && $accountdetail['ifsc'] && $accountdetail['bankname']){
                                                    ?>
                                                    <td>
                                                     <p class="mb-1"><b>Account no:</b>  <?php echo $accountdetail['accountno'] ?></p>
                                                     <p class="mb-1"><b>Beneficiary Name:</b>  <?php echo $accountdetail['beneficiarname'] ?></p>
                                                     <p class="mb-1"><b>IFSC Code:</b>  <?php echo $accountdetail['ifsc'] ?></p>
                                                     <p class="mb-1"><b>BANK NAME:</b>  <?php echo $accountdetail['bankname'] ?></p>
                                                    </td>
                                                    <?php
                                                    }elseif($accountdetail['upi'] != null){
                                                    ?>
                                                    <td>
													<p><b>UPI ID:</b>  <?php echo $accountdetail['upi'] ?></p>
                                                    </td>
                                                    <?php
                                                      }elseif($accountdetail['paytm']!= null){
														?>
														<td>
														<p><b>Paytm No:</b>  <?php echo $accountdetail['paytm'] ?></p>
														</td>
														<?php
														  }
														}else{
															echo "<td>no account detail add please contact custoer</td>";
														}
														?>
                                
                                                </tr>
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
				<section style="height:600px">
				<!-- lead assigning start -->
				<div class="row">
					 <div class="col">
					 <div class="card card-modern card-modern-table-over-header">
					   <div class="container">
					   <form method="post">
					   <div class="row">
					   <div class="col-4">
					   
                        <input name="leadpin" id="leadpin" class="search-term form-control" value="<?= $addressdetail['pincode'] ?>" type="text" readonly>
					   </div>
					   <div class="col-4 ">
					   
                        <select class="search-term form-control" name="vendors" id="vendors">
						</select>
					   </div>
					   <div class="col-4">
                        <input class="search-term form-control btn-primary" type="submit" name="assignlead" value="Assign Lead">
					   </div>
					   </div>
					   </form>
					   </div>
					 </div>
					 </div>
					 </div>
					<!-- lead assigning end -->
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
		
		<!-- Specific Page Vendor -->		<script src="vendor/raphael/raphael.js"></script>		<script src="vendor/morris/morris.js"></script>		<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>		<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>


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
		<script src="js/examples/examples.ecommerce.dashboard.js"></script>
		<script src="js/examples/examples.ecommerce.datatables.list.js"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
		<script type="text/javascript">
               $(document).ready(function() {
            $('#datatable-ecommerce-list').DataTable( {
               dom: 'Bfrtip',
               buttons: [
             'csv', 'excel', 'pdf'
          ]
       } );
      } );
     </script>
	</body>
</html>

<script>
$(document).ready(function(){
    var pinno = $('#leadpin').val();
	$.ajax({
	 method: "post",
	 url : "checkvendors.php",
	 data:{pinno:pinno},
	 dataType: "html",
	 success:function(result)
	{
	  $('#vendors').html(result);
	 }
	})
});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#vendors').multiselect();
    });
</script>