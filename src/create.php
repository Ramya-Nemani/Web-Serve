<?php

$con= mysqli_connect("localhost","root","");
mysqli_select_db($con,"webserve");

$sql="CREATE TABLE user(username CHAR(255) NOT NULL, userid INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY, password CHAR(255) NOT NULL, email CHAR(255) NOT NULL, mobile BIGINT(10) NOT NULL,orgname CHAR(255) NOT NULL, orgtype CHAR(255) NOT NULL)";
$res=mysqli_query($con,$sql);

$sql="CREATE TABLE comment(cmntdesc CHAR(255))";
$res=mysqli_query($con,$sql);

$sql="CREATE TABLE payment(transid CHAR(20) NOT NULL PRIMARY KEY, transamt BIGINT(5))";
$res=mysqli_query($con,$sql);

$sql="CREATE TABLE template(temid INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY, tempname CHAR(255) NOT NULL, temptype CHAR(255), tempdesc CHAR(255), price INT(5) NOT NULL, image LONGBLOB NOT NULL)";
$res=mysqli_query($con,$sql);

if(!$res)
{
	echo mysqli_errno($con)."error".mysqli_error($con);
}



?>