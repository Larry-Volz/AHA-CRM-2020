<?php 
require_once("../includes/config.php");
require_once("../includes/global_functions.php");
require_once("../includes/loggincheck.php");
require_once("class.menu.php");



// Connect to database
db_connect($DBHost,$DBName,$DBUser,$DBPass);

$obj = new Menu();
$nav = $obj->get_js_menu(0);


IF(isset($_POST['template']))
{
		$handle = fopen('../includes/config.php', 'w');

		fwrite($handle, "<?php\r\n");
		fwrite($handle, "// Database Host\n");
		fwrite($handle, "\$DBHost = '" . $DBHost . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Database Name\n");
		fwrite($handle, "\$DBName = '" . $DBName . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Database Username\n");
		fwrite($handle, "\$DBUser = '" . $DBUser . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Database Password\n");
		fwrite($handle, "\$DBPass = '" . $DBPass . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Radius in which a store can be counted as nearby\n");
		fwrite($handle, "\$store_radius = '20';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Admin Email Address\n");
		fwrite($handle, "\$admin_email = '" . $admin_email . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Template Folder Name\n");
		fwrite($handle, "\$tpl_name = '" . $_POST['template'] . "';\n");		
		fwrite($handle, "\n");
		fwrite($handle,"DEFINE('IS_INSTALLED', 1);\n");
	    fwrite($handle, "?>");
        fclose($handle);
		
	
		fclose($handle);
		
		log_action('Template Changed');
		transfer('templates.php','Template Changed');
		exit;
}
?>

<html>
<head>
<title>Template Settings</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php
	echo '<SCRIPT LANGUAGE="JavaScript">';
	echo "\n";
	echo '  var img=new Array();';
	echo "\n";
	if ($handle = opendir('../templates/')) {
	   while (false !== ($file = readdir($handle))) { 
		   if ($file != "." && $file != "..") { 
				echo 'img["' . $file . '"]="../templates/' . $file . '/images/sshot.gif";';
				echo "\n";
		   } 
	   }
	   closedir($handle); 
	}
?>
	
	function swap(type){
	document.getElementById("imgMain").src=img[type];
	var sel=document.shoeFrm.shoeSel;
	for(i=0;i<sel.length;i++){if(sel.options[i].text==type){sel.selectedIndex=i;}}
	}
</script>

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
<td class="heading">Template Settings </td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<br>
<!--End heading page-->
<form name="form1" method="post" action="">
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F6F6F6" style="border:1px solid #CCCCCC;">
    <tr>
      <td><div align="center" class="title1"><br>

          <table width="500" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="../templates/<? echo $tpl_name; ?>/images/sshot.gif" name="imgMain" width="500" height="250" border="1" id="imgMain"></td>
            </tr>
            <tr>
              <td height="40"><select name="template" style="width:340px;" onchange="swap(this.options[selectedIndex].text);">
			  <?php
if ($handle = opendir('../templates/')) {
   while (false !== ($file = readdir($handle))) { 
       if ($file != "." && $file != "..") { 
	   		IF($file == $tpl_name)
			{
				echo "<option selected>" . $file . "</option>"; 
			}
			ELSE
			{
				echo "<option>" . $file . "</option>"; 
			}
       } 
   }
   closedir($handle); 
}
?>
              </select>
              <input type="submit" name="Submit2" value="Activate" style="width:150px;"></td>
            </tr>
          </table>
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
