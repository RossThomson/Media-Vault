
<?php
include 'scripts/login_val.php'; // Includes Login Script

if(isset($_SESSION['email'])){
header("location: media.php");
}
?>



<!DOCTYPE html>

<html id="Homepage_pic">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="refresh" content="60">
		<link rel="stylesheet" href="styles/styles.css">
		<title>Media Lynx</title>
	</head>
	<body>
	<div class="wrapper">
			
			<header>
				<?php include 'header.php'; ?>
			</header>

			<div id = "register">
			<h2> "Your own online Media Vault"</h2>
			<a class="btn btn-alt" href="register.php">Register Now</a>
			<a  href="newtest.php">Register Now</a>
			</div>
					<footer class="footer_absolute">
					<span id="jae_design-by">Design by Media lynx</span> 
						Copyright &copy; Media Lynx 2015.
					</footer>
					
				
	
	</div>
	</body>
	</html>
