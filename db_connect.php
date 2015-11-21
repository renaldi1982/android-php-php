<?php 

	class DatabaseConnect {
		private $user;
		private $dsn;
		private $password;
		private $opt;
						    
						
		
		function __construct() {
			$this->dsn = "mysql:dbname=android_php_db;host=localhost";
			$this->user = "rey";
			$this->password = "renaldi0203";
			$this->opt = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			];
		}
		
		function __destruct() {
			
		}
		
		/**
		 * Connect to Database
		 */
		public function connect() {
			require_once 'config.php';
			try {
				$con = new PDO($this->dsn, $this->user, $this->password, $this->opt);
			}catch(PDOException $e) {
				echo 'Connection Failed, Error: ' . $e->getMessage();
			}			
			
			return $con;
		}
		
		public function close() {
			mysql_close();
		}			
	}

?>