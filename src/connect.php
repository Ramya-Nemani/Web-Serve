<?php

$con=mysqli_connect("localhost","root","");
$sql="CREATE DATABASE webserve";
$db=mysqli_query($con,$sql);

if($db)
{
	echo'database created';
}
else
{
	echo'error'.mysqli_error($con);
}
require("create.php");

?>