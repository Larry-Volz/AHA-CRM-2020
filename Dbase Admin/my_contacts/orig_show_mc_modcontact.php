<?
/*if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
} */

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "all_clients";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement PICK EVERYTHING where id number matches
$sql = "SELECT * FROM `my_contacts` WHERE id = '$_POST[id]'";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());


while ($row = mysql_fetch_array($result)){
	$f_name = $row['f_name'];
	$l_name = $row['l_name'];
	$address1 = $row['address1'];
	$address2 = $row['address2'];
	$address3 = $row['address3'];
	$postcode = $row['postcode'];
	$country = $row['country'];
	$prim_tel = $row['prim_tel'];
	$sec_tel = $row['sec_tel'];
	$mob_tel = $row['mob_tel'];
	$email = $row['email'];
	$birthday = $row['birthday'];
	$company = $row['company'];
	$title = $row['title'];
	$fax = $row['fax'];
	$home_address1 = $row['home_address1'];
	$home_address2 = $row['home_address2'];
	$home_address3 = $row['home_address3'];
	$home_postcode = $row['home_postcode'];
	$notes = $row['notes'];
	$website = $row['website'];
}
/*##################### COMMENTED OUT ####################################################

######################################################################################### */
?>



<html>

<head>

<title>AHC Contacts:  Modify a Contact</title>


<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<h1>AHC Contacts</h1>
<h2>Modify a Contact</h2>


<form method="post" action="orig_do_mc_modcontact.php">

<input type="hidden" name="id" value="<? 'echo $post[id]'; ?> ">

<table cellspacing=3 cellpadding=5 width="763">
<tr valign = "middle">
<th width = "356">
<p align="left">NAME & ADDRESS INFORMATION</th>
<th width="378" align="left">ADDITIONAL INFORMATION</th>
</tr>
<tr>
<TD valign=top width="356"><p><strong>First Name:</strong><br />
<input type="text" name="f_name" value="<? echo " $f_name "; ?>" size="35" maxlength="75"></p>

<p><strong>Last Name:</strong><br />
<input type="text" name="l_name" value="<? echo "$l_name"; ?>" size="35" maxlength="75" ?>" size="35" maxlength="75" ?>" size="35" maxlength="75" ?>" size="35" maxlength="75" ?>" size="35" maxlength="75" ?>" size="35" maxlength="75" ?>" size="35" maxlength="75"></p>
<p><strong>Title:</strong><br />
<input type="text" name="title" value="<? echo "$title"; ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100"></p>
<p><strong>Company:</strong><br />
<input type="text" name="company" value="<? echo "$company"; ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100"></p>
<p><strong>Website:</strong><br />
<input type="text" name="website" value="<? echo "$website"; ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100" ?>" size="35" maxlength="100"></p>
<p><strong>Address:</strong><br />
<input type="text" name="address1" value="<? echo "$address1 "; ?>"  size =35 maxlength=100></p>

<p><strong>City:</strong><br />
<input type="text" name="address2" value="<? echo "$address2 "; ?>"  size =35 maxlength=100></p>

<p><strong>State:</strong><br />
<input type="text" name="address3" value="<? echo "$address3 "; ?>"  size =35 maxlength=100></p>

<p><strong>Zip:</strong><br />
<input type="text" name="postcode" value="<? echo "$postcode "; ?>"  size =35 maxlength=25></p>

<p><strong>Country:</strong><br />
<input type="text" name="country" value="<? echo "$country "; ?>"  size =35 maxlength=100></p>

</TD>

<TD valign=top width="378">


<p><strong>Business Telephone:</strong><br />
<input type="text" name="prim_tel" value="<? echo "$prim_tel "; ?>"  size =35 maxlength=35></p>

<p><strong>Home Phone:</strong><br />
<input type="text" name="sec_tel" value="<? echo "$sec_tel"; ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ></p>

<p><strong>Mobile Phone:</strong><br />
<input type="text" name="mob_tel" value="<? echo "$mob_tel"; ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ?>" size="35" maxlength="35" ></p>
<p><strong>Fax:</strong><br />
<input type="text" name="fax" value="<? echo "$fax "; ?>"  size =35 maxlength=35></p>

<p><strong>E-mail Address:</strong><br />
<input type="text" name="email" value="<? echo "$email "; ?>"  size =35 maxlength=100></p>


<p><strong>Home Address:</strong><br />
<input type="text" name="home_address1" value="<? echo "$home_address1 "; ?>"  size =35 maxlength=100></p>

<p><strong>Home City:</strong><br />
<input type="text" name="home_address2" value="<? echo "$home_address2 "; ?>"  size =35 maxlength=100></p>

<p><strong>Home State:</strong><br />
<input type="text" name="home_address3" value="<? echo "$home_address3 "; ?>"  size =35 maxlength=100></p>

<p><strong>Home zip:</strong><br />
<input type="text" name="home_postcode" value="<? echo "$home_postcode "; ?>"  size =35 maxlength=75></p>

<strong>Birthday (YYYY-MM-DD):</strong><br />
<input type="text" name="birthday" value="<? echo "$birthday "; ?>"  size =10 maxlength=10></TD>

</tr>
<tr>
<td align=center colspan=2>
<p align="left">

<strong>Notes:</strong><br />
<textarea rows="6" name="notes" cols="90" value = "<? echo "$notes"; ?>" ?>" ?>" ?>" ?>" ?>"></textarea>

<p><input type="submit" name="submit" value="Modify Contact"></p>
<p><a href="contact_menu.php">Return to Main Menu</a></p>
</td>
</tr>

</table>


</form>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>