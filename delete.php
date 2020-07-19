<?php 
include 'php/connection.php';
if (isset($_GET['del'])) {
	$date=$_GET['del'];
	mysqli_query($con,"Delete from user_posts where date='$date'");
	header("location:dashboard.php");
}
 ?>