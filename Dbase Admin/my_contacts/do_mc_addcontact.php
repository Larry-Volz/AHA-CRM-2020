<?
//if no entry made...
if ((!$_POST[f_name])&&(!$_POST[company]))
{
	header( "Location: show_mc_addcontact.php");
    exit;
}//end check if data entered block

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory


//do basic security check
$ahcDB->securityCheckBasic();


//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
$list_id=21; //code for 'add a contact'

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------


// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "my_contacts";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// SELECT DB - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement  first () does names in order and 2nd () sends strings
$sql = "INSERT INTO $table_name
(id, f_name, l_name, address1, address2, address3, postcode, country, prim_tel, sec_tel, mob_tel, email,
birthday, company, title, fax, home_address1, home_address2, home_address3, home_postcode, notes,
website) VALUES ('', '$_POST[f_name]', '$_POST[l_name]', '$_POST[address1]', '$_POST[address2]',
'$_POST[address3]','$_POST[postcode]','$_POST[country]','$_POST[prim_tel]','$_POST[sec_tel]',
'$_POST[mob_tel]','$_POST[email]', '$_POST[birthday]','$_POST[company]','$_POST[title]', '$_POST[fax]',
'$_POST[home_address1]','$_POST[home_address2]','$_POST[home_address3]', '$_POST[home_postcode]',
'$_POST[notes]','$_POST[website]')";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Contact Added</title>


<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1>AHC Contacts</h1>
<h2><em>Add a Contact:  CONTACT ADDED</em></h2>

<p>The following information was successfully added to <? echo "$table_name"; ?></p>

<table cellspacing=2 cellpadding=1>

<tr><td><? echo " $_POST[f_name] "; ?></td></tr>
<tr><td><? echo " $_POST[l_name] "; ?></td></tr>
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
<tr><td><a href="contact_menu.php">Return to Main Menu</a>  <a href="show_mc_addcontact.php">Add Another</a></td></tr>
</table>


<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>