<?php
session_start();
$databaseHost = 'localhost';
$databaseUser = 'thebomb1_Aniketh'; 
$databasePassword = '@jfTIDbEow6['; // Removed space
$databaseName = 'thebomb1_main';

try {
  $conn = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUser, $databasePassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'Database Connected Successfully'; 
} catch(PDOException $error) {
  echo "Something went wrong: " . $error->getMessage();
}
?>
