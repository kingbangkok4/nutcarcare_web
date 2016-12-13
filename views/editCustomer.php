<?php
include "./model/customer.php";
$obj = new Customer();
$rows = $obj->read("id = {$_REQUEST["id"]}");
if ($rows != false) {
    $row = $rows[0];
}
?>
<script type="text/javascript">
function formatPhone(obj) {
    var numbers = obj.value.replace(/\D/g, ''),
	 char = {};
    //char = {0:'(',3:') ',6:' - '};
    obj.value = '';
    for (var i = 0; i < numbers.length; i++) {
        obj.value += (char[i]||'') + numbers[i];
    }
}
function CheckMobileNumber() {
   var data = $("#mobile").val();
   var msg = 'โปรดกรอกหมายเลขโทรศัพท์ 10 หลัก ไม่ต้องใส่เครื่องหมายขีด (-) วงเล็บหรือเว้นวรรค';
   s = new String(data);
   if ( s.length != 10)
   {
      alert(msg);
      return false;
   }else{
	return true;
   }
}
</script>
<div class="container">	
	<h3><label class="label label-warning">แก้ไขข้อมูลลูกค้า</label></h3>
	 <br /><br>
    <form action="doUpdateCustomer.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return CheckMobileNumber()">
        <input type="hidden" name="id" value="<?=$_REQUEST["id"]?>" />
	<div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
				<label>ชื่อลูกค้า</label>
				<input type="text" name="name" value="<?= $row["name"] ?>" class="form-control" required="" >
		</div>
        <div class="col-md-4 col-sm-6 col-xs-12">
				<label>เบอร์โทร</label>
				<input type="text" id="mobile" name="mobile" value="<?= $row["mobile"] ?>" class="form-control" onblur="formatPhone(this);" maxlength="10" required="" >
		</div>
		 <div class="col-md-4 col-sm-6 col-xs-12">
				<label>E-mail</label>
				<input type="email" name="email" value="<?= $row["email"] ?>" class="form-control" required="" >
		</div>		
	</div>
	
	<div class="row">
		<br />
		<div class="col-md-12 col-sm-12 col-xs-12">
			<button type="submit" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
        </div>
	</div>
    </form>
</div>