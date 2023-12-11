<!-- header and slider start -->
<?php include 'includes/header.php' ?>
<?php include 'includes/sidebar.php' ?>
<!-- header and slider end  -->
<?php 
include_once "./classes/childcategory.php";  
include_once "./classes/subcategory.php";   
$subCategoryManager = new SubCategoryManager($con);
$childCategoryManager = new ChildCategoryManager($con);
 
$categoryId = $_REQUEST['category'];
$desiredHeaders = ["Brand ID","Brand Name", "Series ID","Series Name" ];
$headersValidation = [ "Brand Name", "Series Name" ];
$headerCount=count($desiredHeaders);  
    if (isset($_POST["uploadWithBrandCSV"])) {
        $filename = $_FILES["csvfile"]["tmp_name"];
        if ($_FILES["csvfile"]["size"] > 0) {
            $file = fopen($filename, "r"); // Read the header to handle column names
            $headers = fgetcsv($file, 1000, ","); // Find the indexes of the desired headers
            $headerIndexes = [];
            foreach ($desiredHeaders as $header) {
                $headerIndex=false;
                 if($header==="Brand ID"){
                    $headerIndex = array_search('Brand ID (Optional)', $headers);
                    if(!$headerIndex){
                        $headerIndex = array_search('Brand ID', $headers);
                    }
                 } else if($header==="Series ID"){
                    $headerIndex = array_search('Series ID (Optional)', $headers); 
                    if(!$headerIndex){
                        $headerIndex = array_search('Series ID', $headers);
                    }
                    if(!$headerIndex){
                        $headerIndex = array_search('Serie ID', $headers);
                    }
                 } else if($header==="Series Name"){
                    $headerIndex = array_search('Series Name', $headers); 
                    if(!$headerIndex){
                        $headerIndex = array_search('Serie Name', $headers);
                    } 
                 } else{
                    $headerIndex = array_search($header, $headers);
                 }
                if ($headerIndex !== false) {
                    $headerIndexes[$header] = $headerIndex;
                } 
            }
            while (($getdata = fgetcsv($file, 1000, ",")) !== false) { 

                $rowData = [];
                    foreach ($headerIndexes as $header => $index) {
                        $rowData[$header] = isset($getdata[$index])
                            ? $getdata[$index]
                            : null;
                    }
                // $rowData = array_combine($headerIndexes, $getdata);
                // $validate = 1;

                // foreach ($headersValidation as $field) {
                    
                //     if (!isset($rowData[$field]) &&  !empty($rowData[$field])) {
                //         echo "<br/>";
                //         echo "-----------------------".$field."-------------------".$rowData[$field];
                //         $validate = 0;
                //     }
                // } 
                if ( 
                    isset($categoryId) &&
                    isset($rowData) &&
                    isset($rowData['Brand Name']) &&
                    isset($rowData["Series Name"]) 
                ) {
                    // $categoryId = 2;
                    
    
                    $SubCategoryInfo = $subCategoryManager->upsertSubcategorySerie(
                        $rowData,
                        $categoryId
                    );
                    $brandId= $SubCategoryInfo["id"];
                    
                    $childCategoryInfo = $childCategoryManager->upsertChildCategory(
                        $rowData, $categoryId, $brandId
                    );
                    $seriesId= $SubCategoryInfo["id"];
                     
                } 
            }
            
            // if ($SubCategoryInfo && $childCategoryInfo ) {
            //     echo "<script> 
            //     alert('Series upload successfully');
            //         window.location.href = 'child-category.php?category=$categoryId';
            //         </script>";
            // } else {
            //     echo "<script> 
            //     alert('Series upload failed');
            //         window.location.href = 'child-category.php?category=$categoryId';
            //         </script>";
            // } 
        }
    } 
?>

