<?php // Define variables with credentials for the DB.
$servername = "localhost";
$username = "gpofblan_weatherUser";
$password = "weatherUser";
$dbname = "gpofblan_weather";

// Connect to the DB.
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
