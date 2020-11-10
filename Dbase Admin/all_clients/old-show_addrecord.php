<?php
if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
}

?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Add a Client</title>

<link REL=STYLESHEET type="text/css" href="http://www.americanhypnosisclinic.com/style.css">

<!-- LOAD THE CODE TO FILTER FROM A LARGE SELECT LIST -->
<SCRIPT TYPE="text/javascript" SRC="filterlist.js"></SCRIPT> 

<script language="javascript">

function format_sales_contact_next(){
	window.alert("Setup/Calculate sales_contact_next");
	}
	
function format_date_client_sold(){
	window.alert("Setup/Calculate date_client_sold");
	}
	monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31)
	
	function populateDays(monthChosen){		//creates new variable called monthChosen from result from the month drop down list?
		monthStr = monthChosen.options[monthChosen.selectedIndex].value //month STRING = the value of the selected index ex: 4 for May
		if (monthStr !="") { 				// if something was actually chosen then...
			theMonth=parseInt(monthStr)		//The choice again -> but makes sure it's keeping just the number, not a string
			
			document.myForm.days.options.length = 0	//clears the options menu
			for (i=0;i<monthDays[theMonth];i++){	// Monthdays is the array holding the max days in the month
				document.myForm.days.options[i] = new Option(i+1) //new Option() must be a system function that adds another option with what's in ()... I imaging you could use strings ("day"+i) for example
				}
			}
		}
	
	function populateDays0(monthChosen0){		//creates new variable called monthChosen from result from the month drop down list?
		monthStr0 = monthChosen0.options[monthChosen0.selectedIndex].value //month STRING = the value of the selected index ex: 4 for May
		if (monthStr0 !="") { 				// if something was actually chosen then...
			theMonth0=parseInt(monthStr0)		//The choice again -> but makes sure it's keeping just the number, not a string
			
			document.myForm.days0.options.length = 0	//clears the options menu
			for (i=0;i<monthDays[theMonth0];i++){	// Monthdays is the array holding the max days in the month
				document.myForm.days0.options[i] = new Option(i+1) //new Option() must be a system function that adds another option with what's in ()... I imaging you could use strings ("day"+i) for example
				}
			}
		}

//	document.myForm.months.selectedIndex=0
</script>


<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top"> 

<form method="POST" name = "myForm" action="do_addrecord.php">


<table border="0" width="849" id="table1">
	<tr>
		<td>
<font size = 3 face="Arial"><input type="submit" name="submit" value="Add Record"><input type="submit" value="Look Up" name="lookup_client"></font><!-- #########################BODY STARTS HERE ############################### --><!-- SETUP HIDDEN FILDS FOR DATES TO BE FORMATTED FOR/XFERED TO PHP --><!-- #####################  START THE FORM HERE ############################### --><font size="3" face="Arial"><input type="submit" value="Edit" name="edit_client"><input type="submit" value="Save" name="save_client"></font><p><br>
		Id# <font size="3" face="Arial">
		<input type="text" name="client_id" size=8 maxlength=8></font></td>
		<td valign=middle width="291">
<h1><font size="3"><br>
</font>Client Info</h1></td>
		<td width="251" valign=middle>
		<p align="right" style="text-align: right">Alerts:<br>
<select name="client_flags" value="None">
	<option value="None" selected>None</option>
	<option value="**NO GLASSES!!!" font color="red">**NO GLASSES!!!</option>
	<option value="COLLECT MONEY">COLLECT MONEY</option>
	<option value="NO-SHOW 1X - WARN">NO-SHOW 1X - WARN</option>
	<option value="NO SHOW 1X - HAS BEEN WARNED">NO SHOW 1X - HAS BEEN WARNED</option>
	<option value="NO-SHOW 2X - CHARGE $35">NO-SHOW 2X - CHARGE $35</option>
	<option value="NO-SHOW 2X - has been charged">NO-SHOW 2X - has been charged</option>
	<option value="REFUSE SERVICE">REFUSE SERVICE</option>
	<option value="Other">Other</option>




</select></td>
	</tr>
</table>

<table cellspacing=3 cellpadding=3 width="851" border="0">
<tr>
<td width="386" height="44">

