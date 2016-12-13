<?php
include "./model/employee.php";
$obj = new Employee();
$obj->sql = "select * from tb_employee";
$rows = $obj->read("e.user_ref = {$_REQUEST["user_ref"]}");
if ($rows != false) {
    $row = $rows[0];
    $users = $obj->get_user(" id={$row["user_ref"]}");
	$user = $users[0];
}
?>
<div class="container">
    <form action="doUpdateEmployee.php" method="post" class="form form-horizontal">
        <input type="hidden" name="user_ref" value="<?=$_REQUEST["user_ref"]?>" />
        <fieldset>
            <legend>
                ข้อมูลสำหรับเข้าระบบ
            </legend>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= $user["username"] ?>" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?= $user["password"] ?>" class="form-control" required="" />
            </div>
        </fieldset>

        <fieldset>
            <legend>
                ข้อมูลพนักงาน
            </legend>
            <div class="form-group">
                <label>ชื่อ-สกุล</label>
                <input type="text" name="fullname" value="<?= $row["fullname"] ?>" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label>เบอร์โทรศัพท์</label>
                <input type="text" name="mobile" value="<?= $row["mobile"] ?>" class="form-control" />
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="email" value="<?= $row["email"] ?>" class="form-control" />
            </div>
            <div class="form-group">
                <label>ที่อยู่</label>
                <input type="text" name="address" value="<?= $row["address"] ?>" class="form-control" />
            </div>
            <div class="form-group">
                <label>เพศ</label>
                <input type="radio" name="gender" value="ชาย" checked="" <?php echo ($row["gender"] == "ชาย") ? "checked" : "" ?> > ชาย
                &nbsp; &nbsp; &nbsp;
                <input type="radio" name="gender" value="หญิง" <?php echo ($row["gender"] == "หญิง") ? "checked" : "" ?> > หญิง
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    บันทึกข้อมูล
                </button>
            </div>
        </fieldset>
    </form>
</div>