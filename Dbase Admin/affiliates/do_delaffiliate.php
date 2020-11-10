<?php
//###################### SESSION SECURITY CHECK ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

IF ($auth !="ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/authenticate.htm");
	exit;
}

//------------------------------ end security check --------------------------

//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
$list_id=4; //code for 'delete affiliate' - PUT IN CORRECT CODE FOR PAGE!

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------



//################################## VARIABLES #############################

$id=$_POST['id'];

// create variable for name of database & ALL the tables
$db_name = "america2_AHC";

$table_name = array("affiliates_certifications_rel","affiliates_edu_rel","affiliates_issues_rel","affiliates_organizations_rel","affiliates_styles_rel");

/*$table_name = "affiliates";
$cert_rel_table_name = "affiliates_certifications_rel";
$edu_rel_table_name = "affiliates_edu_rel";
$issues_rel_table_name ="affiliates_issues_rel";
$org_rel_table_name = "affiliates_organizations_rel";
$styles_rel_table_name = "affiliates_styles_rel";  */

// ####################################### CONNECT #######################################

//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//################################ GET NAME OF THIS DELETE-EE ###############################
$affiliates="affiliates";
$get_names = "SELECT * FROM $affiliates WHERE id = '$_POST[id]'";
$names_result= mysql_query($get_names) or die(mysql_error());

// check for results
$num= mysql_num_rows($names_result);

if ($num <1){
	$display_block = "<p><em>Sorry!  No Results.</em></p>";
    }else{
    	while ($row = mysql_fetch_array($names_result)){
            $f_name = $row['f_name'];
            $l_name = $row['l_name'];
            }//close while loop
         }//END ELSE LOOP!!!


	    //create the sql statement to delete the record from the affiliates database
	    $sql = "DELETE FROM $affiliates WHERE id = '$id'";

	    //execute the sql statement and create a variable you can use to display or work with it
	    $result = mysql_query($sql) or die(mysql_error());

foreach ($table_name as $table){

	    //create the sql statement to delete the record from the affiliates database
	    $sql = "DELETE FROM $table WHERE affil_id = '$id'";

	    //execute the sql statement and create a variable you can use to display or work with it
	    $result = mysql_query($sql) or die(mysql_error());
 }//end foreach

/*//################################ DELETE IF ARRAY WORKS! #######################
//Now for the certifications DB...
$sql_cert = "DELETE FROM $cert_rel_table_name WHERE affil_id = '$_POST[id]'";
$result = mysql_query($sql) or die(mysql_error());
//Now for education DB...
 $sql_cert = "DELETE FROM $edu_rel_table_name WHERE affil_id = '$_POST[id]'";
 $result = mysql_query($sql) or die(mysql_error());
// Now for issues DB...
 $sql_cert = "DELETE FROM $issues_rel_table_name WHERE affil_id = '$_POST[id]'";
 $result = mysql_query($sql) or die(mysql_error());
// Now for orgs...
 $sql_cert = "DELETE FROM $org_rel_table_name WHERE affil_id = '$_POST[id]'";
 $result = mysql_query($sql) or die(mysql_error());
// Now for styles...
 $sql_cert = "DELETE FROM $styles_rel_table_name WHERE affil_id = '$_POST[id]'";
 $result = mysql_query($sql) or die(mysql_error());
 */


?>
<html>
<head>
<title>AHC Affiliates:  Affiliate Deleted</title>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
<meta name="Microsoft Border" content="none, default">
</head>
<body>
<h1>AHC Contacts</h1>
<h2><em>Delete an Affiliate:  Affiliate Deleted</em></h2>

<p><? echo "$f_name $l_name"; ?> has been deleted from <? echo "$table_name"; ?></P>
<br><p><a href="affiliates_menu.php">Return to Main Menu</a></p>
</body>
</html>