<?
//if no entry made...
if (((!$_POST[l_name])&&(!$_POST[company]))||((!$_POST[email])&&(!$_POST[prim_tel])))
{
	$true="TRUE";
	header( "Location: show_addaffiliate.php?field_message=$true");
    exit;
	}
	else{
//###################### SESSION SECURITY CHECK ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

  foreach($_GET as $key=>$value)
  {
          ${$key} = $value;
          $global_vars[$key] = $value;
  }
  foreach($_POST as $key=>$value)
  {
          ${$key} = $value;
          $global_vars[$key] = $value;
  }

/*
IF ($auth !="ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/authenticate.htm");
	exit;
}
*/

//------------------------------ end security check --------------------------

}//end check if data entered block

//############################### Convert Javascript Date Into Timestamp ###############################

$month=$_POST['months']+1;
$day=$_POST['days'];
$year=$_POST['year'];

$timestamp=mktime(0,0,0,$month,$day,$year);


//================================ END DATE TO TIMESTAMP CONVERSION =================================


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

include_once("../../ahcDatabase_class.php");

// create variable for name of database & table
$connection=$ahcDB->dbConnect();




//###################################### CONNECTION AND MAIN INSERT ###################################################

//open the SQL connection to AHC server databases
//$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DB - create var to hold the result of select db function
//$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//create the sql statement  first () does names in order and 2nd () sends strings

//


$sql = "INSERT INTO $table_name
(id, f_name, l_name, address1, address_physical, physical_city, physical_state, physical_zip, address2, address3, postcode, prim_tel, sec_tel, email,
company, title, fax, website,other_certifications,other_issues,education_details,experience,
work_history,other_styles,other_organizations,philosophy_of_hypnosis,biography,receptionist,
facility_type,directions_to_clinic,date_applied,date_created,membership_status,notes,sales_stage,contact_next,close_city1,close_city2,close_city3, scheduling_method, office_hours,online_calendar,calendar_user_name,calendar_password,rsvp_apt_times)
VALUES ('', '$_POST[f_name]', '$_POST[l_name]', '$_POST[address1]', '$_POST[address_physical]','$_POST[physical_city]','$_POST[physical_state]','$_POST[physical_zip]', '$_POST[address2]', '$_POST[address3]','$_POST[postcode]','$_POST[prim_tel]','$_POST[sec_tel]',
'$_POST[email]','$_POST[company]','$_POST[title]', '$_POST[fax]',
'$_POST[website]','$_POST[other_certifications]','$_POST[other_issues]',
'$_POST[education_details]','$_POST[experience]','$_POST[work_history]','$_POST[other_styles]',
'$_POST[other_organizations]','$_POST[philosophy_of_hypnosis]','$_POST[biography]',
'$_POST[receptionist]','$_POST[facility_type]','$_POST[directions_to_clinic]','$date_applied','$date_applied',
'$_POST[membership_status]','$_POST[notes]','$_POST[sales_stage]',$timestamp,'$_POST[close_city1]','$_POST[close_city2]','$_POST[close_city3]','$_POST[scheduling_method]','$_POST[office_hours]','$_POST[online_calendar]','$POST_[calendar_user_name]','$_POST[calendar_password]','$_POST[rsvp_apt_times]')";


//echo $sql;
//exit;

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

//############################ WRITE CERTIFICATIONS #####################################
//# STRATEGY:
//#	- First, get id back from affiliates table - 	CHECK!
//#	- Then foreach the $_POST['certifications'] array and insert into table
//# 	affiliates_certifications_rel along with affil_id as well as create a
//#		$combined_certs_print_block to print out the certifications in the
//#		confirmation area after the insert
//#	- OPT/Long-term: (For confirmation - actually do a SELECT and get/display confirmation that way!)
//

//######################## GET NEWLY CREATED ID# FROM INSERT! ###############################
GLOBAL $affil_id;
$affil_id = mysql_insert_id();  //Too cool...

// Start calculating ranking
$experience = $_POST[experience];
$ranking = $ranking + ($experience*0.25);
$exp_rank=$ranking;//for testing


