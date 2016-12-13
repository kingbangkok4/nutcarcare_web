<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/customer.php";

/* $data = array(
    "name" => "a",
    "mobile" => "b",
    "email" => "c"
); */

$data = array(
    "name" => $_REQUEST["name"],
    "mobile" => $_REQUEST["mobile"],
    "email" => $_REQUEST["email"]
);
	
$obj = new Customer();
$rows = $obj->read(" email = '{$data["email"]}' ");

$resultArray = array();
if ($rows != false) {
	$row = $rows[0];
	
	$rows_car = $obj->read_car(" cust_id = {$row["id"]} ");
	if ($rows_car == false) {
		$obj->insert_car($row["id"]);					
	}
		
	$arrCol = array();
	$arrCol["cust_id"] = $row["id"];	
	array_push($resultArray, $arrCol);
}else{
	$cust_id = $obj->insert_cust($data);
	$obj->insert_car($cust_id);
	
	$arrCol = array();
	$arrCol["cust_id"] = $cust_id;			
	array_push($resultArray, $arrCol);
}
	
echo json_encode($resultArray);
?>