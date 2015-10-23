<?php
session_start();
$firstname = $row['FIRSTNAME'];
$lastname = $row['LASTNAME'];

	if(!$_GET['file'])
    {
        echo "<script>alert('wrong access');";
        echo "history.back();</script>";
    }
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	try {
		$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	} catch(PDOException $e){
		echo $e->getMessage();
	}
	
	$dir = dirname($_SERVER['DOCUMENT_ROOT']).'/html/Media-Vault/uploads';
	$filename = $_GET['file'];
	$file = $dir."/".$firstname.$lastname."/"$filename;
	echo $file;
	$extension = "mp3";
	$mime_type = "audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3";

	echo 'This works too';
	
	if(file_exists($file)){
		echo 'And here too';
		header('Content-type: {$mime_type}');
		header('Content-length: ' . filesize($file));
		header('Content-Disposition: filename="' . $filename.'"');
		header('X-Pad: avoid browser bug');
		header('Cache-Control: no-cache');
		readfile($file);
	}else{
		header("HTTP/1.0 404 Not Found");
	}
?>