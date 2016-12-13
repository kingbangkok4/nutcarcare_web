<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";

include "./model/customer.php";
$obj = new Customer();
$rows = $obj->read();

$title = $_REQUEST["title"];
$message = $_REQUEST["message"];

if ($rows != false) {
	foreach ($rows as $row) {
		$email = $row["email"];
		$cust_name = $row["name"];
		$order_date = date("Y-m-d H:i:s");
					
		$header = "From: ระบบสารสนเทศการจัดการบริการดูแลรักษารถ  <contact@nutcarcare.com>\r\n";
		$header .= "Reply-To:contact@nutcarcare.com\r\n";
		$header .= "Bcc: contact@nutcarcare.com\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html; charset=utf-8;\n";					

		$body= "<p>เรียน คุณ <strong>{$cust_name}</strong></p>
				<br />
				<p>&nbsp;&nbsp;ขอขอบคุณที่คุณเลือกใช้บริการกับเรา</p>
				<br /><p>
				<div style='' align='left'>โปรโมชั่น ณ วันที่ $order_date</div>
				</p>";
		$body .="<div>{$message}</div>";
		mail($email, $title, $body, $header);
   }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบสารสนเทศการจัดการบริการดูแลรักษารถ </title>
		<link href="css/site.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
        <!--<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>-->
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
              
    </head>
    <body>
			<div class="modal fade" tabindex="-1" role="dialog"  id="myModal" name="myModal">
			  <div class="modal-dialog">
			  <form class="form-horizontal" role="form" method="post" action="index.php?viewName=orderList">
				<div class="modal-content">
				  <div class="modal-header">
					<h4 class="modal-title">สถานะการส่ง E-mail</h4>
				  </div>
				  <div class="modal-body">
					<p style="text-align:center">ส่ง E-mail เรียบร้อย</p>
				  </div>
				  <div class="modal-footer">
					 <input type="submit" value="OK" id="submit" name="submit" class="btn btn-primary">
				  </div>
				</div><!-- /.modal-content -->
				</form>
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
		<script type="text/javascript">
            function msgShow(){
                //alert("hello world");
				$('#myModal').modal('toggle');
				$('#myModal').modal('show');
				//$('#myModal').modal('hide');
            }

           <?php				
				echo "msgShow();";          			    
           ?>
 	</script>
	
	</body>
</html>