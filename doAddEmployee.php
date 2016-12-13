<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/employee.php";

// insert employee
$emp = new Employee();
$user_refID = $emp->insert_user($_REQUEST["username"], $_REQUEST["password"]);
if ($user_refID == false) {
    redirect("errorAddEmployee.php");
} else {
    $data = array(
    "fullname" => $_REQUEST["fullname"],
    "mobile" => $_REQUEST["mobile"],
    "email" => $_REQUEST["email"],
    "address" => $_REQUEST["address"],
    "gender" => $_REQUEST["gender"],
    "user_ref" => $user_refID
    );
    $emp->insert($data);
    redirect("index.php?viewName=employeeList");
}
