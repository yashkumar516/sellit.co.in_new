 <!-- include header start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
 <!-- end sidebar -->

 <section role="main" class="content-body content-body-modern mt-0">
     <header class="page-header page-header-left-inline-breadcrumb">
         <h2 class="font-weight-bold text-6">Reviews</h2>
         <div class="right-wrapper">
             <ol class="breadcrumbs">
                 <li><span>Home</span></li>
                 <li><span>eCommerce</span></li>
                 <li><span>Reviews</span></li>
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
                                 <div class="col-5 col-lg-5 mb-3 mb-lg-0">

                                 </div>
                                 <div class="col-2"></div>
                                 <div class="col-5 w-100">
                                     <div class="form-group float-right     mb-0 w-100" id="has-search"> <span
                                             class="fa fa-search form-control-feedback"></span> <input type="text"
                                             class="form-control" placeholder="Search"></div>
                                     <!-- <button id="csvButton">Download CSV</button> -->
                                     <div class="d-inline-flex w-100  ">
                                         <button type="button" class="btn btn-primary w-100 px-1" id="csvButton"><i
                                                 class="bx bx-download text-4 mr-2"></i>
                                             CSV
                                         </button>
                                         <button type="button" class="btn btn-primary w-100 px-1" id="excelButton"><i
                                                 class="bx bx-download text-4 mr-2"></i>
                                             Excel
                                         </button>
                                         <button type="button" class="btn btn-primary w-100 px-1" id="pdfButton"><i
                                                 class="bx bx-download text-4 mr-2"></i>
                                             PDF
                                         </button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row hide-load-table">
                             <p class="  p-2 m-1 "></p>
                         </div>
                         <table class="table table-ecommerce-simple table-striped mb-0" id="datatable-ecommerce-list"
                             style="min-width: 750px;">
                             <thead>
                                 <tr>
                                     <th width="3%"><input type="checkbox" name="select-all"
                                             class="select-all checkbox-style-1 p-relative top-2" value="" /></th>
                                     <th width="8%">ID</th>
                                     <th width="8%">Action</th>
                                     <th width="18%">Name</th>
                                     <th width="18%">City</th>
                                     <th width="23%">Messege</th>
                                     <th width="23%">Rating</th>
                                     <th width="20%">Status</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php 
												  $reviequery = mysqli_query($con,"SELECT * FROM `product_reviews`");
												  while($arreview = mysqli_fetch_assoc($reviequery))
												  {
												  $pid = $arreview['p_id'];
												?>
                                 <tr>
                                     <td width="30"><input type="checkbox" name="checkboxRow1"
                                             class="checkbox-style-1 p-relative top-2" value="" /></td>
                                     <td><a href="#"><strong><?php echo $arreview['id']  ?></strong></a></td>
                                     <?php 
                                                      $pname = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$pid' "))
													?>
                                     <td>
                                         <a href="delete_product_review.php?id=<?php echo $arreview['id'] ?>"><strong><i
                                                     class="fas fa-trash-alt mr-3"
                                                     style="font-size:20px;"></i></strong></a>
                                     </td>
                                     <td><a href="#"><strong><?php echo $arreview['rname']  ?></strong></a></td>
                                     <td><a href="#"><strong><?php echo $arreview['rcity']  ?></strong></a></td>
                                     <td><?php echo $arreview['rmsg'] ?></td>
                                     <td><?php echo $arreview['rating'] ?></td>
                                     <td>
                                         <?php 
													$cid = $arreview['id'];
													$checkstatus = $arreview['status'];
												
													 if($checkstatus == 'active')
													 {
                                                      echo '<button class="btn btn-success" onclick="return  changestatus('.$cid.')">'.$checkstatus.'</button>';
													 }
													 else
													 {
														echo '<button class="btn btn-danger" onclick="return  changestatus('.$cid.')">'.$checkstatus.'</button>';
													 }
													?>
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
 <script src="vendor/jquery/jquery.js"></script>
 <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
 <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
 <script src="master/style-switcher/style.switcher.js"></script>
 <script src="vendor/popper/umd/popper.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.js"></script>
 <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
 <script src="vendor/common/common.js"></script>
 <script src="vendor/nanoscroller/nanoscroller.js"></script>
 <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
 <script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>

 <!-- Specific Page Vendor -->


 <!--(remove-empty-lines-end)-->

 <!-- Theme Base, Components and Settings -->
 <script src="js/theme.js"></script>

 <!-- Theme Custom -->
 <script src="js/custom.js"></script>
 <script src="js/customBfrtip.js"></script>

 <!-- Theme Initialization Files -->
 <script src="js/theme.init.js"></script>
 <!-- Analytics to Track Preview Website -->
 <script>
(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o), m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-42715764-8', 'auto');
ga('send', 'pageview');
 </script>
 <!-- Examples -->
 <script src="js/examples/examples.header.menu.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

 </body>

 </html>

 <script>
function changestatus(gid) {
    var id = gid;
    var url = 'change_product_review_status.php?id=' + id;
    $(location).attr('href', url);
}
 </script>