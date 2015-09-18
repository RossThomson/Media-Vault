<?php
	$dbname = "Media_Lynx";
	$dbserver = "54.79.17.142";
	$dbuser = "root";
	$dbpass = "root";
	
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$email = test_input($_POST['email']);
		
		$conn = new mysqli($dbserver,$dbuser,$dbpass,$dbname);
		if(!$conn -> connect_error) {
			die("Connection failed").$conn->connect_error;	
		}
		
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html>
					<head>
					
					<title>Password recovery</title>
					
					<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
					<link rel="stylesheet" href="styles/styles.css">
					<script type="text/javascript" src="scripts/login_val.js"></script>
					
				</head>

				<body>
				<div class="top_bar">
				
				
				<div class="wrapper">
				<header>
					<?php include "header.php"; ?>
				</header>'
					
		
		$sql = "SELECT SECRETQUESTION, SECRETANSWER FROM USER WHERE EMAIL = '$email'";
		$result = $conn -> query($sql);
			
		if($result -> num_rows > 0) {
			echo '<form id = "RenewForm" name = "renew_form" method = "POST">';
			echo '<label>Secret Question</label>';
			$row = $result -> fetch_assoc();
			echo $row["SECRETQUESTION"];
			echo '<label>Secret Answer</label><input type = "password" id = "newpass" name = "answer"><br>';
			echo '<input class="btn btn-alt" type = "submit" name = "submit" value = "Submit">';
			$answer = $_POST["answer"];
			if($answer !== $row["SECRETANSWER"]) {
				echo "Not the correct answer";
			}
		}
		$conn -> close();
	}
?>