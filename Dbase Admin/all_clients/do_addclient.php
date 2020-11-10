<?php

//################################### STRATEGY #############################################
//#																					 	   #
//#	x Get all variables from post 													 	   #
//#	Xconvert time data into timestamp 													   #
//#	Xupdate all variables 																   #  
//#	in the appropriate related tables, send variable over to show_single_client via $_GET  #
//# (modify show_single_client to check for a $_GET)									   #
//#																						   #
//#	XCheck dbase to see if current sales_category is Lead then check GET to see if  NOW a  #
//# client.  IF that has changed - then change date sold to TODAY						   #
//#																						   #
//#	DO log entry adding in users name and timestamp automatically						   #
//#																						   #
//#	Think about how to deal with 1st appointment and payment variables from the old site   #
//# perhaps do at least a rudimentary financial page and scheduling page to start so they  #
//#	can start using the system...														   #
//#																						   #
//##########################################################################################

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do basic security check
$ahcDB->securityCheckBasic();

//############################### CONNECT to DB ###########################################

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "all_clients";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// SELECT DB - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do log entry
$now=time();
$list_id=35; //code for 'add a client' 

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

// ##################################### GET VARIABLES ######################################

$client_id=$_POST['client_id'];
$client_f_name=$_POST['client_f_name']; 
$client_middle_initial=$_POST['client_middle_initial']; 
$client_l_name=$_POST['client_l_name'];
$sales_category=$_POST['sales_category'];
$sales_stage=$_POST['sales_stage'];
$date_client_sold=$_POST['date_client_sold'];
$record_manager=$_POST['record_manager'];
$referred_by=$_POST['referred_by'];
$referred_by_details=$_POST['referred_by_details'];
$referral_category=$_POST['referral_category'];
$client_flags=$_POST['client_flags'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$address3=$_POST['address3'];
$postcode=$_POST['postcode'];
$prim_tel=$_POST['prim_tel'];
$sec_tel=$_POST['sec_tel'];
$mob_tel=$_POST['mob_tel'];
$phone_ext=$_POST['phone_ext'];
$email=$_POST['email'];
$primary_goal=$_POST['primary_goal'];
$secondary_goal=$_POST['secondary_goal'];
$first_appointment=$_POST['first_appointment'];
$therapist_id=$_POST['therapist_id'];
$created=$_POST['created'];
$created_by=$_POST['created_by'];
$modified=$_POST['modified'];
$action=$_POST['action'];
$motivation=$_POST['motivation'];
$why_us=$_POST['why_us'];
$log_entry=$_POST['log_entry'];

$modified=time();

//GET modified_by FROM SESSION VARIABLE
$user_id=$_SESSION['user'];
$modified_by=$user_id;

//CHECK TO SEE IF JUST SOLD AND IF SO UPDATE date_client_sold clients = 1,4,5,9
IF ((($date_client_sold==0))AND(($sales_category==1)OR($sales_category==4)OR($sales_category==5)or($sales_category==9))){
  //Then it means the person has just become a client so...
  		
  		$date_client_sold=time();
  
}

//################################## CONVERT JAVASCRIPT TO CONTACT NEXT Timestamp##############################

$month=$_POST['months']+1;
$day=$_POST['days'];
$year=$_POST['year'];

$contact_next=mktime(0,0,0,$month,$day,$year);


//========================================== END DATE TO TIMESTAMP CONVERSION =======================================
 


//############################################# UPDATES ###########################################################

//UPDATE ALL all_clients variables
$table_name="all_clients";

$sql = "INSERT INTO $table_name
(f_name,l_name,middle_initial,sales_category,sales_stage,date_client_sold,record_manager,referred_by,referred_by_details,referral_category,primary_goal,secondary_goal,first_appointment,address1,address2,address3,postcode,prim_tel,sec_tel,phone_ext,mob_tel,email,modified,sales_contact_next,modified_by,created,created_by,action,motivation,why_us,client_flags) 
VALUES ('$client_f_name', '$client_l_name', '$middle_initial','$sales_category','$sales_stage','$date_client_sold','$record_manager','$referred_by','$referred_by_details','$referral_category','$primary_goal','$secondary_goal','$first_appointment','$address1','$address2','$address3','$postcode','$prim_tel','$sec_tel','$phone_ext','$mob_tel','$email','$date_modified','$contact_next','$member_id','$created','$created_by','$action','$motivation','$why_us','$client_flags')";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

//######################## GET NEWLY CREATED ID# FROM INSERT! ###############################
GLOBAL $client_id;
$client_id = mysql_insert_id($connection);  //Too cool...

//--------------------------------- end all_client variables insert ----------------------------------


//UPDATE all_clients_contact_logs (adding in users name and timestamp)


If ($log_entry !=""){
  
	$table_name="all_clients_contact_logs";
	$now=time();
	
	//write it
	$sql = "INSERT INTO $table_name (notes,client_id,user_id,timestamp) VALUES ('$log_entry', '$client_id', '$user_id','$now')";
	
	//execute it
	$result=mysql_query($sql) or die(mysql_error());

}//end log_entry IF block


//HEADER back on over to show_single_client ***** USE $_GET PROTOCOL *****

	header( "Location: show_single_client.php?client_id=$client_id");
    exit;
?>
<html>
<head>
</head>
<body>
</body>
</html>