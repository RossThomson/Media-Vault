<?php
if(!is_dir("uploads")){
	mkdir("uploads");
}

<<<<<<< HEAD
include 'scripts/upload_script.php'; //include Upload Script

if(!isset($_SESSION['email'])){
header("location: Login.php");
=======
function savedata(){
	global $_FILES, $_POST;
>>>>>>> 1564921f21a5f0e13f476a7be67e3a390fdfefe3
}

$putItAt = "uploads/".basename($_FILES['uploadedfile']['name']);
$putItAt = str_replace("php","txt", $putItAt);

<<<<<<< HEAD
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
=======
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$putItAt)){
	header("location: listfiles.php");
} else{
	if(copy($_FILES['uploadedfile']['tmp_name'],$putItAt)){
		header("location: listfiles.php");
	}else{
		echo 'You totally failed. click <a href="index.php">here</a> to go back and try again';
	}
}
?>
>>>>>>> 1564921f21a5f0e13f476a7be67e3a390fdfefe3
