<?php 

	class DatabaseFunction {
		
		private $db;
		
		function __construct() {
			include_once 'db_connect.php';
			
			$this->db = new DatabaseConnect();
			$this->db = $this->db->connect();
		}
		
		function __destruct() {
			
		}
		
		public function storeUser($user) {			
			$query = $this->db->prepare("insert into users(name) values('$user')");			
			if($query->execute()) return true;
			
			return false;
		}
		
		public function getAllUsers() {
			$query = $this->db->prepare("select * from users");
			$result['flag'] = $query->execute();
			$result['data'] = $query->fetchAll();
			return $result;
		}
		
		public function getUsers() {
			$query = $this->db->prepare("select * from users where sync_status = 0");
			$result['flag'] = $query->execute();
			$result['data'] = $query->fetchAll();
			return $result;
		}
		
		public function getUnSyncRowCount() {
			$query = $this->db->prepare("select * from users where sync_status = 0");			
			$flag = $query->execute();
			$data = $query->rowCount();			
			$result = ['flag' => $flag, 'data' => $data];
			return $result;
		}
		
		public function updateSync($id, $status) {
			$query = $this->db->prepare("update users set sync_status = $status where id = $id");
			$flag = $query->execute();					
			return $flag;
		}
		
	}

?>