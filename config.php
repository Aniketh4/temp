<?php
$databaseHost = 'tbf-db.chwiu8qak8lg.eu-north-1.rds.amazonaws.com';
$databasePort = '3306'; // Change this to the port your MySQL server is using
$databaseUser = 'admin';
$databasePassword = 'Aniketh2204';
$databaseName = 'test';

try {
  $conn = new PDO("mysql:host=$databaseHost;port=$databasePort;dbname=$databaseName", $databaseUser, $databasePassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
  echo "Something went wrong: " . $error->getMessage();
}
?>
