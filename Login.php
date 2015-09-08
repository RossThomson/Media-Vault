
<?php
include 'scripts/login_val.php'; // Includes Login Script

if(isset($_SESSION['email'])){
header("location: media.php");
}
?>



<!DOCTYPE html>
<html>
	<head>
	<title>Login</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="styles/styles.css">
	<script type="text/javascript" src="scripts/login_val.js"></script>
	
	</head>
	
	<body>
	<div class="wrapper">
	
			<header>
				<?php include 'header.php'; ?>
			</header>
	
	<!--FORM FOR THE USER TO FILL OUT-->
	<div id="login_form">
	
	<h1>Login To Your Account</h1>
	<form id="loginform" name="login_form" onsubmit="scripts/login_val.js" action="scripts/login_val.php"  method="post">
	
		<span><?php echo $error;?></span>
		<label>Email Address: </label><input type="text" name="email" id="email" required onkeyup ="checkEmail();">*<span id ="emailmessage"></span></p>
		<label>Password: </label><input type="password" min = "6" max = "15" id="pass" name="password" required>*</p>
		<label><a href="password_recovery.php">Retrieve Password</a></label><br><br>
		<input class="btn btn-alt" type = "submit" name = "submit" id="submit" value = "Submit">
	</form>
	</div>
	
	<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</div>
	</body>
</html>
	