<?php
//###################### SESSION SECURITY CHECK ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

IF ($auth !="ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/authenticate.htm");
	exit;
}

//------------------------------ end security check --------------------------

?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>New Page 1</title>
<meta name="Microsoft Border" content="r, default">
</head>

<frameset cols="33%,*">
	<frame name="left" src="knowledgebase_files/knowledgebase_left.htm" target="right">
	<frame name="right" src="knowledgebase_files/blank_knowledgbase_file.htm">
	<noframes>
	<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

	<p>This page uses frames, but your browser doesn't support them.</p>

	<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>
	</noframes>
</frameset>

</html>
