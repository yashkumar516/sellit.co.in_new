 <!-- include header and sidebar start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
 <!-- end sidebar  header -->
 <?php
    include_once "./classes/products.php";
    include_once "./classes/childcategory.php";
    include_once "./classes/subcategory.php";
    include_once "./classes/variant.php";
    include_once "./classes/questions.php";
    include_once "./classes/syncImage.php";
    $imageManager = new SyncImageManager($con);
    $productManager = new ProductManager($con);
    $subCategoryManager = new SubCategoryManager($con);
    $childCategoryManager = new ChildCategoryManager($con);
    $variantManager = new VariantManager($con);
    $questionsManager = new QuestionsManager($con);
    $desiredHeaders = ["ID", "Brand Name", "Brand Image", "Call Not Recieve", "Below 3 Months", "3-6 Months", "6-11 Months", "Above 11 Months", "Touch screen", "Large spots", "Multiple spots", "Minor spots", "No spots", "Display faded", "Multiple lines", "No lines", "Screen cracked", "Damaged screen", "Heavy scratches", "1-2 scratches", "No scratches", "Major scratches", "Less than 2 scratches", "No body scratches", "Multiple/heavy dents", "Less than 2 dents", "No dents", "Cracked/ broken side or back panel", "Missing side or back panel", "No defect on side or back panel", "Bent/ curved panel", "Loose screen (Gap in screen and body)", "No Bents", "Orignal Charger", "Original Earphones", "Box with same IMEI", "Bill with same IMEI"];


    if (isset($_POST["uploadWithBrandCSV"])) {
        $filename = $_FILES["csvfile"]["tmp_name"];
        if ($_FILES["csvfile"]["size"] > 0) {
            $file = fopen($filename, "r"); // Read the header to handle column names
            $headers = fgetcsv($file, 1000, ","); // Find the indexes of the desired headers
            $headerIndexes = [];
            foreach ($desiredHeaders as $header) {
                $headerIndex = false;
                if ($header === "ID") {
                    $headerIndex = array_search('ID (Optional)', $headers);
                    if (!$headerIndex) {
                        $headerIndex = array_search('ID', $headers);
                    }
                } else {
                    $headerIndex = array_search($header, $headers);
                }
                if ($headerIndex !== false) {
                    $headerIndexes[$header] = $headerIndex;
                }
            }
            while (($getdata = fgetcsv($file, 1000, ",")) !== false) {
                if (
                    isset($getdata) &&
                    // isset($getdata[0]) &&
                    isset($getdata[1]) &&
                    isset($getdata[3])
                ) {
                    $categoryId = 1;
                    $rowData = [];
                    foreach ($headerIndexes as $header => $index) {
                        $rowData[$header] = isset($getdata[$index])
                            ? $getdata[$index]
                            : null;
                    }
                    $subCategoryInfo = $subCategoryManager->upsertSubcategoryByKeyId(
                        $rowData,
                        $categoryId
                    );
                    $brandId = $subCategoryInfo["id"];
                    // $imageURL= $subCategoryInfo["image_url"];
                    // if( $imageURL === "external"){
                    //     $imageManager2= $imageManager->syncBrandImageByRow($subCategoryInfo);
                    // }


                }
            }
            if ($subCategoryInfo) {
                echo "<script> alert('Brand upload successfully');
                    window.location.href = 'brandquestions.php';
                    </script>";
            } else {
                echo "<script> alert('Brand upload failed');
                    window.location.href = 'brandquestions.php';
                    </script>";
            }
            // if ($subCategoryInfo ) { 
            //     echo "<script> alert('Brand upload successfully');
            //         window.location.href = 'brandquestions.php';
            //         </script>";
            // } else {
            //     echo "<script> alert('Brand upload failed');
            //         window.location.href = 'brandquestions.php';
            //         </script>";
            // } 
        }
    }
    ?>

 <section role="main" class="content-body content-body-modern mt-0">
     <header class="page-header page-header-left-inline-breadcrumb">
         <h2 class="font-weight-bold text-6">Brands</h2>
         <div class="right-wrapper">
             <ol class="breadcrumbs">
                 <li><span>Home</span></li>
                 <li><span>eCommerce</span></li>
                 <li><span>Questions</span></li>
             </ol>
             <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
         </div>
     </header>

     <script src="js/selectImage.js"></script>
     <!-- start question table -->
     <div class="row mt-5">

         <div class="card card-modern">

             <div class="datatables-header-footer-wrapper">

                 <div class="datatable-header">
                     <div class="row  px-3 pt-3">
                         <div class="col-5">
                             <form action="#" enctype="multipart/form-data" method="POST">
                                 <div class="pb-2">
                                     <span class="dragBox w-100">
                                         <!-- Darg and Drop .csv here -->
                                         <div class="view" onclick={importCSVFile(event)} ondragover="dragNdrop(event)" ondrop="dropFile(event)">
                                             <input type="file" onchange={changeFile(event)} name="csvfile" style="display: none;" />
                                         </div>
                                         <div class="dragInner">
                                             <i class="bx bx-file text-4 mr-2"></i>
                                             <span>Upload File</span>
                                         </div>
                                         <input type="file" onchange={changeFile(event)} id="importCSV" name="csvfile" style="display: none;" />
                                     </span>
                                 </div>
                                 <button type="submit" class="btn btn-primary w-100" onChange="uploadFile()" value="upload" name="uploadWithBrandCSV"> <i class="bx bx-upload text-4 mr-2"></i>Upload CSV </button>
                             </form>
                         </div>

                         <div class="col-2"></div>
                         <div class="col-5 w-100">
                             <div class="form-group float-right  pb-3  mb-0 w-100" id="has-search"> <span class="fa fa-search form-control-feedback"></span> <input type="text" class="form-control" placeholder="Search"></div>
                             <!-- <button id="csvButton">Download CSV</button> -->
                             <div class="d-inline-flex w-100 pt-2">

                                 <button type="button" class="btn btn-primary w-100 mr-2 px-1" onclick="downloadCSV('<?php echo implode(',', $desiredHeaders); ?>', 'template-brand.csv')">
                                     <i class="bx bx-download text-4 mr-2"></i>Download
                                     Template
                                 </button>
                                 <button type="button" class="btn btn-primary w-100 px-1" id="csvButton"><i class="bx bx-download text-4 mr-2"></i>
                                     Download CSV
                                 </button>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="row hide-load-table">
                     <p class="  p-2 m-1 "></p>
                 </div>

                 <table class="table table-responsive table-striped mb-0 " id="datatable-ecommerce-list" style="min-width: 550px;">

                     <thead>
                         <tr>
                             <?php
                                foreach ($desiredHeaders as $header) {
                                    echo "<th>$header</th>";
                                }
                                ?>
                             <th>Modify Date</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            $fetchbrques = mysqli_query($con, "SELECT * FROM `subcategory`  WHERE `category_id`=1 ORDER BY `modify_date` DESC;");
                            while ($ar = mysqli_fetch_assoc($fetchbrques)) {
                            ?>
                             <!-- fetch category details start -->
                             <tr>
                                 <td><strong><?= $ar['id'] ?></strong></td>
                                 <td><strong><?= $ar['subcategory_name'] ?></strong></td>

                                 <td><a href="#"><img src="img/<?php echo $ar["subcategory_image"]; ?>" alt="img" width="100px"></a>
                                     <p style="display:none;"><?php echo $ar["subcategory_image"]; ?></p>

                                 </td>
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
                                 <td><?php echo date('y/m/d', strtotime($ar['modify_date']))  ?></td>
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
 <script src="vendor/jquery-validation/jquery.validate.js"></script>
 <script src="vendor/select2/js/select2.js"></script>
 <script src="vendor/dropzone/dropzone.js"></script>
 <script src="vendor/pnotify/pnotify.custom.js"></script>


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
 <script src="js/examples/examples.ecommerce.form.js"></script>
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
 <!-- <script type="text/javascript">
$(document).ready(function() {
    $('.table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv'
        ]
    });
});
 </script>
 <script>
