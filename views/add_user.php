<div class="container">
    <form action="doAddEmployee.php" method="post" class="form form-horizontal">
        <fieldset>
            <legend>
                ข้อมูลสำหรับเข้าระบบ
            </legend>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="" class="form-control" required="" />
            </div>
        </fieldset>

        <fieldset>
            <legend>
                ข้อมูลพนักงาน
            </legend>
            <div class="form-group">
                <label>ชื่อ-สกุล</label>
                <input type="text" name="fullname" value="" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label>เบอร์โทรศัพท์</label>
                <input type="text" name="mobile" value="" class="form-control" />
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="email" value="" class="form-control" />
            </div>
            <div class="form-group">
                <label>ที่อยู่</label>
                <input type="text" name="address" value="" class="form-control" />
            </div>
            <div class="form-group">
                <label>เพศ</label>
                <input type="radio" name="gender" value="ชาย" checked=""> ชาย
                &nbsp; &nbsp; &nbsp;
                <input type="radio" name="gender" value="หญิง" > หญิง
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    บันทึกข้อมูล
                </button>
            </div>
        </fieldset>
    </form>
</div>