<?php

class VariantManager {
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
        $checkQuery ="SELECT * FROM `varient` WHERE `product_name` = ? AND `varient` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("ss", $productId, $varient);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Variant exists, update it
            $existingVariant = $checkResult->fetch_assoc(); // Fetch existing varient data
            $varientId = $existingVariant['id']; // Get the existing varient ID
            
            $updateQuery = " UPDATE `varient`
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
                `id` = ?
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
            $insertQuery = "INSERT INTO `varient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`, `status`)
                             VALUES(?, ?, ?, ?, ?, ?, ?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("sssssss", $categoryId, $brandId, $seriesId, $productId, $varient, $varientPrice, $status);
 
            $insertStmt->execute();

            // Fetch and return inserted varient information
            $insertedVariantId = $insertStmt->insert_id;
            $insertedVariantQuery = "SELECT * FROM varient WHERE id = ?";
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
        $id =isset($getdata["Variant ID"])? (int)$getdata["Variant ID"]:"";  
        
        $checkQuery = $id!=="" && $id!==null && $id>0? "SELECT * FROM `varient` WHERE  `id` = ?":"SELECT * FROM `varient` WHERE `product_name` = ? AND `varient` = ?";
       
        // $checkQuery ="SELECT * FROM `varient` WHERE `product_name` = ? AND `varient` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkId=$id!=="" && $id!==null && $id>0?$id:$varient;
        // $checkStmt->bind_param("ss", $productId, $checkId);
        if($id!=="" && $id!==null && $id>0){ 
            $checkStmt->bind_param("s", $checkId);
        } else{
            $checkStmt->bind_param("ss", $productId, $checkId);
        }
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Variant exists, update it
            $existingVariant = $checkResult->fetch_assoc(); // Fetch existing varient data
            $varientId = $existingVariant['id']; // Get the existing varient ID
             
            $updateQuery = " UPDATE `varient`
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
                `id` = ?
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
            $insertQuery = "INSERT INTO `varient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`, `status`)
                             VALUES(?, ?, ?, ?, ?, ?, ?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("sssssss", $categoryId, $brandId, $seriesId, $productId, $varient, $varientPrice, $status);
 
            $insertStmt->execute();

            // Fetch and return inserted varient information
            $insertedVariantId = $insertStmt->insert_id;
            $insertedVariantQuery = "SELECT * FROM varient WHERE id = ?";
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