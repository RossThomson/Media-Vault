<?php 
function listview() {
	//session_start();
			$userid = $_SESSION['userid'];
			
				@ $db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX');
				if(mysqli_connect_errno())
				{
					echo "DB connect error";
				}		
        
				$query = "select * from CONTENT WHERE CONTENTTYPE = 'IMAGE' AND USERID = '$userid'";
				$result = $db->query($query);
				$num_result = $result->num_rows;


					for($i=0; $i<$num_result; $i++)
						{
							$row = $result->fetch_assoc();
							echo "<tr>";
							echo "<td align='center'>".$row['CONTENTID']."</td>";
							echo "<td align='left'>
						<a href='download.php?num=".$row['CONTENTID']."'>".$row['CONTENTTITLE']."</a></td>";
							echo "<td align='center'>".$row['CONTENTTYPE']."</td>";
							echo "<td align='center'>".$row['SIZE']."</td>";
							echo "<td align='center'>".$row['SYNOPSIS']."</td>";
							echo "<td align='center'>
						<a href='delete_jae.php?num=".$row['CONTENTID']."'>DEL</a></td>";
							echo "</tr>";
						}
						$db->close();
}
?>