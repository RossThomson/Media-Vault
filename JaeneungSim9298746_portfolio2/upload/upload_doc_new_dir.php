<?php

session_start();
	
	$firstname  = $_SESSION['first_name'];
	$lastname = $_SESSION['last_name'];
	$userid = $_SESSION['userid'];
	$dir = "uploads/";
	$target_dir = $dir.$firstname.$lastname."/";


$target_file = $target_dir . basename($_FILES["fileName"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename = basename($_FILES["fileName"]["name"]);
$filesize = $_FILES["fileName"]["size"];
$synopsis = $_POST['ref']; // test
//$type = "DOCUMENT"

if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}

if ($_FILES["fileName"]["size"] > 5000000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}

if($FileType != "doc" && $FileType != "txt" && $FileType != "pdf" && $FileType != "docx" && $FileType != "csv" && $FileType != "ppt" && $FileType != "pptx") {
	echo "Sorry, only DOC, TXT & PDF files are allowed.";
	$uploadOk = 0;
}

if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
} else {
	if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["fileName"]["name"]). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}

if(isset($_POST["submit"])) {
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	


	$type = "DOC";	

		try {
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
			$sql = "INSERT INTO CONTENT(USERID, CONTENTTITLE, CONTENTTYPE, SIZE, SYNOPSIS) VALUES ('$userid','$filename','$type','$filesize','$synopsis')";
			
			//include 'library/closedb.php';
			$pdo->exec($sql);
			//header("location: upload_doc.php");
		}
				
		catch(PDOException $e){
			echo $e->getMessage();
		}

		$pdo = null;
		header("location: media_doc.php");
		echo "<script>alert('uploaded');";
}

?>