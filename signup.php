<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
	exit();
}

require 'includes/config.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):

	$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$email = $_POST['email'];
	
	// Enter the new user in the database
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $pass);

	if( $stmt->execute() ):
		$message = '<span style="color:white;text-align:center;font-size:25px;">Successfully created new user</span>';
	else:
		if($stmt->errorInfo()[1] === 1062) { // duplicate entry error
			$message = '<span style="color:white;text-align:center;font-size:25px;">Er bestaat al een account met dat emailadress.</span>';
		} 
		else{
		$message = '<span style="color:white;text-align:center;font-size:25px;">Sorry there must have been an issue creating your account</span>';
		}
	endif;

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
</head>
<body>
	<?php require_once('includes/header.php'); ?>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
	<span>or <a href="login.php">login here</a></span>

	<form action="signup.php" method="POST">
		
		<input type="text" placeholder="Enter your username" name="email" minlength="6" maxlength="16">
		<input type="password" placeholder="and password" name="password" minlength="6" maxlength="16">
		<input type="password" placeholder="confirm password" name="confirm_password" minlength="6" maxlength="16">
		<input type="submit" value="Sign-Up">

	</form>
<div class="footer">©Limbo's</strong>.</div>
</body>
</html>

