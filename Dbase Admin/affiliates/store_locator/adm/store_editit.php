<?php
require_once("../includes/config.php");
require_once("../includes/global_functions.php");
require_once("../includes/loggincheck.php");
require_once("class.menu.php");


db_connect($DBHost,$DBName,$DBUser,$DBPass);

$obj = new Menu();
$nav = $obj->get_js_menu(0);
$nav = $obj->get_js_menu(0);

IF(isset($_POST['Submit']))
{

	foreach ($_POST['id'] as $value) 
	{
		$_POST['zip'][$value] = strtoupper($_POST['zip'][$value]);
		
		// Remove punctuation marks
		$_POST['zip'][$value] = ereg_replace('[[:punct:]]', ' ', $_POST['zip'][$value]);
		
		// Remove Spaces
		$_POST['zip'][$value] = ereg_replace('[[:space:]]+', ' ', $_POST['zip'][$value]);
		
		IF(eregi('^(([A-Z][A-Z]?)([1-9]*[0-9A-HJ-RT-Y]?))|(BFPO) ?(([0-9]{1}[ABD-HJLNP-UW-Z]{1,2})|([0-9]{2}))$', $_POST['zip'][$value]))
		{
			IF(strlen($_POST['zip'][$value]) == 7)
			{
				$short = substr($_POST['zip'][$value], 0, 4);
			}
			ELSE
			{
				$short = substr($_POST['zip'][$value], 0, 3);
			}
		}
		ELSE
		{
			$short = $_POST['zip'][$value];
		}
		
		mysql_query("UPDATE `stores` SET `post_code` = '" . $short . "',`post_code_full` = '" . $_POST['zip'][$value] . "',`address` = '" . $_POST['address'][$value] . "',`area` = '" . $_POST['area'][$value] . "',`telephone` = '" . $_POST['telephone'][$value] . "' WHERE `id` = '" . $_POST['id'][$value] . "' LIMIT 1");
		
		IF(isset($_POST['custom']))
		{
		
			$custom = '';
		
			IF(count($_POST['custom'][$value]) == 1)
			{
				foreach ($_POST['custom'][$value] as $key => $value2) 
				{
					$custom.= "`" . $key . "` = '" . $value2 . "'";
				}
			}
			ELSE
			{
				$count = 0;
				foreach ($_POST['custom'][$value] as $key => $value2) 
				{
					$count++;
				
					IF($count == count($_POST['custom'][$value]))
					{
						$custom.= "`" . $key . "` = '" . $value2 . "'";
					}
					ELSE
					{
						$custom.= "`" . $key . "` = '" . $value2 . "', ";
					}
				}
			}
			
			mysql_query("UPDATE `stores_custom` SET " . $custom . " WHERE `store_id` = '" . $value . "' LIMIT 1 ;");
		
		}
	}	log_action('Edited Store');
	transfer('store_edit.php','Edited Store');
	exit;
}
?>
<html>
<head>
<title>Store Locator Admin Panel - Edit Store</title>
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
<td class="heading">Edit Store </td>
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



?>
	  <table width="500"  border="0" align="center" cellpadding="4" cellspacing="0">
        <tr>
          <td width="50%" valign="middle" class="style5"><strong>Post/Zip Code:</strong></td>
          <td><input type="hidden" name="id[<?= $info['id']; ?>]" id="id2" value="<?= $info['id']; ?>">
            <input name="zip[<?= $info['id']; ?>]" type="text" size="32" id="zip" value="<? echo $info['post_code_full']; ?>">
          </td>
        </tr>
        <tr>
          <td width="50%" valign="middle" class="style5"><strong>Town/Area:</strong></td>
          <td><input name="area[<?= $info['id']; ?>]" type="text" size="32" id="area" value="<? echo $info['area']; ?>">
          </td>
        </tr>
        <tr>
          <td width="50%" valign="top" class="style5"><strong>Full Address: </strong></td>
          <td valign="top">
            <textarea name="address[<?= $info['id']; ?>]" cols="24" rows="5" id="address"><? echo $info['address']; ?></textarea></td>
        </tr>
        <tr>
          <td valign="middle" class="style5"><strong>Telephone:</strong></td>
          <td valign="top">
            <input name="telephone[<?= $info['id']; ?>]" type="text" size="32" id="telephone" value="<? echo $info['telephone']; ?>"></td>
        </tr>
        <?
		
		$query2 = "SELECT * FROM `stores_custom` WHERE store_id='" . $info['id'] . "' LIMIT 1";
		$query_result2 = mysql_query ($query2);
		while ($info2 = mysql_fetch_array($query_result2))
		{
$fields = mysql_list_fields($DBName, "stores_custom");
$columns = mysql_num_fields($fields);

for ($i = 0; $i < $columns; $i++) {
	IF(mysql_field_name($fields, $i) != 'store_id')
	{
?>
        <tr>
          <td valign="middle" class="style5"><strong><? echo mysql_field_name($fields, $i); ?>:</strong></td>
          <td valign="top">
            <input value="<? echo $info2[mysql_field_name($fields, $i)]; ?>" name="custom[<?= $info['id']; ?>][<? echo mysql_field_name($fields, $i); ?>]" type="text" size="32" id="custom[<? echo mysql_field_name($fields, $i); ?>]"></td>
        </tr>
        <?
	}
}

}
?>
      </table>
	  <br><br><br>
<?

}
?>
      </td>
    </tr>
    <tr>
      <td height="50"><div align="center">
          <input type="submit" name="Submit" value="Edit Store">
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