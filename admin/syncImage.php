<?php include 'includes/confile.php' ?>
<?php
if (isset($_POST["syncImageModel"])) {
    $query = "SELECT  AS `id`, `product_image`, `product_name`   FROM `product` WHERE `image_url`='external'";
    $result = $con->query($query);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $productId = $row['id'];
            $urlImage = $row['product_image'];
            $modelName = $row['product_name'];

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
                $localDirectory . "/" . $modelName . "_" . $productId . ".png";

            try {
                echo "<br/>--------------------------------------        max_execution_time   -------------" . ini_get("max_execution_time");
                if (ini_get("allow_url_fopen")) {
                    // allow_url_fopen is enabled
                    // echo "<br/>--------------------------------------enabled-------------";
                } else {
                    // allow_url_fopen is disabled
                    echo "<br/>--------------------------------------disabled-------------";
                }
                $context = stream_context_create([
                    'http' => [
                        'timeout' => 50,
                    ],
                ]);


                // Use file_get_contents with the custom context
                $imageContent = file_get_contents($imageUrl, false, $context);

                // $imageContent = file_get_contents($imageUrl);
                if ($imageContent !== false) {
                    // Save the image to the local directory
                    file_put_contents($localFilePath, $imageContent);

                    $product_image = "drive/" . $modelName . "_" . $productId . ".png";

                    $updateQuery = "UPDATE product SET product_image = '$product_image', image_url = '$imageUrlStatus' WHERE id = $productId";
                    $con->query($updateQuery);

                    // echo "<br/>----------";
                    // echo "<br/>--------------------------------------product_image-------------".$product_image;
                } else {
                    // Output an error message
                    echo "<br/>-Failed to download the image from the URL: $imageUrl\n";
                }
            } catch (Exception $e) {
                error_log("<br/>----Error creating directory: " . $e->getMessage());
            }
        }
    } else {
        echo "Query failed: " . $con->error;
    }
}
// if(isset($_POST["uploadWithBrandCSV"]))