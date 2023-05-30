<?php
$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "valogical_db";
if (!isset($_SESSION)) {
  session_start();
}
// Create connection 
$conn = new mysqli($hostname, $username, $password, $databasename);
// Check connection 
if ($conn->connect_error) {
  die("Unable to Connect database: " . $conn->connect_error);
}

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
