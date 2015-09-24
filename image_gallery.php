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
    $result_final = "t<tr><td>No Category found</td></tr>n";      
  else {      
    while ($row = mysql_fetch_array($result)) {      
      $result_array[] =      
        "<a href='uploads/. $row['CONTENTTITLE'] .      
        "'><img src='" . $uploads/. $row['CONTENTTITLE'] .      
        "' border='0' alt='" . $row[CONTENTTITLE] . "' /></a>"";      
    }
  
  echo $result_array;
	

  

?>