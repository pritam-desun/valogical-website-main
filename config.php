<?php
 include_once "framework/main.php";

$hostname     = "localhost";
$username     = "u695327974_taskenhancer_u";
$password     = "#4CubXARG0v";
$databasename = "u695327974_taskenhancer";
$conn = new mysqli($hostname, $username, $password, $databasename);
// Check connection 
if ($conn->connect_error) {
  die("Unable to Connect database: " . $conn->connect_error);
}
