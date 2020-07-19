<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | WriterBook</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">	
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-social/bootstrap-social.css">
	<!-- <link rel="icon" href="assets/imgs/logow.png"> -->
</head>
<?php 
	include 'php/connection.php';
	if (isset($_SESSION['user'])) {
		if ($_SESSION['user']['status']==1) {
		
 ?>

<body>
<header class="header">
	<div class="header-content container-fluid">
			<div class="row">
				<div class="col-1 align-self-center">
					<i><img src="assets/imgs/logo.png" height="50px"></i>
				</div>
				<div class="offset-3 col-4 align-self-center">
					<input class="form-control" type="search" name="search" placeholder="Search Writers">
				</div>
				<div  class="col-4 align-self-center">
					<div class="rows float-right">                           <!-- Online -->
				<div class="col-12">
					<?php include 'chat.php'; ?>
				</div>
			</div>
					<a href="logout.php?logout=yes"><i class="float-right px-2 fa fa-power-off fa-lg text-light"></i></a>
					<a href=""><img src="<?php echo $_SESSION['temp_user'][4];?>" height="25px" width="40px" class="float-right px-2"></a>
					<a href=""><i class="float-right px-2 fa fa-paper-plane fa-lg text-light"></i></a>
					<a href=""><i class="float-right px-2 fa fa-home fa-lg text-light"></i></a>
				</div>
			</div>
		</div>
</header>
<div class="container-fluid">
	<div class="row">
		<div class="offset-2 col-6">
			<div class="rows">
				<div><h1>Hall Of Frame</h1></div> 
				<div class="col-12">                          <!-- HALL OF FRAME -->

					<?php include"hallofframe.php" ?>
				
				</div>			
			</div>
			<div class="row">   <!--  create a post -->
				<div class="box">
					<div class="row m-4">
						<form action="post.php" method="POST" enctype="multipart/form-data">
							<textarea class="form-control" cols="100" rows="4" placeholder="Enter Your Write Up Here." name="write"></textarea><br>
							<label for="uploadi">
      							<span class="btn btn-primary" aria-hidden="true">Add Image</span>
      							<input type="file" name="postss" accept="image/*" id="uploadi" style="display:none">
							</label>
							<label for="uploadv">
      							<span class="btn btn-danger" aria-hidden="true">Add Video</span>
      							<input type="file" name="posts" id="uploadv" accept="video/*" style="display:none">
							</label>
							<input class="float-right btn btn-success" type="submit" name="post" value="post">
							
						</form>
					</div>
				</div>
			</div>
			<div class="rows py-5">                           <!-- CONTENT -->
				<?php 
				$content=mysqli_query($con,"Select * from user_posts order by date DESC");
				if ($content) {
				while ($post=mysqli_fetch_assoc($content)) {
				 ?>
				<table class="row">
					<tr class="row">  <!--  name -->
						<td><i><?php echo $post['name']; ?></i></td>
					</tr>
					<?php if ($_SESSION["temp_user"][3]==$post['email']) {
					?>
					<a href="delete.php?del=<?php echo $post['date']; ?>" class="float-right"><button class="btn">X</button></a>    

					<?php }  ?>
					<tr class="row"> <!--  content -->
						<td><?php 
						if(strpos($post['type'],'writeup' )!==false)
						{
							echo "<tr><td>".$post['writeup']."</td></tr>";

						}
						if (strpos($post['type'],'video' )!==false) {
							echo "<tr><td><video width='480' height='320'controls>
   									<source src=".$post['source']." type='video/mp4'>
								</video></td></tr>";
						} 
						if (strpos($post['type'],'image' )!==false) 
						{
							echo "<tr><td><img width=480px src=".$post['source']." class='post_img'></td></tr>";
						}
						?></td>
					</tr>
					<tr class="row">   <!--  likes -->
						<td class="">
							<span id="likes"><?php echo $post['likes'] ?> </span>
							<?php $table=$_SESSION['temp_user'][0].$_SESSION['temp_user'][2]; $date=$post['date'];
							$qry=mysqli_query($con,"select * from $table where field='$date'"); 
							if (mysqli_num_rows($qry)) {
								$date=$post['date'];echo "<a href='php/insert.php?date=$date && status=unlike'><button class='btn btn-light fa fa-fire like fa-lg'></button></a>";
							}
							else { $date=$post['date'];echo "<a href='php/insert.php?date=$date && status=like'><button class='btn btn-light fa fa-fire like fa-lg'></button></a>";} ?>
						</td>
					</tr>
					<tr class="rows">   <!--  comments -->
						<?php //include 'comment.php'; ?>
					</tr>		
				</table><hr>
				
				<?php 
				}
			}
			else
				echo "Not working ".$content;
				?>
			</div>
		</div>
		<div class="col-3">
			<div class="rows">                           <!-- Sponsors Area -->
				
			</div>
			
		</div>
	</div>
</div>
<table>
	<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
</table>
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
                    <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o fa-lg"></i></a><br>
                    <span class=""><?php include 'view.php'; ?></span> 
            	</div>
			</div>
		<div class="row">
			<div class="col-12">Gaurav Kumar Mishra © 2020</div>
			
		</div>
	</div>
</footer>



<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/popper.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>

</body>

<?php 
}
	else
		header("location:otp.php?verify=true && msg=Please Verify Your OTP.");
}
else
{
	header("location:login.php?msg=PLEASE LOGIN FIRST");
}
 ?>
 </html>