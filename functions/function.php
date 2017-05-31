<?php

function connectToDB()
{
	$host	= "localhost"; // naam / locatie database server
	$user	= "root"; // gebruikersnaam om in te loggen op de database server
	$pass	= ""; // wachtwoord usbw voor usb webserver
	$dB		= "users"; // naam van de database
	
	$conn = new mysqli($host, $user, $pass, $dB);
	
	return $conn;
}
//if(isset($_GET['CategoryId']))
?>
