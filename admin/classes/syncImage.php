<?php

class SyncImageManager {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function syncBrandImage() {
        $imageUrlStatus1 =  "external";//"external";
        $imageUrlStatus =  "internal";//"external";
        echo "--------------------------<br/>-----------subcategory_name----------------------------------";
        echo "--------------------------<br/>-----------subcategory_name----------------------------------";
        echo "--------------------------<br/>-----------subcategory_name----------------------------------";
        echo "--------------------------<br/>-----------subcategory_name----------------------------------";
          
        $query = "SELECT * FROM `subcategory` WHERE `image_url` = ? ORDER BY `id` ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $imageUrlStatus1);
        $stmt->execute();

        $result = $stmt->get_result();
        $subcategories = [];

        while ($row = $result->fetch_assoc()) {
            // $subcategories[] = $row;
            $subcategoryId = $row['id']; // Get the existing product ID
           
 
            // URL of the image you want to download
            $urlImage = $row['subcategory_image'];
                
            echo "--------------------------<br/>-----------subcategory_name----------------------------------".$row['subcategory_name'];
            echo "--------------------------<br/>-------------------------------subcategory_image------------".$urlImage;
            // Pattern for matching Google Drive file URLs with different query parameters
            $pattern = "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";
            
            // Replacement pattern
            $replacement = "https://drive.google.com/uc?id=$1";
            
            // Perform the replacement for the first URL
            $imageUrl = preg_replace($pattern, $replacement, $urlImage);
            echo "--------------------------<br/>--------imageUrl----------".$imageUrl;
            // $imageUrl = 'https://example.com/path/to/image.jpg';

            // Get the image content
            $imageContent = file_get_contents($imageUrl);
            
            if ($imageContent === false) {
                // Handle error, e.g., the image couldn't be retrieved
                die('Failed to fetch the image.');
            }
            
            // Specify the local directory path where you want to save the image
            $localDirectory = __DIR__.'../../img/external/';
            
            // Create the directory if it doesn't exist
            if (!is_dir($localDirectory)) {
                mkdir($localDirectory, 0777, true);
            }
            
            // Specify the local file path, combining the directory and file name
            $localFilePath = $localDirectory . strtolower(str_replace(' ','_',$row['subcategory_name'])).'_'.$subcategoryId .'.png';
            
            // Save the image content to a local file
            file_put_contents($localFilePath, $imageContent);
            
            // Check if the image was successfully saved
            if ($imageContent !== false) {
                echo 'Image downloaded successfully and saved to ' . $localFilePath;
                

            $subcategory_image = "external/".strtolower(str_replace(' ','_',$row['subcategory_name'])).'_'.$subcategoryId .'.png';// $modelImage !=="" ? $modelImage : $existingProduct['product_image']; // Get the existing product ID
           
            $updateQuery = " UPDATE `subcategory`
            SET
                `subcategory_image` = ?, 
                `image_url` = ?
            WHERE
                `id` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("ssi", $subcategory_image, $imageUrlStatus, $subcategoryId);
            $updateStmt->execute();
            } else {
                // Handle error, e.g., the image couldn't be saved
                echo 'Failed to save the image.';
            }
           
        }

