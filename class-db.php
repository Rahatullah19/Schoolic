<?php
	if ( !class_exists ('hm_DB') ) {
		class hm_DB {
			public function __construct() {
				$mysqli = new mysqli('127.0.0.1', 'root', '', 'helpmiii');
				
				if ($mysqli->connect_errno) {
					printf("Connect failed %s\n", $mysqli->connect_error);
					exit();
				}
				
				$this->connection =  $mysqli;
			}
			
			public function insert($query) {				
				$result = $this->connection->query($query);
				
				return $result;
			}
			
			public function update($query) {
				$result = $this->connection->query($query);
				
				return $result;
			}
			
			public function select($query) {							
				$result = $this->connection->query($query);
				
				if ( !$result ) {
					return false;
				}
				
				while ( $obj = $result->fetch_object() ) {
					$results[] = $obj;
				}
				
				return $results;
			}
		}
	}
	
	$hm_db = new hm_DB;
?>