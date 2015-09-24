<?php
session_start();

if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Media</title>	
	<!-- <link rel="shortcut icon" href="graphics/favicon.ico" />
	<link rel="stylesheet" href="styles/styles.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> -->
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>
		<span id="sign_in_info"></span>
		<div id="media2_header_inside">
			<!-- <a href="index.php">
				<img src="graphics/logo.jpg">
			</a> -->
			<ul>
				<li><a href="media_playlist.php">Playlist</a></li>
				<li><a class="active" href="media_doc.php">Doc</a></li>
				<li><a href="media_photo.php">Photo</a></li>
				<li><a href="media_music.php">Music</a></li>
				<li><a href="media_video.php">Video</a></li>
				<li><a href="media_all.php">All files</a></li>
				<li><a href="Delete.php">Delete</a></li>
			</ul>		
		</div>
	</header>
</div>
	<!-- </div> -->
	<div class="media_divider"></div>
		<div class="media_content">
			<br><br><br><br>
	    <?php
		$dbname = "MEDIALYNX";
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "root";
		$name = $_SESSION['first_name'];
		$Email = $_SESSION['email'];
		
		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		$db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX'); // test
		
		$q1 = $conn->query("SELECT * FROM USERS WHERE EMAIL = '$Email'");
		$q2 = $q1->fetch(); 
		$user = $q2['USERID'];
		
		$query = "select * from CONENT"
		$result = $conn->query($query); // test
        $num_result = $result->num_rows; // test
		
		echo"<legend>Your document files, ".$name."</legend>";
			
		$q3 = $conn->query("SELECT * FROM CONTENT WHERE USERID = '$user'");
		$rows = $q3->rowCount();
		if($rows == 0) {
			echo '<ul style="list-style-type:none">';
			echo '<li>Please <a href="upload.php">upload</a> files first</li>';
			echo '</ul>';
		} else {
			while($q4 = $q3->fetch()) {
				$id = $q4['CONTENTID'];
				echo '<ul style="list-style-type:none">';
				echo '	<li>'.$q4['CONTENTTITLE'].'</li>';//Need to add a hyperlink to file
				//echo '	<li>'.$q4["SYNOPSIS"].'</li>';//with the content title.
				echo '</ul>';
			}
		}
		
		//$conn->close();
	?>
	
	<table border='1' align="center">
        <thead>
            <tr>
                <th width="50">NUM</th>
                <th width="250">FILE</th>
                <th width="200">TYPE</th>
                <th width="70">SIZE</th>
                <th width="50">DEL</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for($i=0; $i<$num_result; $i++)
                {
                    $row = $result->fetch_assoc();
                    echo "<tr>";
                    echo "<td align='center'>".$row['SIZE']."</td>";
                    echo "<td align='left'>
                <a href='./download.php?num=".$row['num']."'>".$row['name']."</a></td>";
                    echo "<td align='center'>".$row['time']."</td>";
                    echo "<td align='center'>".$row['down']."</td>";
                    echo "<td align='center'>
                <a href='./delete.php?num=".$row['num']."'>DEL</a></td>";
                    echo "</tr>";
                }
                $db->close();
            ?>
        </tbody>
    </table>
	
	
		</div>
	</div>
	<div class="media_divider"></div>
	</div>
	<br><br>
<div id="aboutus_content">	
<form action="upload_doc.php" method="post" enctype="multipart/form-data">
    Select a document to upload:
    <input type="file" name="fileName"/>
    <input type="submit" value="Submit" name="submit"/>
</form>

</div>
	
	<br><br><br>
	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>