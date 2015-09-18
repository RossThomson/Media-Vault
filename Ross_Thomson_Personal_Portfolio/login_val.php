<?php

session_start();

	$email = $password = $error = '';

	//Prepares user input for database query
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
//Database Credentials
	$dbhost = "localhost";
	$dbname	= "Media_Lynx";
	$dbuser	= "root";
	$dbpass	= "root";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);
		//Database Connection
		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	
		$q1 = $conn->query("SELECT * FROM USERS WHERE EMAIL = '$email'");
		$q2 = $q1->fetch(); 
		$hash = $q2['HASH'];

		
	//Checks if password matches hash
		if(password_verify('$password', $hash)) {
		session_start(); 
		$_SESSION['email'] = $q2['FIRSTNAME'];
		$_SESSION['error'] = "";
		header("location: ../media.php");
		

		}
		
		else{
			session_start(); 
			$_SESSION['error'] = "Incorrect username or password";
			header("location: ../Login.php");
		
		}
	}

?>