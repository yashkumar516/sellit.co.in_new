<?php

class QuestionsTabletManager {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function upsertQuestions($getdata, $categoryId, $productId, $brandId, $seriesId) {
        // Create a DateTime object from the input string
        $currentDateTimeObject = new DateTime();

        // Format the DateTime object
        $nowDate = $currentDateTimeObject->format('Y-m-d H:i:s.u');
        
        // Extract data from $getdata
        $SwitchOff = $getdata["Switch Off"];
        $FrontCamera = $getdata["Front Camera"];
        $BackCamera = $getdata["Back Camera"];
        $Wifi = $getdata["Wifi"];
        $Speaker = $getdata["speaker"];
        $PowerHomeButton = $getdata["Power/Home Button"];
        $ChargingPort = $getdata["Charging Port"];
        $Battery = $getdata["Battery"];
        $Microphone = $getdata["Microphone"];
        $VolumeButton = $getdata["Volume Button"];
        $FingerPrint = $getdata["Finger Print"];
        $Gps = $getdata["Gps"];
        $Bluetooth = $getdata["Bluetooth"];
        $Charger = $getdata["Charger"];
        $Box = $getdata["Box"];
        $Pencil = $getdata["Pencil"];
        $Bill = $getdata["Bill"];
        $ScreenFlawless = $getdata["Screen Flawless"];
        $ScreenGood = $getdata["Screen Good"];
        $ScreenAverege = $getdata["Screen Averege"];
        $ScreenDemaged = $getdata["Screen Demaged"];
        $PhysicalFlawless = $getdata["Physical Flawless"];
        $PhysicalGood = $getdata["Physical Good"];
        $PhysicalAverege = $getdata["Physical Averege"];
        $PhysicalDemaged = $getdata["Physical Demaged"];
        $OutWarrenty = $getdata["Out Of Warrenty"];
        $Below3 = $getdata["Below 3"];
        $ThreeToSixMonths = $getdata["3 to 6 Months"];
        $SixToElevenMonths = $getdata["6 to 11 Months"];
        $AboveElevenMonths = $getdata["Above 11 Months"];
        
        $status = "active";
        $checkQuery = "SELECT * FROM `tabletquestions` WHERE `product_name` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $productId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Questions exists, update it
            $existingQuestions = $checkResult->fetch_assoc(); // Fetch existing tabletquestions data
            $questionsId = $existingQuestions['id']; // Get the existing tabletquestions ID
            
            $updateQuery = "UPDATE `tabletquestions`
                        SET
                            `categoryid` = ?, 
                            `subcategoryid` = ?, 
                            `childcategoryid` = ?, 
                            `product_name` = ?, 
                            `switchof` = ?, 
                            `Frontcam` = ?,
                            `backcam` = ?, 
                            `wifi` = ?, 
                            `speaker` = ?, 
                            `power/home` = ?, 
                            `charging` = ?, 
                            `battery` = ?, 
                            `microphone` = ?, 
                            `volumebutton` = ?, 
                            `fingerprint` = ?, 
                            `gps` = ?, 
                            `bluetooth` = ?, 
                            `charger` = ?,
                            `box` = ?, 
                            `pencil` = ?, 
                            `bill` = ?, 
                            `sflawless` = ?, 
                            `sgood` = ?, 
                            `saverege` = ?, 
                            `sdamaged` = ?, 
                            `pflawless` = ?, 
                            `pgood` = ?, 
                            `paverege` = ?, 
                            `pdamaged` = ?, 
                            `outofwarrenty` = ?, 
                            `below3` = ?, 
                            `3to6` = ?, 
                            `6to11` = ?, 
                            `above11` = ?,  
                            `modify_date` = ?
                        WHERE
                            `id` = ?";

            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param(
                "sssssssssssssssssssssssssssssssssssi", 
                $categoryId, 
                $brandId, 
                $seriesId, 
                $productId, 
                $SwitchOff,
                $FrontCamera,
                $BackCamera,
                $Wifi,
                $Speaker,
                $PowerHomeButton,
                $ChargingPort,
                $Battery,
                $Microphone,
                $VolumeButton,
                $FingerPrint,
                $Gps,
                $Bluetooth,
                $Charger,
                $Box,
                $Pencil,
                $Bill,
                $ScreenFlawless,
                $ScreenGood,
                $ScreenAverege,
                $ScreenDemaged,
                $PhysicalFlawless,
                $PhysicalGood,
                $PhysicalAverege,
                $PhysicalDemaged,
                $OutWarrenty,
                $Below3,
                $ThreeToSixMonths,
                $SixToElevenMonths,
                $AboveElevenMonths, 
                $nowDate, 
                $questionsId
            );

