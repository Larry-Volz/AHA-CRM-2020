<?
require_once("../includes/config.php");
require_once("../includes/global_functions.php");
IF(isset($_POST['password']))
{
	$_POST['password'] = md5($_POST['password']);
}

IF(isset($_POST['Submit']))
{
	IF(strlen($_POST['username']) == 0) 
	{
		$error[] = 'Error: Username Missing<br>';
	}
	IF(strlen($_POST['password']) == 0)
	{
		$error[] = 'Error: Password Missing<br>';
	}
	$db_connection = mysql_connect ($DBHost, $DBUser, $DBPass) OR error (mysql_error());
	$db_select = mysql_select_db ($DBName) or error (mysql_error());
	$query = "SELECT admin_id FROM `admins` WHERE admin_username='" . $_POST['username'] . "' AND admin_password='" . $_POST['password'] . "' LIMIT 1";
    $query_result = mysql_query ($query);
	while ($info = mysql_fetch_array($query_result))
    {
		$admin_id = $info['admin_id'];
	}
		IF(isset($admin_id))
		{
			session_start();
			$_SESSION['admin']['id'] = $admin_id;
			$_SESSION['admin']['username'] = $_POST['username'];
			log_action('Logged In');
			header("Location: index.php");
			exit;
		}
		ELSE
		{
			$error[] = "Error: Username & Password do not match";
		}
}
?>

 <link rel="stylesheet" type="text/css" href="images/style.css">
<div align="center"> </div>
<form name="form1" method="post" action="">
  <br>
  <table width="600"  border="0" align="center" cellpadding="4" cellspacing="0" class="style5">
    <tr bgcolor="#FF9900">
      <td height="30" bgcolor="#0a9014"><div align="center"><span class="style2"><strong>Login</strong></span></div></td>
    </tr>

        <tr>
      <td height="150" bgcolor="#F6F6F6"><p align="center">
        <br>
        <? IF(isset($error)){ foreach ($error as $value) { ?>
        <span class="style7"><? echo $value; ?></span>
        <? } } ?>
</p>
      <table border="0" align="center" cellpadding="6" cellspacing="0">
        <tr>
          <td><strong>Username:</strong></td>
          <td><input name="username" type="text" style="width: 150px;" value="<? IF(isset($_POST['username'])){ echo $_POST['username']; } ?>"></td>
        </tr>
        <tr>
          <td><strong>Password:</strong></td>
          <td><input style="width: 150px;" type="password" name="password"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input onClick="submit();document.form.Submit.disabled=true;" style="width: 150px;" type="submit" name="Submit" value="login"></td>
        </tr>
      </table></td>
    </tr>

  </table>
</form>