<p style="margin-top: 6px; margin-bottom: 6px; text-align:center"><font face="Arial">Name:<font size="3"><input type="text" name="first_name" size=15 maxlength=20></font> Last:<font size="3"><input type="text" name="last_name" size=20 maxlength=30></font></font></p>
</td>

<td width="219" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px solid #CCCCFF">
<p style="margin-top: 2px; margin-bottom: 2px; text-align:right"><font face="Arial">Sales Category:
<font size="3">
<br>
</font>Date Sold:<font size="3" face="Arial"> </font></font></p></td>

<td width="219" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px solid #CCCCFF">
<p align="left">
<font size="3" face="Arial">
<select name="sales_category" value="Lead">
	<option value="Lead" selected>Lead</option>
	<option value="Client">Client</option>
	<option value="Affiliate Lead">Affiliate Lead</option>
	<option value="Affiliate Client">Affiliate Client</option>
	<option value="Class Lead">Class Lead</option>
	<option value="Class Client">Class Client</option>
	<option value="Employee">Employee</option>
	<option value="Vendor">Vendor</option>
	<option value="Other">Other</option>




</select><br>
<input type="text" name="date_client_sold" size=14 maxlength=100></font></td>

</tr>

<tr>
<td width="386">
<p style="margin-top: 2px; margin-bottom: 2px"><font face="Arial">Phone (Home):<font size="3"><input type="text" name="home_phone" size=15 maxlength=15></font><br>
Phone (Work): <font size="3"> 
<input type="text" name="work_phone" size=15 maxlength=150></font> 
</font> </p>
<p style="margin-top: 2px; margin-bottom: 2px"><font face="Arial">Ext:
<font size="3">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="phone_ext" size=7 maxlength=7></font><br>
Phone (Other): <font size="3"> 
<input type="text" name="mobile_phone" size=15 maxlength=15></font>
</font> </p>
</td>

<td bgcolor="#CCCCFF" align="center" colspan="2">
<p style="margin-top: 2px; margin-bottom: 2px"><font face="Arial">
<strong style="font-weight: 400">Sales Stage:&nbsp; </strong><font size="3">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="sales_stage" value="1- Call Immediately">
	<option value="1- Call Immediately" selected>1- Call Immediately</option>
	<option value="2- Call AM">2- Call AM</option>
	<option value="3 - Call Afternoon (12:00-3:00)">3 - Call Afternoon (12:00-3:00)</option>
	<option value="4 - Call Late Afternoon (3:00-6:00)">4 - Call Late Afternoon (3:00-6:00)</option>
	<option value="5 - Call AM ">5 - Call AM (2nd Time)</option>
	<option value="6 - Call Afternoon ">6 - Call Afternoon (2nd Time)</option>
	<option value="7 - Call Evening ">7 - Call Evening (6:00-8:00)</option>
	<option value="8 - Call Weekend">8 - Call Weekend</option>
	<option value="81 - Affiliate Pending">81 - Affiliate Pending</option>
	<option value="82 - No Affiliate Available">82 - No Affiliate Available</option>
	<option value="9 - Reverse Lookup/Brochure">9 - Reverse Lookup/Brochure</option>
	<option value="91 - Send Brochure">91 - Send Brochure</option>
	<option value="92 - Contact with Special Offer">92 - Contact with Special Offer</option>
	<option value="93 - Sale - Open to New products">93 - Sale - Open to New products</option>
	<option value="94 - Negative Response (give details)">94 - Negative Response (give details)</option>
	<option value="95 - Send CLASS brochure">95 - Send CLASS Brochure</option>
	<option value="96 - Send mailings only">96 - Send Mailings Only</option>
	<option value="99 - Possible sale - waiting on deposit">99 - Possible sale - waiting on deposit</option>

</select></font></font></p>
<p style="margin-top: 2px; margin-bottom: 2px"><font face="Arial">Sales Contact Next<strong style="font-weight: 400">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</strong>

<font size="3">

