<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/curtain.php";
$obj = new Curtain();
$rows = $obj->read();
$resultArray = array();

	if ($rows != false) {
		foreach ($rows as $row) {
			$arrCol = array();
			$arrCol["id"] = $row["id"];
			$arrCol["name"] = $row["name"];
			$arrCol["price"] = number_format($row["price"], 2);
			$arrCol["picture"] = $row["picture"];
			$arrCol["picture_top"] = $row["picture_top"];
			$arrCol["picture_left"] = $row["picture_left"];
			$arrCol["picture_right"] = $row["picture_right"];
			$arrCol["picture_chicken"] = $row["picture_chicken"];
			array_push($resultArray,$arrCol);
		}
	}
	
echo json_encode($resultArray);
?>