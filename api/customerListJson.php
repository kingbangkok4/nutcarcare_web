<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/customer.php";
$name = $_REQUEST["name"];
$obj = new Customer();
$rows = $obj->read(" name LIKE '%{$name}%' ");
$resultArray = array();

	if ($rows != false) {
		foreach ($rows as $row) {
			$arrCol = array();
			$arrCol["id"] = $row["id"];
			$arrCol["name"] = $row["name"];
			$arrCol["mobile"] = $row["mobile"];	
			$arrCol["email"] = $row["email"];		
			array_push($resultArray,$arrCol);
		}
	}
	
echo json_encode($resultArray);
?>