<select name="months" onchange="populateDays(this)">
	<option value="">Month</option>
	<option value="0">January</option>
	<option value="1">February</option>
	<option value="2">March</option>
	<option value="3">April</option>
	<option value="4">May</option>
	<option value="5">June</option>
	<option value="6">July</option>
	<option value="7">August</option>
	<option value="8">September</option>
	<option value="9">October</option>
	<option value="10">November</option>
	<option value="11">December</option>	
</select>

<select name="days" onchange="format_sales_contact_next();">
	<option>Day</option>
</select></font> <font size="3">

<select name="year" onchange="format_sales_contact_next();">
	<option value="">Year</option>
	<option value=2006 selected>2006</option>
	<option value=2007>2007</option>
	<option value=2009>2009</option>
	<option value=2010>2010</option>
	<option value=2011>2011</option>
	<option value=2012>2012</option>
	<option value=2013>2013</option>
	<option value=2014>2014</option>
	<option value=2015>2015</option>
	<option value=2016>2016</option>

	
</select></font></font></p>
<p style="margin-top: 2px; margin-bottom: 2px"><font face="Arial">
<strong style="font-weight: 400">Record Mgr/Program Counselor:&nbsp;
</strong>
<font size="3">
<select name="record_manager" value="None Selected" size="1">
	<option value="None Selected" selected>None Selected</option>
	<option value="Nicole Raynor" >Nicole Raynor</option>
	<option value="Carolyn Moser" >Carolyn Moser</option>
	<option value="Larry Volz" >Larry Volz</option>
	<option value="Maggie McCutcheon" >Maggie McCutcheon</option>
	<option value="Sue Kochanski" >Sue Kochanski</option>
	<option value="Meredith Barnes" >Meredith Barnes</option>
	<option value="Rachael Scantling" >Rachael Scantling</option>
	<option value="Other" >Other</option>

</select></font></font></p>
</td>
</tr>

<tr>
<td width="386">
<p style="margin-top: 2px; margin-bottom: 2px">
<font face="Arial">Address:<br>
<font size="3">
<input type="text" name="address_1" size=40 maxlength=50></font><br>
<font size="3">
<input type="text" name="address_2" size=40 maxlength=50></font><br>
City:<font size="3"><input type="text" name="city" size=25 maxlength=40></font> State:

<font size="3">

<select name="state">
	<option value="Alabama">Alabama</option>
	<option value="Alaska">Alaska</option>
	<option value="Arizona">Arizona</option>
	<option value="Arkansas">Arkansas</option>
	<option value="California">California</option>
	<option value="Colorado">Colorado</option>
	<option value="Connecticut">Connecticut</option>
	<option value="Delaware">Delaware</option>
	<option value="Columbia">Columbia</option>
	<option value="Florida">Florida</option>
	<option value="Georgia">Georgia</option>
	<option value="Hawaii">Hawaii</option>
	<option value="Idaho">Idaho</option>
	<option value="Illinois">Illinois</option>
	<option value="Indiana">Indiana</option>
	<option value="Iowa">Iowa</option>
	<option value="Kansas">Kansas</option>
	<option value="Kentucky">Kentucky</option>
	<option value="Louisiana">Louisiana</option>
	<option value="Maine">Maine</option>
	<option value="Maryland">Maryland</option>
	<option value="Massachusetts">Massachusetts</option>
	<option value="Michigan">Michigan</option>
	<option value="Minnesota">Minnesota</option>
	<option value="Mississippi">Mississippi</option>
	<option value="Missouri">Missouri</option>
	<option value="Montana">Montana</option>
	<option value="Nebraska">Nebraska</option>
	<option value="Nevada">Nevada</option>
	<option value="New Hampshire">New Hampshire</option>
	<option value="New Jersey">New Jersey</option>
	<option value="New Mexico">New Mexico</option>
	<option value="New York">New York</option>
	<option value="North Carolina">North Carolina</option>
	<option value="North Dakota">North Dakota</option>
	<option value="Ohio">Ohio</option>
	<option value="Oklahoma">Oklahoma</option>
	<option value="Oregon">Oregon</option>
	<option value="Pennsylvania">Pennsylvania</option>
	<option value="Rhode Island">Rhode Island</option>
	<option value="South Carolina">South Carolina</option>
	<option value="South Dakota">South Dakota</option>
	<option value="Tennessee">Tennessee</option>
	<option value="Texas">Texas</option>
	<option value="Utah">Utah</option>
	<option value="Vermont">Vermont</option>
	<option value="Virginia" selected>Virginia</option>
	<option value="Washington">Washington</option>
	<option value="West Virginia">West Virginia</option>
	<option value="Wisconsin">Wisconsin</option>
	<option value="Wyoming">Wyoming</option>
