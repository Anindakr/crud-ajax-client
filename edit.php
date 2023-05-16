<?php
session_start();
include ("connection.php");
$id= $_REQUEST["ep"];
$sql= "SELECT * FROM user_ajax WHERE user_id='$id'";
$data= mysqli_query($conn,$sql);
$result= mysqli_fetch_assoc($data);
$_SESSION["oldimgpath"]=$result["picsource"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>edit</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	enter name: <input type="text" id="name" value="<?php echo $result['name']?>"><br>
	<input type="text" id="uid" value="<?php echo $id;?>" hidden>
	enter email: <input type="email" id="email" value="<?php echo $result['email']?>"><br>
	enter phone no: <input type="text" id="phone" value="<?php echo $result['phone']?>"><br>
	enter image: <input type="file" name="uploadimage"><br>
	<input type="submit" id="submit" value="submit">
	<p id="p1"></p>
	<script type="text/javascript">
	$("document").ready(function(){
		$("#submit").click(function(){
			// nme= $("#name").val();
			// eml= $("#email").val();
			// phn= $("#phone").val();
			// id= $("#uid").val();
			var id= $("#uid").val();
			var nme= $("#name").val();
			var eml= $("#email").val();
			var phn= $("#phone").val();
			var img= $("input[name='uploadimage']")[0].files[0];
			var formdata= new FormData();
			formdata.append("name",nme);
			formdata.append("email",eml);
			formdata.append("phone",phn);
			formdata.append("uploadimage",img);
			formdata.append("uid",id);
			//document.write(nme);
			$.ajax({
				type: "post",
				url: "editaction.php", 
				//data: {name:nme,email:eml,phone:phn,uid:id}
				data: formdata,
				contentType: false, 
				processData: false
			}).done(function(data){
				$("#p1").html(data);
			});
		});
	}); 
</script>
</body>
</html> 