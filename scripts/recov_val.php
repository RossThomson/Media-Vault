<?php

if(isset($_SESSION['email'])){
header("location: media.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		<?php include 'header.php'; ?>
	</header>

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
			} else {
				echo '<p>It is working</p>';
				echo '<form id = "RenewForm" name = "renew_form" method = "POST">';
				echo '<label>Secret Question</label><br>';
				echo '<label>'.$q2['SECRETQUESTION'].'</label><br>';
				echo '<label>Secret Answer</label><br><input type = "password" id = "newpass" name = "answer"><br>';
				echo '<input class="btn btn-alt" type = "submit" name = "submit" value = "Submit">';
				echo '</form>'
				$answer = $_POST["answer"];
				if($answer !== $row['SECRETANSWERS']) {
					echo "Not the correct answer";
				} else {
					echo 'Time to reset your password, but I am figuring that one out';
				}
			}
			
			$conn->close();
		}
	?>
	</body>
<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
</footer>
</html>