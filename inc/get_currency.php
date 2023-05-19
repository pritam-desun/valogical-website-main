<?php 
include_once "../framework/main.php";

 $id=$_GET['id'];
$currency=fetchRow('master',' master_id='.$id);
echo $currency['currency_symbol']." ". $currency['currency_code'];
