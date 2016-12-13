<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/customer.php";

// insert customer
$obj = new Customer();
    $data = array(
	"id" => $_REQUEST["id"],
    "name" => $_REQUEST["name"],
    "mobile" => $_REQUEST["mobile"],
    "email" => $_REQUEST["email"]
);
$obj->update($data);
redirect("index.php?viewName=customerList");

?>
