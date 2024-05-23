 <!-- include header and sidebar start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
 <!-- end sidebar  header -->
 <?php  
// Model ID (Optional),Model Name,Model Image (Optional),Variant Name,Call Not Recieve,Below 3 Months,3-6 Months,6-11 Months,Above 11 Months,Touch screen,Large spots,Multiple spots,Minor spots,No spots,Display faded,Multiple lines,No lines,Screen cracked,Damaged screen,Heavy scratches,1-2 scratches,No scratches,Major scratches,Less than 2 scratches,No body scratches,Multiple/heavy dents,Less than 2 dents,No dents,Cracked/ broken side or back panel,Missing side or back panel,No defect on side or back panel,Bent/ curved panel,Loose screen (Gap in screen and body),No Bents,Orignal Charger,Original Earphones,Box with same IMEI,Bill with same IMEI
$desiredHeaders = ["Model ID","Model Name","Model Image","Brand Name", "Call Not Recieve", "Below 3 Months", "3-6 Months", "6-11 Months", "Above 11 Months", "Touch screen", "Large spots", "Multiple spots", "Minor spots", "No spots", "Display faded", "Multiple lines", "No lines", "Screen cracked", "Damaged screen", "Heavy scratches", "1-2 scratches", "No scratches", "Major scratches", "Less than 2 scratches", "No body scratches", "Multiple/heavy dents", "Less than 2 dents", "No dents", "Cracked/ broken side or back panel", "Missing side or back panel", "No defect on side or back panel", "Bent/ curved panel", "Loose screen (Gap in screen and body)", "No Bents", "Orignal Charger", "Original Earphones", "Box with same IMEI", "Bill with same IMEI"];

 $headerCount=count($desiredHeaders);  
 
?>

 <?php
function GENERATELOGS_API($DATA,$BLOCK,$flag=0) {
        $file_name = "/var/log/aakarist/addproduct.txt";
        if(file_exists($file_name)) {
                $fp     =       fopen($file_name,"a+");
                fwrite($fp, date("Y-m-d H:i:s")."\t");
                if($flag==1){
                        fwrite($fp,"(".$BLOCK.")\n");
                        fwrite($fp,print_r($DATA,true));
                        fwrite($fp,"\n\n");
                }
                else{
                        fwrite($fp,"(".$BLOCK.")=====".$DATA."\n");
                }
                fclose($fp);
        }
}



