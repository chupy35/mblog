<?include('includes/comments_mblog.php');?>
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

			font-size: 9px;
			font-family: Volter;
		}
		input
		{
			font-family: Volter;
			font-size: 9px;
			background-color: transparent;
			border: 1px solid #000000;
		}
		select
		{
			font-family: Volter;
			font-size: 9px;
			background-color: transparent;
			border: 1px solid #000000;
		}
		.input_titulo
		{
			width: 310px;
		}
		.box
		{
			font-family: Volter;
			font-size: 9px;			
			width: 300px;
			height: 400;
			border: 1px solid #000000;
		}
		
		</style>
	</head>
	<?mblog_comments();?>
</html>
