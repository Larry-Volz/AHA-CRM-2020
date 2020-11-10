<?php

//############################################################################################
//#		STRATEGY: 																			 #
//#		- get $_POST variables and make a search string from them.  Run the search and send  #
//#		  results back as viewQuery via a $_GET to show_allclients_main.php 				 #	
//#																							 #
//#		- modify show_allclients_main.php to pickup the get statement and to print that 1st  #
//#		  if it exists and if not -then go ahead and do whichever is chosen from the standard#
//#		  searches boxes (when using regular search clear out old $_GET variables...)		 #
//#																							 #
//#																							 #
//############################################################################################

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//TABLE HELPER include file
require_once('../../../FORMfields/tableHelpers.php');


//do basic security check
$ahcDB->securityCheckBasic();

//CONNECT to DB
$ahcDB->dbConnect();

// ####################################### GET SELECTIONS #####################################

$search_string=$_POST['search_string'];
$search_string = "%".$search_string."%";

$search_field=$_POST['search_field'];

//echo "<strong>LOOKING FOR $search_string in $search_field</strong>";//testing - worked



//##################### LOOK FOR IT ###################################################
//if search_field is NOT a description field then just look for x in y
if ($search_field=="all_clients.f_name"
	||$search_field=="all_clients.l_name"
	||$search_field=="all_clients.middle_initial"
	||$search_field=="all_clients.sales_category"
	||$search_field=="all_clients.sales_stage"
	||$search_field=="all_clients.sales_contact_next"
	||$search_field=="all_clients.referred_by_details"
	||$search_field=="all_clients.address1"
	||$search_field=="all_clients.address2"
	||$search_field=="all_clients.address3"
	||$search_field=="all_clients.postcod"
	||$search_field=="all_clients.prim_tel"
	||$search_field=="all_clients.sec_tel"
	||$search_field=="all_clients.mob_tel"
	||$search_field=="all_clients.why_us"
	||$search_field=="all_clients.motivation")
{
  

//echo "<h1>search_string=$search_string search_field=$search_field</h1>";//testing - WORKED!!???????????????????	
	
	Header ("Location: show_allclients_main.php?search_string=$search_string&search_field=$search_field");
	exit;
  
}else{
  
  echo "<h1>It's more complicated than that...</h1>";
}



//if search_field IS a description field then do more complicated search...



//----------------------------- END SEARCH/CREATE viewQuery -----------------------------------------------




//establish an array of query elements based on the selection of the postedSearchField
/*
$find = array(		
				array(
					"field"=>"all_clients.f_name",
					"as"=>'First Name',
					"table"=>"all_clients",
					"where"=>"all_clients.f_name LIKE"
					),						
				array(
					"field"=>"all_clients.middle_initial",
					"as"=>"Middle Initial",
					"table"=>"all_clients",
					"where"=>"all_clients.middle_initial LIKE"
					),
				array(
					"field"=>"all_clients.l_name",
					"as"=>"Last Name",
					"table"=>"all_clients",
					"where"=>"all_clients.l_name LIKE"
					)						
);//end outer array
*/

/*
$find = array(array());

//1st[]=search_field 2nd[]: 0=field name, 1= As, 2= table, 3=where statement
$find[0][0]="all_clients.f_name";
$find[0][1]= 'First Name';
$find[0][2] = "all_clients";
$find[0][3] = "all_clients.f_name LIKE";
*/

/*
$find['all_clients.f_name']['field']
$find['all_clients.f_name']['field']
$find['all_clients.f_name']['field']
$find['all_clients.f_name']['field']

$find['all_clients.f_name']['field']
$find['all_clients.f_name']['field']
$find['all_clients.f_name']['field']
$find['all_clients.f_name']['field']
*/


/*
$queryTable['']="all_clients";queryAs['all_clients.f_name']="First Name";$queryWhere['all_clients.f_name']="";
$queryTable['all_clients.middle_initial']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.l_name']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.sales_category']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.sales_stage']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.sales_contact_next']="all_clients"; queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.date_client_sold']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['auth_users.f_name,auth_users.l_name']="auth_users,all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['desc_referred_by.description']="desc_referred_by,all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.referred_by_details']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['client_flags.description']="client_flags,all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.address1']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.address2']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.address3']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.postcode']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.prim_tel']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.sec_tel']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.mob_tel']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.primary_goal']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients_contact_logs.notes']="all_clients,all_clients_contact_logs";queryAs['']="";$queryWhere['']="";
$queryTable['all_clients.first_appointment']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['desc_action_at_appointment.description']="all_clients,desc_action_at_appointment";queryAs['']="";$queryWhere['']="";
$queryTable['']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['']="all_clients";queryAs['']="";$queryWhere['']="";
$queryTable['']="all_clients";queryAs['']="";$queryWhere['']="";

*/

/*
//write query
$search_query="
SELECT CONCAT('<a href=\"show_single_client.php?client_id=',client_id,'\">','View','</a>') AS 'View', 
CONCAT('<a href=\"show_modclient.php?client_id=',client_id,'\">','Edit','</a>') AS 'Edit',
$find['$search_field']['field'] AS $find['$search_field']['as']

FROM $find['$search_field']['table']

WHERE $find['$search_field']['where'] $search_string

ORDER BY $search_string

";

*/

/*
$field="field";
$as="as";
$table="table";
$where="where";

print("search_field = $search_field<Br><br>search_string=$search_string<br><br>");
print("find[search_field][field] = $find[$search_field][0]<br>
AS find[search_field][as] = $find[$search_field][1]<br>
FROM find[search_field][table] =  $find[$search_field][2]<br>
HERE find[search_field][where] search_string = $find[$search_field][3] $search_string<br>

ORDER BY search_string = $search_string");

*/


/*
$search_query = "SELECT CONCAT('<a href=\"show_single_client.php?client_id=',client_id,'\">','View','</a>') AS 'View',
CONCAT('<a href=\"show_modclient.php?client_id=',client_id,'\">','Edit','</a>') AS 'Edit',
FROM_UNIXTIME(all_clients.sales_contact_next,'%M %D %Y %h:%i:%s') AS contact_next, 
desc_sales_categories.description AS sales_category,
all_clients.f_name, 
all_clients.l_name, 
all_clients.prim_tel, 
all_clients.sec_tel, 
all_clients.mob_tel,
all_clients.address1,
all_clients.address2 AS City,
all_clients.address3 AS State,
desc_primary_goal.description AS primary_goal, 
FROM_UNIXTIME(all_clients.created,'%M %D %Y') AS created, 
FROM_UNIXTIME(all_clients.modified,'%M %D %Y') AS modified, 
auth_users.f_name AS rec_man_f_name, 
auth_users.l_name AS rec_man_l_name 

FROM all_clients, desc_sales_stage, auth_users, desc_primary_goal, desc_sales_categories

WHERE $postedSearchField LIKE '$new_search_string'

ORDER BY all_clients.l_name";

*/





//run it/make table        
//$table3->loadQuery($search_query);//RESTORE THIS TO RUN???????????????????????????????????????????????




?>
<html>
<head>
<title></title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="../../../FORMfields/tableHelpers.css" />

<? 
 
//call method to make table and echo to browser
//	echo $table3->getTableTag(); 
	
?>
	
	
</body>
</html>