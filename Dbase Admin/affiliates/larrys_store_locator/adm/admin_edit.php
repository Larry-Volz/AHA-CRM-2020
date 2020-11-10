<?php
require_once("../includes/config.php");
require_once("../includes/global_functions.php");
require_once("../includes/loggincheck.php");
require_once("class.menu.php");

db_connect($DBHost,$DBName,$DBUser,$DBPass);

$obj = new Menu();
$nav = $obj->get_js_menu(0);

IF(isset($_GET['id']))
{
	
	mysql_query("DELETE FROM admins WHERE admin_id='" . $_GET['id'] . "'");	log_action('Delete Admin');
	transfer('admin_edit.php','Delete Admin');
	exit;
}
?>

<html>
<head>
<title>Store Locator Admin Panel - Edit Admin</title>
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
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0"> 
  <tr> 
    <td width="100%" background="images/bg_top.gif" height="42"><img src="images/logo.gif" width="159" height="31" hspace="10"></td> 
  </tr> 
  <tr> 
    <td><img src="images/dot.gif" width="1" height="1" alt=""></td> 
  </tr> 
</table> 
<!--End top--> 
<!--Start topmenu--> 
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0"> 
  <tr> 
    <td bgcolor="#F0F0F0" height="25" style="padding-left:20px;" id="menu"> <SCRIPT language="JavaScript" type="text/javascript">
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
    <td class="heading">Edit Admin </td> 
  </tr> 
  <tr> 
    <td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td> 
  </tr> 
</table> 
<!--End heading page--> 
<form name="f1" method="post" action="admin_delete.php"> 
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F6F6F6" style="padding:15px;border:1px solid #CCCCCC;">
    <tr> 
     <td height="50" bgcolor="#F6F6F6"> 
     <div align="center"> 
      <br>
      <table width="100%"  border="0" cellspacing="0" cellpadding="4"> 
      <tr> 
          <td align="center" width="50" height="30" bgcolor="#0a9014"><div align="center">
            <input type="checkbox" name="selall" value="checkbox" onClick="checkBox(this)">
          </div></td> 
          <td bgcolor="#0a9014"><span class="style2"><strong>Admin Name</strong></span></td> 
       </tr> 
       <tr bgcolor="#000000"> 
          <td height="1" colspan="2"></td> 
        </tr> 
      <?php
	  
	
if (isset($_GET['pageno'])) {
   $pageno = $_GET['pageno'];
} else {
   $pageno = 1;
}
$rows_per_page = 15;
$count = 0;
$counter = 0;
//Pagination Continued
$query = "SELECT count(*) FROM `admins`";
$result = mysql_query($query);
$query_data = mysql_fetch_row($result);
$numrows = $query_data[0];
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

$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;


$query = "SELECT admin_id,admin_username FROM `admins` ORDER BY admin_id ".$limit;
$query_result = @mysql_query ($query);
while ($info = @mysql_fetch_array($query_result))
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
	echo "<tr height=\"20\" bgcolor=\"".$colour."\" class=\"style1\">";
	echo "<td align=\"center\" width=\"50\"><input type=\"checkbox\" name=\"list[]\" id=\"list[]\" value=\"". $info['admin_id'] ."\"></td>";
	echo "<td><div align=\"left\">" . $info['admin_username'] . "</div></td>";
	echo "</tr>";
}
?> 
      <tr bgcolor="#000000"> 
          <td height="1" colspan="2"></td> 
        </tr> 
    </table> 
    <br> 
	<table width="100%"  border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
              <td width="200" valign="middle">With Selected:&nbsp;<a href="#" onclick="document.f1.action='admin_editit.php'; document.f1.submit();"><img src="images/button_edit.gif" width="12" height="13" border="0"></a>
                  <input name="imageField" type="image" src="images/button_empty.gif" width="11" height="13" border="0"></td>
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
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=1&sortby=".$_GET['sortby']."&direction=".$_GET['direction']."&locale=".$_GET['locale']."'>&lt;&lt;</a> ";
   $prevpage = $pageno-1;
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage&sortby=".$_GET['sortby']."&direction=".$_GET['direction']."&locale=".$_GET['locale']."'>&lt;</a> ";
}
echo " ( Page $pageno of $lastpage ) ";

if ($pageno != $lastpage AND $numrows!=0) {
   $nextpage = $pageno+1;
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage&sortby=".$_GET['sortby']."&direction=".$_GET['direction']."&locale=".$_GET['locale']."'>&gt;</a> ";   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage&sortby=".$_GET['sortby']."&direction=".$_GET['direction']."&locale=".$_GET['locale']."'>&gt;&gt;</a> ";
}
?>
              </div></td>
            </tr>
          </table>
    </div> 
    </td> 
    </tr> 
  </table> 
</form> 
<br> 
<br> 
<!--Start bottom-->
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0"> 
  <tr> 
    <td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td> 
  </tr> 
  <tr> 
    <td style="padding:15px;" align="center"> <span class="copyright">Copyright &copy; 2005 <a href="http://www.ghostscripter.com" class="copyright" target="_blank">GhostScripter.Com</a> All Rights Reserved.</span></td> 
  </tr> 
</table> 
<!--End bottom--> 
</body>
</html>