//*********************************************************************************************
//############################  HANDLING POSTED ARRAY VARIABLES ###############################
//*********************************************************************************************

//########################### CERTIFICATIONS RELATIONSHIP INSERTING ##########################
//Setup variables...
global $list_id;  //Make it global just in case...
$cert_id_table = "affiliates_certifications_rel";//table defined to be used in query

//make a simpler variable to work with from the  certifications variable imported from form
$certifications = $_POST[certifications];

//begin a print block for combined certifications to be printed in confirmation
$combined_certs_print_block = "Certifications: ";

//START INSERTING CERT ID'S WITH CLIENT ID INTO RELATIONSHIPS DATABASE
foreach ($certifications as $list_id) {  //Puts certification # from this array into $cert_id

//Create query to INSERT values $affil_id and $cert_id:  only $cert_id changes, $affil_id stays the same through loop
//This query has to be defined repeatedly in loop to work... I have WHY!?
$add_certs_query = "INSERT INTO $cert_id_table (rel_id, list_id, affil_id) VALUES('','$list_id','$affil_id')";   //$list_id will come from $_POST[certifications]

    //insert a new relationship record for each certification found in the array
    settype($list_id,'integer');

	$insert_results = mysql_query($add_certs_query) or die(mysql_error());


//########################### CERTIFICATIONS DESCRIPTIONG SELECTING ##########################
//set variables...
$cert_desc_table = "hyp_certifications";

	    //Create query to RETRIEVE descriptions
	    $cert_desc_query = "SELECT * FROM $cert_desc_table WHERE id ='$list_id'";

        //Run query
		$cd_results = mysql_query($cert_desc_query) or die(mysql_error());

        //get JUST the description using the built-in FETCH function: mysql_result (gets ONLY one value!)
		//$description = mysql_result($cd_results,0,1);

        WHILE ($row = mysql_fetch_array($cd_results)){

        	$description = $row['desc'];

                //*** LOOKUP & ADD POINTS FOR THESE QUALIFICATIONS ***
             	$points = $row['points'];
                $ranking = $ranking + $points;
                $cert_rank=$cert_rank + $points;

            }//end getting the description row

 	       //add to print block
 	   		$combined_certs_print_block .= " $description,";

}//end insert certification foreach block

//trim Combined_certs_print_block to get rid of the last comma
$cleanup = strlen($combined_certs_print_block)-1; //one less than string length
$combined_certs_print_block = substr($combined_certs_print_block,0,$cleanup);

//+++++++++++++++++++++++++ END CERTIFICATION ADD AND VERIFY BLOCK ++++++++++++++++++++


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

//Create query to INSERT values $affil_id and $list_id:  only $list_id changes, $affil_id stays the same through loop
//This query has to be defined repeatedly in loop to work... I have WHY!?
$add_issues_query = "INSERT INTO $issue_id_table (rel_id, list_id, affil_id) VALUES('','$list_id','$affil_id')";   //$list_id will come from $_POST[certifications]

    //insert a new relationship record for each certification found in the array
    settype($list_id,'integer');

	$insert_results = mysql_query($add_issues_query) or die(mysql_error());


//########################### ISSUES DESCRIPTION SELECTING ##########################
//set variables...
$issues_desc_table = "hyp_issues";

	    //Create query to RETRIEVE descriptions
	    $issues_desc_query = "SELECT * FROM $issues_desc_table WHERE id ='$list_id'";

        //Run query
		$id_results = mysql_query($issues_desc_query) or die(mysql_error());

        //get JUST the description using the built-in FETCH function: mysql_result (gets ONLY one value!)
		//$description = mysql_result($cd_results,0,1);

        WHILE ($row = mysql_fetch_array($id_results)){

        	$description = $row['desc'];
                //*** LOOKUP & ADD POINTS FOR THESE QUALIFICATIONS ***
                $points = $row['points'];
                $ranking = $ranking + $points;
                $issue_rank = $issue_rank + $points;

            }//end getting the description row

 	       //add to print block
 	   		$combined_issues_print_block .= "<li>$description</li>";



}//end insert issues foreach block


$combined_issues_print_block .="</ul>";

