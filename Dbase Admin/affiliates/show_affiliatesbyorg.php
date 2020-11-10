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
$list_id=15; //code for 'view affiliates by lname' - PUT IN CORRECT CODE FOR PAGE!

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------


// ########################### CREATE TABLE WITH tableHelpers.php ########################
//TABLE HELPER include file
require_once('../../../FORMfields/tableHelpers.php');

//instantiate class
    $table2 = new TableSet();
    $table2->enableSort = true;

        
$table2->loadQuery("SELECT CONCAT('<a href=\"show_affiliate.php?id=',id,'\">','View','</a>') AS 'View',CONCAT('<a href=\"show_modaffiliate_getmethod.php?id=',id,'\">','Edit','</a>') AS 'Edit',company AS 'Company Name',ranking AS 'Stars',l_name AS 'Last Name',f_name AS 'First Name', prim_tel AS 'Phone', sec_tel AS 'Alt Phone',CONCAT('<a href=\"mailto:',email,'\">',email,'</a>') AS 'e-Mail',address2 AS 'City', address3 AS 'State' , address1 AS 'Mailing address', address_physical as 'Physical Address', physical_city as 'Physical city', physical_state as 'Physical State',tax_id as 'Tax ID number' FROM affiliates WHERE membership_status='Affiliate' ORDER BY company");



/*  MY MANUAL METHOD - PRETTY DAMNED GOOD FOR A BEGINNER!!!

//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());

//###################################### QUERY ##########################################

$sql="SELECT id,f_name,l_name,company,address2,address3 FROM $table_name WHERE membership_status = 'Affiliate' ORDER BY l_name";

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


        // Notice how this next line passes a variable by using ?var=$var in the href!!!
        $contact_list .= "<tr><td><a href=\"show_affiliate.php?id=$id\">$l_name, $f_name</td><td>$company</a></td><td>$address2, $address3</td></tr>";

    }//close the while loop
    $contact_list .= "</table>";

*/
?>
<html>

<head>
  <title>American Hypnosis Clinic:  Affiliates Listed By Name</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<link rel="stylesheet" type="text/css" href="../../../FORMfields/tableHelpers.css" />

<a href="affiliates_menu.php">Return to Main Menu</a>
<h1>ACTIVE Affiliates</h1>
<hr><br>
<!-- <font size="5" color="#000080">By Name</font> -->
<p><i>Select an affiliate from the list below to view or edit his or her record.  Click the top of the column to sort by that category.  <br>Click a second time to reverse the order.  Click an e-mail address to e-mail this affiliate.</i></p>

	<?  
	//call method to make table and echo to browser
		echo $table2->getTableTag(); 
	?> 

<br><p><a href="affiliates_menu.php">Return to Main Menu</a></p>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
