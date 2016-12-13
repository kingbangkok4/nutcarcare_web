<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/employee.php";
// insert employee
$emp = new Employee();
$data = array(
	"username" => $_REQUEST["username"],
    "password" => $_REQUEST["password"],
    "fullname" => $_REQUEST["fullname"],
    "mobile" => $_REQUEST["mobile"],
    "email" => $_REQUEST["email"],
    "address" => $_REQUEST["address"],
    "gender" => $_REQUEST["gender"],
	"id" => $_REQUEST["user_ref"]
);
$emp->update($data, " user_ref={$_REQUEST["user_ref"]}");
var_dump($data);
//echo mysql_info();
redirect("index.php?viewName=employeeList");
