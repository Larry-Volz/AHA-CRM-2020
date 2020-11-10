<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory


//do basic security check
$ahcDB->securityCheckBasic();



// VERIFY INPUT DATA WAS SENT
if (!$_GET[id]){
	header( "Location: affiliates_menu.php");
    exit;
}

//CONNECT to DB
$ahcDB->dbConnect();

//############################## DO LOG ENTRY ##############################################

//do log entry
$now=time();
$list_id=3; //code for 'add a person' - PUT IN CORRECT CODE FOR PAGE!

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

//########################################## QUERY 1 #################################################

$table_name = "affiliates";

//validate and make sure there IS an affiliate with that id#!!
//query
$chk_id = "SELECT id FROM $table_name WHERE id = '$_GET[id]'";

$chk_id_res=$ahcDB->doQuery($chk_id); 

//count # of rows in result...
$chk_id_num = mysql_num_rows($chk_id_res);

//deal with results of validation...

if ($chk_id_num !=1){//if there was no input...
	header("Location: affiliates_menu.php");
    exit;

    }else{
      
  //    $ahcDB->getAffiliatesVars($id); is SUPPOSED to replace below.  Doesn't give variables back...
      
      	//Do QUERY TO GET ALL FOR THE REQUESTED AFFILIATE ID
       	$sql = "SELECT * FROM $table_name WHERE id = '$_GET[id]'";
       	$result=$ahcDB->doQuery($sql); 

        //CREATE AN ARRAY CALLED $row() FOR EACH RECORD IN RESULT SET
        while ($row = mysql_fetch_array($result)){
        	$f_name = $row['f_name'];
        	$l_name = $row['l_name'];
            $title = $row['title'];
            $company = $row['company'];
            $address1 = $row['address1'];
            $address2 = $row['address2'];
            $address3 = $row['address3'];
            $postcode = $row['postcode'];
            $prim_tel = $row['prim_tel'];
            $sec_tel = $row['sec_tel'];
            $email = $row['email'];
            $fax = $row['fax'];
            $website = $row['website'];
            $other_certifications = $row['other_certifications'];
            $other_issues=$row['other_issues'];
            $education_details=$row['education_details'];
            $experience=$row['experience'];
            $work_history=$row['work_history'];
            $other_styles=$row['other_styles'];
            $other_organizations=$row['other_organizations'];
            $philosophy_of_hypnosis=$row['philosophy_of_hypnosis'];
            $biography=$row['biography'];
            $receptionist=$row['receptionist'];
            $facility_type=$row['facility_type'];
            $directions_to_clinic=$row['directions_to_clinic'];
            $date_applied=$row['date_applied'];
            $date_created=$row['date_created'];
            $ranking=$row['ranking'];
            $notes=$row['notes'];
            $membership_status=$row['membership_status'];
            $sales_stage=$row['sales_stage'];
            $date_modified=$row['date_modified'];
            $modified_by=$row['modified_by'];
            $receptionist=$row['receptionist'];
            $facility_type=$row['facility_type'];
            $contact_next=$row['contact_next'];
            $close_city1=$row['close_city1'];
            $close_city2=$row['close_city2'];
			$close_city3=$row['close_city3'];
			$scheduling_method=$row['scheduling_method']; 
			$office_hours=$row['office_hours'];
			$online_calendar=$row['online_calendar'];
			$calendar_user_name=$row['calendar_user_name'];            
			$calendar_password=$row['calendar_password']; 
			
			$rsvp_apt_times=$row['rsvp_apt_times'];
			            
            }//close while loop that assigns values from fetch_array 
            


 }  //closes else clause...


//assign other name to id for cut & pasted code for related tables
global $affil_id;

$affil_id= $_GET['id'];//WORKS




//make dates more readable
$readableDateApplied = date("F j, Y",$date_applied);
$readableDateCreated = date("F j, Y",$date_created);
$readableDateModified = date("F j, Y \a\\t g.i a",$date_modified);
$readableContactNext = date("F j, Y",$contact_next);


