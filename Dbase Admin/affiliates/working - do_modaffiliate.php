<?php

// ################################ PAGE STRATEGY ##########################################
//	Import all variables from previous form - copy from addaffiliate
//	update scalar variable directly
//	delete values where list_id = affil_id in related tables
//	then insert new entries from arrays
//	output a verification page - cut and paste everything directly from show affiliate
//	(or just use include() immediately after updating all to use as output!)
//	(or could maybe use header to navigate to a new page?)
//
//###########################################################################################




//------------------------------------------------------------------------------------------

//Get my class and methods
include_once("ahcDatabase_class.php");

//------------------------------------------------------------------------------------------




//######################### SECURITY/DATA ENTRY CHECK ###################################
//if no entry made...
if ((!$_POST[f_name])||(!$_POST[l_name]))
{
	header( "Location: show_modaffiliate.php?id=$affil_id");
    exit;
	}else{
        if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
	}    //end cookie block
}//end check if data entered block

//--------------------------------------------------------------------------------------------





//##################################### DEFINE VARIABLES ########################################

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//create var for ranking counter
$ranking=0;

//create variable for membership status to verify ranking stuff
$membership_status=$_POST['membership_status'];

//Create variable for sign-up date
$date_applied = time();
$readable_date = date("l, F jS, Y",$date_applied);

$affil_id = $_POST['id'];
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$address3=$_POST['address3'];
$postcode=$_POST['postcode'];
$prim_tel=$_POST['prim_tel'];
$sec_tel=$_POST['sec_tel'];
$email=$_POST['email'];
$company=$_POST['company'];
$title=$_POST['title'];
$fax=$_POST['fax'];
$website=$_POST['website'];
$other_certifications=$_POST['other_certifications'];
$other_issues=$_POST['other_issues'];
$education_details=$_POST['education_details'];
$experience=$_POST['experience'];
$work_history=$_POST['work_history'];
$other_styles=$_POST['other_styles'];
$other_organizations=$_POST['other_organizations'];
$philosophy_of_hypnosis=$_POST['philosophy_of_hypnosis'];
$biography=$_POST['biography'];
$receptionist=$_POST['receptionist'];
$facility_type=$_POST['facility_type'];
$directions_to_clinic=$_POST['directions_to_clinic'];
$date_applied=$date_applied;
$date_created=$date_applied;
$membership_status=$_POST['membership_status'];
$notes=$_POST['notes'];
$sales_stage=$_POST['sales_stage'];
$contact_next=$timestamp;

//sigh...

//-----------------------------------------------------------------------------------------------






//############################### Convert Javascript Date Into Timestamp #####################

$month=$_POST['months']+1;
$day=$_POST['days'];
$year=$_POST['year'];

$timestamp=mktime(0,0,0,$month,$day,$year);

$now = time();

//================================ END DATE TO TIMESTAMP CONVERSION ==========================







//########################## CONNECTION AND MAIN UPDATE ######################################


//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DB - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//create the sql statement  first () does names in order and 2nd () sends strings



//################################## UPDATE SCALAR VARIABLES ########################

$sql = "UPDATE $table_name SET f_name='$f_name',l_name='$l_name',address1='$address1',address2='$address2',address3='$address3',postcode='$postcode',prim_tel='$prim_tel',sec_tel='$sec_tel', email='$email',company='$company', title='$title', fax='$fax', website='$website',other_certifications='$other_certifications',other_issues='$other_issues',education_details='$education_details',experience='$experience',work_history='$work_history',other_styles='$other_styles',other_organizations='$other_organizations',philosophy_of_hypnosis='$philosophy_of_hypnosis',biography='$biography',receptionist='$receptionist',facility_type='$facility_type',directions_to_clinic='$directions_to_clinic',date_applied='$date_applied',date_created='$date_applied',date_modified='$now',membership_status='$membership_status',notes='$notes',sales_stage='$sales_stage',contact_next=$timestamp WHERE id='$affil_id'";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

//--------------------------------- end basic update ----------------------------------







//############################# UPDATE ALL ARRAY $_POST VAR's ############################
// then insert new ones

//**************************** Delete all old relationships ***************************************

// create variable for name of ALL the tables where I'll be deleting

$table_name = array("affiliates_certifications_rel","affiliates_edu_rel","affiliates_issues_rel","affiliates_organizations_rel","affiliates_styles_rel");

			//using array of tables defined earlier...
			foreach ($table_name as $table){

				    //create the sql statement to delete the record from the affiliates database
				    $sql = "DELETE FROM $table WHERE affil_id = '$id'";

				    //execute the sql statement and create a variable you can use to display 
					//or work with it
				    $result = mysql_query($sql) or die(mysql_error());
 }//end foreach


//-------------------------------- DONE DELETING ----------------------------------




//*********************************************************************************************
//################ START INSERTING CORRECTED ARRAYS INTO RELATIONSHIPS TABLES ###############
//*********************************************************************************************


// Start calculating ranking
$experience = $_POST[experience];
$ranking = $ranking + ($experience*0.25);
$exp_rank=$ranking;//for testing



//########################### CERTIFICATIONS RELATIONSHIP INSERTING ##########################
//Setup variables...
global $list_id;  //Make it global just in case...
$cert_id_table = "affiliates_certifications_rel";//table defined to be used in query

