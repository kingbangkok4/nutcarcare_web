<?php
include "./model/car.php";
$obj = new Car();
$rows = $obj->read(" cust_id = {$_REQUEST["id"]} ");
if ($rows != false) {
    $row = $rows[0];
}
?>

<div class="container">	
	<h3><label class="label label-warning">ข้อมูลรถลูกค้า</label></h3>
	 <br /><br>
        <input type="hidden" name="id" value="<?=$_REQUEST["id"]?>" />
	<div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
				<label>เลขทะเบียนรถ</label>
				<input type="text" name="license_plate" value="<?= $row["license_plate"] ?>" class="form-control" readonly="readonly" />
		</div>
        <div class="col-md-4 col-sm-6 col-xs-12">
				<label>ยี่ห้อ</label>
				<input type="text" id="brand" name="brand" value="<?= $row["brand"] ?>" class="form-control" readonly="readonly" />
		</div>
		 <div class="col-md-4 col-sm-6 col-xs-12">
				<label>ประเภท</label>
				<input type="text" name="type" value="<?= $row["type"] ?>" class="form-control" readonly="readonly" />
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
				<label>สี</label>
				<input type="text" name="color" value="<?= $row["color"] ?>" class="form-control" readonly="readonly" />
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
				<label>ตำหนิ</label>
				<input type="text" name="scar" value="<?= $row["scar"] ?>" class="form-control" readonly="readonly" />
		</div>	
		
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<br /><br />
		</div>
		
		<div class="col-md-6 col-sm-6 col-xs-12">				
				<?php if($row["front_image"] != "") { ?>
					<label>ภาพถ่ายด้านหน้ารถ</label>
					<img src="upload/<?= $row["front_image"] ?>" alt="" style="width:100%;height:400px;">
				<?php } ?>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
				<?php if($row["left_image"] != "") { ?>
					<label>ภาพถ่ายด้านซ้ายรถ</label>
					<img src="upload/<?= $row["left_image"] ?>" alt="" style="width:100%;height:400px;">
				<?php } ?>
		</div>	
		<div class="col-md-6 col-sm-6 col-xs-12">
				<?php if($row["right_image"] != "") { ?>
					<label>ภาพถ่ายด้านขวารถ</label>
					<img src="upload/<?= $row["right_image"] ?>" alt="" style="width:100%;height:400px;">
				<?php } ?>
		</div>	
		<div class="col-md-6 col-sm-6 col-xs-12">
				<?php if($row["behide_image"] != "") { ?>
					<label>ภาพถ่ายด้านหลังรถ</label>
					<img src="upload/<?= $row["behide_image"] ?>" alt="" style="width:100%;height:400px;">
				<?php } ?>
		</div>	
		<div class="col-md-6 col-sm-6 col-xs-12">
				<?php if($row["top_image"] != "") { ?>
					<label>ภาพถ่ายด้านบนรถ</label>
					<img src="upload/<?= $row["top_image"] ?>" alt="" style="width:100%;height:400px;">
				<?php } ?>
		</div>		
	</div>
</div>