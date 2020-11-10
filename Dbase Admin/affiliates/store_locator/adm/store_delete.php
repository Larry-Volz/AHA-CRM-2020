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

	
		
	foreach ($_POST['list'] as $value) 
	{
	mysql_query("DELETE FROM stores WHERE id='" . $value . "'");
	mysql_query("DELETE FROM stores_custom WHERE store_id='" . $value . "'");
	
	}	log_action('Deleted Store');
	transfer('store_edit.php','Deleted Store');
	exit;
}
ELSE
{
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Store Locator Admin - Delete Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<td class="heading">Delete Category </td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<!--End heading page-->
<br>
<table align="center" width="850" border="0" cellpadding="0" cellspacing="0" bgcolor="#F6F6F6" style="border:1px solid #CCCCCC;">
    <tr>
      <td style="padding:15px;">
	  <table  border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>
<form action="" method="post">
<span class="style6"><span class="style7">Are you sure you want to delete the following categories?</span><br>
              </span><br>
<ul>
<? 
$count = 0;
$sql = "SELECT * FROM stores ";

foreach ($_POST['list'] as $value) 
{
	IF($count == 0)
	{
		$sql.= "WHERE id='" . $value . "'";
	}
	ELSE
	{
		$sql.= " OR id='" . $value . "'";
	}
	
	$count++;
} 
$sql.= " LIMIT " . count($_POST['list']);

$query_result = mysql_query($sql);
while ($info = @mysql_fetch_array($query_result))
{
	echo "<li>" .$info['area'] . "/" . $info['post_code_full'] . "</li>";
	echo "<input type=\"hidden\" name=\"list[]\" id=\"list[]\" value=\"" . $info['id'] . "\">";
}
?>
</ul>
                  <br>
                  <br>
                  <div align="center">
                    <input name="Submit" type="submit" class="button" id="Submit" value="Yes I'm Sure">
                </div>
</form>
</td>
</tr>
</table>
</td>
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
<?
}

?>