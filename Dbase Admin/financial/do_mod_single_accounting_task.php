<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do basic security check
$ahcDB->securityCheckBasic();

//CONNECT to DB
$ahcDB->dbConnect();

// ###################### STUFF GOES HERE ####################

//Get all variables from $_POST
$xaction_id = $_POST['xaction_id'];
$xaction_status = $_POST['xaction_status'];
$client_f_name = $_POST['f_name'];
$client_l_name = $_POST['l_name'];
$client_id = $_POST['client_id'];

$charge_amount = $_POST['amount'];

$charge_month = $_POST['charge_month'];
$charge_day = $_POST['charge_day'];
$charge_year = $_POST['charge_year'];

	$charge_date = mktime(0,0,0,$charge_month,$charge_day,$charge_year);
	
$amount = $_POST['amount'];
$program_cost=$_POST['program_cost'];
$owed = $_POST['owed'];
$number_of_payments = $_POST['number_of_payments'];
$equal_payments_of = $_POST['equal_payments_of'];
$cc_type = $_POST['cc_type'];
$cc_number = $_POST['cc_number'];
$exp_month = $_POST['exp_month'];
$exp_year = $_POST['exp_year'];
	
	$exp_date=mktime(0,0,0,$exp_month,1,$exp_year);

$ck_routing_number = $_POST['ck_routing_number'];
$ck_account_number = $_POST['ck_account_number'];
$ck_number = $_POST['ck_number'];
$financial_notes = $_POST['financial_notes'];
$pc_id = $_POST['pc_id'];

$date_sold = $_POST['date_sold'];

$apt_month = $_POST['apt_month'];
$apt_day = $_POST['apt_day'];
$apt_year = $_POST['apt_year'];
$apt_hour = $_POST['apt_hour'];
$apt_minutes = $_POST['apt_minutes'];

	$apt_date=mktime($apt_hour,$apt_minutes,0,$apt_month,$apt_day,$apt_year);

$affiliate_id = $_POST['affiliate_id'];


//----------------------------------------------------------------------------------------------------------------$sql="

//update the database with the changed variables

$table_name = "financial";

$query1="
UPDATE $table_name
SET client_f_name='$client_f_name', client_l_name='$client_l_name', client_id='$client_id', amount='$charge_amount', date='$charge_date', cc_number='$cc_number', cc_expiration_date='$exp_date', cc_type='$cc_type', xaction_status='$xaction_status', ck_routing_number='$ck_routing_number', ck_account_number='$ck_account_number', ck_number='$ck_number', program_cost='$program_cost', number_of_payments='$number_of_payments', equal_payments_of='$equal_payments_of', notes='$financial_notes', pc_id='$pc_id', date_sold='$date_sold', apt_date='$apt_date', therapist_id = '$affiliate_id'
WHERE id='$xaction_id'

";
/*
//open the SQL connection to AHC server databases
$connection = @mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = @mysql_select_db($db_name, $connection) or die (mysql_error());

*/

$results1 = mysql_query($query1) or die(mysql_error());

//output a "worked fine - thanks" message in HTML

//redirect through html timer back to main tasks list page in HTML


?>
<html>
<head>
<title>Table Updated</title>
<META http-equiv="REFRESH" content="2;URL=http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/financial/accounting_tasks.php">
</head>
<body>
<p align(center)>
<h1>This Task has been updated</h1>
</p>
</body>
</html>