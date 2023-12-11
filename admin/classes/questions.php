<?php

class QuestionsManager {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function upsertQuestions($getdata, $categoryId, $productId, $brandId, $seriesId) {
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);

        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
        // Check if the questions already exists  
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
        $checkQuery ="SELECT * FROM `questions` WHERE `product_name` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $productId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Questions exists, update it
            $existingQuestions = $checkResult->fetch_assoc(); // Fetch existing questions data
            $questionsId = $existingQuestions['id']; // Get the existing questions ID
            
            $updateQuery = "UPDATE `questions`
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
        
            // Fetch and return updated questions information
            $updatedQuestionsQuery = "SELECT * FROM questions WHERE id = ?";
            $updatedQuestionsStmt = $this->conn->prepare($updatedQuestionsQuery);
            $updatedQuestionsStmt->bind_param("d", $questionsId);
            $updatedQuestionsStmt->execute();
            $updatedQuestionsResult = $updatedQuestionsStmt->get_result();
            $updatedQuestions = $updatedQuestionsResult->fetch_assoc();

            return $updatedQuestions; 
        } else {
            // Questions doesn't exist, insert it 
            $insertQuery = "INSERT INTO `questions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`copydisplay`,`front_camera`,`back_camera`,`volume`,`finger_touch`,`speaker`,
                                        `power_btn`,`face_sensor`,`charging_port`,`audio_receiver`,`camera_glass`,`wifi`,`silent_btn`,`battery`,`bluetooth`,`vibrator`,`microphone`,`displayvalue`)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("ssssssssssssssssssssss", $categoryId, $brandId, $seriesId, $productId, $copyDisplay, $frontCamera, $backCamera, $volumeButton, $fingerTouch, $speaker, $powerButton, $faceSensor, $chargingPort, $audioReciever, $cameraGlass, $wifi, $silentButton, $battery, $bluetooth, $vibrator, $microphone, $displayValue);

  
            $insertStmt->execute();

            // Fetch and return inserted questions information
            $insertedQuestionsId = $insertStmt->insert_id;
            $insertedQuestionsQuery = "SELECT * FROM questions WHERE id = ?";
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
        // Check if the questions already exists  
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
        $checkQuery ="SELECT * FROM `questions` WHERE `product_name` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $productId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Questions exists, update it
            $existingQuestions = $checkResult->fetch_assoc(); // Fetch existing questions data
            $questionsId = $existingQuestions['id']; // Get the existing questions ID
            
            $updateQuery = "UPDATE `questions`
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
        
            // Fetch and return updated questions information
            $updatedQuestionsQuery = "SELECT * FROM questions WHERE id = ?";
            $updatedQuestionsStmt = $this->conn->prepare($updatedQuestionsQuery);
            $updatedQuestionsStmt->bind_param("d", $questionsId);
            $updatedQuestionsStmt->execute();
            $updatedQuestionsResult = $updatedQuestionsStmt->get_result();
            $updatedQuestions = $updatedQuestionsResult->fetch_assoc();

            return $updatedQuestions; 
        } else {
            // Questions doesn't exist, insert it 
            $insertQuery = "INSERT INTO `questions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`copydisplay`,`front_camera`,`back_camera`,`volume`,`finger_touch`,`speaker`,
                                        `power_btn`,`face_sensor`,`charging_port`,`audio_receiver`,`camera_glass`,`wifi`,`silent_btn`,`battery`,`bluetooth`,`vibrator`,`microphone`,`displayvalue`)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("ssssssssssssssssssssss", $categoryId, $brandId, $seriesId, $productId, $copyDisplay, $frontCamera, $backCamera, $volumeButton, $fingerTouch, $speaker, $powerButton, $faceSensor, $chargingPort, $audioReciever, $cameraGlass, $wifi, $silentButton, $battery, $bluetooth, $vibrator, $microphone, $displayValue);

  
            $insertStmt->execute();

            // Fetch and return inserted questions information
            $insertedQuestionsId = $insertStmt->insert_id;
            $insertedQuestionsQuery = "SELECT * FROM questions WHERE id = ?";
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