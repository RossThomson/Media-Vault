<?php
	//Assuming we already have a connection opened (under conn) and we also have the user 
	//logged into their account and looking at their file.
	$userTable = "table";
	$filename = "FileName";
	
	$sql = "DELETE FROM " $userTable " WHERE File = "$filename;
	if($conn -> query($sql) === TRUE) {
		//javascript or html code to say that it has been successfully deleted.
	} else {
		//javascript/html to say it wasn't
	}
	$conn -> close();
?>