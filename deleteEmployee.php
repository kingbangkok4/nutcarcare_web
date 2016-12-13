<?php
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/employee.php";

$emp = new Employee();
$emp->delete($_REQUEST["user_ref"]);
redirect("index.php?viewName=employeeList");
