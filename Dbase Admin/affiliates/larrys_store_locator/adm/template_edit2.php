<?
require_once("../includes/config.php");
require_once("../includes/global_functions.php");
require_once("../includes/loggincheck.php");
require_once("class.menu.php");

// Connect to database
db_connect($DBHost,$DBName,$DBUser,$DBPass);

$obj = new Menu();
$nav = $obj->get_js_menu(0);

IF(isset($_POST['html']))
{
	$_POST['html'] = stripslashes($_POST['html']);
	$_POST['html'] = str_replace('<base href="' . $site_url . '">', '', $_POST['html']);
	$_POST['file'] = "../templates/" . $_POST['path'];
	if (is_writable($_POST['file'])) {
		if (!$handle = fopen($_POST['file'], 'w')) {
			 error("Cannot open file");
		}
		if (!fwrite($handle, stripslashes($_POST['html']))) {
			error("Cannot write to file");
		}  
		fclose($handle);	
	} else {
		error("You must chmod the template files to 0777 before you can edit them via the web");
	}
	header("Location: msg.php?msg=" . urlencode("Succesfully edited template, <a class=\"style1\" href=\"template_edit.php\">click here to return</a>") . "&title=Edit Template");
	exit;
}
ELSE
{
	IF(!isset($_GET['type']))
	{
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
<td class="heading">Edit Templates</td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<br>
<!--End heading page-->
<form name="f" method="post" action="">
<table align="center" width="850" border="0" cellpadding="0" cellspacing="0" bgcolor="#F6F6F6" style="border:1px solid #CCCCCC;">
    <tr>
      <td height="50"><div align="center">
<table width="600" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr align="center"> 
    <td width="50%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="plain_text.php?path=<? echo $_GET['path'] ?>&type=plain">Plain-Text 
      Editor</a></font></td>
    <td width="50%"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="template_edit2.php?path=<? echo $_GET['path'] ?>&type=wysiwyg">WYSIWYG 
        Editor</a>&nbsp;(<a href="http://www.microsoft.com/ie" target="_new">ie 
        6+</a>)</font></div></td>
  </tr>
</table>
</div></td>
    </tr>
  </table>
</form>
<br><br>
<!--Start bottom-->
<table width="850" cellpadding="0" align="center" cellspacing="0" border="0">
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
<?
	exit;
	}
}

$template = "";
?>

<html>
<head>
<title>Edit Templates</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<script language="Javascript1.2"><!-- // load htmlarea
_editor_url = "../adm/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>
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
<td class="heading">Welcome to GhostLance Admin </td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<!--End heading page-->
  <table width="500"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><div align="center" class="title1">Edit Templates <br>
              <br>
      </div></td>
    </tr>
    <tr>
      <td height="50"><div align="center"><form method="POST" action="">
<textarea name="html" style="width:800; height:200"><base href="<? echo $site_url; ?>"><? echo htmlentities(implode('', file('../templates/' . $_GET['path']))); ?></textarea>
<script language="javascript1.2">
var config = new Object();    // create new config object

config.width = "800";
config.height = "300px";
config.bodyStyle = 'background-color: white; font-family: "Verdana"; font-size: x-small;';
config.debug = 0;

// NOTE:  You can remove any of these blocks and use the default config!

config.toolbar = [
	['Save'],
    ['fontname'],
    ['fontsize'],
    ['bold','italic','underline','separator'],
//  ['strikethrough','subscript','superscript','separator'],
    ['justifyleft','justifycenter','justifyright','separator'],
    ['forecolor','backcolor','separator'],
    ['HorizontalRule','Createlink','InsertImage','htmlmode','separator'],
    ['about','help','popupeditor'],
];

config.fontnames = {
    "Arial":           "arial, helvetica, sans-serif",
    "Courier New":     "courier new, courier, mono",
    "Georgia":         "Georgia, Times New Roman, Times, Serif",
    "Tahoma":          "Tahoma, Arial, Helvetica, sans-serif",
    "Times New Roman": "times new roman, times, serif",
    "Verdana":         "Verdana, Arial, Helvetica, sans-serif",
    "impact":          "impact",
    "WingDings":       "WingDings"
};
config.fontsizes = {
    "1 (8 pt)":  "1",
    "2 (10 pt)": "2",
    "3 (12 pt)": "3",
    "4 (14 pt)": "4",
    "5 (18 pt)": "5",
    "6 (24 pt)": "6",
    "7 (36 pt)": "7"
  };

//config.stylesheet = "http://www.domain.com/sample.css";
  
config.fontstyles = [   // make sure classNames are defined in the page the content is being display as well in or they won't work!
  { name: "headline",     className: "headline",  classStyle: "font-family: arial black, arial; font-size: 28px; letter-spacing: -2px;" },
  { name: "arial red",    className: "headline2", classStyle: "font-family: arial black, arial; font-size: 12px; letter-spacing: -2px; color:red" },
  { name: "verdana blue", className: "headline4", classStyle: "font-family: verdana; font-size: 18px; letter-spacing: -2px; color:blue" }

// leave classStyle blank if it's defined in config.stylesheet (above), like this:
//  { name: "verdana blue", className: "headline4", classStyle: "" }  
];

editor_generate('html',config);
</script>
<input type="hidden" name="path" value="<? echo $_GET['path']; ?>">
</form>
  </div></td>
    </tr>
  </table>
<br><br>
<!--Start bottom-->
<table width="850" cellpadding="0" cellspacing="0" border="0">
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
<tr>
<td style="padding:15px;" align="center">
<span class="copyright">Copyright &copy; 2004 <a href="http://www.ghostscripter.com" class="copyright" target="_blank">GhostScripter.Com</a> All Rights Reserved.</span></td>
</tr>
</table>
<!--End bottom-->
</body>
</html>