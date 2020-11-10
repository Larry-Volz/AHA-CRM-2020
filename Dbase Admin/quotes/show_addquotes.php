<?php

// ####################################### SECURITY ###########################################

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory


//do basic security check
$ahcDB->securityCheckBasic();

?>


<html>
<!-- ################################################ FORM ############################################-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>American Hypnosis Clinic Client Testimonial Management System:  Add a Contact</title>

<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1 align="left"><font color="#000080">AHC Client Testimonials Database </font><br>
<em>Add a Quote</em></h1>

<form method="post" action="do_addquote.php">

<table cellspacing=3 cellpadding=5 width="763">

<tr valign=middle>
<th width="356">
<p align="left">Quotes and Clients</th>
</tr>

<tr>
<TD valign=top width="356"><p><strong>First Name:</strong><br />
<input type="text" name="f_name" size=35 maxlength=75></p>

<p><strong>Last Name:</strong><br />
<input type="text" name="l_name" size=35 maxlength=75></p>


<p><strong>Caption:</strong><br />
<input type="text" name="caption" size=75 maxlength=100></p>

<p><strong>Quote:</strong><br />
<input type="text" name="quote" size=100 maxlength=500></p>

<p><strong>URL of Picture (if available):</strong><br />
<input type="text" name="picture_url" size=75 maxlength=100></p>

</TD>
</tr>
<tr>
<td align=center colspan=2>
<p align="left">

<strong>Notes:</strong><br />
<textarea rows="6" name="notes" cols="90"></textarea></p>
<p><input type="submit" name="submit" value="Add Quote"></p>
<p><a href="quotes_menu.php">Return to Main Menu</a></p>
</td>
</tr>

</table>


</form>
<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>