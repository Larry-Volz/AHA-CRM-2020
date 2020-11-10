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
$list_id=26; //code for 'view contacts by lname'

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------


//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "my_contacts";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());

//###################################### QUERY ##########################################

$sql="SELECT id,f_name,l_name,prim_tel,email,company FROM $table_name ORDER BY l_name";

// var to hold result

$result=mysql_query($sql) or die(mysql_error());

//Create bulleted list of contacts
$contact_list="<table border = \"1\">";

	while ($row = mysql_fetch_array($result)){
    	$id=$row['id'];
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        $prim_tel=$row['prim_tel'];
        $email=$row['email'];	
        $company=$row['company'];			        

        // Notice how this next line passes a variable by using ?var=$var in the href!!!
        $contact_list .= "<tr><td><a href=\"show_mc_contact.php?id=$id\">$l_name, $f_name</a></td><td>$company</td><td>$prim_tel</td><td>$email</td><tr>";

    }//close the while loop
    $contact_list .= "</table>";


?>
<html>

<head>
  <title>American Hypnosis Clinic:  Contacts Listed By Name</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1>AHC Contacts:  Listed By Name</h1>
<p>Select a contact from the list below to view the contact's record.</p>

<? echo "$contact_list"; ?>

<br><p><a href="contact_menu.php">Return to Main Menu</a></p>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>