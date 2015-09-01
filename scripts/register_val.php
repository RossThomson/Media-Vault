<?php

// define variables and set to empty values

$firstname = $lastname = $email= $secretanswer = $password = $secretquestion = "";

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
	
	
	$dbhost = "LocalHost:54.79.17.142";
	$dbname	= "Media_Lynx";
	$dbuser	= "root";
	$dbpass	= "root";

		try {
					$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$result = $pdo->query("SELECT EMAIL FROM users WHERE users.EMAIL = '$email'");
					
					if ($result->rowCount() > 0)
					{
						echo '<style type="text/css">
						#EmailExists{
						visibility: visible;
						}
						</style>';
					}
					else
					{ 
						$sql = "INSERT INTO users(FIRSTNAME, LASTNAME, EMAIL, SECRETQUESTION, SECRETANSWER, PASSWORD, SALT) VALUES ('$firstname','$lastname','$$email','$dateofbirth','$secretquestion', SHA2(CONCAT('$password', '4b3403665fea6'), 0),'4b3403665fea6')";				
						$pdo->exec($sql);
					header("location: http://{$_SERVER['HTTP_HOST']}/register_success.php");
						
					} 
				}
				
			catch(PDOException $e)
				{
					echo $e->getMessage();
				}

				$pdo = null;
				
	
	
}