</select>

</font>&nbsp; <br>
Zip: <font size="3"> <input type="text" name="zip" size=15 maxlength=15></font></font></p>
</td>

<!-- ################ REFERRED BY STRATEGY######################
1 - Set up a seperate page with a php script to populate a list of clients that autofills as you type last name
(dump the current javascript)
2 - Do the same with physicians
3 - set up an onclick for client and physician radio buttons that calls a javascript function client_choice() or
physician_choice()
4 - either one writes a cookie using javascript that holds a variable for the client or therapists name
5 - start a while loop in javascript checking to see when the variable in the cookie has changed
5 - open the php document with javascript (update an index so it only does this once within the loop)
6 - the php page does a query to find the person filling in names as you type.  When you click save it
saves the information to the cookie, focuses on the original window and closes the php/mysql window
7 - the while loop notices the change in the cookie - draws the information from the cookie and enters it into
the appropriate field to be saved when the page is saved
Frackin YEAH BABY!!!


 -->
<td bgcolor="#CCCCFF" align="center" valign="top" rowspan="2" colspan="2">
<p style="margin-top: 2px; margin-bottom: 2px; text-align:center"><font face="Arial">Referred By: 
<i>
<font size="2">
<br>
<input type="radio" value="0" name="referral_category" checked> Advertising? 
<input type="radio" value="1" name="referral_category">A Client?&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" value="2" checked name="referral_category">A Physician?</font></i></font></p>
<p style="margin-top: 2px; margin-bottom: 2px; text-align:center"><i><font face="Arial" size="2">
<A HREF="javascript:myfilter.set('^A')">A</A> 
<A HREF="javascript:myfilter.set('^B')">B</A> 
<A HREF="javascript:myfilter.set('^C')">C</A> 
<A HREF="javascript:myfilter.set('^D')">D</A> 
<A HREF="javascript:myfilter.set('^E')">E</A> 
<A HREF="javascript:myfilter.set('^F')">F</A> 
<A HREF="javascript:myfilter.set('^G')">G</A> 
<A HREF="javascript:myfilter.set('^H')">H</A> 
<A HREF="javascript:myfilter.set('^I')">I</A> 
<A HREF="javascript:myfilter.set('^J')">J</A> 
<A HREF="javascript:myfilter.set('^K')">K</A> 
<A HREF="javascript:myfilter.set('^L')">L</A> 
<A HREF="javascript:myfilter.set('^M')">M</A> 
<A HREF="javascript:myfilter.set('^N')">N</A> 
<A HREF="javascript:myfilter.set('^O')">O</A> 
<A HREF="javascript:myfilter.set('^P')">P</A> 
<A HREF="javascript:myfilter.set('^Q')">Q</A> 
<A HREF="javascript:myfilter.set('^R')">R</A> 
<A HREF="javascript:myfilter.set('^S')">S</A> 
<A HREF="javascript:myfilter.set('^T')">T</A> 
<A HREF="javascript:myfilter.set('^U')">U</A> 
<A HREF="javascript:myfilter.set('^V')">V</A> 
<A HREF="javascript:myfilter.set('^W')">W</A> 
<A HREF="javascript:myfilter.set('^X')">X</A> 
<A HREF="javascript:myfilter.set('^Y')">Y</A> 
<A HREF="javascript:myfilter.set('^Z')">Z</A> 

 </font>
