
As a user I want to receive a confirmation email so that I can verify the info I have entered.

Requirements - 
User must have completed registration process
Email arrives within 2min of completed registration
- Notify through email that their account has been created - link to the user media page


As a user, I want to be able to make play lists with media files I choose so that I can manage media files efficiently.
requirements
-­ field for the name of play list ­ checkbox for selecting
As a user I should be able to view all of my playlists in one place




<!Doctype html>
<html>
<head>
<title>Email conformation</title>
</head>


<body>

<?php

session_start();
mysql_connect('localhost','root','root');
mysql_select_db("MEDIALYNX");


$FirtsName = $_GET['FirstName'];
$code = $_GET['code'];

$query = mysql_query("SELECT * FROM 'users' WHERE 'FirstName = $FirstName'");
while($row = mysql_fetch_assoc($query))
{
    $db_code = $row['confirm-code'];
}
if($code == $db_code)
{
    mysql_query("UPDATE 'users' SET 'confirmed'= '1'");
	mysql_query("UPDATE 'users' SET 'confirmed-code'= '0'");
	
	echo "Thank You. Your email has been confirmed and you may now login";
	
}
else
{
    echo "UserName and code Don't match";
}?>
</body>
</html>