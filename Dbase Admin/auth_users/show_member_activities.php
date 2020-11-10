<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do basic security check
$ahcDB->securityCheckBasic();


//######################## DO LOG ENTRY #########################################

session_start();//IF NOT ALREADY STARTED

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
$list_id=29; //code for 'view a member's activities'

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------- END LOG ENTRY -----------------------------------------

// ###################### STUFF GOES HERE ####################

//############### 	STRATEGY 	###########################
//
//x- Assign variables from Posted variables
//x- convert date into a timestamp
//x- figure out 24 hours starting with that timestamp date so we have the whole day from 12 AM to 11:59 PM
//x- (add 2 hours for timechange? - now done in class when stored...)
//- Get all descriptions of activities from descriptions database and assign to an array
//- Get all activities (numbers)this client did on this day
//- for each one - echo the description that goes with that number
//- if it's not the first one, subtract the time from the last and echo the difference between activities'
//- do the next until all are echoed
//- offer choice to lookup another or return to main menu
//- Be proud at another cool project finished


//- Assign variables from Posted variables
$member_id = $_POST['user_id'];

// GET MEMBER's NAME
		  	$sql = "SELECT f_name,l_name FROM auth_users WHERE id = '$member_id'";
			$result = mysql_query($sql);// or die(mysql_error())
			
		//CREATE AN ARRAY CALLED $row() FOR EACH RECORD IN RESULT SET
        while ($row = mysql_fetch_array($result)){
          
                	$l_name = $row['l_name'];
                	$f_name=$row['f_name'];
				
           }//close while loop that assigns values from fetch_array 

//- convert date into a timestamp
//###################################### Convert Javascript Date Into Timestamp #####################################

$month=$_POST['months']+1;
$day=$_POST['days'];
$year=$_POST['year'];

$dayLookup=mktime(0,0,0,$month,$day,$year);

//- figure out 24 hours starting with that timestamp date so we have the whole day from 12 AM to 11:59 PM
$nextDay=mktime(0,0,0,$month,$day+1,$year);//to use as if< nextDay...


$readableDayLookup=date('n\-j\-y',$dayLookup);//for testing???????????????????????????????????????
//$readableTimeEnd=date('h\:i a \o\n n\-j\-y',$nextDay);//for testing???????????????????????????????????????????
//TESTED THROUGH HERE OKAY!

//========================================== END DATE TO TIMESTAMP CONVERSION =======================================

//########################################  Get activities and descriptions ########################################

function getActivityDescriptions($member_id,$dayLookup){ 
  
  	$nextDay=$dayLookup+(60*60*24);
  
	$activityPrintBlock = "<table border=\"1\" cellpadding=\"3\" cellspacing=\"3\">";
	
	$activityLog = "activity_log";//activity log table in text format
	$activityDescriptions ="activity_descriptions";//activity descriptions table in text format
	
	//	Lookup related activity-type numbers array through activity_log by id# and between begin/end timestamps
	$activity_id_lookup = "SELECT * FROM $activityLog WHERE user_id = $member_id AND time >= $dayLookup AND time < $nextDay";//
	$activity_id_result=mysql_query($activity_id_lookup);// or die(mysql_error())
	
		//Get certifications id#'s array from array reciept...
		while ($row = mysql_fetch_array($activity_id_result)){
	                $list_id=$row['list_id'];
	                $time=$row['time'];
	                $time += 7200;
	                $readableTime= date('h\:i a',$time);
	
	                // 	Lookup description for each activity_id#
	                $desc_lookup = "SELECT * FROM $activityDescriptions WHERE id=$list_id";
					$activity_desc_result=mysql_query($desc_lookup) ;// or die(mysql_error())
					
	 		   			while ($inner_loop = mysql_fetch_array($activity_desc_result)){
	 		   			  
	                  		$activity_desc = $inner_loop['desc'];
	            	        $activityPrintBlock .= "<tr><td>".$readableTime."</td><td>".$activity_desc."</td></tr>";
	
	              }//end desc - fetching loop
	       }//end id# - fetching loop
	       
	       $activityPrintBlock .="</table>";
	       
	       return $activityPrintBlock;
	       
}// end method def

//++++++++++++++++++++++++++++++++++++++++ END function DEF +++++++++++++++++++++++++++++++++++

$activityPrintBlock = getActivityDescriptions($member_id,$dayLookup); // CALL THE FUNCTION!

?>
<html>
<head>
<title></title>
</head>
<body>
<table border="1" cellspacing="3" cellpadding="3" width="100%">
	<tr>
		<td>
			<a href="pick_member_activities.php">Look at another Member's Activities</a>
		</td>
		<td>
			<a href="../Administrative Links.php">Administrative Menu</a>
		</td>
	</tr>
</table>
<br><br>

		<? echo "<strong>$f_name {$l_name}'s Activities on $readableDayLookup: </strong><br><br>$activityPrintBlock"; ?>

<table border="1" cellspacing="3" cellpadding="3" width="100%">
	<tr>
		<td>
			<a href="pick_member_activities.php">Look at another Member's Activities</a>
		</td>
		<td>
			<a href="../Administrative Links.php">Administrative Menu</a>
		</td>
	</tr>
</table>
</body>
</html>