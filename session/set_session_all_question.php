<?php
// Start the session
session_start();

// Check if data is received from the client
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data sent from the client
 
    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }
    // history
$historyCount = isset($_SESSION['historyCount'])? $_SESSION['historyCount']+1:1; 
$_SESSION["historyCount"] = $historyCount;
    // query
    
  if(isset($_POST['query'])){
        $call = $_POST['call']; 
        $war = $_POST['war'];

        // Set session variables 
        $_SESSION['callin'] = $call==="no"?"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To Take Calls":"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To Take Calls";
    
        $_SESSION['war'] = $call === "no" ? "no" : $war;
    }
    header('Content-Type: application/json');
    // echo $_SESSION;
    echo json_encode($_SESSION);
  
} else {
    // Send an error response if the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Error: Invalid request method.";
}
?>