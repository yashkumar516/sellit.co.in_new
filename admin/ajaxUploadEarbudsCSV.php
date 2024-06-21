<?php
ini_set("display_errors",1);
// Include database connection and required classes
include 'includes/confile.php';
include_once "./classes/products.php";
include_once "./classes/childcategory.php";
include_once "./classes/subcategory.php"; 
include_once "./classes/questionsEarbuds.php";
include_once "./classes/syncImage.php";

// Initialize managers
$imageManager = new SyncImageManager($con);
$productManager = new ProductManager($con);
$subCategoryManager = new SubCategoryManager($con);
$childCategoryManager = new ChildCategoryManager($con); 
$questionsManager = new QuestionsEarbudsManager($con);

// Check if CSV file was uploaded successfully and 'uploadType' is set to 'Model'
if ($_FILES['csvfile']['error'] === UPLOAD_ERR_OK && isset($_POST["uploadType"]) && $_POST["uploadType"] === "Model") {
    // Define desired headers in CSV
    $desiredHeaders = [
        "Model ID",
        "Model Name",
        "Model Image", 
        "Brand Name",
        "Switch Off", 
        "Speaker/Mic",
        "Connectivity", 
        "Flawless",
        "Good",
        "Averege",
        "Below Averege", 
        "Charger",
        "Cable",
        "Invoice", 
        "Out Of Warrenty",
        "Below 3",
        "3 to 6 Months",
        "6 to 11 Months",
        "Above 11 Months",
        "Upto Value"
    ];
    

    // Get subcategory and child category IDs from form
    $brandId = $_POST["subCategory"];
    $seriesId =null;

    // Process the uploaded CSV file
    $filename = $_FILES["csvfile"]["tmp_name"];
    if ($_FILES["csvfile"]["size"] > 0) {
        $file = fopen($filename, "r");
        // Read the header to determine column indexes
        $headers = fgetcsv($file, 1000, ",");
        $headerIndexes = [];
        foreach ($desiredHeaders as $header) {
            // Find index of each desired header
            $headerIndex = array_search($header, $headers);
            if ($headerIndex !== false) {
                $headerIndexes[$header] = $headerIndex;
            }
        }

        $i = 1;
        // while (($getdata = fgetcsv($file, 1000, ",")) !== false) { 
        while (($getdata = fgetcsv($file, 1000, ",")) !== false) {
            // Ensure necessary columns are present and not empty
            if (
                isset($getdata) &&
                isset($getdata[0]) &&
                isset($getdata[1]) &&
                isset($getdata[3])
            ) {
                $categoryId = 4; // Assuming a static category ID

                // Extract relevant data based on header indexes
                $rowData = [];
                foreach ($headerIndexes as $header => $index) {
                    $rowData[$header] = isset($getdata[$index]) ? $getdata[$index] : null;
                }

                // Trim model name and check if it's not empty
                $modelName = trim($rowData["Model Name"]);
                if (!empty($modelName)) {
                    // Upsert product and questions data
                    $counter = $i; // Assuming $counter usage
                    $productInfo = $productManager->upsertProductId($rowData, $categoryId, $brandId, $seriesId, $counter);
                    $productId = $productInfo["id"];
                    $questionsInfo = $questionsManager->upsertQuestions($rowData, $categoryId, $productId, $brandId, $seriesId);

                }
                $i++;
            }
        }
        // Check if both product and questions were successfully processed
        if ($questionsInfo &&  $productInfo) {
            echo "Model uploaded successfully" ;
        } else {
            echo "Model upload failed";
        }
        fclose($file);
    } else {
        echo "Error uploading the CSV file.";
    }
} else {
    echo "Error uploading the CSV file or 'uploadType' is not set.";
}
?>