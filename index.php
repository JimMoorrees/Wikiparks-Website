<?php 
session_start();



 ?>;

<!DOCTYPE html>
<html lang="en">
<head>
  <title>WikiParks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
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
    <div id="park-finder">
      	<div class="slogan-1"><li>Pretparken vinden</li></div>  
			<div class="slogan-2"><li>Vind alle pretparken in Nederland!</li></div>
				<a href="index2.php"><input  type="zoek" name="submit-button" class="submit-button" value="Zoek!"></a>
			</div>
		</div>
</body>
</html>

