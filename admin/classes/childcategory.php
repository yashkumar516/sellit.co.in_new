<?php

class ChildCategoryManager {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function upsertChildCategory($getdata, $categoryId, $brandId) {
        // Check if the childcategory already exists 
        $seriesName = trim($getdata["Series"]); 
        $status="active";
        $checkQuery ="SELECT * FROM `childcategory` WHERE `childcategory` = ? AND `subcatid` = ? AND  `categoryid` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("sss", $seriesName, $brandId, $categoryId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // ChildCategory exists, update it
            $existingChildCategory = $checkResult->fetch_assoc(); // Fetch existing childcategory data
            $childcategoryId = $existingChildCategory['id']; // Get the existing childcategory ID
            
            $updateQuery = " UPDATE `childcategory`
            SET
                `categoryid` = ?,
                `subcatid` = ?,
                `childcategory` = ?,
                `status` = ?
            WHERE
                `id` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("ssssi", $categoryId, $brandId, $seriesName, $status, $childcategoryId);
            $updateStmt->execute();
        
            // Fetch and return updated childcategory information
            $updatedChildCategory = $existingChildCategory; // Use the existing childcategory data
            $updatedChildCategory['categoryid'] = $categoryId;
            $updatedChildCategory['subcatid'] = $brandId;
            $updatedChildCategory['childcategory'] = $seriesName;
            $updatedChildCategory['status'] = $status; 
        
            return $updatedChildCategory;  
        } else {
            // ChildCategory doesn't exist, insert it 
            $insertQuery=  "INSERT INTO `childcategory` (`categoryid`,`subcatid`,`childcategory`,`status`)  VALUES(?,?,?,?)";
         
            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("dsss", $categoryId, $brandId, $seriesName, $status);
          
            $insertStmt->execute();

            // Fetch and return inserted childcategory information
            $insertedChildCategoryId = $insertStmt->insert_id;
            $insertedChildCategoryQuery = "SELECT * FROM childcategory WHERE id = ?";
            $insertedChildCategoryStmt = $this->conn->prepare($insertedChildCategoryQuery);
            $insertedChildCategoryStmt->bind_param("d", $insertedChildCategoryId);
            $insertedChildCategoryStmt->execute();
            $insertedChildCategoryResult = $insertedChildCategoryStmt->get_result();
            $insertedChildCategory = $insertedChildCategoryResult->fetch_assoc();

            return $insertedChildCategory;
        }
    }
}

?>