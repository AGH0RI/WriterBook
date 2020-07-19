<?php include 'php/connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>WriterBook-Login or Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-social/bootstrap-social.css">
	<!-- <link rel="icon" href="assets/imgs/logow.png"> -->

</head>
<body>
	<header class="header">
		<div class="header-content container">
			<form action="php/insert.php" method="POST">
			<div class="row">
				<div class="col-7  align-self-center">
					<h1><i><strong>WriterBook</strong></i></h1>
				</div>
				<div class="col-5">
					<div class="row">
						<div class="col-4">
							Email or Phone
							<input class="" type="text" name="log" placeholder="Email or Phone Number">
						</div>
						<div class="col-4">
							Password
							<input class="" type="password" name="password" placeholder="Password">
						</div>
						<div class="col-2">
							<br>
							<input class="btn-primary"type="submit" name="login" value="Login">
						</div>		
					</div>
					<div class="row">
						<div class="offset-4 col-4 float-right">
							<a class="size" href="#">Forgot Password</a>
						</div>		
					</div>
				</div>
			</div>
		</form>
		</div>
	</header>
	<!-- Header End -->
	<!-- Body Starts -->
<div class="jumbo">
	<div class="container">
		<div class="row">
			<div class="col-7">
				<?php if (isset($_SESSION['temp_user'])) {
					?>
					<form action="login.php" method="post">
						<
						<button type="submit" name="temp"><img width=240px src="<?php echo $_SESSION['temp_user'][4]; ?>"></button><br>
						<h3 class="col-12 align-self-center"><?php echo $_SESSION['temp_user'][0]." ".$_SESSION['temp_user'][1]; ?></h3><br>
						<a href="logout.php?remove=yes" class="btn btn-primary">Remove</a>
					</form>
					
				<?php
				}
				else
				{
				?>
					<!-- <img class="image" width=240px src="assets/imgs/logo.png"> -->	
				<?php
				} 
				?>
				
			</div>
			
	<!-- Registeration Form -->
			<div class="col-5">
				<div class="">
					<?php if (isset($_GET['msg']))	echo "<span class='msg1'>".$_GET['msg']."</span> <span class='msg2'>".$_GET['msg2']."</span>";else echo "<h1>Create New Account</h1> <h6><i>It's Quick And Easy</i></h6>"; ?>
				</div>

				<form class="form" action="php/insert.php" method="POST">
					<div class="row">
						<div class="col-6">
							<input class="form-control" type="text" name="fname" placeholder="First Name" required>
						</div>
						<div class="col-6">
							<input class="form-control" type="text" name="lname" placeholder="Last Name">
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<input class="form-control" type="number" name="mob" placeholder="Mobile Number" required>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<input class="form-control" type="email" name="email" placeholder="Email" required>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<input class="form-control" type="password" name="password" placeholder="New Password" required>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<h5>Date Of Birth</h5>
							<input class="form-control" type="date" name="dob" placeholder="Date Of Birth" required>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<h5>Gender</h5>
							<input class="" type="radio" name="gender" placeholder="Male" value="male" required> Male
							<input class="" type="radio" name="gender" placeholder="Female" value="female" required> Female
						</div>
					</div>

					<div class="row float-right">
						<div class="col-12 ">
							<input class="btn btn-success" type="submit" name="register" value="Register!!">
							<input class="btn btn-danger" type="reset" name="reset" value="Clear Data">
						</div>
					</div>
				</form>
			</div>
			<!-- Registeration Form Ends -->
		</div>
	</div>
</div>
<!-- Body Ends -->
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
                    <a class="btn btn-social-icon btn-linkedin" href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                    <a class="btn btn-social-icon btn-twitter" href="#"><i class="fa fa-twitter fa-lg"></i></a> 
                    <a class="btn btn-social-icon btn-google" href="#"> <i class="fa fa-youtube fa-lg"></i><!-- </a> -->
                    <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o fa-lg"></i></a><br>
                    <span class=""><?php include 'view.php'; ?></span> 
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