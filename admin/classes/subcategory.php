<?php

class SubCategoryManager {
    private $conn;
    private $dbHost;
    private $dbUsername;
    private $dbPassword;
    private $dbDatabase;
    private $publicUrl;
    private $dirNameProject;
 
    public function __construct($db)
    {
        $this->conn = $db;
        $this->loadConfig();
    }

    private function loadConfig()
    {
        if (isset($_SERVER['DB_PASSWORD']) && !empty($_SERVER['DB_PASSWORD'])) {
            $this->dbHost = $_SERVER['DB_HOST'];
            $this->dbUsername = $_SERVER['DB_USERNAME'];
            $this->dbPassword = $_SERVER['DB_PASSWORD'];
            $this->dbDatabase = $_SERVER['DB_DATABASE'];
            $this->publicUrl = $_SERVER['PUBLIC_URL'];
            $this->dirNameProject = $_SERVER['PROJECT_ROOT_PATH'];
            // $this->setDirNameProject($_SERVER['PROJECT_ROOT_PATH']);
        } else {
            $this->dbHost = "localhost";
            $this->dbUsername = "sellit";
            $this->dbPassword="demo";
            $this->dbDatabase = "sellit";
            $this->publicUrl = "http://localhost/sellit/";
            $this->dirNameProject="";
        }
    } 

