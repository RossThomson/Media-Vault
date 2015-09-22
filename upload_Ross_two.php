<?php

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$filename = basename($_FILES["fileToUpload"]["name"]);
$filesize = $_FILES["fileToUpload"]["size"];
$fileType = $_FILES["fileToUpload"]["type"];
$tmpName  = ($_FILES["fileToUpload"]["tmp_name"]);  

if(isset($_POST["submit"])) {
		
		
		 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		 }
		
		else {
			echo "upload failed";
		}
	
}


	
?>