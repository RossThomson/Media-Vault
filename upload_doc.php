<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileName"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename = basename($_FILES["fileName"]["name"]);
$filesize = $_FILES["fileName"]["size"];

if(isset($_POST["submit"])) {
	
	/* $target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileName"]["name"]);
	$uploadOk = 1;
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$filename = basename($_FILES["fileName"]["name"]);
	$filesize = $_FILES["fileName"]["size"]; */
	
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	if ($_FILES["fileName"]["size"] > 5000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	if($FileType != "doc" && $FileType != "txt" && $FileType != "pdf") {
		echo "Sorry, only DOC, TXT & PDF files are allowed.";
		$uploadOk = 0;
	}
	
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	session_start();
	$userid = $_SESSION['userid'];
	$synopsis = "description";

		try {
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
			$sql = "INSERT INTO CONTENT(USERID, CONTENTTITLE, CONTENTTYPE, SIZE, SYNOPSIS) VALUES ('$userid','$filename','$FileType','$filesize','$synopsis')";
			
			include 'library/closedb.php';
			$pdo->exec($sql);
			header("location: upload_doc.php");
		}
				
		catch(PDOException $e){
			echo $e->getMessage();
		}

		$pdo = null;
		
	/* if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";

	} else {
		if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileName"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	} */	
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

/* $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileName"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename = basename($_FILES["fileName"]["name"]);
$filesize = $_FILES["fileName"]["size"];

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileName"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($FileType != "doc" && $FileType != "txt" && $FileType != "pdf") {
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
} */

/* if(isset($_POST["submit"])) {
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	session_start();
	$userid = $_SESSION['userid'];
	//$file = "image";
	$synopsis = "description";

		try {
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
			$sql = "INSERT INTO CONTENT(USERID, CONTENTTITLE, CONTENTTYPE, SIZE, SYNOPSIS) VALUES ('$userid','$filename','$FileType','$filesize','$synopsis')";
			
			include 'library/closedb.php';
			$pdo->exec($sql);
			header("location: upload_doc.php");
		}
				
		catch(PDOException $e){
			echo $e->getMessage();
		}

		$pdo = null;
	
} */ 
?>