<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>abc</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	enter name: <input type="text" id="name"><br>
	enter email: <input type="email" id="email"><br>
	enter password: <input type="text" id="password"><br>
	enter phone no: <input type="text" id="phone"><br>
	enter image: <input type="file" name="uploadimage"><br>
	<input type="submit" id="submit" value="submit">
	<p id="p1"></p>
	<script type="text/javascript">
	$("document").ready(function(){
		$("#submit").click(function(){
			// nme= $("#name").val();
			// eml= $("#email").val();
			// pass= $("#password").val();
			// phn= $("#phone").val();
			var nme= $("#name").val();
			var eml= $("#email").val();
			var pass= $("#password").val();
			var phn= $("#phone").val();
			var img= $("input[name='uploadimage']")[0].files[0];
			var formdata= new FormData();
			formdata.append("name",nme);
			formdata.append("email",eml);
			formdata.append("password",pass);
			formdata.append("phone",phn);
			formdata.append("uploadimage",img);
			//document.write(nme);
			$.ajax({
				type: "post",
				url: "forminsertaction.php", 
				//data: {name:nme,email:eml,password:pass,phone:phn}
				data: formdata,
				contentType: false, //enctype= 
				processData: false
			}).done(function(data){
				$("#p1").html(data);
			});
		});
	});
</script>
</body>
</html>