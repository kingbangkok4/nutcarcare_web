<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/order.php";
$obj = new Order();
$dateNow = date("d",strtotime(date("Y-m-d")));
$rows = $obj->read(" (tb_order.print = 0 AND tb_order.status <> -1) OR (tb_order.status = -1 AND DAYOFMONTH(tb_order.order_date) = {$dateNow}) ");
//echo " (tb_order.print = 0 AND tb_order.status <> -1) OR (tb_order.status = -1 AND DAYOFMONTH(tb_order.order_date) = {$dateNow}) ";
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