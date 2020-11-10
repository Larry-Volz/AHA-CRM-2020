<?
require_once("../includes/config.php");
require_once("../includes/global_functions.php");
require_once("../includes/loggincheck.php");
require_once("class.menu.php");

// Connect to database
db_connect($DBHost,$DBName,$DBUser,$DBPass);

$obj = new Menu();
$nav = $obj->get_js_menu(0);


?>
<html>
<head>
<title>Store Locator Admin Panel - Welcome Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="images/style.css">
<SCRIPT LANGUAGE="JavaScript" SRC="menu/JSCookMenu.js"></SCRIPT>
<LINK REL="stylesheet" HREF="menu/themes/Office/theme.css" TYPE="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="menu/themes/Office/theme.js"></SCRIPT>
<LINK REL="stylesheet" HREF="menu/themes/Office/theme.css" TYPE="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="menu/themes/Office/theme.js"></SCRIPT>
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
    <td bgcolor="#F0F0F0" height="25" style="padding-left:20px;" id="menu"><SCRIPT language="JavaScript" type="text/javascript">
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
</table>
<br>

<!--End topmenu-->
<!--Start heading page-->
<table width="850" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
<td class="heading">Welcome to Store Locator Admin </td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<!--End heading page-->
<!--Start form-->
<br>
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #CCCCCC;">
<tr>
<td bgcolor="#F6F6F6" style="padding:15px;">
  <p><span class="title1"><strong>Welcome to Store Locator</strong></span><br>  
      <br>
      <span class="style5">Thank you for deciding to use Store Locator on your website.  To navigate around the admin panel use the links on the menu above. If you would like to return to this page at any point click on the Admin Index link in the General menu.</span></p>
  <p align="left"><span class="title1"><strong>Last Actions Taken</strong></span></p>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr bgcolor="#0d5b94">
      <td width="200" height="30" bgcolor="#0a9014" style="padding-left:5px;"><div align="left" class="style2"> <strong>Action Taken </strong></div></td>
      <td width="150" bgcolor="#0a9014" style="padding-left:5px;"><div align="center" class="style9 style10 style2">
          <div align="left" class="style2">Time</div>
      </div></td>
      <td width="200" bgcolor="#0a9014" style="padding-left:5px;"><div align="center" class="style11 style2">
          <div align="left" class="style2">User (IP) </div>
      </div></td>
    </tr>
    <tr bgcolor="#000000">
      <td height="1" colspan="3"></td>
    </tr>
    <?
$count=0;
$query = "SELECT log_title,log_time,log_user,log_ip FROM `logs` ORDER BY log_time DESC LIMIT 10";
$query_result = @mysql_query ($query) OR error(mysql_error());
while ($info = @mysql_fetch_array($query_result))
{
	IF($count == 0)
	{
		$colour = '#F7F7F7';
		$count = 1;
	}
	ELSE
	{
		$colour = '#EFEFEF';
		$count = 0;
	}
	$date = date("jS M Y (G:i)", $info['log_time']);
?>
    <tr bgcolor="<?= $colour ?>">
      <td height="25" style="padding-left:5px;"><span class="style5"><? echo $info['log_title']; ?></span></td>
      <td width="150" style="padding-left:5px;"><span class="style5"><? echo $date; ?></span></td>
      <td width="200" style="padding-left:5px;"><span class="style5"><? echo $info['log_user'] . " (" . $info['log_ip'] . ")"; ?></span></td>
    </tr>
    <? } ?>
    <tr bgcolor="#000000">
      <td height="1" colspan="3"></td>
    </tr>
  </table>
  <p align="right"><a href="actions.php"><strong>View All</strong></a></p>  </td>
</tr>
</table>
<!--End form-->
<br>
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