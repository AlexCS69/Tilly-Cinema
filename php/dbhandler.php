<?php
//Params to connect to database.
$dbHost="localhost";
$dbUser="root";
$dbPass="";
$dbName="tilly";

$conn=mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn){
  die("Database connection failed.");
}

 ?>
