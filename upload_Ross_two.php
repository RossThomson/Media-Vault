<?php
$target_dir = "images";
$uploadOk = 1;
$filename = basename($_FILES["fileToUpload"]["name"]);
$filesize = $_FILES["fileToUpload"]["size"];
$fileType = $_FILES["fileToUpload"]["type"];
$tmpName  = ($_FILES["fileToUpload"]["tmp_name"]);  
		
$fp = fopen($tmpName, 'r');
$image = fread($fp, filesize($tmpName));
$image = addslashes($image);
fclose($fp);
		
	if(!get_magic_quotes_gpc())
			{
				$fileName = addslashes($fileName);
			}

		include 'library/config.php';
		include 'library/opendb.php';
         

// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
		
		if(move_uploaded_file($tmpName, $target_dir. "/". $fileName) {
			echo "file uploaded";
		}
		else {
			echo "upload failed";
		}
	}
		
	
?>