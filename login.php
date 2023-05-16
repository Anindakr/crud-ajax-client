<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	enter email: <input type="email" id="email"><br>
	enter password: <input type="text" id="password"><br>
	<input type="submit" id="submit" value="submit">
	<a href="forminsert.php">new reg</a>
	<p id="p1"></p>
	<script type="text/javascript">
	$("document").ready(function(){
		$("#submit").click(function(){
			eml= $("#email").val();
			pass= $("#password").val();
			//document.write(nme);
			$.ajax({
				type: "post",
				url: "loginaction.php", 
				data: {email:eml,password:pass}
			}).done(function(data){
				$("#p1").html(data);
			});
		});
	});
</script>
</body>
</html>