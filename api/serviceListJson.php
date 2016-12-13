<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/service.php";
$obj = new Service();
$rows = $obj->read();
$resultArray = array();

	if ($rows != false) {
		foreach ($rows as $row) {
			$arrCol = array();
			$arrCol["id"] = $row["id"];
			$arrCol["name"] = $row["name"];
			$arrCol["price"] = $row["price"];	
			$arrCol["created_date"] = $row["created_date"];		
			$arrCol["promotion"] = $row["promotion"];	
			$arrCol["active"] = $row["active"];	
			array_push($resultArray,$arrCol);
		}
	}
	
echo json_encode($resultArray);
?>