<?php
function downloadImage($url, $localPath) {
    $contents = file_get_contents($url);
    file_put_contents($localPath, $contents);
}
class ProductManager
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function upsertProduct($getdata, $categoryId, $brandId, $seriesId)
    {
        
        // Get the full path to the current script
        $currentScriptPath = __FILE__;

        // Get the project directory by removing the script filename from the path
        $projectDirectory = dirname($currentScriptPath);

        // Define the full path to the background process PHP file
        $backgroundProcessFile =
            $projectDirectory . "/background_products_process.php";
            
        // Create a DateTime object from the input string
        $currentDateTimeObject = new DateTime(); //::createFromFormat('Y-m-d H:i:s.u', $inputString);

        // Format the DateTime object
        $nowDate = $currentDateTimeObject->format("Y-m-d H:i:s.u");
        // Check if the product already exists
        $modelName = trim($getdata["Model"]);
        $modelImage = isset($getdata["Model Image"])
            ? $getdata["Model Image"]
            : "";
        $urlComponents = parse_url($modelImage);
        $imageUrlStatus =
            $urlComponents !== false && isset($urlComponents["scheme"])
                ? "external"
                : "internal";
        $checkQuery =
            "SELECT * FROM `product` WHERE `product_name` = ? AND `subcategoryid` = ? AND  `categoryid` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("sss", $modelName, $brandId, $categoryId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Product exists, update it
            $existingProduct = $checkResult->fetch_assoc(); // Fetch existing product data
            $productId = $existingProduct["id"]; // Get the existing product ID
            $product_name =
                $modelName !== ""
                    ? $modelName
                    : $existingProduct["product_name"]; // Get the existing product ID
            $product_image =
                $modelImage !== ""
                    ? $modelImage
                    : $existingProduct["product_image"]; // Get the existing product ID

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
            $updateStmt->bind_param(
                "dssssssi",
                $categoryId,
                $brandId,
                $seriesId,
                $product_name,
                $product_image,
                $nowDate,
                $imageUrlStatus,
                $productId
            );
            $updateStmt->execute();

            // Fetch and return updated product information
            $updatedProduct = $existingProduct; // Use the existing product data
            $updatedProduct["categoryid"] = $categoryId;
            $updatedProduct["subcategoryid"] = $brandId;
            $updatedProduct["childcategoryid"] = $seriesId;
            $updatedProduct["product_name"] = $product_name;
            $updatedProduct["product_image"] = $product_image;
            if ($imageUrlStatus === "external") { 
                $modelName=strtolower(str_replace(" ", "_", $modelName));
                exec("/usr/bin/php $backgroundProcessFile $productId $modelImage $modelName > /dev/null 2>&1 &"); 
            }
            return $updatedProduct;
        } else {
            // Product doesn't exist, insert it
            $insertQuery =
                "INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`, `image_url`)  VALUES(?,?,?,?,?,?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param(
                "dssss",
                $categoryId,
                $brandId,
                $seriesId,
                $modelName,
                $modelImage,
                $imageUrlStatus
            );

            $insertStmt->execute();

            // Fetch and return inserted product information
            $insertedProductId = $insertStmt->insert_id;
            $insertedProductQuery = "SELECT * FROM product WHERE id = ?";
            $insertedProductStmt = $this->conn->prepare($insertedProductQuery);
            $insertedProductStmt->bind_param("d", $insertedProductId);
            $insertedProductStmt->execute();
            $insertedProductResult = $insertedProductStmt->get_result();
            $insertedProduct = $insertedProductResult->fetch_assoc();
            if ($imageUrlStatus === "external") { 
                $modelName=strtolower(str_replace(" ", "_", $modelName));
                exec("/usr/bin/php $backgroundProcessFile $insertedProductId $modelImage $modelName > /dev/null 2>&1 &"); 
            }
            return $insertedProduct;
        }
    }

    public function upsertProductId($getdata, $categoryId, $brandId, $seriesId)
    {
  
        
        // Get the full path to the current script
        $currentScriptPath = __FILE__;

        // Get the project directory by removing the script filename from the path
        $projectDirectory = dirname($currentScriptPath);

        // Define the full path to the background process PHP file
        $backgroundProcessFile =
            $projectDirectory . "/background_products_process.php";
        // Define the full path to the background process PHP file
        // $backgroundProcessFile = "/etc/background_process/background_products_process.php";

        // Create a DateTime object from the input string
        $currentDateTimeObject = new DateTime(); //::createFromFormat('Y-m-d H:i:s.u', $inputString);

        // Format the DateTime object
        $nowDate = $currentDateTimeObject->format("Y-m-d H:i:s.u");
        // Check if the product already exists

        $modelName = trim($getdata["Model Name"]);
        $id = isset($getdata["Model ID"]) ? (int) $getdata["Model ID"] : "";

        $modelImage = isset($getdata["Model Image"])
            ? $getdata["Model Image"]
            : "";

        $urlComponents = parse_url($modelImage);
        $imageUrlStatus =
            $urlComponents !== false && isset($urlComponents["scheme"])
                ? "external"
                : "internal";
        // "ALTER TABLE `subcategory` ADD `image_url` ENUM('external', 'internal') NOT NULL DEFAULT 'internal' AFTER `top`;
        // "

        $checkQuery =
            $id !== "" && $id !== null && $id > 0
                ? "SELECT * FROM `product` WHERE  `id` = ? "
                : "SELECT * FROM `product` WHERE `product_name` = ? AND `subcategoryid` = ? AND  `categoryid` = ?";

        // $checkQuery ="SELECT * FROM `product` WHERE `product_name` = ? AND `subcategoryid` = ? AND  `categoryid` = ?";
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
            $productId = $existingProduct["id"]; // Get the existing product ID

            $product_name =
                $modelName !== ""
                    ? $modelName
                    : $existingProduct["product_name"]; // Get the existing product ID
            $product_image =
                $modelImage !== ""
                    ? $modelImage
                    : $existingProduct["product_image"]; // Get the existing product ID

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
            $updateStmt->bind_param(
                "dssssssi",
                $categoryId,
                $brandId,
                $seriesId,
                $product_name,
                $product_image,
                $nowDate,
                $imageUrlStatus,
                $productId
            );
            $updateStmt->execute();

            // Fetch and return updated product information
            $updatedProduct = $existingProduct; // Use the existing product data
            $updatedProduct["categoryid"] = $categoryId;
            $updatedProduct["subcategoryid"] = $brandId;
            $updatedProduct["childcategoryid"] = $seriesId;
            $updatedProduct["product_name"] = $modelName = $product_name;
            $updatedProduct["product_image"] = $modelImage = $product_image;
            $updatedProduct["image_url"] = $imageUrlStatus;
            // echo "-----------------modelName-----------------".$modelName;
            if ($imageUrlStatus === "external") { 
                $modelName=strtolower(str_replace(" ", "_", $modelName));
                $command = "/usr/bin/php $backgroundProcessFile $productId $modelImage $modelName";

                // Execute the command
                // exec($command, $output, $returnVar);
                
                // // Output any error messages
                // if ($returnVar !== 0) {
                //     echo "-------Error----: " . implode("\n", $output);
                // }
                //  else {
                //     echo "Command executed successfully";
                //     echo "--<br/>-----successfully----: " . implode("\n", $output);
                // }

                
                 exec(
                    "/usr/bin/php $backgroundProcessFile $productId $modelImage $modelName > /dev/null 2>&1 &"
                ); 
            }
            return $updatedProduct;
        } else {
            // Product doesn't exist, insert it
            $insertQuery =
                "INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`, `image_url`)  VALUES(?,?,?,?,?,?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param(
                "dsssss",
                $categoryId,
                $brandId,
                $seriesId,
                $modelName,
                $modelImage,
                $imageUrlStatus
            );

            $insertStmt->execute();

            // Fetch and return inserted product information
            $insertedProductId = $insertStmt->insert_id;
            $insertedProductQuery = "SELECT * FROM product WHERE id = ?";
            $insertedProductStmt = $this->conn->prepare($insertedProductQuery);
            $insertedProductStmt->bind_param("d", $insertedProductId);
            $insertedProductStmt->execute();
            $insertedProductResult = $insertedProductStmt->get_result();
            $insertedProduct = $insertedProductResult->fetch_assoc();
            if ($imageUrlStatus === "external") {
                $modelName=strtolower(str_replace(" ", "_", $modelName));
                // echo "-------------------backgroundProcessFile------insert--------".$backgroundProcessFile;
                // Start background process to download the image and update the table
                // exec("/usr/bin/php $backgroundProcessFile $insertedProductId $modelImage $modelName", $output, $returnVar);
                $command = "/usr/bin/php $backgroundProcessFile $insertedProductId $modelImage $modelName";

                // Execute the command
                // exec($command, $output, $returnVar);
                
                // // Output any error messages
                // if ($returnVar !== 0) {
                //     echo "-------Error: " . implode("\n", $output);
                // }
                //  else {
                //     echo "Command executed successfully";
                // }
                 exec(
                    "/usr/bin/php $backgroundProcessFile $insertedProductId $modelImage $modelName >  3>&1 &"
                ); 
            }
            return $insertedProduct;
        }
    }
}

?>