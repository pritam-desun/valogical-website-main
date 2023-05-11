<?php
$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "valogical_db";
session_start();
// Create connection 
$conn = new mysqli($hostname, $username, $password, $databasename);
// Check connection 
if ($conn->connect_error) {
  die("Unable to Connect database: " . $conn->connect_error);
}
if ($_SESSION['logged_in'] != 1) {
  header("location:login.php?log=At First You Need To Login For Access other Pages");
}
