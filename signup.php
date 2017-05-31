<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'includes/config.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	
	// Enter the new user in the database
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);

	if( $stmt->execute() ):
		$message = 'Successfully created new user';
	else:
		if($stmt->errorInfo()[1] === 1062) { // duplicate entry error
			$message = 'Er bestaat al een account met dat emailadress.';
		} else {
			$message = 'Sorry there must have been an issue creating your account.';
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
<header>
	<nav class="navbar navbar-inverse" style="border-radius: 0px; background-color: darkorange;">
	  <div class="container-fluid">
	    <div class="navbar-header"> 
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a style="background-color: darkorange;" href="index.php">Home</a></li>
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Locaties<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Drenthe</a></li>
	            <li><a href="#">Flevoland</a></li>
	            <li><a href="#">Friesland</a></li>
	            <li><a href="#">Gelderland</a></li>
	            <li><a href="#">Groningen</a></li>
	            <li><a href="#">Limburg</a></li>
	            <li><a href="#">Noord-Brabant</a></li>
	            <li><a href="#">Noord-Holland</a></li>
	            <li><a href="#">Overijssel</a></li>
	            <li><a href="#">Utrecht</a></li>
	            <li><a href="#">Zeeland</a></li>
	            <li><a href="#">Zuid-Holland</a></li>
	          </ul>
	        </li>
	        <li><a href="#">About</a></li>
	        <li><a href="#">FAQ</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
</header>



	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
	<span>or <a href="login.php">login here</a></span>

	<form action="signup.php" method="POST">
		
		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">
		<input type="password" placeholder="confirm password" name="confirm_password">
		<input type="submit">

	</form>

</body>
</html>

