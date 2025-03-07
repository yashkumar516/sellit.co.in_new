<?php

if (count($argv) < 9) {
    echo "Connected Error";
    die("Usage: php background_products_process.php <productId> <modelImage> <modelName> <dbHost> <dbUsername> <dbPassword> <dbDatabase> <dirNameProject>\n");
}
set_time_limit(100);
ini_set("max_execution_time", 5000);

$productId = $argv[1];

// URL of the image you want to download
$urlImage = $argv[2];
$modelName = $argv[3];

$dbHost = $argv[4];
$dbUsername = $argv[5];
$dbPassword = $argv[6];
$dbDatabase = $argv[7];
$dirNameProject = $argv[8];

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);
if ($conn->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
    echo "DB Connected failed \n";
} else {
    // echo "<br/>----------";

    $imageUrlStatus = "internal"; //"external";

    // Pattern for matching Google Drive file URLs with different query parameters
    $pattern =
        "/https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/";

    // Replacement pattern
    $replacement = "https://drive.google.com/uc?id=$1";

    // Perform the replacement for the first URL
    $imageUrl = preg_replace($pattern, $replacement, $urlImage);

    $localDirectory = "/var/www/" . $dirNameProject . "/admin/img/drive";

    if (!is_dir($localDirectory)) {
        mkdir($localDirectory, 0775, true);
    }

    // Construct the local file path
    $localFilePath =
        $localDirectory . "/" . $modelName . "_" . $productId . ".jpg";

    try {
        // echo "<br/>--------------------------------------        max_execution_time   -------------" . ini_get("max_execution_time");
        if (ini_get("allow_url_fopen")) {
            // allow_url_fopen is enabled
            echo "<br/>--------------------------------------enabled-------------";
        } else {
            // allow_url_fopen is disabled
            echo "<br/>--------------------------------------disabled-------------";
        }
        $context = stream_context_create([
            'http' => [
                'timeout' => 100,
            ],
        ]);

        // Replace $imageUrl with the actual image URL
        // $imageUrl = "https://drive.google.com/uc?id=YOUR_FILE_ID";

        // Use file_get_contents with the custom context
        $imageContent = file_get_contents($imageUrl, false, $context);

        // $imageContent = file_get_contents($imageUrl);
        if ($imageContent !== false) {
            // Save the image to the local directory
            file_put_contents($localFilePath, $imageContent);

            $product_image = "drive/" . $modelName . "_" . $productId . ".jpg";

            $updateQuery = "UPDATE product SET product_image = '$product_image', image_url = '$imageUrlStatus' WHERE id = $productId";
            $conn->query($updateQuery);

            // echo "<br/>----------";
            echo "<br/>--------------------------------------localFilePath-------------".$localFilePath;
        } else {
            // Output an error message
            echo "<br/>-Failed to download the image from the URL: $imageUrl\n";
        }
    } catch (Exception $e) {
        error_log("<br/>----Error creating directory: " . $e->getMessage());
    }
    // mysqli_close($conn);
}