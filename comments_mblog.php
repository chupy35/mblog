<?
/**
*
* @author: Alberto Jsé <guzzano>
* @team: Venezuela Dev Team
* @license: http://opensource.org/licenses/gpl-license.php
*
*/

session_start();

function mblog_comments()
{
	@mysql_connect('localhost', 'xxx', 'xxx') or die('[!] Error in Mblog... Sorry!');
	@mysql_select_db('xxx') or die('[!] Error in Mblog... Sorry!');

	//@mysql_connect('localhost', 'root', 'betoman100') or die('[!] Error in Mblog... Sorry!');
	//@mysql_select_db('mblog') or die('[!] Error in Mblog... Sorry!');
	
	$id = $_GET['id'];
	$comments = mysql_query("SELECT user, comment, date FROM comments WHERE id = '$id' ORDER by date ASC");

	while ($row = mysql_fetch_row($comments))
	{
		echo'
		<img src = "img/lines_comentary.jpg"><br>
		By: '.$row['0'].' <br>
		Date: '.$row[2].'<br>
		<img src = "img/lines_comentary.jpg"><br><br>
		'.$row[1].' <br><br>
		';
	}

	echo'
		<img src = "img/lines_comentary.jpg">
		<div align = "center"><br>
			<form method = "post">
				<b>Comment:</b> <br><textarea class = "box" name = "comment"></textarea><br><br>
				<input type = "submit" value = "Add comment">
			</form>
		</div>
		';

	if (isset($_POST['comment']))
	{
		
		if ($_SESSION['loginstatus'] == TRUE)
		{
			$user = $_SESSION['username'];
			$needlogin = mysql_result(@mysql_query('SELECT needlogin FROM users WHERE username = "'.$username.'"'), 0,0);
		}
		else
		{
			$user = $_SERVER['REMOTE_ADDR'];
		}
			
		$comment = strip_tags($_POST['comment']);
		$date = date('Y-m-d H:i:s', time());
	
		if (@mysql_query("INSERT INTO comments (id, user, comment, date) VALUES ('$id', '$user', '$comment', '$date')"))
    	{
  		 	echo'<meta http-equiv="refresh"content="0;url=mblog_comments.php?id='.$id.'">';
   		}
	}
}

?>
