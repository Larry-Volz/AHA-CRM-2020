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



    
include "../../includes/mysql.inc.php";

$str = "";
$cdb = new class_mysql;
$sql="select date_created from affiliates";
$sql.=" WHERE date_created <> '' ";
$cdb->select($sql); 
if ( $cdb->GetRecords()>0 )
      $str = ", FROM_UNIXTIME(date_created,'%m-%d-%Y %h:%i')";
else 
      $str = ',NOW() ';

 



//instantiate class    
$table2 = new TableSet();
$table2->enableSort = true;          

        
$table2->loadQuery("SELECT CONCAT('<a href=\"show_affiliate.php?id=',id,'\">','View','</a>') AS 'View',CONCAT('<a href=\"show_modaffiliate_getmethod.php?id=',id,'\">','Edit','</a>') AS 'Edit' $str AS 'Date created',ranking AS 'Stars',l_name AS 'Last Name',f_name AS 'First Name',company AS 'Company Name', prim_tel AS 'Phone', sec_tel AS 'Alt Phone',CONCAT('<a href=\"mailto:',email,'\">',email,'</a>') AS 'e-Mail',address2 AS 'City', address3 AS 'State' , address1  AS 'Mailing address', address_physical as 'Physical Address' , physical_city as 'Physical city', physical_state as 'Physical State',tax_id as 'Tax ID number' FROM affiliates WHERE membership_status='Affiliate'  ORDER BY date_created");

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