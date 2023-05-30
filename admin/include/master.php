<?php
include("include/config.php");
if ($_SESSION['logged_in'] != 1) {
  header("Location: login.php");
}
include("include/header.php");
include("include/sidebar.php");
include("include/topnav.php");
