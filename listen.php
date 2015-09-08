<?php
session_start();

if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Listening</title>

<link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>
	</header>
	
	<div id="aboutus_content">	
	<br><br>
	<a href="media_movie.php">movie</a> &nbsp <a href="media_document.php">document</a> &nbsp <a href="media_photo.php">photo</a> &nbsp <a href="media_music.php">music</a>
	</div>
	<audio src="test.mp3" controls>
	</audio>
	<br><br>
	</div>
<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	
</body>
</html>