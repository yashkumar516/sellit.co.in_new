<?php
// Start the session
session_start();

// Check if data is received from the client
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $_PAGE_DATA = array();

    if (isset($_POST['page']) && $_POST['page']==="productQueryPage") { 
        $call= $_POST['call'];
        $callin= $_POST['callin'];
        $screen= $_POST['screen'];
        $screenin= $_POST['screenin'];
        $body= $_POST['body'];
        $bodyin= $_POST['bodyin'];
        $war= $_POST['war'];
        $warin= $_POST['warin']; 
        $devicedetail= $_POST['devicedetail']; 
        $params= $_POST['params']; 
        unset($_SESSION["currentData"]);
            $_SESSION["currentData"]["call"] = $call;
            $_SESSION["currentData"]["callin"] = $callin;
            $_SESSION["currentData"]["screen"] = $screen;
            $_SESSION["currentData"]["screenin"] = $screenin;
            $_SESSION["currentData"]["body"] = $body;
            $_SESSION["currentData"]["bodyin"] = $bodyin;
            $_SESSION["currentData"]["war"] = $war;
            $_SESSION["currentData"]["warin"] = $warin;
            $_SESSION["currentData"]["devicedetail"] = $devicedetail;
            $_SESSION["currentData"]["params"] = $params;
            $_SESSION["currentData"]["page"] = $_POST['page'];
            $_PAGE_DATA["call"] = $call;
            $_PAGE_DATA["callin"] = $callin;
            $_PAGE_DATA["screen"] = $screen;
            $_PAGE_DATA["screenin"] = $screenin;
            $_PAGE_DATA["body"] = $body;
            $_PAGE_DATA["bodyin"] = $bodyin;
            $_PAGE_DATA["war"] = $war;
            $_PAGE_DATA["warin"] = $warin;
            $_PAGE_DATA["devicedetail"] = $devicedetail;
        
    } else{
        
        foreach ($_POST as $key => $value) {
            $_SESSION["currentData"][$key] = $value;
            $_PAGE_DATA[$key] = $value;
        }
    }



    if(isset($_POST['query'])){
        $call = $_POST['call']; 
        $war = $_POST['war'];

        // Set session variables 
        $_SESSION['callin'] = $call==="no"?"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Not Able To Take Calls":"<i class='fas fa-dot-circle' style='font-size:10px;margin-right:12px;color:#1B6C9E;' ></i>Able To Take Calls";
    
        $_SESSION['war'] = $call === "no" ? "no" : $war;
    }
    
    $_SESSION["pPage"] = isset($_SESSION['page']) ? $_SESSION['page'] : "";
    $pvsData = isset($_SESSION['pPage']) && isset($_SESSION[$_SESSION["pPage"]]) ? $_SESSION[$_SESSION["pPage"]] : $_SESSION["currentData"];

    // If a page is submitted via POST, update session data
    
    if (isset($_POST['page']) && $_POST['page']==="productQueryPage") { 
        
        foreach ($_SESSION as $key => $value) {
            if($key!=="user" && $key !=="currentData"){
                unset($_SESSION[$key]);
            } 
            
        }
            
        $_SESSION["productQueryPage"]= array();
        $_SESSION["functionalPage"]= array();
        $_SESSION["mobileAgePage"]= array();
        $_SESSION["productNewPage"]= array();
        $_SESSION["defectPage"]= array();
        // unset($_SESSION["productQueryPage"]);
        $_SESSION["productQueryPage"] = array_merge(  $_PAGE_DATA);
    } else if (isset($_POST['page']) && $_POST['page']==="functionalPage") { 
        unset($_SESSION["functionalPage"]);
        $_SESSION["functionalPage"] = array_merge($pvsData, $_PAGE_DATA);
    } else if (isset($_POST['page']) && $_POST['page']==="mobileAgePage") { 
        unset($_SESSION["mobileAgePage"]);
        $_SESSION["mobileAgePage"] = array_merge($pvsData, $_PAGE_DATA);
        
    } else if (isset($_POST['page']) && $_POST['page']==="productNewPage") { 
        unset($_SESSION["productNewPage"]);
        $_SESSION["productNewPage"] = array_merge($pvsData, $_PAGE_DATA);
    } else if (isset($_POST['page']) && $_POST['page']==="defectPage") { 
        unset($_SESSION["defectPage"]);
        $_SESSION["defectPage"] = array_merge($pvsData, $_PAGE_DATA);
    }
    // productQueryPage
    // defectPage, functionalPage, mobileAgePage, productNewPage
    header('Content-Type: application/json');
    // echo $_SESSION;
    echo json_encode($_SESSION);
  
} else {
    // Send an error response if the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Error: Invalid request method.";
}
?>