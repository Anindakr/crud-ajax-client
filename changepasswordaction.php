<?php 
include("connection.php");
session_start();
$id=$_SESSION["id"];
$oldp=md5($_REQUEST["opass"]);
$newp=md5($_REQUEST["cpass"]);
$confp=md5($_REQUEST["crpass"]);
$sql1= "SELECT * FROM `user_ajax` WHERE password= '$oldp'";
$data1= mysqli_query($conn,$sql1);
$total= mysqli_num_rows($data1);
if ($total==0) 
{
	echo "old pass and database pass not same";
}
else
{
if ($oldp!=$newp)
{
	if ($newp==$confp)
	{
		$sql="UPDATE `user` SET `password`='$confp' WHERE `user_id`='$id' ";
		$data=mysqli_query($conn,$sql);
		if($data)
		{
			header("location:login.php");
		}
		else
		{
			echo "password not updated";
		}
		
	}
	else
	{
		echo "newp and confp are not same";
	}
}
else
{
	echo "oldp and newp are same";
}
}
?>