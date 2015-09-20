<?php
if(isset($_SESSION['email'])){
header("location: media.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Password Recover</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="styles/styles.css">
	<script type="text/javascript" src="scripts/login_val.js"></script>
	
	</head>
	
	<body>
	<div class="wrapper">
	
			<header>
				<?php include 'header.php'; ?>
			</header>
	
	<!--RECOVERY FORM FOR THE USER TO FILL OUT-->
	<div id="login_form">
	
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
			
			if($q2['EMAIL'] === null) {
				echo '<label>You are not a user,'.$email.'. Please <a href = "../register.php"> Register </a>to use our services.</label>';
			} else {
				echo '<h3>Secret Question</h3><br>';
				echo '<p>'.$q2['SECRETQUESTION'].'</p><br>';
				echo '<h1>Recover Password</h1>
	
					<form id = "RecoverForm" name = "Reset Form" method = "POST">
					<fieldset>';
				echo '<label>Secret Answer</label><br><input type = "password" id = "newpass" name = "answer"><br>';
				echo '<input class="btn btn-alt" type = "submit" name = "submit" value = "Submit">';
				echo '	</fieldset>
						</form>';
				$answer = $_POST["answer"];
				if($answer != $row['SECRETANSWERS']) {
					echo "Not the correct answer";
				} else {
					echo 'Time to reset your password, but I am figuring that one out';
				}
			}
			
			$conn->close();
		}
	?>
<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
</footer>
</div>
</body>
</html>