<font face="Arial" size="1"><A HREF="javascript:myfilter.reset()">(ALL)</A></font></i><font face="Arial"><br>
<font size="3">
<select name="referred_by" value="****ASK!!!!****">
	<option value="Unasked" selected>****Which Ad Venue?****</option>
	<option value="BancMarc (trade organization)">BancMarc (trade organization)</option>
	<option value="Healthy Life Referral" >Healthy Life Referral</option>
	<option value="James River Trade (Trade Organization)" >James River Trade (Trade Organization)</option>
	<option value="Live Presentation" >Live Presentation</option>
	<option value="Magazine - Psychology Today" >Magazine - Psychology Today</option>
	<option value="Newspaper - 50+ in Richmond" >Newspaper - 50+ in Richmond</option>
	<option value="Newspaper - Richmond Times" >Newspaper - Richmond Times</option>
	<option value="Newspaper - Virginia Pilot" >Newspaper - Virginia Pilot</option>
	<option value="Chesterfield Observer" >Newspaper - Chesterfield Observer</option>
	<option value="Unknown Newspaper" >Newspaper - Unknown </option>
	<option value="Radio - Rich - K95 Country with Lori Kelly" >Radio - Rich - K95 Country with Lori Kelly</option>
	<option value="Unknown Radio" >Radio - Unknown </option>
	<option value="Referral - Ex-patient/friend" >Referral - Ex-patient/friend</option>
	<option value="Referral - Medical" >Referral - Medical</option>
	<option value="Telephone Book" >Telephone Book</option>
	<option value="Television" >Television</option>
	<option value="Unknown to Client" >Unknown to Client</option>
	<option value="Unusual -Other" >Unusual/Other</option>
	<option value="Virginia Living Magazine" >Magazine - Virginia Living </option>
	<option value="Web Search" >Web Search</option>

</select><br>
</font><i><font size="2">Details:</font></i><br>
<font size="3">
<input type="text" name="referred_by_details" size=37 maxlength=100></font></font></p>
<p style="margin-top: 2px; margin-bottom: 2px; text-align:center"><font size="3" face="Arial">
<input type="button" value="Add a Doctor" name="doctor_button"><input type="button" value="Send Thank You" name="thanks_button"></font></p>
<p style="margin-top: 2px; margin-bottom: 2px; text-align:center">
&nbsp;<p style="margin-top: 2px; margin-bottom: 2px; text-align:center">
<i><font size="2">Why Us?</font></i><br>
<font size="3" face="Arial">
<textarea name="why_us" cols=41 rows=5 wrap=virtual></textarea></font></td>

</tr>

<tr>
<td width="386">
<p style="margin-top: 2px; margin-bottom: 2px"><font face="Arial">e-mail:
<font size="3"><input type="text" name="e_mail" size=40 maxlength=55></font></font></td>

</tr>

<tr>
<td width="386" valign="top" bgcolor="#C0C0C0" rowspan="2">
<p style="margin-top: 2px; margin-bottom: 2px"><font face="Arial">Primary Goal 
of Therapy:<br>
<font size="3">
<select name="primary_goal" value="1- Call Immediately">
	<option value="Choose One" selected>Choose One</option>
	<option value="ADD/ADHD">ADD/ADHD</option>
	<option value="Alcohol Addiction">Alcohol Addiction</option>
	<option value="Anger Management">Anger Management</option>
	<option value="Childbirth">Childbirth</option>
	<option value="Class - Certified Hypnotherapist">Class - Certified 
	Hypnotherapist</option>
	<option value="Class - CHt and MHt">Class - CHt and MHt</option>
	<option value="Class - Master Hypnotherapy">Class - Master Hypnotherapy</option>
	<option value="Class - Continuing Ed.">Class - Continuing Ed.</option>
	<option value="Drug Addiction">Drug Addiction</option>
	<option value="Emotional Self-Improvement">Emotional Self-Improvement</option>
	<option value="Fibromyalgia (FMS)">Fibromyalgia (FMS)</option>
	<option value="Gambling">Gambling</option>
	<option value="Hypertension (High Blood Pressure)">Hypertension (High Blood 
	Pressure)</option>
	<option value="Irritable Bowel Syndrome (IBS)">Irritable Bowel Syndrome 
	(IBS)</option>
	<option value="Memory Improvement">Memory Improvement</option>
	<option value="Morning Sickness">Morning Sickness</option>
	<option value="Motivation">Motivation</option>
	<option value="Obsessive/Compulsive">Obsessive/Compulsive</option>
	<option value="Other">Other</option>
	<option value="Pain Management">Pain Management</option>
	<option value="Phobia">Phobia</option>
	<option value="Regression">Regression</option>
	<option value="Self Esteem">Self Esteem</option>
	<option value="Sleep">Sleep</option>
	<option value="Smoking Cessation">Smoking Cessation</option>
	<option value="Sports Program">Sports Program</option>
	<option value="Stress/Anxiety">Stress/Anxiety</option>
	<option value="Weight Loss">Weight Loss</option>
	<option value="Wellness Program">Wellness Program</option>
