<?php

class SubCategoryManager {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function upsertSubcategory($getdata, $categoryId) {
        // Check if the product already exists 
       
        $brandName = trim($getdata[0]);
        $brandImage = $getdata[1];
        
        $callvalue = $getdata[25];
        $threemonths = $getdata[26];
        $threeto6months = $getdata[27];
        $sixto11months = $getdata[28];
        $above11 = $getdata[29];
        $touchscreen = $getdata[30];
        $largespot = $getdata[31];
        $multiplespot = $getdata[32];
        $minorspot = $getdata[33];
        $nospot = $getdata[34];
        $displayfade = $getdata[35];
        $multilines = $getdata[36];
        $nolines = $getdata[37];
        $crackedscreen = $getdata[38];
        $damegescreen = $getdata[39];
        $heavyscracthes = $getdata[40];
        $scratches12 = $getdata[41];
        $noscratches = $getdata[42];
        // body questions starts
        $majorscratch = $getdata[43];
        $bodyscratches2 = $getdata[44];
        $nobodysratches = $getdata[45];
        $heavydents = $getdata[46];
        $dents2 = $getdata[47];
        $nodents = $getdata[48];
        $crackedsideback = $getdata[49];
        $missingsideback = $getdata[50];
        $nodefectssideback = $getdata[51];
        $bentcurvedpanel = $getdata[52];
        $loosescreen = $getdata[53];
        $nobents = $getdata[54];
        // accessries questions
        $charger = $getdata[55];
        $earphone = $getdata[56];
        $boximei = $getdata[57];
        $billimei = $getdata[58];
      
        $checkQuery ="SELECT * FROM `subcategory` WHERE `subcategory_name` = ? AND  `category_id` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("ss", $brandName, $categoryId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Subcategory exists, update it
            $existingSubcategory = $checkResult->fetch_assoc(); // Fetch existing product data
            $brandId = $existingSubcategory['id']; // Get the existing product ID
            $updateQuery = "UPDATE `subcategory`
                        SET 
                            `category_id` = ?,
                            `subcategory_name` = ?,
                            `subcategory_image` = ?,
                            `callvalue` = ?,
                            `3months` = ?,
                            `3to6months` = ?,
                            `6to11months` = ?,
                            `above11` = ?,
                            `touchscreen` = ?,
                            `largespot` = ?,
                            `multiplespot` = ?,
                            `minorspot` = ?,
                            `nospot` = ?,
                            `displayfade` = ?,
                            `multilines` = ?,
                            `nolines` = ?,
                            `crackedscreen` = ?,
                            `damegescreen` = ?,
                            `heavyscracthes` = ?,
                            `12scratches` = ?,
                            `noscratches` = ?,
                            `majorscratch` = ?,
                            `2bodyscratches` = ?,
                            `nobodysratches` = ?,
                            `heavydents` = ?,
                            `2dents` = ?,
                            `nodents` = ?,
                            `crackedsideback` = ?,
                            `missingsideback` = ?,
                            `nodefectssideback` = ?,
                            `bentcurvedpanel` = ?,
                            `loosescreen` = ?,
                            `nobents` = ?,
                            `charger` = ?,
                            `earphone` = ?,
                            `boximei` = ?,
                            `billimei` = ?
                        WHERE
                            `id` = ?";

        $updateStmt = $this->conn->prepare($updateQuery);
        $updateStmt->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $categoryId,  $brandName, $brandImage, $callvalue, $threemonths, $threeto6months, $sixto11months, $above11, $touchscreen, $largespot, $multiplespot, $minorspot, $nospot, $displayfade, $multilines, $nolines, $crackedscreen, $damegescreen, $heavyscracthes, $scratches12, $noscratches, $majorscratch, $bodyscratches2, $nobodysratches, $heavydents, $dents2, $nodents, $crackedsideback, $missingsideback, $nodefectssideback, $bentcurvedpanel, $loosescreen, $nobents, $charger, $earphone, $boximei, $billimei, $brandId);

            $updateStmt->execute();
        
            // Fetch and return updated product information
            // $updatedSubcategory = $existingSubcategory; // Use the existing product data
        
            // Fetch and return inserted product information
            // $insertedSubcategoryId = $insertStmt->insert_id;
            $updatedSubcategoryQuery = "SELECT * FROM subcategory WHERE id = ?";
            $updatedSubcategoryStmt = $this->conn->prepare($updatedSubcategoryQuery);
            $updatedSubcategoryStmt->bind_param("d", $brandId);
            $updatedSubcategoryStmt->execute();
            $updatedSubcategoryResult = $updatedSubcategoryStmt->get_result();
            $updateSubcategory = $updatedSubcategoryResult->fetch_assoc();

