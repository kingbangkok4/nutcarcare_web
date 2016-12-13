<?php
include "./model/order.php";
$obj = new Order();
$rows = $obj->read_top10(" tb_order.status <> -1 ");
?>

<div class="container">
    <h3><label class="label label-warning">Top 10</label></h3>
    <br /><br />
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success" >
                    <th  class="text-center">อันดับ</th>
                    <th  class="text-center">ชื่อลูกค้า</th>
                    <th  class="text-center">เบอร์โทร</th>
					<th  class="text-center">E-mail</th>
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
				<td  class="text-center"><?= $row["name"] ?></td>
				<td  class="text-center"><?= $row["mobile"] ?></td>
				<td  class="text-center"><?= $row["email"] ?></td>
				<td  class="text-center"><?= number_format($row["sum_order"]) ?></td>
			</tr>
<?php
			}
		}
?>
            </tbody>
        </table>
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