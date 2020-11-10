<?php

?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>My Contact Management System:  Add a Contact</title>

<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1 align="left"><font color="#000080">AHC Business Contacts</font><br>
<em>Add a Contact</em></h1>
<form method="post" action="do_mc_addcontact.php">
<table cellspacing=3 cellpadding=5 width="763">
<tr valign=middle>
<th width="356">
<p align="left">NAME & ADDRESS INFORMATION</th>
<th width="378" align="left">ADDITIONAL INFORMATION</th>
</tr>
<tr>
<TD valign=top width="356"><p><strong>First Name:</strong><br />
<input type="text" name="f_name" size=35 maxlength=75></p>

<p><strong>Last Name:</strong><br />
<input type="text" name="l_name" size=35 maxlength=75></p>
<p><strong>Title:</strong><br />
<input type="text" name="title" size=35 maxlength=100></p>

<p><strong>Company:</strong><br />
<input type="text" name="company" size=35 maxlength=100></p>

<p><strong>Website:</strong><br />
<input type="text" name="website" size=35 maxlength=100></p>
<p><strong>Address:</strong><br />
<input type="text" name="address1" size=35 maxlength=100></p>

<p><strong>City:</strong><br />
<input type="text" name="address2" size=35 maxlength=100></p>

<p><strong>State:</strong><br />
<input type="text" name="address3" size=35 maxlength=100></p>

<p><strong>Zip:</strong><br />
<input type="text" name="postcode" size=35 maxlength=25></p>

<p><strong>Country:</strong><br />
<input type="text" name="country" size=35 maxlength=100></p>

</TD>

<TD valign=top width="378">


<p><strong>Business Telephone:</strong><br />
<input type="text" name="prim_tel" size=35 maxlength=35></p>

<p><strong>Home Phone:</strong><br />
<input type="text" name="sec_tel" size=35 maxlength=35></p>

<p><strong>Mobile Phone:</strong><br />
<input type="text" name="mob_tel" size=35 maxlength=35></p>
<p><strong>Fax:</strong><br />
<input type="text" name="fax" size=35 maxlength=35></p>

<p><strong>E-mail Address:</strong><br />
<input type="text" name="email" size=35 maxlength=100></p>


<p><strong>Home Address:</strong><br />
<input type="text" name="home_address1" size=35 maxlength=100></p>

<p><strong>Home City:</strong><br />
<input type="text" name="home_address2" size=35 maxlength=100></p>

<p><strong>Home State:</strong><br />
<input type="text" name="home_address3" size=35 maxlength=100></p>

<p><strong>Home zip:</strong><br />
<input type="text" name="home_postcode" size=35 maxlength=75></p>

<strong>Birthday (YYYY-MM-DD):</strong><br />
<input type="text" name="birthday" size=10 maxlength=10></TD>

</tr>
<tr>
<td align=center colspan=2>
<p align="left">

<strong>Notes:</strong><br />
<textarea rows="7" cols="97" name="notes" cols="90"></textarea></p>

<p><input type="submit" name="submit" value="Add Contact to System"></p>
<p><a href="contact_menu.php">Return to Main Menu</a></p>
</td>
</tr>

</table>


</form>
<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>