<?php
if(isset($_SESSION['email'])){
header("location: media.php");
}
if($_POST['Answer'] != $_POST['trueAnswer']) {
header("location: password_recovery.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Password Reset</title>
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
	<h1>Reset your password</h1>
	<form id="RecoverForm" name="Reset_form" onsubmit="scripts/register_val.js" action="scripts/reset_script.php"  method="POST">
		<fieldset>
		<p><span id="error_message"><?php session_start(); echo $_SESSION['error'];?></span></p>
		<p><label>New Password: </label><input type="password" min = "6" max = "15" id="password" name="password" required>*</p>
		<p><label for="cPassword">Confirm Password: </label><input type="password" id="cPassword" name="cPassword" required onkeyup ="checkPass(); return false;">*<span id="confirmMessage" class="confirmMessage"></span></p>
		<input type = "hidden" name="<?php $_POST["email"]?>" value="<?php $_POST["email"]?>" id="<?php $_POST["email"]?>">
		<input class="btn btn-alt" type = "submit" name = "submit" id="submit" value = "Submit">
		</fieldset>
	</form>
	<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</div>
</body>
</html>