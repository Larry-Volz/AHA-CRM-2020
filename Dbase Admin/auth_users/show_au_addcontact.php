<?php
if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
}

?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>American Hypnosis Clinic Members:  Add a Member</title>

<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1 align="left"><font color="#000080">American Hypnosis Clinic Members</font><br>
<h2>Employees and Affiliates</h2>
<em>Add a Member </em></h1>
<form method="post" action="do_au_addcontact.php">
<table cellspacing=3 cellpadding=5 width="716">
<tr valign=middle>
<th width="734" colspan="3">
<p align="left"><strong>Name: </strong>
<input type="text" name="f_name" size=28 maxlength=75><strong> </strong>
<input type="text" name="m_name" size=1 maxlength=75>
<input type="text" name="l_name" size=27 maxlength=75> 

<select size="1" name="suf_name">
	<option value="">suffix (opt.)</option>
	<option value="Jr.">Jr.</option>
	<option value="C.Ht.">C.Ht.</option>
	<option value="M.Ht.">M.Ht.</option>
	<option value="PhD">PhD</option>
	<option value="DCH">DCH</option>
	<option value="DC">DC</option>
	<option value="MD">M.D.</option>
	<option value="LCSW">LCSW</option>
	<option value="M.S.">M.S.</option>
	<option value="M.A.">M.A.</option>
	<option value="MSW">MSW</option>
	
</select> 

<select size="1" name="honorific">
	<option value="">suffix (opt.)</option>
	<option value="C.Ht.">C.Ht.</option>
	<option value="M.Ht.">M.Ht.</option>
	<option value="PhD">PhD</option>
	<option value="DCH">DCH</option>
	<option value="DC">DC</option>
	<option value="MD">M.D.</option>
	<option value="LCSW">LCSW</option>
	<option value="M.S.">M.S.</option>
	<option value="M.A.">M.A.</option>
	<option value="MSW">MSW</option>
	
</select></p></th>
</tr>
<tr>
<th width="734" colspan="3">
<p align="left"><hr>
<p align="left">Member Type <br>
<select size="1" name="member_type">
	<option value="">Select One</option>
	<option value="pc">Program Coordinator</option>
	<option value="therapist">Therapist (local employee)</option>
	<option value="affiliate">Affiliate Therapist</option>
	<option value="admin">Office Manager/Administrator</option>
</select></th>
</tr>
<tr valign=middle>
<th width="330" align="left" valign="top">
<p><strong>Home Phone:</strong><br />
<input type="text" name="sec_tel" size=35 maxlength=35><br>
<strong>Mobile Phone:</strong><br />
<input type="text" name="mob_tel" size=35 maxlength=35><strong><br>
Address:</strong><br />
<input type="text" name="address1" size=35 maxlength=100><strong><br>
City:</strong><br />
<input type="text" name="address2" size=35 maxlength=100><strong><br>
State and Zip:</strong><br />
<input type="text" name="address3" size=25 maxlength=100>
<input type="text" name="postcode" size=11 maxlength=25><br>
<strong>Country:</strong><br />
<input type="text" name="country" size=27 maxlength=100><strong>&nbsp;&nbsp; </strong></p></th>
<th width="398" align="left" valign="top" colspan="2">
<strong>Title:<br>
</strong>
<input type="text" name="title" size=35 maxlength=100><strong>&nbsp; <br>
Name of Clinic:</strong> <br>
<input type="text" name="company" size=35 maxlength=100><strong><br>
Website:</strong><br />
<input type="text" name="website" size=35 maxlength=100><strong><br>
Business Telephone and Extension:</strong><br />
<input type="text" name="prim_tel" size=35 maxlength=35>
<input type="text" name="ext_tel" size=8 maxlength=35><strong><br>
Fax:</strong><br />
<input type="text" name="fax" size=35 maxlength=35></th>
</tr>
<tr>
<TD valign=top width="728" colspan="3">

<hr></TD>

</tr>
<tr>
<TD valign=top width="330">

<p><strong>E-mail Address:</strong><br />
<input type="text" name="email" size=35 maxlength=100><strong><br>
Home Address:</strong><br />
<input type="text" name="home_address1" size=35 maxlength=100><strong><br>
Home City:</strong><br />
<input type="text" name="home_address2" size=35 maxlength=100><strong><br>
Home State:</strong><br />
<input type="text" name="home_address3" size=35 maxlength=100><strong><br>
Home zip:</strong><br />
<input type="text" name="home_postcode" size=35 maxlength=75></p>

</TD>

<TD valign=top width="398" colspan="2">


<p><strong>Secondary E-mail:</strong><br />
<input type="text" name="email2" size=35 maxlength=35><strong><br>
Birthday <font size="2">(YYYY-MM-DD)</font>:</strong><br />
<input type="text" name="birthday" size=19 maxlength=10><br>
<strong>Anniversary <font size="2">(YYYY-MM-DD)</font>:</strong><br />
<input type="text" name="anniversary" size=19 maxlength=10><br>
<strong>Favorite Gift Choices:</strong><br />
<input type="text" name="favorite_gifts" size=50 maxlength=35></p></TD>

</tr>
<tr>
<TD valign=top width="728" colspan="3">

<hr></TD>

</tr>
<tr>
<td align=center valign="top">
<p align="left"><font color="#000080"><i><b>Administrative Use Only</b>:</i></font><br>
<strong>Hire Date <font size="2">(YYYY-MM-DD)</font>:</strong><br />
<input type="text" name="hire_date" size=22 maxlength=10><br>
<strong>Termination Date <font size="2">(if appl.)</font>:</strong><br />
<input type="text" name="fire_date" size=22 maxlength=10></td>
<td align=center valign="top" width="167">
<p align="left"><strong><font color="#000080"><i>Employees Only:</i></font><br>
Starting Pay:</strong><br />
<input type="text" name="starting_pay" size=22 maxlength=10><br>
<strong>Current Pay:</strong><br />
<input type="text" name="current_pay" size=22 maxlength=10></td>
<td align=center valign="top" width="218">
<p align="left"><b><font color="#000080"><i>Sign-in</i></font></b><br>
<strong>Username:</strong><br />
<input type="text" name="username" size=22 maxlength=10><br>
<strong>Password:</strong><br />
<input type="text" name="password" size=22 maxlength=10></td>
</tr>

<tr>
<TD valign=top width="728" colspan="3">

<hr></TD>

</tr>

<tr>
<td align=center colspan=3>
<p align="left">

<strong>Notes:</strong><br />
<textarea rows="6" name="notes" cols="90"></textarea></p>

<p><input type="submit" name="submit" value="Add Contact to System"></p>
<p><a href="contact_menu.php">Return to Main Menu</a></p>
</td>
</tr>

</table>


</form>
<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>>