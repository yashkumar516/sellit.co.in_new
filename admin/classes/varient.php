<?php

class VarientManager {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function upsertVarient($getdata, $categoryId, $productId, $brandId, $seriesId) {
        // Check if the varient already exists 
        $varient = trim($getdata["Varient"]); 
        $varientPrice = trim($getdata["Varient Price"]); 
        $status="active";
        $checkQuery ="SELECT * FROM `varient` WHERE `product_name` = ? AND `varient` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("ss", $productId, $varient);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Varient exists, update it
            $existingVarient = $checkResult->fetch_assoc(); // Fetch existing varient data
            $varientId = $existingVarient['id']; // Get the existing varient ID
            
            $updateQuery = " UPDATE `varient`
            SET
                `categoryid` = ?,
                `subcategoryid` = ?,
                `childcategoryid` =?,
                `product_name` =?,
                `varient` = ?,
                `uptovalue` =?, 
                `status` = ?
            WHERE
                `id` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("dssssssi", $categoryId, $brandId, $seriesId, $productId, $varient, $varientPrice, $status, $varientId);
            $updateStmt->execute();
        
            // Fetch and return updated varient information
            $updatedVarient = $existingVarient; // Use the existing varient data
            $updatedVarient['categoryid'] = $categoryId;
            $updatedVarient['subcategoryid'] = $brandId;
            $updatedVarient['childcategoryid'] = $seriesId;
            $updatedVarient['product_name'] = $productId;
            $updatedVarient['varient'] = $varient;
            $updatedVarient['uptovalue'] = $varientPrice;
            $updatedVarient['status'] = $status; 
        
            return $updatedVarient;  
        } else {
            // Varient doesn't exist, insert it 
            // $insertQuery=  "INSERT INTO `varient` (`categoryid`,`subcatid`,`varient`,`status`)  VALUES(?,?,?,?)";
            $insertQuery = "INSERT INTO `varient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`, `status`)
                             VALUES(?, ?, ?, ?, ?, ?, ?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("sssssss", $categoryId, $brandId, $seriesId, $productId, $varient, $varientPrice, $status);
 
            $insertStmt->execute();

            // Fetch and return inserted varient information
            $insertedVarientId = $insertStmt->insert_id;
            $insertedVarientQuery = "SELECT * FROM varient WHERE id = ?";
            $insertedVarientStmt = $this->conn->prepare($insertedVarientQuery);
            $insertedVarientStmt->bind_param("d", $insertedVarientId);
            $insertedVarientStmt->execute();
            $insertedVarientResult = $insertedVarientStmt->get_result();
            $insertedVarient = $insertedVarientResult->fetch_assoc();

            return $insertedVarient;
        }
    }
}

?>