//LOOKUP CERTIFICATIONS AND MAKE A HORIZONTAL PRINT BLOCK FOR THEM
$cert_print_block = $ahcDB->makeCertBlock($affil_id);

//LOOKUP ISSUES AND MAKE A VERTICAL PRINT BLOCK FOR THEM
$issues_print_block = $ahcDB->makeIssuesBlock($affil_id);

//LOOKUP ISSUES AND MAKE A HORIZONTAL PRINT BLOCK FOR THEM
$edu_print_block = $ahcDB->makeEduBlock($affil_id);

//LOOKUP STYLES AND MAKE A VERTICAL PRINT BLOCK FOR THEM
$styles_print_block = $ahcDB->makeStyleBlock($affil_id);

//LOOKUP ORGANIZATIONS AND MAKE A VERTICAL PRINT BLOCK FOR THEM
$org_print_block = $ahcDB->makeOrgBlock($affil_id);


?>
<html>
<!-- ############################ HTML STARTS HERE #################################
-->

<head>
  <title>American Hypnosis Clinic Contacts:  Affiliate Details</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

	<form method="POST" name = "modify_affiliate_form" action="show_modaffiliate_getmethod.php?id=<? echo $affil_id; ?>">
		
		<input type="hidden" name = "id" value="<? echo "$affil_id"; ?>" ?>" >  
	
		<table rowspan="2" <table rowspan="2"> 
			
		<table rowspan="2"> <table cellspacing="3" cellpadding = "3">
		
			
		<table valign="top">
		
		<tr>
				<td><a href ="affiliates_menu.php"><input type="button" value="Return to Main Menu" ></a></td>
				
				<td><input type="submit" value="Modify This Affiliate" name="modify_affiliate_button"></td>	
	</form> 

<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
<font size = "2">
<? echo "Id Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br> $affil_id <br>"; ?>
		</font></td>
		<td>
			<font size = "2">Applied:<br>
			<? if ($date_applied>0){
				  echo "$readableDateApplied &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				 	 }else{
				    echo "N/A";
				}//end else 
			?>
			</font>
		
		</td>
		<td>
			<font size = "2">Last Modified:  <br><? echo "$readableDateModified"; ?>
			</font></td>
		</td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	
		<td>
		
		<td >
			<font size = "2">Created:  <br><? echo "$readableDateCreated&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
			</font>
		</td>
		<td>  
<font size = "2">Modified by: <br><?echo "$modified_by"; ?>
		</font></td>
		
	</tr>
</table>
<br>

<table><tr>

<? 
			if ($membership_status=="Affiliate"){
		echo "<td width=\"35\"><img src=\"$ranking stars.jpg\" height=\"40\" width=\"60\"></td>";
		
		echo "<td><h1>$f_name $l_name $suffix</td>"; 
		

}//end

echo "</h1>";

echo "</tr></table>";

	
if ($title !=""){
  
    	echo "$title, ";  
  
}//close if

if ($company != ""){

		echo "$company<br>";
}else{
  	echo "<br>";
}//close if
	
	echo "<br>";
// ##################################### Membership status table #######################################//	
echo "<table border=\"1\" cellspacing=\"3\" cellpadding=\"3\" width=\"100%\"><tr><td>";
echo "<strong>Membership Status:</strong>";

if ($membership_status=="Do Not Recommend"){
  
  echo "<font color=\"red\">".$membership_status."</font><br>";
	}else{
			echo " $membership_status<br>";
		}

echo "</td><td>";
echo "<strong>Sales Stage:</strong> $sales_stage";
echo "</td><td>";
echo "<strong>Contact Next:</strong> $readableContactNext";
echo "</td></tr></table>";

//############################################## Scheduling Method Table ###############################
	
	echo "<table border=\"1\" valign=\"top\"cellspacing=\"3\" cellpadding=\"3\" width=\"100%\"><tr><td>";
	
echo "<strong>Scheduling Method:</strong> <br />$scheduling_method</td><td><strong>Office Hours:</strong> <br />$office_hours</td><td><strong>Online Calendar:</strong> <a href=\"$online_calendar\">$online_calendar</a></td><td><strong>User Name:</strong> $calendar_user_name</td><td><strong>Password:</strong> $calendar_password</td><tr><tr><td>";
		
