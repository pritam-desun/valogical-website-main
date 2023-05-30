<?php
include_once "../framework/main.php";

$id = $_GET['id'];
$currency = fetchRow('master', ' master_id=' . $id);
if ($currency != '') {
    echo $currency['currency_symbol'] . " " . $currency['currency_code'];
} else {
    echo "currency not found";
}
