<?
	$clear = array();
	$clear['tmp_name'] = $_FILES['userfile']['tmp_name'];
	$clear['name'] = $_FILES['userfile']['name'];
	$clear['size'] = $_FILES['userfile']['size'];
	$clear['type'] = $_FILES['userfile']['type'];
	$clear['error'] = $_FILES['userfile']['error'];


	if( basename($clear['name']) != $clear['name'] ){
		echo "fatal error. forbidden file name <br />";
		exit;
	}

	echo $clear['tmp_name'].'<br />';
	echo $clear['name'].'<br />';
	echo $clear['size'].'<br />';
	echo $clear['type'].'<br />';

	if( $clear['error'] > 0 ){
		echo "error code = [".$clear['error']."]<br />";
	}

	$db = mysqli_connect('localhost', 'root', 'root', 'Media_Lynx');
	if (!$db) {
		echo "Connect failed: " . mysqli_connect_error();
		exit();
	}


	$name = $clear['name'];
	$upload_dir = $_SERVER['CONTENT'].'/upload';
	//$upload_dir = $_SERVER['DOCUMENT_ROOT'].'/upload';
	//echo $upload_dir.'/'.$name.'<br />';
	//echo nl2br(`ls /tmp -al`);

	if( is_uploaded_file($clear['tmp_name'])){
		if( move_uploaded_file($clear['tmp_name'], "$upload_dir/$name") ){
			echo 'move_uploaded_file succeed <br />';
		}
		else{
			echo 'move_uploaded_file fail <br />';
		}
	}

	//$fp = fopen("$upload_dir/$name", "rb");
	//$content = addslashes(fread($fp, filesize("$upload_dir/$name")));
	$fname = $upload_dir.'/'.$name;
	//fclose($fp);

	$query = "INSERT INTO blob_test(name, content) VALUES('$name', '". mysql_escape_string(file_get_contents($fname)) ."');";
	$result = mysqli_query($db, $query) or die('fail to query');

	mysqli_free_result($result);
	mysqli_close($db);

?>