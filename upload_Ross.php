<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 



	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";

		try {
			
			session_start();
			
			
					$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
					
					
					 
						$sql = "INSERT INTO CONTENT(USERID, CONTENTTITLE, CONTENTTYPE, SIZE, SYNOPSIS) VALUES ('$_SESSION['userid']','$_FILES["fileToUpload"]["name"]','IMAGE','$_FILES["fileToUpload"]["size"]','synopsisdffee')";
						
					$pdo->exec($sql);
					session_start();
					$_SESSION['error'] = "";
					header("location: test2.php");
						
					 
				}
				
			catch(PDOException $e)
				{
					echo $e->getMessage();
				}

				$pdo = null;
				
}
     //$db->prepare("INSERT INTO blob ( name, image) VALUES ('$imageName', " . $db->quote($imageData) . ")");
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


?>