</select></font></font><p style="margin-top: 2px; margin-bottom: 2px">Secondary 
Goal (If applicable):<br>
<font size="3" face="Arial">
<input type="text" name="secondary_goal" size=33 maxlength=150></font><p style="margin-top: 2px; margin-bottom: 2px">
Primary Motivations to Change:<br>
<font size="3" face="Arial">
<input type="text" name="motivation" size=48 maxlength=150></font><p style="margin-top: 2px; margin-bottom: 2px">
<font size="3" face="Arial">
<br>
</font><font face="Arial"><strong style="font-weight: 400">Additional Information:</strong><br />
<font size="3">
<textarea name="additional_information" cols=41 rows=5 wrap=virtual></textarea></font></font><p style="margin-top: 2px; margin-bottom: 2px; text-align:center">
<font size="3" face="Arial">
<input type="submit" name="submit0" value="Add Contact Log"</p></font><p style="margin-top: 2px; margin-bottom: 2px">
<font face="Arial">Most Recent Contacts: </font>
<p style="margin-top: 2px; margin-bottom: 2px">
<font size="3" face="Arial">
<textarea name="contact_logs" cols=41 rows=9 wrap=virtual></textarea></font><p style="margin-top: 2px; margin-bottom: 2px">
&nbsp;<p style="margin-top: 2px; margin-bottom: 2px">
&nbsp;<p style="margin-top: 2px; margin-bottom: 2px; text-align:center">
&nbsp;</td>

<td bgcolor="#339933" align="center" height="92" colspan="2">
<p align="center" style="text-align: center; margin-top: 6px; margin-bottom: 6px">
<input type="submit" value="Schedule" name="schedule_button"><input type="submit" value="Payment" name="financial_button"></p>
<p align="center" style="text-align: center; margin-top: 6px; margin-bottom: 6px">First&nbsp;<font size="3" face="Arial"><input type="text" name="first_appointment" size=10 maxlength=10></font><font face="Arial">&nbsp; Next:</font><font size="3" face="Arial">
<input type="text" name="next_appointment" size=10 maxlength=10></font><font face="Arial">&nbsp; Recent:</font><font size="3" face="Arial"><input type="text" name="most_recent_appointment" size=10 maxlength=10></font><p style="margin-top: 2px; margin-bottom: 2px; text-align:center">&nbsp;</td>

</tr>

<tr>

<td bgcolor="#339933" align="left" width="427" height="508" colspan="2">
<font face="Arial">

<p style="text-align: center; margin-top: 6px; margin-bottom: 6px">IGOR 
CALCULATIONS GO HERE</td>

</tr>

<tr>
<td colspan=3 align=center height="95">
<p style="margin-top: 2px; margin-bottom: 2px; text-align:center">
<font face="Arial">
&nbsp;</font><font size="3" face="Arial"><input type="submit" name="submit2" value="Add Record"</p><input type="submit" value="Look Up" name="lookup_client0"></font><!-- #########################BODY STARTS HERE ############################### --><!-- SETUP HIDDEN FILDS FOR DATES TO BE FORMATTED FOR/XFERED TO PHP --><!-- #####################  START THE FORM HERE ############################### --><font size="3" face="Arial"><input type="submit" value="Edit" name="edit_client0"><input type="submit" value="Save" name="save_client0"></font></td>
</tr>

</table>

</form>



<!-- ###################  FILTER LIST SCRIPT STUFF FOR referred_by ####################### -->
<SCRIPT TYPE="text/javascript">
<!--
// DEFINE A NEW FILTERLIST OBJECT
var myfilter = new filterlist(document.myForm.referred_by);
//-->
</SCRIPT>

<!-- ____________________________________________________________________________________ -->

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
