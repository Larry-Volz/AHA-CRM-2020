<?
/* ############################## UN-COMMENT AFTER DEBUGGING ###################################
############################## END: UN-COMMENT AFTER DEBUGGING #################################*/


//Get my class and methods
include_once("../../ahcDatabase_class.php");

/*
//do basic security check
$ahcDB -> securityCheckBasic();
*/

global $affil_id;
$affil_id = $_POST['affil_id'];//WORKS!!  MOST IMPORTANT PART, EH

//CONNECT to DB
$ahcDB -> dbConnect(); 

//########################################## QUERY 1 ##############################################

$table_name = "affiliates";
//validate and make sure there IS an affiliate with that id#!!
//query
$chk_id = "SELECT id FROM $table_name WHERE id = $affil_id";
$chk_id_res=$ahcDB->doQuery($chk_id); 

//count # of rows in result...
$chk_id_num = mysql_num_rows($chk_id_res);

//deal with results of validation...

      
  //    $ahcDB->getAffiliatesVars($id); is SUPPOSED to replace below.  Doesn't give variables back...
      
      	//Do QUERY TO GET ALL FOR THE REQUESTED AFFILIATE ID
       	$sql = "SELECT * FROM $table_name WHERE id = $affil_id";
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
            $contact_next=$row['contact_next'];
            $close_city1=$row['close_city1'];
            $close_city2=$row['close_city2'];
			$close_city3=$row['close_city3'];
			$scheduling_method=$row['scheduling_method']; 
			$office_hours=$row['office_hours'];
			$online_calendar=$row['online_calendar'];
			$calendar_user_name=$row['calendar_user_name'];            
			$calendar_password=$row['calendar_password']; 

            }//close while loop that assigns values from fetch_array 
            

?>
<HTML>

<HEAD>
<TITLE>Application to Become an American Hypnosis Clinic Affiliate</TITLE>
<!-- PUT IN HEAD -->
<script language="javascript">
	monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31)
	
	function populateDays(monthChosen){		//creates new variable called monthChosen from result from the month drop down list?
		monthStr = monthChosen.options[monthChosen.selectedIndex].value //month STRING = the value of the selected index ex: 4 for May
		if (monthStr !="") { 				// if something was actually chosen then...
			theMonth=parseInt(monthStr)		//The choice again -> but makes sure it's keeping just the number, not a string
			
			document.add_affiliate.days.options.length = 0	//clears the options menu
			for (i=0;i<monthDays[theMonth];i++){	// Monthdays is the array holding the max days in the month
				document.add_affiliate.days.options[i] = new Option(i+1) //new Option() must be a system function that adds another option with what's in ()... I imaging you could use strings ("day"+i) for example
				}
			}
		}

</script>


<!-- PUT IN BODY -->

