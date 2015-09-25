<?php

	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	$target_dir = "uploads";
	
	session_start();
	$userid = $_SESSION['userid'];
	
    @ $db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX');
	if(mysqli_connect_errno())
	{
		echo "DB connect error";
	}
	
	$query = "select * from CONTENT 
	WHERE CONTENTTYPE = 'IMAGE' AND USERID = '$userid'";
	$result = $db->query($query);
	$num_result = $result->num_rows;
	
	if (empty($num_result)) {      
     echo "no results found"; 
	}	 
	 
  else {
	 while ($row = mysql_fetch_array($result)) {      
    echo $row['CONTENTTITLE'];    
    }
  }	
  
        
   
	

  

?>