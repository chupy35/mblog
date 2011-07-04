<?php

/**
*
* @author: Alberto Jsé <guzzano>
* @team: Venezuela Dev Team
* @license: http://opensource.org/licenses/gpl-license.php
*
*/

session_start();

function mblog_option()	
{
	@mysql_connect('localhost', 'xxx', 'xxx') or die('[!] Error in Mblog... Sorry!');
	@mysql_select_db('xxx') or die('[!] Error in Mblog... Sorry!');

	//@mysql_connect('localhost', 'root', 'betoman100') or die('[!] Error in Mblog... Sorry!');
	//@mysql_select_db('mblog') or die('[!] Error in Mblog... Sorry!');


	if ($_SESSION['loginstatus']	 == TRUE)
	{
		echo '<font color= #800080>#</font>My Mblog <font color= #816740>>></font> [<a href="index.php?user='.$_SESSION['username'].'">mblog</a>] [<a href="mblog_option.php">options</a>] [<a href="mblog_logout.php">logout</a>]<br><br>';
		
		$username = $_SESSION['username'];

		$fullname = mysql_result(@mysql_query('SELECT fullname FROM users WHERE username = "'.$username.'"'), 0,0);
    	$avatar = mysql_result(@mysql_query('SELECT avatar FROM users WHERE username = "'.$username.'"'), 0,0);
    	$description = mysql_result(@mysql_query('SELECT description FROM users WHERE username = "'.$username.'"'), 0,0);
    	$aboutme[0] = mysql_result(@mysql_query('SELECT aboutme FROM users WHERE username = "'.$username.'"'), 0,0);
    	$aboutme[1] = str_replace("<br>", "\n", $aboutme[0]);
    	$location = mysql_result(@mysql_query('SELECT location FROM users WHERE username = "'.$username.'"'), 0,0);

    	echo 
    	'
    	<br>
    	<form method = "post" enctype = "multipart/form-data">
    		Fullname: <br><input type = "text" name = "fullname" value = "'.$fullname.'"><br><br>
    		Avatar: <br><img src = "'.$avatar.'" width = "100" height = "95"><br><br>
    		New avatar: (<font color = "gray">Only png, gif, jpeg and size max 700000KB</font>)<br><input type = "file" name = "avatar"><br><br>
    		Description: <br><input type = "text" name = "description" value = "'.$description.'"><br><br>
    		Aboutme: <br><textarea class = "box" name = "aboutme">'.$aboutme[1].'</textarea><br><br>
    		Location: <br><input type = "text" name = "location" value = "'.$location.'"><br><br>
    		<input type = "submit" value = "Save">
    	</form>
    	';

		if (isset($_POST['fullname']) or isset($_POST['description']) or isset($_POST['aboutme']) or isset($_POST['location']))
		{
			$strips_fullname = strip_tags($_POST['fullname']);
			$strips_description = strip_tags($_POST['description']);
			$strips_aboutme[0] = strip_tags($_POST['aboutme']);
			$strips_aboutme[1] = str_replace("\n", "<br>", $strips_aboutme[0]);
			$strips_location = strip_tags($_POST['location']);

			
			if (empty($strips_fullname) or empty($strips_description) or empty($strips_aboutme[1]) or empty($strips_location))
			{
				die('<script>alert("[!] There is a blank.");</script>'); 
				exit();
			}

			if (is_uploaded_file($_FILES['avatar']['tmp_name']))
			{
				// Fix blind shell
				if(@imagecreatefromgif($_FILES['avatar']['tmp_name']) or @imagecreatefromjpeg($_FILES['avatar']['tmp_name']) or @imagecreatefrompng($_FILES['avatar']['tmp_name']))
				{
					$verify = true;
				}
				
				if ($verify == true and $_FILES['avatar']['size'] < 700000)
				{
					if ($avatar != "img/noavatar.jpg")
					{
						unlink($avatar);
					}
					move_uploaded_file($_FILES['avatar']['tmp_name'], 'user/'.$username.'/avatar/'.$_FILES['avatar']['name'].'');
					$avatar = 'user/'.$username.'/avatar/'.$_FILES['avatar']['name'].'';
				}
			}
				

		@mysql_query('UPDATE users SET fullname = "'.$strips_fullname.'", description = "'.$strips_description.'", aboutme = "'.$strips_aboutme[1].'", location = "'.$strips_location.'", avatar = "'.$avatar.'" WHERE username = "'.$username.'"');
		die ('<script>alert("[!] Account update.");</script> <meta http-equiv="refresh" content= "0 ; url = index.php">');
		}
	}
}

?>
