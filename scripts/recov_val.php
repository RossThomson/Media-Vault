<?php
	$dbname = "Media_Lynx";
	$dbserver = "54.79.17.142";
	$dbuser = "root";
	$dbpass = "root";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$email = test_input($_POST['email']);
		
		$conn = mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);
		if(!$conn -> connect_error) {
			die("Connection failed");
		}
			
		$sql = "SELECT SECRETQUESTION, SECRETANSWER FROM User WHERE email = '$email'";
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