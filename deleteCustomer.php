<?php
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/customer.php";

$obj= new Customer();
$obj->delete(" id = {$_REQUEST["id"]}");
redirect("index.php?viewName=customerList");

?>
