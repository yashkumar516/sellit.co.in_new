<?php include 'includes/confile.php' ?>
<?php 

ini_set("display_errors",1);
    include_once "./classes/products.php";
    include_once "./classes/childcategory.php";  
    include_once "./classes/subcategory.php";  
    include_once "./classes/variantTablet.php";  
    include_once "./classes/questionsTablet.php";  
    include_once "./classes/syncImage.php";   
    $imageManager = new SyncImageManager($con);
    $productManager = new ProductManager($con);
    $subCategoryManager = new SubCategoryManager($con);
    $childCategoryManager = new ChildCategoryManager($con);
    $variantManager = new VariantTabletManager($con);
    $questionsManager = new QuestionsTabletManager($con);
     
    $syncImageManager = new SyncImageManager($con);
    
    if($_FILES['csvfile']['error'] === UPLOAD_ERR_OK && isset($_POST["uploadType"]) && !empty($_POST["uploadType"]) && $_POST["uploadType"] ==="Model"){

        
 $desiredHeaders = [
    "Model ID",
    "Model Name",
    "Model Image",
    "Variant ID", 
    "Variant Name",
    "Variant Price",
    "Brand Name",
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
 
        // $desiredHeaders = [ "Model ID","Model Name","Model Image","Variant ID","Variant Name","Variant Price","Display Value","Copy Display","Front Camera","Back Camera","Volume Button","Finger Touch","Speaker","Power Button","Face Sensor","Charging Port","Audio Reciever","Camera Glass","Wifi","Silent Button","Battery","Bluetooth","Vibrator","Microphone"];
        $headerCount=count($desiredHeaders);  
            if (  isset($_POST["subCategory"]) ) {
                
             
                $brandId= $_POST["subCategory"];
                             
                $seriesId= $_POST["childCategory"];
                $filename = $_FILES["csvfile"]["tmp_name"];
                // echo "--<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>----------------------------filename-------------------".$filename;
                if ($_FILES["csvfile"]["size"] > 0) {
                    $file = fopen($filename, "r"); // Read the header to handle column names
                    $headers = fgetcsv($file, 1000, ","); // Find the indexes of the desired headers
                    $headerIndexes = [];
                    foreach ($desiredHeaders as $header) {
                        $headerIndex=false;
                         if($header==="Model ID"){
                            $headerIndex = array_search('Model ID (Optional)', $headers);
                            if(!$headerIndex){
                                $headerIndex = array_search('Model ID', $headers);
                            }
                         } else if($header==="Variant ID"){
                            $headerIndex = array_search('Variant ID (Optional)', $headers);
                            if(!$headerIndex){
                                $headerIndex = array_search('Variant ID', $headers);
                            }
                         } else{
        
                            $headerIndex = array_search($header, $headers);
                         }
                        if ($headerIndex !== false) {
                            $headerIndexes[$header] = $headerIndex;
                        } 
                    }
                    $i = 1;
                    // $getdata = fgetcsv($file, 1000, ",");
                    // $length = count($getdata);
                    while (($getdata = fgetcsv($file, 1000, ",")) !== false) { 
                        if (
                            isset($getdata) &&
                            isset($getdata[0]) &&
                            isset($getdata[1]) &&
                            isset($getdata[3])
                        ) {
                           
                            $categoryId = 3;
                            $rowData = [];
                            foreach ($headerIndexes as $header => $index) {
                                $rowData[$header] = isset($getdata[$index])
                                    ? $getdata[$index]
                                    : null;
                            } 
                            $counter = $i;
                            $modelName = trim($rowData["Model Name"]);
                            if($modelName !==""){
                                $productInfo = $productManager->upsertProductId($rowData, $categoryId, $brandId, $seriesId, $counter);
                                $productId= $productInfo["id"];
                                
                                $variantInfo = $variantManager->upsertVariantId($rowData, $categoryId, $productId, $brandId, $seriesId);
                                $questionsInfo = $questionsManager->upsertQuestions($rowData, $categoryId, $productId, $brandId, $seriesId);
                            }
                            $i++;
                        }
                    }
     
                        if ($questionsInfo && $productInfo && $variantInfo) {
                            echo "Model upload successfully";
                            // echo "<script> 
                            // alert('Model upload successfully');
                          
                            //     window.location.href = 'ecommerce-products-form.php';
                            //     $('#spinner-div').hide();
                            //     </script>";
                        } else {
                            echo "Model upload failed";
                            // echo "<script> 
                            // alert('Model upload failed');
                       
                            //     window.location.href = 'ecommerce-products-form.php';
                            //     $('#spinner-div').hide();
                            //     </script>";
                        } 
                    // }
                }
            } 
    } else if( $_FILES['csvfile']['error'] === UPLOAD_ERR_OK && isset($_POST["uploadType"]) && !empty($_POST["uploadType"]) && $_POST["uploadType"] ==="Brand"){
        $desiredHeaders = ["ID", "Brand Name", "Brand Image", "Call Not Recieve", "Below 3 Months", "3-6 Months", "6-11 Months", "Above 11 Months", "Touch screen", "Large spots", "Multiple spots", "Minor spots", "No spots", "Display faded", "Multiple lines", "No lines", "Screen cracked", "Damaged screen", "Heavy scratches", "1-2 scratches", "No scratches", "Major scratches", "Less than 2 scratches", "No body scratches", "Multiple/heavy dents", "Less than 2 dents", "No dents", "Cracked/ broken side or back panel", "Missing side or back panel", "No defect on side or back panel", "Bent/ curved panel", "Loose screen (Gap in screen and body)", "No Bents", "Orignal Charger", "Original Earphones", "Box with same IMEI", "Bill with same IMEI"];
 
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
                    }
                }
                if ($subCategoryInfo) {
                    echo 'Brand upload successfully';
                    // echo "<script> alert('Brand upload successfully');
                    //     $('#spinner-div').hide();
                    //     window.location.href = 'brandquestions.php';
                    //     </script>";
                } else {
                    echo 'Brand upload failed';
                    // echo "<script> alert('Brand upload failed');
                    //     $('#spinner-div').hide();
                    //     window.location.href = 'brandquestions.php';
                    //     </script>";
                }
            }
        
    } else if(isset($_POST["uploadType"]) && isset($_POST["categoryId"]) && !empty($_POST["uploadType"]) && $_POST["uploadType"] ==="Series"){
// uploadCSVSeriesForm

    $categoryId = $_POST['categoryId'];
    $desiredHeaders = ["Brand ID", "Brand Name", "Series ID", "Series Name"];
    $headersValidation = ["Brand Name", "Series Name"];
    $headerCount = count($desiredHeaders); 
    $filename = $_FILES["csvfile"]["tmp_name"];
    if ($_FILES["csvfile"]["size"] > 0) {
        $file = fopen($filename, "r"); // Read the header to handle column names
        $headers = fgetcsv($file, 1000, ","); // Find the indexes of the desired headers
        $headerIndexes = [];
        foreach ($desiredHeaders as $header) {
            $headerIndex = false;
            if ($header === "Brand ID") {
                $headerIndex = array_search('Brand ID (Optional)', $headers);
                if (!$headerIndex) {
                    $headerIndex = array_search('Brand ID', $headers);
                }
            } else if ($header === "Series ID") {
                $headerIndex = array_search('Series ID (Optional)', $headers);
                if (!$headerIndex) {
                    $headerIndex = array_search('Series ID', $headers);
                }
                if (!$headerIndex) {
                    $headerIndex = array_search('Serie ID', $headers);
                }
            } else if ($header === "Series Name") {
                $headerIndex = array_search('Series Name', $headers);
                if (!$headerIndex) {
                    $headerIndex = array_search('Serie Name', $headers);
                }
            } else {
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
            if (
                isset($categoryId) &&
                isset($rowData) &&
                isset($rowData['Brand Name']) &&
                isset($rowData["Series Name"])
            ) {
                // $categoryId = 2;


                $SubCategoryInfo = $subCategoryManager->upsertSubcategorySeries(
                    $rowData,
                    $categoryId
                );
                $brandId = $SubCategoryInfo["id"];
                // error_reporting(E_ALL);
                // ini_set('display_errors', 1);
                // echo "<br/><br/><br/><br/>------------------------------------brandId--------" . $brandId;

                $childCategoryInfo = $childCategoryManager->upsertChildCategory(
                    $rowData,
                    $categoryId,
                    $brandId
                );
                $seriesId = $SubCategoryInfo["id"];
            }
        }

        if ($SubCategoryInfo && $childCategoryInfo) {
            echo "Series upload successfully";
            // echo "<script> 
            // alert('Series upload successfully');
            //     window.location.href = 'child-category.php?category=$categoryId';
            //     </script>";
        } else {
            echo "Series upload failed";
            // echo "<script> 
            // alert('Series upload failed');
            //     window.location.href = 'child-category.php?category=$categoryId';
            //     </script>";
        }
    }
    } else{
        echo "Error uploading the CSV file or 'uploadType' is not set.";

    }
       
?>