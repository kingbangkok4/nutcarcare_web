<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/order.php";

$obj = new Order();
$data = array(
    "order_detail" => $_REQUEST["order_detail"],
    "price" => $_REQUEST["price"],
    "order_by" => $_REQUEST["order_by"],
	"cust_id" => $_REQUEST["cust_id"],
	
	"license_plate" => $_REQUEST["license_plate"],
	"brand" => $_REQUEST["brand"],
	"type" => $_REQUEST["type"],
	"color" => $_REQUEST["color"],
	"scar" => $_REQUEST["scar"],
	"front_image" => $_REQUEST["front_image"],
	"left_image" => $_REQUEST["left_image"],
	"right_image" => $_REQUEST["right_image"],
	"behide_image" => $_REQUEST["behide_image"],
	"top_image" => $_REQUEST["top_image"]
);
$resultArray = array();
$id = 0;
$id = $obj->insert($data);
if ($id != 0 && $id != -1) {	
	if ($obj->update_car($data)) {	
		 $arrCol = array();
		 $arrCol["error"] = "บันทึกการใช้บริการสำเร็จ";	
		 $arrCol["id"] = $id;	
		 array_push($resultArray,$arrCol);
	}else {
		$arrCol = array();
		$arrCol["error"] = "เกิด error ในการบันทึกข้อมูลรถ !!";
		$arrCol["id"] = $id;		
		array_push($resultArray,$arrCol);
	}  
} else {
    $arrCol = array();
	$arrCol["error"] = "เกิด error ในการบันทึกการใช้บริการ !!";
	$arrCol["id"] = $id;	
	array_push($resultArray,$arrCol);
}
echo json_encode($resultArray);
?>