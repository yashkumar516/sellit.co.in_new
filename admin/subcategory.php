<!-- header and slider start -->
<?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
 <!-- header and slider end  -->	  
	<?php
		if(isset($_POST['skin']))
		  {
			$cat_id = $_POST['category'];
			$name = $_POST['Name'];
			$callvalue = $_POST['callrecieve'];
			$threemonths = $_POST['below3'];
			$threeto6months = $_POST['3to6'];
			$sixto11months = $_POST['6to11'];
			$above11 = $_POST['11above'];
			// screen question start
			$touchscreen = $_POST['touchscreen'];
			$largespot = $_POST['largespots'];
			$multiplespot = $_POST['multiplespots'];
			$minorspot = $_POST['minorspots'];
			$nospot = $_POST['nospots'];
			$displayfade = $_POST['displayfade'];
			$multilines = $_POST['multipleslines'];
			$nolines = $_POST['nolines'];
			$crackedscreen = $_POST['screencracked'];
			$damegescreen = $_POST['damagescreen'];
				$heavyscracthes = $_POST['heavyscratches'];
					$scratches12 = $_POST['1-2scratches'];
					$noscratches = $_POST['noscratches'];
					// body questions starts
					$majorscratch = $_POST['majorscratch'];
					$bodyscratches2 = $_POST['2scretch'];
					$nobodysratches = $_POST['noscratch'];
					$heavydents = $_POST['heavydents'];
					$dents2 = $_POST['2dents'];
					$nodents = $_POST['nodents'];
					$crackedsideback = $_POST['crackedpanel'];
					$missingsideback = $_POST['missingsidepanel'];
					$nodefectssideback = $_POST['nodefectsideback'];
					$bentcurvedpanel = $_POST['bentcurved'];
					$loosescreen = $_POST['gapinscreen'];
					$nobents = $_POST['nobents'];
					// accessries questions
					$charger = $_POST['originalcharger'];
					$earphone = $_POST['originalearphone'];
					$boximei = $_POST['boximei'];
					$billimei = $_POST['billimei'];
                     	$productimage = getimagesize($_FILES['Image']['tmp_name']);
	                    if(isset($productimage['mime'])){
                      	if($productimage['mime'] == "image/png"){
                     	$pimg = imagecreatefrompng($_FILES['Image']['tmp_name']);
                        if(isset($pimg)){	
	                    $out_img = time().random_int(100000, 999999).'.webp';
	                    imagewebp($pimg,"img/".$out_img,100);
				    $query = mysqli_query($con,"INSERT INTO `subcategory` (`category_id`,`subcategory_name`,`subcategory_image`,`callvalue`,`3months`,`3to6months`,`6to11months`,
					`above11`,`touchscreen`,`largespot`,`multiplespot`,`minorspot`,`nospot`,`displayfade`,`multilines`,`nolines`,`crackedscreen`,`damegescreen`,`heavyscracthes`,
					`12scratches`,`noscratches`,`majorscratch`,`2bodyscratches`,`nobodysratches`,`heavydents`,`2dents`,`nodents`,`crackedsideback`,`missingsideback`,`nodefectssideback`,`bentcurvedpanel`,
					`loosescreen`,`nobents`,`charger`,`earphone`,`boximei`,`billimei`)
                     values('$cat_id','$name','$out_img','$callvalue','$threemonths','$threeto6months','$sixto11months','$above11','$touchscreen','$largespot','$multiplespot','$minorspot','$nospot',
					 '$displayfade','$multilines','$nolines','$crackedscreen','$damegescreen','$heavyscracthes','$scratches12','$noscratches','$majorscratch','$bodyscratches2','$nobodysratches','$heavydents',
					 '$dents2','$nodents','$crackedsideback','$missingsideback','$nodefectssideback','$bentcurvedpanel','$loosescreen','$nobents','$charger','$earphone','$boximei','$billimei') ");
					if($query)
					{
						echo "<script> alert(' subcategory insert successfully');
						window.location.href = 'subcategory-list.php';
						</script>";
					}
					else
					{
						echo "<script> alert(' subcategory insert not successfully');
						window.location.href = 'subcategory-list.php';
						</script>";	
					}
                    }else{
		              	echo "<script> alert('image should be in png format');
			
			        </script>";  
	              	}
                   }
                //   start new
                  elseif($productimage['mime'] == "image/jpeg"){
                      $pimg = imagecreatefromjpeg($_FILES['Image']['tmp_name']);
                        if(isset($pimg)){	
	                    $out_img = time().random_int(100000, 999999).'.webp';
	                    imagewebp($pimg,"img/".$out_img,100);
				    $query = mysqli_query($con,"INSERT INTO `subcategory` (`category_id`,`subcategory_name`,`subcategory_image`,`callvalue`,`3months`,`3to6months`,`6to11months`,
					`above11`,`touchscreen`,`largespot`,`multiplespot`,`minorspot`,`nospot`,`displayfade`,`multilines`,`nolines`,`crackedscreen`,`damegescreen`,`heavyscracthes`,
					`12scratches`,`noscratches`,`majorscratch`,`2bodyscratches`,`nobodysratches`,`heavydents`,`2dents`,`nodents`,`crackedsideback`,`missingsideback`,`nodefectssideback`,`bentcurvedpanel`,
					`loosescreen`,`nobents`,`charger`,`earphone`,`boximei`,`billimei`)
                     values('$cat_id','$name','$out_img','$callvalue','$threemonths','$threeto6months','$sixto11months','$above11','$touchscreen','$largespot','$multiplespot','$minorspot','$nospot',
					 '$displayfade','$multilines','$nolines','$crackedscreen','$damegescreen','$heavyscracthes','$scratches12','$noscratches','$majorscratch','$bodyscratches2','$nobodysratches','$heavydents',
					 '$dents2','$nodents','$crackedsideback','$missingsideback','$nodefectssideback','$bentcurvedpanel','$loosescreen','$nobents','$charger','$earphone','$boximei','$billimei') ");
					if($query)
					{
						echo "<script> alert(' subcategory insert successfully');
						window.location.href = 'subcategory-list.php';
						</script>";
					}
					else
					{
						echo "<script> alert(' subcategory insert not successfully');
						window.location.href = 'subcategory-list.php';
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
      ?>
		  <section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Brand Name</h2>
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li><span>Home</span></li>
								<li><span>eCommerce</span></li>
								<li><span>Brand</span></li>
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
												<h2 class="card-big-info-title">Brand Image</h2>
												<p class="card-big-info-desc">Upload Brand image</p>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center">
													<div class="col">

													
													<div class="form-group row align-items-center">
													<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0"> Select category</label>
													<div class="col-lg-7 col-xl-6">
														<select name="category" id="" class="form-control form-control-modern">
														<?php
														$selectcat = mysqli_query($con,"SELECT * FROM `category` WHERE `id` = '1'");
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
													<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0"> Brand Image(93*93 px)</label>
													<div class="col-lg-7 col-xl-6">
														<input type="file" class="form-control form-control-modern" name="Image" value="" required />
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
						<div class="row">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bx-slider"></i>
												<h2 class="card-big-info-title"> Brand Details</h2>
												<p class="card-big-info-desc">Add here the  Brand description with all details and necessary information.</p>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row align-items-center">
													<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0"> Brand Name</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control form-control-modern" name="Name" value="" required />
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
						<!-- questions start here -->

						<!-- calling question here -->
                        <h1 style="text-align:center;">Calling Question</h1>
						<div class="row">					
								<div class="col-6 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 px-0">
												<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Call Not Recieve</label>
														<div class="col-lg-7 col-xl-8 pr-0">
														 <input type="text" class="form-control form-control-modern" name="callrecieve" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
						<!-- calling question end -->

						<!-- warenty question here -->
                        <h1 style="text-align:center;">Warrenty Question</h1>
						<div class="row">		

								<div class="col-3 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
												<div class="form-group row align-items-center">
														<label class="col-12 control-label  mb-0"> Below 3 Months</label>
														<div class="col-12 ">
														 <input type="text" class="form-control form-control-modern" name="below3" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-3 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
												<div class="form-group row align-items-center">
														<label class="col-12 control-label  mb-0"> 3-6 Months</label>
														<div class="col-12 ">
														 <input type="text" class="form-control form-control-modern" name="3to6" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-3 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
												<div class="form-group row align-items-center">
														<label class="col-12 control-label mb-0"> 6-11 Months</label>
														<div class="col-12 pr-0">
														 <input type="text" class="form-control form-control-modern" name="6to11" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-3 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
												<div class="form-group row align-items-center">
														<label class="col-12 control-label mb-0"> Above 11 Months</label>
														<div class="col-12 pr-0">
														 <input type="text" class="form-control form-control-modern" name="11above" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>

							</div>
						<!-- warrenty question end -->

						<!-- screen questions starts -->
						<h1 style="text-align:center;">Screen Questions</h1>
						<div class="row">					
								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
												<div class="form-group row align-items-center">
														<label class="col-12 control-label mb-0">Touch screen</label>
														<div class="col-12 pr-0">
														 <input type="text" class="form-control form-control-modern" name="touchscreen" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>
																	
								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12 control-label mb-0">Large spots</label>
														<div class="col-12 pr-0">
														<input type="text" class="form-control form-control-modern" name="largespots" placeholder="% Value" required>		
														
																											
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>
																	
								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="form-group row align-items-center">
														<label class="col-12 control-label mb-0">Multiple spots</label>
														<div class="col-12 pr-0">
														<input type="text" class="form-control form-control-modern" name="multiplespots" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>
							 
								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12 control-label  mb-0">Minor spots</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="minorspots" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">No spots</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="nospots" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">Display faded</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="displayfade" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label  mb-0">Multiple lines</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="multipleslines" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">No lines</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="nolines" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label  mb-0">Screen cracked</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="screencracked" placeholder="% Value" required>															
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">Damaged screen</label>
														<div class="col-12 pr-0">
														<input type="text" class="form-control form-control-modern" name="damagescreen" placeholder="% Value" required>															
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">Heavy scratches</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="heavyscratches" placeholder="% Value" required>															
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12 control-label mb-0">1-2 scratches</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="1-2scratches" placeholder="% Value" required>															
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">No scratches</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="noscratches" placeholder="% Value" required>															
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

						</div>
						<!-- screen questions end -->

                          <!-- body questions start -->
						<h1 style="text-align:center;">Body Questions</h1>
						<div class="row">					
								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
												<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">Major scratches</label>
														<div class="col-12  pr-0">
														 <input type="text" class="form-control form-control-modern" name="majorscratch" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>
																	
								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label  mb-0">Less than 2 scratches</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="2scretch" placeholder="% Value" required>		
														
																											
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>
																	
								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label  mb-0">No scratches</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="noscratch" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>
							 
								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label  mb-0">Multiple/heavy  dents</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="heavydents" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">Less than 2 dents</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="2dents" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label  mb-0">No dents</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="nodents" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">Cracked/ broken side or back panel</label>
														<div class="col-12 pr-0">
														<input type="text" class="form-control form-control-modern" name="crackedpanel" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label  mb-0">Missing side or back panel</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="missingsidepanel" placeholder="% Value" required>		
														
																											
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">No defect on side or back panel</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="nodefectsideback" placeholder="% Value" required>															
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 px-0">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">Bent/ curved panel</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="bentcurved" placeholder="% Value" required>															
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0">Loose screen (Gap in screen and body)</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="gapinscreen" placeholder="% Value" required>															
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-2 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
													<div class="form-group row align-items-center">
														<label class="col-12  control-label  mb-0">No Bents</label>
														<div class="col-12  pr-0">
														<input type="text" class="form-control form-control-modern" name="nobents" placeholder="% Value" required>															
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>

						</div>
						<!-- body question end -->

							<!-- acceseries question here -->
							<h1 style="text-align:center;">Accessories Question</h1>
						<div class="row">		

								<div class="col-3 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
												<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0"> Orignal Charger</label>
														<div class="col-12  pr-0">
														 <input type="text" class="form-control form-control-modern" name="originalcharger" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-3 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
												<div class="form-group row align-items-center">
														<label class="col-12  control-label  mb-0"> Original Earphones</label>
														<div class="col-12 pr-0">
														 <input type="text" class="form-control form-control-modern" name="originalearphone" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-3 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
												<div class="form-group row align-items-center">
														<label class="col-12  control-label mb-0"> Box with same IMEI</label>
														<div class="col-12  pr-0">
														 <input type="text" class="form-control form-control-modern" name="boximei" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-3 pr-0">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-12 ">
												<div class="form-group row align-items-center">
														<label class="col-12  control-label  mb-0"> Bill with same IMEI</label>
														<div class="col-12  pr-0">
														 <input type="text" class="form-control form-control-modern" name="billimei" placeholder="% Value" required>		
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>

							</div>
						<!-- acceseries question end -->

						<!-- questions end here -->
						<div class="row action-buttons">
							<div class="col-12 col-md-auto">
								<button type="submit" name="skin" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-save text-4 mr-2"></i> Save  Brand
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