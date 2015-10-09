<?php
$field=$_POST['field'];
$key = $_POST['key'];
if(!$key){
echo("<script>
window.alert('Enter words you would like to search');
history.go(-1);
</script>");
exit;
}
 
$con = mysql_connect("localhost", "root", "root");
mysql_select_db("MEDIALYNX");
mysql_query("CONTENT");
$query = "select * from CONTENT where CONTENTTITLE like '$key' limit 0,10";
$result = mysql_query($query, $con);;
 
$total = mysql_num_rows($result);
?>
<table border='1' align="center">
	<thead>
		<tr>
			<th width="250">FILE</th>
			<th width="150">TYPE</th>
			<th width="200">SIZE</th>
			<th width="50">SYNOPSIS</th>
		</tr>
	</thead>
	<tbody>
	<?php					
	for($i=0; $i<$total; $i++) {
		$row = $result->fetch_assoc();
		echo "<tr>";
		echo "<td align='left'>".$row['CONTENTTITLE']."</td>";
		echo "<td align='center'>".$row['CONTENTTYPE']."</td>";
		echo "<td align='center'>".$row['SIZE']."</td>";
		echo "<td align='center'>".$row['SYNOPSIS']."</td>";
		echo "</tr>";
	}
	?>
	</tbody>
</table>
<?php
mysql_close($con);
?>