<?php
	# SETTINGS
	$max_width = 100;
	$max_height = 100;
	
	
	function getPictureType($ext) {
		if ( preg_match('/jpg|jpeg/i', $ext) ) {
			return 'jpg';
		} else if ( preg_match('/png/i', $ext) ) {
			return 'png';
		} else if ( preg_match('/gif/i', $ext) ) {
			return 'gif';
		} else {
			return '';
		}
	}
	
	function getPictures() {
		session_start();
	$userid = $_SESSION['userid'];
	@ $db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX');
				if(mysqli_connect_errno())
				{
					echo "DB connect error";
				}		
        
				$query = "select * from USERS WHERE USERID = '$userid'";
				$result = $db->query($query);
				$row = $result->fetch_assoc();
				
	$firstname = $row['FIRSTNAME'];
	$lastname = $row['LASTNAME'];
	
	$dir = "./uploads/";
	$userdir = $dir.$firstname.$lastname."/";
	$userdirthumbs = $userdir."thumbs/";
		
		
		global $max_width, $max_height;
		if ( $handle = opendir("$userdir") ) {
			$lightbox = rand();
			echo '<ul id="pictures">';
			while ( ($file = readdir($handle)) !== false ) {
				if ( !is_dir($file) ) {
					$split = explode('.', $file); 
					$ext = $split[count($split) - 1];
					if ( ($type = getPictureType($ext)) == '' ) {
						continue;
					}
					
					if ( ! file_exists($userdirthumbs.$file) ) {
						if ( $type == 'jpg' ) {
							$src = imagecreatefromjpeg($userdir.$file);
						} else if ( $type == 'png' ) {
							$src = imagecreatefrompng($userdir.$file);
						} else if ( $type == 'gif' ) {
							$src = imagecreatefromgif($userdir.$file);
						}
						if ( ($oldW = imagesx($src)) < ($oldH = imagesy($src)) ) {
							$newW = $oldW * ($max_width / $oldH);
							$newH = $max_height;
						} else {
							$newW = $max_width;
							$newH = $oldH * ($max_height / $oldW);
						}
						$new = imagecreatetruecolor($newW, $newH);
						imagecopyresampled($new, $src, 0, 0, 0, 0, $newW, $newH, $oldW, $oldH);
						if ( $type == 'jpg' ) {
							imagejpeg($new, $userdirthumbs.$file);
						} else if ( $type == 'png' ) {
							imagepng($new, $userdirthumbs.$file);
						} else if ( $type == 'gif' ) {
							imagegif($new, $userdirthumbs.$file);
						}
						imagedestroy($new);
						imagedestroy($src);
					}
					echo '<li><a href= '$userdir.$file' rel="lightbox['.$lightbox.']">';
					echo '<img src="./uploads/RossTest/thumbs/'.$file.'" alt="" />';
					echo '</a></li>';
				}
			}
			echo '</ul>';
		}
	}
?>