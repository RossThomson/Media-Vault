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
	
	
	session_start();
			$userid = $_SESSION['userid'];
			
				@ $db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX');
				if(mysqli_connect_errno())
				{
					echo "DB connect error";
				}		
        
				$query = "select * from CONTENT WHERE CONTENTTYPE = 'IMAGE' AND USERID = '$userid'";
				$result = $db->query($query);
				
	
	
	function getPictures() {
		global $max_width, $max_height;
		if ( $handle = opendir("./uploads/") ) {
			$lightbox = rand();
			echo '<ul id="pictures">';
			$i = 0;
			while ($i < $result->num_rows;()) {
				$row = $result->fetch_assoc();
				$file = $row["CONTENTTITLE"];
				echo $file = $row["CONTENTTITLE"];
				if ( !is_dir($file) ) {
					$split = explode('.', $file); 
					$ext = $split[count($split) - 1];
					if ( ($type = getPictureType($ext)) == '' ) {
						continue;
					}
					if ( ! is_dir('thumbs') ) {
						mkdir('thumbs');
					}
					if ( ! file_exists('./uploads/thumbs/'.$file) ) {
						if ( $type == 'jpg' ) {
							$src = imagecreatefromjpeg('./uploads/'.$file);
						} else if ( $type == 'png' ) {
							$src = imagecreatefrompng('./uploads/'.$file);
						} else if ( $type == 'gif' ) {
							$src = imagecreatefromgif('./uploads/'.$file);
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
							imagejpeg($new, './uploads/thumbs/'.$file);
						} else if ( $type == 'png' ) {
							imagepng($new, './uploads/thumbs/'.$file);
						} else if ( $type == 'gif' ) {
							imagegif($new, './uploads/thumbs/'.$file);
						}
						imagedestroy($new);
						imagedestroy($src);
					
					}
					echo '<li><a href="./uploads/'.$file.'" rel="lightbox['.$lightbox.']">';
					echo '<img src="./uploads/thumbs/'.$file.'" alt="" />';
					echo '</a></li>';
				}
				$i++;
			}
			echo '</ul>';
		}
	}
?>