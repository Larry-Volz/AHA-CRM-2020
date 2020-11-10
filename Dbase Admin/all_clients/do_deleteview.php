<?

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do include files
include_once("../../includes/classes_all_clients.php");


//connect to db
$acIncludes->dbConnect();

//do basic security check
$ahcDB->securityCheckBasic();

//start session
session_start();

//############################## DO LOG ENTRY ##############################################

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
//$list_id=30; //code for 'add a person' - PUT IN CORRECT CODE FOR PAGE!

//DO LOG ENTRY
//$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

 include("../../includes/view_settings.inc.php");

 include "../../includes/mysql.inc.php";
 $cdb_view1= new class_mysql;
 include "../../includes/functions.inc.php";

 if (empty($_GET['idview']) )
 {

  message_box('Invalid page');
  echo "<script language='Javascript'> setTimeout(\"history.back();\", 1500 ); </script>";
  exit;

 }

 if ( !GetViewPerms($_GET['idview'],$view_sql_table) )
 {

  message_box('You are not allowed to access this page!');
  echo "<script language='Javascript'> setTimeout(\"history.back();\", 1500 ); </script>";
  exit;

 }

  $cdb1= new class_mysql;
  $sql= "delete from $view_sql_table where id=$_GET[idview] ";

  if ( $cdb1->query($sql))
  {
   message_box('View succesfully deleted!');
   echo "<script language='Javascript'> setTimeout(\"history.back();\", 2000 ); </script>";
   exit;
  }





?>