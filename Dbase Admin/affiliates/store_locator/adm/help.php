<?php
$subjects['1'] = 'What is the Admin Email?';
$messages['1'] = 'This is the email address that the contact and report emails will be sent to, aswell as being the from address in signup and notification emails.';

$subjects['2'] = 'What is the Database Host?';
$messages['2'] = 'This is the MySQL Host, generally this field is just localhost.';

$subjects['3'] = 'What is the Database Name?';
$messages['3'] = 'This is the MySQL database name, generally this is in the format username_database.';

$subjects['4'] = 'What is the Database Username?';
$messages['4'] = 'This is the MySQL database username, generally this is in the format username_database';

$subjects['5'] = 'What is the Database Password?';
$messages['5'] = 'This is the MySQL database password.';



$subject = $subjects[$_GET['id']];
$msg = $messages[$_GET['id']];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Help: <? echo $subject; ?></title>
<link rel="stylesheet" type="text/css" href="images/style.css">
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
<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr>
<td class="heading"><span class="style3"><? echo $subject; ?></span></td>
</tr>
<tr>
<td bgcolor="#333333"><img src="images/dot.gif" width="1" height="1" alt=""></td>
</tr>
</table>
<table width="500" height="200" border="0" cellpadding="4" cellspacing="0">
  <tr>
    <td valign="top"><span class="style3"><? echo $msg; ?></style></td>
  </tr>
  <tr>
    <td height="20" valign="top" class="style3"><div align="right">Need more help?<strong>&nbsp;<a href="http://www.ghostscripter.com/contact.php" target="_new">Just Ask </a></strong></div></td>
  </tr>
</table>
</body>
</html>