if(isset($_POST['productss']))
{
	GENERATELOGS_API($_POST,"post data",1);
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
	$query = mysqli_query($con,"INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`)
	                                VALUES('$category','$subcategory','$childcategory','$productname','$out_img')");
		if($query)
		{
		   $mmid = mysqli_fetch_assoc(mysqli_query($con,"SELECT LAST_INSERT_ID() AS `id` FROM `product`"));
		   $mid = $mmid['id'];
		   $quinsert = mysqli_query($con,"INSERT INTO `questions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`)
			VALUES('$category','$subcategory','$childcategory','$mid') ");
			if($quinsert){
			  echo $varient = $_POST['varient'];
			  $upto = $_POST['upto'];
			  foreach($varient as $key => $value){
	         	  $insertvarient = mysqli_query($con,"INSERT INTO `varient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
				  VALUES('$category','$subcategory','$childcategory','$mid','$value','$upto[$key]')");
                          GENERATELOGS_API("INSERT INTO `varient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
                                  VALUES('$category','$subcategory','$childcategory','$mid','$value','$upto[$key]')","query",1);
		    }
		   if($insertvarient){
			echo "<script> alert('varient successfully');
			
			
			</script>";
		   }else{
			echo "<script> alert('varient unsuccessfully');
		
			
			</script>";
		   }
		}
		  else
		  {
			echo "<script> alert('insert unsuccessfully');
		
			
			</script>";  
		  } 
	 }
	}else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
   }elseif($productimage['mime'] == "image/jpeg"){
    //   new started
	$pimg = imagecreatefromjpeg($_FILES['modelimg']['tmp_name']);
    if(isset($pimg)){	
	 $out_img = time().random_int(100000, 999999).'.webp';
	 imagewebp($pimg,"img/".$out_img,100);
	$query = mysqli_query($con,"INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`)
	                                VALUES('$category','$subcategory','$childcategory','$productname','$out_img')");
		if($query)
		{
		   $mmid = mysqli_fetch_assoc(mysqli_query($con,"SELECT LAST_INSERT_ID() AS `id` FROM `product`"));
		   $mid = $mmid['id'];
		   $quinsert = mysqli_query($con,"INSERT INTO `questions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`)
			VALUES('$category','$subcategory','$childcategory','$mid') ");
			if($quinsert){
				$varient = $_POST['varient'];
				print($varient);
			  $upto = $_POST['upto'];
			  foreach($varient as $key => $value){
			  $insertvarient = mysqli_query($con,"INSERT INTO `varient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
			          VALUES('$category','$subcategory','$childcategory','$mid','$value','$upto[$key]')");
		    }
		   if($insertvarient){
			echo "<script> alert('varient successfully');
			
			
			</script>";
		   }else{
			echo "<script> alert('varient unsuccessfully');
		
			
			</script>";
		   }
		}
		  else
		  {
			echo "<script> alert('insert unsuccessfully');
		
			
			</script>";  
		  } 
	 }
	}else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
    // new end 
   }else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
  }else{
			echo "<script> alert('image should be in png format');
			
			</script>";  
		}
}
   ?>

 <script src="js/selectImage.js"></script>
 <section role="main" class="content-body content-body-modern mt-0">
     <header class="page-header page-header-left-inline-breadcrumb">
         <h2 class="font-weight-bold text-6">Model Question</h2>
         <div class="right-wrapper">
             <ol class="breadcrumbs">
                 <li><span>Home</span></li>
                 <li><span>eCommerce</span></li>
                 <li><span>Models</span></li>
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
                             <form id="uploadCSVModelForm" action="#" enctype="multipart/form-data" method="POST">
                                 <div class="pb-2">
                                     <span class="dragBox w-100">
                                         <!-- Darg and Drop .csv here -->
                                         <div class="view" onclick={importCSVFile(event)} ondragover="dragNdrop(event)"
                                             ondrop="dropFile(event)">
                                             <!-- <input type="file" onchange={changeFile(event)} name="csvfile"
                                                 style="display: none;" /> -->
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
                                     <div class="col-lg-12 col-xl-12 px-0">
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
                                 </div>
                                 <button type="button" class="btn btn-primary w-100" value="upload"
                                     name="uploadWithModelCSV"
                                     onclick="submitProductCSVForm('uploadCSVModelForm','Model')"> <i
                                         class="bx bx-upload text-4 mr-2"></i>Upload CSV
                                 </button>
                             </form>
                         </div>

                         <div class="col-2"></div>
                         <div class="col-5 w-100">
                             <div class="form-group float-right  pb-3  mb-0 w-100" id="has-search"> <span
                                     class="fa fa-search form-control-feedback"></span> <input type="text"
                                     class="form-control" placeholder="Search"></div>
                             <!-- <button id="csvButton">Download CSV</button> -->
                             <div class="d-inline-flex w-100 mt-5 pt-2">

                                 <button type="button" class="btn btn-primary w-100 mr-2 px-1"
                                     onclick="downloadCSV('<?php echo implode(',', $desiredHeaders); ?>', 'template-model.csv')">
                                     <i class="bx bx-download text-4 mr-1"></i>
                                     Template
                                 </button>

                                 <button type="button" class="btn btn-primary w-100 mr-2  px-1" id="csvButton"><i
                                         class="bx bx-download text-4 mr-1"></i>
                                     CSV
                                 </button>

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
                            $fetchbrques = mysqli_query($con, "SELECT product_value.*, subcategory.subcategory_name, subcategory.subcategory_image, product.product_name, product.product_image
                            FROM product_value 
                            JOIN subcategory ON subcategory.id = product_value.brand_id
                            JOIN product ON product.id = product_value.product_id 
                            ORDER BY `modify_date` DESC;");
                            while ($ar = mysqli_fetch_assoc($fetchbrques)) {
                            ?>
                         <!-- fetch category details start -->
                         <tr>
                             <td><strong><?= $ar['product_id'] ?></strong></td>
                             <td><strong><?= $ar['product_name'] ?></strong></td>

                             <td><a href="#"><img src="img/<?php echo $ar["product_image"]; ?>" alt="img"
                                         width="100px"></a>
                                 <p style="display:none;"><?php echo $ar["product_image"]; ?></p>

                             </td>
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
 <script src="js/customBfrtip.js" data-order=<?php echo $headerCount ?> data-orderType="desc" data-buttons="csv">
 </script>

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
        } else if (i === 2) {
            // obj["Model Image (Optional)"] = "";
        } else if (i === 3) {
            obj["Brand Name (Optional)"] = "";
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

 <script>
$(document).ready(function(e) {
    var html =
        '<div class="row my-3" id="rmtag"><div class="col-1"><label class=" control-label text-lg-right mb-0">Variant </label></div><div class="col-3"><input type="text" class="form-control form-control-modern" name="varient[]" value="" required /></div><div class="col-2"><label class=" control-label text-lg-right mb-0">upto value</label></div><div class="col-4"><input type="text" class="form-control form-control-modern" name="upto[]" value="" required /></div><div class="col-2"><button class="btn btn-primary" id="removed">remove</button></div></div>';
    $("#addtag").click(function(e) {
        $("#tag").append(html);
    });

    $("#tag").on('click', '#removed', function(e) {
        $("#rmtag").remove();
    })
});
 </script>

 <script>
window.onload = function() {
    // Call your function here
    callSubcategory();
};

function callSubcategory() {
    var id = 1;
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