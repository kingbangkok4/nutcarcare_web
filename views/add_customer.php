<?php
	header('Content-Type: text/html; charset=utf-8');
	include "./model/type_car.php";
	$obj_type = new Type();
	$rows_type = $obj_type->read();
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
	<h3><label class="label label-warning">เพิ่มลูกค้า</label></h3>
	 <br /><br>
    <form action="doAddCustomer.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return CheckMobileNumber()">
		   <div class="col-md-4 col-sm-6 col-xs-12">
					<label>ชื่อลูกค้า</label>
					<input type="text" name="name" value="" class="form-control" required="" >
			</div>
			 <div class="col-md-4 col-sm-6 col-xs-12">
					<label>เบอร์โทร</label>
					<input type="text" id="mobile" name="mobile"  value="" class="form-control" onblur="formatPhone(this);" maxlength="10" required="" >
			</div>
			 <div class="col-md-4 col-sm-12 col-xs-12">
					<label>E-mail</label>
					<input type="email" name="email" value="" class="form-control" required="" >
			</div>
	
			<div class="col-md-12 col-sm-12 col-xs-12">
			<br />
				<button type="submit" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
			<div class="col-md-12 col-sm-12 col-xs-12">		
	</div>		
    </form>
</div>