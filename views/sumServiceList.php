<?php
include "./model/order.php";
$obj = new Order();
$month = date("m",strtotime(date("Y-m-d")));
$rows = $obj->read_sum_service(" MONTH(service_date) = '{$month}' ");
//echo $month;
?>
<div class="container>
<div class="rows">
	<div class="col-md-2"></div>
	
	<div class="col-md-8">
		<h3><label class="label label-warning">สรุปการเข้าใช้บริการ</label></h3>
		<br /><br />
		<div class="table-responsive">
			<table class="table table-bordered table-hover" style="font-size:12px;">
				<thead>
					<tr class="success" >
						<th  class="text-center">ลำดับ</th>
						<th  class="text-center">รายการที่เข้าใช้บริการและโปรโมชั่น</th>
						<th  class="text-center">จำนวนครั้ง</th>
					</tr>
				</thead>
				<tbody>
	<?php
			if ($rows != false) {
				$count = 1;
				foreach ($rows as $row) {
	?>			
				<tr>
					<td  class="text-center"><?= $count++ ?></td>
					<td  class="text-left"><?= $row["name"] ?></td>
				<td  class="text-center" <?php if(number_format($row["qty"]) >= 50){ echo "style='color:red;'";}?>><?= number_format($row["qty"]) ?></td>
				</tr>
	<?php
				}
			}
	?>
				</tbody>
			</table>
		</div>
		
		<div class="rows">		
			<div class="col-md-12 pull-right"><label class="text-right  pull-right" style="color:red;font-size:12px">***สรุปการเข้าใช้บริการของเดือนนี้</label></div>
		</div>
		
	</div>
	
	<div class="col-md-2"></div>		
	</div>
    </div>	
	
</div>

<script>
    $(function () {
        $(".color-box").each(function (index) {
            //console.log($(this).attr("data-code"));
            var codeHex = $(this).attr("data-code");
            $(this).css({backgroundColor: "#" + codeHex});
        });
    });
</script>