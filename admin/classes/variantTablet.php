<?php

class VariantTabletManager {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function upsertVariant($getdata, $categoryId, $productId, $brandId, $seriesId) {
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);

        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
        // Check if the varient already exists 
        $varient = trim($getdata["Variant"]); 
        $varientPrice = trim($getdata["Variant Price"]); 
        $status="active";
        $checkQuery ="SELECT * FROM `tabletsvarient` WHERE `product_name` = ? AND `varient` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("ss", $productId, $varient);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Variant exists, update it
            $existingVariant = $checkResult->fetch_assoc(); // Fetch existing varient data
            $varientId = $existingVariant['vid']; // Get the existing varient ID
            
            $updateQuery = " UPDATE `tabletsvarient`
            SET
                `categoryid` = ?,
                `subcategoryid` = ?,
                `childcategoryid` =?,
                `product_name` =?,
                `varient` = ?,
                `uptovalue` =?, 
                `status` = ?,
                `modify_date` = ?
            WHERE
                `vid` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("dsssssssi", $categoryId, $brandId, $seriesId, $productId, $varient, $varientPrice, $status, $nowDate, $varientId);
            $updateStmt->execute();
        
            // Fetch and return updated varient information
            $updatedVariant = $existingVariant; // Use the existing varient data
            $updatedVariant['categoryid'] = $categoryId;
            $updatedVariant['subcategoryid'] = $brandId;
            $updatedVariant['childcategoryid'] = $seriesId;
            $updatedVariant['product_name'] = $productId;
            $updatedVariant['varient'] = $varient;
            $updatedVariant['uptovalue'] = $varientPrice;
            $updatedVariant['status'] = $status; 
        
            return $updatedVariant;  
        } else {
            // Variant doesn't exist, insert it 
            // $insertQuery=  "INSERT INTO `varient` (`categoryid`,`subcatid`,`varient`,`status`)  VALUES(?,?,?,?)";
            $insertQuery = "INSERT INTO `tabletsvarient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`, `status`)
                             VALUES(?, ?, ?, ?, ?, ?, ?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("sssssss", $categoryId, $brandId, $seriesId, $productId, $varient, $varientPrice, $status);
 
            $insertStmt->execute();

            // Fetch and return inserted varient information
            $insertedVariantId = $insertStmt->insert_id;
            $insertedVariantQuery = "SELECT * FROM tabletsvarient WHERE vid = ?";
            $insertedVariantStmt = $this->conn->prepare($insertedVariantQuery);
            $insertedVariantStmt->bind_param("d", $insertedVariantId);
            $insertedVariantStmt->execute();
            $insertedVariantResult = $insertedVariantStmt->get_result();
            $insertedVariant = $insertedVariantResult->fetch_assoc();

            return $insertedVariant;
        }
    }
    
    public function upsertVariantId($getdata, $categoryId, $productId, $brandId, $seriesId) {
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);

        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
        // Check if the varient already exists 
 
        $varientPrice = trim($getdata["Variant Price"]); 
        $status="active";

        $varient = trim($getdata["Variant Name"]); 
        $vid =isset($getdata["Variant ID"])? (int)$getdata["Variant ID"]:"";  
        
        $checkQuery = $vid!=="" && $vid!==null && $vid>0? "SELECT * FROM `tabletsvarient` WHERE  `vid` = ?":"SELECT * FROM `tabletsvarient` WHERE `product_name` = ? AND `varient` = ?";
       
        // $checkQuery ="SELECT * FROM `varient` WHERE `product_name` = ? AND `varient` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkId=$vid!=="" && $vid!==null && $vid>0?$vid:$varient;
        // $checkStmt->bind_param("ss", $productId, $checkId);
        if($vid!=="" && $vid!==null && $vid>0){ 
            $checkStmt->bind_param("s", $checkId);
        } else{
            $checkStmt->bind_param("ss", $productId, $checkId);
        }
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Variant exists, update it
            $existingVariant = $checkResult->fetch_assoc(); // Fetch existing varient data
            $varientId = $existingVariant['vid']; // Get the existing varient ID
             
            $updateQuery = " UPDATE `tabletsvarient`
            SET
                `categoryid` = ?,
                `subcategoryid` = ?,
                `childcategoryid` =?,
                `product_name` =?,
                `varient` = ?,
                `uptovalue` =?, 
                `status` = ?,
                `modify_date` = ?
            WHERE
                `vid` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("dsssssssi", $categoryId, $brandId, $seriesId, $productId, $varient, $varientPrice, $status, $nowDate, $varientId);
            $updateStmt->execute();
        
            // Fetch and return updated varient information
            $updatedVariant = $existingVariant; // Use the existing varient data
            $updatedVariant['categoryid'] = $categoryId;
            $updatedVariant['subcategoryid'] = $brandId;
            $updatedVariant['childcategoryid'] = $seriesId;
            $updatedVariant['product_name'] = $productId;
            $updatedVariant['varient'] = $varient;
            $updatedVariant['uptovalue'] = $varientPrice;
            $updatedVariant['status'] = $status; 
        
            return $updatedVariant;  
        } else {
            // Variant doesn't exist, insert it 
            // $insertQuery=  "INSERT INTO `varient` (`categoryid`,`subcatid`,`varient`,`status`)  VALUES(?,?,?,?)";
            $insertQuery = "INSERT INTO `tabletsvarient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`, `status`)
                             VALUES(?, ?, ?, ?, ?, ?, ?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("sssssss", $categoryId, $brandId, $seriesId, $productId, $varient, $varientPrice, $status);
 
            $insertStmt->execute();

            // Fetch and return inserted varient information
            $insertedVariantId = $insertStmt->insert_id;
            $insertedVariantQuery = "SELECT * FROM tabletsvarient WHERE vid = ?";
            $insertedVariantStmt = $this->conn->prepare($insertedVariantQuery);
            $insertedVariantStmt->bind_param("d", $insertedVariantId);
            $insertedVariantStmt->execute();
            $insertedVariantResult = $insertedVariantStmt->get_result();
            $insertedVariant = $insertedVariantResult->fetch_assoc();

            return $insertedVariant;
        }
    }
}

?>