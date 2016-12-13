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
$rows = $obj->readAccount(" DATE_FORMAT(order_date,'%Y-%m-%d') >= '".$dateF."' AND DATE_FORMAT(order_date,'%Y-%m-%d') <= '".$dateT."' AND tb_order.status <> -1 ");
//echo "DATE_FORMAT(order_date,'%d/%m/%Y') >= '".$dateF."' AND DATE_FORMAT(order_date,'%d/%m/%Y') <= '".$dateT."' ";
//var_dump($rows);
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
    <h3><label class="label label-warning">ข้อมูลรายรับ</label></h3>
   <form action="index.php?viewName=accountList" method="post" class="form form-horizontal">
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
                    <th class="text-center" style="width:5%">ลำดับ</th>
                    <th class="text-center" style="width:20%">วันที่-เวลา</th>
					<th class="text-center" style="width:60%">รายการ</th>
                    <th class="text-center" style="width:10%">รายรับ</th>
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
                            <td class="text-center"><?= $row["order_date"] ?></td>
							<td class="text-left"><?= $row["order_detail"] ?></td>
                            <td class="text-right"><?= number_format($row["price"]) ?></td>
                        </tr>                       
                        <?php 
						$total += $row["price"];
                    }
                }
                ?>
            </tbody>
        </table>
        <br /><br />
        <div class="col-md-12 pull-right">
        	<h4><label class="label label-success pull-right">รวมทั้งสื้น <?php echo number_format($total); ?> บาท</label></h4>
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