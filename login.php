<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'includes/config.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

		$_SESSION['user_id'] = $results['id'];
		header("Location: index.php");
		

	} else {
		$message = 'Sorry, those credentials do not match';
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

	<h1>Login</h1>
	<span style="color: white;">or <a href="signup.php" style="color: #3BD4D6;">register here</a></span>

	<form action="login.php" method="POST">
		
		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">

		<input type="submit">

	</form>

</body>
</html>
</body>
</html>

