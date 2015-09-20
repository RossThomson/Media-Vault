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
		<script type="text/javascript" src="scripts/rec_script.js"></script>
	<?php include 'scripts/rec_script.js';?>
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
				echo'<form id = "RecoverForm" name = "Reset Form" method = "POST">
					<fieldset>';
				echo 'You are not a user, '.$email.'. Please <a href = "register.php"> Register </a>to use our services.';
				echo '</fieldset></form>';
			} else {
				echo '<h1>Recover Password</h1>';
				echo'<form id = "RecoverForm" name = "Reset Form" onsubmit = "scripts/rec_script.js" method="POST">
					<fieldset>';
				echo 'Secret Question';
				echo '<br>'.$q2['SECRETQUESTION'].'<br>';
				echo '<input type = "hidden" name="trueAnswer" value="'.$q2['SECRETANSWERS'].'" id = "trueAnswer">';
				echo '<label>Secret Answer</label><br><input type = "password" id = "Answer" name = "Answer" required onkeyup="checkAnswer(); return false;">*<span id="check" class="confirmMessage"></span><br>';
				echo '<input class="btn btn-alt" type = "submit" name = "submit" value = "submit" id = "submit">';
				echo '	</fieldset>
						</form>';
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