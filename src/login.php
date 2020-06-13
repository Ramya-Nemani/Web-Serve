<?php

$username =$_REQUEST['username'];
$pswd=$_REQUEST['password'];

$username=stripcslashes($username);
$pswd=stripcslashes($pswd);

$con=mysqli_connect("localhost","root","");
if(!($con))
{
	echo"connection not established";
}
else
{
mysqli_select_db($con,"webserve");

if($con)
{
	$userid=mysqli_real_escape_string($con,$username);
	$pswd=mysqli_real_escape_string($con,$pswd);

	$result=mysqli_query($con,"select * from user where username='$username' and password='$pswd'") or die("Failed to query database");
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	if($row['username']==$username && $row['password']==$pswd)
	{
		header("Location:homel.html");
	}
	else
	{
		echo"sorry incorrect userid or password...";
		exit();
	}
}
else
{
	echo mysql_errno()."error".mysql_error();
}
}
?>