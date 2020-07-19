<!DOCTYPE html>
<html>
<head>
	<title>Login To WriterBook | WriterBook</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-social/bootstrap-social.css">
	<link rel="icon" href="assets/imgs/logow.png">
</head>
<?php
include_once 'php/connection.php';

if (isset($_GET['generate'])) 
{
	$otp=rand(1234,9876);
	$email=$_SESSION['temp_user'][3];
	mysqli_query($con,"update user_info set otp = '$otp' where email='$email'");
	if ($qrey) {
		$to=$email;
	$subject="Email Verification";
	$message="Your Verification Code is : ".$otp;
	$headers="From: oyeaghori@gmail.com\r\n";
	ini_set('SMTP', "SMTP.gmail.com");
	ini_set('smtp_port', "25");
	ini_set('sendmail_from', "email@domain.com");
	if(mail($to, $subject, $message,$headers))
		header("location:otp.php?verify");
	}
	$to=$email;
	$subject="Email Verification";
	$message="Your Verification Code is : ".$otp;
	$headers="From: oyeaghori@gmail.com\r\n";
	//$headers .="MIME-Version: 1.0"."\r\n";
	//$headers .="Content-type:text/html;charset=UTF-8"."\r\n";
	ini_set('SMTP', "SMTP.gmail.com");
	ini_set('smtp_port', "25");
	ini_set('sendmail_from', "email@domain.com");
	if(mail($to, $subject, $message,$headers))
		header("location:otp.php?verify");
 } 
if (isset($_GET['verify']) || (isset($_GET['verify']) && isset($_GET['msg']))) {
	
 ?>

 <body>
	<header class="header">
		<div class="header-content container">
			<div class="row">
				<div class="col-7  align-self-center">
					<h1><i><strong>WriterBook</strong></i></h1>
				</div>
			</div>
		</div>
	</header>
	<!-- Header End -->
	<div class="jumbo bglogo">
		<div class="center-area">
			<div class="row ">
				<?php if(isset($_GET['msg'])) echo "<span class=' msg'>".$_GET['msg']."</span>"; else echo "<span class='login'> Enter OTP </span>"; ?>	
			</div>
			<form action="otp.php" method="Post">
				<div class="row">
					<input  class='offset-3 form-control col-6' type="number" name="otp">
				</div>
				<div class="row pb-5">
					<input class="btn-primary offset-3 form-control col-6"type="submit" name="otpbtn" value="Verify">
					<a class="offset-8 col-6" href="otp.php?generate">Resend</a>
				</div>
			</form>
		</div>
	</div>
<!-- Footer Starts -->
<footer class="bg-dark text-light">
	<div class="container">
		<div class="row py-4">
			<div class="col-3 ">
				<h4>About The Page</h4>
				<p class="">WriterBook, The Writers Page where every writer can post the content .</p>
			</div>

			<div class="col-3 offset-2">
				<h4 class="">Useful Links</h4>
				<ul class="list-unstyled">
					<li class=""><a href="#">Home</a></li>
					<li class=""><a href="#">About</a></li>
					<li class=""><a href="#">Our Team</a></li>
					<li class=""><a href="#">Developer</a></li>
				</ul>
			</div>
			<div class="offset-1 col-3 align-self-center">
                <div class="text-center">
                     <a class="btn btn-social-icon btn-facebook" href="#"><i class="fa fa-facebook fa-lg"></i></a> 
                    <a class="btn btn-social-icon btn-linkedin" href="#"> --><i class="fa fa-linkedin fa-lg"></i></a>
                    <a class="btn btn-social-icon btn-twitter" href="#"><i class="fa fa-twitter fa-lg"></i></a> 
                    <a class="btn btn-social-icon btn-google" href="#"> <i class="fa fa-youtube fa-lg"></i><!-- </a> -->
                    <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o fa-lg"></i></a>
            	</div>
			</div>
		<div class="row">
			 Gaurav Kumar Mishra © 2020
		</div>
	</div>
</footer>



<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/popper.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>

 <?php 
}
if (isset($_POST['otpbtn'])) {
	$otp_entered=$_POST['otp'];
	$qry=mysqli_query($con,"select * from user_info where otp = '$otp_entered'");
	if (mysqli_num_rows($qry)!=0) {
		mysqli_query($con,"update user_info set status=1 where otp = '$otp_entered'");
		$_SESSION['user']['status']=1;
		header("location:upload_dp.php");
	}
	else
		header("location:otp.php?verify=true && msg=OTP ENTERED DOESNOT MATCHED");
}
  ?>