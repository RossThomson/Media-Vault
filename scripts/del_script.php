<?php
	
		$dbname = "MEDIALYNX";
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "root";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id = $_POST["id"];

			$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$q1 = $conn->exec("DELETE FROM CONTENT WHERE CONTENTID = '$id'");
			
			catch(PDOException $e) {
				echo $sql."<br>"
			}
			
			$conn = null;
		}
?>