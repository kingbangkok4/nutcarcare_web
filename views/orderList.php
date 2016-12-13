<?php
header('Refresh: 5; URL=index.php?viewName=orderList');
include "./model/order.php";
$obj = new Order();
$dateNow = date("d",strtotime(date("Y-m-d")));
$rows = $obj->read(" (tb_order.print = 0 AND tb_order.status <> -1) OR (tb_order.status = -1 AND DAYOFMONTH(tb_order.order_date) = {$dateNow}) ");
//var_dump($rows);
?>
<div class="container">
<h3><label class="label label-warning">ออเดอร์วันนี้้</label></h3>
<br /><br /><br /><br />
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ชื่อลูกค้า</th>
                    <th class="text-center">เบอร์ติดต่อ</th>
                    <th class="text-center">ทะเบียนรถ</th>
                    <th class="text-center">ใช้บริการ</th>
                    <th class="text-center">ราคารวม</th>
                    <th class="text-center">วันที่-เวลา</th>
                    <!-- <th class="text-center">ดำเนินการ</th> -->
					<th class="text-center">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($rows != false) {
                    $count = 1;
                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <td class="text-center" style="width: 5%;"><?= $count++ ?></td>
                            <td class="text-center" style="width: 15%;"><?= $row["name"] ?></td>
                            <td class="text-center" style="width: 10%;"><?= $row["mobile"] ?></td>
                            <td class="text-center" style="width: 10%;"><?= $row["license_plate"] ?></td>
                            <td class="text-left"   style="width: 25%;"><?= $row["order_detail"] ?></td>                            
                            <td class="text-right"  style="width: 8%;"><?= number_format($row["price"]) ?></td>
                            <td class="text-center" style="width: 10%;"><?= $row["order_date"] ?></td>						 
                           <!-- <td class="text-center" style="width: 10%;">                          
                            </td> -->
							<td class="text-center" style="width: 17%;">						
							<!--<form action="doUpdateStatus.php" method="post" class="form-horizontal  class="text-center">				    
							<select id="status" name="status" class="form-control" style="font-size:12px;">
							 <option <?php //if ($row["status"] == 0 ) echo 'selected' ; ?> value="0">นำรถเข้าบริการ</option> 
                              <option <?php //if ($row["status"] == 1 ) echo 'selected' ; ?> value="1">ดำเนินการอยู่</option>
							  <option <?php //if ($row["status"] == 2 ) echo 'selected' ; ?> value="2">ดำเนินการเสร็จ</option>
                              <option <?php //if ($row["status"] == 3 ) echo 'selected' ; ?> value="3">ลูกค้ารับรถแล้ว</option>
							  <option <?php //if ($row["status"] == -1 ) echo 'selected' ; ?> value="-1">ยกเลิก</option>
                            </select> -->
							 <input type="text" id="status" name="status" class="text-center" 
							 <?php if ($row["status"] == 1 ){ echo "value=ดำเนินการอยู่"; }
								   else if ($row["status"] == 2 ) { echo "value=ดำเนินการเสร็จ"; } 
								   else if ($row["status"] == 3 ) { echo "value=ลูกค้ารับรถแล้ว"; } 
								   else if ($row["status"] == -1 ) { echo "value=ยกเลิก style='color:red;' "; }
								   else { echo 'value=อื่นๆ'; } ?> readonly> 
							 <?php if($row["status"] == 3) {?>
                                <br /><br /><a href="printOrder.php?id=<?= $row["id"] ?>" target="_blank" class="btn btn-sm btn-primary" style="font-size:12px;" >
											พิมพ์ใบเสร็จ
                                </a>
                            <?php } ?>
							 <input type="hidden" id="id" name="id" value="<?= $row["id"] ?>"> 
							 <br />
							<!-- <input class="btn btn-sm btn-primary" type="submit" style="width:100%;font-size:12px;" value="ดำเนินการ" /> -->
							
							<!-- </form> -->
							</td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>