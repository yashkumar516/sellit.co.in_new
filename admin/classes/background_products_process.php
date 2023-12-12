<?php
// background_process.php

if (isset($_SERVER["DB_PASSWORD"]) && !empty($_SERVER["DB_PASSWORD"])) {
    $dbHost = $_SERVER["DB_HOST"];
    $dbUsername = $_SERVER["DB_USERNAME"];
    $dbPassword = $_SERVER["DB_PASSWORD"];
    $dbDatabase = $_SERVER["DB_DATABASE"];
} else {
    $dbHost = "localhost";
    $dbUsername = "sellit";
    $dbPassword = "demo";
    $dbDatabase = "sellit";
}

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);
// Get the ID and image URL from the command line arguments
$productId = $argv[1];

// URL of the image you want to download
$urlImage = $argv[2];

// $productId $modelImage
// // Define the local directory for downloaded images
// $localDir = '/path/to/local/directory/';

// // Create a local filename based on the ID (you may want to sanitize this further)
// $localFileName = $lastInsertId . '_' . basename($imageUrl);

// // Download the image from the URL
// downloadImage($imageUrl, $localDir . $localFileName);

$imageUrlStatus = "internal"; //"external";

// Pattern for matching Google Drive file URLs with different query parameters
$pattern =
    "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";

// Replacement pattern
$replacement = "https://drive.google.com/uc?id=$1";

// Perform the replacement for the first URL
$imageUrl = preg_replace($pattern, $replacement, $urlImage);
// $imageUrl = 'https://example.com/path/to/image.jpg';

// Get the image content
$imageContent = file_get_contents($imageUrl);

if ($imageContent === false) {
    // Handle error, e.g., the image couldn't be retrieved
    die("Failed to fetch the image.");
}

// Specify the local directory path where you want to save the image
$localDirectory = __DIR__ . "../../img/external/";

// Create the directory if it doesn't exist
if (!is_dir($localDirectory)) {
    mkdir($localDirectory, 0777, true);
}

// Specify the local file path, combining the directory and file name
$localFilePath =
    $localDirectory .
    strtolower(str_replace(" ", "-", $row["product_name"])) .
    "_" .
    $productId .
    ".png";

    echo "-------------------localFilePath------insert--------".$localFilePath;
// Save the image content to a local file
file_put_contents($localFilePath, $imageContent);

// Check if the image was successfully saved
if ($imageContent !== false) {
    // echo 'Image downloaded successfully and saved to ' . $localFilePath;

    $product_image =
        "external/" .
        strtolower(str_replace(" ", "-", $row["product_name"])) .
        "_" .
        $productId .
        ".png"; // $modelImage !=="" ? $modelImage : $existingProduct['product_image']; // Get the existing product ID

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
    echo "Failed to save the image.";
}