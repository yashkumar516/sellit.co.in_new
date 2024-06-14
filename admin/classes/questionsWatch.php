<?php

ini_set("display_errors",1);
class QuestionsManagerWatch {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function upsertQuestions($getdata, $categoryId, $productId, $brandId, $seriesId) {
        // try {
            // Create a DateTime object for the current time
            $currentDateTimeObject = new DateTime();
            $nowDate = $currentDateTimeObject->format('Y-m-d H:i:s.u');
            
            // Extract data from $getdata array
            $switch_off = $getdata["Switch Off"];
            $touch = $getdata["Touch"];
            $wifi = $getdata["Wifi"];
            $battery = $getdata["Battery"];
            $magnetic = $getdata["Magnetic"];
            $side_button = $getdata["Side Button"];
            $digital_crown = $getdata["Digital Crown"];
            $speaker = $getdata["Speaker"];
            $optical_heart = $getdata["Optical Heart"];
            $bluetooth = $getdata["Bluetooth"];
            $charger = $getdata["Charger"];
            $box = $getdata["Box"];
            $strap = $getdata["Strap"];
            $bill = $getdata["Bill"];
            $flawless = $getdata["Flawless"];
            $good = $getdata["Good"];
            $average = $getdata["Average"]; // Corrected spelling
            $below_average = $getdata["Below Average"]; // Corrected spelling
            $out_of_warranty = $getdata["Out of Warranty"]; // Corrected spelling
            $under_3_months = $getdata["Under 3 Months"];
            $three_to_six_months = $getdata["3 to 6 Months"];
            $six_to_eleven_months = $getdata["6 to 11 Months"];
            $above_eleven_months = $getdata["Above 11 Months"];
            $upto_value = $getdata["Upto Value"];

            // Check if the watchquestions already exist
            $checkQuery = "SELECT * FROM `watchquestions` WHERE `product_name` = ?";
            $checkStmt = $this->conn->prepare($checkQuery);
            $checkStmt->bind_param("s", $productId);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();
         
            if ($checkResult->num_rows > 0) {
                // Watch questions exist, update them
                $existingQuestions = $checkResult->fetch_assoc();
                $questionsId = $existingQuestions['id'];

                $updateQuery = "
                    UPDATE `watchquestions` SET
                        `categoryid` = ?,
                        `subcategoryid` = ?,
                        `childcategoryid` = ?,
                        `product_name` = ?,
                        `switchof` = ?,
                        `under3` = ?,
                        `3to6` = ?,
                        `6to11` = ?,
                        `above11` = ?,
                        `touchfaulty` = ?,
                        `wifi` = ?,
                        `batteryfault` = ?,
                        `magnetic` = ?,
                        `sidebutton` = ?,
                        `digitalcrown` = ?,
                        `speaker` = ?,
                        `opticalheart` = ?,
                        `bluetoothfault` = ?,
                        `charger` = ?,
                        `box` = ?,
                        `strap` = ?,
                        `bill` = ?,
                        `flawless` = ?,
                        `good` = ?,
                        `averege` = ?,
                        `belowavere` = ?,
                        `outofwarrenty` = ?,
                        `uptovalue` = ?
                    WHERE `id` = ?
                ";
                $updateStmt = $this->conn->prepare($updateQuery);
                $updateStmt->bind_param(
                    "ssssssssssssssssssssssssssssi",
                    $categoryId,
                    $brandId,
                    $seriesId,
                    $productId,
                    $switch_off,
                    $under_3_months,
                    $three_to_six_months,
                    $six_to_eleven_months,
                    $above_eleven_months,
                    $touch,
                    $wifi,
                    $battery,
                    $magnetic,
                    $side_button,
                    $digital_crown,
                    $speaker,
                    $optical_heart,
                    $bluetooth,
                    $charger,
                    $box,
                    $strap,
                    $bill,
                    $flawless,
                    $good,
                    $average,
                    $below_average,
                    $out_of_warranty,
                    $upto_value,
                    $questionsId
                );

                $updateStmt->execute();

                // Fetch and return updated watchquestions information
                $updatedQuestionsQuery = "SELECT * FROM `watchquestions` WHERE `id` = ?";
                $updatedQuestionsStmt = $this->conn->prepare($updatedQuestionsQuery);
                $updatedQuestionsStmt->bind_param("d", $questionsId);
                $updatedQuestionsStmt->execute();
                $updatedQuestionsResult = $updatedQuestionsStmt->get_result();
                $updatedQuestions = $updatedQuestionsResult->fetch_assoc();

                return $updatedQuestions;
            } else {
                // Watch questions don't exist, insert them
                $insertQuery = "
                    INSERT INTO `watchquestions` (
                        `categoryid`,
                        `subcategoryid`,
                        `childcategoryid`,
                        `product_name`,
                        `switchof`, 
                        `under3`,
                        `3to6`,
                        `6to11`,
                        `above11`,
                        `touchfaulty`, 
                        `wifi`,
                        `batteryfault`,
                        `magnetic`,
                        `sidebutton`,
                        `digitalcrown`, 
                        `speaker`,
                        `opticalheart`,
                        `bluetoothfault`,
                        `charger`,
                        `box`, 
                        `strap`,
                        `bill`,
                        `flawless`,
                        `good`,
                        `averege`, 
                        `belowavere`,
                        `outofwarrenty`,
                        `uptovalue` 
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ";
                $insertStmt = $this->conn->prepare($insertQuery);
                $insertStmt->bind_param(
                    "iiisssssssssssssssssssssssss",
                    $categoryId,
                    $brandId,
                    $seriesId,
                    $productId,
                    $switch_off,
                    $under_3_months,
                    $three_to_six_months,
                    $six_to_eleven_months,
                    $above_eleven_months,
                    $touch,
                    $wifi,
                    $battery,
                    $magnetic,
                    $side_button,
                    $digital_crown,
                    $speaker,
                    $optical_heart,
                    $bluetooth,
                    $charger,
                    $box,
                    $strap,
                    $bill,
                    $flawless,
                    $good,
                    $average,
                    $below_average,
                    $out_of_warranty,
                    $upto_value
                );

                $insertStmt->execute();

                // Fetch and return inserted watchquestions information
                $insertedQuestionsId = $insertStmt->insert_id;
                $insertedQuestionsQuery = "SELECT * FROM `watchquestions` WHERE `id` = ?";
                $insertedQuestionsStmt = $this->conn->prepare($insertedQuestionsQuery);
                $insertedQuestionsStmt->bind_param("d", $insertedQuestionsId);
                $insertedQuestionsStmt->execute();
                $insertedQuestionsResult = $insertedQuestionsStmt->get_result();
                $insertedQuestions = $insertedQuestionsResult->fetch_assoc();

                return $insertedQuestions;
            }
        // } catch (Exception $e) {
        //     // Handle any exceptions or errors here
        //     return null; // or throw an exception, log error, etc.
        // }
    }
}

?>