//make a simpler variable to work with from the  certifications variable imported from form
$certifications = $_POST[certifications];

	//START INSERTING CERT ID'S WITH CLIENT ID INTO RELATIONSHIPS DATABASE
	foreach ($certifications as $list_id) {  //Puts certification # from this array into $cert_id

		//Create query to INSERT values $affil_id and $cert_id:  only $cert_id changes, 
		//$affil_id stays the same through loop
		//This query has to be defined repeatedly in loop to work... I have WHY!?
		$add_certs_query = "INSERT INTO $cert_id_table (rel_id, list_id, affil_id) VALUES('','$list_id','$affil_id')";   //$list_id will come from $_POST[certifications]

    	//insert a new relationship record for each certification found in the array
   		 settype($list_id,'integer');

		$insert_results = mysql_query($add_certs_query) or die(mysql_error());

}//end foreach loop

//--------------------------- end CERTIFICATIONS inserting ----------------------------------




//########################### ISSUES RELATIONSHIP INSERTING ##########################
//Setup variables...
global $list_id;  //the issue identifier variable - Make it global just in case...
$issue_id_table = "affiliates_issues_rel";//table defined to be used in query

//make a simpler variable to work with from the  issues variable imported from form
$issues = $_POST[issues];

//begin a print block for combined issues to be printed in confirmation
$combined_issues_print_block = "<strong>Issues this therapist will work with:</strong><br><ul>";

	//START INSERTING CERT ID'S WITH CLIENT ID INTO RELATIONSHIPS DATABASE
	foreach ($issues as $list_id) {  //Puts issue # from this array into $list_id
		
		$add_issues_query = "INSERT INTO $issue_id_table (rel_id, list_id, affil_id) VALUES('','$list_id','$affil_id')";   //$list_id will come from $_POST[certifications]
	
	    //insert a new relationship record for each certification found in the array
	    settype($list_id,'integer');
	
		$insert_results = mysql_query($add_issues_query) or die(mysql_error());
	
}// End foreach loop	

//--------------------------- end ISSUES inserting ------------------------------------





//########################### EDUCATION RELATIONSHIP INSERTING ##########################
//Setup variables...
global $list_id;  //Make it global just in case...
$edu_id_table = "affiliates_edu_rel";//table defined to be used in query

//make a simpler variable to work with from the  education variable imported from form
$education = $_POST[education];

//begin a print block for combined education to be printed in confirmation
$combined_edu_print_block = " ";

//START INSERTING EDU ID'S WITH CLIENT ID INTO RELATIONSHIPS DATABASE
foreach ($education as $list_id) {  //Puts education # from this array into $list_id

//Create query to INSERT values $affil_id and $list_id:  only $list_id changes, $affil_id stays the same through loop
//This query has to be defined repeatedly in loop to work... I have WHY!?
$add_edu_query = "INSERT INTO $edu_id_table (rel_id, list_id, affil_id) VALUES('','$list_id','$affil_id')";   //$list_id will come from $_POST[education]

    //insert a new relationship record for each certification found in the array
    settype($list_id,'integer');


	$insert_results = mysql_query($add_edu_query) or die(mysql_error());

}//end foreach loop

//--------------------------- end EDUCATION inserting ------------------------------------



//########################### STYLES RELATIONSHIP INSERTING ##########################
//Setup variables...
global $list_id;  //the issue identifier variable - Make it global just in case...
$styles_id_table = "affiliates_styles_rel";//table defined to be used in query

//make a simpler variable to work with from the  issues variable imported from form
$styles = $_POST[styles];

//begin a print block for combined issues to be printed in confirmation
$combined_styles_print_block = "<strong>Therapeutic styles/techniques this therapist is skilled in:</strong><br><ul>";

//START INSERTING CERT ID'S WITH CLIENT ID INTO RELATIONSHIPS DATABASE
foreach ($styles as $list_id) {  //Puts issue # from this array into $list_id

//Create query to INSERT values $affil_id and $list_id:  only $list_id changes, $affil_id stays the same through loop
//This query has to be defined repeatedly in loop to work... I have WHY!?
$add_styles_query = "INSERT INTO $styles_id_table (rel_id, list_id, affil_id) VALUES('','$list_id','$affil_id')";   //$list_id will come from $_POST[certifications]

    //insert a new relationship record for each certification found in the array
    settype($list_id,'integer');
	//echo $list_id; //FOR TESTING ONLY - PASSED

	$insert_results = mysql_query($add_styles_query) or die(mysql_error());

}//end foreach loop

//--------------------------- end STYLES inserting ------------------------------------




//########################### ORGANIZATIONS RELATIONSHIP INSERTING ##########################
//Setup variables...
global $list_id;  //the org identifier variable - Make it global just in case...
$org_id_table = "affiliates_organizations_rel";//table defined to be used in query

//make a simpler variable to work with from the organizations variable imported from form
$organizations = $_POST[organizations];

//begin a print block for combined issues to be printed in confirmation
$combined_org_print_block = "<strong>This therapist is a member of these organizations:</strong><br><ul>";

//START INSERTING CERT ID'S WITH CLIENT ID INTO RELATIONSHIPS DATABASE
	foreach ($organizations as $list_id) {  //Puts issue # from this array into $list_id
	
	
		$add_org_query = "INSERT INTO $org_id_table (rel_id, list_id, affil_id) VALUES('','$list_id','$affil_id')";   //$list_id will come from $_POST[certifications]

	    //insert a new relationship record for each certification found in the array
	    settype($list_id,'integer');
	
		$insert_results = mysql_query($add_org_query) or die(mysql_error());

}//end foreach loop


//--------------------------- end STYLES inserting ------------------------------------






//***************************end arrays into relationship tables ********************




//---------------------------- END WORKING WITH ARRAY VARIABLES ---------------------------





//########################### TAKE affil_id & HEADER TO show_affiliate ################

	header( "Location: show_affiliate.php?id=$affil_id");
    exit;
    
?>