//+++++++++++++++++++++++++ END ISSUES ADD AND VERIFY BLOCK ++++++++++++++++++++


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


//########################### EDUCATION DESCRIPTION SELECTING ##########################
//set variables...
$edu_desc_table = "education";

	    //Create query to RETRIEVE descriptions
	    $edu_desc_query = "SELECT * FROM $edu_desc_table WHERE id ='$list_id'";

        //Run query
		$ed_results = mysql_query($edu_desc_query) or die(mysql_error());

        //get JUST the description using the built-in FETCH function: mysql_result (gets ONLY one value!)
		//$description = mysql_result($cd_results,0,1);

        WHILE ($row = mysql_fetch_array($ed_results)){

        	$description = $row['desc'];

            //*** LOOKUP & ADD POINTS FOR THESE QUALIFICATIONS ***
                $points = $row['points'];
                $ranking = $ranking + $points;
                $edu_rank = $edu_rank + $points;

            }//end getting the description row

 	       //add to print block
 	   		$combined_edu_print_block .= " $description,";



}//end insert certification foreach block

//trim Combined_certs_print_block to get rid of the last comma
$cleanup = strlen($combined_edu_print_block)-1; //one less than string length
$combined_edu_print_block = substr($combined_edu_print_block,0,$cleanup);

//+++++++++++++++++++++++++ END EDUCATION ADD AND VERIFY BLOCK ++++++++++++++++++++


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


//########################### STYLES DESCRIPTION SELECTING ##########################
//set variables...
$styles_desc_table = "hyp_styles";

	    //Create query to RETRIEVE descriptions
	    $styles_desc_query = "SELECT * FROM $styles_desc_table WHERE id ='$list_id'";

        //Run query
		$id_results = mysql_query($styles_desc_query) or die(mysql_error());

        //get JUST the description using the built-in FETCH function: mysql_result (gets ONLY one value!)
		//$description = mysql_result($cd_results,0,1);

        WHILE ($row = mysql_fetch_array($id_results)){

        	$description = $row['desc'];

            //*** LOOKUP & ADD POINTS FOR THESE QUALIFICATIONS ***
                $points = $row['points'];
                $ranking = $ranking + $points;
                $styles_rank=$styles_rank + $points;

            }//end getting the description row



 	       //add to print block
 	   		$combined_styles_print_block .= "<li>$description</li>";

}//end insert issues foreach block


$combined_styles_print_block .="</ul>";

//+++++++++++++++++++++++++ END STYLES ADD AND VERIFY BLOCK ++++++++++++++++++++


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

//Create query to INSERT values $affil_id and $list_id:  only $list_id changes, $affil_id stays the same through loop
//This query has to be defined repeatedly in loop to work... I have WHY!?
$add_org_query = "INSERT INTO $org_id_table (rel_id, list_id, affil_id) VALUES('','$list_id','$affil_id')";   //$list_id will come from $_POST[certifications]

    //insert a new relationship record for each certification found in the array
    settype($list_id,'integer');

	$insert_results = mysql_query($add_org_query) or die(mysql_error());


//########################### ISSUES DESCRIPTION SELECTING ##########################
//set variables...
$org_desc_table = "hyp_organizations";

	    //Create query to RETRIEVE descriptions
	    $org_desc_query = "SELECT * FROM $org_desc_table WHERE id ='$list_id'";

        //Run query
		$od_results = mysql_query($org_desc_query) or die(mysql_error());

        //get JUST the description using the built-in FETCH function: mysql_result (gets ONLY one value!)
		//$description = mysql_result($cd_results,0,1);

        WHILE ($row = mysql_fetch_array($od_results)){

        	$description = $row['desc'];

            //*** LOOKUP & ADD POINTS FOR THESE QUALIFICATIONS ***
                $points = $row['points'];
                $ranking = $ranking + $points;
                $org_rank=$org_rank + $points;

            }//end getting the description row


 	       //add to print block
 	   		$combined_org_print_block .= "<li>$description</li>";

}//end insert issues foreach block

$combined_org_print_block .="</ul>";

//+++++++++++++++++++++++++ END ISSUES ADD AND VERIFY BLOCK ++++++++++++++++++++