        return $subcategories;    
    }
    public function syncBrandImageByRow($row) { 
        $imageUrlStatus =  "internal";//"external";
        
        // $subcategories[] = $row;
        $subcategoryId = $row['id']; // Get the existing product ID
        // URL of the image you want to download
        $urlImage = $row['subcategory_image'];

        // Pattern for matching Google Drive file URLs with different query parameters
        $pattern = "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";
        
        // Replacement pattern
        $replacement = "https://drive.google.com/uc?id=$1";
        
        // Perform the replacement for the first URL
        $imageUrl = preg_replace($pattern, $replacement, $urlImage);
 
        // Get the image content
        $imageContent = file_get_contents($imageUrl);
        
        if ($imageContent === false) {
            // Handle error, e.g., the image couldn't be retrieved
            die('Failed to fetch the image.');
        }
        
        // Specify the local directory path where you want to save the image
        $localDirectory = __DIR__.'../../img/external/';
        
        // Create the directory if it doesn't exist
        if (!is_dir($localDirectory)) {
            mkdir($localDirectory, 0777, true);
        }
        
        // Specify the local file path, combining the directory and file name
        $localFilePath = $localDirectory . strtolower(str_replace(' ','_',$row['subcategory_name'])).'_'.$subcategoryId .'.png';
        
        // Save the image content to a local file
        file_put_contents($localFilePath, $imageContent);
        
        // Check if the image was successfully saved
        if ($imageContent !== false) {
            // echo 'Image downloaded successfully and saved to ' . $localFilePath;
            

        $subcategory_image = "external/".strtolower(str_replace(' ','_',$row['subcategory_name'])).'_'.$subcategoryId .'.png';// $modelImage !=="" ? $modelImage : $existingProduct['product_image']; // Get the existing product ID
        
        $updateQuery = " UPDATE `subcategory`
        SET
            `subcategory_image` = ?, 
            `image_url` = ?
        WHERE
            `id` = ?
        ";
        $updateStmt = $this->conn->prepare($updateQuery);
        $updateStmt->bind_param("ssi", $subcategory_image, $imageUrlStatus, $subcategoryId);
        $updateStmt->execute();
        } else {
            // Handle error, e.g., the image couldn't be saved
            echo 'Failed to save the image.';
        }
        
        return;
    }

    public function syncProductImageByRow($row) {
        ini_set('max_execution_time', 300);

        $imageUrlStatus =  "internal";//"external";

        // $subcategories[] = $row;
        $productId = $row['id']; // Get the existing product ID
        
        // URL of the image you want to download
        $urlImage = $row['product_image'];
        
        // Pattern for matching Google Drive file URLs with different query parameters
        $pattern = "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";
        
        // Replacement pattern
        $replacement = "https://drive.google.com/uc?id=$1";
        
        // Perform the replacement for the first URL
        $imageUrl = preg_replace($pattern, $replacement, $urlImage);
        // $imageUrl = 'https://example.com/path/to/image.jpg';

        // Get the image content
        $imageContent = file_get_contents($imageUrl);
        
        if ($imageContent === false) {
            // Handle error, e.g., the image couldn't be retrieved
            die('Failed to fetch the image.');
        }
        
        // Specify the local directory path where you want to save the image
        $localDirectory = __DIR__.'../../img/external/';
        
        // Create the directory if it doesn't exist
        if (!is_dir($localDirectory)) {
            mkdir($localDirectory, 0777, true);
        }
        
        // Specify the local file path, combining the directory and file name
        $localFilePath = $localDirectory . strtolower(str_replace(' ','-',$row['product_name'])).'_'.$productId .'.png';
        
        // Save the image content to a local file
        file_put_contents($localFilePath, $imageContent);
        
        // Check if the image was successfully saved
        if ($imageContent !== false) {
            // echo 'Image downloaded successfully and saved to ' . $localFilePath;
            

        $product_image = "external/".strtolower(str_replace(' ','-',$row['product_name'])).'_'.$productId .'.png';// $modelImage !=="" ? $modelImage : $existingProduct['product_image']; // Get the existing product ID
        
        $updateQuery = " UPDATE `product`
        SET
            `product_image` = ?, 
            `image_url` = ?
        WHERE
            `id` = ?
        ";
        $updateStmt = $this->conn->prepare($updateQuery);
        $updateStmt->bind_param("ssi", $product_image, $imageUrlStatus, $productId);
        $updateStmt->execute();
        } else {
            // Handle error, e.g., the image couldn't be saved
            echo 'Failed to save the image.';
        }
        return;
        
    }

    
    public function syncProductImage() {
        $imageUrlStatus =  "internal";//"external";

        $query = "SELECT * FROM `product` WHERE `image_url` = ? ORDER BY `id` ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", "external");
        $stmt->execute();

        $result = $stmt->get_result();
        // $subcategories = [];

