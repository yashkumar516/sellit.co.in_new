<?php
// Start the session
session_start();

// Check if data is received from the client
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data sent from the client
    

    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    } 
 
    echo "Session variables set successfully.";
   
} else {
    // Send an error response if the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Error: Invalid request method.";
}
?>