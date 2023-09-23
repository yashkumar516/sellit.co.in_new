<?php 

function insert_data($from,$to){
	require __DIR__ . '/vendor/autoload.php';
	
	$client = new \Google_Client();
	$client->setApplicationName('Google Sheets with Primo');
	$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
	$client->setAccessType('offline');
	$client->setAuthConfig(__DIR__ . '/credentials.json');
	
	$service = new Google_Service_Sheets($client);
	$spreadsheetId = "1ZpNNBTLgqIZTbtw3qbgIlfDyQEYh-XvDX2-2jUXoHQo";
	
	$range = "sellitapp"; // Sheet name
	
	$values = [
		[$from,$to],
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
		return true;
	} else {
		return false;
	}
}
?>

