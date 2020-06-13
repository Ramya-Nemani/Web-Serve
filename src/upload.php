<?php 
 
 $con=mysqli_connect("localhost","root","");
 if(!($con))
 {
	 echo"coonection not established";
 }
 else
 {
	 $sql=mysqli_select_db($con,"webserve");
	 $result=mysqli_query($con,$sql);
	 
	 if(isset($_POST['upload']))
	 {
		 $name=$_FILES['img']['name'];
		 $target_dir="upload/";
		 $target_file=$target_dir.basename($_FILES['img']['name']);
		 
		 $imgtype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		 $extensions_arr=array("jpg","png","jpeg","gif");
		 
		 if(in_array($imgtype,$extensions_arr))
		 {
			 $query="INSERT INTO template (image) VALUES ('".$name."')";
			 mysqli_query($con,$query);
			 
			 move_uploaded_file($_FILES['img']['tmp_name'],$target_dir.$name);
		 }
	 }
 }
 ?>