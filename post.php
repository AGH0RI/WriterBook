<?php 
include 'php/connection.php';
$content=$_POST['write'];
$type="writeup ";
$file=$_FILES['posts'];
$file2=$_FILES['postss'];
$name=$_SESSION['temp_user'][0]." ".$_SESSION['temp_user'][1];
$email=$_SESSION['temp_user'][3];
$phone=$_SESSION['temp_user'][2];

if ($file['error']==0 || $file2['error']==0 ) {
	if ($file2['name']!=="")
		$file=$file2;
	$type=$type.$file['type'];
	$filename=str_replace(' ', '_', $file['name']);
	move_uploaded_file($file['tmp_name'],"user/posts/".$filename);
	$loc="user/posts/".$filename;
	$qry=mysqli_query($con,"insert into user_posts(email,phone,name,writeup,source,type) values('$email','$phone','$name','$content','$loc','$type')");
	if ($qry) {
		header("location:dashboard.php");
	}
	//else
		//header("location:post.php");
}
else
{
	$qry=mysqli_query($con,"insert into user_posts(email,phone,name,writeup,type) values('$email','$phone','$name','$content','$type')");
	if ($qry) {
		header("location:dashboard.php");
	}
	else
		echo $email,$phone,$name,$content;
}

 ?>