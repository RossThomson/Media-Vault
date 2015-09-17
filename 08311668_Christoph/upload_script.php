	<?php
		$videoFormats = array("avi","mov","wmv","qt","rmvb","mp4","m4p","m4v");
		$musicFormats = array("m4a","mp3","ogg","wma","wav");
		$docFormat = array(".pdf","txt","doc","docx");
		$photoFormat = array("jpg","jpeg","gif","bmp","png");
		$upload_dir = "var/www/html/Media-Vault";
		$upload_file = $upload_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOK = 1;
		$fileType = pathinfo($upload_file, PATHINFO_EXTENSION);
		function upload_file($file) {
			
			
			
			
		}
		//Upload the File.
		if(isset($_POST["Upload File"])) {
			//Check to see if there is a duplicate file
			if(file_exists($upload_file)) {
				echo "Sorry, file already exists";
				$uploadOK = 0;
			}
			//Check to see if the file size is too large
			if($_FILES["fileToUpload"]["size"] > 5000000000) {
				echo "Sorry, file is to large";
				$uploadOK = 0;
			}
			if (in_array($fileType, $videoFormats)) {
				echo "File is a video";
			} else if (in_array($fileType, $musicFormats)) {
				echo "File is an audio file";
			} else if (in_array($fileType, $docFormat)) {
				echo "File is a text document";
			} else if (in_array($fileType, $photoFormat)) {
				echo "File is an image";
			} else {
				echo "File upload not supported";
				$uploadOK = 0;
			}
		}
	?>