<?php
	$dbname = "MEDIALYNX";
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	
	$email = "";
		
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$email = $_POST['email'];
		
		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	
		$q1 = $conn->query("SELECT * FROM USERS WHERE EMAIL = '$email'");
		$q2 = $q1->fetch(); 
		
		echo "<p> working here </p>";
		echo "<p>".$q2['SECRETQUESTION']."</p>";
		echo "<p>".$q2['SECRETANSWERS']."</p>";
		
		if($q2['EMAIL'] === null) {
			echo '<p>You are not a user,'.$email.'. Please <a href = "../register.php"> Register </a>to use our services.</p>';
		}
		
		/*if($result->num_rows > 0) {
			//$row = $result->fetch_array();
			echo '<p>It is working</p>';
			echo '<form id = "RenewForm" name = "renew_form" method = "POST">';
			echo '<label>Secret Question</label>';
			//echo $row["SECRETQUESTION"];
			echo '<label>Secret Answer</label><input type = "password" id = "newpass" name = "answer"><br>';
			echo '<input class="btn btn-alt" type = "submit" name = "submit" value = "Submit">';
			$answer = $_POST["answer"];
			if($answer !== $row["SECRETANSWER"]) {
				echo "Not the correct answer";
			}
		} else {
			echo '<p>You are not a user,'.$email.'. Please <a href = "../register.php"> Register </a>to use our services.</p>';
		}*/
		$conn->close();
	}
?>