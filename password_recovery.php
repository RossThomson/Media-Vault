
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
	<form id = "RecoverForm" name = "recover_form" onsubmit = "scripts/login_val.js" action = "recover.php" method = "POST">
		<label>Email:</label><input type = "text" name = "email" id = "email" required onchange ="checkEmail();"><span id = "emailmessage"></span><span id = "InvalidEmail"></span><br>
		<br><input input class="btn btn-alt" type = "submit" name = "submit" value = "Submit">
	</form>
	
	<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	
	
	</body>
</html>