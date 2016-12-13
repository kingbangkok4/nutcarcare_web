<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/order.php";

$obj = new Order();
$order_id = $_REQUEST["order_id"];
$img_signature = $_REQUEST["img_signature"];
    
$obj->recive_car($order_id, $img_signature)
?>
