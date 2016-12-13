<?php
if(@move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../upload/".$_FILES["filUpload"]["name"]))
{
	$arr["StatusID"] = "1";
	$arr["Error"] = "";
}
else
{
	$arr["StatusID"] = "0";
	$arr["Error"] = "Error cannot upload file.";
}

echo json_encode($arr);
?>