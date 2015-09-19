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
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);
		
		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	
		$q1 = $conn->query("SELECT * FROM USERS WHERE EMAIL = '$email'");
		$q2 = $q1->fetch(); 
		$hash = $q2['HASH'];

		

		if(password_verify('$password', $hash)) {
		session_start(); 
		$_SESSION['first_name'] = $q2['FIRSTNAME'];
		$_SESSION['email'] = $q2['EMAIL'];
		$_SESSION['userid'] = $q2['USERID'];
		$_SESSION['error'] = "";
		header("location: ../test2.php");
		

		}
		
		else{
			session_start(); 
			$_SESSION['error'] = "Incorrect username or password";
			header("location: ../Login.php");
		
		}
	}

?>