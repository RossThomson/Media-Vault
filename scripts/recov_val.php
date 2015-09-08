<?php
		$dbname = "Media_Lynx";
		$conn = mysqli_connect("54.79.17.142","root","root",$dbname);
		if(!$conn -> connect_error) {
			die("Connection failed:");
		}
		
		$email = $_POST['email'];
		$sql = "SELECT SECRETQUESTION, SECRETANSWER FROM User WHERE email = '$email'";
		$result = $conn -> query($sql);
		
		if($result -> num_rows > 0) {
			echo '<form id = "RenewForm" name = "renew_form" method = "POST">';
			echo '<label>Secret Question</label>';
			$row = $result -> fetch_assoc();
			echo $row["SECRETQUESTION"];
			echo '<label>Secret Answer</label><input type = "password" id = "newpass" name = "answer"><br>';
			echo '<input type = "submit" name = "submit">';
			$answer = $_POST["answer"];
			if($answer !== $row["SECRETANSWER"]) {
				echo "Not the correct answer";
			}
		}
		$conn -> close();
	?>