        while ($row = $result->fetch_assoc()) {
            // $subcategories[] = $row;
            $productId = $row['id']; // Get the existing product ID
           
 
            // URL of the image you want to download
            $urlImage = $row['product_image'];
            
                
            // Pattern for matching Google Drive file URLs with different query parameters
            $pattern = "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";
            
            // Replacement pattern
            $replacement = "https://drive.google.com/uc?id=$1";
            
            // Perform the replacement for the first URL
            $imageUrl = preg_replace($pattern, $replacement, $urlImage);
            // $imageUrl = 'https://example.com/path/to/image.jpg';

            // Get the image content
            $imageContent = file_get_contents($imageUrl);
            
            if ($imageContent === false) {
                // Handle error, e.g., the image couldn't be retrieved
                die('Failed to fetch the image.');
            }
            
            // Specify the local directory path where you want to save the image
            $localDirectory = __DIR__.'../../img/external/';
            
            // Create the directory if it doesn't exist
            if (!is_dir($localDirectory)) {
                mkdir($localDirectory, 0777, true);
            }
            
            // Specify the local file path, combining the directory and file name
            $localFilePath = $localDirectory . strtolower(str_replace(' ','-',$row['product_name'])).'_'.$productId .'.png';
            
            // Save the image content to a local file
            file_put_contents($localFilePath, $imageContent);
            
            // Check if the image was successfully saved
            if ($imageContent !== false) {
                echo 'Image downloaded successfully and saved to ' . $localFilePath;
                

            $product_image = "external/".strtolower(str_replace(' ','-',$row['product_name'])).'_'.$productId .'.png';// $modelImage !=="" ? $modelImage : $existingProduct['product_image']; // Get the existing product ID
           
            $updateQuery = " UPDATE `product`
            SET
                `product_image` = ?, 
                `image_url` = ?
            WHERE
                `id` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("ssi", $product_image, $imageUrlStatus, $productId);
            $updateStmt->execute();
            } else {
                // Handle error, e.g., the image couldn't be saved
                echo 'Failed to save the image.';
            }
           
        }

        return;    
    }
    
    public function syncProductImage2() {
        $imageUrlStatus =  "internal";//"external";
        $checkQuery ="SELECT * FROM `product` WHERE `image_url` = ? AND `subcategoryid` = ? AND  `categoryid` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("s", "external");

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Product exists, update it
            $existingProduct = $checkResult->fetch_assoc(); // Fetch existing product data
            $productId = $existingProduct['id']; // Get the existing product ID
           
 
            // URL of the image you want to download
            $imageUrl = $existingProduct['product_image'];
            
            // $imageUrl = 'https://example.com/path/to/image.jpg';

            // Get the image content
            $imageContent = file_get_contents($imageUrl);
            
            if ($imageContent === false) {
                // Handle error, e.g., the image couldn't be retrieved
                die('Failed to fetch the image.');
            }
            
            // Specify the local directory path where you want to save the image
            $localDirectory = '/admin/image/external/';
            
            // Create the directory if it doesn't exist
            if (!is_dir($localDirectory)) {
                mkdir($localDirectory, 0777, true);
            }
            
            // Specify the local file path, combining the directory and file name
            $localFilePath = $localDirectory . $existingProduct['product_image'].'_'.$productId .'.png';
            
            // Save the image content to a local file
            file_put_contents($localFilePath, $imageContent);
            
            // Check if the image was successfully saved
            if ($imageContent !== false) {
                echo 'Image downloaded successfully and saved to ' . $localFilePath;
                

            $product_image = "external/".$existingProduct['product_image'].'_'.$productId .'.png';// $modelImage !=="" ? $modelImage : $existingProduct['product_image']; // Get the existing product ID
           
            $updateQuery = " UPDATE `product`
            SET
                `product_image` = ?, 
                `image_url` = ?
            WHERE
                `id` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("ssi", $product_image, $imageUrlStatus, $productId);
            $updateStmt->execute();
            } else {
                // Handle error, e.g., the image couldn't be saved
                echo 'Failed to save the image.';
            }
        }     
    }
     
}

?>