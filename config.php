<?php
session_start();
$databaseHost = 'tbf-db.chwiu8qak8lg.eu-north-1.rds.amazonaws.com';
$databaseUser = 'admin'; 
$databasePassword = 'Aniketh2204'; // Removed space
$databaseName = 'test';

try {
  $conn = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUser, $databasePassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
  echo "Something went wrong: " . $error->getMessage();
}
?>
