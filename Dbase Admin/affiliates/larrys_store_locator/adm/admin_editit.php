<?
require_once("../includes/config.php");
require_once("../includes/global_functions.php");
require_once("../includes/loggincheck.php");
require_once("class.menu.php");


db_connect($DBHost,$DBName,$DBUser,$DBPass);

$obj = new Menu();
$nav = $obj->get_js_menu(0);

IF(isset($_POST['Submit']))
{
	
	
	IF(count($_POST) > 1)
	{
		IF(isset($_POST['Submit']))
		{

			foreach ($_POST['id'] as $value) 
			{
				mysql_query("UPDATE `admins` SET admin_username='" . $_POST['admin_username'][$value] . "', admin_password='" . $_POST['admin_password'][$value] . "' WHERE admin_id='" . $value . "' LIMIT 1 ;");
			}	log_action('Edited Admin');
	transfer('featured.php','Edited Admin');
			exit;
		}
	}

}
?>

<html>
<head>
<title>Store Locator Admin Panel - Edit Category</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="images/style.css">
<SCRIPT LANGUAGE="JavaScript" SRC="menu/JSCookMenu.js"></SCRIPT>
<LINK REL="stylesheet" HREF="menu/themes/Office/theme.css" TYPE="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="menu/themes/Office/theme.js"></SCRIPT>
<LINK REL="stylesheet" HREF="menu/themes/Office/theme.css" TYPE="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="menu/themes/Office/theme.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
<!--

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function sub(page) {
OpenWin = this.open(page, "CtrlWindow", "toolbar=no,menubar=no,location=no,scrollbars=yes,resizable=yes,width=320,height=400");
}
// End -->
//-->
</SCRIPT>
<script language="JavaScript"><!--
function checkBox(theBox){
  var aBox = theBox.form["list[]"];
  var selAll = false;
  var i;
  for(i=0;i<aBox.length;i++){
    if(aBox[i].checked==false) selAll=true;
  }
  if(theBox.name=="selall"){
    for(i=0;i<aBox.length;i++){
      aBox[i].checked = selAll;
    }
    selAll = !selAll;
  }
  //theBox.form.selall.checked = selAll;
}
function init(){
  var theForm = document.f1;
  var aBox = theForm["list[]"];
  var selAll = false;
  var i;
  for(i=0;i<aBox.length;i++){
    if(aBox[i].checked==false) selAll=true;
    aBox[i].onclick = function(){checkBox(this)};
  }
  //theForm.selall.checked = selAll;
}
//--></script>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../../../_themes/breeze/bree1011-28591.css"><meta name="Microsoft Theme" content="breeze 1011, default">
<meta name="Microsoft Border" content="none, default">
</head>
<body>
<!--Start top-->
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" height="42" align="left" background="images/bg_top.gif"><img src="images/logo.gif" width="159" height="31" hspace="10"></td>
  </tr>
  <tr>
    <td><img src="images/dot.gif" width="1" height="1" alt=""></td>
  </tr>
</table>
<!--End top-->
<!--Start topmenu-->
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td bgcolor="#F0F0F0" height="25" style="padding-left:20px;" id="menu">
<SCRIPT language="JavaScript" type="text/javascript">
			var myMenu =
				
			// Start the menu
[
<? echo $nav; ?>
];				

			// Output the menu
			cmDraw ('menu', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
			</SCRIPT></td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table><br>

<!--End topmenu-->
<!--Start heading page-->
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td class="heading">Edit Admin </td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<br>
<!--End heading page-->
<form name="f" method="post" action="">
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F6F6F6" style="border:1px solid #CCCCCC;">
    <tr>
      <td><br>      
<?  
$count = 0;
$sql = "SELECT * FROM admins ";

foreach ($_POST['list'] as $value) 
{
	IF($count == 0)
	{
		$sql.= "WHERE admin_id='" . $value . "'";
	}
	ELSE
	{
		$sql.= " OR admin_id='" . $value . "'";
	}
	
	$count++;
} 
$sql.= " LIMIT " . count($_POST['list']);

$query_result = mysql_query($sql);
while ($info = @mysql_fetch_array($query_result))
{
?>
	  <table width="500" border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td width="50%"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Username:</font></strong></td>
          <td><input type="hidden" name="id[<? echo $info['admin_id']; ?>]" id="id2" value="<? echo $info['admin_id']; ?>">
		  <input name="featured_title[<? echo $info['admin_id']; ?>]" type="text" size="30" value="<? echo $info['admin_username']; ?>"></td>
        </tr>
        <tr>
          <td width="50%"><p><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Password:</font></strong></p></td>
          <td><input name="featured_asin[<? echo $info['admin_id']; ?>]" type="password" size="30"></td>
        </tr>
      </table>
	  <br><br><br>
<?
}
?>
      </td>
    </tr>
    <tr>
      <td height="50"><div align="center">
          <input type="submit" name="Submit" value="Edit Admin">
         
      </div></td>
    </tr>
  </table>
</form>
<br><br>
<!--Start bottom-->
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
<tr>
<td style="padding:15px;" align="center">
<span class="copyright">Copyright &copy; 2005 <a href="http://www.ghostscripter.com" class="copyright" target="_blank">GhostScripter.Com</a> All Rights Reserved.</span></td>
</tr>
</table>
<!--End bottom-->
</body>
</html>