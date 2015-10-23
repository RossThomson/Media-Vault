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

if (!$total){
echo("There is no search result");
} else {
$counter=0;
while($counter<$total):
//$case_alias_year=mysql_result($result,$counter,"CONTENTTITLE");
//$student_grade=mysql_result($result,$counter,"CONTENTTYPE");
//$student_div=mysql_result($result,$counter,"SIZE");
//$student_no=mysql_result($result,$counter,"SYNOPSIS");
echo (($result,$counter,"CONTENTTITLE"));

$counter = $counter + 1;
endwhile;
echo("</table>");
}
mysql_close($con);
?>