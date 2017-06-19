<?php
session_start();
include ('functions/function.php');
 $connect = connectToDB();

$query = "SELECT `ParkId`,`ParkNaam`, `ParkNavigatiePrijzen`, `ParkLocatie`, `ParkProvincie`, `ParkImage`, `ParkOpeningsTijden`, `ParkPrijzen`,`ParkKorteBeschrijving` FROM `park` WHERE 1=1";

>>>>>>> Stashed changes

if(isset($_POST['search'])) 
{
  $query .= ' AND `ParkNaam` LIKE "%' . $_POST['search'] . '%"';
} 
  else if(isset($_GET['location'])) {
  $query .= ' AND `ParkProvincie` = "' . $_GET['location'] . '"';
}
  else if(isset($_GET['navprice'])) {
    $query .= ' AND `ParkNavigatiePrijzen` = "' . $_GET['navprice'] . '"';
}

/*if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `park` WHERE `ParkNaam` LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `park` ORDER BY  `ParkId` ASC ";
    $search_result = filterTable($query);
}



// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "users");
<<<<<<< Updated upstream
    $filter_Result = mysqli_query($connect, $query);
=======
    $filter_Result = mysqli_query($connect, $query2);
>>>>>>> Stashed changes
    return $filter_Result;
}*/

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
  <link rel="stylesheet" href="css/stylesheet.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php require_once('includes/header.php'); ?>


<div class="searchBar">
      <form action="index2.php" method="post">
      <input type="text" name="search" />
      <input type="submit" value="Search" />
      </form>
</div>
        <h4>Zoeken op Entree Prijs</h4>

        <?php foreach(array('Tot 15 Euro', 'Tot 25 Euro', 'Tot 35 Euro', 'Vanaf 35 Euro') as $navigationprice): ?>
          <h5><a href="?navprice=<?php print($navigationprice); ?>"><?php print($navigationprice); ?></a></h5><br />
        <?php endforeach; ?>

        <!--<h5><a href="#">Tot 15 Euro</a></h5><br/>
        <h5><a href="#">Tot 25 Euro</a></h5><br/>
        <h5><a href="#">Tot 35 Euro</a></h5><br/>
        <h5><a href="#">Vanaf 35 Euro</a></h5><br/>-->
        <h4>Zoeken op Locatie</h4>

        <?php foreach(array('Drenthe', 'Flevoland', 'Friesland', 'Gelderland', 'Groningen', 'Limburg', 'Noord-Brabant', 'Noord-Holland', 'Overijssel', 'Utrecht', 'Zeeland', 'Zuid-Holland') as $state): ?>
          <h5><a href="?location=<?php print($state); ?>"><?php print($state); ?></a></h5><br />
        <?php endforeach; ?>
<div class="headingtext">
<img style="margin: 0; display: block; " src="img/logowikiparks.png">
</div>
      <div class="pretpark-container">
      <table id="pretpark-table">
      <?php while($pretpark = mysqli_fetch_array($search_result)){ 
      echo "<tr>";
      if(file_exists(__DIR__ . '/img/'. $pretpark['ParkImage'])): ?>
      <td><img height="125px;" width="200px;"" src="/Wikiparks-Website/img/<?php print($pretpark['ParkImage']); ?>"></td>
      <?php else: ?>
      <?php endif; 
      echo "<td>".$pretpark['ParkNaam']."</td>";
      echo "<td>".$pretpark['ParkLocatie']."</td>";
      echo '<td><div id="ParkOpeningstijden">' . (isset($pretpark['ParkOpeningstijden'])) . '</div></td>';
      echo '<td><div id="ParkPrijs">' . $pretpark['ParkPrijzen'] . '</div></td>';
      echo '<td><div id="ParkKorteBeschrijving">' . $pretpark['ParkKorteBeschrijving'] . '</div></td>';
      echo "</tr>"; 
      ?> 
      <tr class="filler"></tr> 
      <?php
      }
      ?>       
      </table>     
      </div>


      <div class="container-fluid">
      <nav class="fixed-left">

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

<!-- <div class="pretpark-container">
  <?php
  //while($pretpark = $result->fetch_assoc())
    {
      ?>
      <div id="pretparken">
      <div id="pretpark-image"><img height="120px" width="200px" src="/Wikiparks-Website/img/<?php //echo $pretpark['ParkImage']?>"></div>
      <div id="pretpark-naam"><h3><?php //echo $pretpark['ParkNaam']?></h3></div>
      <div id="pretpark-locatie"><p>Locatie: <?php //echo $pretpark['ParkLocatie']?></p></div>
      <div id="pretpark-openingstijden"><p> Openingstijden: <?php //echo $pretpark['ParkOpeningstijden']?></p></div>
      <div id="pretpark-prijs"><p> Ticket Prijzen: <?php //echo $pretpark['ParkPrijzen']?></p></div>
      <div id="pretpark-beschrijving"><p><?php //echo $pretpark['ParkBeschrijving']?></p></div>

      </div>
      <?php
    }
    ?> -->
      
      <div class="pretpark-container">
      <table id="pretpark-table">
      <?php while($pretpark = mysqli_fetch_array($result)){ 
      echo "<tr>";
      if(file_exists(__DIR__ . '/img/'. $pretpark['ParkImage'])): ?>
      <td><img height="125px;" width="200px;"" src="/Wikiparks-Website/img/<?php print($pretpark['ParkImage']); ?>"></td>
      <?php else: ?>
      <?php endif; 
      echo "<td>".$pretpark['ParkNaam']."</td>";
      echo "<td>".$pretpark['ParkLocatie']."</td>";
      echo "<td>".$pretpark['ParkOpeningsTijden']."</td>";
      echo "<td>".$pretpark['ParkPrijzen']."</td>";
      echo "<td>".$pretpark['ParkKorteBeschrijving']."</td>";
      echo "</tr>"; 
      ?> 
      <tr class="filler"></tr> 
      <?php
      }
      ?>       
      </table>     
      </div>

</div>

<script>
  $(function() {
    $(window).on('resize', function resize()  {
        $(window).off('resize', resize);
        setTimeout(function () {
            var content = $('#pretpark-table');
            var top = (window.innerHeight - content.height()) / 2;
            content.css('top', Math.max(0, top) + 'px');
            $(window).on('resize', resize);
        }, 50);
    }).resize();
});
</script>
</body>
</html>