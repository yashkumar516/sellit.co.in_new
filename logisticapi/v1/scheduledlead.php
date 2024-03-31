<?php
session_start();
// ini_set("display_errors", 1);
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: POST");
header("Content-type:application/json; charset=UTF-8");

function GENERATELOGS_API($DATA, $BLOCK, $flag = 0)
{
    $file_name = "/var/log/aakarist/leadscheduled.txt";
    if (file_exists($file_name)) {
        $fp     =       fopen($file_name, "a+");
        fwrite($fp, date("Y-m-d H:i:s") . "\t");
        if ($flag == 1) {
            fwrite($fp, "(" . $BLOCK . ")\n");
            fwrite($fp, print_r($DATA, true));
            fwrite($fp, "\n\n");
        } else {
            fwrite($fp, "(" . $BLOCK . ")=====" . $DATA . "\n");
        }
        fclose($fp);
    }
}

include_once("../config/database.php");
include_once("../classes/users.php");


$db = new  Database();

$connection = $db->connect();

$user_obj = new  Users($connection);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    GENERATELOGS_API($_POST, "[REQUEST PACKET]", 1);
    if (!empty($_POST['lead_id']) && !empty($_POST['date']) && !empty($_POST['timefrom']) && !empty($_POST['timeto']) && !empty($_POST['reason'])) {
        $user_obj->lead_id = $_POST['lead_id'];
        $user_obj->reason = $_POST['reason'];
        $from = $_POST['timefrom'];
        $to = $_POST['timeto'];
        $time = $from . '-' . $to;
        $newdate = date('d-m-y', strtotime($_POST['date']));
        $user_obj->date = date('y', strtotime($newdate));
        $user_obj->year = date('d', strtotime($newdate));
        $m = date('d', strtotime($newdate));
        $day = date("F", mktime(0, 0, 0, $m, $user_obj->year));
        $user_obj->day = $day;
        //  start month
        $ttt = strtotime($newdate);
        $user_obj->month = date("F", $ttt);
        // end month
        $user_obj->soon = '';
        $user_obj->scheduletime = $time;
        $ajant_dat = $user_obj->leadscheduled();
        if (!empty($ajant_dat)) {
            http_response_code(200);
            echo json_encode(array(
                "status" => "1",
                "message" => "lead shecduled successfully"
            ));
        } else {
            http_response_code(200);
            echo json_encode(array(
                "status" => 0,
                "message" => "lead not shecduled successfully"
            ));
        }
    } else {
        http_response_code(200);
        echo json_encode(array(
            "status" => 0,
            "message" => "please enter lead_id date and time"
        ));
    }
} else {
    http_response_code(503);
    echo json_encode(array(
        "status" => 0,
        "message" => "method should be post"
    ));
}