<?php

session_start();

	$email = $password = $error = '';

	
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
	
		$hash = $conn->prepare("SELECT HASH FROM USERS WHERE EMAIL = '$email' ");

		if(password_verify($password, $hash)) {
		session_start(); 
		$_SESSION['email'] = $email;
		header("location: ../media.php");
		

		}
		
		else{
			session_start(); 
			$_SESSION['error'] = "Incorrect email or password";
			header("location: ../Login.php");
		
		}
	}

?>