<?php
session_start();

include 'scripts/upload_script.php'; //include Upload Script

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
	<form enctype = "multipart/form-data" action = "media.php" method = "POST">
	<fieldset>
	<legend>Upload your file</legend>
	<input type = "hidden" name = "max_file_size" value = "5000000000">
	Select the file you would like to upload:<br>
	<input name = "upload" type = "file"><br>
	<input type = "submit" value = "Upload File">
	</form>
	</body>
</html>