//####################### CALCULATE RANKING/STARS ###################

//deduct points for working out of a home)
if ($_POST['facility_type']="A Home"){
  $ranking -= 1.5;
}

//give points for having a receptionist
if ($_POST['receptionist']="yes"){
  $ranking += 1.5;
}

//This if makes sure we're not ranking a lead
if (($membership_status=="Affiliate")||($membership_status=="Pending Contract"))
{
	$rank_calc=$ranking/2;
	if($rank_calc>=20)
	{
	    $ranking=5;
	    $rank_graphic="5 stars.jpg";
	    $membership_status="Affiliate";
	    $sales_stage="93 - Sale - Open to New products";
	}
	If(($rank_calc >= 18)&&($rank_calc <20))
	{
		$ranking=4.5;
	    $rank_graphic="4.5 stars.jpg";
	    $membership_status="Affiliate";
	    $sales_stage="93 - Sale - Open to New products";
	}
	If(($rank_calc >= 16)&&($rank_calc <18))
	{
		$ranking=4;
	    $rank_graphic="4 stars.jpg";
	    $membership_status="Affiliate";
	    $sales_stage="93 - Sale - Open to New products";
	}
	If(($rank_calc >= 14)&&($rank_calc <16))
	{
		$ranking=3.5;
	    $rank_graphic="3.5 stars.jpg";
	    $membership_status="Affiliate";
	    $sales_stage="93 - Sale - Open to New products";
	}
	If(($rank_calc >= 12)&&($rank_calc <14))
	{
		$ranking=3;
	    $rank_graphic="3 stars.jpg";
	    $membership_status="Affiliate";
	    $sales_stage="93 - Sale - Open to New products";
	}
	If(($rank_calc >= 10)&&($rank_calc <12))
	{
		$ranking=2.5;
	    $rank_graphic="2.5 stars.jpg";
	    $membership_status="Affiliate";
	    $sales_stage="93 - Sale - Open to New products";
	}
	If(($rank_calc >= 8)&&($rank_calc <10))
	{
		$ranking=2;
	    $rank_graphic="2 stars.jpg";
	    $membership_status="Affiliate";
	    $sales_stage="93 - Sale - Open to New products";
	}
	If(($rank_calc >= 6)&&($rank_calc <8))
	{
		$ranking=1.5;
	    $rank_graphic="1.5 stars.jpg";
	    $membership_status="Provisional Affiliate";
	    $sales_stage="93 - Sale - Open to New products";
	
	}
	If(($rank_calc >= 4)&&($rank_calc <6))
	{
		$ranking=1;
	    $rank_graphic="1 stars.jpg";
	    $membership_status="Needs Admin Review";
	    $sales_stage="93 - Sale - Open to New products";
	}
	If($rank_calc < 4)
	{
		$ranking=0;
	    $rank_graphic="rejected.jpg";
	    $membership_status="Needs Admin Approval";
	    $sales_stage="93 - Sale - Open to New products";
	}

}else{
  
  $rank_graphic="not_ranked.jpg";
  
}//end the make-sure-its-not-a-lead IF block

//put $ranking, membership_status and sales_stage into affiliates database under this person's file
$table_name="affiliates";

//define the update query...
$ranking_sql="update $table_name set ranking='$ranking',membership_status='$membership_status',sales_stage='$sales_stage'WHERE id='$affil_id'";

//execute the sql statement and create a variable you can use to display or work with it
$results2=mysql_query($ranking_sql) or die(mysql_error());


//################################# E-MAIL NOTIFICATION ########################################
//# Strategy:  Initially, just use a couple of specific e-mail address I'll hard-code here
//# 			but later, have them pull target e-mail addresses from members db by 
//#				membership_type.  
//#			- sends an e-mail notification to Larry, Heather, Wendy (and PC's?) when a new
//#				affiliate applies and if they are accepted
//#			- will need to change heather's e-mail address after dropping webexone
//##############################################################################################

//************************ IF THE CANDIDATE IS ACCEPTED *******************

