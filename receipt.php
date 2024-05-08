<?php
session_start();
include 'admin/includes/confile.php';
?>
<?php
 if (isset($_REQUEST['eId'])) {
    $receiptId = $_REQUEST['eId'];


    
    $eId = $_REQUEST['eId'];
    $date ="";
    $modelName = "";
    $offerPrice = 0;
    $extraAmount = 0;
    $totalAmount = 0;
    $genorderId ="";
    $imeiNo = "";
    $status = "";
    $vendorAddress = "";
    $vendorCity = "";
    $vendorPincode = "";
    $vendorMobile = "";
    
    $userId = "";
    $userName ="";
    $userEmail = "";
    $userMobile = "";
    $userHouseNo = "";
    $userLandmark ="";
    $userLocation = "";
    $userPincode = "";
    $userCity = "";
    $userState = "";

    
    $receiptInfoQuery = mysqli_query($con, "SELECT  
    `enquiry`.`id` as `eId`,
    `enquiry`.`modify_date` as `date`,
    `enquiry`.`model_name` as `modelName`,
    `enquiry`.`offerprice` as `offerPrice`,
    `enquiry`.`extraamount` as `extraAmount`,
    `enquiry`.`genorderid` as `genorderId`,
    `enquiry`.`emino` as `imeiNo`,
    `enquiry`.`status` as `status`,
    `vendors`.`presentadd` as `vendorAddress`,
    `vendors`.`city` as `vendorCity`,
    `vendors`.`pincode` as `vendorPincode`,
    `vendors`.`mobileno` as `vendorMobile`,
    `address1`.`uid` as `userId`,
    `userrecord`.`name` as `userName`,
    `userrecord`.`email` as `userEmail`,
    `userrecord`.`mobile` as `userMobile`,
    `address1`.`flatno` as `userHouseNo`,
    `address1`.`landmark` as `userLandmark`,
    `address1`.`location` as `userLocation`,
    `address1`.`pincode` as `userPincode`,
    `address1`.`city` as `userCity`,
    `address1`.`state` as `userState`,
    `address`.`enquid`, `vendors`.`id` as `vId`, `address1`.`id` as `addressId`
    FROM `enquiry` 
    JOIN `address` ON `address`.`enquid` = `enquiry`.`id` 
    JOIN `userrecord` ON `userrecord`.`id` = `enquiry`.`userid` 
    JOIN `vendors` ON `vendors`.`id` = `enquiry`.`vendor_id` 
    JOIN `address1` ON `address1`.`id` = `address`.`addressid` 
    WHERE `enquiry`.`genorderid` = '$receiptId'");
 
  
    if ($receiptInfoQuery) {
        $receiptInfo = mysqli_fetch_assoc($receiptInfoQuery);
     
        if ($receiptInfo) {
            // Populate variables with retrieved data
            $eId = $receiptInfo['eId'];
            // $date = $receiptInfo['date'];
            
            $date = date('d M Y',strtotime($receiptInfo['date'])); 
            $modelName = $receiptInfo['modelName'];
            $offerPrice = $receiptInfo['offerPrice'];
            $extraAmount = $receiptInfo['extraAmount'];
            $genorderId = $receiptInfo['genorderId'];
            $imeiNo = $receiptInfo['imeiNo'];
            $status = $receiptInfo['status'];
            $vendorAddress = $receiptInfo['vendorAddress'];
            $vendorCity = $receiptInfo['vendorCity'];
            $vendorPincode = $receiptInfo['vendorPincode'];
            $vendorMobile = $receiptInfo['vendorMobile'];
            $vendorEmail = $receiptInfo['vendorEmail'];
            // Other variables...
            
    $userId = $receiptInfo['userId'];
    $userName = $receiptInfo['userName'];
    $userEmail = $receiptInfo['userEmail'];
    $userMobile = $receiptInfo['userMobile'];
    $userHouseNo = $receiptInfo['userHouseNo'];
    $userLandmark = $receiptInfo['userLandmark'];
    $userLocation = $receiptInfo['userLocation'];
    $userPincode = $receiptInfo['userPincode'];
    $userCity = $receiptInfo['userCity'];
    $userState = $receiptInfo['userState']; 
   $totalAmount= round($offerPrice + $extraAmount,2) ;
        } 
    } else {
        // Handle query execution error
        // echo "Error executing query: " . mysqli_error($con);
        echo "<script>
        window.location.href = '/';
      </script>";
    }
} else {
    // Redirect the user or display an error message
    // header("Location: /"); // Redirect to home page
    // echo "Error: eId parameter not set"; // Display error message
    echo "<script>
    window.location.href = '/';
  </script>";
}

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
function convertPriceToWords($price) {
    // $price="2s000";
    // Array of words for numbers
    $words = array(
        '',
        'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine',
        'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen',
        'twenty', 30 => 'thirty', 40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
    );

    // Array of scale words
    $scale = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion');

    // Split the number into segments of 3 digits
    $chunks = array_chunk(array_reverse(str_split((string) $price)), 3, true);

    // Initialize the result
    $result = '';

    // print_r($price);
    // echo "chunks--".$chunks;
    // print_r($chunks);
    // Loop through each chunk
    foreach ($chunks as $key => $chunk) {
        // Skip zero chunks
        if ($chunk == array('0' => '0')) continue;

        // Initialize the chunk result
        $chunkResult = '';

        // Process the hundreds place
        if (isset($chunk[2]) && $chunk[2] != '0') {
            $chunkResult .= $words[$chunk[2]] . ' hundred';
            if (isset($chunk[1]) && isset($chunk[0]) && ($chunk[1] != '0' || $chunk[0] != '0')) {
                $chunkResult .= ' and ';
            }
        }

        // Process the tens and ones place
        if (isset($chunk[1])) {
            $tens = $chunk[1] . $chunk[0];
            if ($tens != '0') {
                if ($tens < 20) {
                    $chunkResult .= $words[$tens];
                } else {
                    $chunkResult .= $words[$chunk[1] * 10];
                    if (isset($chunk[0]) && $chunk[0] != '0') {
                        $chunkResult .= '-' . $words[$chunk[0]];
                    }
                }
            }
        }

        // Add scale word if necessary
        if ($chunkResult != '') {
            $chunkResult .= ' ' . $scale[$key];
        }

        // echo "chunkResult--";
        // print_r($chunkResult);
        // echo "result--" ;
        // print_r($result);
        // Append the chunk result to the overall result
        $result = $chunkResult . ' ' . $result;
    }
    // echo "price--".$result;
    return trim($result);
} 
function convertPriceToWords2($num){ 
    $decones = array( 
                '01' => "One", 
                '02' => "Two", 
                '03' => "Three", 
                '04' => "Four", 
                '05' => "Five", 
                '06' => "Six", 
                '07' => "Seven", 
                '08' => "Eight", 
                '09' => "Nine", 
                10 => "Ten", 
                11 => "Eleven", 
                12 => "Twelve", 
                13 => "Thirteen", 
                14 => "Fourteen", 
                15 => "Fifteen", 
                16 => "Sixteen", 
                17 => "Seventeen", 
                18 => "Eighteen", 
                19 => "Nineteen" 
                );
    $ones = array( 
                0 => " ",
                1 => "One",     
                2 => "Two", 
                3 => "Three", 
                4 => "Four", 
                5 => "Five", 
                6 => "Six", 
                7 => "Seven", 
                8 => "Eight", 
                9 => "Nine", 
                10 => "Ten", 
                11 => "Eleven", 
                12 => "Twelve", 
                13 => "Thirteen", 
                14 => "Fourteen", 
                15 => "Fifteen", 
                16 => "Sixteen", 
                17 => "Seventeen", 
                18 => "Eighteen", 
                19 => "Nineteen" 
                ); 
    $tens = array( 
                0 => "",
                2 => "Twenty", 
                3 => "Thirty", 
                4 => "Forty", 
                5 => "Fifty", 
                6 => "Sixty", 
                7 => "Seventy", 
                8 => "Eighty", 
                9 => "Ninety" 
                ); 
    $hundreds = array( 
                "Hundred", 
                "Thousand", 
                "Million", 
                "Billion", 
                "Trillion", 
                "Quadrillion" 
                ); //limit t quadrillion 
    $num = number_format($num,2,".",","); 
    $num_arr = explode(".",$num); 
    $wholenum = $num_arr[0]; 
    $decnum = $num_arr[1]; 
    $whole_arr = array_reverse(explode(",",$wholenum)); 
    krsort($whole_arr); 
    $rettxt = ""; 
    foreach($whole_arr as $key => $i){ 
        if($i < 20){ 
            $rettxt .= $ones[$i]; 
        }
        elseif($i < 100){ 
            $rettxt .= $tens[substr($i,0,1)]; 
            $rettxt .= " ".$ones[substr($i,1,1)]; 
        }
        else{ 
            $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
            $rettxt .= " ".$tens[substr($i,1,1)]; 
            $rettxt .= " ".$ones[substr($i,2,1)]; 
        } 
        if($key > 0){ 
            $rettxt .= " ".$hundreds[$key]." "; 
        } 
    
    } 
    $rettxt = $rettxt." peso/s";
    
    if($decnum > 0){ 
        $rettxt .= " and "; 
        if($decnum < 20){ 
            $rettxt .= $decones[$decnum]; 
        }
        elseif($decnum < 100){ 
            $rettxt .= $tens[substr($decnum,0,1)]; 
            $rettxt .= " ".$ones[substr($decnum,1,1)]; 
        }
        $rettxt = $rettxt." centavo/s"; 
    } 
    return $rettxt;}
 
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="q-24As6IUgQYlnT2-RVsVVYP07YI6kxtdMd_gNndDVg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/mob.css">
    <link rel="stylesheet" href="assets/css/about.css">
    <script src="assets/pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <script src="https://kit.fontawesome.com/695826c815.js" crossorigin="anonymous"></script>
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-E422DMN5YS"></script>

    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-E422DMN5YS');
    </script> -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DYH2D4QESB"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-DYH2D4QESB');
    </script>
    <meta name="google-site-verification" content="XcbXug-z0EtzkdTsIB7RGWJ5SIBGOILe_5kUiuwdp_0"   />
</head>

<body oncontextmenu="return false;">



    <style>
    .invoice_wrap {
        height: 150vh !important;
        /* margin: 0px 50px; */
    }

    .blue-gradient {
        background: linear-gradient(260deg, #487d9d, #276f9a, #1a6da0) !important;
        height: 150px;
        border-radius: unset;
        border-color: unset;
    }

    .btn-outline-info {
        color: #1a6da0;
        border-color: #1a6da0;
    }

    .btn-outline-info:focus,
    .btn-outline-info:hover,
    .btn-outline-info:active {
        color: #fff;
        background-color: #1a6da0;
        border-color: #1a6da0;
    }

    .invoice-container {
        position: absolute;
        top: 50px;
        padding: 0px 40px;
        width: 97%;
    }

    .invoice-container-table {
        margin-top: -135px;
        background: #fff;
        margin-left: 55px;
        margin-right: 55px;
    }

    .invoice-content-wrap {
        /* width: 100%; */
        /* height: 100px; */
        background: #fff;
        margin-bottom: 20px;
    }

    .agency-service-content {
        border: dashed 3px #447b9c;
        min-height: 100px;
        padding: 5px;
    }

    .service-content {
        border: dashed 3px #447b9c;
        min-height: 100px;
        padding: 5px;
    }

    .bus-invo-no-date-wrap {
        text-align: center;
    }

    .dark {
        margin: 0;
        border-bottom: solid 3px #434141;
    }

    .fade-view {
        margin: 0;
        border-bottom: solid 3px #d6d6d6;
    }

    .bus-invo-no-date-wrap span {
        color: #1a6da0;
        font-weight: 600;
    }

    .invoice-owner-conte-wrap h5 {
        background-color: #f0f0f0;
        text-align: center;
        font-size: 18px;
        font-weight: 600;
    }

    .invoice-owner-conte-wrap p {
        /* background-color: #f0f0f0; */
        margin: 0;
        text-align: center;
        /* font-size: 18px;
    font-weight: 600; */
    }

    .table-wrapper {
        padding: 50px 0 20px;
    }

    .invoice-table {
        border-collapse: collapse;
        width: 100%;
        max-width: 860px;
        margin: 0 auto;
        white-space: nowrap;
        background-color: #ffffff;

        text-align: center;
    }

    .invoice-table.border {
        border: 2px solid #dadada;
        border-radius: 5px;
    }

    .invoice-table td,
    .invoice-table th {
        text-align: center;
    }

    .invoice-table td {
        /* color: #505050;
    font-size: 14px; */
        color: #000000;
        /*color: #A2A2A2;*/
        font-size: 15px;
        line-height: 22px;
        padding: 20px 0;
    }

    td.invo-tb-data.third-color {
        color: #A2A2A2;
    }

    .invoice-table-dark td {
        color: #000000;
        /*color: #A2A2A2;*/
        font-size: 15px;
        line-height: 22px;
        padding: 20px 0;
    }

    .invoice-table thead th {
        color: #12151C;
        padding: 10px 0;
    }

    .invo-tb-body .invo-tb-row {
        border-bottom: 1px solid #888888;
    }

    .invo-tb-body .invo-tb-row:last-child {
        border-bottom: none;
    }

    .invo-tb-body {
        /* border-bottom: 2px solid #12151C;
    border-top: 2px solid #12151C; */
    }

    .invo-left-border {
        border-left: 2px solid #dadada;
    }

    .invo-table-title {
        background-color: #f0f0f0;
        text-align: center;
    }

    .invoice-table .invo-tb-payment {
        text-align: right;
        color: #1a6da0;

    }

    @media only screen and (max-width: 1080px) {

        td {
            font-size: 14px !important;
        }

        .invoice-table td {
            padding: 15px 0px;
            font-size: 14px !important;
        }

        h2 {
            font-size: 1.8rem;
        }

        h5 {
            font-size: 18px !important;
        }

        p,
        li a {
            font-size: 16px;
        }

        .invo-tb-header.bottom {
            font-size: 14px;
        }

        .medium-font {
            /* padding: 6px 0px !important; */
            font-size: 14px !important;
        }
    }

    @media only screen and (max-width: 980px) {

        td {
            font-size: 12px !important;
        }

        .invoice-table td {
            padding: 10px 0px;
            font-size: 12px !important;
        }

        h2 {
            font-size: 1.5rem;
        }

        h5 {
            font-size: 16px !important;
        }

        p,
        li a {
            font-size: 14px;
        }

        .invo-tb-header.bottom {
            font-size: 12px;
        }

        .bottom th {
            /* padding: 6px 0px !important; */
            font-size: 14px !important;
        }

        /* Styles for tablets and smaller screens */
        .invoice_wrap {
            height: auto !important;
        }

        .blue-gradient {
            height: 100px;
        }

        .invoice-container {
            padding: 0px 20px;
        }

        .invoice-container-table {
            margin-top: -135px;
            margin-left: 35px;
            margin-right: 35px;
        }

        .service-content {
            width: 100%;
            padding: 10px;
        }

        .table-wrapper {
            padding: 20px 0;
        }

        .invoice-table {
            font-size: 14px;
        }

        .medium-font {
            /* padding: 6px 0px !important; */
            font-size: 14px !important;
        }
    }

    @media only screen and (max-width: 768px) {
        .logo img {
            width: 204px;
        }

        /* Styles for tablets and smaller screens */
        .invoice_wrap {
            height: auto !important;
            margin: 10px 0px;
            padding: 10px 0px;
        }

        .blue-gradient {
            height: 100px;
        }

        .invoice-container {
            padding: 0px 20px;
        }

        .invoice-container-table {
            margin-top: -100px;
            margin-left: 30px;
            margin-right: 30px;
        }

        .service-content {
            width: 100%;
            padding: 10px;
        }

        .table-wrapper {
            padding: 20px 0;
        }

        .invoice-table {
            font-size: 14px;
        }

        .medium-font {
            /* padding: 6px 0px !important; */
            font-size: 12px !important;
        }

        .invoice-table thead th {
            padding: 8px 0;
        }
    }

    @media only screen and (max-width: 480px) {
        .logo img {
            width: 164px;
        }

        td {
            font-size: 9px !important;
        }

        .invoice-table td {
            padding: 8px 0px;
            font-size: 9px !important;
        }

        h2 {
            font-size: 1.0rem;
        }

        h5,
        h6 {
            font-size: 10px !important;
        }

        p,
        li a {
            font-size: 10px;
        }

        .invo-tb-header.bottom {
            font-size: 9px;
        }

        .bottom th {
            /* padding: 6px 0px !important; */
            font-size: 10px !important;
        }

        /* Styles for mobile devices */
        .invoice-container {
            padding: 0px 10px;
        }

        .invoice-container-table {
            margin-top: -90px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .service-content {
            width: 100%;
            padding: 5px;
        }

        .table-wrapper {
            padding: 10px 0;
        }

        .invoice-table {
            font-size: 12px;
        }

        .invoice-table thead th {
            padding: 4px 0;
        }
    }

    #div_top_hypers {
        background-color: #eeeeee;
        display: inline;
    }

    #ul_top_hypers li {
        display: inline;
        /* text-transform: uppercase; */
        color: #fff;
        /* border-left: #fff ; */
        border-left: solid 2px #fff;
    }

    #ul_top_hypers:first-child {
        text-transform: uppercase;
    }

    #ul_top_hypers li:first-child {
        border-left: unset;
    }

    #ul_top_hypers li a {
        color: #fff;
    }

    .blue-gradient.bottom {
        height: auto !important;
    }
    </style>

    <!-- .col-	.col-sm-	.col-md-	.col-lg-	.col-xl-	.col-xxl- -->
    <div id="contentToPrint" class="  m-1 m-sm-2 m-md-3 m-lg-5  px-1 px-sm-2 px-md-3 px-lg-5 text-center h-100">
        <div id="contentToPrint"
            class="invoice_wrap  m-1 m-sm-2 m-md-3 m-lg-5  px-1 px-sm-2 px-md-3 px-lg-5  text-center">
            <div class="text-right py-2">
                <a href="javascript:window.print()" class="print-btn btn btn-sm btn-outline-info f-right ">
                    <i class="fa fa-print" aria-hidden="true"></i>
                    <span class="inter-700 medium-font">Print</span>
                </a>
                <button class="print-btn btn btn-sm btn-outline-info f-right "
                    onclick="downloadReceipt('sellit-receipt')"> <i class="fa fa-download" aria-hidden="true"></i>
                    Download
                    PDF</button>
            </div>

            <div class="  blue-gradient   mb-3 mx-auto   ">

            </div>
            <div class="  invoice-container-table mb-5">
                <div class="invoice-content-wrap px-3 mb-5" id="invoice">
                    <!--Header Start Here -->
                    <!-- C:\xampp\htdocs\sellit\assets\images\logo.png -->
                    <header class="invoice-header  content-min-width ecommerce-header" id="invo_header">
                        <div class="invoice-logo-content hide">
                            <div class="invoice-logo text-center   p-1 p-sm-2 p-md-3 p-lg-5">
                                <a href="/" class="logo"><img src="./assets/images/logo-1.png" alt="sellit logo"></a>

                            </div>
                        </div>
                    </header>
                    <div class="service-content  py-1 py-sm-2 py-md-3 py-lg-3  px-1 px-sm-2 px-md-3 px-lg-5"
                        style="width: 100%; border: dashed 3px #447b9c;">

                        <table class="invoice-header " style="width: 100%;">
                            <tr>
                                <td colspan="2" class="text-center">
                                    <h2>PURCHASE RECEIPT</h2>
                                </td>
                            </tr>
                            <tr class="bus-invo-no-date-wrap text-center ">
                                <td>
                                    <p>Service No.<span><?php echo $eId?></span> </p>
                                </td>

                                <td>
                                    <p>Date: <span><?php echo $date?></span> </p>
                                </td>
                            </tr>
                        </table>
                        <hr class="dark" />
                        <table class=" invoice-owner-conte-wrap " style="width:100%;">
                            <tr>
                                <td colspan="2" class="text-center">
                                    <h5 class="m-1 m-sm-2 m-md-2 m-lg-2 p-1 p-sm-2 p-md-3 p-lg-3">PURCHASER</h5>
                                </td>
                                <td colspan="2" class="text-center">
                                    <h5 class="  m-1 m-sm-2 m-md-2 m-lg-2 p-1 p-sm-2 p-md-3 p-lg-3">
                                        SELLER</h5>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">

                                    <!-- <?php echo $vendorAddress;?><br> 
                                    <?php echo  $vendorPincode?><br> 
                                    Contact : <?php echo $vendorMobile;?> -->
                                    CUDA TECH<br>
                                    1G 44 B.P<br>
                                    N.I.T, FARIDABAD<br>
                                    HARYANA 121001 <br>
                                    MOB NO. 6262616060
                                </td>
                                <td colspan="2" class="text-center">
                                    <?php echo $userName?><br>
                                    <?php echo $userHouseNo ?><br>
                                    <?php echo  $userLocation?><br>
                                    <?php echo $userCity.", ".  $userPincode?><br>

                                    <!-- Contact : <?php echo $userMobile?> -->
                                </td>
                            </tr>
                        </table>

                        <!--Ecommerece Table Data Start here -->
                        <div class="table-wrapper">
                            <table class="invoice-table border">
                                <thead>
                                    <tr class="invo-tb-header">
                                        <th class="invo-table-title re-desc-wid inter-700 medium-font">Item</th>
                                        <th
                                            class="invo-table-title re-price-wid rate-title inter-700 medium-font invo-left-border">
                                            Offer Price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="invo-tb-body">
                                    <tr class="invo-tb-row">
                                        <td class="invo-tb-data"><?php echo $modelName;?><br />
                                            <span class="m-0">(IMEI No / Serial No:
                                                <?php echo $imeiNo;?>)</span>
                                        </td>
                                        <td class="invo-tb-data total-data invo-left-border">
                                            ₹<?php echo $offerPrice;?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="invoice-table " style="width: 100%;">
                                <thead>
                                    <tr class="invo-tb-header bottom">
                                        <th class="  re-desc-wid inter-700 medium-font p-0">
                                            <!-- <h6 class="m-0"> Amount Payable (in words)</h6> -->
                                            <h6 class="m-0">Extra Amount</h6>
                                        </th>
                                        <th class=" invo-tb-payment re-price-wid rate-title inter-700 medium-font p-0">
                                            <h6 class="m-0"> ₹<?php echo $extraAmount?> </h6>
                                        </th>
                                    </tr>
                                    <tr class="invo-tb-header bottom">
                                        <th class="  re-desc-wid inter-700 medium-font p-0">
                                            <!-- <h6 class="m-0"> Amount Payable (in words)</h6> -->
                                            <h6 class="m-0">Total Amount Payable</h6>
                                        </th>
                                        <th class=" invo-tb-payment re-price-wid rate-title inter-700 medium-font p-0">
                                            <h6 class="m-0"> ₹<?php echo $totalAmount?> </h6>
                                        </th>
                                    </tr>
                                    <!-- <tr class="invo-tb-header bottom">
                                        <th class="  re-desc-wid inter-700 medium-font p-0"
                                            style="white-space: pre-line;">
                                              <h6 class="m-0"> Amount Payable (in words)</h6>  
                                            
                                        </th>
                                        <th class=" invo-tb-payment re-price-wid rate-title inter-700 medium-font p-0"
                                            style="white-space: pre-line;     text-transform: capitalize;">
                                            <h6 class="m-0"> Rs. </h6>
                                        </th>
                                    </tr> -->
                                    <tr class="invo-tb-header bottom">
                                        <th class="  re-desc-wid inter-700 medium-font p-0">
                                            <h6 class="m-0">Payment Mode</h6>
                                        </th>
                                        <th class=" invo-tb-payment re-price-wid rate-title inter-700 medium-font p-0">
                                            <h6 class="m-0"> ONLINE</h6>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!--Ecommerce Table Data End here -->

                        <hr class="fade-view" />

                        <h5 class="inter-400 medium-font third-color note-desc mtb-0" style="color:#d6d6d6;">This is
                            computer generated receipt and
                            does not require physical signature.</h5>
                    </div>
                </div>
            </div>
            <div class="  blue-gradient   mb-3 mx-auto bottom  pb-2">
                <header class="invoice-header  content-min-width ecommerce-header" id="invo_header">
                    <div class="invoice-logo-content hide">
                        <div class="invoice-logo text-center   p-1 p-sm-2 p-md-3 p-lg-3">
                            <a href="/" class="logo"><img src="./assets/images/logo.png" alt="sellit logo"></a>

                        </div>
                    </div>
                </header>
                <div id="div_top_hypers">
                    <ul id="ul_top_hypers">
                        <li> <a href="/antitheft" class="a_top_hypers p-1 p-sm-2 p-md-2 p-lg-2"> anti-theft</a></li>
                        <li> <a href="/repair" class="a_top_hypers p-1 p-sm-2 p-md-2 p-lg-2"> repair</a></li>
                        <li> <a href="/contact" class="a_top_hypers p-1 p-sm-2 p-md-2 p-lg-2"> contact</a></li>
                        <li> <a href="https://play.google.com/store/apps/details?id=com.sellitcx.sellit&pli=1"
                                class="a_top_hypers p-1 p-sm-2 p-md-2 p-lg-2"> download the app</a></li>
                    </ul>
                </div>
                <!-- <div class="footer-social-icon">
                <a href="twitter.com/sellit.co.in"><img src="assets/images/twiter.png" class="px-1" alt="twitter"></a>
                <a href=""><img src="assets/images/2.png" class="px-1" alt="inbox"></a>
                <a href="facebook.com/sellit.co.in"><img src="assets/images/3.png" class="px-1" alt="facebook"></a>
                <a href="instagram.com/sellit.co.in"><img src="assets/images/4.png" class="px-1" alt="instagram"></a>
            </div> -->
                <div id="div_top_hypers">
                    <ul id="ul_top_hypers">
                        <li> <a href="/antitheft" class="a_top_hypers p-1 p-sm-2 p-md-2 p-lg-2"
                                style="text-transform: capitalize;"> @Sellit : All Rights
                                Reserved</a>
                        </li>
                    </ul>
                </div>
                <div id="div_top_hypers">
                    <ul id="ul_top_hypers">
                        <li> <a href="" class="a_top_hypers p-1 p-sm-2 p-md-2 p-lg-2"
                                style="text-transform: capitalize;">
                                Contact No. : 6262616060
                            </a>
                        </li>
                        <li> <a href="" class="a_top_hypers p-1 p-sm-2 p-md-2 p-lg-2"
                                style="text-transform: capitalize;">
                                Email Id : info@sellit.co.in
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <script>
    window.onload = function() {
        document.getElementById("download")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("invoice");
                console.log(invoice);
                console.log(window);
                var opt = {
                    margin: 1,
                    filename: 'myfile.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(invoice).set(opt).save();
            })
    }

    function downloadReceipt(name) {
        const invoice = this.document.getElementById("invoice");
        console.log(invoice);
        console.log(window);
        var opt = {
            margin: 1,
            filename: `${name}.pdf`,
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };
        html2pdf().from(invoice).set(opt).save();

    }
    </script>