            $updateStmt->execute();
        
            // Fetch and return updated tabletquestions information
            $updatedQuestionsQuery = "SELECT * FROM tabletquestions WHERE id = ?";
            $updatedQuestionsStmt = $this->conn->prepare($updatedQuestionsQuery);
            $updatedQuestionsStmt->bind_param("i", $questionsId);
            $updatedQuestionsStmt->execute();
            $updatedQuestionsResult = $updatedQuestionsStmt->get_result();
            $updatedQuestions = $updatedQuestionsResult->fetch_assoc();

            return $updatedQuestions; 
        } else {
            // Questions doesn't exist, insert it 
            $insertQuery = "INSERT INTO `tabletquestions`(
                `categoryid`,
                `subcategoryid`,
                `childcategoryid`,
                `product_name`,
                `switchof`,
                `Frontcam`,
                `backcam`,
                `wifi`,
                `speaker`,
                `power/home`,
                `charging`,
                `battery`,
                `microphone`,
                `volumebutton`,
                `fingerprint`,
                `gps`,
                `bluetooth`,
                `charger`,
                `box`,
                `pencil`,
                `bill`,
                `sflawless`,
                `sgood`,
                `saverege`,
                `sdamaged`,
                `pflawless`,
                `pgood`,
                `paverege`,
                `pdamaged`,
                `outofwarrenty`,
                `below3`,
                `3to6`,
                `6to11`,
                `above11`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param(
                "ssssssssssssssssssssssssssssssssss",
                $categoryId, 
                $brandId, 
                $seriesId, 
                $productId, 
                $SwitchOff,
                $FrontCamera,
                $BackCamera,
                $Wifi,
                $Speaker,
                $PowerHomeButton,
                $ChargingPort,
                $Battery,
                $Microphone,
                $VolumeButton,
                $FingerPrint,
                $Gps,
                $Bluetooth,
                $Charger,
                $Box,
                $Pencil,
                $Bill,
                $ScreenFlawless,
                $ScreenGood,
                $ScreenAverege,
                $ScreenDemaged,
                $PhysicalFlawless,
                $PhysicalGood,
                $PhysicalAverege,
                $PhysicalDemaged,
                $OutWarrenty,
                $Below3,
                $ThreeToSixMonths,
                $SixToElevenMonths,
                $AboveElevenMonths
            );

            $insertStmt->execute();

            // Fetch and return inserted tabletquestions information
            $insertedQuestionsId = $insertStmt->insert_id;
            $insertedQuestionsQuery = "SELECT * FROM tabletquestions WHERE id = ?";
            $insertedQuestionsStmt = $this->conn->prepare($insertedQuestionsQuery);
            $insertedQuestionsStmt->bind_param("i", $insertedQuestionsId);
            $insertedQuestionsStmt->execute();
            $insertedQuestionsResult = $insertedQuestionsStmt->get_result();
            $insertedQuestions = $insertedQuestionsResult->fetch_assoc();

            return $insertedQuestions;
        }
    }
    
    public function upsertQuestions3($getdata, $categoryId, $productId, $brandId, $seriesId) {
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);

        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
        // Check if the tabletquestions already exists  
        $SwitchOff = $getdata["Switch Off"];
        $FrontCamera = $getdata["Front Camera"];
        $BackCamera = $getdata["Back Camera"];
        $Wifi = $getdata["Wifi"];
        $Speaker = $getdata["speaker"];
        $PowerHomeButton = $getdata["Power/Home Button"];
        $ChargingPort = $getdata["Charging Port"];
        $Battery = $getdata["Battery"];
        $Microphone = $getdata["Microphone"];
        $VolumeButton = $getdata["Volume Button"];
        $FingerPrint = $getdata["Finger Print"];
        $Gps = $getdata["Gps"];
        $Bluetooth = $getdata["Bluetooth"];
        $Charger = $getdata["Charger"];
        $Box = $getdata["Box"];
        $Pencil = $getdata["Pencil"];
        $Bill = $getdata["Bill"];
        $ScreenFlawless = $getdata["Screen Flawless"];
        $ScreenGood = $getdata["Screen Good"];
        $ScreenAverege = $getdata["Screen Averege"];
        $ScreenDemaged = $getdata["Screen Demaged"];
        $PhysicalFlawless = $getdata["Physical flawless"];
        $PhysicalGood = $getdata["Physical Good"];
        $PhysicalAverege = $getdata["Physical Averege"];
        $PhysicalDemaged = $getdata["Physical Demaged"];
        $OutWarrenty = $getdata["Out Of Warrenty"];
        $Below3 = $getdata["Below 3"];
        $ThreeToSixMonths = $getdata["3 to 6 Months"];
        $SixToElevenMonths = $getdata["6 to 11 Months"];
        $AboveElevenMonths = $getdata["Above 11 Months"];
        
        $status="active";
        $checkQuery ="SELECT * FROM `tabletquestions` WHERE `product_name` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $productId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Questions exists, update it
            $existingQuestions = $checkResult->fetch_assoc(); // Fetch existing tabletquestions data
            $questionsId = $existingQuestions['id']; // Get the existing tabletquestions ID
            
            $updateQuery = "UPDATE `tabletquestions`
                        SET
                           `categoryid` = ?, 
                            `subcategoryid` = ?, 
                            `childcategoryid` = ?, 
                            `product_name` = ?, 
                            `switchof` = ?, 
                            `Frontcam` = ?, 
                            `backcam` = ?, 
                            `wifi` = ?, 
                            `speaker` = ?, 
                            `power/home` = ?, 
                            `charging` = ?, 
                            `battery` = ?, 
                            `microphone` = ?, 
                            `volumebutton` = ?, 
                            `fingerprint` = ?, 
                            `gps` = ?, 
                            `bluetooth` = ?, 
                            `charger` = ?, 
                            `box` = ?, 
                            `pencil` = ?, 
                            `bill` = ?, 
                            `sflawless` = ?, 
                            `sgood` = ?, 
                            `saverege` = ?, 
                            `sdamaged` = ?, 
                            `pflawless` = ?, 
                            `pgood` = ?, 
                            `paverege` = ?, 
                            `pdamaged` = ?, 
                            `outofwarrenty` = ?, 
                            `below3` = ?, 
                            `3to6` = ?, 
                            `6to11` = ?, 
                            `above11` = ?,  
                            `modify_date` = ?
                        WHERE
                            `id` = ?";

            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("sssssssssssssssssssssssi", $categoryId, $brandId, $seriesId, $productId, $SwitchOff,
            $FrontCamera,
            $BackCamera,
            $Wifi,
            $Speaker,
            $PowerHomeButton,
            $ChargingPort,
            $Battery,
            $Microphone,
            $VolumeButton,
            $FingerPrint,
            $Gps,
            $Bluetooth,
            $Charger,
            $Box,
            $Pencil,
            $Bill,
            $ScreenFlawless,
            $ScreenGood,
            $ScreenAverege,
            $ScreenDemaged,
            $PhysicalFlawless,
            $PhysicalGood,
            $PhysicalAverege,
            $PhysicalDemaged,
            $OutWarrenty,
            $Below3,
            $ThreeToSixMonths,
            $SixToElevenMonths,
            $AboveElevenMonths, $nowDate, $questionsId);

            $updateStmt->execute();
        
            // Fetch and return updated tabletquestions information
            $updatedQuestionsQuery = "SELECT * FROM tabletquestions WHERE id = ?";
            $updatedQuestionsStmt = $this->conn->prepare($updatedQuestionsQuery);
            $updatedQuestionsStmt->bind_param("d", $questionsId);
            $updatedQuestionsStmt->execute();
            $updatedQuestionsResult = $updatedQuestionsStmt->get_result();
            $updatedQuestions = $updatedQuestionsResult->fetch_assoc();

            return $updatedQuestions; 
        } else {
            // Questions doesn't exist, insert it 
            $insertQuery = "INSERT INTO `tabletquestions`( `categoryid`,
        `subcategoryid`,
        `childcategoryid`,
        `product_name`,
        `switchof`,
        `Frontcam`,
        `backcam`,
        `wifi`,
        `speaker`,
        `power/home`,
        `charging`,
        `battery`,
        `microphone`,
        `volumebutton`,
        `fingerprint`,
        `gps`,
        `bluetooth`,
        `charger`,
        `box`,
        `pencil`,
        `bill`,
        `sflawless`,
        `sgood`,
        `saverege`,
        `sdamaged`,
        `pflawless`,
        `pgood`,
        `paverege`,
        `pdamaged`,
        `outofwarrenty`,
        `below3`,
        `3to6`,
        `6to11`,
        `above11`)
                            VALUES(??, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("sssssssssssssssssssssssssssssssss", $categoryId, $brandId, $seriesId, $productId, $SwitchOff,
            $FrontCamera,
            $BackCamera,
            $Wifi,
            $Speaker,
            $PowerHomeButton,
            $ChargingPort,
            $Battery,
            $Microphone,
            $VolumeButton,
            $FingerPrint,
            $Gps,
            $Bluetooth,
            $Charger,
            $Box,
            $Pencil,
            $Bill,
            $ScreenFlawless,
            $ScreenGood,
            $ScreenAverege,
            $ScreenDemaged,
            $PhysicalFlawless,
            $PhysicalGood,
            $PhysicalAverege,
            $PhysicalDemaged,
            $OutWarrenty,
            $Below3,
            $ThreeToSixMonths,
            $SixToElevenMonths,
            $AboveElevenMonths);

  
            $insertStmt->execute();

            // Fetch and return inserted tabletquestions information
            $insertedQuestionsId = $insertStmt->insert_id;
            $insertedQuestionsQuery = "SELECT * FROM tabletquestions WHERE id = ?";
            $insertedQuestionsStmt = $this->conn->prepare($insertedQuestionsQuery);
            $insertedQuestionsStmt->bind_param("d", $insertedQuestionsId);
            $insertedQuestionsStmt->execute();
            $insertedQuestionsResult = $insertedQuestionsStmt->get_result();
            $insertedQuestions = $insertedQuestionsResult->fetch_assoc();

            return $insertedQuestions;
        }
    }
    public function upsertTabletQuestions($getdata, $categoryId, $productId, $brandId, $seriesId) {
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);

        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
        // Check if the tabletquestions already exists  
        $displayValue = $getdata["Display Value"];
        $copyDisplay = $getdata["Copy Display"];
        $frontCamera = $getdata["Front Camera"];
        $backCamera = $getdata["Back Camera"];
        $volumeButton = $getdata["Volume Button"];
        $fingerTouch = $getdata["Finger Touch"];
        $speaker = $getdata["Speaker"];
        $powerButton = $getdata["Power Button"];
        $faceSensor = $getdata["Face Sensor"];
        $chargingPort = $getdata["Charging Port"];
        $audioReciever = $getdata["Audio Reciever"];
        $cameraGlass = $getdata["Camera Glass"];
        $wifi = $getdata["Wifi"];
        $silentButton = $getdata["Silent Button"];
        $battery = $getdata["Battery"];
        $bluetooth = $getdata["Bluetooth"];
        $vibrator = $getdata["Vibrator"];
        $microphone = $getdata["Microphone"];
       
        $status="active";
        $checkQuery ="SELECT * FROM `tabletquestions` WHERE `product_name` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $productId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Questions exists, update it
            $existingQuestions = $checkResult->fetch_assoc(); // Fetch existing tabletquestions data
            $questionsId = $existingQuestions['id']; // Get the existing tabletquestions ID
            
            $updateQuery = "UPDATE `tabletquestions`
                        SET
                            `categoryid` = ?,
                            `subcategoryid` = ?,
                            `childcategoryid` = ?,
                            `product_name` = ?,
                            `copydisplay` = ?,
                            `front_camera` = ?,
                            `back_camera` = ?,
                            `volume` = ?,
                            `finger_touch` = ?,
                            `speaker` = ?,
                            `power_btn` = ?,
                            `face_sensor` = ?,
                            `charging_port` = ?,
                            `audio_receiver` = ?,
                            `camera_glass` = ?,
                            `wifi` = ?,
                            `silent_btn` = ?,
                            `battery` = ?,
                            `bluetooth` = ?,
                            `vibrator` = ?,
                            `microphone` = ?,
                            `displayvalue` = ?,
                            `modify_date` = ?
                        WHERE
                            `id` = ?";

            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("sssssssssssssssssssssssi", $categoryId, $brandId, $seriesId, $productId, $copyDisplay, $frontCamera, $backCamera, $volumeButton, $fingerTouch, $speaker, $powerButton, $faceSensor, $chargingPort, $audioReciever, $cameraGlass, $wifi, $silentButton, $battery, $bluetooth, $vibrator, $microphone, $displayValue, $nowDate, $questionsId);

            $updateStmt->execute();
        
            // Fetch and return updated tabletquestions information
            $updatedQuestionsQuery = "SELECT * FROM tabletquestions WHERE id = ?";
            $updatedQuestionsStmt = $this->conn->prepare($updatedQuestionsQuery);
            $updatedQuestionsStmt->bind_param("d", $questionsId);
            $updatedQuestionsStmt->execute();
            $updatedQuestionsResult = $updatedQuestionsStmt->get_result();
            $updatedQuestions = $updatedQuestionsResult->fetch_assoc();

            return $updatedQuestions; 
        } else {
            // Questions doesn't exist, insert it 
            $insertQuery = "INSERT INTO `tabletquestions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`copydisplay`,`front_camera`,`back_camera`,`volume`,`finger_touch`,`speaker`,
                                        `power_btn`,`face_sensor`,`charging_port`,`audio_receiver`,`camera_glass`,`wifi`,`silent_btn`,`battery`,`bluetooth`,`vibrator`,`microphone`,`displayvalue`)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("ssssssssssssssssssssss", $categoryId, $brandId, $seriesId, $productId, $copyDisplay, $frontCamera, $backCamera, $volumeButton, $fingerTouch, $speaker, $powerButton, $faceSensor, $chargingPort, $audioReciever, $cameraGlass, $wifi, $silentButton, $battery, $bluetooth, $vibrator, $microphone, $displayValue);

  
            $insertStmt->execute();

            // Fetch and return inserted tabletquestions information
            $insertedQuestionsId = $insertStmt->insert_id;
            $insertedQuestionsQuery = "SELECT * FROM tabletquestions WHERE id = ?";
            $insertedQuestionsStmt = $this->conn->prepare($insertedQuestionsQuery);
            $insertedQuestionsStmt->bind_param("d", $insertedQuestionsId);
            $insertedQuestionsStmt->execute();
            $insertedQuestionsResult = $insertedQuestionsStmt->get_result();
            $insertedQuestions = $insertedQuestionsResult->fetch_assoc();

            return $insertedQuestions;
        }
    }
}

?>