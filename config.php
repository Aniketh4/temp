<?php
session_start();
$databaseHost = 'localhost';
$databaseUser = 'thebomb1_Aniketh'; 
$databasePassword = '@jfTIDbEow6['; // Removed space
$databaseName = 'thebomb1_Main';

try {
  $conn = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUser, $databasePassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
  echo "Something went wrong: " . $error->getMessage();
}
?>
