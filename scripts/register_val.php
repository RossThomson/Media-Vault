<?php

// define variables and set to empty values

$firstname = $lastname = $email= $secretanswer = $password = $secretquestion = "";
$dir = "/var/www/html/Media-Vault/uploads/";

function validate_form($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$firstname = validate_form($_POST["firstname"]);
	$lastname = validate_form($_POST["lastname"]);
	$email = validate_form($_POST["email"]);
	$password = validate_form($_POST["password"]);
	$secretquestion = validate_form($_POST["secretquestion"]);
	$secretanswer = validate_form($_POST["secretanswer"]);
	
	$hash = password_hash('$password', PASSWORD_DEFAULT);
	
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";

		try {
					$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$result = $pdo->query("SELECT EMAIL FROM  USERS WHERE EMAIL = '$email'");
					
					if ($result->rowCount() > 0)
					{	session_start();
						$_SESSION['error'] = "Email already registered";
						header("location: ../register.php");
					}
					
					else
					{ 
						$sql = "INSERT INTO USERS(FIRSTNAME, LASTNAME, EMAIL, SECRETQUESTION, SECRETANSWERS, HASH) VALUES ('$firstname','$lastname','$email','$secretquestion','$secretanswer','$hash')";
						
					$pdo->exec($sql);
					
					$userfolder = $dir.$firstname.$lastname;
					$userthumbs = $userfolder."/thumbs";
					
					mkdir("$userfolder");
					mkdir("$userthumbs");
 
 
					
				
						
					} 
				}
				
			catch(PDOException $e)
				{
					echo $e->getMessage();
				}

				$pdo = null;
				
	
	
}
mail('ndhimar@yahoo.co.in','Test',Hi)
echo("Done")
?>	






