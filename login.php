<?php
session_start();


// grab recaptcha library
require_once "includes/recaptchalib.php";

if( isset($_SESSION['user_id']) ){
	header("Location: /WikiParksWeb/Wikiparks-Website");
	exit();
}

require 'includes/config.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT id,email,password,top_1,top_2,top_3 FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
		$_SESSION['user_id'] = $results['id'];
		$_SESSION['email'] = htmlspecialchars($results['email']);
		$_SESSION['top_1'] = htmlspecialchars($results['top_1']);
		$_SESSION['top_2'] = htmlspecialchars($results['top_2']);
		$_SESSION['top_3'] = htmlspecialchars($results['top_3']);
		header("Location: dashboard.php");
		exit();
	} else {
		$message = '<span style="color:white;text-align:center;font-size:25px;text-shadow: 2px 2px black;">Sorry, de gebruikersnaam en/of wachtwoord zijn onjuist.</span>';
	}

endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>WikiParks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styleRegister.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<?php require_once('includes/header.php'); ?>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>


	<h1>Login</h1>
	<span style="color:white;text-align:center;font-size:25px;text-shadow: 2px 2px black;">or <a href="signup.php" style="color: #0098cb;">register here</a></span>

	<form action="login.php" method="POST">
		
		<input type="text" placeholder="Enter your username" name="email">
		<input type="password" placeholder="and password" name="password">


		<input type="submit" value="Login">


	</form>
	
<div class="footer">©Limbo's</strong>.</div>
</body>
</html>
</body>
</html>