if ($ranking > 1.9){
//************************ FIRST INFORM THE MEMBERS ************************



$affilSalesRecipients = array(
							array("fName" => "Wendy",
							"eMail"=> "wendyneugent@hotmail.com"
							),
							array("fName"=>"Heather",
							"eMail"=>"hmerrill4@yahoo.com"
							),
							array("fName"=>"Larry",
							"eMail"=>"larry@americanhypnosisclinic.com"
							),
							array("fName"=>"Meredith",
							"eMail"=>"receptionist@americanhypnosisclinic.com"
							),
							array("fName"=>"Sue",
							"eMail"=>"ahcsue@hotmail.com"
							),							
							array("fName"=>"Nicole",
							"eMail"=>"nraynor@ec.rr.com"
							),
							array("fName"=>"Michele",
							"eMail"=>"landgrafm@yahoo.com"
							),
							array("fName"=>"Jim",
							"eMail"=>"gateman64@gmail.com"
							),
							array("fName"=>"Lindy",
							"eMail"=>"lindymueller03@yahoo.com"
							)
						);
						
foreach ($affilSalesRecipients as $mailTo){
  
  	$name = $mailTo['fName'];
  	$eMail = $mailTo['eMail'];
  	
  
	$body = "Dear $name, \r\n \r\nThis is just a quick note to let you know that $f_name $l_name from $physical_city, $physical_state has applied and been accepted as an American Hypnosis Clinic Affiliate with a $ranking star rating.\r\n\r\nYou can learn more about $f_name in the Affiliates section of our Intranet.  \r\nHopefully this addition to our team will help you place clients in that area. \r\n\r\n\r\nAll the best, \r\n \r\nLarry";

	$from = "From: larry@americanhypnosisclinic.com\r\nContent-type: text/plain\r\nX-mailer: PHP/".phpversion();
	$subject = "New AHC Affiliate Therapist in $physical_city, $physical_state";
	
//		echo "$eMail <br> $subject <br><br>$body<br><br>$from"; //TESTING PURPOSES
   
mail($eMail,$subject,$body,$from);
//echo $mailsend;

}
//************************* THEN INFORM THE APPLICANT ***************************




}// End "do-only-if-he/she-qualifies" IF BLOCK

//-------------------------------- end e-mails ------------------------------------------------

?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Contact Added</title>


<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
<meta name="Microsoft Border" content="none, default">
</head>

<body>
<h1>AHC Affiliate</h1>
<h2><em>AFFILIATE ADDED</em></h2>

<p>The following information was successfully added to <? echo "$table_name"; ?></p>

<table cellspacing=2 cellpadding=1>

<tr><td><? echo "Id: ".$affil_id."<br>Application recieved: $readable_date <br>Ranking: <img src=\"".$rank_graphic."\"> <br>Status: ".$membership_status." <hr>"; ?></td></tr>
<tr><td><? echo " $_POST[f_name]  $_POST[l_name] $combined_edu_print_block"; ?></td></tr>
<tr><td><? echo " $combined_certs_print_block <br><hr>"; ?></td></tr>
<tr><td><? echo " {$_POST[title]}, $_POST[company] "; ?></td></tr>
<tr><td><? echo " $_POST[website] "; ?></td></tr>
<tr><td><? echo " $_POST[address1] "; ?></td></tr>
<tr><td><? echo " $_POST[address2], $_POST[address3] $_POST[postcode]"; ?></td></tr>
<tr><td><? echo " Telephone(s): $_POST[prim_tel]  $_POST[sec_tel] $_POST[mob_tel]"; ?></td></tr>
<tr><td><? echo " Fax: $_POST[fax] "; ?></td></tr>
<tr><td><? echo " $_POST[email] "; ?></td></tr>
<tr><td><? echo "<hr><br>$combined_issues_print_block "; ?></td></tr>
<tr><td><? echo "<hr><br>$combined_styles_print_block "; ?></td></tr>
<tr><td><? echo "<hr><br>$combined_org_print_block <br><hr>"; ?></td></tr>


<tr><td><a href="affiliates_menu.php">Return to Main Menu</a>  <a href="show_addaffiliate.php">Add Another</a></td></tr>
</table>


</body>
</html>
