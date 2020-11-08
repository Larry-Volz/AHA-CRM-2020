<?php

//###################### SESSION SECURITY CHECK ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

IF ($auth !="ok"){
	header ("Location: index.htm");
	exit;
}

//------------------------------ end security check --------------------------



?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">


<title>AHC Intranet Home</title>
<base target="_self">
<meta name="description" content="Go to www.AmericanHypnosisClinic.com if you'd like to learn more about The American Hypnosis Clinic!">


<meta name="Microsoft Border" content="r, default">
</head>

<body topmargin="0"><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<p align="center">
<img border="0" src="People%20banner%201.jpg" width="658" height="85" longdesc="../AHC8 - drop down navigation/hypnosis, hypnotherapy, hypnotist, hypnosis to quit smoking, weight loss hypnosis, hypnosis to lose weight" alt="Successful American Hypnosis Clinic Clients.  Pictures of people who succeeded with hypnotherapy."></p>
<table border="0" width="100%" id="table1">
	<tr>
		<td width="325">
		<p align="center"><b><font size="4">Welcome to the new and improved <br>
		AHC Intranet!&nbsp; </font></b></p>
		<p><i>Okay... it may not seem &quot;improved&quot; yet... <br>
		This is a work in progress from your boss... the amateur &quot;wanna-be&quot; 
		computer programmer, but eventually it will enable us more flexibility 
		and options and a MUCH better accounting system - which is good for all 
		of us!</i></p>
		<p><i>Keep up the good work and please send any comments, thoughts, 
		questions or ideas about this site to me.</i></p>
		<p><i>Cheers,</i></p>
		<p><i>Larry</i><br>	
		

		<a href="mailto:larry@americanhypnosisclinic.com?subject=comments/questions from  intranet">
		larry@americanhypnosisclinic.com</a></p>
		
			&nbsp;</td>
	</tr>
</table>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
