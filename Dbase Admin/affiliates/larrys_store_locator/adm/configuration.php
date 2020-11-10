<?php 
require_once("../includes/config.php");
require_once("../includes/global_functions.php");
require_once("../includes/loggincheck.php");
require_once("class.menu.php");

db_connect($DBHost,$DBName,$DBUser,$DBPass);

$obj = new Menu();
$nav = $obj->get_js_menu(0);


IF(isset($_POST))
{
	IF(count($_POST) > 1)
	{
		$handle = fopen('../includes/config.php', 'w');

		fwrite($handle, "<?php\r\n");
		fwrite($handle, "// Database Host\n");
		fwrite($handle, "\$DBHost = '" . $_POST['DBHost'] . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Database Name\n");
		fwrite($handle, "\$DBName = '" . $_POST['DBName'] . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Database Username\n");
		fwrite($handle, "\$DBUser = '" . $_POST['DBUser'] . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Database Password\n");
		fwrite($handle, "\$DBPass = '" . $_POST['DBPass'] . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Radius in which a store can be counted as nearby\n");
		fwrite($handle, "\$store_radius = '20';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Admin Email Address\n");
		fwrite($handle, "\$admin_email = '" . $_POST['admin_email'] . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Template Folder Name\n");
		fwrite($handle, "\$tpl_name = '" . $tpl_name . "';\n");		
		fwrite($handle, "\n");
		fwrite($handle,"DEFINE('IS_INSTALLED', 1);\n");
		fwrite($handle, "?>");
		fclose($handle);
		
		log_action('Configuration Updated');	log_action('Configuration Saved');
		transfer('configuration.php','Configuration Saved');
		exit;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Store Locator Admin Panel - Configuration</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="images/style.css">
<SCRIPT LANGUAGE="JavaScript" SRC="menu/JSCookMenu.js"></SCRIPT>
<LINK REL="stylesheet" HREF="menu/themes/Office/theme.css" TYPE="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="menu/themes/Office/theme.js"></SCRIPT>
<LINK REL="stylesheet" HREF="menu/themes/Office/theme.css" TYPE="text/css">
<SCRIPT LANGUAGE="JavaScript" SRC="menu/themes/Office/theme.js"></SCRIPT>
<script language="JavaScript">
<!--
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

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
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
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td class="heading">Configuration</td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<br>
<!--End heading page-->
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #CCCCCC;">
    <tr>
      <td bgcolor="#F6F6F6"><form name="form1" method="post" action=""><div align="center" class="title1"><br>
          <table width="450" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="170" valign="top" class="style5"><div align="left"><strong><span class="style3">Admin Email : (<a href="#" onClick="MM_openBrWindow('help.php?id=1','help','width=500,height=200')">?</a>)</span></strong></div></td>
            <td><div align="left">
              <input type="text" name="admin_email" style="width:200px;" value="<? echo $admin_email; ?>">
            </div></td>
          </tr>
          <tr>
            <td width="170" height="20" valign="top" class="style5"><div align="left"></div></td>
            <td height="20"><div align="left"></div></td>
          </tr>
          <tr>
            <td width="170" valign="top" class="style5"><div align="left"><strong>Database Host<span class="style3">: (<a href="#" onClick="MM_openBrWindow('help.php?id=2','help','width=500,height=200')">?</a>)</span></strong></div></td>
            <td><div align="left">
              <input type="textfield" name="DBHost" style="width:200px;" value="<? echo $DBHost; ?>">
            </div></td>
          </tr>
          <tr>
            <td width="170" valign="top" class="style5"><div align="left"><strong>Database Name<span class="style3">:</span> <span class="style3"> (<a href="#" onClick="MM_openBrWindow('help.php?id=3','help','width=500,height=200')">?</a>)</span></strong></div></td>
            <td><div align="left">
              <input type="textfield" name="DBName" style="width:200px;" value="<? echo $DBName; ?>">
            </div></td>
          </tr>
          <tr>
            <td valign="top" class="style5"><div align="left"><strong>Database Username<span class="style3">:</span> <span class="style3"> (<a href="#" onClick="MM_openBrWindow('help.php?id=4','help','width=500,height=200')">?</a>)</span></strong></div></td>
            <td><div align="left">
              <input type="textfield" name="DBUser" style="width:200px;" value="<? echo $DBUser; ?>">
            </div></td>
          </tr>
          <tr>
            <td valign="top" class="style5"><div align="left"><strong>Database Password<span class="style3">:</span> <span class="style3"> (<a href="#" onClick="MM_openBrWindow('help.php?id=5','help','width=500,height=200')">?</a>)</span></strong></div></td>
            <td><div align="left">
              <input type="password" name="DBPass" style="width:200px;" value="<? echo $DBPass; ?>">
            </div></td>
          </tr>
          <tr>
            <td height="20" valign="top" class="style5"><div align="left"></div></td>
            <td height="20"><div align="left"></div></td>
          </tr>
          <tr>
            <td valign="top" class="style3"><div align="left"></div></td>
            <td><div align="left">
              <input type="submit" name="Submit" value="Update Configuration">
            </div></td>
          </tr>
        </table>
        <br>
      </div></form></td>
    </tr>
</table>
<br>
<!--Start bottom-->
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
  </tr>
  <tr>
    <td style="padding:15px;" align="center"><span class="copyright">Copyright &copy; 2005 <a href="http://www.ghostscripter.com" class="copyright" target="_blank">GhostScripter.Com</a> All Rights Reserved.</span></td>
  </tr>
</table>
<!--End bottom-->
</body>
</html>
