<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileName"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename = basename($_FILES["fileToUpload"]["name"]);
$filesize = $_FILES["fileToUpload"]["size"];
// Check if image file is a actual image or fake image
/* if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["doc"]["tmp_name"]);
    if($check !== false) {
        echo "File is a document. - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not a document.";
        $uploadOk = 0;
    }
} */
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileName"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($FileType != "doc" && $FileType != "txt" && $FileType != "pdf") {
    echo "Sorry, only DOC, TXT & PDF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileName"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if(isset($_POST["submit"])) {
    //$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	//$imageData = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
    //if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        //$uploadOk = 1;
		
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	session_start();
	$userid = $_SESSION['userid'];
	$file = "image";
	$synopsis = "description";

		try {
			
			
			
			
					$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
			
					
					
					 
					$sql = "INSERT INTO CONTENT(USERID, CONTENTTITLE, CONTENTTYPE, SIZE, SYNOPSIS) VALUES ('$userid','$filename','$FileType','$filesize','$synopsis')";
			
					include 'library/closedb.php';
					$pdo->exec($sql);
					header("location: test2.php");
						
					 
				}
				
			catch(PDOException $e)
				{
					echo $e->getMessage();
				}

				$pdo = null;
	
    } 


 /* else {
        echo "File is not an image.";
        $uploadOk = 0;
    }	 */	
}
?>