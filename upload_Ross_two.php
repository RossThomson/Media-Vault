<?php

// Report all errors


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename = basename($_FILES["photo"]["name"]);
$filesize = $_FILES["photo"]["size"];
$synopsis = $_POST['ref'];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = $filesize;
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["photo"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif" && $imageFileType != "PNG" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "The file ". $filename. " has been uploaded.";
		
		  
    $imagemagickPath = "/usr/local/bin";
	$size = GetImageSize($target_file);    
    $thumbnail_image = "tb_".$filename;
	
	$newtarget_file = $target_dir.$thumbnail_image;
	echo $newtarget_file;
	
		// Wide Image    
		if($size[0] > $size[1])    
		{     
		 $thumbnail_width = 100;     
		 $thumbnail_height = (int)(100 * $size[1] / $size[0]);     
		}     
			
		// Tall Image    
		else    
		{    
		  $thumbnail_width = (int)(100 * $size[0] / $size[1]);    
		  $thumbnail_height = 100;    
		}
 
		 

	    
	exec("$imagemagickPath/convert -geometry " .    
  "{$thumbnail_width}x{$thumbnail_height} " .    
	"$target_file $newtarget_file");	
						
							
		
    }//end if statement 
	
	else {
        echo "Sorry, there was an error uploading your file.";
		$uploadOk = 0;
    }
}

if(isset($_POST["submit"]) && $uploadOk == 1) {
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	session_start();
	$userid = $_SESSION['userid'];
	

		try {
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
			$sql = "INSERT INTO CONTENT(USERID, CONTENTTITLE, CONTENTTYPE, SIZE, SYNOPSIS) VALUES ('$userid','$filename','IMAGE','$filesize','$synopsis')";
			
			
			$pdo->exec($sql);
			
		}
				
		catch(PDOException $e){
			echo $e->getMessage();
		}

		$pdo = null;
		
		header('Refresh: 3; URL= media_photo.php'); 
}
?>