$(document).ready(function() {
    var table = $('#datatable-ecommerce-list').DataTable();
});
 </script> -->


 <script>
     var demoWithBrandCSV = [{
         "ID": "",
         "Brand Name": "",
         "Brand Image": "",
         "Call Not Recieve": "",
         "3 Months": "",
         "3 to 6 Months": "",
         "6 to 11 Months": "",
         "Above 11 Months": "",
         "Touchscreen": "",
         "Largespot": "",
         "Multiplespots": "",
         "Minorspots": "",
         "Nospot": "",
         "Display Faded": "",
         "Multilines": "",
         "Nolines": "",
         "Cracked Screen": "",
         "Damage Screen": "",
         "Heavy Screcthes": "",
         "1-2 Screcthes": "",
         "No Screcthes": "",
         "Major Screcthes": "",
         "Less than 2 Body scratches": "",
         "No Body Screcthes": "",
         "Heavy Dents": "",
         "Less than 2 dents": "",
         "No dents": "",
         "Cracked Side Back Panel": "",
         "Missing Side Back Panel": "",
         "No Defect On Side Back Panel": "",
         "Bent / Curved Panel": "",
         "Loose Screen Or Gap in Screen": "",
         "No Bents": "",
         "Charger": "",
         "Earphone": "",
         "Boximei": "",
         "Billimei": ""
     }];

     function createCSV(array) {
         var keys = Object.keys(array[0]); //Collects Table Headers

         var result = ''; //CSV Contents
         result += keys.join(','); //Comma Seperates Headers
         result += '\n'; //New Row

         array.forEach(function(item) { //Goes Through Each Array Object
             keys.forEach(function(key) { //Goes Through Each Object value
                 result += item[key] + ','; //Comma Seperates Each Key Value in a Row
             })
             result += '\n'; //Creates New Row
         })

         return result;
     }


     async function downloadCSV(arrayStrings, fileName) {
         var array = arrayStrings.split(',');
         var arrayObjects = [];
         var obj = {};
         for (var i = 0; i < array.length; i++) {
             if (i === 0) {
                 obj["ID (Optional)"] = "";
             } else {
                 obj[array[i]] = "";
             }
         }
         arrayObjects.push(obj);
         csv = 'data:text/csv;charset=utf-8,' + createCSV(arrayObjects); //Creates CSV File Format
         excel = encodeURI(csv); //Links to CSV 

         link = document.createElement('a');
         link.setAttribute('href', excel); //Links to CSV File 
         link.setAttribute('download', fileName ? fileName : 'sample-model.csv'); //Filename that CSV is saved as
         link.click();
     }
 </script>

 <!--varient model upto start-->
 <script type="text/javascript">
     $(document).ready(function() {
         $('#varintmobupto').DataTable({
             dom: 'Bfrtip',
             buttons: [
                 'csv'
             ]
         });
     });
 </script>

 </body>

 </html>