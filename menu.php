<nav class="navbar navbar-default">
    <div class="container-fluid" style="background-color:#8DC7C7">
        <!-- Brand and toggle get grouped for better mobile display -->
		<div class="row">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ระบบสารสนเทศการจัดการบริการดูแลรักษารถ</a>
        </div>	
		</div>
        <!-- Collect the nav links, forms, and other content for toggling -->
		<div class="row">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!--<li><a href="?viewName=customerList">ลูกค้า</a></li>-->
                <?php if($_SESSION["userType"] == "Owner") { ?>
                	<li><a class="fa fa-recycle" href="?viewName=orderList"> ออเดอร์วันนี้</a></li>
                <?php } ?>
                <li>
				<?php if($_SESSION["userType"] == "Admin" || $_SESSION["userType"] == "Owner") { ?>
					<a class="fa fa-user-plus" href="?viewName=employeeList"> ข้อมูลพนักงาน <span class="sr-only">(current)</span></a></li>
				<?php } ?>
                <li>
				<?php if($_SESSION["userType"] == "Admin" || $_SESSION["userType"] == "Owner") { ?>
					<a class="fa fa-users" href="?viewName=customerList"> ข้อมูลลูกค้า</a>
				<?php } ?>	
				</li>
				<?php if($_SESSION["userType"] == "Owner") { ?>					
						  <li><a class="fa fa-car" href="?viewName=serviceList&dateFrom=<?= date("Y-m-d") ?>&dateTo=<?= date("Y-m-d") ?>"> ข้อมูลการเข้าใช้บริการ</a></li>
						  <li><a class="fa fa-spinner" href="?viewName=sumServiceList">     สรุปการเข้าใช้บริการ</a></li>
				<?php } ?>
                <li>
				<?php if($_SESSION["userType"] == "Owner") { ?>
					<a  class="fa fa fa-money" href="?viewName=accountList&dateFrom=<?= date("Y-m-d") ?>&dateTo=<?= date("Y-m-d") ?>"> ข้อมูลรายรับ</a>
				<?php } ?>
				</li>
                <li>
				<?php if($_SESSION["userType"] == "Owner") { ?>
					<a class="fa fa-line-chart" href="?viewName=top10List"> Top 10</a>
				<?php } ?>
				</li>      
				<li>
				<?php if($_SESSION["userType"] == "Owner") { ?>
					<a class="fa fa-product-hunt" href="?viewName=sent_promotion"> แจ้งโปรโมชั่นลูกค้า</a>
				<?php } ?>
				</li>                     
            </ul>
            
            <ul class="nav navbar-nav navbar-right">				
                <li><a class="fa fa-sign-out" href="logout.php"> ผู้ใช้งาน : <?php echo $_SESSION["username"]." (".$_SESSION["id"].")";?> ออกจากระบบ</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
		
    </div><!-- /.container-fluid -->
</nav>
