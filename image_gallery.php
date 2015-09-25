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
	
	if (empty($num_result))      
     $result_final = "t<tr><td>No Photo found</td></tr>n";     
  else {
	 while ($row = mysql_fetch_array($result)) {      
      $result_array[] =      
        "<a href='viewgallery.php?cid=$cid&pid=" . $row[0] .      
        "'><img src='" . $images_dir . "/tb_" . $row[2] .      
        "' border='0' alt='" . $row[1] . "' /></a>";      
    }      
    mysql_free_result($result);        
      
    $result_final = "<tr>n";      
  }      
   
	

  

?>