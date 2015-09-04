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
<link rel="stylesheet" href="styles/styles.css">
<!--<meta charset="utf-8">-->
<title>Watching</title>
</head>
<body>
<div class="top_bar">

<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>
	</header>
	
	<div id="aboutus_content">	
	<br><br>
	<a href="media_movie.php">movie</a> &nbsp <a href="media_document.php">document</a> &nbsp <a href="media_photo.php">photo</a> &nbsp <a href="media_music.php">music</a>
	</div>
	<video align="center" src="epl.mp4" width="500" height="350" controls>
	</video>
	<br><br>
</div>
<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	
</body>
</html>