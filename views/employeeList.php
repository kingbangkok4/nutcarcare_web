<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/employee.php";
$obj = new Employee();
//$obj->sql = "select * from tb_employee";
$rows = $obj->read();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลพนักงาน</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
		<?php if($_SESSION["userType"] == "Admin") { ?>
			<a href="index.php?viewName=add_user" class="btn  btn-sm btn-primary pull-right">เพิ่มพนักงาน</a>
		<?php } ?>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ชื่อพนักงาน</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">เบอร์โทร</th>
                    <th class="text-center">ที่อยู่</th>
                    <th class="text-center">เพศ</th>
					<th class="text-center">ประเภท</th>
				<?php if($_SESSION["userType"] == "Admin") { ?>
                    <th class="text-center">ดำเนินการ</th>
				<?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($rows != false) {
                    $count = 1;
                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $count++; ?></td>
                            <td class="text-center"><?= $row["fullname"] ?></td>
                            <td class="text-center"><?= $row["email"] ?></td>
                            <td class="text-center"><?= $row["mobile"] ?></td>
                            <td class="text-center"><?= $row["address"] ?></td>
                            <td class="text-center"><?= $row["gender"] ?></td>
							<td class="text-center"><?= $row["type"] ?></td>
							<?php if($_SESSION["userType"] == "Admin") { ?>
                            <td class="text-center">							
                                <a href="index.php?viewName=editEmployee&user_ref=<?= $row["user_ref"] ?>" class="btn btn-sm btn-success">
							แก้ไข
                                </a>
								<?php if($row["type"] == "Staff") {?>
                                <a onclick="return confirm('ยืนยันการลบพนักงาน')" href="deleteEmployee.php?user_ref=<?= $row["user_ref"] ?>" class="btn btn-sm btn-danger">
                                                                                            ลบ
                                </a>
								<?php } ?>
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