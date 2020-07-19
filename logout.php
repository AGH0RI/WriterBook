<?php 
include 'php/connection.php';

$email=$_SESSION['temp_user'][3];
$phone=$_SESSION['temp_user'][2];

if (isset($_GET['logout'])) {
	mysqli_query($con,"update user_log set status=0 where email='$email' || phone='$phone'");
	unset($_SESSION['user']);
	header("location:index.php");
}
elseif (isset($_GET['remove'])) {
	session_destroy();
	mysqli_query($con,"update user_log set status=0 where email='$email' || phone='$phone'");
	header("location:index.php");
}

 ?>