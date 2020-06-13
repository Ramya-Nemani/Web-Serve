<?php

$statusmsg=" ";

$con=mysqli_connect("localhost","root","");
	if(!($con))
	{
		echo"connection not established";
	}
	else
	{
$sql=mysqli_select_db($con,"webserve");
$result=mysqli_query($con,$sql);

$target_dir="uploads/"
$tagert_file=$target_dir.basename($_FILES["img"]["name"]);
$uploadOk=1;
$fileType=pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["upload"]))
{
	$tempno= $_POST['tempno'];
	$tname=$_POST['tempname'];
	$ttype=$_POST['temptype'];
	$desc=$_POST{'desc'];
	$price=$_POST['price'];
	
	$allowTypes=array('jpg','png','jpeg','gif');
	if(in-array($fileType,$allowTypes))
	{
		if(move_uploaded_file($_FILES["img"["tmp_name"], $tagrget_file))
		{
			$insert="INSERT INTO template (temid, tempname, temptype, tempdesc , price, image) VALUES ('".$tempno."','".$tname."','".$ttype."','".$desc."','".$price."', NOW()";
			$result= mysqli_query($con,$insert);
			if($result)
			{
				$statusmsg= "the file has been uploaded sucessfully";
			}
			else
			{
				$statusmsg= "file upload failes, please try again.";
			}
		}
		else
		{
			$statusmsg="Sorry, there was an error uploading your file";
		}
	}
	else
	{
		$statusmsg="sorry,only jpg,png,gif files are allowwed to upload";
	}
}
else
{
	$statusmsg="please select a file to upload";
}
	
	echo $statusmsg;
	
?>