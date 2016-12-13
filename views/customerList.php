<?php
include "./model/customer.php";
$obj = new Customer();
$rows = $obj->read();
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลลูกค้า</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<!-- <a href="index.php?viewName=add_customer"  class="btn  btn-sm btn-primary pull-right">เพิ่มลูกค้า</a> -->
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">         
            <thead>
                <tr class="success" >
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ชื่อลูกค้า</th>
                    <th class="text-center">เบอร์โทร</th>
                    <th class="text-center">E-mail</th>
					<th class="text-center">ข้อมูลรถ</th>		
				<?php if($_SESSION["userType"] == "Admin") { ?>							
                    <th class="text-center">ดำเนินการ</th>
				<?php } ?>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($rows != false) {
                    $count = 1;
                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $count++ ?></td>
                            <td class="text-center"><?= $row["name"] ?></td>
                            <!-- <td><?//= number_format($row["price"], 2) ?></td> -->
							<td class="text-center"><?= $row["mobile"] ?></td>
							<td class="text-center"><?= $row["email"] ?></td>
							<td class="text-center">
								<a href="index.php?viewName=carDetail&id=<?= $row["id"] ?>">
											ดูข้อมูลรถ
								</a>
							</td>	
						<?php if($_SESSION["userType"] == "Admin") { ?>							
                            <td class="text-center">							 
									<a href="index.php?viewName=editCustomer&id=<?= $row["id"] ?>" class="btn btn-sm btn-success">
											แก้ไข
									</a>
									<a onclick="return confirm('ยืนยันการลบลูกค้า')" href="deleteCustomer.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger">
											ลบ									</a>
							
                            </td>
					    <?php } ?>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>