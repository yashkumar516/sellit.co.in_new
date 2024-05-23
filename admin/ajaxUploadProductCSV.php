<?php include 'includes/confile.php' ?>
<?php 
include_once "./classes/productValue.php"; 
$productValueManager = new ProductValueManager($con);
// Model ID (Optional),Model Name,Model Image (Optional),Variant Name,Call Not Recieve,Below 3 Months,3-6 Months,6-11 Months,Above 11 Months,Touch screen,Large spots,Multiple spots,Minor spots,No spots,Display faded,Multiple lines,No lines,Screen cracked,Damaged screen,Heavy scratches,1-2 scratches,No scratches,Major scratches,Less than 2 scratches,No body scratches,Multiple/heavy dents,Less than 2 dents,No dents,Cracked/ broken side or back panel,Missing side or back panel,No defect on side or back panel,Bent/ curved panel,Loose screen (Gap in screen and body),No Bents,Orignal Charger,Original Earphones,Box with same IMEI,Bill with same IMEI
$desiredHeaders = ["Model ID","Model Name", "Call Not Recieve", "Below 3 Months", "3-6 Months", "6-11 Months", "Above 11 Months", "Touch screen", "Large spots", "Multiple spots", "Minor spots", "No spots", "Display faded", "Multiple lines", "No lines", "Screen cracked", "Damaged screen", "Heavy scratches", "1-2 scratches", "No scratches", "Major scratches", "Less than 2 scratches", "No body scratches", "Multiple/heavy dents", "Less than 2 dents", "No dents", "Cracked/ broken side or back panel", "Missing side or back panel", "No defect on side or back panel", "Bent/ curved panel", "Loose screen (Gap in screen and body)", "No Bents", "Orignal Charger", "Original Earphones", "Box with same IMEI", "Bill with same IMEI"];

 $headerCount=count($desiredHeaders);  
    
      

    if($_FILES['csvfile']['error'] === UPLOAD_ERR_OK  && isset($_POST["subCategory"])){
        $brandId= $_POST["subCategory"];
                      
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
                 }  else{

                    $headerIndex = array_search($header, $headers);
                 }
                if ($headerIndex !== false) {
                    $headerIndexes[$header] = $headerIndex;
                } 
            }
            $i = 1;

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
                    $counter = $i;
                    $modelName = trim($rowData["Model Name"]);
                    if($modelName !==""){
                        $productInfo = $productValueManager->getProductId($rowData, $categoryId, $brandId);
                        $productId= $productInfo["id"];
                        
                        $productValueInfo = $productValueManager->upsertProductValueByKeyId($rowData, $productId, $brandId);
                   }
                    $i++;
                }
            } 
            if ($productValueInfo && $productInfo  ) {
                echo " Model questions upload successfully ";
            } else {
                echo " Model questions upload failed ";
            } 
        }
    
    } else{
        echo "Error uploading the CSV file or 'uploadType' is not set.";

    }
       
?>