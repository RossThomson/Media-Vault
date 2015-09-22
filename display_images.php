<?php

	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";

mysql_connect($dbhost, $dbuser, $dbpass) or die("Can not connect to database: ".mysql_error());

mysql_select_db($dbname) or die("Can not select the database: ".mysql_error());

Session_start();
$id = $_SESSION['userid'];

$query = mysql_query("SELECT * FROM CONTENT WHERE USERID='".$id."'");
 while($row <= mysql_fetch_array($query)) {

$imagetype = $row['CONTENTTYPE'];

header('Content-type: "$imagetype"');

	 
	  echo $row['PICTURES'];
 }
 ?>

