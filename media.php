
<?php
session_start();

if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        
        <title>Media</title>
        
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
     	<link rel="stylesheet" href="styles/styles.css">
        
    </head>

    <body>
	<div class="top_bar">
	
	
	<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>
	</header>
	<br><br><br>
	<div class="search_container">
	<input class="search" thpe="search" placeholder="Search">
	</div>
    
	<br><br>
	
    <div id="media_main_gMenu">
       <ul>
       <li><a href="media_movie.php">Movie</a></li>
       <li><a href="media_photo.php">Photo</a></li>
       <li><a href="media_document.php">Document</a></li>
       <li><a href="media_music.php">Music</a></li><br><br><br>
       <li><a href="upload.php">Upload</a></li> 
	   <li><a href="Delete.php">Remove</a></li>
       </ul>
	</div>
		<br><br><br>
       <footer class="footer_relative">
	   <span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
		</footer>
		
    </body>
</html>