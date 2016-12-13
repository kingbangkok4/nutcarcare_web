<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/order.php";

$obj = new Order();
$data = array(
    "name" => $_REQUEST["name"],
    "ref_orderId" => $_REQUEST["ref_orderId"]
);
$resultArray = array();
if ($obj->insert_sum_service($data)) {	
	 $arrCol = array();
	 $arrCol["error"] = "บันทึกการใช้บริการสำเร็จ";	
	 array_push($resultArray,$arrCol);
} else {
    $arrCol = array();
	$arrCol["error"] = "เกิด error ในการบันทึกการใช้บริการ !!";
	array_push($resultArray,$arrCol);
}
echo json_encode($resultArray);
?>