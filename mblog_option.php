<?include('includes/option_mblog.php');?>

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
			height:100px;
			width:549px;
			
			text-align:center;
			margin:0 auto;
			
			font-size: 9px;
			font-family: Volter;
			padding: 10px;
		}
		#contenedor
		{
			margin: 0 auto;
			text-align:left;
			width:95%;
		}
		input
		{
			font-family: Volter;
			font-size: 9px;
			width: 300px;
			background-color: transparent;
			border: 1px solid #000000;
		}
		.box
		{
			font-family: Volter;
			font-size: 9px;
			width: 300px;
			height: 150;
			background-color: transparent;
			border: 1px solid #000000;
		}
		.box2
		{		
			width: 582px;
			border: 1px solid #000000;
		}
		</style>
	</head>
	<div class="box2">
		<div id="contenedor">
			<?mblog_option();?>
		</div>
	</div>
</html>

