<?php 
   error_reporting();
  include 'config.php';
 
 // include('Google-Sheets-main/sheets.php');
  require __DIR__ . '/Google-Sheets-main/vendor/autoload.php';
	
	$client = new \Google_Client();
	$client->setApplicationName('Google Sheets with Primo');
	$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
	$client->setAccessType('offline');
	$client->setAuthConfig(__DIR__ . '/Google-Sheets-main/credentials.json');
	
	$service = new Google_Service_Sheets($client);
	$spreadsheetId = "1ZpNNBTLgqIZTbtw3qbgIlfDyQEYh-XvDX2-2jUXoHQo";

    if(isset($_POST['from_mobile']) && isset($_POST['to_mobile']) && isset($_POST['user_id'])){
       $from_mobile = trim($_POST['from_mobile']);
       $to_mobile = trim($_POST['to_mobile']);
       $user_id = $_POST['user_id'];
       $created_date=date('Y-m-d');
       $created_time=date('h:i:s a');
       
       $insertenquiry = mysqli_query($con,"INSERT INTO `vendor_ivr_call_logs` (`userid`,`from_mob`,`to_mob`,`created_date`,`created_time`)
        VALUES('$user_id','$from_mobile','$to_mobile','$created_date','$created_time') ");
      if($insertenquiry){
       
        $range = 'sellitapp'; // here we use the name of the Sheet to get all the rows
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();
        $fromstore =array();
        $tostore =array();
       
        foreach ($values as $key => $value) {
          $fromstore[] = $value[0];
          $tostore[] = $value[1];
        }
        
        $fromunique = array_unique($fromstore);
        $tounique = array_unique($tostore);
        if (in_array($from_mobile, $fromunique) && in_array($to_mobile, $tounique))
        {
         // echo "existed";
        }
        else
        {
            $values = [
                 [$from_mobile,$to_mobile],
                      ];
        //echo "<pre>";print_r($values);echo "</pre>";exit;
        $body = new Google_Service_Sheets_ValueRange([
          'values' => $values
        ]);
        $params = [
          'valueInputOption' => 'RAW'
        ];
        
        $result = $service->spreadsheets_values->append(
          $spreadsheetId,
          $range,
          $body,
          $params
        );
        
        if($result->updates->updatedRows == 1){
         // return true;
        } else {
         // return false;
        }

        }

          $list = [
              'status' => 'success',
              'message' => 'Ivr call logs created successfully'
          ];
          echo json_encode($list);
      }else{
        $list = [
            'status' => '0',
            'message' => 'Something wrong!'
        ];
        echo json_encode($list);
      }
     }else{
       $list = [
               'status' => '0',
               'message' => 'all fields are required.'
           ];
           echo json_encode($list);
    }
   ?>