<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/order.php";
$obj = new Order();
$rows = $obj->read(" tb_order.id = {$_REQUEST["id"]}");
$row = $rows[0];
$obj->update_print(" id = {$_REQUEST["id"]} ");
?>
<style>
    table {
        border:solid #000 !important;
        border-width:1px 0 0 1px !important;
    }
    th, td {
        border:solid #000 !important;
        border-width:0 1px 1px 0 !important;
        padding: 15px;
    }
</style>

<h2>ใบเสร็จรับเงิน</h2>
<table>
    <tbody>
        <tr>
            <td colspan="5">วันที่ - เวลา : <?= $row["order_date"] ?></td>
            <td colspan="1">เลขที่ : <?= $row["id"] ?></td>
        </tr>
		 <tr>
            <td colspan="2">
				ชื่อ : <strong><?=$row["name"]?></strong>
            </td>
            <td colspan="2">
				ทะเบียนรถ : <strong><?=$row["license_plate"]?></strong>
            </td>
            <td colspan="1">
				ยี่ห้อ : <strong><?=$row["brand"]?></strong>
            </td>
			<td colspan="1">
				สี : <strong><?=$row["color"]?></strong>
            </td>
        </tr>
        <tr>
            <td colspan="2">
				ประเภทรถ : <strong><?=$row["type"]?></strong>
            </td>
            <td colspan="2">
                E-mail : <strong><?=$row["email"]?></strong>
            </td>
            <td colspan="2">
				เบอร์โทรติดต่อ : <strong><?=$row["mobile"]?></strong>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                ราคาทั้งหมด : <strong><?=  number_format($row["price"])?></strong> บาท
            </td>
        </tr>
        <tr>
            <td colspan="3">
                ลายเซ็นลูกค้า : ______________________________
            </td>
            <td colspan="3">
                ลายเซ็นผู้รับเงิน : _____________________________
            </td>
        </tr>
    </tbody>
</table>
<script src="./js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script>
    $(function () {
        window.print();
    });
</script>