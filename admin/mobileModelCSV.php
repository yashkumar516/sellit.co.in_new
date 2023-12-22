<?php include 'includes/confile.php' ?>
<?php
include_once "./classes/products.php";
include_once "./classes/childcategory.php";
include_once "./classes/subcategory.php";
include_once "./classes/variant.php";
include_once "./classes/questions.php";
$productManager = new ProductManager($con);
$subCategoryManager = new SubCategoryManager($con);
$childCategoryManager = new ChildCategoryManager($con);
$variantManager = new VariantManager($con);
$questionsManager = new QuestionsManager($con);

$desiredHeaders = ["Model ID", "Model Name", "Model Image", "Variant ID", "Variant Name", "Variant Price", "Display Value", "Copy Display", "Front Camera", "Back Camera", "Volume Button", "Finger Touch", "Speaker", "Power Button", "Face Sensor", "Charging Port", "Audio Reciever", "Camera Glass", "Wifi", "Silent Button", "Battery", "Bluetooth", "Vibrator", "Microphone"];
$headerCount = count($desiredHeaders);
echo "--<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>----------------------------filename-------------------" . $_POST["subCategory"];

if (isset($_POST["csvfile"]) && isset($_POST["subCategory"])) {


    $brandId = $_POST["subCategory"];

    $seriesId = $_POST["childCategory"];
    $filename = $_FILES["csvfile"]["tmp_name"];
    echo "--<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>----------------------------filename-------------------" . $filename;
    if ($_FILES["csvfile"]["size"] > 0) {
        $file = fopen($filename, "r"); // Read the header to handle column names
        $headers = fgetcsv($file, 1000, ","); // Find the indexes of the desired headers
        $headerIndexes = [];
        foreach ($desiredHeaders as $header) {
            $headerIndex = false;
            if ($header === "Model ID") {
                $headerIndex = array_search('Model ID (Optional)', $headers);
            } else if ($header === "Variant ID") {
                $headerIndex = array_search('Variant ID (Optional)', $headers);
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
                isset($getdata[0]) &&
                isset($getdata[1]) &&
                isset($getdata[3])
            ) {
                echo "--<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>----------------------------filename-------------------" . $getdata[1];
                echo "--<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>----------------------------filename-------------------" . $getdata[2];
                echo "--<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>----------------------------filename-------------------" . $getdata[3];
                $categoryId = 1;
                $rowData = [];
                foreach ($headerIndexes as $header => $index) {
                    $rowData[$header] = isset($getdata[$index])
                        ? $getdata[$index]
                        : null;
                }
                $productInfo = $productManager->upsertProductId($rowData, $categoryId, $brandId, $seriesId, 1);
                $productId = $productInfo["id"];
                $variantInfo = $variantManager->upsertVariantId($rowData, $categoryId, $productId, $brandId, $seriesId);
                $questionsInfo = $questionsManager->upsertQuestions($rowData, $categoryId, $productId, $brandId, $seriesId);
            }
        }

        // if ($questionsInfo && $productInfo && $variantInfo) {
        //     echo "<script> 
        //     alert('Model upload successfully');
        //         window.location.href = 'ecommerce-products-form.php';
        //         </script>";
        // } else {
        //     echo "<script> 
        //     alert('Model upload failed');
        //         window.location.href = 'ecommerce-products-form.php';
        //         </script>";
        // } 
    }
}
?>