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
$list_id=17; //code for 'view affil by state' 

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

// ########################### CREATE TABLE WITH tableHelpers.php ########################
//TABLE HELPER include file
require_once('../../../FORMfields/tableHelpers.php');

//instantiate class
    $table2 = new TableSet();
    $table2->enableSort = true;

        
$table2->loadQuery("SELECT CONCAT('<a href=\"show_affiliate.php?id=',id,'\">','View','</a>') AS 'View',CONCAT('<a href=\"show_modaffiliate_getmethod.php?id=',id,'\">','Edit','</a>') AS 'Edit',address3 AS 'State',address2 AS 'City',ranking AS 'Stars',l_name AS 'Last Name',f_name AS 'First Name',company AS 'Company Name', prim_tel AS 'Phone', sec_tel AS 'Alt Phone',CONCAT('<a href=\"mailto:',email,'\">',email,'</a>') AS 'e-Mail', address1  AS 'Mailing address', address_physical as 'Physical Address', physical_city as 'Physical city', physical_state as 'Physical State',tax_id as 'Tax ID number' FROM affiliates WHERE membership_status='Affiliate' ORDER BY address3");




/* MY ORIGINAL MANUAL METHOD

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

$sql="SELECT id,f_name,l_name,company,address2,address3,ranking FROM $table_name WHERE membership_status = 'Affiliate' ORDER BY address3";

// var to hold result

$result=mysql_query($sql) or die(mysql_error());

//Create bulleted list of contacts
$contact_list="<table border=\"1\"><ul>";

	while ($row = mysql_fetch_array($result)){
    	$id=$row['id'];
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        $company=$row['company'];
        $address2=$row['address2'];
        $address3=$row['address3'];
        $ranking=$row['ranking'];


        // Notice how this next line passes a variable by using ?var=$var in the href!!!
        $contact_list .= "<tr><td><li>$address3 ($address2):</td><td><img src=\"$ranking stars.jpg\" width=\"70\" height=\"18\"><a href=\"show_affiliate.php?id=$id\">$f_name $l_name - $company</a></td></tr>";

    }//close the while loop
    $contact_list .= "</ul></table>";

*/
?>
<html>

<head>
  <title>American Hypnosis Clinic:  Active Affiliates Listed By State</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<link rel="stylesheet" type="text/css" href="../../../FORMfields/tableHelpers.css" />

<a href="affiliates_menu.php">Return to Main Menu</a>
<h1>ACTIVE Affiliates<br>
<i><font size="5" color="#000080">By State</font></i></h1>
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
