<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" enctype="multipart/form-data"><input type="file" name="file">
		<input type="submit" name="submit" value="submit">
	</form>

</body>
</html>

<?php 
	$today = date("d-m-Y H:i:s");  
	echo $today; 
?>