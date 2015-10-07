<?php
	include 'phpClass.php';
	
	PHP = new ServerConn();

	if(!$_GET['file'])
    {
        echo "<script>alert('wrong access');";
        echo "history.back();</script>";
    }
	$pod = PHP->Connect();
	
	$dir = dirname($_SERVER['DOCUMENT_ROOT']).'';
	$filename = $_GET['file'];
	$file = $dir."/".$filename;

	$extension = "mp3";
	$mime_type = "audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3";

	if(file_exists($file)){
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