<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
?>

<html>

    <head>
        <meta charset="UTF-8">
        <title>ระบบสารสนเทศการจัดการบริการดูแลรักษารถ </title>
		<link href="css/site.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
        <!--<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>-->
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
              
    </head>
    <body>
        
        <div class="modal fade" tabindex="-1" role="dialog"  id="myModal" name="myModal">
          <div class="modal-dialog">
          <form class="form-horizontal" role="form" method="post" action="login.php">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">แจ้งเตือน</h4>
              </div>
              <div class="modal-body">
                <p style="text-align:center">ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง !</p>
              </div>
              <div class="modal-footer">
                 <input type="submit" value="OK" id="submit" name="submit" class="btn btn-primary">
              </div>
            </div><!-- /.modal-content -->
            </form>
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

		<script type="text/javascript">
            function msgShow(){
                //alert("hello world");
				$('#myModal').modal('toggle');
				$('#myModal').modal('show');
				//$('#myModal').modal('hide');
            }

           <?php
		   		if ($username == "admin" && $password == "admin") {
					$_SESSION["logedIn"] = true;
					$_SESSION["isAdmin"] = true;
					$_SESSION["id"] = "0";
					$_SESSION["username"] = "Admin";
					$_SESSION["password"] = "1234";
					$_SESSION["userType"] = "Admin";
					redirect("index.php?viewName=employeeList");
				} else {
					// go to check in database
					$sql = "select * from tb_user where username = '$username' and password = '$password' ";
					$query = mysql_query($sql);
					$count = mysql_num_rows($query);
					//var_dump($count);
					if ($count > 0) {
						$_SESSION["logedIn"] = true;
						$_SESSION["isAdmin"] = true;
						while ($row = mysql_fetch_assoc($query)) {
						    if($row['type'] == "Admin" || $row['type'] == "Owner"){
								$_SESSION["id"] = $row['id'];
								$_SESSION["username"] = $row['username'];
								$_SESSION["password"] = $row['password'];
								$_SESSION["userType"] = $row['type'];
							}else{
								echo "msgShow();";
							}
						}
						if($_SESSION["userType"] == "Admin"){
							redirect("index.php?viewName=employeeList");
						}else{
							redirect("index.php?viewName=orderList");
						}
					} else {
						echo "msgShow();";
						 //redirect("login.php");
					}       
				 }             			    
           ?>
 	</script>
    
    </body>
</html>
