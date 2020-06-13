<!DOCTYPE html>
<html>
<body>
<a href="signup.html" style="font-family:blippo; font-size:30px; text-decoration:none; margin-left:30px; color:black; padding-right:50px;"> Back </a>
</body>
</html>



<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$uname=$_POST['username'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$pswd=$_POST['password'];
	$orgname=$_POST['orgname'];
	$orgtype=$_POST['orgtype'];
	
	$con=mysqli_connect("localhost","root","");
	if(!($con))
	{
		echo"connection not established";
	}
	else
	{
	$sql=mysqli_select_db($con,"webserve");
	$result=mysqli_query($con,$sql);
	
	if($uname==' ' and $pswd==' ' and $email==' ' and $mobile==' ' and $orgname==' ' and $orgtype==' ')
	{
		echo"Fill All The Columns";
		exit();
	}
	else
	{
		$sql="INSERT INTO user(username,password,email,mobile,orgname,orgtype) VALUES ('".$uname."','".$pswd."','".$email."','.$mobile.','".$orgname."','".$orgtype."')";
		$res=mysqli_query($con,$sql);
		
		if($res)
		{
			echo" Registration Successfull ";
		}
		else
		{
			echo"error".mysqli_error($con).mysqli_errno($con);
		}
	}
}
}	
else
{
	echo"error";
}
?>