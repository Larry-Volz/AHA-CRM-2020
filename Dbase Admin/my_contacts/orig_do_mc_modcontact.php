<?php

// ################################# SECURITY #####################################
if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
}

//################################ CONNECT ########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "my_contacts";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//########################################## QUERY #################################################

$up_id = $_POST['id'];
$up_f_name=$_POST['f_name'];
$up_l_name=$_POST['l_name'];
$up_address1=$_POST['address1'];
$up_address2=$_POST['address2'];
$up_address3=$_POST['address3'];
$up_postcode=$_POST['postcode'];
$up_country=$_POST['country'];
$up_prim_tel=$_POST['prim_tel'];
$up_sec_tel=$_POST['sec_tel'];
$up_mob_tel=$_POST['mob_tel'];
$up_email=$_POST['email'];
$up_birthday=$_POST['birthday'];
$up_company=$_POST['company'];
$up_title=$_POST['company'];
$up_fax=$_POST['fax'];
$up_home_address1=$_POST['home_address1'];
$up_home_address2=$_POST['home_address2'];
$up_home_address3=$_POST['home_address3'];
$up_notes=$_POST['notes'];
$website=$_POST['website'];

$sql = "UPDATE $table_name set f_name='$up_f_name',l_name='$up_l_name',address1='$up_address1',
address2='$up_address2',address3='$up_address3]',postcode='$up_postcode',country='$up_country',
prim_tel='$up_prim_tel',sec_tel='$up_sec_tel',mob_tel='$up_mob_tel',email='$up_email',
birthday='$up_birthday',company='$up_company',title='$up_company',fax='$up_fax',
home_address1='$up_home_address1',home_address2='$up_home_address2',home_address3='$up_home_address3',
notes='$up_notes',website='$up_website' where id='$up_id'";

$result=mysql_query($sql) or die(mysql_error());



?>

<html>
<!-- ########################################### OUTPUT ###################################-->
<head>
  <title>AHC Contacts:  Update a Contact</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<h1>AHC Contacts:  Update a Contact</h1>
<h2><em>Modify a Contact - Contact Updated</em></h2>

<p>The following information was successfully added to <? echo "$table_name"; ?></p>

<table cellspacing=2 cellpadding=1>

<tr><td><? echo " $_POST['f_name'] "; ?></td></tr>
<tr><td><? echo " $_POST['l_name'] "; ?></td></tr>
<tr><td><? echo " $_POST[address1] "; ?></td></tr>
<tr><td><? echo " $_POST[address2] "; ?></td></tr>
<tr><td><? echo " $_POST[address3] "; ?></td></tr>
<tr><td><? echo " $_POST[postcode] "; ?></td></tr>
<tr><td><? echo " $_POST[country] "; ?></td></tr>
<tr><td><? echo " $_POST[prim_tel] "; ?></td></tr>
<tr><td><? echo " $_POST[sec_tel] "; ?></td></tr>
<tr><td><? echo " $_POST[mob_tel] "; ?></td></tr>
<tr><td><? echo " $_POST[email] "; ?></td></tr>
<tr><td><? echo " $_POST[birthday] "; ?></td></tr>
<tr><td><? echo " $_POST[company] "; ?></td></tr>
<tr><td><? echo " $_POST[title] "; ?></td></tr>
<tr><td><? echo " $_POST[fax] "; ?></td></tr>
<tr><td><? echo " $_POST[home_address1] "; ?></td></tr>
<tr><td><? echo " $_POST[home_address2] "; ?></td></tr>
<tr><td><? echo " $_POST[home_address3] "; ?></td></tr>
<tr><td><? echo " $_POST[home_postcode] "; ?></td></tr>
<tr><td><? echo " $_POST[website] "; ?></td></tr>
<tr><td><? echo " $_POST[notes] "; ?></td></tr>
<tr><td><a href="contact_menu.php">Return to Main Menu</a></td></tr>
</table>


<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>