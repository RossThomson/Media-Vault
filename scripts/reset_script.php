<?php

// define variables and set to empty values

$email = $password = "";

function validate_form($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = validate_form($_POST["email"]);
	$password = validate_form($_POST["password"]);
	
	$hash = password_hash('$password', PASSWORD_DEFAULT);
	
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";

	try {
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$result = $pdo->query("SELECT EMAIL FROM  USERS WHERE EMAIL = '$email'");
			
			if ($result->rowCount() > 0)
			{	session_start();
				$_SESSION['error'] = "Email already registered";
				header("location: ../register.php");
			}
			
			else
			{ 
				$sql = "UPDATE 'USERS' SET 'HASH'=$hash WHERE 'EMAIL'=$email";
				
			$pdo->exec($sql);
			session_start();
			$_SESSION['error'] = "";
			header("location: ../register_success.php");
				
			} 
		}
		
	catch(PDOException $e)
		{
			echo $e->getMessage();
		}

		$pdo = null;
		


}