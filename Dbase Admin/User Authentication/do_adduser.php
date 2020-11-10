<?
//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory
include "../../includes/mysql.inc.php";  
$DB=new class_mysql;  

$sql=" select PASSWORD('test') as passtest";
$DB->select($sql); 
$pass_gen=$DB->FetchArray;
settype($pass_funct,"string");

if  (strlen(trim($pass_gen['passtest']))>16) $pass_funct = "OLD_PASSWORD";
else                                         $pass_funct ="PASSWORD"; 

//do basic security check
//$ahcDB->securityCheckBasic();


//########## IF NOT HIGH ENOUGH PERMISSION FOR THIS PARTICULAR PAGE #################
/*

$permission = $_SESSION[permission];

if ($permission !="god"){ // |$permission="PC"|$permission="mgr"... etc.
	header ("Location: http://www.americanhypnosisclinic.com/intranet/Dbase Admin/User Authentication/no_permission.htm");
	exit;	
}
*/

//#################### make sure all 5 fields were entered or return to input form ####################

if ((!$_POST[f_name])||(!$_POST[l_name])||(!$_POST[username])||(!$_POST[password])||(!$_POST[permissions])||(!$_POST[email])){ 
	header( "Location: show_adduser.htm");
	exit;
}

include_once("../../ahcDatabase_class.php");

//CONNECT TO DB
$ahcDB->dbConnect();

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "auth_users";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// SELECT DATABASE and create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "INSERT INTO $table_name (f_name, l_name, username, email, password, member_type) 
		VALUES ('$_POST[f_name]', '$_POST[l_name]', '$_POST[username]', '$_POST[email]', ".$pass_funct."('$_POST[password]'),
		'$_POST[permissions]')";
        
$DB->insert($sql);         

//execute the sql statement and create a variable you can use to display or work with it

?>

<html><head><title>Add a User</title>
<meta name="Microsoft Border" content="r, default">
<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top"><h1>Added to auth_users:</h1>

<p><strong>First Name:</strong><br />
<? echo "$_POST[f_name]"; ?></p>

<p><strong>Last Name:</strong><br />
<? echo "$_POST[l_name]"; ?></p>

<p><strong>Last Name:</strong><br />
<? echo "$_POST[email]"; ?></p>

<p><strong>Username:</strong><br />
<? echo "$_POST[username]"; ?></p>

<p><strong>Password:</strong><br />
<? echo "$_POST[password]"; ?></p>

<p><strong>Permissions:</strong><br />
<? echo "$_POST[permissions]"; ?></p>

<p><a href="show_adduser.htm">Add Another</a></p>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body></head></html>
