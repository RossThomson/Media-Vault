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
	  $file = $row['CONTENTTITLE'];
	  $result_final .= "<tr>nt<td align='center'>       
      <br />       
      <img src='$target_dir/$file' border='0'       
        alt='$photo_caption' />       
      <br />       
      $photo_caption       
      </td></tr>";     
  }      
   
	

  

?>