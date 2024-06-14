<?php

ini_set("display_errors",1);
class QuestionsEarbudsManager {
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
            $switchOff = $getdata["Switch Off"]; 
            $speakerMic = $getdata["Speaker/Mic"];
            $connectivity = $getdata["Connectivity"];
            $flawless = $getdata["Flawless"];
            $good = $getdata["Good"];
            $average = $getdata["Averege"];
            $belowAverage = $getdata["Below Averege"];
            $charger = $getdata["Charger"];
            $cable = $getdata["Cable"];
            $invoice = $getdata["Invoice"];
            $outOfWarranty = $getdata["Out Of Warrenty"];
            $below3 = $getdata["Below 3"];
            $threeToSixMonths = $getdata["3 to 6 Months"];
            $sixToElevenMonths = $getdata["6 to 11 Months"];
            $aboveElevenMonths = $getdata["Above 11 Months"];
            $uptoValue = $getdata["Upto Value"];

            // Check if the earpodequestions already exist
            $checkQuery = "SELECT * FROM `earpodequestions` WHERE `product_name` = ?";
            $checkStmt = $this->conn->prepare($checkQuery);
            $checkStmt->bind_param("s", $productId);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();
         
            if ($checkResult->num_rows > 0) {
                // Watch questions exist, update them
                $existingQuestions = $checkResult->fetch_assoc();
                $questionsId = $existingQuestions['id'];

                $updateQuery = "
                    UPDATE `earpodequestions` SET 
                            `categoryid` = ?, 
                            `subcategoryid` = ?, 
                            `childcategoryid` = ?, 
                            `product_name` = ?, 
                            `switchof` = ?, 
                            `speaker/mic` = ?, 
                            `connectivity` = ?, 
                            `charger` = ?, 
                            `cable` = ?, 
                            `invoice` = ?, 
                            `outofwarrenty` = ?, 
                            `below3` = ?, 
                            `3to6` = ?, 
                            `6to11` = ?, 
                            `above11` = ?, 
                            `uptovalue` = ?, 
                            `flawless` = ?, 
                            `good` = ?, 
                            `averege` = ?, 
                            `belowaverege` = ?, 
                            `modify_date` = ?
                               WHERE `id` = ?
                ";
                $updateStmt = $this->conn->prepare($updateQuery);
                $updateStmt->bind_param(
                    "sssssssssssssssssssssi",
                    $categoryId,
                    $brandId,
                    $seriesId,
                    $productId,
                    $switchOff, 
                    $speakerMic, 
                    $connectivity, 
                    $charger, 
                    $cable, 
                    $invoice, 
                    $outOfWarranty, 
                    $below3, 
                    $threeToSixMonths, 
                    $sixToElevenMonths, 
                    $aboveElevenMonths, 
                    $uptoValue, 
                    $flawless, 
                    $good, 
                    $average, 
                    $belowAverage, 
                    $nowDate, 
                    $questionsId
                );

                $updateStmt->execute();

                // Fetch and return updated earpodequestions information
                $updatedQuestionsQuery = "SELECT * FROM `earpodequestions` WHERE `id` = ?";
                $updatedQuestionsStmt = $this->conn->prepare($updatedQuestionsQuery);
                $updatedQuestionsStmt->bind_param("d", $questionsId);
                $updatedQuestionsStmt->execute();
                $updatedQuestionsResult = $updatedQuestionsStmt->get_result();
                $updatedQuestions = $updatedQuestionsResult->fetch_assoc();

                return $updatedQuestions;
            } else {
                // Watch questions don't exist, insert them
                $insertQuery = "
                    INSERT INTO `earpodequestions` (
                        `categoryid`,
                        `subcategoryid`,
                        `childcategoryid`,
                        `product_name`,
                        `switchof`, 
                        `speaker/mic`, 
                        `connectivity`, 
                        `charger`, 
                        `cable`, 
                        `invoice`, 
                        `outofwarrenty`, 
                        `below3`, 
                        `3to6`, 
                        `6to11`, 
                        `above11`, 
                        `uptovalue`, 
                        `flawless`, 
                        `good`, 
                        `averege`, 
                        `belowaverege`
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ";
                $insertStmt = $this->conn->prepare($insertQuery);
                $insertStmt->bind_param(
                    "iiisssssssssssssssss",
                    $categoryId,
                    $brandId,
                    $seriesId,
                    $productId,
                    $switchOff, 
                    $speakerMic, 
                    $connectivity, 
                    $charger, 
                    $cable, 
                    $invoice, 
                    $outOfWarranty, 
                    $below3, 
                    $threeToSixMonths, 
                    $sixToElevenMonths, 
                    $aboveElevenMonths, 
                    $uptoValue, 
                    $flawless, 
                    $good, 
                    $average, 
                    $belowAverage
                );

                $insertStmt->execute();

                // Fetch and return inserted earpodequestions information
                $insertedQuestionsId = $insertStmt->insert_id;
                $insertedQuestionsQuery = "SELECT * FROM `earpodequestions` WHERE `id` = ?";
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