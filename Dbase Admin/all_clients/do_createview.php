<?
//=============================================================================================
//     Do - Create View:  Point is to create the query from the form and add to query table
//=============================================================================================

// log in with security and create an activity log for this action
//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory


//do basic security check
$ahcDB->securityCheckBasic();



// VERIFY INPUT DATA WAS SENT
if (!$_POST[name_of_view]){
	header( "Location: show_createview.php");
    exit;
}

//CONNECT to DB
$ahcDB->dbConnect();

//############################## DO LOG ENTRY ##############################################

//do log entry
$now=time();
$list_id=37; //code for 'create a view' - PUT IN CORRECT CODE FOR PAGE!

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

// Retrieve all data from form into a sortable array.  
// If $x=0 it will keep replacing itself with other 0's. Then just sort in order by KEY for select fields
$x=$_POST['f_name'];
$field[$x]="f_name";

$x=$_POST['l_name'];
$field[$x]="l_name";

$x=$_POST['sales_category'];
$field[$x]="sales_category";

$x=$_POST['sales_stage'];
$field[$x]="sales_stage";

$x=$_POST['sales_contact_next'];
$field[$x]="sales_contact_next";

$x=$_POST['date_client_sold'];
$field[$x]="date_client_sold";

$x=$_POST['record_manager'];
$field[$x]="record_manager";

$x=$_POST['referred_by'];
$field[$x]="referred_by";

$x=$_POST['referred_by_details'];
$field[$x]="referred_by_details";

$x=$_POST['referral_category'];
$field[$x]="referral_category";

$x=$_POST['client_flags'];
$field[$x]="client_flags";

$x=$_POST['address1'];
$field[$x]="address1";

$x=$_POST['address2'];
$field[$x]="address2";

$x=$_POST['address3'];
$field[$x]="address3";

$x=$_POST['postcode'];
$field[$x]="postcode";

$x=$_POST['country'];
$field[$x]="country";

$x=$_POST['email'];
$field[$x]="email";

$x=$_POST['prim_tel'];
$field[$x]="prim_tel";

$x=$_POST['sec_tel'];
$field[$x]="sec_tel";

$x=$_POST['mob_tel'];
$field[$x]="mob_tel";

$x=$_POST['phone_ext'];
$field[$x]="phone_ext";

$x=$_POST['primary_goal'];
$field[$x]="primary_goal";

$x=$_POST['secondary_goal'];
$field[$x]="secondary_goal";

$x=$_POST['additional_information'];
$field[$x]="additional_information";

$x=$_POST['first_appointment'];
$field[$x]="first_appointment";

$x=$_POST['therapist'];
$field[$x]="therapist";

$x=$_POST['action'];
$field[$x]="action";

$x=$_POST['created'];
$field[$x]="created";

$x=$_POST['created_by'];
$field[$x]="created_by";

$x=$_POST['modified'];
$field[$x]="modified";

$x=$_POST['modified_by'];
$field[$x]="modified_by";

$x=$_POST['motivation'];
$field[$x]="motivation";

$x=$_POST['why_us'];
$field[$x]="why_us";

//erase the 0 field to prevent an unwanted field from printing after sort
$field['0']="";

//sort the array by KEY while keepy key=>value relationship
$field_sorted = asort($field);

//???????????????????????????????????????????????????????????????????????????????????????????????????????????????
//Error HERE: Warning: Invalid argument supplied for foreach() in /home/america2/public_html/intranet/Dbase Admin/all_clients/do_createview.php on line 145
foreach ($field_sorted as $field_name => $order){
  echo "$order: $field_name<br>";
}


/* ****STRUCTURE NOTE: Database should have a list of field1, field2, field3, etc... then each one should have a number next to it that corresponds to the field to put in there (listed in a relational database) 1=f_name, 2=l_name, etc.
Then, in  show_create_view people put in the number in order that they want it listed.  Then use that number for the field number - for instance:  $order=$_POST['f_name']; Update field$order with  (code value of $_POST['f_name'])

When outputting views:  Build table with entries in order by field1, field2, etc...
*/

// update field1, field2, field3, etc... for all of those fields that will be included in the view in order - enter 0 if not included in view

//open msql database

//start creating query:

// with each field variable that !=0 $query = SELECT".$field1." ".$field4." ".etc..

//$query .="WHERE";

	// If "choose all records is chosen" then $query .=" 1";
	// If not "choose all records" chosen then...
	
		//IF filter1!="0"{
		  //query .="$filter1 $operator $operand";
		//}
		//IF filter2!="0"{
		  //query .="$filter1 $operator $operand";
		//}		
		//IF filter3!="0"{
		  //query .="$filter1 $operator $operand";
		//}		
		//IF filter4 !="0"{
		  //query .="$filter1 $operator $operand";
		//}

	//}//end if statement


// if any of the sorts are checked then $query .="ORDER BY"

	//if sort1 then $query .="$sort1 $asc_or_desc"
	//if sort2 then $query .="$sort1 $asc_or_desc"
	//if sort3 then $query .="$sort1 $asc_or_desc"	
	
// if any of the groups are checked:

/* GROUPING STRATEGY:
If any grouping is checked
	//also sort by that group
	//have a field in the query database for each grouping
	//for actual output sort by group to and when developing $output - check for when the group value changes then start a new table with a new heading each time.

*/


//after the query is done - serialize the array so that it can be stored in mysql (unserialize to use it for show_modifyview)

// store the query, everything that makes up the query (for deconstructing it for modify_query page) whether it is a global query or a personal query, and who made it

?>