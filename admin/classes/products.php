<?php

class ProductManager {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function upsertProduct($getdata, $categoryId, $brandId, $seriesId) {
        // Check if the product already exists 
        $modelName = trim($getdata["Model"]);
        $modelImage = $getdata["Model Image"]; 
        $checkQuery ="SELECT * FROM `product` WHERE `product_name` = ? AND `subcategoryid` = ? AND  `categoryid` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("sss", $modelName, $brandId, $categoryId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Product exists, update it
            $existingProduct = $checkResult->fetch_assoc(); // Fetch existing product data
            $productId = $existingProduct['id']; // Get the existing product ID
            
            $updateQuery = " UPDATE `product`
            SET
                `categoryid` = ?,
                `subcategoryid` = ?,
                `childcategoryid` = ?,
                `product_name` = ?,
                `product_image` = ?
            WHERE
                `id` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("dssssi", $categoryId, $brandId, $seriesId, $modelName, $modelImage, $productId);
            $updateStmt->execute();
        
            // Fetch and return updated product information
            $updatedProduct = $existingProduct; // Use the existing product data
            $updatedProduct['categoryid'] = $categoryId;
            $updatedProduct['subcategoryid'] = $brandId;
            $updatedProduct['childcategoryid'] = $seriesId;
            $updatedProduct['product_name'] = $modelName;
            $updatedProduct['product_image'] = $modelImage;
        
            return $updatedProduct;  
        } else {
            // Product doesn't exist, insert it 
            $insertQuery=  "INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`)  VALUES(?,?,?,?,?)";
         
            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("dssss", $categoryId, $brandId, $seriesId, $modelName, $modelImage);
          
            $insertStmt->execute();

            // Fetch and return inserted product information
            $insertedProductId = $insertStmt->insert_id;
            $insertedProductQuery = "SELECT * FROM product WHERE id = ?";
            $insertedProductStmt = $this->conn->prepare($insertedProductQuery);
            $insertedProductStmt->bind_param("d", $insertedProductId);
            $insertedProductStmt->execute();
            $insertedProductResult = $insertedProductStmt->get_result();
            $insertedProduct = $insertedProductResult->fetch_assoc();

            return $insertedProduct;
        }
    }
}

?>