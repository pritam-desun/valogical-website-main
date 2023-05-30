<?php
//error_reporting(-1);
$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "valogical_new";
session_start();
// Create connection 
$conn = new mysqli($hostname, $username, $password, $databasename);
// Check connection 
if ($conn->connect_error) {
  die("Unable to Connect database: " . $conn->connect_error);
}
// if ($_SESSION['logged_in'] != 1) {
//   header("location:login.php");
// }

function UploadFile($file)
{
  $data = [];
  $target_dir = "upload/";

  $image = basename($file['image']['name']);

  $image_tep_name = $_FILES['image']['tmp_name'];

  if (!move_uploaded_file($image_tep_name, $target_dir . $image)) {
    $data = [
      'success' => false,
      'image' => $image
    ];
    return $data;
  }
  $data = [
    'success' => true,
    'image' => $image
  ];

  return $data;
}