    public function upsertSubcategory($getdata, $categoryId) {
        
        $dbHost=$this->dbHost;
        $dbUsername=$this->dbUsername;
        $dbPassword=$this->dbPassword;
        $dbDatabase=$this->dbDatabase;
        $dirNameProject=$this->dirNameProject;
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
       
        $dbHost=$this->dbHost;
        $dbUsername=$this->dbUsername;
        $dbPassword=$this->dbPassword;
        $dbDatabase=$this->dbDatabase;
        $dirNameProject=$this->dirNameProject;
        // Get the full path to the current script
        $currentScriptPath = __FILE__;

        // Get the project directory by removing the script filename from the path
        $projectDirectory = dirname($currentScriptPath);

        // Define the full path to the background process PHP file
        $backgroundProcessFile =
            $projectDirectory . "/background_subcat_process.php";
            
        $brandName = trim($getdata["Brand"]);  
        $brandImage = isset($getdata["Brand Image"])?$getdata["Brand Image"]:"";
        $urlComponents = parse_url($brandImage); 
        $imageUrlStatus = $urlComponents !== false && isset($urlComponents['scheme'])?"external": "internal";
 
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
        $nobodysratches = $getdata["No body scratches"];
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
        // SELECT * FROM `subcategory` WHERE (`subcategory_name` = ? OR `id` = ?) AND `category_id` = ?

        $checkQuery ="SELECT * FROM `subcategory` WHERE `subcategory_name` = ? AND  `category_id` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("ss", $brandName, $categoryId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Subcategory exists, update it
            $existingSubcategory = $checkResult->fetch_assoc(); // Fetch existing product data
            $brandId = $existingSubcategory['id']; // Get the existing product ID
            $subcategory_image = $brandImage !=="" ? $brandImage : $existingSubcategory['subcategory_image']; // Get the existing product ID
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
            $categoryId,  $brandName, $subcategory_image, $callvalue, $threemonths, $threeto6months, $sixto11months, $above11, $touchscreen, $largespot, 
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
            if ($imageUrlStatus === "external") { 
                $brandName=strtolower(str_replace(" ", "_", $brandName));
                exec("/usr/bin/php $backgroundProcessFile $brandId $subcategory_image $brandName $dbHost $dbUsername $dbPassword $dbDatabase $dirNameProject > /dev/null 2>&1 &"); 
            }
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
            if ($imageUrlStatus === "external") { 
                $brandName=strtolower(str_replace(" ", "_", $brandName));
                exec("/usr/bin/php $backgroundProcessFile $insertedSubcategoryId $brandImage $brandName $dbHost $dbUsername $dbPassword $dbDatabase $dirNameProject > /dev/null 2>&1 &"); 
            }
            return $insertedSubcategory;
        }
    }
    
    public function upsertSubcategoryByKeyId($getdata, $categoryId) {
       
        $dbHost=$this->dbHost;
        $dbUsername=$this->dbUsername;
        $dbPassword=$this->dbPassword;
        $dbDatabase=$this->dbDatabase;
        $dirNameProject=$this->dirNameProject;
        // Get the full path to the current script
        $currentScriptPath = __FILE__;

        // Get the project directory by removing the script filename from the path
        $projectDirectory = dirname($currentScriptPath);

        // Define the full path to the background process PHP file
        $backgroundProcessFile =
            $projectDirectory . "/background_subcat_process.php";
            
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);
 
        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
           // Check if the product already exists 
        $brandName = trim($getdata["Brand Name"]);
        // $id = (int)$getdata["ID"];  
        $id =isset($getdata["ID"])? (int)$getdata["ID"]:"";  
      
        $brandImage = isset($getdata["Brand Image"])?$getdata["Brand Image"]:"";
        $urlComponents = parse_url($brandImage); 
        $imageUrlStatus = $urlComponents !== false && isset($urlComponents['scheme'])?"external": "internal";
 
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
        $nobodysratches = $getdata["No body scratches"];
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
        

        $checkQuery = $id!=="" && $id!==null && $id>0? "SELECT * FROM `subcategory` WHERE  `id` = ? AND `category_id` = ?":"SELECT * FROM `subcategory` WHERE `subcategory_name` = ?  AND `category_id` = ?";
        // $checkQuery ="SELECT * FROM `subcategory` WHERE (`subcategory_name` = ? OR `id` = ?) AND `category_id` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkId=$id!=="" && $id!==null && $id>0?$id:$brandName;
        $checkStmt->bind_param("ss", $checkId, $categoryId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result(); 



        if ($checkResult->num_rows > 0) {
            // Subcategory exists, update it
            $existingSubcategory = $checkResult->fetch_assoc(); // Fetch existing product data
            $brandId = $existingSubcategory['id']; // Get the existing product ID
            $subcategory_name = $brandName !=="" ? $brandName : $existingSubcategory['subcategory_name']; // Get the existing product ID
            $subcategory_image = $brandImage !=="" ? $brandImage : $existingSubcategory['subcategory_image']; // Get the existing product ID
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
                            `billimei` = ?,
                            `modify_date` = ?,
                            `image_url` = ?
                        WHERE
                            `id` = ?";

            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("ssssssssssssssssssssssssssssssssssssssss", 
            $categoryId,  $subcategory_name, $subcategory_image, $callvalue, $threemonths, $threeto6months, $sixto11months, $above11, $touchscreen, $largespot, 
            $multiplespot, $minorspot, $nospot, $displayfade, $multilines, $nolines, $crackedscreen, $damegescreen, $heavyscracthes, $scratches12, 
            $noscratches, $majorscratch, $bodyscratches2, $nobodysratches, $heavydents, $dents2, $nodents, $crackedsideback, $missingsideback, $nodefectssideback, 
            $bentcurvedpanel, $loosescreen, $nobents, $charger, $earphone, $boximei, $billimei, $nowDate, $imageUrlStatus, $brandId);

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
            if ($imageUrlStatus === "external") { 
                $brandName=strtolower(str_replace(" ", "_", $brandName));
                exec("/usr/bin/php $backgroundProcessFile $brandId $subcategory_image $brandName $dbHost $dbUsername $dbPassword $dbDatabase $dirNameProject > /dev/null 2>&1 &"); 
            }
            return $updateSubcategory;
        } else {
            // Subcategory doesn't exist, insert it 
                         
            // $insertQuery = "INSERT INTO `subcategory` (`category_id`,`subcategory_name`,`subcategory_image`,`callvalue`,`3months`,`3to6months`,`6to11months`,
            // `above11`,`touchscreen`,`largespot`,`multiplespot`,`minorspot`,`nospot`,`displayfade`,`multilines`,
            // `nolines`,`crackedscreen`,`damegescreen`,`heavyscracthes`,
            // `12scratches`,`noscratches`,`majorscratch`,
            // `2bodyscratches`,`nobodysratches`,`heavydents`,`2dents`,`nodents`,`crackedsideback`,`missingsideback`,
            // `nodefectssideback`,`bentcurvedpanel`,
            // `loosescreen`,`nobents`,`charger`,`earphone`,`boximei`,`billimei`,`image_url`)
            // VALUES(?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?,?,?,? ,?,?,?)";

            // Define the fields and their types
            $fields = [
                'category_id', 'subcategory_name', 'subcategory_image', 'callvalue', '3months', '3to6months', '6to11months',
                'above11', 'touchscreen', 'largespot', 'multiplespot', 'minorspot', 'nospot', 'displayfade', 'multilines',
                'nolines', 'crackedscreen', 'damegescreen', 'heavyscracthes', '12scratches', 'noscratches', 'majorscratch',
                '2bodyscratches', 'nobodysratches', 'heavydents', '2dents', 'nodents', 'crackedsideback', 'missingsideback',
                'nodefectssideback', 'bentcurvedpanel', 'loosescreen', 'nobents', 'charger', 'earphone', 'boximei', 'billimei', 'image_url'
            ];

            // Create placeholders (?, ?, ?, ...)
            $placeholders = implode(', ', array_fill(0, count($fields), '?'));

            // Create types ("dssssssssssssssssssssssssssssssssssss")
            $types = str_repeat('s', count($fields)); // Assuming all parameters are strings, adjust if needed

            // Build the SQL query
            $insertQuery = "INSERT INTO `subcategory` (`" . implode('`,`', $fields) . "`) VALUES($placeholders)";
            
            $insertStmt = $this->conn->prepare($insertQuery);
            // $insertStmt->bind_param("dssssssssssssssssssssssssssssssssssss", 
            $insertStmt->bind_param($types, 
            $categoryId, $brandName, $brandImage, $callvalue, $threemonths, $threeto6months, $sixto11months, $above11, $touchscreen, $largespot, 
            $multiplespot, $minorspot, $nospot, $displayfade, $multilines, $nolines, $crackedscreen, $damegescreen, $heavyscracthes, $scratches12, 
            $noscratches, $majorscratch, $bodyscratches2, $nobodysratches, $heavydents, $dents2, $nodents, $crackedsideback, $missingsideback, $nodefectssideback, 
            $bentcurvedpanel, $loosescreen, $nobents, $charger, $earphone, $boximei, $billimei, $imageUrlStatus);

            $insertStmt->execute();

            // Fetch and return inserted product information
            $insertedSubcategoryId = $insertStmt->insert_id;
            $insertedSubcategoryQuery = "SELECT * FROM subcategory WHERE id = ?";
            $insertedSubcategoryStmt = $this->conn->prepare($insertedSubcategoryQuery);
            $insertedSubcategoryStmt->bind_param("d", $insertedSubcategoryId);
            $insertedSubcategoryStmt->execute();
            $insertedSubcategoryResult = $insertedSubcategoryStmt->get_result();
            $insertedSubcategory = $insertedSubcategoryResult->fetch_assoc();
            if ($imageUrlStatus === "external") { 
                $brandName=strtolower(str_replace(" ", "_", $brandName));
                exec("/usr/bin/php $backgroundProcessFile $insertedSubcategoryId $brandImage $brandName $dbHost $dbUsername $dbPassword $dbDatabase $dirNameProject > /dev/null 2>&1 &"); 
            }
            return $insertedSubcategory;
        }
    }
    
    public function upsertSubcategorySeries($getdata, $categoryId) {
       
        $dbHost=$this->dbHost;
        $dbUsername=$this->dbUsername;
        $dbPassword=$this->dbPassword;
        $dbDatabase=$this->dbDatabase;
        $dirNameProject=$this->dirNameProject;
        // Get the full path to the current script
        $currentScriptPath = __FILE__;

        // Get the project directory by removing the script filename from the path
        $projectDirectory = dirname($currentScriptPath);

        // Define the full path to the background process PHP file
        $backgroundProcessFile =
            $projectDirectory . "/background_subcat_process.php";
            
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);
 
        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
           // Check if the product already exists 
        $brandName = trim($getdata["Brand Name"]);
        $id =isset($getdata["Brand ID"])? (int)$getdata["Brand ID"]:"";  
      
        $brandImage = isset($getdata["Brand Image"])?$getdata["Brand Image"]:"";
        $urlComponents = parse_url($brandImage); 
        $imageUrlStatus = $urlComponents !== false && isset($urlComponents['scheme'])?"external": "internal";
         

        $checkQuery = $id!=="" && $id!==null && $id>0? "SELECT * FROM `subcategory` WHERE  `id` = ? ":"SELECT * FROM `subcategory` WHERE `subcategory_name` = ?  AND `category_id` = ?";
        // $checkQuery ="SELECT * FROM `subcategory` WHERE (`subcategory_name` = ? OR `id` = ?) AND `category_id` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkId=$id!=="" && $id!==null && $id>0?$id:$brandName;
        // $checkStmt->bind_param("ss", $checkId, $categoryId); 
        if($id!=="" && $id!==null && $id>0){
            $checkStmt->bind_param("s", $checkId);
        } else{
            $checkStmt->bind_param("ss",  $checkId, $categoryId);
        }
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result(); 



        if ($checkResult->num_rows > 0) {
            // Subcategory exists, update it
            $existingSubcategory = $checkResult->fetch_assoc(); // Fetch existing product data
            $brandId = $existingSubcategory['id']; // Get the existing product ID
            $subcategory_name = $brandName !=="" ? $brandName : $existingSubcategory['subcategory_name']; // Get the existing product ID
            $subcategory_image = $brandImage !=="" ? $brandImage : $existingSubcategory['subcategory_image']; // Get the existing product ID
            $updateQuery = "UPDATE `subcategory`
                        SET 
                            `category_id` = ?,
                            `subcategory_name` = ?,
                            `subcategory_image` = ?,
                            `modify_date` = ?,
                            `image_url` = ?
                        WHERE
                            `id` = ?";

            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("ssssss", 
            $categoryId,  $subcategory_name, $subcategory_image, $nowDate, $imageUrlStatus, $brandId);

            $updateStmt->execute();
         
            $updatedSubcategoryQuery = "SELECT * FROM subcategory WHERE id = ?";
            $updatedSubcategoryStmt = $this->conn->prepare($updatedSubcategoryQuery);
            $updatedSubcategoryStmt->bind_param("d", $brandId);
            $updatedSubcategoryStmt->execute();
            $updatedSubcategoryResult = $updatedSubcategoryStmt->get_result();
            $updateSubcategory = $updatedSubcategoryResult->fetch_assoc();
            if ($imageUrlStatus === "external") { 
                $brandName=strtolower(str_replace(" ", "_", $brandName));
                exec("/usr/bin/php $backgroundProcessFile $brandId $subcategory_image $brandName $dbHost $dbUsername $dbPassword $dbDatabase $dirNameProject > /dev/null 2>&1 &"); 
            }
            return $updateSubcategory;
        } else {
            // Subcategory doesn't exist, insert it 
                         
            $insertQuery = "INSERT INTO `subcategory` (`category_id`,`subcategory_name`,`subcategory_image`, `image_url`)
            VALUES(?,?,?,?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("dsss", 
            $categoryId, $brandName, $brandImage, $imageUrlStatus);

            $insertStmt->execute();

            // Fetch and return inserted product information
            $insertedSubcategoryId = $insertStmt->insert_id;
            $insertedSubcategoryQuery = "SELECT * FROM subcategory WHERE id = ?";
            $insertedSubcategoryStmt = $this->conn->prepare($insertedSubcategoryQuery);
            $insertedSubcategoryStmt->bind_param("d", $insertedSubcategoryId);
            $insertedSubcategoryStmt->execute();
            $insertedSubcategoryResult = $insertedSubcategoryStmt->get_result();
            $insertedSubcategory = $insertedSubcategoryResult->fetch_assoc();
            if ($imageUrlStatus === "external") { 
                $brandName=strtolower(str_replace(" ", "_", $brandName));
                exec("/usr/bin/php $backgroundProcessFile $insertedSubcategoryId $brandImage $brandName $dbHost $dbUsername $dbPassword $dbDatabase $dirNameProject > /dev/null 2>&1 &"); 
            }
            return $insertedSubcategory;
        }
    }
    public function upsertSubcategoryAll($getdata, $categoryId) {
       
        $dbHost=$this->dbHost;
        $dbUsername=$this->dbUsername;
        $dbPassword=$this->dbPassword;
        $dbDatabase=$this->dbDatabase;
        $dirNameProject=$this->dirNameProject;
        // Get the full path to the current script
        $currentScriptPath = __FILE__;

        // Get the project directory by removing the script filename from the path
        $projectDirectory = dirname($currentScriptPath);

        // Define the full path to the background process PHP file
        $backgroundProcessFile =
            $projectDirectory . "/background_subcat_process.php";
            
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);
 
        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
           // Check if the product already exists 
        $brandName = trim($getdata["Brand Name"]); 
        $id =isset($getdata["Brand ID"])? (int)$getdata["Brand ID"]:"";  
      
        $brandImage = isset($getdata["Brand Image"])?$getdata["Brand Image"]:"";
        $urlComponents = parse_url($brandImage); 
        $imageUrlStatus = $urlComponents !== false && isset($urlComponents['scheme'])?"external": "internal";
          
        $checkQuery = $id!=="" && $id!==null && $id>0? "SELECT * FROM `subcategory` WHERE  `id` = ? ":"SELECT * FROM `subcategory` WHERE `subcategory_name` = ?  AND `category_id` = ?";
        // $checkQuery ="SELECT * FROM `subcategory` WHERE (`subcategory_name` = ? OR `id` = ?) AND `category_id` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkId=$id!=="" && $id!==null && $id>0?$id:$brandName;
        // $checkStmt->bind_param("ss", $checkId, $categoryId); 
        if($id!=="" && $id!==null && $id>0){
            $checkStmt->bind_param("s", $checkId);
        } else{
            $checkStmt->bind_param("ss",  $checkId, $categoryId);
        }
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result(); 



        if ($checkResult->num_rows > 0) {
            // Subcategory exists, update it
            $existingSubcategory = $checkResult->fetch_assoc(); // Fetch existing product data
            $brandId = $existingSubcategory['id']; // Get the existing product ID
            $subcategory_name = $brandName !=="" ? $brandName : $existingSubcategory['subcategory_name']; // Get the existing product ID
            $subcategory_image = $brandImage !=="" ? $brandImage : $existingSubcategory['subcategory_image']; // Get the existing product ID
            $updateQuery = "UPDATE `subcategory`
                        SET 
                            `category_id` = ?,
                            `subcategory_name` = ?,
                            `subcategory_image` = ?,
                            `modify_date` = ?,
                            `image_url` = ?
                        WHERE
                            `id` = ?";

            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("ssssss", 
            $categoryId,  $subcategory_name, $subcategory_image, $nowDate, $imageUrlStatus, $brandId);

            $updateStmt->execute();
         
            $updatedSubcategoryQuery = "SELECT * FROM subcategory WHERE id = ?";
            $updatedSubcategoryStmt = $this->conn->prepare($updatedSubcategoryQuery);
            $updatedSubcategoryStmt->bind_param("d", $brandId);
            $updatedSubcategoryStmt->execute();
            $updatedSubcategoryResult = $updatedSubcategoryStmt->get_result();
            $updateSubcategory = $updatedSubcategoryResult->fetch_assoc();
            if($imageUrlStatus ==="external"){
                // $variantInfo=  syncExternalImage($brandId, $brandImage);
            }
            if ($imageUrlStatus === "external") { 
                $brandName=strtolower(str_replace(" ", "_", $brandName));
                exec("/usr/bin/php $backgroundProcessFile $brandId $subcategory_image $brandName $dbHost $dbUsername $dbPassword $dbDatabase $dirNameProject > /dev/null 2>&1 &"); 
            }
            return $updateSubcategory;
        } else {
            // Subcategory doesn't exist, insert it 
                         
            $insertQuery = "INSERT INTO `subcategory` (`category_id`,`subcategory_name`,`subcategory_image`, `image_url` = ?)
            VALUES(?,?,?,?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("dsss", 
            $categoryId, $brandName, $brandImage, $imageUrlStatus);

            $insertStmt->execute();

            // Fetch and return inserted product information
            $insertedSubcategoryId = $insertStmt->insert_id;
            $insertedSubcategoryQuery = "SELECT * FROM subcategory WHERE id = ?";
            $insertedSubcategoryStmt = $this->conn->prepare($insertedSubcategoryQuery);
            $insertedSubcategoryStmt->bind_param("d", $insertedSubcategoryId);
            $insertedSubcategoryStmt->execute();
            $insertedSubcategoryResult = $insertedSubcategoryStmt->get_result();
            $insertedSubcategory = $insertedSubcategoryResult->fetch_assoc();
            if ($imageUrlStatus === "external") { 
                $brandName=strtolower(str_replace(" ", "_", $brandName));
                exec("/usr/bin/php $backgroundProcessFile $insertedSubcategoryId $brandImage $brandName $dbHost $dbUsername $dbPassword $dbDatabase $dirNameProject > /dev/null 2>&1 &"); 
            }
            return $insertedSubcategory;
        }
    }
 
}

?>