<?php

class ProductValueManager
{
    private $conn; 

    public function __construct($db)
    {
        $this->conn = $db; 
    }
 
 
    public function getProductId($getdata, $categoryId, $brandId)
    {
        
        // Check if the product already exists 
        $modelName = trim($getdata["Model Name"]);
        $id = isset($getdata["Model ID"]) ? (int) $getdata["Model ID"] : "";
        $checkQuery =
        $id !== "" && $id !== null && $id > 0
        ? "SELECT * FROM `product` WHERE  `id` = ? "
        : "SELECT * FROM `product` WHERE `product_name` = ? AND `subcategoryid` = ? AND  `categoryid` = ?";
 
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkId = $id !== "" && $id !== null && $id > 0 ? $id : $modelName;

        $checkStmt = $this->conn->prepare($checkQuery);
        if ($id !== "" && $id !== null && $id > 0) {
            $checkStmt->bind_param("s", $checkId);
        } else {
            $checkStmt->bind_param("sss", $checkId, $brandId, $categoryId);
        }

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Product exists, update it
            $existingProduct = $checkResult->fetch_assoc(); // Fetch existing product data
           
            return $existingProduct;
        } else {
           $data=`{"id":null}`;
            return $data;
        }
    }

    public function upsertProductValueByKeyId($getdata,$productId, $brandId)
    {
  
        // Create a DateTime object from the input string
        $currentDateTimeObject = new DateTime(); //::createFromFormat('Y-m-d H:i:s.u', $inputString);

        // Format the DateTime object
        $nowDate = $currentDateTimeObject->format('Y-m-d H:i:s.u');
        // Check if the product already exists 
        $modelName = trim($getdata["Model Name"]);
        // $id = (int)$getdata["ID"];  
        // $id = isset($getdata["ID"]) ? (int)$getdata["ID"] : "";

        $id = isset($getdata["Model ID"]) ? (int)$getdata["Model ID"] : "";
    
        $callvalue = $getdata["Call Not Recieve"];
        $threemonths = $getdata["Below 3 Months"];
        $threeto6months = $getdata["3-6 Months"];
        $sixto11months = $getdata["6-11 Months"];
        $above11 = $getdata["Above 11 Months"];
        $touchscreen = $getdata["Touch screen"];
        $largespot = $getdata["Large spots"];
        $multiplespot = $getdata["Multiple spots"];
        $minorspot = $getdata["Minor spots"];
        $nospot = $getdata["No spots"];
        $displayfade = $getdata["Display faded"];
        $multilines = $getdata["Multiple lines"];
        $nolines = $getdata["No lines"];
        $crackedscreen = $getdata["Screen cracked"];
        $damegescreen = $getdata["Damaged screen"];
        $heavyscracthes = $getdata["Heavy scratches"];
        $scratches12 = $getdata["1-2 scratches"];
        $noscratches = $getdata["No scratches"];


        // body questions starts
        $majorscratch = $getdata["Major scratches"];
        $bodyscratches2 = $getdata["Less than 2 scratches"];
        $nobodysratches = $getdata["No body scratches"];
        $heavydents = $getdata["Multiple/heavy dents"];
        $dents2 = $getdata["Less than 2 dents"];
        $nodents = $getdata["No dents"];
        $crackedsideback = $getdata["Cracked/ broken side or back panel"];
        $missingsideback = $getdata["Missing side or back panel"];
        $nodefectssideback = $getdata["No defect on side or back panel"];
        $bentcurvedpanel = $getdata["Bent/ curved panel"];
        $loosescreen = $getdata["Loose screen (Gap in screen and body)"];
        $nobents = $getdata["No Bents"];
        // accessries questions
        $charger = $getdata["Orignal Charger"];
        $earphone = $getdata["Original Earphones"];
        $boximei = $getdata["Box with same IMEI"];
        $billimei = $getdata["Bill with same IMEI"];


        $checkQuery =  "SELECT * FROM `product_value` WHERE  `product_id` = ? "  ; 
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $productId );

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();



        if ($checkResult->num_rows > 0) {
            // Subcategory exists, update it
            $existingSubcategory = $checkResult->fetch_assoc(); // Fetch existing product data
            $modelId = $existingSubcategory['id']; // Get the existing product ID
             $updateQuery = "UPDATE `product_value`
                        SET  
                            `product_id` = ?,
                            `brand_id` = ?,
                            `callvalue` = ?,
                            `3months` = ?,
                            `3to6months` = ?,
                            `6to11months` = ?,
                            `above11` = ?,
                            `touchscreen` = ?,
                            `largespot` = ?,
                            `multiplespot` = ?,
                            `minorspot` = ?,
                            `nospot` = ?,
                            `displayfade` = ?,
                            `multilines` = ?,
                            `nolines` = ?,
                            `crackedscreen` = ?,
                            `damegescreen` = ?,
                            `heavyscracthes` = ?,
                            `12scratches` = ?,
                            `noscratches` = ?,
                            `majorscratch` = ?,
                            `2bodyscratches` = ?,
                            `nobodysratches` = ?,
                            `heavydents` = ?,
                            `2dents` = ?,
                            `nodents` = ?,
                            `crackedsideback` = ?,
                            `missingsideback` = ?,
                            `nodefectssideback` = ?,
                            `bentcurvedpanel` = ?,
                            `loosescreen` = ?,
                            `nobents` = ?,
                            `charger` = ?,
                            `earphone` = ?,
                            `boximei` = ?,
                            `billimei` = ?,
                            `modify_date` = ? 
                        WHERE
                            `id` = ?";

            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param(
                "ssssssssssssssssssssssssssssssssssssss",
                $productId,
                $brandId, 
                $callvalue,
                $threemonths,
                $threeto6months,
                $sixto11months,
                $above11,
                $touchscreen,
                $largespot,
                $multiplespot,
                $minorspot,
                $nospot,
                $displayfade,
                $multilines,
                $nolines,
                $crackedscreen,
                $damegescreen,
                $heavyscracthes,
                $scratches12,
                $noscratches,
                $majorscratch,
                $bodyscratches2,
                $nobodysratches,
                $heavydents,
                $dents2,
                $nodents,
                $crackedsideback,
                $missingsideback,
                $nodefectssideback,
                $bentcurvedpanel,
                $loosescreen,
                $nobents,
                $charger,
                $earphone,
                $boximei,
                $billimei,
                $nowDate, 
                $modelId
            );

            $updateStmt->execute();

            // Fetch and return updated product information
            // $updatedSubcategory = $existingSubcategory; // Use the existing product data

            // Fetch and return inserted product information
            // $insertedSubcategoryId = $insertStmt->insert_id;
            $updatedSubcategoryQuery = "SELECT * FROM product_value WHERE id = ?";
            $updatedSubcategoryStmt = $this->conn->prepare($updatedSubcategoryQuery);
            $updatedSubcategoryStmt->bind_param("d", $modelId);
            $updatedSubcategoryStmt->execute();
            $updatedSubcategoryResult = $updatedSubcategoryStmt->get_result();
            $updateSubcategory = $updatedSubcategoryResult->fetch_assoc();
           
            return $updateSubcategory;
        } else {
            // Subcategory doesn't exist, insert it  
            // Define the fields and their types
            $fields = [
                'product_id', 'brand_id', 'callvalue', '3months', '3to6months', '6to11months',
                'above11', 'touchscreen', 'largespot', 'multiplespot', 'minorspot', 'nospot', 'displayfade', 'multilines',
                'nolines', 'crackedscreen', 'damegescreen', 'heavyscracthes', '12scratches', 'noscratches', 'majorscratch',
                '2bodyscratches', 'nobodysratches', 'heavydents', '2dents', 'nodents', 'crackedsideback', 'missingsideback',
                'nodefectssideback', 'bentcurvedpanel', 'loosescreen', 'nobents', 'charger', 'earphone', 'boximei', 'billimei',
            ];
 
            $placeholders = implode(', ', array_fill(0, count($fields), '?'));
 
            $types = str_repeat('s', count($fields)); // Assuming all parameters are strings, adjust if needed

            // Build the SQL query
            $insertQuery = "INSERT INTO `product_value` (`" . implode('`,`', $fields) . "`) VALUES($placeholders)";

            $insertStmt = $this->conn->prepare($insertQuery); 
            $insertStmt->bind_param(
                $types,
                $productId,
                $brandId, 
                $callvalue,
                $threemonths,
                $threeto6months,
                $sixto11months,
                $above11,
                $touchscreen,
                $largespot,
                $multiplespot,
                $minorspot,
                $nospot,
                $displayfade,
                $multilines,
                $nolines,
                $crackedscreen,
                $damegescreen,
                $heavyscracthes,
                $scratches12,
                $noscratches,
                $majorscratch,
                $bodyscratches2,
                $nobodysratches,
                $heavydents,
                $dents2,
                $nodents,
                $crackedsideback,
                $missingsideback,
                $nodefectssideback,
                $bentcurvedpanel,
                $loosescreen,
                $nobents,
                $charger,
                $earphone,
                $boximei,
                $billimei
            );

            $insertStmt->execute();

            // Fetch and return inserted product information
            $insertedSubcategoryId = $insertStmt->insert_id;
            $insertedSubcategoryQuery = "SELECT * FROM product_value WHERE id = ?";
            $insertedSubcategoryStmt = $this->conn->prepare($insertedSubcategoryQuery);
            $insertedSubcategoryStmt->bind_param("d", $insertedSubcategoryId);
            $insertedSubcategoryStmt->execute();
            $insertedSubcategoryResult = $insertedSubcategoryStmt->get_result();
            $insertedSubcategory = $insertedSubcategoryResult->fetch_assoc();
        
            return $insertedSubcategory;
        }
    }
 
}