<?php 

session_start(); 

require 'includes/config.php';

if(isset($_POST['top_1'])) {
	$stm = $conn->prepare('UPDATE `users` SET `top_1` = :top WHERE `id` = :id');
	$stm->bindParam(':id', $_SESSION['user_id']);
	$stm->bindParam(':top', $_POST['top_1']);
	$stm->execute();
	
	$_SESSION['top_1'] = $_POST['top_1'];
}

if(isset($_POST['top_2'])) {
	$stm = $conn->prepare('UPDATE `users` SET `top_2` = :top WHERE `id` = :id');
	$stm->bindParam(':id', $_SESSION['user_id']);
	$stm->bindParam(':top', $_POST['top_2']);
	$stm->execute();

	$_SESSION['top_2'] = $_POST['top_2'];
}

if(isset($_POST['top_3'])) {
	$stm = $conn->prepare('UPDATE `users` SET `top_3` = :top WHERE `id` = :id');
	$stm->bindParam(':id', $_SESSION['user_id']);
	$stm->bindParam(':top', $_POST['top_3']);
	$stm->execute();

	$_SESSION['top_3'] = $_POST['top_3'];
}


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

  <script src="js/jquery.easydropdown.js" type="text/javascript"></script>
</head>
<body>
	<?php require_once('includes/header.php'); ?>

	<form action="dashboard.php" method="POST" class="demo">
		
		<h1 style="margin-top: 25px;">Kies hier je top 3 leukste pretparken</h1>

		<!-- <input type="text" placeholder="Leukste pretpark" name="top_1"> -->
		<select class="balck" name="top_1">
				<option>Toverland</option>
				<option>HTML </option>
				<option>HTML 5</option>
		</select>
		<select class="balck" name="top_2">
				<option>Toverland</option>
				<option>HTML </option>
				<option>HTML 5</option>
		</select>
		<select class="balck" name="top_3">
				<option>Toverland</option>
				<option>HTML </option>
				<option>HTML 5</option>
		</select>

		
<!-- 			<select name="top_1" class="select-park">
				<option value="Toverland">Toverland</option>
				<option value="Efteling">Efteling</option>
				<option value="Slagharen">Slagharen</option>
			</select>

		</div>
		<input type="text" placeholder="1e na leukste pretpark" name="top_2">
		<input type="text" placeholder="2e na leukste pretpark" name="top_3"> -->
		
		<input type="submit">


	</form>

	<h1>Zie hier je top 3 preparken: <?php if( isset($_SESSION['user_id']))
		{ 
			echo $_SESSION['email']; 
		}  
		else {
			echo " gebruiker";
		}
		?>.</h1>

	<table border="1" style="color: white; width: 75%; margin-left: auto; margin-right: auto; margin-top: 25px;">
	<tr>
		<th>Top 1:</th>
		<th>Top 2:</th>
		<th>Top 3:</th>
	</tr>

		<td><?php if( isset($_SESSION['user_id']))
		{ 
			echo $_SESSION['top_1']; 
		} 
		else 
		{
			echo "Je bent niet ingelogd, dus er kunnen geen pretparken bewaard worden. ";
		} 
		?>
		</td>

		<td><?php if( isset($_SESSION['user_id']))
		{ 
			echo $_SESSION['top_2']; 
		} 
		else 
		{
			echo "Je bent niet ingelogd, dus er kunnen geen pretparken bewaard worden. ";
		} 
		?>
		</td>
		<td><?php if( isset($_SESSION['user_id']))
		{ 
			echo $_SESSION['top_3']; 
		} 
		else 
		{
			echo "Je bent niet ingelogd, dus er kunnen geen pretparken bewaard worden. ";
		} 
		?>
		</td>

	</table>

<div class="footer"><strong>©Limbo's</strong>.</div>
</body>
</html>
</body>
</html>

