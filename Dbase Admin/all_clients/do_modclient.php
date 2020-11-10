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

//CONNECT to DB
$ahcDB->dbConnect();

//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do log entry
$now=time();
$list_id=32; //code for 'modify a client' 

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


$sql = "UPDATE $table_name 
SET f_name='$client_f_name',
l_name='$client_l_name',
middle_initial='$client_middle_initial',
sales_category='$sales_category',
sales_stage='$sales_stage',
date_client_sold='$date_client_sold',
record_manager='$record_manager',
referred_by='$referred_by',
referred_by_details='$referred_by_details',
referral_category='$referral_category',
primary_goal='$primary_goal',
secondary_goal='$secondary_goal',
first_appointment='$first_appointment',
address1='$address1',
address2='$address2',
address3='$address3',
postcode='$postcode',
prim_tel='$prim_tel',
sec_tel='$sec_tel',
phone_ext='$phone_ext',
mob_tel='$mob_tel',
email='$email',
modified='$date_modified',
sales_stage='$sales_stage',
sales_contact_next='$contact_next',
modified_by='$member_id',
created='$created',
created_by='$created_by',
modified='$modified',
action='$action',
motivation='$motivation',
why_us='$why_us',
client_flags='$client_flags'

WHERE client_id='$client_id'";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

//--------------------------------- end all_client variables update ----------------------------------


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