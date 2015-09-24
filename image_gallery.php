<?php

	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	session_start();
	$userid = $_SESSION['userid'];
	
    $db = new mysqli('$dbhost', '$dbuser', '$dbpass', '$dbname');
	if(mysqli_connect_errno())
	{
		echo "DB connect error";
	}
	
	$query = "select * from CONTENT 
	WHERE CONTENTTYPE = IMAGE AND USERID = '$userid'";
	$result = $db->query($query);
	$num_result = $result->num_rows;
	
	if (empty($num_result))      
    echo "nothing here"; 
  else {
	  echo '$num_result';
  }      
   
	

  

?>