<?php  
	include 'connection.php';
	include '../get_IP.php';
	if(isset($_GET['date']))
	{
		$date=$_GET['date'];
		$q=mysqli_query($con,"select * from user_posts where date='$date'");
		$data=mysqli_fetch_assoc($q);
		$table=$_SESSION['temp_user'][0].$_SESSION['temp_user'][2];
		if ($_GET['status']=='like') {
			$like=$data['likes']+1;
		mysqli_query($con,"insert into $table values('$date','liked')");
		 mysqli_query($con,"Update user_posts Set likes ='$like' where date='$date'");
		}
		if ($_GET['status']=='unlike') {
			$like=$data['likes']-1;
		mysqli_query($con,"delete from $table where field='$date'");
		 mysqli_query($con,"Update user_posts Set likes ='$like' where date='$date'");
		}
		 header("location:../dashboard.php");
	}
	if(isset($_POST["login"]))
	{
		$log=$_POST['log'];
		$password=md5($_POST['password']);
		$password=md5($password);
		$qry=mysqli_query($con,"Select * from user_info where (email='$log' || phone='$log') && password='$password'");
		
		if(mysqli_num_rows($qry)>0)
		{
			$data=mysqli_fetch_assoc($qry);
			$_SESSION['user']=$data;
			$_SESSION['temp_user']=array($data['first_name'],$data['last_name'],$data['phone'],$data['email'],$data['profile_pic']);
			$name=$data['first_name']." ".$data['last_name'];
			$email=$data['email'];
			$phone=$data['phone'];
			mysqli_query($con,"insert into user_log values('$name','$email','$phone','1')");
			mysqli_query($con,"update user_log set status=1 where email='$email'");
			
			header("location:../dashboard.php");
		}
		else
		{
			header("location:../login.php?msg=WRONG CREDENTIALS ENTERED");
		}
			
	}
	if (isset($_POST["register"]))
	{

		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$phone=$_POST['mob'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$password=md5($password);
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$dbname=$fname.$phone;
		$dp="dp/default".$gender.".png";
		mysqli_query($con,"CREATE TABLE $dbname (field varchar(255), value varchar(255))");
		$qry=mysqli_query($con,"insert into user_info(first_name,last_name,email,phone,dob,gender,password,db_associated,profile_pic) values('$fname','$lname','$email','$phone','$dob','$gender','$password','$dbname','$dp')");
		if ($qry) {
			mysqli_query($con,"insert into user_log values('$name','$email','$phone','1')");
			$_SESSION['user']=array($fname,$lname,$phone,$email,$dp,$password);
			$_SESSION['temp_user']=array($fname,$lname,$phone,$email,$dp,$password);
			$name=$fname." ".$lname;
			$content="<strong>Welcone ".$name." to our club.</strong>";
			$type="writeup";
			mysqli_query($con,"insert into user_posts(email,phone,name,writeup,type) values('$email','$phone','$name','$content','$type')");
			header("location:../otp.php?generate");
			//echo "CREATE TABLE ".$dbname." (field varchar(255), value varchar(255)";

		}
		else
		{
			header("location:../index.php?msg=SORRY FOR THE INCONVIENENCE && msg2= PLEASE TRY AGAIN");
		}
	}
	if (isset($_POST["upload_dp"]))
	{
		$img=$_FILES['dp'];
		$move=move_uploaded_file($img['tmp_name'],'../dp/'.$img["name"]);
		$loc="dp/".$img["name"];
		$email=$_SESSION['user'][3];
		$phone=$_SESSION['user'][2];
	    mysqli_query($con,"Update user_info Set profile_pic ='$loc' where email='$email' || phone='$phone'");
	    $_SESSION['temp_user'][4]=$loc;
	    header("location:../dashboard.php");
	}
	else
	{
		//header("location:../index.php");
	}
?>