<?php  
define("MYSQLUSER","root");
define("MYSQLPASS","root");
define("HOSTNAME","localhost");
define("MYSQLDB","MEDIALYNX");
if(isset($_POST['submit']))  
{  
	$conn = new mysqli("localhost", "root", "root", "MEDIALYNX");
		if($conn -> connect_error) {
			die('Connect Error: ' . $conn -> connect_error);
		} 	

$checkbox1=$_POST['checkbox'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
$in_ch = mysqli_query($con,"insert into PLAYLIST(USERID, CONTENTTITLE, CONTENTTYPE) values ('$chk')");
if($in_ch==1)  
   {  
      echo'<script>alert("Inserted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
}  
?>  