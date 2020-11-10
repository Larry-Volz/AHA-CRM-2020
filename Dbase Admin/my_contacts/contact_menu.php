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
$list_id=20; //code for 'view contact menu'

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------



//################################ CONNECT ########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "my_contacts";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//########################################## QUERY #################################################

$sql = "SELECT count(id) FROM $table_name";
$result=mysql_query($sql,$connection) or die(mysql_error());

$count = mysql_result($result,0,"count(id)") or die(mysql_error());

//############ TODAY'S DATE ###################
$today = date("l, F jS, Y");

//############## BIRTHDAY CHECK ##################
// Get # of people with birthdays in current month
$get_birthday_count = "select count(id) from $table_name where MONTH(birthday) = MONTH(NOW())";
//Do query and hold result in birthday_count_res
$birthday_count_res = mysql_query($get_birthday_count) or die(mysql_error());
//create var to hold result
$birthday_count = mysql_result($birthday_count_res, 0, "count(id)");

if ($birthday_count > 0){
	$bd_string="<ul>";
    $get_contacts_bd = "SELECT id, f_name, l_name,
    MONTH(birthday) as month, DAYOFMONTH(birthday) as date
    FROM $table_name WHERE
    MONTH(birthday) = MONTH(NOW()) ORDER BY birthday";

	$contacts_bd_res = @mysql_query($get_contacts_bd) or die(mysql_error());
    	while ($contacts_bd = mysql_fetch_array($contacts_bd_res)){
        	$contact_id = $contacts_bd['id'];
        	$contact_fname = $contacts_bd['f_name'];
        	$contact_lname = $contacts_bd['l_name'];
        	$contact_bd_month = $contacts_bd['month'];
        	$contact_bd_date = $contacts_bd['date'];

            $bd_string .= "<li><a href=\"show_contact.php?id=$contact_id\">$contact_fname
            $contact_lname</a> ($contact_bd_month"."-"."$contact_bd_date)";

        }//close while loop
        $bd_string .= "</ul>";
    }//close if statement




?>

<html>
<!-- ################################## OUTPUT & HYPERLINKS ####################################-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>AHC Contacts: Main Menu</title>

<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<h1>AHC Contacts:  Main Menu</h1>
<p><em>Today is <? echo" $today "; ?></em></p>
<table cellspacing=3 cellpadding=3>
<tr>
<td valign=top>
<p><strong>Administration</strong>
<ul>
<li><a href="show_mc_addcontact.php">Add a Contact</a>
<li><a href="pick_mc_modcontact.php">Modify a Contact</a>

</ul>
<p><strong>View Records</strong>
<ul>
<li><a href="show_mc_contactsbyname.php">Show Contacts, Ordered by Name</a>
<li><a href="show_mc_contactsbycompany.php">Show Contacts, Ordered by Company</a>
</ul>
<br><br>
<li><a href="pick_mc_delcontact.php">Delete a contact</a>
</td>
<td valign=top>
<p><strong>Miscellaneous</strong></p>
<ul>
<li>Contacts in System: <strong><? echo "$count"; ?></strong></li>
<li>Birthdays this Month:<strong><? echo "$birthday_count" ?></strong><br>
<? echo"$bd_string"; ?></li>
</ul>
</td>
</tr>
</table>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>