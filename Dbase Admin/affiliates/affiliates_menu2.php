<?php
//###################### SESSION SECURITY CHECK ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

IF ($auth !="ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/authenticate.htm");
	exit;
}

//------------------------------ end security check --------------------------

//############################## DO LOG ENTRY ##############################################



//Get my class and methods
include_once("../../ahcDatabase_class.php");

//do log entry
$now=time();
$list_id=8; //code for 'view affiliates menu'

//CONNECT TO DB
$ahcDB->dbConnect();

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

// ####################### SETUP FOR ZIP CODE LOOKUP #############################################

	$fromZipCode="";
	if ( isset($HTTP_GET_VARS["fromZipCode"]) )$fromZipCode=trim($HTTP_GET_VARS["fromZipCode"]);
	if ( isset($HTTP_POST_VARS["fromZipCode"]) )$fromZipCode=trim($HTTP_POST_VARS["fromZipCode"]);
	$toZipCode="";
	if ( isset($HTTP_GET_VARS["toZipCode"]) )$toZipCode=trim($HTTP_GET_VARS["toZipCode"]);
	if ( isset($HTTP_POST_VARS["toZipCode"]) )$toZipCode=trim($HTTP_POST_VARS["toZipCode"]);
	$toZipCodeMoving=$toZipCode;
	$fromZipCodeMoving=$fromZipCode;

	include( "DrivingDistanceCalcFunctions.php" );
//################################################################################################



//################################ CONNECT ########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//######################### COUNT DB AFFILIATES QUERY #####################################

$sql = "SELECT count(id) FROM $table_name";
$result=mysql_query($sql,$connection);// or die(mysql_error())

$count = mysql_result($result,0,"count(id)");// or die(mysql_error())

//############################### COUNT DB ACTIVE QUERY ###################################

$sql2 = "SELECT count(id) FROM $table_name WHERE membership_status LIKE '%Affiliate%'";
$result2=mysql_query($sql2,$connection); //or die(mysql_error());

$count_active = mysql_result($result2,0,"count(id)");// or die(mysql_error())

//############################## COUNT DB NEW AFFILIATES QUERY ###################################
$count_new = 0;
$this_moment = time();
$one_week = 60*60*24*7; //number of seconds in a week for timestamp
$one_week_ago = $this_moment-$one_week;
$AffiliateWord = "%Affiliate%";





//????????????????????????????? WHY NOT WORKING??!!!?????????????????????????????????????????????
$sql3 = "SELECT count(id) FROM $table_name WHERE date_applied >= $one_week_ago AND membership_status LIKE '$AffiliateWord'";

//WORKS FINE EXCEPT FOR THE and membership_status='affiliate'
//????????????????????????????????????????????????????????????????????????????????????????????

$result3=mysql_query($sql3,$connection);// or die(mysql_error())




//??????????????????PROBLEM!!! IF NO NEW CLIENTS - SCREEN GOES BLANK HERE ???????????????????
$count_new = mysql_result($result3,0,"count(id)");// or die(mysql_error())

//?????????????????????????????????????????????????????????????????????????????????????????




//####################### MAKE NEW PERSON CLICK-LIST #####################################
$table_name2="affiliates";
if ($count_new > 0){
	$new_affiliate_string="";
    $get_new_affiliate_query = "SELECT id, f_name, l_name,company,ranking,membership_status FROM $table_name2 WHERE date_applied >= $one_week_ago AND membership_status NOT LIKE '%LEAD%' ORDER BY l_name";

	$new_affiliate_results = @mysql_query($get_new_affiliate_query);// or die(mysql_error())
    	while ($new_affiliates = mysql_fetch_array($new_affiliate_results)){
        	$new_id = $new_affiliates['id'];
        	$new_f_name = $new_affiliates['f_name'];
        	$new_l_name = $new_affiliates['l_name'];
        	$new_company = $new_affiliates['company'];
            $new_address2 = $new_affiliates['address2'];
            $new_address3 = $new_affiliates['address3'];
            $ranking = $new_affiliates['ranking'];
            $membership_status=$new_affiliates['membership_status'];
            
            $ranking = round($ranking);


            $new_affiliate_string .= "<a href=\"show_affiliate.php?id=$new_id\">
            <img border=\"0\" src=\"http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/affiliates/{$ranking}%20stars.jpg\" width=\"61\" height=\"12\">$new_f_name $new_l_name ($membership_status)";

            if ($new_address2 != ""){
            	$new_address_string .= " ($new_address2, $new_address3)</a>";
            }//close address entered "if" block
		$new_affiliate_string .="<br>";
        }//close while loop
        $new_affiliate_string .= "<br>";
    }//close if statement


//############ TODAY'S DATE ###################
$today = date("l, F jS, Y");

?>

<html>
<!-- ################################## OUTPUT & HYPERLINKS ####################################-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>AHC Affiliates: Main Menu</title>

<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
<meta name="Microsoft Border" content="none, default">
</head>

<body>
<table rowspan="2" border="0" width="100%">
	<tr>
		<td>
			<h1>AHC Affiliates  <i><br><font size="5" color="#000080">Main Menu</font></i></h1>
		</td>
		<td align="right" valign="top">
<!--			<em>Today is <? echo" $today "; ?></em><br> -->
			Total Affiliates & Leads in System: <strong><? echo "$count"; ?></strong>
		</td>
	</tr>
</table>
<br>
<table cellspacing=3 cellpadding=3 width="738">
<tr>
<td valign=top width="353" rowspan="2">
<p><strong>ACTIVE Affiliates: <? echo "$count_active"; ?></strong>
<br><i><font size="3"><a href="show_affiliatesbystate.php">By State</a> - <a href="show_affiliatesbylname.php">By Last Name</a> - <a href="show_affiliatesbyorg.php">By Clinic Name</a></font></i><br>
</p>
<br>

<font color="red">NEW</font> Affiliates This Week: <strong><? echo "$count_new"; ?></strong>
<br><br><? echo "$new_affiliate_string"; ?></ul>



</td>
<td align="left" valign="top">
<strong>Administration</strong>
<br><br>


	<a href="show_addaffiliate.php">Add a Person</a><br>
<br>
<strong>Leads:</strong><br>
	<a href="show_affil_leads_bystate.php">- By State</a><br>
	<a href="show_affil_leads_byname.php">- By Name</a><br>	
	<a href="show_affil_leads_bycontactnext.php">- By Contact Next</a><br>
	<a href="show_affil_leads_bymodified.php">- By Modified Date</a><br><br>
<br>		
    <a href="show_pending_affiliates.php">Show Pending</a> 
<br><a href="show_everyone.php">Show Everyone</a>		
<br><br><br>	
	<a href="pick_delaffiliate.php">Delete an Affiliate<br></a><font color="red">Administration Only</font>
<!-- </ul> -->

</td>
<td align="center" valign="top" width="186">
<table cellspacing=3 cellpadding=3 width="186" id="table2">
<tr>
<td valign=top width="90%" bgcolor="#CCCCFF" align="left">
<table border="1" width="102%" id="table3">
	<tr>
		<td>
		<p align="center">Find The Closest Therapist</p>
		<form method="POST" action="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/affiliates/do_closest_therapist2.php">

			<input type="hidden" value="1"><!-- PUT CLIENT ID # HERE FROM SENDING PAGE!!! -->

			<p align="center">Enter Client Zip Code:<br>
			<input type="text" name="client_zip" size="20"></p>

			<p align="center"><input type="submit" value="Submit" name="B1"></p>

		</form>

		<p align="center"></td>
	</tr>
</table></td>
</tr>
</table>
</td>
</tr>
</table>

</body>

</html>