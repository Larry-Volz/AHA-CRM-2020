<?


// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "my_contacts";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement PICK EVERYTHING where id number matches
$sql = "SELECT * FROM my_contacts WHERE id = '$_POST[id]'";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());


while ($row = mysql_fetch_array($result)){
	$ud_id=$row['id'];
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
?>
<html>
<head>
<title>AHC Contacts: Modify a Contact</title>
<meta name="Microsoft Border" content="r, default">
</head>
<body bgcolor=""><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<form action="do_mc_modcontact.php" method="post">
<input name="ud_id" type="hidden" value="<? echo "$ud_id"; ?>
&lt;h1&gt;AHC Contacts:&nbsp; Modify a Contact&lt;/h1&gt;
&lt;h2&gt;&lt;span style=" font-weight: 400" ?>
<h1>AHC Contacts:&nbsp; Modify a Contact</h1>
<h2><span style="font-weight: 400"><i><font size="4">Click Submit to modify this individual's contact information.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Client ID#: <? echo "$ud_id"; ?>
</h2>

<table width="744" id="table1" border="1">
<tr>
<td colspan="2" bgcolor="#CCCCFF" align="center" width="100%">
<p align="center">

<input name="f_name" align="right" value="<? echo "$f_name "; ?>" size="25" style="float: left">
<input name="l_name" value="<? echo "$l_name "; ?>" size="35" style="float: left">
</td>
</tr>

<tr>
<td width="60%">
Title/Company<br>
<input type="text" name="title" value="<? echo "$title "; ?>" size="35">
<br>
<input type="text" name="company" value="<? echo "$company "; ?>" size="35">
<p>
<input type="text" name="website" value="<? echo "$website "; ?>" size="34">

<i>Website</i></p>
<p>Business
Address: <br>
<input type="text" name="address1" value="<? echo "$address1 "; ?>" size="56">
<br>
<input type="text" name="address2" value="<? echo "$address2 "; ?>">,
<input type="text" name="address3" value="<? echo "$address3 "; ?>" size="18">
<input type="text" name="postcode" value="<? echo "$postcode "; ?>" size="14"><br>
&nbsp;<input type="text" name="country" value="<? echo "$country "; ?>">
(Country)</td>
<td width="38%">
<p align="center">Telephone &amp; E-mail: </p>
<p align="center">Main:&nbsp;
&nbsp;<input type="text" name="prim_tel" value="<? echo "$prim_tel "; ?>">
<br>
Home:&nbsp;
<input type="text" name="sec_tel" value="<? echo "$sec_tel "; ?>">
<br>
Cell:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="mob_tel" value="<? echo "$mob_tel "; ?>">
<br>
Fax:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="fax" value="<? echo "$fax "; ?>">
<br>
E-mail:
<input type="text" name="email" value="<? echo "$email "; ?>">
</td>
</tr>

<tr>
<td width="60%">
&nbsp;</td>
<td width="38%">
<br>
&nbsp;</td>
</tr>

<tr>
<td width="60%">
Home Address: <br>
<input type="text" name="home_address1" value="<? echo "$home_address1 "; ?>" size="56"><br>
<input type="text" name="home_address2" value="<? echo "$home_address2 "; ?>">,
<input type="text" name="home_address3" value="<? echo "$home_address3 "; ?>" size="18">
<input type="text" name="home_postcode" size="14" value="<? echo "$home_postcode"; ?>" ?>"></td>
<td width="38%">
<p align="center">Birthday:
&nbsp;<input type="text" name="birthday" value="<? echo "$birthday "; ?>">
</td>
</tr>

<tr>
<td width="60%">
&nbsp;</td>
<td width="38%">
&nbsp;</td>
</tr>

<tr>
<td colspan=2 width="100%">
Notes: <br>
<textarea rows="7" cols="97" name="notes" size="96"><? echo "$notes "; ?></textarea>
</td>
</tr>
<tr>
<td colspan=2>
<p align="center">
<input type="Submit" value="Submit">
</td>
</tr>

</form>


</html>