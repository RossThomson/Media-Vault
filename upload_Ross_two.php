<?php
error_reporting(0);
$target_dir = "images";
$uploadOk = 1;
$filename = basename($_FILES["fileToUpload"]["name"]);
$filesize = $_FILES["fileToUpload"]["size"];
$fileType = $_FILES["fileToUpload"]["type"];
$tmpName  = ($_FILES["fileToUpload"]["tmp_name"]);  

if(isset($_POST["submit"])) {
		
		if(move_uploaded_file($tmpName, $target_dir)) {
			echo "file uploaded";
		}
		else {
			echo "upload failed";
		}
	
}


	
?>