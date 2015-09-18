<?php
	$dbname = "MEDIALYNX";
	$dbserver = "54.79.17.142";
	$dbuser = "root";
	$dbpass = "root";
	
	$email = "";
		
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$email = $_POST['email'];
		
		$conn = new PDO("mysql:host=$dbserver;dbname=$dbname",$dbuser,$dbpass);
		if($conn->connect_error) {
			 trigger_error($conn->connect_error);
		}
		
		$sql = "SELECT * FROM 'USERS' WHERE EMAIL = '$email'";
		$result = $conn->query($sql);
		$result2 = $result->fetch();
		
		if($result === null) {
			echo'<p> this explains everything</p>';
		}else{
		echo '<p>Ok, this is the result: '.$result.'...stuff</p>';
		echo '<p>Also, the email is: '.$email.'</p>';
		echo '<p>AND sql thingy too: '.$sql.'</p>';
		}
		
		if($result->num_rows > 0) {
			$row = $result->fetch_array();
			echo '<p>It is working</p>';
			echo '<form id = "RenewForm" name = "renew_form" method = "POST">';
			echo '<label>Secret Question</label>';
			echo $row["SECRETQUESTION"];
			echo '<label>Secret Answer</label><input type = "password" id = "newpass" name = "answer"><br>';
			echo '<input class="btn btn-alt" type = "submit" name = "submit" value = "Submit">';
			$answer = $_POST["answer"];
			if($answer !== $row["SECRETANSWER"]) {
				echo "Not the correct answer";
			}
		} else {
			echo '<p>You are not a user,'.$email.'. Please <a href = "../register.php"> Register </a>to use our services.</p>';
		}
		$conn->close();
	}
?>