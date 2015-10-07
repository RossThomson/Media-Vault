<?php
	class ServerConn {
	
		function Connect() {
			$dbhost = "localhost";
			$dbname	= "MEDIALYNX";
			$dbuser	= "root";
			$dbpass	= "root";
			try {
				$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
			} catch(PDOException $e){
				echo $e->getMessage();
			}
			echo 'Working';
			return $pdo;
		}
		
		function Select($conn, $user, $table) {
			$query = "SELECT * from '$table' where USERID = '$user'";
			$result = $conn->exec($query);
			return $result;
		}
		
		function InsertContent($conn,$user) {
				
		}
		
		
		
		
	}
?>