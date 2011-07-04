  <?php

/**
*
* @author: Alberto Jsé <guzzano>
* @team: Venezuela Dev Team
* @license: http://opensource.org/licenses/gpl-license.php
*
*/

session_start();

function open_mblog()
{
	@mysql_connect('localhost', 'xxx', 'xxx') or die('[!] Error in Mblog... Sorry!');
	@mysql_select_db('xxx') or die('[!] Error in Mblog... Sorry!');

	//@mysql_connect('localhost', 'root', 'betoman100') or die('[!] Error in Mblog... Sorry!');
	//@mysql_select_db('mblog') or die('[!] Error in Mblog... Sorry!');

	if(!isset($_SESSION['loginstatus']) and !isset($_GET['user']))
	{
		include('mblog_login.php');
		exit();
	}
	elseif (isset($_SESSION['loginstatus']) == TRUE and !isset($_GET['user']) == $_SESSION['username'] and $_GET['user'] = $_SESSION['username'])
    {
       	$username = $_SESSION['username'];
   	}
   	elseif (isset($_GET['user']) or isset($_SESSION['loginstatus']))
   	{
       	$username = $_GET['user'];
   	}

   	if ($_SESSION['loginstatus'] == TRUE)
   	{
    	echo '<font color= #800080>#</font>My Mblog (<font color = "red">¡Beta!</font>) <font color= #816740>>></font> [<a href="index.php?user='.$_SESSION['username'].'">mblog</a>] [<a href="mblog_option.php">options</a>] [<a href="mblog_logout.php">logout</a>]<br><br>';
    }
    
    $username_verify = @mysql_query('SELECT * FROM users WHERE username = "'.$username.'"');

	if (mysql_num_rows($username_verify) <= 0)
   	{
   		die('[!] Perfil no found <meta http-equiv="refresh" content= "3 ; url = index.php">');
   	}
    
    $fullname = mysql_result(@mysql_query('SELECT fullname FROM users WHERE username = "'.$username.'"'), 0,0);
    $avatar = mysql_result(@mysql_query('SELECT avatar FROM users WHERE username = "'.$username.'"'), 0,0);
    $description = mysql_result(@mysql_query('SELECT description FROM users WHERE username = "'.$username.'"'), 0,0);
    $aboutme = mysql_result(@mysql_query('SELECT aboutme FROM users WHERE username = "'.$username.'"'), 0,0);
    $location = mysql_result(@mysql_query('SELECT location FROM users WHERE username = "'.$username.'"'), 0,0);
    $notices = @mysql_query("SELECT title, category, notice, date, id FROM notices WHERE username = '$username' ORDER by date DESC");

    echo'
    <a href = '.$avatar.'><img src="'.$avatar.'" width = "100" height = "95"></a><font color="red"> ~</font> '.$fullname.'<br>
    <i>'.$description.'</i><br><br>
    <b>About me: </b>'.$aboutme.'<br><br>
    <b>Location:</b> '.$location.'<br><br><br>
    ';

   	if ($_SESSION['loginstatus'] == TRUE and $_SESSION['username'] == $_GET['user'])
   	{
       	$category = mysql_result(@mysql_query('SELECT category FROM users WHERE username = "'.$username.'"'), 0, 0);

        echo'
        <form method="post">
        	Tag: <select name="tag">
       	';

       	$category_explode = explode(';', $category);

        foreach($category_explode as $new_category)
        {
           	echo'<option value="'.$new_category.'">'.$new_category.'</option>';
       	}
        
       	echo'
       		</select> 
       		Title: <input type = "text" class = "input_titulo" name = "title"/><br><br> 
       		<textarea class = "box" name = "notice"></textarea><br><br>
       		<div align = "center"><input type = "submit" value="OK"/> 
       		<input type="button" value= "View notice" onClick="JavaScript:view_notice()"/></div>
       	</form></br>
       	';
        	
       	if (isset($_POST['title']) and isset($_POST['notice']))
       	{
           	$title=strip_tags($_POST['title']);
           	$category_go=strip_tags($_POST['tag']);
           	$notice[0]=strip_tags($_POST['notice']);
           	$notice[1]=str_replace("\n", "<br>", $notice[0]);
          	$bbcode = array(
           	'/\[youtube\](.*?)\[\/youtube\]/is',
            '/\[url=(.*?)\](.*?)\[\/url\]/is',
       		'/\[img\](.*?)\[\/img\]/is',
          	'/\[center\](.*?)\[\/center\]/is',
           	'/\[b\](.*?)\[\/b\]/is',
           	'/\[code\](.*?)\[\/code\]/is',
           	'/\[user\](.*?)\[\/user\]/is'
           	);
            		
	       	$bbcode_html = array(
           	'<iframe title="YouTube" width="270" height="233" src= \"http://www.youtube.com/embed/$1\" frameborder="0"></iframe>',
           	'<a href=\"$1\" target=\"_blank\">$2</a>',
           	'<img src=\"$1\"/>',
           	'<p align="center" >$1</p>',
           	'<b>$1</b>',
           	'<div class = "codebox">$1</div>',
           	'<a href=\"index.php?user=$1\" target=\"_blank\">@$1</a>',
           	);
            
            $notice[2] = preg_replace($bbcode, $bbcode_html, $notice[1]);
           	$date = date('Y-m-d H:i:s', time());
           		
           	if ($title == NULL or $notice == NULL)
           	{
           		echo '<script>alert("[!] There is a blank.");</script>';
           	}
	        else
	        {
	        	@mysql_query("INSERT INTO notices (username, title, category, notice, date) VALUES ('$username', '$title', '$category_go', '$notice[2]', '$date')");
	      	 	echo'<meta http-equiv="refresh"content="0;url=index.php?user='.$username.'">';
	       	}
		}
    }

    if (mysql_num_rows($notices) <= 0)
   	{
       	die('<img src = "img/lines.jpg"><br>'.$fullname.' no have notices.<br><img src = "img/lines.jpg">');
   	}
   	
   		echo'
   		<script language="JavaScript" type="text/javascript">
		function comments(id)
		{
			window.open("mblog_comments.php?id="+id, "Comments", "width=420, height=380");
		}
		</script>
		';
   		while ($row = mysql_fetch_row($notices))
		{
			$comments = mysql_num_rows(@mysql_query('SELECT comment FROM comments WHERE id = "'.$row[4].'"'));
			
			echo'
			<img src = "img/lines.jpg"><br>
			<font color= #04B4AE>['.$row[1].']</font> '.$row[0].' <<a href = "JavaScript:comments('.$row[4].')">Comments</a>: '.$comments.'><br>
			Date: '.$row[3].'<br>
			<img src = "img/lines.jpg">
			<br><br> '.$row[2].'<br><br>
			';
		}
	}

?>	
