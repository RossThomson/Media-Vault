<?php
mysql_connect('localhost', 'root', 'root');

mysql_select_db('Meadialynx');

$sql="SELECT * FROM PLAYLIST";

$records=mysql_query($sql);

?>


<html>
<head>
<title>meadia playlist</title>
</head>
<body>
<table width="600" border="1" cellpadding="1" cellspacing="1">
<tr>
<th>UserId</th>
<th>ContentId</th>
<th>PlayListId</th>
<th>PlayListName</th>
</tr>
<?php
while($playlist=mysql_fetch_assoc($records)){
    echo"<tr>";
    
    echo"<td>".$playlist['UserId']."</td>";
    echo"<td>".$playlist['ContentId']."</td>";
    echo"<td>".$playlist['PlayListId']."</td>";
    echo"<td>".$playlist['PlayListName']."</td>";
    
    echo"</tr>";
}

</body>





</html>
