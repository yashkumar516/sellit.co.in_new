<?php

class ProductManager {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function upsertProduct($getdata, $categoryId, $brandId, $seriesId) {
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);

        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
        // Check if the product already exists 
        $modelName = trim($getdata["Model"]);
        $modelImage = isset($getdata["Model Image"])?$getdata["Model Image"]:"";
        $urlComponents = parse_url($modelImage); 
        $imageUrlStatus = $urlComponents !== false && isset($urlComponents['scheme'])?"external": "internal";
        $checkQuery ="SELECT * FROM `product` WHERE `product_name` = ? AND `subcategoryid` = ? AND  `categoryid` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("sss", $modelName, $brandId, $categoryId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Product exists, update it
            $existingProduct = $checkResult->fetch_assoc(); // Fetch existing product data
            $productId = $existingProduct['id']; // Get the existing product ID
            $product_name = $modelName !=="" ? $modelName : $existingProduct['product_name']; // Get the existing product ID
            $product_image = $modelImage !=="" ? $modelImage : $existingProduct['product_image']; // Get the existing product ID
           
            $updateQuery = " UPDATE `product`
            SET
                `categoryid` = ?,
                `subcategoryid` = ?,
                `childcategoryid` = ?,
                `product_name` = ?,
                `product_image` = ?,
                `modify_date` = ?,
                `image_url` = ?
            WHERE
                `id` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("dssssssi", $categoryId, $brandId, $seriesId, $product_name, $product_image, $nowDate, $imageUrlStatus, $productId);
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
            $insertQuery=  "INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`, `image_url`)  VALUES(?,?,?,?,?,?)";
         
            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("dssss", $categoryId, $brandId, $seriesId, $modelName, $modelImage, $imageUrlStatus);
          
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
    
    public function upsertProductId($getdata, $categoryId, $brandId, $seriesId) {
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);

        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
        // Check if the product already exists 

        
        $modelName = trim($getdata["Model Name"]);
        $id =isset($getdata["Model ID"])? (int)$getdata["Model ID"]:"";  
     
        $modelImage = isset($getdata["Model Image"])?$getdata["Model Image"]:"";
         
        $urlComponents = parse_url($modelImage); 
        $imageUrlStatus = $urlComponents !== false && isset($urlComponents['scheme'])?"external": "internal";
        // "ALTER TABLE `subcategory` ADD `image_url` ENUM('external', 'internal') NOT NULL DEFAULT 'internal' AFTER `top`;
        // "
         
        $checkQuery = $id!=="" && $id!==null && $id>0? "SELECT * FROM `product` WHERE  `id` = ? ":"SELECT * FROM `product` WHERE `product_name` = ? AND `subcategoryid` = ? AND  `categoryid` = ?";
       
        // $checkQuery ="SELECT * FROM `product` WHERE `product_name` = ? AND `subcategoryid` = ? AND  `categoryid` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkId=$id!=="" && $id!==null && $id>0?$id:$modelName;
        
        $checkStmt = $this->conn->prepare($checkQuery);
        if($id!=="" && $id!==null && $id>0){
            $checkStmt->bind_param("s", $checkId);
        } else{
            $checkStmt->bind_param("sss", $checkId, $brandId, $categoryId);
        }

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Product exists, update it
            $existingProduct = $checkResult->fetch_assoc(); // Fetch existing product data
            $productId = $existingProduct['id']; // Get the existing product ID
            
            $product_name = $modelName !=="" ? $modelName : $existingProduct['product_name']; // Get the existing product ID
            $product_image = $modelImage !=="" ? $modelImage : $existingProduct['product_image']; // Get the existing product ID
            
            $updateQuery = " UPDATE `product`
            SET
                `categoryid` = ?,
                `subcategoryid` = ?,
                `childcategoryid` = ?,
                `product_name` = ?,
                `product_image` = ?,
                `modify_date` = ?,
                `image_url`=?
            WHERE
                `id` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("dssssssi", $categoryId, $brandId, $seriesId, $product_name, $product_image, $nowDate, $imageUrlStatus, $productId);
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
            $insertQuery=  "INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`, `image_url`)  VALUES(?,?,?,?,?,?)";
         
            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("dsssss", $categoryId, $brandId, $seriesId, $modelName, $modelImage, $imageUrlStatus);
          
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