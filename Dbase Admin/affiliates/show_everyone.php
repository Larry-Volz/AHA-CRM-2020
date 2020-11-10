<?php
//Get my class and methods
include_once("../../ahcDatabase_class.php");


//do basic security check
$ahcDB->securityCheckBasic();

//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
$list_id=18; //code for 'show everyone'

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_AHC","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());

//###################################### QUERY ##########################################



// ########################### CREATE TABLE WITH tableHelpers.php ########################
//TABLE HELPER include file
require_once('../../../FORMfields/tableHelpers.php');

//instantiate class
    $table2 = new TableSet();
    $table2->enableSort = true;

        
$table2->loadQuery("SELECT CONCAT('<a href=\"show_affiliate.php?id=',id,'\">','View','</a>') AS 'View',CONCAT('<a href=\"show_modaffiliate_getmethod.php?id=',id,'\">','Edit','</a>') AS 'Edit',ranking AS 'Stars',l_name AS 'Last Name',f_name AS 'First Name',company AS 'Company Name', sales_stage AS 'Sales Stage', prim_tel AS 'Phone', sec_tel AS 'Alt Phone',CONCAT('<a href=\"mailto:',email,'\">',email,'</a>') AS 'e-Mail',address2 AS 'City', address3 AS 'State', address_physical as 'Physical Address', physical_city as 'Physical city', physical_state as 'Physical State',tax_id as 'Tax ID number',  CONCAT('<a href=\"verify_deleteaffiliate.php?id=',id,'\">','Delete','</a>') AS 'Delete' FROM affiliates ORDER BY l_name");




/*

$sql="SELECT * FROM $table_name ORDER BY l_name";

// var to hold result

$result=mysql_query($sql) or die(mysql_error());

//Create bulleted list of contacts
$contact_list="<table border=\"1\">";

	while ($row = mysql_fetch_array($result)){
    	$id=$row['id'];
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        $company=$row['company'];
        $address2=$row['address2'];
        $address3=$row['address3'];
        $ranking=$row['ranking'];
        $membership_status=$row['membership_status'];


        // Notice how this next line passes a variable by using ?var=$var in the href!!!
        $contact_list .= "<tr><td>$membership_status</td><td><a href=\"show_affiliate.php?id=$id\">$l_name, $f_name</a></td><td>$company</td></tr>";

    }//close the while loop
    $contact_list .= "</table>";

*/
?>
<html>

<head>
  <title>American Hypnosis Clinic:  Everyone in Affiliates DB</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<link rel="stylesheet" type="text/css" href="../../../FORMfields/tableHelpers.css" />
<a href="affiliates_menu.php">Return to Main Menu</a>
<h1>AHC Affiliates and Leads<br>
<i><font size="5" color="#000080">EVERYONE in Database</font></i></h1>
<p>Select an affiliate from the list below to view his or her record.</p>

	<?  
	//call method to make table and echo to browser
		echo $table2->getTableTag(); 
	?> 

<br><p><a href="affiliates_menu.php">Return to Main Menu</a></p>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
