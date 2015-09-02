<?php

	$email = $password = '';

	
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

	$dbhost = "localhost";
	$dbname	= "Media_Lynx";
	$dbuser	= "root";
	$dbpass	= "root";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);
		
		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		$salt = "";
		$result = $conn->query("SELECT * FROM USERS WHERE EMAIL = '$email'  AND PASSWORD = 'SHA2(CONCAT('$password', '4b3403665fea6'),384)' ");

		$rows = $result->fetch(PDO::FETCH_NUM);
		if($rows > 0) {
		session_start(); $_SESSION['isAdmin'] = true;
		$_SESSION['email'] = $email;
		header("location: media.php");
		

		}
		
		else{
			echo "Invalid email or password";
			header("location: login.php");
		
			

			
		}
	}

?>