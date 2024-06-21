 <!-- include header and sidebar start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
 <!-- end sidebar  header -->
 <?php
 $desiredHeaders = [
        "Model ID",
        "Model Name",
        "Model Image",
        "Variant ID", 
        "Variant Name",
        "Variant Price",
        // "Brand Name",
        "Switch Off",
        "Front Camera",
        "Back Camera",
        "Wifi",
        "speaker",
        "Power/Home Button",
        "Charging Port",
        "Battery",
        "Microphone",
        "Volume Button",
        "Finger Print",
        "Gps",
        "Bluetooth",
        "Charger",
        "Box",
        "Pencil",
        "Bill",
        "Screen Flawless",
        "Screen Good",
        "Screen Averege",
        "Screen Demaged",
        "Physical Flawless",
        "Physical Good",
        "Physical Averege",
        "Physical Demaged",
        "Out Of Warrenty",
        "Below 3",
        "3 to 6 Months",
        "6 to 11 Months",
        "Above 11 Months"
    ];
    
$headerCount=count($desiredHeaders);  
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
	 move_uploaded_file($_FILES['modelimg']['tmp_name'], "img/".str_replace(" ","_",$_FILES['modelimg']['name']));
	 $query = mysqli_query($con,"INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`)
	                 VALUES('$category','$subcategory','$childcategory','$productname','$out_img')");
                     if($query)
                     {
                        $mmid = mysqli_fetch_assoc(mysqli_query($con,"SELECT LAST_INSERT_ID() AS `id` FROM `product`"));
                        $mid = $mmid['id'];
                        $quinsert = mysqli_query($con,"INSERT INTO `tabletquestions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`)
                        VALUES('$category','$subcategory','$childcategory','$mid') ");
                        
                          $varient = $_POST['varient'];
			              $upto = $_POST['upto'];
			              foreach($varient as $key => $value){
			              $insertvarient = mysqli_query($con,"INSERT INTO `tabletsvarient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
			              VALUES('$category','$subcategory','$childcategory','$mid','$value','$upto[$key]')");
		                }
		                if($quinsert){
		                 echo "<script> alert('inserted successfully');</script>";   
		                }else{
		                  echo "<script> alert('not inserted');</script>";   
		                }
                    }else{
                        echo "<script> alert('not inserted');</script>"; 
                    }
                    
    }else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
    
	}
    //start new 
    elseif($productimage['mime'] == "image/jpeg"){
    $pimg = imagecreatefromjpeg($_FILES['modelimg']['tmp_name']);
    if(isset($pimg)){	
	 $out_img = time().random_int(100000, 999999).'.webp';
	 imagewebp($pimg,"img/".$out_img,100);
	move_uploaded_file($_FILES['modelimg']['tmp_name'], "img/".str_replace(" ","_",$_FILES['modelimg']['name']));
	$query = mysqli_query($con,"INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`)
	                 VALUES('$category','$subcategory','$childcategory','$productname','$out_img')");
                    if($query)
                     {
                        $mmid = mysqli_fetch_assoc(mysqli_query($con,"SELECT LAST_INSERT_ID() AS `id` FROM `product`"));
                        $mid = $mmid['id'];
                        $quinsert = mysqli_query($con,"INSERT INTO `tabletquestions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`)
                        VALUES('$category','$subcategory','$childcategory','$mid') ");
                        
                          $varient = $_POST['varient'];
			              $upto = $_POST['upto'];
			              foreach($varient as $key => $value){
			              $insertvarient = mysqli_query($con,"INSERT INTO `tabletsvarient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
			              VALUES('$category','$subcategory','$childcategory','$mid','$value','$upto[$key]')");
		                }
		                if($quinsert){
		                 echo "<script> alert('inserted successfully');</script>";   
		                }else{
		                  echo "<script> alert('not inserted');</script>";   
		                }
                    }else{
                        echo "<script> alert('not inserted');</script>"; 
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
         <h2 class="font-weight-bold text-6">Tablet Name</h2>
         <div class="right-wrapper">
             <ol class="breadcrumbs">
                 <li><span>Home</span></li>
                 <li><span>eCommerce</span></li>
                 <li><span>tablet</span></li>
             </ol>
             <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
         </div>
     </header>

     <!-- start: page -->
     <form action="" method="post" enctype="multipart/form-data">
         <div class="row">
             <div class="col">
                 <section class="card card-modern card-big-info">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-lg-5 col-xl-1-5">
                                 <i class="card-big-info-icon bx bx-box"></i>
                                 <h2 class="card-big-info-title">General Info</h2>
                                 <p class="card-big-info-desc">Add here the Model description with all details and
                                     necessary information.</p>
                             </div>
                             <div class="col-lg-3-5 col-xl-4-5">
                                 <div class="form-group row align-items-center">
                                     <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select
                                         Category</label>
                                     <div class="col-lg-7 col-xl-6">
                                         <select name="categoryname" id="category"
                                             class="form-control form-control-modern" name="categoryname"
                                             onchange="callsubcat()" required>
                                             <!-- pre selected code start -->
                                             <?php
                                                           if(isset($_POST['product'])){
															   $c = $_POST['categoryname'];
															  $cf = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `category` WHERE `id` = '$c'"));
															  ?>
                                             <option value="<?php echo $cf['id'] ?>"
                                                 class="form-control form-control-modern" selected>
                                                 <?php echo $cf['category_name'] ?></option>
                                             <?php
														   }
														  ?>

                                             <!-- pre selected code end -->
                                             <option value="" class="form-control form-control-modern"> select category
                                             </option>
                                             <?php
															  $fetch = mysqli_query($con,"SELECT * FROM `category` WHERE `status` = 'active' AND `id` = '3'");
															   while($arr= mysqli_fetch_assoc($fetch))
															   {
														     ?>
                                             <option value="<?php echo $arr['id'] ?>"
                                                 class="form-control form-control-modern">
                                                 <?php echo $arr['category_name'] ?></option>
                                             <?php
															   }
															   ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-group row align-items-center">
                                     <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select
                                         Brand</label>
                                     <div class="col-lg-7 col-xl-6">
                                         <select name="subcategory" id="subcategory"
                                             class="form-control form-control-modern" onchange="callchildcat()">
                                             <!-- pre selected code start -->
                                             <?php
                                                           if(isset($_POST['product'])){
															  $b = $_POST['subcategory'];
															  $bf = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `id` = '$b'"));
															  ?>
                                             <option value="<?php echo $bf['id'] ?>"
                                                 class="form-control form-control-modern" selected>
                                                 <?php echo $bf['subcategory_name'] ?></option>
                                             <?php
														   }
														  ?>

                                             <!-- pre selected code end -->
                                             <option value="" class="form-control form-control-modern"> Select Brand
                                             </option>
                                         </select>

                                     </div>
                                 </div>
                                 <div class="form-group row align-items-center">
                                     <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Select
                                         Series</label>
                                     <div class="col-lg-7 col-xl-6">
                                         <select name="childcategory" id="childcategory"
                                             class="form-control form-control-modern">
                                             <!-- pre selected code start -->
                                             <?php
                                                           if(isset($_POST['product'])){
															  $s = $_POST['childcategory'];
															  $sf = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `childcategory` WHERE `id` = '$s'"));
															  ?>
                                             <option value="<?php echo $sf['id'] ?>"
                                                 class="form-control form-control-modern" selected>
                                                 <?php echo $sf['childcategory'] ?></option>
                                             <?php
														   }
														  ?>

                                             <!-- pre selected code end -->
                                             <option value="" class="form-control form-control-modern">select Series
                                             </option>
                                         </select>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </section>
                 <!-- new section start -->
                 <section class="card card-modern card-big-info">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-lg-12 col-xl-12">
                                 <div class="form-group align-items-center">
                                     <div class="row">
                                         <div class="col-2 text-center pr-0">
                                             <label class=" control-label text-lg-right mb-0">Image(155*155 px)</label>
                                         </div>
                                         <div class="col-4 px-0">
                                             <input type="file" class="form-control form-control-modern" name="modelimg"
                                                 value="" required />
                                         </div>

                                         <div class="col-1 text-center">
                                             <label class=" control-label text-lg-right mb-0">Name</label>
                                         </div>
                                         <div class="col-4 px-0">
                                             <input type="text" class="form-control form-control-modern"
                                                 name="modelname" value="" required />
                                         </div>

                                     </div>
                                 </div>

                                 <div class="form-group align-items-center" id="tag">
                                     <div class="row">
                                         <div class="col-1">
                                             <label class=" control-label text-lg-right mb-0">varient</label>
                                         </div>
                                         <div class="col-3">
                                             <input type="text" class="form-control form-control-modern"
                                                 name="varient[]" value="" required />
                                         </div>

                                         <div class="col-2">
                                             <label class=" control-label text-lg-right mb-0">upto value</label>
                                         </div>
                                         <div class="col-4">
                                             <input type="text" class="form-control form-control-modern" name="upto[]"
                                                 value="" required />
                                         </div>

                                         <div class="col-2">
                                             <p class="btn btn-primary" width="100%" id="addtag">add</p>
                                         </div>


                                     </div>
                                 </div>

                             </div>
                         </div>

                     </div>
                 </section>
                 <!-- new section end  -->
             </div>
         </div>

         <div class="row action-buttons">
             <div class="col-12 col-md-auto">

                 <button type="submit" name="product"
                     class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1"
                     data-loading-text="Loading...">
                     <i class="bx bx-save text-4 mr-2"></i> Save tablet
                 </button>
             </div>
             <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                 <a href="#"
                     class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
             </div>
             <!-- <div class="col-12 col-md-auto ml-md-auto mt-3 mt-md-0">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
							      <i class="bx bx-trash text-4 mr-2"></i> Delete Product
									</a>
								</div> -->
         </div>
     </form>
     <!-- end: page -->

     <script src="js/selectImage.js"></script>
     <!-- start question table -->
     <div class="row mt-5">
         <div class="card card-modern">
             <div class="datatables-header-footer-wrapper">
                 <div class="datatable-header">
                     <div class="row   mb-3">
                         <div class="col-5 col-lg-5 mb-3 mb-lg-0">

                             <!-- <form action="watchcsv.php" enctype="multipart/form-data" method="POST"> -->
                             <form id="uploadCSVModelForm" action="#" enctype="multipart/form-data" method="POST">
                                 <div class="pb-2">
                                     <span class="dragBox w-100">
                                         <!-- Darg and Drop .csv here -->
                                         <div class="view" onclick={importCSVFile(event)} ondragover="dragNdrop(event)"
                                             ondrop="dropFile(event)">
                                             <input type="file" onchange={changeFile(event)} name="csvfile"
                                                 style="display: none;" />
                                         </div>
                                         <div class="dragInner">
                                             <i class="bx bx-file text-4 mr-2"></i>
                                             <span>Upload File</span>
                                         </div>
                                         <input type="file" onchange={changeFile(event)} id="importCSV" name="csvfile"
                                             style="display: none;" />
                                     </span>
                                 </div>
                                 <div class="row p-0 m-0 pb-2">
                                     <div class="col-lg-6 col-xl-6 px-0">
                                         <select name="subCategory" id="subcategory1"
                                             class="form-control form-control-modern" onchange="callChildcategory()"
                                             required>
                                             <!-- pre selected code start -->
                                             <?php
                                                           if(isset($_POST['product'])){
															  $b = $_POST['subcategory'];
															  $bf = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `id` = '$b'"));
															  ?>
                                             <option value="<?php echo $bf['id'] ?>"
                                                 class="form-control form-control-modern" selected>
                                                 <?php echo $bf['subcategory_name'] ?></option>
                                             <?php
														   }
														  ?>

                                             <!-- pre selected code end -->
                                             <option value="" class="form-control form-control-modern"> Select Brand
                                             </option>
                                         </select>

                                     </div>
                                     <div class="col-lg-6 col-xl-6 px-0">
                                         <select name="childCategory" id="childcategory1"
                                             class="form-control form-control-modern">
                                             <!-- pre selected code start -->
                                             <?php
                                                           if(isset($_POST['product'])){
															  $s = $_POST['childcategory'];
															  $sf = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `childcategory` WHERE `id` = '$s'"));
															  ?>
                                             <option value="<?php echo $sf['id'] ?>"
                                                 class="form-control form-control-modern" selected>
                                                 <?php echo $sf['childcategory'] ?></option>
                                             <?php
														   }
														  ?>

                                             <!-- pre selected code end -->
                                             <option value="" class="form-control form-control-modern">select Series
                                             </option>
                                         </select>

                                     </div>
                                 </div>
                                 <button type="button" class="btn btn-primary w-100" value="upload"
                                     name="uploadWithModelCSV"
                                     onclick="submitTabletCSVForm('uploadCSVModelForm','Model')"> <i
                                         class="bx bx-upload text-4 mr-2"></i>Upload CSV
                                 </button>
                             </form>
                         </div>

                         <div class="col-2"></div>
                         <div class="col-5 w-100">
                             <div class="form-group float-right     mb-0 w-100" id="has-search"> <span
                                     class="fa fa-search form-control-feedback"></span> <input type="text"
                                     class="form-control" placeholder="Search"></div>
                             <!-- <button id="csvButton">Download CSV</button> -->
                             <div class="d-inline-flex w-100  ">
                                 <button type="button" class="btn btn-primary w-100 mr-2 px-1"
                                     onclick="downloadCSV('<?php echo implode(',', $desiredHeaders); ?>', 'template-model.csv')">
                                     <i class="bx bx-download text-4 mr-1"></i>
                                     Template
                                 </button>
                                 <button type="button" class="btn btn-primary w-100  mr-2  px-1" id="csvButton"><i
                                         class="bx bx-download text-4 mr-2"></i>
                                     CSV
                                 </button>
                                 <?php
                                    // SELECT COUNT(*)  FROM `product` WHERE `image_url`="external";
                                    $query = "SELECT COUNT(*) AS `id`  FROM `product` WHERE `image_url`='external' AND `categoryid`= 3 ";

                                    $result = $con->query($query);

                                    if ($result) {
                                        $row = $result->fetch_assoc();
                                        $rowCount = $row['id']; 
                                        if ($rowCount > 0) {
                                    ?>
                                 <button type="submit" class="btn btn-primary w-100 px-1" name="syncImageModel"
                                     onclick="syncImageAjax('Model',3,'addtablet.php')"><i
                                         class="bx bx-sync text-4 mr-1"></i>Sync
                                     <?php echo $rowCount>1?$rowCount." Images":$rowCount." Image"?>

                                 </button>
                                 <!-- </form> -->
                                 <?php
                                        } else {
                                        ?>
                                 <button type="button" class="btn btn-primary w-100 px-1" disabled><i
                                         class="bx bx-sync text-4 mr-2"></i> Sync Image
                                 </button>

                                 <?php
                                        }
                                    } else { 
                                    }
                                    ?>

                             </div>
                         </div>
                     </div>

                 </div>
                 <div class="row hide-load-table">
                     <p class="  p-2 m-1 "></p>
                 </div>
                 <table class="table table-responsive table-striped mb-0 " id="datatable-ecommerce-list"
                     style="min-width: 550px;">
                     <thead>
                         <tr>
                             <!-- <th>ID</th>
                             <th>Varientid</th>
                             <th>Model Name</th>
                             <th>Variant Name</th>
                             <th>Variant Price</th>
                             <th>Brand Name</th>
                             <th>Switch of</th>
                             <th>Front camera</th>
                             <th>Back camera</th>
                             <th>Wifi</th>
                             <th>speaker</th>
                             <th>Power/home button</th>
                             <th>Charging port</th>
                             <th>Battery</th>
                             <th>Microphone</th>
                             <th>volume btn</th>
                             <th>Finger print</th>
                             <th>Gps</th>
                             <th>Bluetooth</th>
                             <th>Charger</th>
                             <th>Box</th>
                             <th>Pencil</th>
                             <th>Bill</th>
                             <th>Screen flawless</th>
                             <th>Screen Good</th>
                             <th>Screen Averege</th>
                             <th>Screen Demaged</th>
                             <th>Physical flawless</th>
                             <th>Physical Good</th>
                             <th>Physical Averege</th>
                             <th>Physical Demaged</th>
                             <th>Out warrenty</th>
                             <th>Below 3</th>
                             <th>3 to 6 months</th>
                             <th>6 to 11 months</th>
                             <th>Above 11 months</th> -->

                             <?php
                                        foreach ($desiredHeaders as $header) {
                                            echo "<th>$header</th>";
                                        }
                                    ?>

                             <th>Modify Date</th>
                         </tr>
                     </thead>
                     <tbody>
                         <!-- fetch category details start -->
                         <?php
												$fetchproduct = mysqli_query($con,"SELECT * FROM `tabletquestions` JOIN `tabletsvarient` ON tabletsvarient.product_name = tabletquestions.product_name  WHERE tabletquestions.categoryid = '3' ");
							
												while($arproduct = mysqli_fetch_assoc($fetchproduct))
												{
													$productid = $arproduct['product_name'];
													$row = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$productid' "));
													if($row >= 1){
													$selproduct = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$productid' "));
													$brndid = $selproduct['subcategoryid']; 
                                                    $modifyDate = date('y/m/d',strtotime($selproduct['modify_date'])); 
													$fetchbb = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `subcategory` WHERE `id` = '$brndid'")); 
												}                                
											  ?>
                         <!-- fetch category details end -->
                         <tr>
                             <td><strong><?php echo $productid ?></strong></td>
                             <td><?php echo $selproduct['product_name'] ?></td>
                             <td><a href="#">


                                     <?php
           $imageUrl = $selproduct["product_image"]; 
           $urlComponents = parse_url($imageUrl); 
           if ($urlComponents !== false && isset($urlComponents['scheme'])) {  
               echo "<img   src=\"$imageUrl\" alt=\"img\" width=\"100px\" >";
           } else { 
               echo "<img   src=\"img/{$selproduct['product_image']}\" alt=\"img\" width=\"100px\" >";
           }
       ?>

                                 </a>
                                 <p style="display:none;"><?php echo $selproduct[
       "product_image"
   ]; ?></p>
                             </td>
                             <td><strong><?php echo $arproduct['vid'] ?></strong></td>

                             <td><?php echo $arproduct['varient'] ?></td>
                             <td><?php echo $arproduct['uptovalue'] ?></td>
                             <!-- <td class="text-capitalize"><?php echo $fetchbb['subcategory_name'] ?></td> -->
                             <td><?php echo $arproduct['switchof'] ?></td>
                             <td><?php echo $arproduct['Frontcam'] ?></td>
                             <td><?php echo $arproduct['backcam'] ?></td>
                             <td><?php echo $arproduct['wifi'] ?></td>
                             <td><?php echo $arproduct['speaker'] ?></td>
                             <td><?php echo $arproduct['power/home'] ?></td>
                             <td><?php echo $arproduct['charging'] ?></td>
                             <td><?php echo $arproduct['battery'] ?></td>
                             <td><?php echo $arproduct['microphone'] ?></td>
                             <td><?php echo $arproduct['volumebutton'] ?></td>
                             <td><?php echo $arproduct['fingerprint'] ?></td>
                             <td><?php echo $arproduct['gps'] ?></td>
                             <td><?php echo $arproduct['bluetooth'] ?></td>
                             <td><?php echo $arproduct['charger'] ?></td>
                             <td><?php echo $arproduct['box'] ?></td>
                             <td><?php echo $arproduct['pencil'] ?></td>
                             <td><?php echo $arproduct['bill'] ?></td>
                             <td><?php echo $arproduct['sflawless'] ?></td>
                             <td><?php echo $arproduct['sgood'] ?></td>
                             <td><?php echo $arproduct['saverege'] ?></td>
                             <td><?php echo $arproduct['sdamaged'] ?></td>
                             <td><?php echo $arproduct['pflawless'] ?></td>
                             <td><?php echo $arproduct['pgood'] ?></td>
                             <td><?php echo $arproduct['paverege'] ?></td>
                             <td><?php echo $arproduct['pdamaged'] ?></td>
                             <td><?php echo $arproduct['outofwarrenty'] ?></td>
                             <td><?php echo $arproduct['below3'] ?></td>
                             <td><?php echo $arproduct['3to6'] ?></td>
                             <td><?php echo $arproduct['6to11'] ?></td>
                             <td><?php echo $arproduct['above11'] ?></td>
                             <td>
                                 <?php echo $modifyDate; ?>
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
 <script src="js/customBfrtip.js" data-order=0 data-buttons="csv,pdf"></script>

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

 </body>

 </html>

 <script>
$(document).ready(function(e) {
    var html =
        '<div class="row my-3" id="rmtag"><div class="col-1"><label class=" control-label text-lg-right mb-0">Varient </label></div><div class="col-3"><input type="text" class="form-control form-control-modern" name="varient[]" value="" required /></div><div class="col-2"><label class=" control-label text-lg-right mb-0">upto value</label></div><div class="col-4"><input type="text" class="form-control form-control-modern" name="upto[]" value="" required /></div><div class="col-2"><button class="btn btn-primary" id="removed">remove</button></div></div>';
    $("#addtag").click(function(e) {
        $("#tag").append(html);
    });

    $("#tag").on('click', '#removed', function(e) {
        $("#rmtag").remove();
    })
});
 </script>

 <script>
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
            obj["Model ID (Optional)"] = "";
        } else if (i === 3) {
            obj["Varient ID (Optional)"] = "";
        } else {
            obj[array[i]] = "";
        }
        // obj[array[i]] = "";

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
 <script>
window.onload = function() {
    // Call your function here
    callSubcategory();
};

function callSubcategory() {
    var id = 3;
    // console.log()
    if (id != null) {
        $.ajax({
            method: "post",
            url: "subdajax.php",
            data: {
                cid: id
            },
            dataType: "html",
            success: function(result) {
                $('#subcategory1').html(result);
            }
        });
    }
}

function callsubcat() {
    var id = $('#category').val();
    if (id != null) {
        $.ajax({
            method: "post",
            url: "subdajax.php",
            data: {
                cid: id
            },
            dataType: "html",
            success: function(result) {
                $('#subcategory').html(result);
            }
        });
    }
}
 </script>

 <script>
function callChildcategory() {
    var id = $('#subcategory1').val();
    if (id != null) {
        $.ajax({
            method: "post",
            url: "childajax.php",
            data: {
                sid: id
            },
            dataType: "html",
            success: function(result) {
                $('#childcategory1').html(result);
            }
        });
    }
}

function callchildcat() {
    var id = $('#subcategory').val();
    if (id != null) {
        $.ajax({
            method: "post",
            url: "childajax.php",
            data: {
                sid: id
            },
            dataType: "html",
            success: function(result) {
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