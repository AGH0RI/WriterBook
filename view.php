<?php 
include_once 'php/connection.php';

$qry=mysqli_query($con,"select * from user_log");
$count=mysqli_num_rows($qry);
echo "Views Till Now : ".$count;

 ?>