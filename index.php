<?php 
session_start();
?>
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
	<?php require_once('includes/header.php'); ?>

    <div id="park-finder">
      	<div class="slogan-1"><li>Pretparken vinden</li></div>  
		<div class="slogan-2"><li>Vind alle pretparken in Nederland!</li></div>
			<a href="index2.php"><input type="zoek" name="submit-button" class="submit-button" value="Zoek!"></a>
		</div>
	</div>
	<div class="footer">©Limbo's</strong>.</div>
</body>
</html>

