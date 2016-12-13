<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/car.php";

$cust_id = $_REQUEST["cust_id"];
	
$obj = new Car();
$rows = $obj->read(" cust_id = {$cust_id} ");

$resultArray = array();
if ($rows != false) {
	$row = $rows[0];
	
	$arrCol["id"] = $row["id"];	
	$arrCol["license_plate"] = $row["license_plate"];
	$arrCol["brand"] = $row["brand"];
	$arrCol["type"] = $row["type"];
	$arrCol["color"] = $row["color"];
	$arrCol["scar"] = $row["scar"];
	
	array_push($resultArray, $arrCol);
}
	
echo json_encode($resultArray);
?>