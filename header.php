	
<?php	
	session_start();
	if(isset($_SESSION['email'])) 
	
	{
		$login = "Logout";
	
	}
	
	else 
	{
		$login = "Login";
		
	}


	
	?>
	
	<nav>
			<a href="index.php"><img src="graphics/logo.jpg"></a>
			<ul>
				<li><a href="<?php echo $login?>.php"><?php echo $login;?></a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="help.php">Help</a></li>
			</ul>			
	</nav>




