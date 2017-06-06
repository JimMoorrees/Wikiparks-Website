<?php
session_start();
include ('functions/function.php');
 $connect = connectToDB();

$query = "SELECT `ParkNaam`, `ParkLocatie`, `ParkImage`, `ParkOpeningstijden`, `ParkPrijzen`,`ParkBeschrijving` FROM `park`;";
$result = $connect->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>WikiParks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/stylesheet.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php require_once('includes/header.php'); ?>
<!--<div class="banner">
  <img src="img/banner3.jpeg" width="100%" height="250px;">
</div>-->
<div class="container-fluid">
      <nav class="fixed-left">
        <h4>Zoeken op Entree Prijs</h4>
        <h5><a href="#">5-15 Euro</a></h5><br/>
        <h5><a href="#">15-25 Euro</a></h5><br/>
        <h5><a href="#">25-35 Euro</a></h5><br/>
        <h5><a href="#">35+ Euro</a></h5><br/>
        <h4>Zoeken op Locatie</h4>
        <h5><a href="#">Drenthe</a></h5><br/>
        <h5><a href="#">Flevoland</a></h5><br/>
        <h5><a href="#">Friesland</a></h5><br/>
        <h5><a href="#">Gelderland</a></h5><br/>
        <h5><a href="#">Groningen</a></h5><br/>
        <h5><a href="#">Limburg</a></h5><br/>
        <h5><a href="#">Noord-Brabant</a></h5><br/>
        <h5><a href="#">Noord-Holland</a></h5><br/>
        <h5><a href="#">Overijssel</a></h5><br/>
        <h5><a href="#">Utrecht</a></h5><br/>
        <h5><a href="#">Zeeland</a></h5><br/>
        <h5><a href="#">Zuid-Holland</a></h5><br/>
        <h4>Gemaakt Door:</h4>
        <h5><a href="#">Jim Moorrees</a></h5><br/>
        <h5><a href="#">Stan Rutten</a></h5><br/>
        <h5><a href="#">Jacky Nguyen</a></h5><br/>
        <h5><a href="#">©Limbo's. All Rights Reserved.</a></h5><br/>
      </nav>
</div>
<div class="headingtext">
<img width="300px;" height="75px;" src="img/logowikiparks.png">
</div>

<div class="pretpark-container">
  
  <?php
  while($pretpark = $result->fetch_assoc())
    {
      ?>
      <div id="pretparken">
      <div id="pretpark-image"><img height="120px" width="200px" src="/Wikiparks-Website/img/<?php echo $pretpark['ParkImage']?>"></div>
      <div id="pretpark-naam"><h3><?php echo $pretpark['ParkNaam']?></h3></div>
      <div id="pretpark-locatie"><p>Locatie: <?php echo $pretpark['ParkLocatie']?></p></div>
      <div id="pretpark-openingstijden"><p> Openingstijden: <?php echo $pretpark['ParkOpeningstijden']?></p></div>
      <div id="pretpark-prijs"><p> Ticket Prijzen: <?php echo $pretpark['ParkPrijzen']?></p></div>
      <div id="pretpark-beschrijving"><p><?php echo $pretpark['ParkBeschrijving']?></p></div>

      </div>
      <?php
    }
    ?>

</div>
</body>
</html>