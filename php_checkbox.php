<?php
define("MYSQLUSER","root");
define("MYSQLPASS","root");
define("HOSTNAME","localhost");
define("MYSQLDB","MEDIALYNX");

//make connection to database
function db_connect()
{
	$conn = @new mysqli("localhost","root","root","MEDIALYNX");
	if($conn -> connect_error) {
		die('Connect Error: ' . $conn -> connect_error);
	}
	return $conn;
} 

session_start();
	
$firstname  = $_SESSION['first_name'];
$lastname = $_SESSION['last_name'];
$userid = $_SESSION['userid'];
$contentid = $_SESSION['contentid'];


$filename = basename($_FILES["fileName"]["name"]);

if(isset($_POST["submit"])) {
	
	
	
	$type = "MUSIC";

		$conn = @new mysqli("localhost","root","root","MEDIALYNX");
	if($conn -> connect_error) {
		die('Connect Error: ' . $conn -> connect_error);
	}

			$sql = "INSERT INTO PLAYLIST(USERID, CONTENTTITLE, CONTENTTYPE) VALUES ('$userid','$filename','$type') where CONTENTID = '$contentid'";
			if ($conn -> query($sql)) {
				echo "Successful";
			} else {
				echo "Failed";
			}
		
}
?>