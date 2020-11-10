<?
require_once("../includes/config.php");
require_once("../includes/global_functions.php");
require_once("../includes/loggincheck.php");
require_once("class.menu.php");


db_connect($DBHost,$DBName,$DBUser,$DBPass);

$obj = new Menu();
$nav = $obj->get_js_menu(0);
?>
<html>
<head>
<title>Store Locator Admin Panel - Edit Custom Field</title>
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
<td class="heading">Edit Custom Fields </td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<br>
<!--End heading page-->

<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F6F6F6" style="padding:15px;border:1px solid #CCCCCC;">
    <tr>
      <td></td>
    </tr>
    <tr>
      <td height="50"><form name="f2" method="post" action="custom_delete.php"><div align="center">
        <table width="100%"  border="0" cellpadding="0" cellspacing="0" class="style5">
<tr bgcolor="#FF9900">
              <td width="50" height="30" bgcolor="#0a9014"><div align="center">
                <input type="checkbox" name="selall" value="checkbox" onClick="checkBox(this)">
              </div></td>
                  <td bgcolor="#0a9014"><span class="style2"><strong>Field Name </strong></span></td>
          </tr>
				<tr bgcolor="#000000">
        <td height="1" colspan="2"></td>
      </tr>
<?php





$fields = mysql_list_fields($DBName, "stores_custom");
$columns = mysql_num_fields($fields);
if (isset($_GET['pageno2'])) {
   $pageno = $_GET['pageno2'];
} else {
   $pageno = 1;
}
$rows_per_page = 15;
$count = 0;
$counter = 0;
//Pagination Continued

$numrows = $columns-1;
if($numrows==""){
	$numrows=0;
}

$lastpage = ceil($numrows/$rows_per_page);

$pageno = (int)$pageno;

if ($pageno < 1) {
   $pageno = 1;
} elseif ($pageno > $lastpage) {
   $pageno = $lastpage;
}

for ($i = 0; $i < $columns; $i++) {
	IF(mysql_field_name($fields, $i) != 'store_id')
	{
$counter++;
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
	echo "<tr height=\"20\" class=\"style1\" bgcolor=\"".$colour."\">";
	echo "<td width=\"50\" height=\"25\" align=\"center\"><input type=\"checkbox\" name=\"list[]\" id=\"list[]\" value=\"". mysql_field_name($fields, $i) ."\"></td>";
	echo "<td><div align=\"left\">" . mysql_field_name($fields, $i) . "</div></td>";
	echo "</tr>";
	}
}
?>
        
						<tr bgcolor="#000000">
        <td height="1" colspan="2"></td>
      </tr></table>
		<table width="100%"  border="0" align="center" cellpadding="2" cellspacing="0">
          <tr>
            <td width="200" valign="middle">With Selected:&nbsp;
              <input name="imageField2" type="image" src="images/button_empty.gif" width="11" height="13" border="0"></td>
            <td valign="middle"><?
if($numrows==0){
	$st=0;
	$en=0;
}elseif($lastpage==$pageno){
	$st=$numrows-$counter+1;
	$en=$numrows;
}else{
	$st=$counter*$pageno-$rows_per_page+1;
	$en=$counter*$pageno;
}
?>
                <div align="center">Showing <? echo $st ?>-<? echo $en; ?> of <? echo $numrows; ?> result(s)</div></td>
            <td width="200" valign="middle"><div align="right">
                <?
if ($pageno != 1 AND $numrows!=0) {
   echo " <a href='{$_SERVER['PHP_SELF']}?pid=".$_GET['pid']."&pageno2=1&sortby=".$_GET['sortby']."&direction=".$_GET['direction']."&locale=".$_GET['locale']."'>&lt;&lt;</a> ";
   $prevpage = $pageno-1;
   echo " <a href='{$_SERVER['PHP_SELF']}?pid=".$_GET['pid']."&pageno2=$prevpage&sortby=".$_GET['sortby']."&direction=".$_GET['direction']."&locale=".$_GET['locale']."'>&lt;</a> ";
}
echo " ( Page $pageno of $lastpage ) ";

if ($pageno != $lastpage AND $numrows!=0) {
   $nextpage = $pageno+1;
   echo " <a href='{$_SERVER['PHP_SELF']}?pid=".$_GET['pid']."&pageno2=$nextpage&sortby=".$_GET['sortby']."&direction=".$_GET['direction']."&locale=".$_GET['locale']."'>&gt;</a> ";   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage&sortby=".$_GET['sortby']."&direction=".$_GET['direction']."&locale=".$_GET['locale']."'>&gt;&gt;</a> ";
}
?>
            </div></td>
          </tr>
        </table>
		<br>

          </div></form></td>
    </tr>
</table>

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