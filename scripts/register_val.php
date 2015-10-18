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
					
					$confirmcode = mt_rand();
					
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
 
 					session_start();
					$_SESSION['error'] = "";
					
					//CHange
			require_once('../PHPMailer/class.phpmailer.php');
  $mail = new PHPMailer(); // create a new object
  $mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465; // or 587
  $mail->IsHTML(true);
  $mail->Username = "ppriyanka1708@gmail.com";
  $mail->Password = "Pinky1309";
  $mail->SetFrom("ppriyanka1708@gmail.com");
  $mail->Subject = "Registration";
  $mail->Body = "<h1>Your Registration SuccessFully</h1><a href=#>Click Here For Confirm Registration </a> ";
  $mail->AddAddress($email);
   if(!$mail->Send())
   {
   echo "Mailer Error: " . $mail->ErrorInfo;
   }
   else
   {
   echo "Message has been sent";
   }
			 
					//change completed
				//header("location: ../register_success.php");
					
				
						
					} 
				}
				
			catch(PDOException $e)
				{
					echo $e->getMessage();
				}

				$pdo = null;
				
	
	
}

	
?>





