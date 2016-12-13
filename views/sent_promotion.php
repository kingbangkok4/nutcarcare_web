

<div class="container">
	<h3><label class="label label-warning">แจ้งโปรโมชั่น</label></h3>
	<br /><br>
    <form action="doSendPromotin.php" method="post" enctype="multipart/form-data" class="form-horizontal">
		 <!-- <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
				<label>E-mail</label>
				<input type="email" id="email" name="email" value="" class="form-control" required="" >
			</div>
		</div> -->
		 <div class="col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>เรื่อง</label>
				<input type="text" id="title" name="title" value="" class="form-control" required="" >
			</div>
		</div>
		 <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
				<label>ข้อความ</label>
				<hr/>
				<textarea id="message" name="message" class="textarea form-control" placeholder="Enter text ..." style="width: 100%; height: 200px" required=""></textarea>
			</div>
		</div>	
		<div class="col-md-6 col-sm-6 col-xs-6">
			 <div class="form-group">
				 <a target="_blank" href="https://imgsafe.org/" class="pull-left">upload image</a>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			 <div class="form-group">
				 <button type="submit" class="btn btn-success pull-right">ส่ง E-mail</button>
			</div>
		</div>
    </form>
</div>

<script>
	$('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
    $(prettyPrint);
</script>