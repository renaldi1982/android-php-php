<?php 

	include_once 'db_functions.php';	
	$db = new DatabaseFunction();		
	$result = $db->getUnSyncRowCount();	
	
	$response = ['flag' => $result['flag'], 'count' => $result['data']];			
	echo json_encode($response);
?>