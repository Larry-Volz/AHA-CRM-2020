<?php


/*
####################### TASK STRATEGY ##############################

- Set up a link on desktop (under weather or in box) labeled FINANCIAL TASKS and a number of how many
- on linking to - a list of charges color coded - pending are red to charge now
- waiting on check are grey unless they have become due
- charged cards are green and no longer link except to delete them
- have a link to charge and a link to delete (on the right) 
- no modification.  If there is an error Mer can delete and ask the PC to send it through again correctly

*/
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

//Get my classes and methods and functions
include_once("ahcDatabase_class.php");

include_once("show_allpcs_activities_today.php");

include_once("includes/new_leads_functions.php");

include_once("includes/financial_task_includes.php");
//used around line 254...

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

<table border="0" id="table1" cellspacing="10">
	<tr>
		<td colspan="2">

		<p align="left"><b><font size="5"><font color="#000080">Operations Manager Interface</font><br>
		</font><font size="4">Complete Access to All Administrative Functions &amp; Data
&nbsp;</font></b></p>
			
		</td>
	</tr>
	<tr>
		<td valign="top" width="318">
		<table border="1" width="99%" id="table2" cellspacing="3" cellpadding="2">
			<tr>
				<td width="112" align="center"><b><font size="2">Click for 
				Details</font></b></td>
				<td width="74" align="center"><b>Today</b></td>
				<td align="center"><b>Week</b></td>
				<td width="71" align="center"><b>Month</b></td>
				<td width="64" align="center"><b>YTD</b></td>
			</tr>
			<tr>
				<td width="112" bgcolor="#CCCCFF" align="center"><b>
				<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/affiliates/affiliates_menu.php">Affiliates</a> </b>
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
				<td width="112" bgcolor="#CCFFFF" align="center"><b>
				<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/all_clients/show_all_leads.php">Leads</a></b></td>
				<td width="74" bgcolor="#CCFFFF" align="center">
					<?
						$end_date = time()+1;
						$start_date = $end_date-(60*60*24);
						
						$todays_leads = countNewLeads($start_date,$end_date);
						
						echo $todays_leads;
					
					?>				
				</td>
				<td bgcolor="#CCFFFF" align="center">
					<?
						$end_date = time()+1;
						$start_date = $end_date-(60*60*24*7);
						
						$weeks_leads = countNewLeads($start_date,$end_date);
						
						echo $weeks_leads;
					
					?>				
				</td>
				<td width="71" bgcolor="#CCFFFF" align="center">
					<?
						$end_date = time()+1;
						$start_date = $end_date-(60*60*24*31);
						
						$months_leads = countNewLeads($start_date,$end_date);
						
						echo $months_leads;
					
					?>				
				
				</td>
				<td width="64" bgcolor="#CCFFFF" align="center">
					<?
						$end_date = time()+1;
						$start_date = $end_date-(60*60*365);
						
						$years_leads = countNewLeads($start_date,$end_date);
						
						echo $years_leads;
					
					?>				
				
				</td>
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
 
		</table>
			
		</td>
		<td width="50%" align="center" valign="top" height="304">	

<table border="1" width="100%" id="table3">
	<tr>
		<td><a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/financial/accounting_tasks.php">Accounting Tasks Pending</a>: 
		
<? 
		$count_open_tasks = count_open_tasks();
		echo "<b>$count_open_tasks</b>";
		
?>		
		</td>
		<td>Confirmed Appointments:</td>
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
