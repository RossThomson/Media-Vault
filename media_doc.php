<?php
session_start();


	$firstname  = $_SESSION['first_name'];
	$lastname = $_SESSION['last_name'];
	$userid = $_SESSION['userid'];
	$dir = "uploads/";
	$target_dir = $dir.$firstname.$lastname."/";

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
	<script type="text/javascript" src="scripts/upload_val.js"></script>
	<script type="text/javascript" src="scripts/confirm.js"></script>
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
				<li><a href="media_playlist.php">Playlists</a></li>
				<li><a class="active" href="media_doc.php">Docs</a></li>
				<li><a href="image_gallery_test.php">Photos</a></li>
				<li><a href="media_music.php">Music</a></li>
				<li><a href="media_video.php">Videos</a></li>
				<li><a href="media_all.php">All files</a></li>
			</ul>		
		</div>
	</header>
</div>
	
	<form  class="upload_form" action="upload_doc_new_dir.php" method="post" enctype="multipart/form-data" onsubmit="return checkDocFile(this);">
    Select a doc file to upload:
    <input type="file" name="fileName"/>
	<br />
	Description: <input name="ref" type="text" />
    <input type="submit" value="Submit" name="submit"/>
</form>


	<div class="media_divider"></div>
		<div class="media_content">
			<br><br><br><br>
	<?php
        @ $db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX');
        if(mysqli_connect_errno())
        {
            echo "DB connect error";
        }

        $query = "select * from CONTENT where CONTENTTYPE = 'DOC' and USERID = '$userid'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
    ?>
	
	<table border='1' align="center">
        <thead>
            <tr>
                <th width="250">FILE</th>
                <th width="150">SIZE</th>
				<th width="200">SYNOPSIS</th>
                <th width="50">DEL</th>
				<th width="50">View</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
				
                for($i=0; $i<$num_result; $i++)
                {
                    $row = $result->fetch_assoc();
                    echo "<tr>";
                    echo "<td align='left'>
                <a href='download.php?num=".$row['CONTENTID']."'>".$row['CONTENTTITLE']."</a></td>";
                    echo "<td align='center'>".$row['SIZE']."</td>";
					echo "<td align='center'>".$row['SYNOPSIS']."</td>";
                    echo "<td align='center'><a href='delete_jae.php?num=".$row['CONTENTID']."' class = 'confirmation'>DEL</a></td>";
					echo "<td align='center'>
					<a href='". $target_dir.$row['CONTENTTITLE']."'>View</a></td>";

                    echo "</tr>";
                }
                $db->close();
				//Testing..
            ?>
        </tbody>
    </table>	
		</div>
	</div>
	<div class="media_divider"></div>
	</div>
	<br><br>
	
	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>