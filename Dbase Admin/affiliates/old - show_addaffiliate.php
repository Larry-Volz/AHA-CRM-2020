<?php
if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
}

?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>American Hypnosis Clinic Affiliates:  Add an Affiliate</title>

<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
<meta name="Microsoft Border" content="none, default">
</head>

<body>
<h1 align="left"><font color="#000080">AHC Affiliates</font><br>
<em>Add an Affiliate</em></h1>
<form method="post" action="do_addaffiliate.php">
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

<p><strong>Date Applied (YYYY-MM-DD):</strong><br />
<input type="text" name="date_applied" size=35 maxlength=100></p>

</TD>

<TD valign=top width="378">


<p><strong>Business Telephone:</strong><br />
<input type="text" name="prim_tel" size=35 maxlength=35></p>

<p><strong>Secondary Phone:</strong><br />
<input type="text" name="sec_tel" size=35 maxlength=35></p>

<p><strong>Fax:</strong><br />
<input type="text" name="fax" size=35 maxlength=35></p>

<p><strong>E-mail Address:</strong><br />
<input type="text" name="email" size=35 maxlength=100></p>


<p><strong>Certifications:</strong><br />
<input type="text" name="certifications" size=35 maxlength=100></p>

<p><strong>Issues Affiliate Works With:</strong><br />
<input type="text" name="issues" size=35 maxlength=100></p>

<p><strong>Education:</strong><br />
<input type="text" name="education" size=35 maxlength=100></p>

<p><strong>Years Experience:</strong><br />
<input type="text" name="experience" size=35 maxlength=75></p>

<strong>Professional Memberships:</strong><br />
<input type="text" name="organizations" size=10 maxlength=10></TD>

</tr>
<tr>
<td align=center colspan=2>
<p align="left">

<strong>Notes:</strong><br />
<textarea rows="6" name="notes" cols="90"></textarea></p>

<p><input type="submit" name="submit" value="Add Affiliate to System"></p>
<p><a href="affiliates_menu.php">Return to Main Menu</a></p>
</td>
</tr>

</table>


</form>
</body>

</html>