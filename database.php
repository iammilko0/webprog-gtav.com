<?php
$hostname = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "reg";
    
$conn = new mysqli($hostname, $dbUser, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}
?>