echo "<strong>Certifications: </strong>$cert_print_block";
	if ($other_certifications != ""){
    	echo "<br>Other Certifications: $other_certifications";
        }//close if block
	echo"</td><td>";

echo "Education: $edu_print_block";

	if ($education_details !=""){
		echo "<br><strong>Details:</strong>$education_details";
}// close if block
		echo "</td>";
		echo "<td>";
echo "<strong>In practice for <u>".$experience."</u> years.</strong>";
echo "</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>";
echo "<br>";

//######################################## Notes table############################################

echo "<table border=\"1\" cellspacing=\"3\" cellpadding=\"3\" width=\"100%\"><tr><td>";
echo "<strong>Notes:</strong><br><i> $notes</i><br><br>";
echo "</td></tr></table>";

echo "<table border=\"1\" cellspacing=\"3\" cellpadding=\"3\" width=\"100%\"><tr>";

	echo "<td>";

if ($address1 !=""){
 	   echo "$address1<br>";
    }//close if block

if (($address2 !="")||($address3 !="")||($postcode !="")){
  	  echo "$address2, $address3 $postcode <br>";
    }//close if block
    
	echo "</td><td>";    

if ($prim_tel !=""){
 		echo "<p><strong>Tel 1:</strong> $prim_tel <br> ";
    }// close if block

if ($sec_tel !=""){
 		echo "<strong>Tel 2:</strong> $sec_tel <br> ";
    }// close if block

 if ($fax !=""){
	echo "<strong>Fax:</strong> $fax <br> ";
    }// close if block

if ($email !=""){
	echo "<strong>E-mail:</strong> <a href=\"mailto:$email\">$email</a> <br> </p>";
    }// close if block
    
if ($website != ""){

	echo "<a href=\"http://$website\">$website</a><br>";
    }//close if block    
    
    echo "</td></tr></table>";

if ($biography !=""){
echo "<strong>Biography:</strong>$biography<br> </p>";
}// close if block

if ($work_history !=""){
echo "<strong>Work History:</strong>$work_history<br> </p>";
}// close if block

if ($philosophy_of_hypnosis !=""){
echo "<strong>Philosophy of Hypnosis:</strong>$philosophy_of_hypnosis<br> </p>";
}// close if block

echo "<strong>Issues this therapist will treat:</strong><br>$issues_print_block <br>";
	if ($other_issues !=""){
	echo "<strong>Other issues $f_name $l_name will treat:</strong><br> $other_issues<br> </p>";
}// close if block

if ($styles_print_block !=""){
echo "<strong>Styles and Techniques:</strong>$styles_print_block</p>";
}// close if block

if ($other_styles !=""){
echo "<strong>Also:</strong>$other_styles<br> </p>";
}// close if block

if ($org_print_block !=""){
echo "<strong>Member of:</strong>$org_print_block</p>";
}// close if block

if ($other_organizations !=""){
echo "<strong>Also:</strong>$other_organizations<br> </p>";
}// close if block


if (($close_city1 !="")||($close_city2 !="")||($close_city3 !="")){
echo "<strong>Nearby Cities:</strong><br>";
}// close if block

if ($close_city1 !=""){
echo "<strong></strong>$close_city1<br> </p>";
}// close if block
if ($close_city2 !=""){
echo "<strong></strong>$close_city2<br> </p>";
}// close if block
if ($close_city3 !=""){
echo "<strong></strong>$close_city3<br> </p>";
}// close if block

if ($directions_to_clinic !=""){
echo "<strong>Directions to Clinic:</strong>$directions_to_clinic<br> </p>";
}// close if block

?>

<table rowspan="2">
	<tr>
		<td><a href ="affiliates_menu.php"><input type="button" value="Return to Main Menu" ></a></td>
		<td><input type="submit" value="Modify This Affiliate" name="modify_affiliate_button"></td>
	</tr>
</table)


</body>

</html>
