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
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<!--<link rel="icon" href="http://getbootstrap.com/favicon.ico">-->
		<!--<title>Media Lynx</title>-->
		<!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="./bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<!-- Custom styles for this template -->
		<link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
		
</head>

<body class="bodyMedia">
<div class="wrapper">
	<div class="container">
	<header>
		<?php include 'header_bootstrap.php'; ?>
	</header>
	</div>
<div class="container-fluid">
	<div class = "container">
		<ul class="nav nav-tabs">
			<li><a href="media_all_bootstrap.php">All files</a></li>
			<li><a href="media_playlist.php">Playlists</a></li>
			<li  class="active disabled"><a class = "active" href="#">Docs</a></li>
			<li><a href="image_gallery_test.php">Photos</a></li>
			<li><a href="media_music.php">Music</a></li>
			<li><a href="media_video.php">Videos</a></li>
		</ul>		
	</div>
</div>
</header>
	<form  class="upload_form" action="upload_doc_new_dir.php" method="post" enctype="multipart/form-data" onsubmit="return checkDocFile(this);">
    Select a document to upload:
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
            <th width="40">SELECT
                       </th>
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
					echo "<tr>";
						echo "<td align='center' padding='20'>";
						echo "<form id='form1' method='post'>";
	  					echo "<p>";
	    				echo "<input type='checkbox' name='chkbx' id='chkbx' />";
	    				echo "<label for='chkbx'>";
						echo "</label>";
      					echo "</p>";
						echo "</form>";
						echo "</td>";
                    $row = $result->fetch_assoc();
                    //echo "<tr>";
                    echo "<td align='left'>
                <a href='download.php?num=".$row['CONTENTID']."'>".$row['CONTENTTITLE']."</a></td>";
                    echo "<td align='center'>".$row['SIZE']."</td>";
					echo "<td align='center'>".$row['SYNOPSIS']."</td>";

                    echo "<td align='center'>
                <a href='delete_jae.php?num=".$row['CONTENTID']."' onClick=\"return 
							confirm('are you sure you want to delete??');\">DEL</a></td>";

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