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
	  if($rowaddress >= 1){
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
	  if($rowaddress1 > 0){
      $addressdetail = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `address1` WHERE `id` = '$addressid' "));
      $pincodeforv = $addressdetail['pincode'];
	  }else{
		$addressdetail = null;
		$pincodeforv = null;
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
								    <div class="row">
								        <div class="col-2">
								            <h2>Lead Id</h2>
								            <p>#<?php echo $enqdetail['id'] ?></p>
								             <h2>Device Name</h2>
								            <p><?php echo $enqdetail['model_name']  ?></p>
								            <h2>Offer Price</h2>
								            <p>₹<?php echo $enqdetail['offerprice'] ?></p>
								            <h2>IMEI Number  </h2>
								            <p>₹<?php echo $enqdetail['emino'] ?></p>
								        </div>
								        <div class="col-4">
								            <h2>Lead Specification</h2>
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
								        </div>
								        <div class="col-3">
								            <h2>Customer Address</h2>
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
										    <div class="col-12">
										        <?php if(!empty($enqdetail['aadharfront'])){ ?>
										        <img src="img/mobileimages/<?= $enqdetail['aadharfront']  ?>" class="img-fluid" > <br><br>
										        <?php } 
										        if(!empty($enqdetail['aadharfront'])){
										        ?>
										        <img src="img/mobileimages/<?= $enqdetail['aadharback']  ?>" class="img-fluid" > <br><br>
										        <?php } ?>
										    </div>
								        </div>
								         <div class="col-3">
								            <h2>Account Detail</h2>
								             <?php
											  if($accountdetail != null){
                                              if($accountdetail['accountno']  != null && $accountdetail['beneficiarname'] && $accountdetail['ifsc'] && $accountdetail['bankname']){
                                              ?>
                                                     <p class="mb-1"><b>Account no:</b>  <?php echo $accountdetail['accountno'] ?></p>
                                                     <p class="mb-1"><b>Beneficiary Name:</b>  <?php echo $accountdetail['beneficiarname'] ?></p>
                                                     <p class="mb-1"><b>IFSC Code:</b>  <?php echo $accountdetail['ifsc'] ?></p>
                                                     <p class="mb-1"><b>BANK NAME:</b>  <?php echo $accountdetail['bankname'] ?></p>
                                                    <?php
                                                    }elseif($accountdetail['upi'] != null){
                                                    ?>
                                                   
													<p><b>UPI ID:</b>  <?php echo $accountdetail['upi'] ?></p>
                                                
                                                    <?php
                                                      }elseif($accountdetail['paytm']!= null){
													 ?>
													    <p><b>Paytm No:</b>  <?php echo $accountdetail['paytm'] ?></p>
														<?php
														  }
													    }else{
														 echo "<td>no account detail add please contact custoer</td>";
													 }
											    ?>
								        </div>
								    </div>
								     <hr>
								    <?php 
								       if($enqdetail['status'] == 'Complete'){ 
								       $venddetailfetch = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `vendors` WHERE `id` = '$enqdetail[vendor_id]' "));
								       $agentdetailfetch = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `ajents` WHERE `id` = '$enqdetail[ajentid]' "));
								    ?>
								      <div class="row">
								         
								        <div class="col-4">
								            <h2>vendor detail</h2>
								            <p><b>Vendor Name : </b><?php echo $venddetailfetch['name'] ?></p>
								            <p><b>Vendor Email : </b><?php echo $venddetailfetch['email'] ?></p>
								            <p><b>Vendor Mobile Number : </b><?php echo $venddetailfetch['mobileno'] ?></p>
								            
								             <h2>Agent detail</h2>
								            <p><b>Agent Name : </b><?php echo $agentdetailfetch['ajentname'] ?></p>
								            <p><b>Agent Email : </b><?php echo $agentdetailfetch['email'] ?></p>
								            <p><b>Agent Mobile Number : </b><?php echo $agentdetailfetch['phone'] ?></p>
								        </div>
								        <div class="col-8">
								            <h2>Device Photos</h2>
								            <div class="row">
								            <?php if(!empty($enqdetail['pic1'])){ ?>       
								            <div class="col-3">
								            <img src="img/mobileimages/<?= $enqdetail['pic1'] ?>" class="img-fluid" >
								            </div>
								            <?php } 
								            if(!empty($enqdetail['pic2'])){
								            ?>
								            <div class="col-3">        
								            <img src="img/mobileimages/<?= $enqdetail['pic2'] ?>" class="img-fluid" >
								            </div>
								            <?php } 
								            if(!empty($enqdetail['pic3'])){
								            ?>
								            <div class="col-3">        
								            <img src="img/mobileimages/<?= $enqdetail['pic3'] ?>" class="img-fluid" >
								            </div>
								            <?php } 
								            if(!empty($enqdetail['pic4'])){
								            ?>
								             <div class="col-3">        
								            <img src="img/mobileimages/<?= $enqdetail['pic4'] ?>" class="img-fluid" >
								            </div>
								             <?php }  ?>
								            </div>
								        </div>
								    </div>
								    <?php } ?>
							  </div>
						</div>
					</div>
					<!-- end: page -->
				</section>
				<section style="height:600px">
				<!-- lead assigning start -->
					 <div class="col">
					 <div class="card card-modern card-modern-table-over-header">
					   <form method="post">
					   <div class="row">
					   <div class="col-4">
                        <input name="leadpin" id="leadpin" class="search-term form-control" value="<?php echo $pincodeforv ?>" type="text" readonly>
					    </div>
					    <div class="col-4">
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