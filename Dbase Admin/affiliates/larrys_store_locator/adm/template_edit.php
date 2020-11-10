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
<title>Edit Templates</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<SCRIPT LANGUAGE="JavaScript">

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function sub(page) {
OpenWin = this.open(page, "CtrlWindow", "toolbar=no,menubar=no,location=no,scrollbars=yes,resizable=yes,width=320,height=400");
}
// End -->
</SCRIPT>
<link rel="stylesheet" type="text/css" href="images/style.css">
<SCRIPT LANGUAGE="JavaScript" SRC="menu/JSCookMenu.js"></SCRIPT>
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
<table align="center" width="850" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="100%" background="images/bg_top.gif" height="42"><img src="images/logo.gif" width="159" height="31" hspace="10"></td>
</tr>
<tr>
<td><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<!--End top-->
<!--Start topmenu-->
<table align="center" width="850" cellpadding="0" cellspacing="0" border="0">
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
<table align="center" width="850" cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="heading">Edit Templates </td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<br>
<!--End heading page-->
<form name="f" method="post" action="">
<table bgcolor="#F6F6F6" width="850" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #CCCCCC;">
    <tr>
      <td height="50"><div align="center">
<?
IF(!isset($_GET['template']))
{
	echo "<table width=\"500\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"2\">";
	echo "<tr>";
    echo "<td><strong><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Template Name</font></strong></td>";
    echo "<td width=\"50\"> <div align=\"center\"><strong><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Edit</font></strong></div></td>";
	echo "</tr>";
	IF ($handle = opendir('../templates/')) {
		while (false !== ($file = readdir($handle))) { 
			IF ($file != "." && $file != "..") { 
				echo "<tr bgcolor=\"#F6F6F6\">";
				echo "<td bgcolor=\"#F6F6F6\"><div align=\"left\"><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">" . $file . "</font></div></td>";
				echo "<td><div align=\"center\"><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=\"template_edit.php?template=" . $file . "\">Edit</a></font></div></td>";
				echo "</tr>";
			} 
		}
		closedir($handle); 
	}
	echo "</table>";
}
ELSE
{
	echo "<table width=\"500\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"2\">";
	echo "<tr>";
    echo "<td><strong><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Template File</font></strong></td>";
    echo "<td width=\"50\"> <div align=\"center\"><strong><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Edit</font></strong></div></td>";
	echo "</tr>";
	IF ($handle = opendir("../templates/" . $_GET['template'])) {
		while (false !== ($file = readdir($handle))) { 
			IF ($file != "." && $file != "..") { 
				IF(eregi(".html", $file))
				{
					echo "<tr bgcolor=\"#F6F6F6\">";
					echo "<td bgcolor=\"#F6F6F6\"><div align=\"left\"><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">" . $file . "</font></div></td>";
					echo "<td><div align=\"center\"><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=\"template_edit2.php?path=" . $_GET['template'] . "/" . $file . "\">Edit</a></font></div></td>";
					echo "</tr>";
				}
			} 
		}
		closedir($handle); 
	}
	echo "</table>";
}
?>
<br> 
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
<span class="copyright">Copyright &copy; 2005<a href="http://www.ghostscripter.com" class="copyright" target="_blank"> GhostScripter.Com</a> All Rights Reserved.</span></td>
</tr>
</table>
<!--End bottom-->
</body>
</html>