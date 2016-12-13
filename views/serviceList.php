<?php
include "./model/order.php";
$dateF  = "";
$dateT = "";
$total = 0.00;
if ($_REQUEST["dateFrom"] != "" && $_REQUEST["dateTo"] != ""){
	$dateF = $_REQUEST["dateFrom"];
	$dateT =  $_REQUEST["dateTo"];
}
$obj = new Order();
$rows = $obj->read("  DATE_FORMAT(tb_order.order_date,'%Y-%m-%d') >= '".$dateF."' AND DATE_FORMAT(tb_order.order_date,'%Y-%m-%d') <= '".$dateT."' AND tb_order.status <> -1 ");
//echo $rows;
?>
<style>
    .color-box{
        display: inline-block;
        height: 25px;
        width: 90px;
    }
</style>
<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {		
		$('#dateFrom').datepicker({
			format: "yyyy-mm-dd"
		});  
		$('#dateTo').datepicker({
			format: "yyyy-mm-dd"
		});  
	});
</script>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลการเข้าใช้บริการ</label></h3>
   <form action="index.php?viewName=serviceList" method="post" class="form form-horizontal">
   <!--  <a href="index.php?viewName=add_tone" class="btn btn-primary">เพิ่มโทนสีผ้าม่าน</a> -->
    <br /><br /><br /><br /> 
    <div class="table-responsive">
		<div class="col-md-5">
            <div class="hero-unit">
                <input style="text-align:center;"  type="text" placeholder="วันที่เริ่มต้น"  id="dateFrom"  name="dateFrom"class="form-control" readonly="readonly"  value="<?= $dateF ?>" required="">
            </div>
        </div>
        <div class="col-md-2">
        <label style="text-align:center;">  ถึง    </label>
        </div>
        <div class="col-md-5">
            <div class="hero-unit">
                <input  style="text-align:center;" type="text" placeholder="วันที่สิ้นสุด"  id="dateTo" name="dateTo" class="form-control" readonly="readonly" value="<?= $dateT ?>" required="">
            </div>
        </div>
        <br /><br /><br /><br />
        <div class="col-md-12 col-sm-12 col-xs-12">
			 <div class="form-group pull-right">
				 <button type="submit" class="btn btn-primary pull-right" style="width:150px;">ค้นหา</button>
			</div>
        </div>
        <br />
		
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success" >
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ชื่อลูกค้า</th>
                    <th class="text-center">เบอร์โทร</th>
					<th class="text-center">ใช้บริการ</th>
					<th class="text-center">ลายเซนต์ลูกค้า</th>
					<th class="text-center">วันที-เวลา</th>
                </tr>
            </thead>
            <tbody>
<?php
		if ($rows != false) {
			$count = 1;
				foreach ($rows as $row) {
					?>
			<tr>
                <td class="text-center"style="width: 5%;"><?= $count++ ?></td>
				<td class="text-center" style="width: 20%;"><?= $row["name"] ?></td>
				<td class="text-center"style="width: 10%;"><?= $row["mobile"] ?></td>
				<td class="text-left"style="width: 40%;"><?= $row["order_detail"] ?></td> 
				<td class="text-center"style="width: 10%;">
					<?php if($row["signature_cust_image"] != "") { ?>
						<a href="upload/<?= $row["signature_cust_image"] ?>" target="_blank" >ดู</a>
					<?php } else { ?>
						ไม่มี
					<?php } ?>
				</td> 
				<td class="text-center"style="width: 15%;"><?= $row["order_date"] ?></td>		
			</tr>				
<?php
			}
		}
		?>
            </tbody>
        </table>
        <br /><br />
        <div class="col-md-12 pull-right">
        	<h4><label class="label label-success pull-right">รวมจำนวนการใช้บริการทั้งหมด  <?php if($count != 0){
				echo number_format($count-1);
			}else{
				echo "0";
			} ?>  ครั้ง</label></h4>
        </div>
    </div>
</div>
</form>
<script>
    $(function () {
        $(".color-box").each(function (index) {
            //console.log($(this).attr("data-code"));
            var codeHex = $(this).attr("data-code");
            $(this).css({backgroundColor: "#" + codeHex});
        });
    });
</script>