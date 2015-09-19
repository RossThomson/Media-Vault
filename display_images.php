<?php

	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";

mysql_connect($dbhost, $dbuser, $dbpass) or die("Can not connect to database: ".mysql_error());

mysql_select_db($dbname) or die("Can not select the database: ".mysql_error());

//Session_start();
//$id = $_$_SESSION['userid'];
$id = '6';



$query = mysql_query("SELECT * FROM CONTENT WHERE CONTENTID='".$id."'");
$row = mysql_fetch_array($query);
$content = $row['PICTURES'];

header('Content-type: image/png');
     echo $content;


?>