<?

/**
*
* @author: Alberto Jsé <guzzano>
* @team: Venezuela Dev Team
* @license: http://opensource.org/licenses/gpl-license.php
*
*/

function login()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (empty($username) and empty($password))
    {
        die('[!] Error: Username or password this in blank.');
    }

    $login_query = sprintf('SELECT * FROM users WHERE username = "%s" AND password = "%s"', mysql_real_escape_string($username), mysql_real_escape_string($password));

    $login_rows = mysql_num_rows(@mysql_query($login_query));
    if ($login_rows <= 0)
    {
        die('The username not exists');
        $_SESSION['loginstatus']=FALSE;
    }
    else
    {
        $_SESSION['username']=$username;
        $_SESSION['loginstatus']=TRUE;
        echo'<br><br><script>alert("[!] Welcome '.$_SESSION['username'].', please wait...");</script> <meta http-equiv="refresh" content= "1 ; url = index.php">';
    }
}

?>
