<!Doctype html>
<html>
<head>
<title>Email conformation</title>
</head>


<body>

<?php
require "dbc.php";

$FirtsName = $_GET['FirstName'];
Scode = $_GET['code'];

$query = mysql_query("SELECT * FROM 'users' WHERE 'FirstName = $FirstName'");
while($row = mysql_fetch_assoc($query))
{
    $db_code = $row['confirm_code'];
}
if($code == $db_code)
{
    mysql_query("UPDATE 'users' SET 'confirmed'= '1'");
	mysql_query("UPDATE 'users' SET 'confirmed-code'= '0'");
	
	echo "Thank You. Your email has been confirmed and you may now login";
	
}
else
{
    echo "Username and code dont match";
}


?>