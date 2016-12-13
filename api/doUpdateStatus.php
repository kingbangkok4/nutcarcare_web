<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/order.php";

$obj = new Order();
$id = $_REQUEST["id"];
$status = $_REQUEST["status"];

$rows = $obj->read(" tb_order.id = {$id} ");
if ($rows != false) {
    $row = $rows[0];
}

$obj->update_status($id , $status);
$resultArray = array();
if($status == "2"){
	$email = $row["email"];
	$cust_name = $row["name"];
	$order_detail = $row["order_detail"];
	$price = $row["price"];
	$order_date = date("Y-m-d H:i:s");
					
	$header = "From: ระบบสารสนเทศการจัดการบริการดูแลรักษารถ  <contact@nutcarcare.com>\r\n";
	$header .= "Reply-To:contact@nutcarcare.com\r\n";
	$header .= "Bcc: contact@nutcarcare.com\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=utf-8;\n";					

	$body= "<p>เรียน คุณ <strong>{$cust_name}</strong></p>	
			<br /><p>
			<div style='' align='left'>วันที่ $order_date</div>
			</p>";
	$body .="<div>ขณะนี้ทางเราได้ดำเนินการบริการดูแลรักษารถของท่านเรียบร้อยแล้ว กรุณาเข้ามาติดต่อพนักงานเพื่อรับรถ</div>";
	$body .="<div>ข้อมูลบริการ : {$order_detail}</div>";
	$body .="<div>รวมราคาค่าบริการ   {$price} บาท</div>";
	$body .="<br /><br /> <p>&nbsp;&nbsp;ขอขอบคุณที่คุณเลือกใช้บริการกับเรา</p> ";
	$body .="<div>ระบบสารสนเทศการจัดการบริการดูแลรักษารถ</div>";
	
	mail($email, "แจ้งลูกค้ารับรถ", $body, $header);
	
	$arrCol = array();
	$arrCol["status"] = "ส่ง E-mail แจ้งลูกค้ามารับรถเรียบร้อย";			
	array_push($resultArray,$arrCol);
}
else{
	$arrCol = array();
	$arrCol["status"] = "ยกเลิกการใช้บริการเรียบร้อย";			
	array_push($resultArray,$arrCol);
}

echo json_encode($resultArray);
?>
