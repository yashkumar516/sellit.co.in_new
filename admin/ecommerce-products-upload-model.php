<!-- include header and sidebar start -->
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>
<!-- end sidebar  header -->
<?php
include_once "./classes/products.php";
include_once "./classes/childcategory.php";  
include_once "./classes/subcategory.php";  
include_once "./classes/varient.php";  
include_once "./classes/questions.php";  
$productManager = new ProductManager($con);
$subCategoryManager = new SubCategoryManager($con);
$childCategoryManager = new ChildCategoryManager($con);
$varientManager = new VarientManager($con);
$questionsManager = new QuestionsManager($con);
 

    if (isset($_POST["uploadWithBrandCSV"])) {
        $desiredHeaders = ['Brand', 'Brand Image', 'Series', 'Model', 'Model Image', 'Varient', 'Varient Price', 'Display Value', 'Copy Display', 'Front Camera', 'Back Camera', 'Volume Button', 'Finger Touch', 'Speaker', 'Power Button', 'Face Sensor', 'Charging Port', 'Audio Reciever', 'Camera Glass', 'Wifi', 'Silent Button', 'Battery', 'Bluetooth', 'Vibrator', 'Microphone', 'Call Not Recieve', 'Below 3 Months', '3-6 Months', '6-11 Months', 'Above 11 Months', 'Touch screen', 'Large spots', 'Multiple spots', 'Minor spots', 'No spots', 'Display faded', 'Multiple lines', 'No lines', 'Screen cracked', 'Damaged screen', 'Heavy scratches', '1-2 scratches', 'No scratches', 'Major scratches', 'Less than 2 scratches', 'Multiple/heavy dents', 'Less than 2 dents', 'No dents', 'Cracked/ broken side or back panel', 'Missing side or back panel', 'No defect on side or back panel', 'Bent/ curved panel', 'Loose screen (Gap in screen and body)', 'No Bents', 'Orignal Charger', 'Original Earphones', 'Box with same IMEI', 'Bill with same IMEI'];
        $filename = $_FILES["csvfile"]["tmp_name"];
        if ($_FILES["csvfile"]["size"] > 0) {
            $file = fopen($filename, "r"); // Read the header to handle column names
            $headers = fgetcsv($file, 1000, ","); // Find the indexes of the desired headers
            $headerIndexes = [];
            foreach ($desiredHeaders as $header) {
                $headerIndex = array_search($header, $headers);
                if ($headerIndex !== false) {
                    $headerIndexes[$header] = $headerIndex;
                }
            }
            while (($getdata = fgetcsv($file, 1000, ",")) !== false) {
                if (
                    isset($getdata) &&
                    isset($getdata[0]) &&
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
    
                    $SubCategoryInfo = $subCategoryManager->upsertSubcategoryByKey(
                        $rowData,
                        $categoryId
                    );
                    $brandId= $SubCategoryInfo["id"];
                    
                    $SubCategoryInfo = $childCategoryManager->upsertChildCategory(
                        $rowData, $categoryId, $brandId
                    );
                    $seriesId= $SubCategoryInfo["id"];
                    $productInfo = $productManager->upsertProduct($rowData, $categoryId, $brandId, $seriesId);
                    $productId= $productInfo["id"];
                    $varientInfo = $varientManager->upsertVarient($rowData, $categoryId, $productId, $brandId, $seriesId);
                    $questionsInfo = $questionsManager->upsertQuestions($rowData, $categoryId, $productId, $brandId, $seriesId);
                    
                    
                }
            }
            
            if ($SubCategoryInfo && $productInfo && $varientInfo) {
                echo "<script> alert('Brand upload successfully');
                    window.location.href = 'ecommerce-products-form.php';
                    </script>";
            } else {
                echo "<script> alert('Brand upload failed');
                    window.location.href = 'ecommerce-products-form.php';
                    </script>";
            } 
        }
    } 
