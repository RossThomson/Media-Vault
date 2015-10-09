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
if (mysql_error()) {
echo 'DB connection error - ' . mysql_error();
}
mysql_select_db("MEDIALYNX");
if (mysql_error()) {
echo 'DB name error - ' . mysql_error();
}
mysql_query("CONTENT");
$query = "select * from CONTENT where CONTENTTITLE like '%$key%'";
if (mysql_error()) {
echo 'query error - ' . mysql_error();
}
$result = mysql_query($query, $con);;
 
$total = mysql_num_rows($result);
echo("
<table border=0 width=700>
<tr><td align=center colspan2><h1>Search result</h1></td></tr>
<tr><td>Key word: $key</td>
<td align=right><a herf=searchform.php>[List]</a></td></tr>
");
 
echo("
<table border=1 width=700>
<tr><td align=center width=50><b>File name</b><td>
<td align=center width=50><b>Type</b><td>
<td align=center width=50><b>Size</b><td>
<td align=center width=50><b>Synopsis</b><td>
</tr>
");
if (!$total){
echo("<tr><td colspan=5 align=center>No search result.</td></tr>");
} else {
$counter = 0;
while($counter<$total):
//echo "<td> ".$row['CONTENTTITLE']."</td>";
$CONTENTTITLE=mysql_result($result,$counter,"CONTENTTITLE");
$CONTENTTYPE=mysql_result($result,$counter,"CONTENTTYPE");
$SIZE=mysql_result($result,$counter,"SIZE");
$SYNOPSIS=mysql_result($result,$counter,"SYNOPSIS");
$counter = $counter + 1;
endwhile;
echo("</table>");
}
mysql_close($con);
?>