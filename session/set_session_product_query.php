<?php
// Start the session
session_start();

// Check if data is received from the client
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data sent from the client
   
    $vid = $_POST['vid'];
    $mid = $_POST['mid'];
    $bid = $_POST['bid'];
    $call = $_POST['call'];
    // $callin = $_POST['callin'];
    // $screen = $_POST['screen'];
    // $body = $_POST['body'];
    $war = $_POST['war'];

    // Set session variables
    $_SESSION['vid'] = $vid;
    $_SESSION['mid'] = $mid;
    $_SESSION['bid'] = $bid;
    $_SESSION['callin'] = $call==="no"?"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To Take Calls":"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To Take Calls";
    // $_SESSION['screen'] = $screen;
    // $_SESSION['body'] = $body;

    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }
    $_SESSION['war'] = $call === "no" ? "no" : $war;

    // print_r($_POST);
    // echo $_POST;
    // exit();
    echo "Session variables set successfully.";
    // Construct the redirection URL based on the conditions
    // if ($screen == "yes" && $body == "yes" && $war == "yes") {
    //     header("Location: product-new.php?vid=$vid&mid=$mid&bid=$bid");
    // } else if ($screen == "no" && $body == "no" && $war == "no") {
    //     header("Location: functional.php?vid=$vid&mid=$mid&bid=$bid");
    // } else if ($screen == "yes" && $body == "no" && $war == "no") {
    //     header("Location: product-new1.php?vid=$vid&mid=$mid&bid=$bid");
    // } else if ($screen == "no" && $body == "yes" && $war == "no") {
    //     header("Location: defect1.php?vid=$vid&mid=$mid&bid=$bid");
    // } else if ($screen == "no" && $body == "yes" && $war == "yes") {
    //     header("Location: defect.php?vid=$vid&mid=$mid&bid=$bid");
    // } else if ($screen == "no" && $body == "no" && $war == "yes") {
    //     header("Location: mobileage.php?vid=$vid&mid=$mid&bid=$bid");
    // } else if ($screen == "yes" && $body == "no" && $war == "yes") {
    //     header("Location: product-new2.php?vid=$vid&mid=$mid&bid=$bid");
    // } else if ($screen == "yes" && $body == "yes" && $war == "no") {
    //     header("Location: product-new3.php?vid=$vid&mid=$mid&bid=$bid");
    // } else {
    //     // Handle other cases or provide a default redirection
    //     header("Location: default_page.php");
    // }

    // // Make sure to exit after redirection
    // exit();
} else {
    // Send an error response if the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Error: Invalid request method.";
}
?>