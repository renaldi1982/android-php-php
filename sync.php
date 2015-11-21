<?php 

	include_once 'db_functions.php';
	
	$db = new DatabaseFunction();
	$json = $_POST['sync_status'];
	
	if(get_magic_quotes_gpc()) {
		$json = stripslashes($json);
	}
	
	$data = json_decode($json);	
	$response = ['users' => [], 'flag' => false];
	
	for($i = 0; $i < count($data); $i++) {
		$id 	= $data[$i]->id;
		$status = $data[$i]->sync_status;
		
		/**
		 * Store User Data into DB
		 */		
		$result = $db->updateSync($id, $status);
		
		$temp["id"] = $id;
		$temp["sync_status"] = ($result) ? 'Yes' : 'No';	
		$response['users'][] = $temp;
		$response['flag'] = $result;			
	}	
	
	echo json_encode($response);
?>