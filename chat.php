<?php 

include_once 'php/connection.php';
$c=0;
$qry=mysqli_query($con,"Select * from user_log where status=1");
while ($dat=mysqli_fetch_assoc($qry)) {
	$c++;
}
	echo "No Of User Online : ".$c;
 ?>