<?php
		   
	if(isset($_POST['submit']))
	{
		$cat_id = $_POST['category'];
		$subcat_id = $_POST['subcategory'];
		$name = $_POST['Name'];
		foreach($name as $key => $value){
		$query = mysqli_query($con,"INSERT INTO `childcategory` (`categoryid`,`subcatid`,`childcategory`)
			values('$cat_id','$subcat_id','$value') ");
		}
		if($query)
		{
			echo "<script> alert(' insert successfully');
			window.location.href = 'child-category-list.php';
			</script>";
		}
		else
		{
			echo "<script> alert('  insert not successfully');
			window.location.href = 'child-category-list.php';
			</script>";	
		}
	}
?>

<section role="main" class="content-body content-body-modern mt-0">
    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="font-weight-bold text-6"> Series Name</h2>
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li><span>Home</span></li>
                <li><span>eCommerce</span></li>
                <li><span>Series</span></li>
            </ol>
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-camera"></i>
                                <h2 class="card-big-info-title">Series Detail</h2>
                                <p class="card-big-info-desc">Upload Series Detail</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="form-group row align-items-center">
                                    <div class="col">


                                        <div class="form-group row align-items-center">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0"> Select
                                                category</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <select name="category" id="category"
                                                    class="form-control form-control-modern" onchange="callsubcat()">
                                                    <option value="">choose your category</option>

                                                    <?php if(isset($_REQUEST['category'])){
															   $c = $_REQUEST['category'];
															  $cf = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `category` WHERE `id` = '$c'"));
															  ?>
                                                    <option value="<?php echo $cf['id'] ?>"
                                                        class="form-control form-control-modern">
                                                        <?php echo $cf['category_name'] ?>
                                                    </option>
                                                    <?php
													} else{
														$selectcat = mysqli_query($con,"SELECT * FROM `category` WHERE `id` != '4' ");
														while($ar = mysqli_fetch_assoc($selectcat))
														{
														?>
                                                    <option value="<?php echo $ar['id'] ?>">
                                                        <?php echo $ar['category_name'] ?></option>
                                                    <?php
														}}
														?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row align-items-center">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0"> Select
                                                Brand</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <select name="subcategory" id="subcategory"
                                                    class="form-control form-control-modern">
                                                    <option value="">choose your brand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group align-items-center" id="tag">
                                            <div class="row">
                                                <label class="col-3 control-label text-lg-right mb-0"> Series
                                                    Name</label>
                                                <div class="col-lg-6 col-xl-6">
                                                    <input type="text" class="form-control form-control-modern"
                                                        name="Name[]" value="" required />

                                                </div>
                                                <div class="col-3">
                                                    <button class="btn btn-primary" id="addtag">add more</button>
                                                </div>
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
                <button type="submit" name="submit"
                    class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1"
                    data-loading-text="Loading...">
                    <i class="bx bx-save text-4 mr-2"></i> Save Series
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="#"
                    class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
            </div>
        </div>
    </form>
    <!-- end: page -->

    <script src="js/selectImage.js"></script>
    <div class="row pt-5">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">

                    <div class="datatables-header-footer-wrapper table1">
                        <div class="datatable-header">
                            <div class="row  px-3 pt-3">
                                <div class="col-5">
                                    <form action="#" enctype="multipart/form-data" method="POST">
                                        <div class="pb-2">
                                            <span class="dragBox w-100">
                                                <!-- Darg and Drop .csv here -->
                                                <div class="view" onclick={importCSVFile(event)}
                                                    ondragover="dragNdrop(event)" ondrop="dropFile(event)">
                                                    <input type="file" onchange={changeFile(event)} name="csvfile"
                                                        style="display: none;" />
                                                </div>
                                                <div class="dragInner">
                                                    <i class="bx bx-file text-4 mr-2"></i>
                                                    <span>Upload File</span>
                                                </div>
                                                <input type="file" onchange={changeFile(event)} id="importCSV"
                                                    name="csvfile" style="display: none;" />
                                            </span>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100" onChange="uploadFile()"
                                            value="upload" name="uploadWithBrandCSV"> <i
                                                class="bx bx-upload text-4 mr-2"></i>Upload CSV </button>
                                    </form>
                                </div>

                                <div class="col-2"></div>
                                <div class="col-5 w-100">
                                    <div class="form-group float-right  pb-3  mb-0 w-100" id="has-search"> <span
                                            class="fa fa-search form-control-feedback"></span> <input type="text"
                                            class="form-control" placeholder="Search"></div>
                                    <!-- <button id="csvButton">Download CSV</button> -->
                                    <div class="d-inline-flex w-100 pt-2">

                                        <button type="button" class="btn btn-primary w-100 mr-2 px-1"
                                            onclick="downloadCSV('<?php echo implode(',', $desiredHeaders); ?>', 'template-serie.csv')">
                                            <i class="bx bx-download text-4 mr-2"></i>Download
                                            Template
                                        </button>

                                        <button type="button" class="btn btn-primary w-100 px-1" id="csvButton"><i
                                                class="bx bx-download text-4 mr-2"></i>
                                            Download CSV
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

                            <!-- <tr>
													<th width="3%"><input type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2" value="" /></th>
													<th width="8%">ID</th>
													<th width="28%">Action</th>
													
													<th width="28%">Brand Name</th>
													<th width="28%">Category Name</th>
												</tr> -->
                            <thead>
                                <tr width="100%">
                                    <!-- <?php
                                        foreach ($desiredHeaders as $header) {
                                            echo "<th  width='25%'>$header</th>";
                                        }
                                    ?> -->
                                    <th width="10%">Brand ID</th>
                                    <th width="35%">Brand Name</th>
                                    <th width="10%">Series ID</th>
                                    <th width="45%">Series Name</th>
                                    <th width="35%">Modify Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- fetch category details start -->
                                <?php
                                $fetchData = mysqli_query(
                                    $con,
                                    "SELECT subcategory.subcategory_name as brandName,subcategory.subcategory_image as brandImage,subcategory.id as brandId,childcategory.id as serieId,childcategory.childcategory as serieName,childcategory.modify as modifyDate
									FROM `subcategory` JOIN `childcategory` ON childcategory.subcatid = subcategory.id WHERE subcategory.category_id = '$categoryId' ORDER BY `modifyDate` DESC;"
                                );
                                while (
                                    $data = mysqli_fetch_assoc(
                                        $fetchData
                                    )
                                ) {
 
                                    // $modifyDate = date('y/m/d',strtotime($data['modifyDate'])); 
                                    ?>
                                <tr>

                                    <td class="text-capitalize">
                                        <?php echo $data[
                                            "brandId"
                                        ]; ?>
                                    </td>
                                    <td class="text-capitalize">
                                        <?php echo $data[
                                            "brandName"
                                        ]; ?>
                                    </td>
                                    <!-- 
                                    <td><a href="#">
                                            <?php
                                                $imageUrl = $data["brandImage"]; 
                                                $urlComponents = parse_url($imageUrl); 
                                                if ($urlComponents !== false && isset($urlComponents['scheme'])) { 
                                                    echo "<img src=\"$imageUrl\" alt=\"img\" width=\"100px\">";
                                                } else { 
                                                    echo "<img src=\"img/{$data['brandImage']}\" alt=\"img\" width=\"100px\">";
                                                }
                                            ?>
                                        </a>
                                        <p style="display:none;"><?php echo $data[
                                            "brandImage"
                                        ]; ?></p>

                                    </td> -->
                                    <td>
                                        <?php echo $data[
                                            "serieId"
                                        ]; ?>
                                    </td>
                                    <td>
                                        <?php echo $data[
                                            "serieName"
                                        ]; ?>
                                    </td>

                                    <td>
                                        <?php echo date('y/m/d',strtotime($data['modifyDate'])) ?>
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
            </section>
        </div>
    </div>
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
<script src="vendor/dropzone/dropzone.js"></script>
<script src="vendor/pnotify/pnotify.custom.js"></script>


<!--(remove-empty-lines-end)-->

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>
<script src="js/customBfrtip.js" data-order=<?php echo $headerCount ?>></script>

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
            obj["Brand ID (Optional)"] = "";
        } else if (i === 2) {
            obj["Series ID (Optional)"] = "";
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

</body>

</html>

<script>
$(document).ready(function(e) {
    var html =
        '<div class="row my-1" id="rmtag"><label class="col-3 control-label text-lg-right"> Series Name</label><div class="col-lg-6 col-xl-6"><input type="text" class="form-control form-control-modern" name="Name[]" value="" required /></div><div class="col-3"><a id="removed">X</a></div></div>';
    $("#addtag").click(function(e) {
        $("#tag").append(html);
    });

    $("#tag").on('click', '#removed', function(e) {
        $("#rmtag").remove();
    })
});
</script>

<script>
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