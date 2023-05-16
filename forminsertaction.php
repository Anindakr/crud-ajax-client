<?php
include("connection.php");
$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$pass=md5($_REQUEST["password"]);
$phone=$_REQUEST["phone"];
$filename= $_FILES["uploadimage"]["name"];
$tempname= $_FILES["uploadimage"]["tmp_name"];
$folder= "image/".$filename;
move_uploaded_file($tempname, $folder);

// echo "My name is: ".$name;
// echo "<br>";
// echo "My email is: ".$email;
// echo "<br>";
// echo "My password is: ".$pass;
// echo "<br>";
// echo "My phone no is: ".$phone;
$sql="INSERT INTO `user_ajax`(`user_id`, `name`, `email`, `password`, `phone`,`picsource`) VALUES ('','$name','$email','$pass','$phone','$folder')";
$data1=mysqli_query($conn,$sql);
if($data1)
{
	//echo "inserted";
	// header("location:login.php");
	echo "<script>alert('Insert data successful')</script>";
	echo "<script>window.location.href='login.php'</script>";
}
else
{
	echo "not inserted"; 
}

?>