<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');
include './lib/std.php';
include './lib/helper.php';
include "./lib/dbConnector.php";
requireLogin();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบสารสนเทศการจัดการบริการดูแลรักษารถ </title>
		<link href="css/site.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
        <!--<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>-->
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		
		<link rel="stylesheet" type="text/css" href="js/bootstrap-wysihtml5.css" />
		<script src="js/wysihtml5-0.3.0.js"></script>
		<script src="js/bootstrap3-wysihtml5.js"></script>

		<style type="text/css" media="screen">
			.btn.jumbo {
				font-size: 20px;
				font-weight: normal;
				padding: 14px 24px;
				margin-right: 10px;
				-webkit-border-radius: 6px;
				-moz-border-radius: 6px;
				border-radius: 6px;
			}
		</style>
    </head>
    <body>
        <?php
        include "menu.php";
        if ($_GET["viewName"] != "") {
            include "./views/{$_GET["viewName"]}.php";
        } else {
            redirect("index.php?viewName=employeeList");
        }
        ?>
    </body>
</html>
