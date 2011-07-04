<?include('includes/login.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN""http://www.w3.org/TR/REC-html40/loose.dtd">
<html xml:lang = "es" xmlns = "http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
		<meta name = "description" content = "El miniblog de <meta http-equiv = "Content-Style-Type" content = "text/css"/>

		<title>Mblog - Your blog minimalist.</title>

		<style type="text/css">
		@font-face
		{
			font-family: Volter;
			font-weight:normal;
			font-style:normal;
			font-variant:normal;
			src: url("fonts/Volter.eot");
		}
		@font-face
		{
			font-family: Volter;
			font-weight:normal;
			font-style:normal;
			font-variant:normal;
			src: url("fonts/Volter.ttf");
		}
		body
		{
			margin-top: 20px;
			margin-right: 330px;
			margin-bottom: 10px;
			margin-left: 30px;

			font-size: 9px;
			font-family: Volter;
			padding: 10px;
		}
		input
		{
			font-family: Volter;
			font-size: 9px;
			background-color: transparent;
			border: 1px solid #000000;
		}
		</style>
	</head>
	<body>
		<p>Hey! login in mblog.</p><br>
		<form method = "post">
			Username:  <input type = "text" name = "username"><br><br>
			Password: <input type = "password" name = "password"><br><br>
			<input type = "submit" value = "Login!">
		</form>
		<?if(isset($_POST['username']) and isset($_POST['password'])){login();}?>
	</body>
