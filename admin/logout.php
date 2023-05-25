<?php
include("include/master.php");
session_destroy();
include_once("../framework/main.php");
redirect('admin/login.php');
?>