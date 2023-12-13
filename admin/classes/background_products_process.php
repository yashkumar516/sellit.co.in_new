<?php

$dbHost = "localhost";
$dbUsername = "sellit";
$dbPassword = "NqPTi#HY9A8wKM";
$dbDatabase = "stage_sellit";

ini_set('max_execution_time', 500);
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);

if (count($argv) < 4) {
    echo "Connected Error";
    die(
        "Usage: php background_products_process.php <productId> <modelImage> <modelName>\n"
    );
}

$productId = $argv[1];

// URL of the image you want to download
$urlImage = $argv[2];
$modelName = $argv[3];

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

    $localDirectory = "/var/www/stage.sellit.co.in/admin/img/drive";

    if (!is_dir($localDirectory)) {
        mkdir($localDirectory, 0775, true);
    }

    // Construct the local file path
    $localFilePath =
        $localDirectory .
        "/" .$modelName .
        "_" .
        $productId .
        ".png";

    try {
        if (ini_get("allow_url_fopen")) {
            // allow_url_fopen is enabled
    echo "<br/>--------------------------------------enabled-------------" ;
        } else {
            // allow_url_fopen is disabled
    echo "<br/>--------------------------------------disabled-------------" ;
        }
        // Download the image and save it locally
        // $context = stream_context_create(['http' => ['user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3']]);
        // $imageContent = file_get_contents($imageUrl, false, $context);

        // $maxRetries = 3;
        // $retryCount = 0;

        // while ($retryCount < $maxRetries) {
        //     $imageContent = file_get_contents($imageUrl);

        //     if ($imageContent !== false) {
        //         // Successfully fetched the image content
        //         break;
        //     }

        //     // Increment the retry count
        //     $retryCount++;
        // }
        $imageContent = file_get_contents($imageUrl); 
        if ($imageContent !== false) {
            // Save the image to the local directory
            file_put_contents($localFilePath, $imageContent);

            $product_image =
                "drive/" .$modelName.
                "_" .
                $productId .
                ".png";

            $updateQuery = "UPDATE product SET product_image = '$product_image', image_url = '$imageUrlStatus' WHERE id = $productId";
            $conn->query($updateQuery);
            
    // echo "<br/>----------";
    echo "<br/>--------------------------------------product_image-------------".$product_image;
        } else {
            // Output an error message
            echo "<br/>-Failed to download the image from the URL: $imageUrl\n";
        }
    } catch (Exception $e) {
        error_log("<br/>----Error creating directory: " . $e->getMessage());
    }
}
?>