<STYLE>
<!--
.SGHeader    { font-family: Arial; font-size: 24pt; color: #000080; font-weight: bold; text-align: Left }
.SGInstructions { font-family: Arial; font-size: 12pt; color: #000000; font-weight: bold; text-align: Left; margin-bottom: -12 }
.SGSection   { font-family: Arial; font-size: 14pt; color: #000000; font-weight: bold; text-align: Left }
.SGQuestion  { font-family: Arial; font-size: 12pt; color: #000000; font-weight: bold; text-align: Left }
.SGQuestionCenter{ font-family: Arial; font-size: 12pt; color: #000000; font-weight: bold; text-align: Center}
.SGResponse  { font-family: Arial; font-size: 12pt; color: #000000; font-weight: normal; text-align: Left; background-color: #FFFFFF }
.SGResponseInstructions { font-family: Arial; font-size: 10pt; color: #000000; font-weight: bold; text-align: Left }
.SGNormalText    { font-family: Arial; font-size: 12pt; color: #000000; font-weight: normal; text-align: Left }
.SGWatermark  { font-family: Arial; font-size: 8pt; color: #000000; font-weight: normal; text-align: Left }
.SGHorizontalLine { color: #808080 }
-->
</STYLE>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
<meta name="Microsoft Border" content="none, default">
</HEAD>
<BODY onload="document.add_affiliate.months.selectedIndex=0;">

<H1><font face="Arial">AHC Affiliates: &nbsp; Modify an Affiliate</font><span style="font-weight: 400; font-style:italic"><font size="3"><br>
&nbsp;<? echo "$field_message "; ?></font></span></H1>

<FORM name="add_affiliate" method="POST" action="do_modaffiliate.php">

<INPUT TYPE="hidden" NAME = "id" VALUE = "<? echo $affil_id; ?>">

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0" CLASS="SGQuestion">
  <TR>
      <TD>
            <font face="Arial">
			</font><font size="2">First name</font><font size="2" color="#FF0000">*</font><font size="2"><br>
			</font>
            <INPUT TYPE="text" NAME="f_name" SIZE="35" value="<? echo $f_name; ?>"><font size="2"> </font>
			</font>
	<td>
            <font size="2" face="Arial">Last name</font><font size="2" color="#FF0000">*</font><font size="2" face="Arial"><br>
			</font><font face="Arial">
            <INPUT TYPE="text" NAME="l_name" SIZE="36" value="<? echo $l_name; ?>"></font></TD>
          </td>
          <TD WIDTH="43%">
            &nbsp;</TD>
        </TR>
      
    </TD>
 
        <TR>
          <TD WIDTH="43%">
            <font size="2" face="Arial">Title&nbsp;<br>
			</font><font size="2">
			<INPUT TYPE="text" NAME="title" SIZE="35" CLASS="SGResponse" value="<? echo $title; ?>"></font><font face="Arial" size="2">
			</font></TD>
          <TD WIDTH="55%">
            <font face="Arial"><font size="2">Name of Practice</font><font size="2" color="#FF0000">*<br>
			</font></font><font size="2">
            <INPUT TYPE="text" NAME="company" SIZE="36" CLASS="SGResponse" value="<? echo $company; ?>"></font></TD>    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="94%">
     
            <P ALIGN="right" CLASS="SGQuestion">
<span style="font-weight: 400"><font size="2">Address</font></span><font size="2" color="#FF0000">*</font><font size="2"><br>
            <INPUT TYPE="text" NAME="address1" SIZE="84" CLASS="SGResponse" value="<? echo $address1; ?>"></font><font face="Arial" size="2">
</font></P>
          </TD>
        </TR>
      </TABLE>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="32%">

            <P ALIGN="right" CLASS="SGQuestion">
<font size="2"><span style="font-weight: 400">City</span></font><font size="2" color="#FF0000">*</font><font size="2">
<br>
            <INPUT TYPE="text" NAME="address2" SIZE="35" CLASS="SGResponse" value="<? echo $address2; ?>"></font></P>
          </TD>
          <TD WIDTH="28%">
            <font face="Arial" size="2">&nbsp;</font><font size="2">State</font><font size="2" color="#FF0000">*</font><font size="2"><br>
            </font>
         

<?
//POPULATE STATE DROP-DOWN MENU WITH PREVIOUS SELECTION

$state_left_string = array("<option value=\"AL\"","<option value=\"AK\"","<option value=\"AZ\"","<option value=\"AR\"","<option value=\"CA\"","<option value=\"CO\"","<option value=\"CT\"","<option value=\"DE\"","<option value=\"DC\"","<option value=\"FL\"","<option value=\"GA\"","<option value=\"HI\"","<option value=\"ID\"","<option value=\"IL\"","<option value=\"IN\"","<option value=\"IA\"","<option value=\"KS\"","<option value=\"KY\"","<option value=\"LA\"","<option value=\"ME\"","<option value=\"MD\"","<option value=\"MA\"","<option value=\"MI\"","<option value=\"MN\"","<option value=\"MS\"","<option value=\"MO\"","<option value=\"MT\"","<option value=\"NE\"","<option value=\"NV\"","<option value=\"NH\"","<option value=\"NJ\"","<option value=\"NM\"","<option value=\"NY\"","<option value=\"NC\"","<option value=\"ND\"","<option value=\"OH\"","<option value=\"OK\"","<option value=\"OR\"","<option value=\"PA\"","<option value=\"RI\"","<option value=\"SC\"","<option value=\"SD\"","<option value=\"TN\"","<option value=\"TX\"","<option value=\"UT\"","<option value=\"VT\"","<option value=\"VA\"" ,"<option value=\"WA\"","<option value=\"WV\"","<option value=\"WI\"","<option value=\"WY\"");

$state_right_string = array(">Alabama (AL)</option>",">Alaska (AK)</option>",">Arizona (AZ)</option>",">Arkansas (AR)</option>",">California (CA)</option>",">Colorado (CO)</option>",">Connecticut (CT)</option>",">Delaware (DE)</option>",">Washington DC</option>",">Florida (FL)</option>",">Georgia (GA)</option>",">Hawaii (HI)</option>",">Idaho (ID)</option>",">Illinois (IL)</option>",">Indiana (IN)</option>",">Iowa (IA)</option>",">Kansas (KS)</option>",">Kentucky (KY)</option>",">Louisiana (LA)</option>",">Maine (ME)</option>",">Maryland (MD)</option>",">Massachusetts (MA)</option>",">Michigan (MI)</option>",">Minnesota (MN)</option>",">Mississippi (MS)</option>",">Missouri (MO)</option>",">Montana (MT)</option>",">Nebraska (NE)</option>",">Nevada (NV)</option>",">New Hampshire (NH)</option>",">New Jersey (NJ)</option>",">New Mexico (NM)</option>",">New York (NY)</option>",">North Carolina (NC)</option>",">North Dakota (ND)</option>",">Ohio (OH)</option>",">Oklahoma (OK)</option>",">Oregon (OR)</option>",">Pennsylvania (PA)</option>",">Rhode Island (RI)</option>",">South Carolina (SC)</option>",">South Dakota (SD)</option>",">Tennessee (TN)</option>",">Texas (TX)</option>",">Utah (UT)</option>",">Vermont (VT)</option>",">Virginia (VA)</option>",">Washington (WA)</option>",">West Virginia (WV)</option>",">Wisconsin (WI)</option>",">Wyoming (WY)</option>");

$state_abbrevs = array("AL","AK","AZ","AR","CA","CO","CT","DE","","FL","GA","HI","ID","IL","IN","IA","KS","KY","LA","ME","MD","MA","MI","MN","MS","MO","MT","NE","NV","NH","NJ","NM","NY","NC","ND","OH","OK","OR","PA","RI","SC","SD","TN","TX","UT","VT","VA","WA","WV","WI","WY");

$state_print = "<select name=\"address3\">";

	for ($i=0; $i<50; $i++){
	  
	 	$state_print .= $state_left_string[$i];
	 	
			if ($state_abbrevs[$i] == $address3){

			  $state_print .= "selected";
			  
			}//if first two letters match the selection #'s above, then selected'
		
	$state_print .= $state_right_string[$i];
	  
	}//end for/next loop
	
	$state_print.= "</select>";
	
echo $state_print;

?>

</TD>
          <TD WIDTH="38%">
            <font size="2">Zip</font><font size="2" color="#FF0000">*<br>
			</font><font size="2">
            <INPUT TYPE="text" NAME="postcode" SIZE="14" CLASS="SGResponse" value="<? echo $postcode; ?>"></font></TD>
        </TR>
      </TABLE>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="94%">
      <TABLE BORDER="0" WIDTH="99%">
        <TR>
          <TD WIDTH="32%">
            <P ALIGN="right" CLASS="SGQuestion">
<span style="font-weight: 400"><font size="2">Phone</font><font size="2" color="#FF0000">*</font></span><font size="2"><br>
            <INPUT TYPE="text" NAME="prim_tel" SIZE="29" CLASS="SGResponse" value="<? echo $prim_tel; ?>"></font></P>
          </TD>
          <TD WIDTH="66%">
            <font size="2" face="Arial">Alt. Phone</font><font size="2"><br>
			<INPUT TYPE="text" NAME="sec_tel" SIZE="38" CLASS="SGResponse" value="<? echo $sec_tel; ?>"></font></TD>
        </TR>
      </TABLE>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="94%">
      <TABLE BORDER="0" WIDTH="99%">
        <TR>
          <TD WIDTH="32%">
            <P ALIGN="right" CLASS="SGQuestion">
<span style="font-weight: 400"><font size="2">Fax</font></span><font size="2" color="#FF0000"><br>
</font><font size="2">
            <INPUT TYPE="text" NAME="fax" SIZE="29" CLASS="SGResponse" value="<? echo $fax; ?>"></font></P>
          </TD>
          <TD WIDTH="66%">
            <b><font size="2" face="Arial">Email<font color="#FF0000">*</font><br>
			</font></b><font size="2"><INPUT TYPE="text" NAME="email" SIZE="38" CLASS="SGResponse" value ="<? echo $email; ?>"></font></TD>
        </TR>
      </TABLE>
    </TD>
  </TR>
</TABLE>

<font face="Arial">

<!-- <INPUT TYPE="hidden" NAME="SGRNM1" value="User-Defined 1"> -->

</font>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="94%">
            <P ALIGN="right" CLASS="SGQuestion">
<font size="2"><span style="font-weight: 400">Web Site</span><br>
            <INPUT TYPE="text" NAME="website" SIZE="46" CLASS="SGResponse" value="<? echo $website; ?>"><br>
&nbsp;</font></P>
          </TD>
        </TR>
      </TABLE>

<!-- <INPUT TYPE="hidden" NAME="SGRNM2" value="User-Defined 2"> -->

<HR NOSHADE SIZE=10 WIDTH=100% CLASS=SGHorizontalLine>

<table border="0" width="102%" id="table1">
	<tr>
	

		<td><font size="3">Membership Status</font><b><font color="#FF0000" size="2" face="Arial">*<br>
		</font></b><font size="3"> 
		
<?

// ########## OUTPUT MEMBERSHIP_STATUS DROP DOWN BOX THAT SELECTS BASED ON PREVIOUS DB ENTRIES ######

$ms_left_string = array("<option value=\"99\" ","<option value=\"Affiliate\" ","<option value=\"Lead\" ","<option value=\"Pending Contract\" ","<option value=\"Do Not Recommend\" ");
$ms_right_string= array(">Pick One</option>",">Affiliate</option>",">Lead</option>",">Pending Contract</option>",">Do Not Recommend</option>");
$ms_val_string = array("99","Affiliate","Lead","Pending Contract","Do Not Recommend",);

$membership_status_string = "<select name = \"membership_status\">";

for ($i=0; $i<5; $i++) {
  $membership_status_string .= $ms_left_string[$i];
  
  if ($membership_status == $ms_val_string[$i]){
    
    $membership_status_string .= "selected";

	}//end IF block

$membership_status_string .= $ms_right_string[$i];
  
}

$membership_status_string .= "</select>";

echo "$membership_status_string ";
//------------------------------------------------------------------------------------------------
?>   
		
</font></td>
		<td>Rating<br>
		<input type="text" name="ranking" size="3" value="<? echo "$ranking"; ?>" ?>" ?>" ?>" ?>" ?>"></td>
		<td>Sales Stage<b><font color="#FF0000" size="2" face="Arial">*<br>
		</font></b><font size="3"> 
		
 <?
 
// ########## OUTPUT SALES_STAGE DROP DOWN BOX THAT SELECTS BASED ON PREVIOUS DB ENTRIES ######
		
$ss_left_string = array("<option value=\"1 - Call Immediately\" ","<option value=\"2 - Call AM\" ","<option value=\"3 - Call Afternoon (12:00-3:00)\" ","<option value=\"4 - Call Late afternoon (3:00-6:00)\" ","<option value=\"5 - Call AM\" ","<option value=\"6 - Call Afternoon\" ","<option value=\"7 - Call Evening\" ","<option value=\"8 - Call Weekend\" ","<option value=\"91 - Send Information\" ","<option value=\"93 - Sale - Open to New products\" ","<option value=\"94 - Negative Response (give details)\" ","<option value=\">99 - Possible sale - waiting on terms and conditions\" ");

$ss_right_string = array(">1 - Call Immediately</option>",">2 - Call AM</option>",">3 - Call Afternoon (12:00-3:00)</option>",">4 - Call Late afternoon (3:00-6:00)</option>",">5 - Call AM</option>",">6 - Call Afternoon</option>",">7 - Call Evening</option>",">8 - Call Weekend</option>",">91 - Send Information</option>",">93 - Sale - Open to New products</option>",">94 - Negative Response (give details)</option>",">99 - Possible sale - waiting on terms and conditions</option>");

$ss_vals = array("1 ","2 ","3 ","4 ","5 ","6 ","7 ","8 ","91","93","94","99");

$sales_stage_print = "<select name=\"sales_stage\">";

	for ($i=0; $i<12; $i++){
	  
	 	$sales_stage_print .= $ss_left_string[$i];
	 	
			if ((substr($sales_stage,0,2) == $ss_vals[$i])){

			  $sales_stage_print .= "selected";
			  
			}//if first two letters match the selection #'s above, then selected'
		
	$sales_stage_print .= $ss_right_string[$i];
	  
	}//end for/next loop
	

	
echo "$sales_stage_print ";

//########################## CONVERT TIMESTAMP FOR FOLLOWING DATE STUFF #################### 

$date_array = getdate($contact_next);

$month=$date_array['mon'];
$month -= 1; //so it will be compatible with months array values

$day=$date_array['mday'];

$year=$date_array['year'];

//-------------------------------------------------------------------------------------------
?>    
</font></td>
		<td>Contact Next<br>
		
<?
/*
//####### TRYING TO USE PHP TO MAKE POINTER/VALUE APPEAR IN JS BOXES FROM DBASE... DIDN'T WORK #######

//drop down for month with proper selection made

$mo_lft_string = array("<option value=\"\"","<option value=\"0\"","<option value=\"1\"","<option value=\"2\"","<option value=\"3\"","<option value=\"4\"","<option value=\"5\"","<option value=\"6\"","<option value=\"7\"","<option value=\"8\"","<option value=\"9\"","<option value=\"10\"","<option value=\"11\"");

$mo_rt_string = array(">Month</option>",">January</option>",">February</option>",">March</option>",">April</option>",">May</option>",">June</option>",">July</option>",">August</option>",">September</option>",">October</option>",">November</option>",">December</option>");

$mo_vals = array("",0,1,2,3,4,5,6,7,8,9,10,11);

$month_print_string = "<select name=\"months\" onchange=\"populateDays(this);\">";

	for ($i=0; $i<14; $i++){
	  
	 	$month_print_string .= $mo_lft_string[$i];
	 		
	 		//If equivalent to db recorded month then select it...
	 		// REMEMBER EQUIVALENT == NOT ASSIGNMENT = !!!!!!!!
//			if ($mo_vals[$i] == $month){
			  
//			  $month_print_string .= "selected";
			  
//			}//if match the selection #'s above, then selected'
		
	$month_print_string .= $mo_rt_string[$i];
	  
	}//end for/next loop
	
$month_print_string .= "</select>";
	
echo "$month_print_string ";
*/

/*
//######## TRIED TO Create javascript to dynamically choose the index selected DIDN'T WORK ########

$js_text = "<script type=\"text/javascript\"><!-- //HIDE FROM OLD BROWSERS<br> document.add_affiliate.months.selectedIndex =".$month."<br>"

$js_text .= "//END HIDING--></script>";

echo "$js_text "; */

?>
<select name="months" onchange="populateDays(this);">
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


<script type="text/javascript">
	<!-- //HIDE FROM OLD BROWSERS
	
//############## TRYING TO SET POINTER/VALUE FOR MONTH FROM DATABASE... DIDN'T WORK EITHER #########

//	monthNames = new array("Month","January","February","March","April","May","June","July","August","September","October","November","December");
	
	
//		monthVal = "<? echo $month; ?>";
//		document.add_affiliate.months.selectedIndex = monthVal;
//		ind=document.add_affiliate.months.selectedIndex;
//		document.add_affiliate.months.options[ind].value=monthNames[monthVal];
//		optInd=document.add_affiliate.months.options[ind].value;

//	populateDays(this);

	//END HIDING-->
</script>		

<select name="days">
	<option>Day</option>
</select>

<select name="year">
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
</select>

<br>
		</td>
	</tr>
	<tr>
		<td colspan="4">Notes:<br>
		<textarea rows="8" cols="86" name="notes"><? echo $notes; ?></textarea></td>
	</tr>
</table>

<H3 CLASS="SGSection"><font size="3">&nbsp; </font>&nbsp;Therapist Certifications<BR>

</H3>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq1"></A>1.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Certifications<font color="#FF0000">*</font> 
		<span style="font-weight: 400; font-style: italic"><br>
		(Hold down the ctrl 
		key while you click to choose more than one) </span> </P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%">
    <p style="margin-bottom: 6px">
    </TD>
    <TD WIDTH="94%" colspan="3">
      <P CLASS="SGResponseInstructions" style="margin-bottom: 6px">&nbsp;</P>
    </TD>
  </TR>
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="27%">
      <P CLASS="SGNormalText">

<?
############################ Create Certifications Drop-down on the fly###############

$person_id= $affil_id; 
$person_table="affiliates";
$rel_table="affiliates_certifications_rel"; 
$desc_table="hyp_certifications";
$select_name="certifications[]";//#*#*#*#*#*#*#*use [] if it's an array you want to post!!!

$certifications = $ahcDB->dropDownSelected($person_id,$rel_table,$desc_table,$select_name);

echo "$certifications";

######################################################################################
?>
 
    
    <TD WIDTH="7%">
      <font face="Arial"><b>Other</b></font>:</TD>
 
    
    <TD WIDTH="60%">
      <textarea  NAME="other_certifications" SIZE="63" rows="2" cols="58"><? echo $other_certifications; ?></textarea></TD>
  </TR>
  </TABLE>

<BR>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq2"></A>2.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Issues for which you are a qualified and capable 
		care provider<font color="#FF0000">*</font>. <br>
		<span style="font-weight: 400; font-style: italic">(Hold down the ctrl 
		key while you click to choose more than one) </span> </P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="10%">
    <p style="margin-bottom: 6px">
    </TD>
    <TD WIDTH="90%" colspan="3">
      <P CLASS="SGResponseInstructions" style="margin-bottom: 6px">&nbsp;</P>
    </TD>
  </TR>
  <TR>
    <TD WIDTH="10%">
    </TD>
    <TD WIDTH="23%" valign=top>
      <P CLASS="SGNormalText">
<?
############################ Create ISSUES Drop-down on the fly###############

$person_id= $affil_id; 
$person_table="affiliates";
$rel_table="affiliates_issues_rel"; 
$desc_table="hyp_issues";
$select_name="issues[]";//#*#*#*#*#*#*#*use [] if it's an array you want to post!!!

$issues = $ahcDB->dropDownSelected($person_id,$rel_table,$desc_table,$select_name);

echo "$issues";

######################################################################################
?>

&nbsp; </P>
    </TD>
    <TD WIDTH="5%">
      <p align="right"><font face="Arial"><b>Other</b></font>:</TD>
    <TD WIDTH="31%">
      <textarea  NAME="other_issues" SIZE="63" rows="3" cols="58"><? echo $other_issues; ?></textarea></TD>
  </TR>
  <TR>
    <TD WIDTH="10%">
    </TD>
    <TD WIDTH="90%" colspan="3">
      <P CLASS="SGNormalText">
        &nbsp;</P>
    </TD>
  </TR>
</TABLE>
<HR NOSHADE SIZE=10 WIDTH=100% CLASS=SGHorizontalLine>

<H3 CLASS="SGSection">Education<BR>

</H3>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq3"></A>3.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Please check any degrees/licenses that you have earned. 
		<br>
		<span style="font-weight: 400; font-style: italic">(Hold down the ctrl 
		key while you click to choose more than one) </span> </P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%">
    <p style="margin-bottom: 6px">
    </TD>
    <TD WIDTH="94%" colspan="3">
      <P CLASS="SGResponseInstructions" style="margin-bottom: 6px">&nbsp;</P>
    </TD>
  </TR>
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="35%">
      <P CLASS="SGNormalText">

<?
############################ Create EDUCATION Drop-down on the fly###############

$person_id= $affil_id; 
$person_table="affiliates";
$rel_table="affiliates_edu_rel"; 
$desc_table="education";
$select_name="education[]";//#*#*#*#*#*#*#*use [] if it's an array you want to post!!!

$education = $ahcDB->dropDownSelected($person_id,$rel_table,$desc_table,$select_name);

echo "$education";

######################################################################################
?>

</P>
    </TD>
    <TD WIDTH="8%">
      <P CLASS="SGNormalText" style="text-align: right">
        <b>Details</b></P>
    </TD>
    <TD WIDTH="51%">
      <P CLASS="SGNormalText">
        <textarea  NAME="education_details" SIZE="63" rows="2" cols="38"><? echo $education_details; ?></textarea></P>
    </TD>
  </TR>
  </TABLE>
<HR NOSHADE SIZE=10 WIDTH=100% CLASS=SGHorizontalLine>

<H3 CLASS="SGSection">Experience<BR>

</H3>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq4"></A>4.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">How Many years have you been practicing hypnotherapy?<font color="#FF0000">*</font>
      <INPUT TYPE="text" NAME="experience" SIZE="4" CLASS="SGResponse" value="<? echo $experience; ?>">
    	</P>
    </TD>
  </TR>
</TABLE>

<BR>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq5"></A>5.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Please describe you work history in the field<font color="#FF0000">*</font>. </P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="94%">
      <TEXTAREA ROWS="6" COLS="92" NAME="work_history" CLASS="SGResponse"><? echo $work_history; ?></TEXTAREA>
    </TD>
  </TR>
</TABLE>
<HR NOSHADE SIZE=10 WIDTH=100% CLASS=SGHorizontalLine>

<H3 CLASS="SGSection">Philosophy, Style & Affiliations<BR>

</H3>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq6"></A>6.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Please check off the styles and techniques of hypnotherapy you are comfortable using. 
		<br>
		<span style="font-weight: 400; font-style: italic">(Hold down the ctrl 
		key while you click to choose more than one) </span> </P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="100%" colspan="3">
    <p align="left"></p>
      <P CLASS="SGResponseInstructions">&nbsp;</P>
    </TD>
  </TR>
  <tr>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="27%">
      <P CLASS="SGNormalText">

<?
############################ Create STYLES Drop-down on the fly###############

$person_id= $affil_id; 
$person_table="affiliates";
$rel_table="affiliates_styles_rel"; 
$desc_table="hyp_styles";
$select_name="styles[]";//#*#*#*#*#*#*#*use [] if it's an array you want to post!!!

$styles = $ahcDB->dropDownSelected($person_id,$rel_table,$desc_table,$select_name);

echo "$styles";

######################################################################################
?>

</P>
    </TD>
    <TD WIDTH="14%">
      &nbsp;</TD>
  </tr>
  <TR>
    <TD WIDTH="3%" valign="top">
    &nbsp;</TD>
    <TD WIDTH="3%" valign="top">
    &nbsp;</TD>
    <TD WIDTH="14%" valign="top">
      &nbsp;</TD>
  </TR>
  <TR>
    <TD WIDTH="3%" valign="top">
    <p style="margin-right: 5px; margin-top: 0; margin-bottom: 6px">
    </TD>
    <TD WIDTH="3%" valign="top">
    <P CLASS="SGNormalText">
        <b>Other:<br>
		</b>
        <textarea  NAME="other_styles" SIZE="63" rows="2" cols="76"><? echo $other_styles; ?></textarea></P></TD>
    <TD WIDTH="14%" valign="top">
      &nbsp;</TD>
  </TR>
  </TABLE>

<BR>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq7"></A>7.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Please list organizations you are a member of. <br>
		<span style="font-weight: 400; font-style: italic">(Hold down the ctrl 
		key while you click to choose more than one) </span> </P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="5%">
    </TD>
    <TD WIDTH="56%" colspan="2">
      <P CLASS="SGResponseInstructions">&nbsp;</P>
    </TD>
  </TR>
  <tr>
    <TD WIDTH="5%">
    </TD>
    <TD WIDTH="50%">
      <P CLASS="SGNormalText">

<?
############################ Create ORGANIZATIONS Drop-down on the fly###############

$person_id= $affil_id; 
$person_table="affiliates";
$rel_table="affiliates_organizations_rel"; 
$desc_table="hyp_organizations";
$select_name="organizations[]";//#*#*#*#*#*#*#*use [] if it's an array you want to post!!!

$organizations = $ahcDB->dropDownSelected($person_id,$rel_table,$desc_table,$select_name);

echo "$organizations";

######################################################################################
?>

</P>
    </TD>
    <TD WIDTH="6%">
      <P CLASS="SGNormalText">
        <b>Other:</b></P>
    </TD>
    <TD WIDTH="39%">
      <P CLASS="SGNormalText">
        <textarea  NAME="other_organizations" SIZE="63" rows="2" cols="32"><? echo $other_organizations; ?></textarea></P>
    </TD>
  </tr>
  </TABLE>

<BR>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq8"></A>8.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Please describe your philosophy and style regarding
		the practice of hypnotherapy. </P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="94%">
      <TEXTAREA ROWS="5" COLS="99" NAME="philosophy_of_hypnosis" CLASS="SGResponse"><? echo $philosophy_of_hypnosis; ?></TEXTAREA>
    </TD>
  </TR>
</TABLE>
<HR NOSHADE SIZE=10 WIDTH=100% CLASS=SGHorizontalLine>

<H3 CLASS="SGSection">Working Together<BR>

</H3>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq9"></A>9.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Please write a one or two paragraph summary of your 
		qualifications we can pass along to prospective clients and for 
		marketing purposes.&nbsp; Please write it in the second person 
		perspective <span style="font-weight: 400; font-style: italic">(ie, &quot;<u>Dr. 
		Williams</u> has achieved.... <u>she</u> accomplished... <u>he</u> 
		did...&quot; not &quot;I earned this... or I achieved this...&quot;).</span></P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="94%">
      <TEXTAREA ROWS="5" COLS="99" NAME="biography" CLASS="SGResponse"><? echo $biography; ?></TEXTAREA>
    </TD>
  </TR>
</TABLE>

<BR>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq10"></A>10.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Do you have a receptionist?  (Executive suite/shared receptionists are fine) </P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGNormalText">
        <INPUT TYPE="radio" NAME="receptionist" VALUE="yes">yes
      </P>
    </TD>
  </TR>
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGNormalText">
        <INPUT TYPE="radio" NAME="receptionist" VALUE="no">no
      </P>
    </TD>
  </TR>
</TABLE>

<BR>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq11"></A>11.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">In what kind of facility is your clinic located? </P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%" colspan="2">
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGResponseInstructions">&nbsp;</P>
    </TD>
  </TR>
  <TR>
    <TD WIDTH="3%">
    &nbsp;</TD>
    <TD WIDTH="3%" valign="top">
    &nbsp;</TD>
    <TD WIDTH="94%">
      <select name="facility_type" >
      	<option value="A home">A home</option>
       	<option value="In partnership with another health-related practice (chiropractor, wellness clinic, etc.) ">In partnership with another health-related practice (chiropractor, wellness clinic, etc.)</option>
      	<option value="A single-business office">A single-business office</option>
      	<option value="A multi-business office building">A multi-business office building </option>
      	  	
    </select></TD>
  </TR>
  </TABLE>

<BR>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq13"></A>12.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Please give us directions to your clinic from the major highways coming from different directions. </P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="94%">
      <TEXTAREA ROWS="7" COLS="97" NAME="directions_to_clinic" CLASS="SGResponse"><? echo $directions_to_clinic; ?></TEXTAREA>
    </TD>
  </TR>
</TABLE>



<HR NOSHADE SIZE=10 WIDTH=100% CLASS=SGHorizontalLine>

<P ALIGN="center">
  <INPUT TYPE="submit" VALUE="Modify" name="apply_button">
</P>

</FORM>

<HR NOSHADE SIZE=10 WIDTH=100% CLASS=SGHorizontalLine>

</BODY>

</HTML>
