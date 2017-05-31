<?php
include ('functions/function.php');
 $connect = connectToDB();

$query = "SELECT `ParkNaam`, `ParkLocatie`, `ParkOpeningstijden`, `ParkPrijzen`,`ParkBeschrijving` FROM `park`;";
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
        <li class="active"><a href="index.php" style="background-color: darkorange;" href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">FAQ</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--<div class="banner">
  <img src="img/banner3.jpeg" width="100%" height="250px;">
</div>-->
<div class="container-fluid">
      <nav class="fixed-left">
        <h4>Zoeken op leeftijd</h4>
        <h5><a href="#">0-3 jaar</a></h5><br/>
        <h5><a href="#">3-12 jaar</a></h5><br/>
        <h5><a href="#">12-60 jaar</a></h5><br/>
        <h5><a href="#">60+ jaar</a></h5><br/>
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
      <div id="pretpark-image"><img height="100px" width="175px" src="img/<?php echo $pretpark['ParkImage']?>"></div>
      <div id="pretpark-naam"><p><?php echo $pretpark['ParkNaam']?></p></div>
      <div id="pretpark-locatie"><p><?php echo $pretpark['ParkLocatie']?></p></div>
      <div id="pretpark-openingstijden"><p><?php echo $pretpark['ParkOpeningstijden']?></p></div>
      <div id="pretpark-prijs"><p><?php echo $pretpark['ParkPrijzen']?></p></div>
      <div id="pretpark-beschrijving"><p><?php echo $pretpark['ParkBeschrijving']?></p></div>

      </div>
      <?php
    }
    ?>

</div>
</body>
</html>
