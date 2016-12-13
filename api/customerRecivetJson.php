<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/order.php";
$obj = new Order();
$rows = $obj->read(" tb_order.status NOT IN (-1, 1, 3) ");
$resultArray = array();

	if ($rows != false) {
		foreach ($rows as $row) {
			$arrCol = array();			
			$arrCol["id"] = $row["id"];
			$arrCol["order_date"] = $row["order_date"];
			$arrCol["status"] = $row["status"];
			$arrCol["license_plate"] = $row["license_plate"];	
			$arrCol["name"] = $row["name"];	
		    $arrCol["mobile"] = $row["mobile"];			
			$arrCol["email"] = $row["email"];				
			array_push($resultArray,$arrCol);
		}
	}
	
echo json_encode($resultArray);
?>