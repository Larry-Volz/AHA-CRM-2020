<?php

//############################# SECURITY ##############################################

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
$list_id=24; //code for 'show contacts by company'

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

$sql="SELECT id,f_name,l_name,company FROM $table_name ORDER BY company";

// var to hold result

$result=mysql_query($sql) or die(mysql_error());

//counting variable for color of tables
$count_row=1;

//Create bulleted list of contacts
$contact_list = "<table border=\"1\" cellspacing=\"3\" cellpadding= \"3\">";

	while ($row = mysql_fetch_array($result)){
    	$id=$row['id'];
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        $company=$row['company'];
        
        //make every other one light blue
        $count_row++;
        if ($count_row%2==0){
		  $background = "bgcolor=\"#CCCCFF\"";
		}else{
		  $background = "bgcolor=\"#FFFFFF\"";
		}

        // Notice how this next line passes a variable by using ?var=$var in the href!!!

        $contact_list .= "<tr><td $background ><a href=\"show_mc_contact.php?id=$id\">$company ...</a></td><td $background ><a href=\"show_mc_contact.php?id=$id\">$f_name $l_name</a></td></tr>";

    }//close the while loop
    $contact_list .= "</table>";


?>
<html>

<head>
  <title>American Hypnosis Clinic:  Contacts Listed By Company</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1>AHC Contacts:  Listed By Company</h1>
<p>Select a contact from the list below to view the contact's record.</p>

<? echo "$contact_list"; ?>

<br><p><a href="contact_menu.php">Return to Main Menu</a></p>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>