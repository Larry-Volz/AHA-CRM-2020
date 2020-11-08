<?php



//###################### SESSION SECURITY CHECK ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

IF ($auth !="ok"){
	header ("Location: authenticate.htm");
	exit;
}

//------------------------------ end security check --------------------------

//Get my class and methods
include_once("ahcDatabase_class.php");

include_once("show_allpcs_activities_today.php");

// ##################################### DO LOG ENTRY #######################################

$list_id=9;

//connect to db
$ahcDB->dbConnect(); $ahcDB->logEntry($list_id);


//Get new affiliates for this week
$count_new_affil_week = $ahcDB->countNewAffiliates();

//Get new affiliates for today

$count_new_today = 0;
$count_new_today = $ahcDB->countNewAffiliatesToday();


//Get new affiliates for month
$count_new_affil_month = $ahcDB->countNewAffiliatesMonth();

//Get total active affiliates
$count_active_affil = $ahcDB->countActiveAffiliates();


/*ECHO "<br>You're at inside_index_god";  DEBUGGING ??????????????????????????????????????????????????????????
*/
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">


<title>AHC Intranet Home</title>
<base target="_self">
<meta name="description" content="Go to www.AmericanHypnosisClinic.com if you'd like to learn more about The American Hypnosis Clinic!">


<meta name="Microsoft Border" content="r, default">
</head>

<body topmargin="2"><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<p align="center">
<img border="0" src="People%20banner%201.jpg" width="658" height="85" longdesc="../AHC8 - drop down navigation/hypnosis, hypnotherapy, hypnotist, hypnosis to quit smoking, weight loss hypnosis, hypnosis to lose weight" alt="Successful American Hypnosis Clinic Clients.  Pictures of people who succeeded with hypnotherapy."><br><hr></p>
<table border="0" id="table1" width="655">
	<tr>
		<td colspan="2">
		<p align="center"><b><font size="5"><font color="#000080">CEO Interface</font><br>
		</font><font size="4">Complete Access to All Functions &amp; Data<br>
&nbsp;</font></b></p>
			
		</td>
	</tr>
	<tr>
		<td width="492">
		<table border="1" width="99%" id="table2" cellspacing="3" cellpadding="2">
			<tr>
				<td width="112" align="center">&nbsp;</td>
				<td width="74" align="center"><b>Today</b></td>
				<td align="center"><b>Week</b></td>
				<td width="71" align="center"><b>Month</b></td>
				<td width="64" align="center"><b>YTD</b></td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CCCCFF" align="center"><b>Affiliates </b>
				<i><font size="2">New/Total</font></i></td>
				<td width="74" bgcolor="#CCCCFF" align="center">&nbsp;
				<? echo $count_new_today; ?></td>
				<td bgcolor="#CCCCFF" align="center">&nbsp;<? echo $count_new_affil_week; ?></td>
				<td width="71" bgcolor="#CCCCFF" align="center">&nbsp;<? echo $count_new_affil_month; ?></td>
				<td width="64" bgcolor="#CCCCFF" align="center">&nbsp;
				
				<? 
				
				//echo $count_active_affil; 
				
				//############################### COUNT DB ACTIVE QUERY ###################################
				$table_name="affiliates";

$sql2 = "SELECT count(id) FROM $table_name WHERE membership_status LIKE '%Affiliate%'";
$result2=mysql_query($sql2); //or die(mysql_error());

$count_active = mysql_result($result2,0,"count(id)");// or die(mysql_error())
echo $count_active;
				
				?>
				
				<i><font size="1">&nbsp;total</font></i></td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CCFFFF" align="center"><b>Sales</b></td>
				<td width="74" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#CCFFFF" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CCFFFF" align="center"><b>Leads</b></td>
				<td width="74" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#CCFFFF" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CCFFFF" align="center"><b>Highest Seller</b></td>
				<td width="74" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#CCFFFF" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CCFFFF" align="center">
				<p align="right"><i>$/hour</i></td>
				<td width="74" bgcolor="#CCFFFF" align="right">&nbsp;</td>
				<td bgcolor="#CCFFFF" align="right">&nbsp;</td>
				<td width="71" bgcolor="#CCFFFF" align="right">&nbsp;</td>
				<td width="64" bgcolor="#CCFFFF" align="right">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CCFFFF" align="center">
				<p align="right"><i>mods/hour</i></td>
				<td width="74" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#CCFFFF" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CCFFFF" align="center"><b>Lowest Seller</b></td>
				<td width="74" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#CCFFFF" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CCFFFF" align="center">
				<p align="right"><i>$/hour</i></td>
				<td width="74" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#CCFFFF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#CCFFFF" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CCFFFF" align="center">
				<p align="right"><i>mods/hour</i></td>
				<td width="74" bgcolor="#CCFFFF" align="right">&nbsp;</td>
				<td bgcolor="#CCFFFF" align="right">&nbsp;</td>
				<td width="71" bgcolor="#CCFFFF" align="right">&nbsp;</td>
				<td width="64" bgcolor="#CCFFFF" align="right">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#FFCCFF" align="center"><b>Best Therapist</b></td>
				<td width="74" bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#FFCCFF" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#FFCCFF" align="center">
				<p align="right"><i>Rating/votes</i></td>
				<td width="74" bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#FFCCFF" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#FFCCFF" align="center"><b>Worst Therapist</b></td>
				<td width="74" bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#FFCCFF" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#FFCCFF" align="center">
				<p align="right"><i>Rating/votes</i></td>
				<td width="74" bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#FFCCFF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#FFCCFF" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#FFFF99" align="center">
				<b>Best Ad $/cost</b></td>
				<td width="74" bgcolor="#FFFF99" align="center">&nbsp;</td>
				<td bgcolor="#FFFF99" align="center">&nbsp;</td>
				<td width="71" bgcolor="#FFFF99" align="center">&nbsp;</td>
				<td width="64" bgcolor="#FFFF99" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#FFFF99" align="center">
				<b>Worst Ad $/cost</b></td>
				<td width="74" bgcolor="#FFFF99" align="center">&nbsp;</td>
				<td bgcolor="#FFFF99" align="center">&nbsp;</td>
				<td width="71" bgcolor="#FFFF99" align="center">&nbsp;</td>
				<td width="64" bgcolor="#FFFF99" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CC99FF" align="center">
				<b>Ave. No. of Apts. Scheduled</b></td>
				<td width="74" bgcolor="#CC99FF" align="center">&nbsp;</td>
				<td bgcolor="#CC99FF" align="center">&nbsp;</td>
				<td width="71" bgcolor="#CC99FF" align="center">&nbsp;</td>
				<td width="64" bgcolor="#CC99FF" align="center">&nbsp;</td>
			</tr>

		</table>
			
		</td>
		<td width="249" align="center" valign="top" height="304">
		<table border="1" width="100%" id="table3">
			<tr>
				<td><font color="#000080" size="4"><b>Richmond Weather</b></font>
		 
<!-- START WEATHER RSS -->		 
		 <a href="http://wwwa.accuweather.com/forecast.asp?zipcode=23235&partner=40332">
<img src="http://wxport.accuweather.com/wxpost/graphic.aspx?zipcode=23235&type=61&partner=40332" border="0" height="73"
width="232" alt="WXPort"></a></td>
			</tr>
		</table>
		</td>
	</tr>
</table>

<!-- ######################## OUTPUT PC'S ACTIVITIES ################################## -->

<strong>All PCs Activities on <? echo "$readableDayLookup"; ?>: </strong><br><? echo "$OUTERactivityPrintBlock"; ?>




<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
