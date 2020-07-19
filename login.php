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
				<?php if(isset($_GET['msg'])) echo "<span class=' msg'>".$_GET['msg']."</span>"; else echo "<span class='login'> Login In To WriterBook </span>"; ?>	
			</div>
			<form action="php/insert.php" method="Post">
				<div class="row">
					<input  class='offset-3 form-control col-6' type="text" name="log" placeholder="Email or Phone Number">
				</div>
				<div class="row">
					<input class="offset-3 form-control col-6" type="password" name="password" placeholder="Password">
				</div>
				<div class="row">
					<input class="btn-primary offset-3 form-control col-6"type="submit" name="login" value="Login">
				</div>
				<div class="row">
					<div class="offset-3 col-6">
						<a class="size" href="#">Forgot Password </a>
						<a class="size float-right" href="index.php"> Signup For Enjoy</a>
					</div>
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
</html>