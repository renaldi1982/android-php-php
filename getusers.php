<?php 
/**
 * Return 
 */
	include_once 'db_functions.php';
	$db = new DatabaseFunction();
	$result = $db->getUsers();	
	$response = ['users' => $result['data'], 'flag' => $result['flag']];		
	echo json_encode($response["users"]);
?>