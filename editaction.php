<?php
session_start();
include("connection.php");
$id=$_REQUEST["uid"];
$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$phone=$_REQUEST["phone"];
$filename= $_FILES["uploadimage"]["name"];
$tempname= $_FILES["uploadimage"]["tmp_name"];
$folder= "image/".$filename;
move_uploaded_file($tempname, $folder);
echo "<img src='$folder' height='50' width='50'>";
$oldimage=$_SESSION["oldimgpath"];
if($folder=="image/")
{
	$sql="UPDATE `user_ajax` SET `name`='$name',`email`='$email',`phone`='$phone',`picsource`='$oldimage' WHERE user_id='$id'";
$data= mysqli_query($conn,$sql);
	if($data)
	{
		//echo "Insert Data Successfully";
		header("location:display.php");
	}
	else
	{
		echo "Not Updated";	
	}
}
else
{
	$sql="UPDATE `user_ajax` SET `name`='$name',`email`='$email',`phone`='$phone',`picsource`='$folder' WHERE user_id='$id'";
$data= mysqli_query($conn,$sql);
	if($data)
	{
		//echo "Insert Data Successfully";
		//header("location:display.php");
		echo "<script>window.location.href='display.php'</script>";
	}
	else
	{
		echo "Not Updated";
	}
}
?>