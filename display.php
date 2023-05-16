<?php
session_start();
include("connection.php");
$id=$_SESSION["id"];
if ($id=="")
{
	echo "<script>alert('**please login again')</script>";
	echo "<script>window.location.href='login.php'</script>";
}
else
{
$sql= "SELECT * FROM user_ajax WHERE user_id='$id'";
$data= mysqli_query($conn,$sql);
// $result= mysqli_fetch_assoc($data);
// print_r($result["name"]);
?>
<table border="1">
	<tr>
		<th>Sl_no</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>phone</th>
		<th>picsource</th>
		<th>Action</th>
	</tr>
<?php
$i=1;
while ($result= mysqli_fetch_assoc($data)) 
{
	?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo $result["name"]?></td>
		<td><?php echo $result["email"]?></td>
		<td><?php echo $result["password"]?></td>
		<td><?php echo $result["phone"]?></td>
		<td><img src="<?php echo $result["picsource"]?>" height="100" width="100"></td>
		<td>
			<a href="edit.php?ep=<?php echo $result['user_id']?>">edit</a>
			<a href="changepassword.php">change password</a>
			<a href="logout.php">logout</a>
		</td>
	</tr>
	<?php
}
}
?>
</table>