?>

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


    <div class="row action-buttons my-3">
        <div class="col-12 col-md-auto   ">

            <a href="ecommerce-products-form.php"
                class="cancel-button btn btn-light btn-px-4 my-3 border font-weight-semibold text-color-dark text-3">Single
                Model</a>
        </div>
        <div class="col-12 col-md-auto px-0  ">
            <a href="#"
                class="cancel-button btn btn-primary btn-px-4 my-3 border font-weight-semibold text-color-dark text-3">Upload
                CSV</a>
        </div>
    </div>


    <!-- start: page -->
    <div class="row pt-5">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5 text-center">
                            <i class="card-big-info-icon bx bx-box"></i>
                            <h2 class="card-big-info-title">Upload CSV</h2>
                            <p class="card-big-info-desc">Upload here the Brand, Model with all details and varient
                                information.</p>

                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-end  py-2 text-lg-right ">
                                <div class=" col-12 float-right">
                                    <button class="btn btn-light  "
                                        onclick="downloadCSV(demoWithBrandCSV, 'sample.csv')">Sample CSV
                                    </button>
                                </div>
                            </div>
                            <form action="#" enctype="multipart/form-data" method="POST">

                                <div class="form-group row align-items-center  py-5">
                                    <label class="col-lg-4 col-xl-3 control-label text-lg-right mb-0">CSV File
                                    </label>
                                    <div class="col-lg-6 col-xl-6">

                                        <input type="file" class="form form-control" name="csvfile" required>

                                    </div>

                                    <div class="col-lg-2 col-xl-3">
                                        <input type="submit" class="btn btn-primary" value="upload"
                                            name="uploadWithBrandCSV">
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->

    <div class="row pt-5">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">

                    <div class="datatables-header-footer-wrapper">


                        <table class="table table-responsive table-striped mb-0 " id="datatable-ecommerce-list"
                            style="min-width: 550px;">

                            <thead>
                                <tr>
                                    <!-- <th>ID</th>
                                     <th>varientid</th> -->
                                    <th>Brand</th>
                                    <th>Brand Image</th>
                                    <th>Series</th>
                                    <th>Model</th>
                                    <th>Model Image</th>
                                    <th>Varient</th>
                                    <th>Varient Price</th>
                                    <!-- <th>Brand Name</th> -->
                                    <th>Display Value</th>
                                    <th>Copy Display</th>
                                    <th>Front Camera</th>
                                    <th>Back Camera</th>
                                    <th>Volume Button</th>
                                    <th>Finger Touch</th>
                                    <th>Speaker</th>
                                    <th>Power Button</th>
                                    <th>Face Sensor</th>
                                    <th>Charging Port</th>
                                    <th>Audio Reciever</th>
                                    <th>Camera Glass </th>
                                    <th>Wifi</th>
                                    <th>Silent Button</th>
                                    <th>Battery</th>
                                    <th>Bluetooth</th>
                                    <th>Vibrator</th>
                                    <th>Microphone</th>
                                    <th>Call Not Recieve</th>
                                    <th>Below 3 Months</th>
                                    <th>3-6 Months</th>
                                    <th>6-11 Months</th>
                                    <th>Above 11 Months</th>
                                    <th>Touch screen</th>
                                    <th>Large spots</th>
                                    <th>Multiple spots</th>
                                    <th>Minor spots</th>
                                    <th>No spots</th>
                                    <th>Display faded</th>
                                    <th>Multiple lines</th>
                                    <th>No lines</th>
                                    <th>Screen cracked</th>
                                    <th>Damaged screen</th>
                                    <th>Heavy scratches</th>
                                    <th>1-2 scratches</th>
                                    <th>No scratches</th>
                                    <th>Major scratches</th>
                                    <th>Less than 2 scratches</th>
                                    <th>No scratches</th>
                                    <th>Multiple/heavy dents</th>
                                    <th>Less than 2 dents</th>
                                    <th>No dents</th>
                                    <th>Cracked/ broken side or back panel</th>
                                    <th>Missing side or back panel</th>
                                    <th>No defect on side or back panel</th>
                                    <th>Bent/ curved panel</th>
                                    <th>Loose screen (Gap in screen and body)</th>
                                    <th>No Bents</th>
                                    <th>Orignal Charger</th>
                                    <th>Original Earphones</th>
                                    <th>Box with same IMEI</th>
                                    <th>Bill with same IMEI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- fetch category details start -->
                                <?php
                                $fetchproduct = mysqli_query(
                                    $con,
                                    "SELECT questions.product_name as pid,varient.id as vid,questions.displayvalue,questions.copydisplay,questions.front_camera, 
                                   questions.back_camera,questions.volume,questions.finger_touch,questions.speaker,questions.power_btn,questions.face_sensor,questions.charging_port,questions.audio_receiver,
                                   questions.camera_glass,questions.wifi,questions.silent_btn,questions.battery,questions.bluetooth,questions.vibrator,questions.microphone,varient.varient,varient.uptovalue 
                                   FROM `questions` JOIN `varient` ON varient.product_name = questions.product_name WHERE questions.categoryid = '1'"
                                );
                                while (
                                    $arproduct = mysqli_fetch_assoc(
                                        $fetchproduct
                                    )
                                ) {

                                    //childcategoryid
                                    $childCategory1 = "";
                                    $productid = $arproduct["pid"];
                                    $row = mysqli_num_rows(
                                        mysqli_query(
                                            $con,
                                            "SELECT * FROM `product` WHERE `id` = '$productid' "
                                        )
                                    );
                                    if ($row >= 1) {
                                        // childcategoryid
                                        $selproduct = mysqli_fetch_assoc(
                                            mysqli_query(
                                                $con,
                                                "SELECT * FROM `product` WHERE `id` = '$productid' "
                                            )
                                        );
                                        $brndid = $selproduct["subcategoryid"];
                                        $childcategoryid =
                                            $selproduct["childcategoryid"]; //    echo "-----------------childcategoryid---outer------------". $childcategoryid;
                                        if (
                                            isset($childcategoryid) &&
                                            $childcategoryid !== null &&
                                            $childcategoryid !== "" &&
                                            is_numeric($childcategoryid)
                                        ) {
                                            // The variable is set and not empty
                                            $childCategoryQuery = mysqli_query(
                                                $con,
                                                "SELECT * FROM `childcategory` WHERE `id` = '$childcategoryid' "
                                            );
                                            if (
                                                mysqli_num_rows(
                                                    $childCategoryQuery
                                                ) > 0
                                            ) {
                                                $child = mysqli_fetch_assoc(
                                                    $childCategoryQuery
                                                );
                                                $childCategory1 =
                                                    $child["childcategory"];
                                            }
                                        }
                                        $fetchbb = mysqli_fetch_assoc(
                                            mysqli_query(
                                                $con,
                                                "SELECT * FROM `subcategory` WHERE `id` = '$brndid'"
                                            )
                                        );
                                    }
                                    ?>
                                <!-- fetch category details end -->
                                <tr>

                                    <td class="text-capitalize">
                                        <?php echo $fetchbb[
                                            "subcategory_name"
                                        ]; ?>
                                    </td>

                                    <td><a href="#"><img src="img/<?php echo $fetchbb[
                                        "subcategory_image"
                                    ]; ?>" alt="img" width="100px"></a>
                                        <p style="display:none;"><?php echo $fetchbb[
                                            "subcategory_image"
                                        ]; ?></p>

                                    </td>
                                    <td>
                                        <?php echo $childCategory1; ?>
                                    </td>
                                    <td>
                                        <?php echo $selproduct[
                                            "product_name"
                                        ]; ?>
                                    </td>

                                    <td><a href="#"><img src="img/<?php echo $selproduct[
                                        "product_image"
                                    ]; ?>" alt="img" width="100px"></a>
                                        <p style="display:none;"><?php echo $selproduct[
                                            "product_image"
                                        ]; ?></p>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["varient"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["uptovalue"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct[
                                            "displayvalue"
                                        ]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["copydisplay"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct[
                                            "front_camera"
                                        ]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["back_camera"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["volume"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct[
                                            "finger_touch"
                                        ]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["speaker"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["power_btn"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["face_sensor"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct[
                                            "charging_port"
                                        ]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct[
                                            "audio_receiver"
                                        ]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct[
                                            "camera_glass"
                                        ]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["wifi"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["silent_btn"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["battery"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["bluetooth"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["vibrator"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $arproduct["microphone"]; ?>
                                    </td>

                                    <td>
                                        <?= $fetchbb["callvalue"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["3months"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["3to6months"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["6to11months"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["above11"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["touchscreen"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["largespot"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["multiplespot"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["minorspot"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["nospot"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["displayfade"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["multilines"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["nolines"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["crackedscreen"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["damegescreen"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["heavyscracthes"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["12scratches"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["noscratches"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["majorscratch"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["2bodyscratches"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["nobodysratches"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["heavydents"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["2dents"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["nodents"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["crackedsideback"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["missingsideback"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["nodefectssideback"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["bentcurvedpanel"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["loosescreen"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["nobents"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["charger"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["earphone"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["boximei"] ?>
                                    </td>
                                    <td>
                                        <?= $fetchbb["billimei"] ?>
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
<script type="text/javascript">
$(document).ready(function() {
    $('.table').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'csv',
            className: 'btn btn-light px-3 mx-3 mt-3'
        }]
    });
});
</script>
<script>
$(document).ready(function() {
    var table = $('#datatable-ecommerce-list').DataTable();
});
</script>

<script>
var demoWithBrandCSV = [{
    "Brand": "",
    "Brand Image": "",
    "Series": "",
    "Model": "",
    "Model Image": "",
    "Varient": "",
    "Varient Price": "",
    "Display Value": "",
    "Copy Display": "",
    "Front Camera": "",
    "Back Camera": "",
    "Volume Button": "",
    "Finger Touch": "",
    "Speaker": "",
    "Power Button": "",
    "Face Sensor": "",
    "Charging Port": "",
    "Audio Reciever": "",
    "Camera Glass": "",
    "Wifi": "",
    "Silent Button": "",
    "Battery": "",
    "Bluetooth": "",
    "Vibrator": "",
    "Microphone": "",
    "Call Not Recieve": "",
    "Below 3 Months": "",
    "3-6 Months": "",
    "6-11 Months": "",
    "Above 11 Months": "",
    "Touch screen": "",
    "Large spots": "",
    "Multiple spots": "",
    "Minor spots": "",
    "No spots": "",
    "Display faded": "",
    "Multiple lines": "",
    "No lines": "",
    "Screen cracked": "",
    "Damaged screen": "",
    "Heavy scratches": "",
    "1-2 scratches": "",
    "No scratches": "",
    "Major scratches": "",
    "Less than 2 scratches": "",
    "No scratches": "",
    "Multiple/heavy dents": "",
    "Less than 2 dents": "",
    "No dents": "",
    "Cracked/ broken side or back panel": "",
    "Missing side or back panel": "",
    "No defect on side or back panel": "",
    "Bent/ curved panel": "",
    "Loose screen (Gap in screen and body)": "",
    "No Bents": "",
    "Orignal Charger": "",
    "Original Earphones": "",
    "Box with same IMEI": "",
    "Bill with same IMEI": "",
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


function downloadCSV(array, fileName) {
    csv = 'data:text/csv;charset=utf-8,' + createCSV(array); //Creates CSV File Format
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