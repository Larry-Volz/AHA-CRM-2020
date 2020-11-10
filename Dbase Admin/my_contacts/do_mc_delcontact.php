<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory


//do basic security check
$ahcDB->securityCheckBasic();


//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
$list_id=23; //code for 'delete a contact'

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "my_contacts";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement to delete the record
$sql = "DELETE FROM $table_name WHERE id = '$_POST[id]'";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

?>
<html>
<head>
<title>AHC Contacts:  Contact Deleted</title>
<meta name="Microsoft Border" content="r, default">
</head>
<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1>AHC Contacts</h1>
<h2><em>Delete a Contact - Contact Deleted</em></h2>

<p><? echo "$_POST[f_name] $_POST[l_name]"; ?> has been deleted from <? echo "$table_name"; ?></P>
<br><p><a href="contact_menu.php">Return to Main Menu</a></p>
<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>
</html>