            return $updateSubcategory;
        } else {
            // Subcategory doesn't exist, insert it 
                         
            $insertQuery = "INSERT INTO `subcategory` (`category_id`,`subcategory_name`,`subcategory_image`,`callvalue`,`3months`,`3to6months`,`6to11months`,
            `above11`,`touchscreen`,`largespot`,`multiplespot`,`minorspot`,`nospot`,`displayfade`,`multilines`,`nolines`,`crackedscreen`,`damegescreen`,`heavyscracthes`,
            `12scratches`,`noscratches`,`majorscratch`,`2bodyscratches`,`nobodysratches`,`heavydents`,`2dents`,`nodents`,`crackedsideback`,`missingsideback`,`nodefectssideback`,`bentcurvedpanel`,
            `loosescreen`,`nobents`,`charger`,`earphone`,`boximei`,`billimei`)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $categoryId, $brandName, $brandImage, $callvalue, $threemonths, $threeto6months, $sixto11months, $above11, $touchscreen, $largespot, $multiplespot, $minorspot, $nospot, $displayfade, $multilines, $nolines, $crackedscreen, $damegescreen, $heavyscracthes, $scratches12, $noscratches, $majorscratch, $bodyscratches2, $nobodysratches, $heavydents, $dents2, $nodents, $crackedsideback, $missingsideback, $nodefectssideback, $bentcurvedpanel, $loosescreen, $nobents, $charger, $earphone, $boximei, $billimei);

            $insertStmt->execute();

            // Fetch and return inserted product information
            $insertedSubcategoryId = $insertStmt->insert_id;
            $insertedSubcategoryQuery = "SELECT * FROM subcategory WHERE id = ?";
            $insertedSubcategoryStmt = $this->conn->prepare($insertedSubcategoryQuery);
            $insertedSubcategoryStmt->bind_param("d", $insertedSubcategoryId);
            $insertedSubcategoryStmt->execute();
            $insertedSubcategoryResult = $insertedSubcategoryStmt->get_result();
            $insertedSubcategory = $insertedSubcategoryResult->fetch_assoc();

            return $insertedSubcategory;
        }
    }
    public function upsertSubcategoryByKey($getdata, $categoryId) {
        // Check if the product already exists 
       
        $brandName = trim($getdata["Brand"]);
        $brandImage = $getdata["Brand Image"];

        
        $callvalue = $getdata["Call Not Recieve"];
        $threemonths = $getdata["Below 3 Months"];
        $threeto6months = $getdata["3-6 Months"];
        $sixto11months = $getdata["6-11 Months"];
        $above11 = $getdata["Above 11 Months"];
        $touchscreen = $getdata["Touch screen"];
        $largespot = $getdata["Large spots"];
        $multiplespot = $getdata["Multiple spots"];
        $minorspot = $getdata["Minor spots"];
        $nospot = $getdata["No spots"];
        $displayfade = $getdata["Display faded"];
        $multilines = $getdata["Multiple lines"];
        $nolines = $getdata["No lines"];
        $crackedscreen = $getdata["Screen cracked"];
        $damegescreen = $getdata["Damaged screen"];
        $heavyscracthes = $getdata["Heavy scratches"];
        $scratches12 = $getdata["1-2 scratches"];
        $noscratches = $getdata["No scratches"];
           
        
        // body questions starts
        $majorscratch = $getdata["Major scratches"];
        $bodyscratches2 = $getdata["Less than 2 scratches"];
        $nobodysratches = $getdata["No scratches"];
        $heavydents = $getdata["Multiple/heavy dents"];
        $dents2 = $getdata["Less than 2 dents"];
        $nodents = $getdata["No dents"];        
        $crackedsideback = $getdata["Cracked/ broken side or back panel"];
        $missingsideback = $getdata["Missing side or back panel"];
        $nodefectssideback = $getdata["No defect on side or back panel"];
        $bentcurvedpanel = $getdata["Bent/ curved panel"];
        $loosescreen = $getdata["Loose screen (Gap in screen and body)"];
        $nobents = $getdata["No Bents"];
        // accessries questions
        $charger = $getdata["Orignal Charger"];
        $earphone = $getdata["Original Earphones"];
        $boximei = $getdata["Box with same IMEI"];
        $billimei = $getdata["Bill with same IMEI"];
        echo "<br/>";
        echo "<br/>";
        echo "<br/>";
        echo "<br/>";
      echo "------------------------------------brandName------".$brandName;
      echo "<br/>";
      echo "----------------------------------------categoryId-----". $categoryId;
        $checkQuery ="SELECT * FROM `subcategory` WHERE `subcategory_name` = ? AND  `category_id` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("ss", $brandName, $categoryId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Subcategory exists, update it
            $existingSubcategory = $checkResult->fetch_assoc(); // Fetch existing product data
            $brandId = $existingSubcategory['id']; // Get the existing product ID
            $updateQuery = "UPDATE `subcategory`
                        SET 
                            `category_id` = ?,
                            `subcategory_name` = ?,
                            `subcategory_image` = ?,
                            `callvalue` = ?,
                            `3months` = ?,
                            `3to6months` = ?,
                            `6to11months` = ?,
                            `above11` = ?,
                            `touchscreen` = ?,
                            `largespot` = ?,
                            `multiplespot` = ?,
                            `minorspot` = ?,
                            `nospot` = ?,
                            `displayfade` = ?,
                            `multilines` = ?,
                            `nolines` = ?,
                            `crackedscreen` = ?,
                            `damegescreen` = ?,
                            `heavyscracthes` = ?,
                            `12scratches` = ?,
                            `noscratches` = ?,
                            `majorscratch` = ?,
                            `2bodyscratches` = ?,
                            `nobodysratches` = ?,
                            `heavydents` = ?,
                            `2dents` = ?,
                            `nodents` = ?,
                            `crackedsideback` = ?,
                            `missingsideback` = ?,
                            `nodefectssideback` = ?,
                            `bentcurvedpanel` = ?,
                            `loosescreen` = ?,
                            `nobents` = ?,
                            `charger` = ?,
                            `earphone` = ?,
                            `boximei` = ?,
                            `billimei` = ?
                        WHERE
                            `id` = ?";

            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("ssssssssssssssssssssssssssssssssssssss", 
            $categoryId,  $brandName, $brandImage, $callvalue, $threemonths, $threeto6months, $sixto11months, $above11, $touchscreen, $largespot, 
            $multiplespot, $minorspot, $nospot, $displayfade, $multilines, $nolines, $crackedscreen, $damegescreen, $heavyscracthes, $scratches12, 
            $noscratches, $majorscratch, $bodyscratches2, $nobodysratches, $heavydents, $dents2, $nodents, $crackedsideback, $missingsideback, $nodefectssideback, 
            $bentcurvedpanel, $loosescreen, $nobents, $charger, $earphone, $boximei, $billimei, $brandId);

            $updateStmt->execute();
        
            // Fetch and return updated product information
            // $updatedSubcategory = $existingSubcategory; // Use the existing product data
        
            // Fetch and return inserted product information
            // $insertedSubcategoryId = $insertStmt->insert_id;
            $updatedSubcategoryQuery = "SELECT * FROM subcategory WHERE id = ?";
            $updatedSubcategoryStmt = $this->conn->prepare($updatedSubcategoryQuery);
            $updatedSubcategoryStmt->bind_param("d", $brandId);
            $updatedSubcategoryStmt->execute();
            $updatedSubcategoryResult = $updatedSubcategoryStmt->get_result();
            $updateSubcategory = $updatedSubcategoryResult->fetch_assoc();

            return $updateSubcategory;
        } else {
            // Subcategory doesn't exist, insert it 
                         
            $insertQuery = "INSERT INTO `subcategory` (`category_id`,`subcategory_name`,`subcategory_image`,`callvalue`,`3months`,`3to6months`,`6to11months`,
            `above11`,`touchscreen`,`largespot`,`multiplespot`,`minorspot`,`nospot`,`displayfade`,`multilines`,`nolines`,`crackedscreen`,`damegescreen`,`heavyscracthes`,
            `12scratches`,`noscratches`,`majorscratch`,`2bodyscratches`,`nobodysratches`,`heavydents`,`2dents`,`nodents`,`crackedsideback`,`missingsideback`,`nodefectssideback`,`bentcurvedpanel`,
            `loosescreen`,`nobents`,`charger`,`earphone`,`boximei`,`billimei`)
            VALUES(?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("dssssssssssssssssssssssssssssssssssss", 
            $categoryId, $brandName, $brandImage, $callvalue, $threemonths, $threeto6months, $sixto11months, $above11, $touchscreen, $largespot, 
            $multiplespot, $minorspot, $nospot, $displayfade, $multilines, $nolines, $crackedscreen, $damegescreen, $heavyscracthes, $scratches12, 
            $noscratches, $majorscratch, $bodyscratches2, $nobodysratches, $heavydents, $dents2, $nodents, $crackedsideback, $missingsideback, $nodefectssideback, 
            $bentcurvedpanel, $loosescreen, $nobents, $charger, $earphone, $boximei, $billimei);

            $insertStmt->execute();

            // Fetch and return inserted product information
            $insertedSubcategoryId = $insertStmt->insert_id;
            $insertedSubcategoryQuery = "SELECT * FROM subcategory WHERE id = ?";
            $insertedSubcategoryStmt = $this->conn->prepare($insertedSubcategoryQuery);
            $insertedSubcategoryStmt->bind_param("d", $insertedSubcategoryId);
            $insertedSubcategoryStmt->execute();
            $insertedSubcategoryResult = $insertedSubcategoryStmt->get_result();
            $insertedSubcategory = $insertedSubcategoryResult->fetch_assoc();

            return $insertedSubcategory;
        }
    }
}

?>