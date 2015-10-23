<?php
//$field=$_POST['field'];
$key = $_POST['key'];
if(!$key){
echo("<script>
window.alert('Input keywords');
history.go(-1);
</script>");
exit;
}
 
$con = mysql_connect("localhost", "root", "root");
mysql_select_db("MEDIALYNX",$con);
//mysql_query("'$student_name' 'euckr'");
//$result = mysql_query("select * from CONTENT where CONTENTTITLE like '%$key%' limit 0,10", $con);
$query = "select * from CONTENT where CONTENTTITLE like '$key' limit 0,10";
$result = mysql_query($query, $con); 
$total = mysql_num_rows($result);

echo("
<table border=0 width=700>
<tr><td align=center colspan2><h1>Result</h1></td></tr>
<tr><td>Keyword: $key</td>
<td align=right><a herf=searchform.php>[List]</a></td></tr>
");
echo("
<table border=1 width=700>
<tr><td align=center width=50><b>Name</b><td>
<td align=center width=50><b>Type</b><td>
<td align=center width=50><b>Size</b><td>
<td align=center width=50><b>Synopsis</b><td>
</tr>
");
if (!$total){
echo("<tr><td colspan=5 align=center>There is no search result</td></tr>");
} else {
$counter=0;
while($counter<$total):
//$case_alias_year=mysql_result($result,$counter,"CONTENTTITLE");
//$student_grade=mysql_result($result,$counter,"CONTENTTYPE");
//$student_div=mysql_result($result,$counter,"SIZE");
//$student_no=mysql_result($result,$counter,"SYNOPSIS");
echo "<tr><td> ".$row['CONTENTTITLE']." </td></tr>";

$counter = $counter + 1;
endwhile;
echo("</table>");
}
mysql_close($con);
?>