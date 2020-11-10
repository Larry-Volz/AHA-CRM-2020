<?

//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
$list_id=1; //code for 'add a person' - PUT IN CORRECT CODE FOR PAGE!

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

$field_message="";
if ($_GET['field_message'] !=""){
	$field_message="<font color=\"red\">PLEASE FILL OUT ALL REQUIRED FIELDS</font>";
}

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
	
//	function blow_me(){
//		document.write('...days.selectedIndex = '+ document.add_affiliate.days.selectedIndex);
//		document.write('...options[...selectedIndex].value = '+ document.add_affiliate.days.options[document.add_affiliate.days.selectedIndex].value);
//		}

  

</script>

<script language="JAVASCRIPT">
      function fill_address()
      {
          if (document.add_affiliate.use_mailing.checked === true )
          {
           document.add_affiliate.address_physical.value = document.add_affiliate.address1.value;
           document.add_affiliate.physical_city.value = document.add_affiliate.address2.value;
           add_affiliate.physical_state.options[0]= new Option(document.add_affiliate.address3.value);
           add_affiliate.physical_state.options[0].value = document.add_affiliate.address3.value;
           add_affiliate.physical_state.options[0].selected = true;
           document.add_affiliate.physical_zip.value = document.add_affiliate.postcode.value; 
             
           
          }
          else
          { 
           document.add_affiliate.address_physical.value = ""; 
           document.add_affiliate.physical_city.value = "";
           add_affiliate.physical_state.options[0] = new Option("");  
           add_affiliate.physical_state.options[0].value = "";
           add_affiliate.physical_state.options[0].selected = true; 
           document.add_affiliate.physical_zip.value = "";  
          } 
      }
</script>


<!-- PUT IN BODY -->

<meta name="Microsoft Border" content="r, default">
</HEAD>

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

<BODY BGCOLOR="#FFFFFF" onload="document.add_affiliate.months.selectedIndex=0;"><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<H1 CLASS="SGHeader">Add an AHC Affiliate Member</H1>


<HR NOSHADE SIZE=10 WIDTH=100%>

<H3 CLASS="SGSection">Please provide the following 
<span style="font-weight: 400; font-style:italic"><font size="3">
<font color="#FF0000">&nbsp;*</font>Required<br>
&nbsp;<? echo "$field_message "; ?></font></span></H3>


<FORM name="add_affiliate" method="POST" action="do_addaffiliate.php">

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0" CLASS="SGQuestion">
  <TR>
      <TD>
            <font face="Arial">
			</font><font size="2">First name</font><font size="2" color="#FF0000">*</font><font size="2"><br>
			</font>
            <INPUT TYPE="text" NAME="f_name" SIZE="35"><font size="2"> </font>
			</font>
	<td>
            <font size="2" face="Arial">Last name</font><font size="2" color="#FF0000">*</font><font size="2" face="Arial"><br>
			</font><font face="Arial">
            <INPUT TYPE="text" NAME="l_name" SIZE="36"></font></TD>
          </td>
          <TD WIDTH="43%">
            &nbsp;</TD>
        </TR>
      
    </TD>

        <TR>
          <TD WIDTH="43%">
            <font size="2" face="Arial">Title&nbsp;<br>
			</font><font size="2">
			<INPUT TYPE="text" NAME="title" SIZE="35" CLASS="SGResponse"></font><font face="Arial" size="2">
			</font></TD>
          <TD WIDTH="55%">
            <font face="Arial"><font size="2">Name of Practice</font><font size="2" color="#FF0000">*<br>
			</font></font><font size="2">
            <INPUT TYPE="text" NAME="company" SIZE="36" CLASS="SGResponse"></font></TD>    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="94%">
     
            <P ALIGN="right" CLASS="SGQuestion">
<span style="font-weight: 400"><font size="2">Address( for mailing )</font></span><font size="2" color="#FF0000">*</font><font size="2"><br>
            <INPUT TYPE="text" NAME="address1" SIZE="84" CLASS="SGResponse"></font><font face="Arial" size="2">
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
            <INPUT TYPE="text" NAME="address2" SIZE="35" CLASS="SGResponse"></font></P>
          </TD>
          <TD WIDTH="28%">
            <font face="Arial" size="2">&nbsp;</font><font size="2">State</font><font size="2" color="#FF0000">*</font><font size="2"><br>
            </font>
<select name="address3">
	<option value="AL">Alabama (AL)</option>
	<option value="AK">Alaska (AK)</option>
	<option value="AZ">Arizona (AZ)</option>
	<option value="AR">Arkansas (AR)</option>
	<option value="CA">California (CA)</option>
	<option value="CO">Colorado (CO)</option>
	<option value="CT">Connecticut (CT)</option>
	<option value="DE">Delaware (DE)</option>
	<option value="DC">Washington DC</option>
	<option value="FL">Florida (FL)</option>
	<option value="GA">Georgia (GA)</option>
	<option value="HI">Hawaii (HI)</option>
	<option value="ID">Idaho (ID)</option>
	<option value="IL">Illinois (IL)</option>
	<option value="IN">Indiana (IN)</option>
	<option value="IA">Iowa (IA)</option>
	<option value="KS">Kansas (KS)</option>
	<option value="KY">Kentucky (KY)</option>
	<option value="LA">Louisiana (LA)</option>
	<option value="ME">Maine (ME)</option>
	<option value="MD">Maryland (MD)</option>
	<option value="MA">Massachusetts (MA)</option>
	<option value="MI">Michigan (MI)</option>
	<option value="MN">Minnesota (MN)</option>
	<option value="MS">Mississippi (MS)</option>
	<option value="MO">Missouri (MO)</option>
	<option value="MT">Montana (MT)</option>
	<option value="NE">Nebraska (NE)</option>
	<option value="NV">Nevada (NV)</option>
	<option value="NH">New Hampshire (NH)</option>
	<option value="NJ">New Jersey (NJ)</option>
	<option value="NM">New Mexico (NM)</option>
	<option value="NY">New York (NY)</option>
	<option value="NC">North Carolina (NC)</option>
	<option value="ND">North Dakota (ND)</option>
	<option value="OH">Ohio (OH)</option>
	<option value="OK">Oklahoma (OK)</option>
	<option value="OR">Oregon (OR)</option>
	<option value="PA">Pennsylvania (PA)</option>
	<option value="RI">Rhode Island (RI)</option>
	<option value="SC">South Carolina (SC)</option>
	<option value="SD">South Dakota (SD)</option>
	<option value="TN">Tennessee (TN)</option>
	<option value="TX">Texas (TX)</option>
	<option value="UT">Utah (UT)</option>
	<option value="VT">Vermont (VT)</option>
	<option value="VA" >Virginia (VA)</option>
	<option value="WA">Washington (WA)</option>
	<option value="WV">West Virginia (WV)</option>
	<option value="WI">Wisconsin (WI)</option>
	<option value="WY">Wyoming (WY)</option>
</select></TD>
          <TD WIDTH="38%">
            <font size="2">Zip</font><font size="2" color="#FF0000">*<br>
			</font><font size="2">
            <INPUT TYPE="text" NAME="postcode" SIZE="14" CLASS="SGResponse"></font></TD>
        </TR>
      </TABLE>
      
<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="94%">
     
            <P ALIGN="right" CLASS="SGQuestion">
<span style="font-weight: 400"><font size="2">Address( physical  )</font></span><font size="2" color="#FF0000">*</font>
<br />
<font size="2"><input type="checkbox" name="use_mailing" onclick='fill_address();'> <span style="font-weight: 400">Use same as mailing address</span></font>
<font size="2"><br>
            <INPUT TYPE="text" NAME="address_physical"  SIZE="84" CLASS="SGResponse"></font><font face="Arial" size="2">
</font></P>
          </TD>
        </TR>
      </TABLE>    
      

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="32%">

            <P ALIGN="right" CLASS="SGQuestion">
<font size="2"><span style="font-weight: 400">City (physical)</span></font><font size="2" color="#FF0000">*</font><font size="2">
<br>
            <INPUT TYPE="text" NAME="physical_city" SIZE="35" CLASS="SGResponse"></font></P>
          </TD>
          <TD WIDTH="28%">
            <font face="Arial" size="2">&nbsp;</font><font size="2">State(physical)</font><font size="2" color="#FF0000">*</font><font size="2"><br>
            </font>
<select name="physical_state">
    <option value="AL">Alabama (AL)</option>
    <option value="AK">Alaska (AK)</option>
    <option value="AZ">Arizona (AZ)</option>
    <option value="AR">Arkansas (AR)</option>
    <option value="CA">California (CA)</option>
    <option value="CO">Colorado (CO)</option>
    <option value="CT">Connecticut (CT)</option>
    <option value="DE">Delaware (DE)</option>
    <option value="DC">Washington DC</option>
    <option value="FL">Florida (FL)</option>
    <option value="GA">Georgia (GA)</option>
    <option value="HI">Hawaii (HI)</option>
    <option value="ID">Idaho (ID)</option>
    <option value="IL">Illinois (IL)</option>
    <option value="IN">Indiana (IN)</option>
    <option value="IA">Iowa (IA)</option>
    <option value="KS">Kansas (KS)</option>
    <option value="KY">Kentucky (KY)</option>
    <option value="LA">Louisiana (LA)</option>
    <option value="ME">Maine (ME)</option>
    <option value="MD">Maryland (MD)</option>
    <option value="MA">Massachusetts (MA)</option>
    <option value="MI">Michigan (MI)</option>
    <option value="MN">Minnesota (MN)</option>
    <option value="MS">Mississippi (MS)</option>
    <option value="MO">Missouri (MO)</option>
    <option value="MT">Montana (MT)</option>
    <option value="NE">Nebraska (NE)</option>
    <option value="NV">Nevada (NV)</option>
    <option value="NH">New Hampshire (NH)</option>
    <option value="NJ">New Jersey (NJ)</option>
    <option value="NM">New Mexico (NM)</option>
    <option value="NY">New York (NY)</option>
    <option value="NC">North Carolina (NC)</option>
    <option value="ND">North Dakota (ND)</option>
    <option value="OH">Ohio (OH)</option>
    <option value="OK">Oklahoma (OK)</option>
    <option value="OR">Oregon (OR)</option>
    <option value="PA">Pennsylvania (PA)</option>
    <option value="RI">Rhode Island (RI)</option>
    <option value="SC">South Carolina (SC)</option>
    <option value="SD">South Dakota (SD)</option>
    <option value="TN">Tennessee (TN)</option>
    <option value="TX">Texas (TX)</option>
    <option value="UT">Utah (UT)</option>
    <option value="VT">Vermont (VT)</option>
    <option value="VA" >Virginia (VA)</option>
    <option value="WA">Washington (WA)</option>
    <option value="WV">West Virginia (WV)</option>
    <option value="WI">Wisconsin (WI)</option>
    <option value="WY">Wyoming (WY)</option>
</select></TD>
          <TD WIDTH="38%">
            <font size="2">Zip(physical)</font><font size="2" color="#FF0000">*<br>
            </font><font size="2">
            <INPUT TYPE="text" NAME="physical_zip" SIZE="14" CLASS="SGResponse"></font></TD>
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
            <INPUT TYPE="text" NAME="prim_tel" SIZE="29" CLASS="SGResponse"></font></P>
          </TD>
          <TD WIDTH="66%">
            <font size="2" face="Arial">Alt. Phone</font><font size="2"><br>
			<INPUT TYPE="text" NAME="sec_tel" SIZE="38" CLASS="SGResponse"></font></TD>
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
            <INPUT TYPE="text" NAME="fax" SIZE="29" CLASS="SGResponse"></font></P>
          </TD>
          <TD WIDTH="66%">
            <b><font size="2" face="Arial">Email<font color="#FF0000">*</font><br>
			</font></b><font size="2"><INPUT TYPE="text" NAME="email" SIZE="38" CLASS="SGResponse"></font></TD>
        </TR>
      </TABLE>
    </TD>
  </TR>
</TABLE>

<font face="Arial">

<INPUT TYPE="hidden" NAME="SGRNM1" value="User-Defined 1">

</font>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="94%">
            <P ALIGN="right" CLASS="SGQuestion">
<font size="2"><span style="font-weight: 400">Web Site</span><br>
            <INPUT TYPE="text" NAME="website" SIZE="46" CLASS="SGResponse"><br>
&nbsp;</font></P>
          </TD>
        </TR>
      </TABLE>

<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="94%">
            <P ALIGN="right" CLASS="SGQuestion">
<font size="2"><span style="font-weight: 400">Tax ID number</span><br>
            <INPUT TYPE="text" NAME="tax_id" SIZE="46" CLASS="SGResponse"><br>
&nbsp;</font></P>
          </TD>
        </TR>
      </TABLE>
      

<INPUT TYPE="hidden" NAME="SGRNM2" value="User-Defined 2">

<HR NOSHADE SIZE=10 WIDTH=100% CLASS=SGHorizontalLine>

<table border="0" width="100%" id="table1">
	<tr>
		<td width="24%"><font size="3">Membership Status</font><b><font color="#FF0000" size="2" face="Arial">*<br>
		</font></b><font size="3"> 
<select name="membership_status">
<option value="99" selected>Pick One</option>
<option value="Affiliate" >Affiliate</option>
<option value="Lead" >Lead</option>
<option value="Pending Contract" >Pending Contract</option>
<option value="Do Not Recommend" >Do Not Recommend</option>
</select></font></td>
		<td width="43%">Sales Stage<b><font color="#FF0000" size="2" face="Arial">*<br>
		</font></b><font size="3"> 
<select name="sales_stage">
<option value="" selected>Pick One</option>
<option value="1 - Call Immediately" >1 - Call Immediately</option>
<option value="2 - Call AM" >2 - Call AM</option>
<option value="3 - Call Afternoon (12:00-3:00)" >3 - Call Afternoon (12:00-3:00)</option>
<option value="4 - Call Late afternoon (3:00-6:00)" >4 - Call Late afternoon (3:00-6:00)</option>
<option value="5 - Call AM" >5 - Call AM</option>
<option value="6 - Call Afternoon" >6 - Call Afternoon</option>
<option value="7 - Call Evening" >7 - Call Evening</option>
<option value="8 - Call Weekend" >8 - Call Weekend</option>
<option value="91 - Send Information" >91 - Send Information</option>
<option value="93 - Sale - Open to New products" >93 - Sale - Open to New products</option>
<option value="94 - Negative Response (give details)" >94 - Negative Response (give details)</option>
<option value=">99 - Possible sale - waiting on terms and conditions" >99 - Possible sale - waiting on terms and conditions</option>
</select></font></td>
		<td width="32%">Contact Next<br>
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

	
</select></td>
	</tr>
</table>

<table border = "1" width="100%">
<!-- ####################################### click the scheduling method ######################### -->

<?
	$print_sched_meth ="<tr><td>Scheduling Method:<br><select name=\"scheduling_method\">";
		$print_sched_meth .="<option value=\"Pick One\"";	
	$print_sched_meth .=">Pick One</option>";
	
//------------------------------------------------
	
	$print_sched_meth .="<option value=\"Schedule 1st - ask later\" ";
	$print_sched_meth .=">Schedule 1st - ask later</option></select></td>";
	
//------------------------------------------------

	$print_sched_meth .="<option value=\"Yahoo Calendar\"";	
	$print_sched_meth .=">Yahoo Calendar</option>";
//-------------------------------	
	$print_sched_meth .="<option value=\"Hotmail\""; 
	$print_sched_meth .= ">Hotmail</option>";
//----------------------------------	
	$print_sched_meth .="<option value=\"MySpace\" ";
	$print_sched_meth .=">MySpace</option>";
	
//------------------------------------
	$print_sched_meth .="<option value=\"Call & Get Availability\" ";
	$print_sched_meth .=">Call & Get Availability</option>";
	
//------------------------------------------

	echo " $print_sched_meth";
?>		
<!-- -------------------------------------------------------------------  -->		
	
	<td>
		Reserved Appointment Times:<br> <input type="text" name="rsvp_apt_times" />		
	</td>
	<td>
		Office Hours:<br> <input type="text" name="office_hours" />
	</td>
</tr>
<tr>
	<td>
		Online Calendar:<br><input type="text" name="online_calendar" />
	</td>
	<td>
		Username:<br><input type="text" name="calendar_user_name" />
	</td>
	<td>
		Password:<br><input type="text" name="calendar_password" />
	</td>
	</tr>
	</table>


<table>
	<tr>
		<td colspan="3">Notes:<br>
		<textarea rows="8" cols="86" name="notes"></textarea></td>
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
      <select name="certifications[]" size="4" multiple>
      	<option value="99" selected>Click all that apply</option>      
      	<option value="1">CH/CHt </option>
       	<option value="2">MHt </option>
      	<option value="3">Hypnosis Trainer Certification</option>
      	<option value="4">NLP Practitioner</option>
      	<option value="5">NLP Masters</option>
      	<option value="6">NLP Trainer</option>
      	<option value="7">No Certification</option>
    </select> 
 
    
    <TD WIDTH="7%">
      <font face="Arial"><b>Other</b></font>:</TD>
 
    
    <TD WIDTH="60%">
      <textarea  NAME="other_certifications" SIZE="63" rows="2" cols="58"></textarea></TD>
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
      <select name="issues[]" size = "4" multiple>
      	<option value="99" selected>Click all that apply</option>       
      	<option value="1">Smoking </option>
       	<option value="2">Weight Loss </option>
      	<option value="3">Anorexia/Bulimia</option>
      	<option value="4">Stress/Anxiety</option>
      	<option value="5">Drug Abuse</option>
      	<option value="6">Alcoholism</option>
      	<option value="7">Pain Management</option>
      	<option value="8">Phobias</option>     	
      	<option value="9">OCD</option>
      	<option value="10">Self-esteem</option>
      	<option value="11">Depression</option>
      	<option value="12">ADD/ADHD</option>
      	<option value="13">Reduced Pain in Childbirth</option>
      	<option value="14">Irritable Bowel Syndrome</option>
      	<option value="15">Fibromyalgia</option>
      	<option value="16">Hypertension</option>
      	<option value="17">Sports Attainment</option>      	
    </select>&nbsp; </P>
    </TD>
    <TD WIDTH="5%">
      <p align="right"><font face="Arial"><b>Other</b></font>:</TD>
    <TD WIDTH="31%">
      <textarea  NAME="other_issues" SIZE="63" rows="3" cols="58"></textarea></TD>
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
      <select name="education[]" size="4" multiple>
      	<option value="99" selected>Click all that apply</option>       
      	<option value="1">ACH </option>
       	<option value="2">AA </option>
      	<option value="3">AS</option>
      	<option value="4">BCH</option>
      	<option value="5">BA</option>
      	<option value="6">BS</option>
      	<option value="7">MA</option>
      	<option value="8">MS</option>     	
      	<option value="9">MSW</option>
      	<option value="10">LCSW</option>
      	<option value="11">LPC</option>
      	<option value="12">PhD</option>
      	<option value="13">DCH</option>
      	<option value="14">PsyD</option>
      	<option value="15">EdD</option>
      	<option value="16">OD</option>
      	<option value="17">MD</option>      	
      	<option value="18">No degree - just certifications</option>       	
    </select></P>
    </TD>
    <TD WIDTH="8%">
      <P CLASS="SGNormalText" style="text-align: right">
        <b>Details</b></P>
    </TD>
    <TD WIDTH="51%">
      <P CLASS="SGNormalText">
        <textarea  NAME="education_details" SIZE="63" rows="2" cols="38"></textarea></P>
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
      <INPUT TYPE="text" NAME="experience" SIZE="4" CLASS="SGResponse">
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
      <TEXTAREA ROWS="6" COLS="92" NAME="work_history" CLASS="SGResponse"></TEXTAREA>
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
      <select name="styles[]" size="4" multiple>
      	<option value="99" selected>Click all that apply</option>       
      	<option value="1" size="4">Ericksonian Hypnosis (Indirect, trance ratifications, metaphor, etc.)</option>
       	<option value="2">Elman-style Hypnosis (rapid induction techniques, using ratification as a deepener & direct suggestion)</option>
      	<option value="3">Autogenic-style Hypnosis (progressive relaxation/imagery & direct suggestion)</option>
      	<option value="4">NLP (linguistic patterns, conscious exercises, phobia cure, swish, etc.) </option>
      	<option value="5">Parts Therapy (Ego State Therapy, Core Transformation, six-step reframing, etc.)</option>
      	<option value="6">Cognitive Behavioral Psychology</option>
      	<option value="7">Regression </option>
      	<option value="8">Rational Emotive Therapy</option>     	
      	<option value="9">Biofeedback (GSR)</option>
      	<option value="10">Reality Therapy </option>
      	<option value="11">Biofeedback (EEG) </option>
      	<option value="12">Emotional Freedom Technique (EFT)</option>
     	
    </select></P>
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
        <textarea  NAME="other_styles" SIZE="63" rows="2" cols="76"></textarea></P></TD>
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
      <select name="organizations[]" size="4" multiple>
      	<option value="99" selected>Click all that apply</option>       
      	<option value="1">National Guild of Hypnotists </option>
       	<option value="2">American Society of Clinical Hypnosis </option>
      	<option value="3">American Council of Hypnotist Examiners </option>
      	<option value="4">International Medical and Dental Hypnotherapy Association </option>
      	<option value="5">National League of Medical Hypnotherapists</option>
      	<option value="6">American Institute of Hypnosis </option>
      	<option value="7">National Association of Transpersonal Hypnotherapists </option>
      	<option value="8">National Federation of Neurolinguistic Programming </option>     	
      	<option value="9">American Medical Association </option>
      	<option value="10">American Psychological Associations </option>
      	<option value="11">National Association of Social Workers </option>
      	<option value="12">Better Business Bureau </option>    	
    </select></P>
    </TD>
    <TD WIDTH="6%">
      <P CLASS="SGNormalText">
        <b>Other:</b></P>
    </TD>
    <TD WIDTH="39%">
      <P CLASS="SGNormalText">
        <textarea  NAME="other_organizations" SIZE="63" rows="2" cols="32"></textarea></P>
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
      <TEXTAREA ROWS="5" COLS="99" NAME="philosophy_of_hypnosis" CLASS="SGResponse"></TEXTAREA>
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
      <TEXTAREA ROWS="5" COLS="99" NAME="biography" CLASS="SGResponse"></TEXTAREA>
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
      <TEXTAREA ROWS="7" COLS="97" NAME="directions_to_clinic" CLASS="SGResponse"></TEXTAREA>
    </TD>
  </TR>
</TABLE>


<TABLE BORDER="0" WIDTH="100%" BGCOLOR="#C0C0C0">
  <TR>
    <TD WIDTH="6%">
      <P CLASS="SGQuestion"><A NAME="skiptoq13"></A>12.</P>
    </TD>
    <TD WIDTH="94%">
      <P CLASS="SGQuestion">Please list up to three cities (other than the city listed in your address)that are nearby and that clients are usually willing to travel from in order to seek hypnotherapy with you. <i>For example, a business address could be in Chesterfield, Virginia which is a suburb of Richmond.  In that case you would include Richmond as well as Petersburg and perhaps Charlottesville.</i></P>
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="94%">
      <input type="text" name="close_city1" value="<? echo $close_city1; ?>" />
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="94%">
      <input type="text" name="close_city2" value="<? echo $close_city2; ?>" />
    </TD>
  </TR>
</TABLE>

<TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="0">
  <TR>
    <TD WIDTH="6%">
    </TD>
    <TD WIDTH="94%">
      <input type="text" name="close_city3" value="<? echo $close_city3; ?>" />
    </TD>
  </TR>
</TABLE>



<HR NOSHADE SIZE=10 WIDTH=100% CLASS=SGHorizontalLine>

<P ALIGN="center">
  <INPUT TYPE="submit" VALUE="Apply for Membership" name="apply_button">
</P>

</FORM>

<HR NOSHADE SIZE=10 WIDTH=100% CLASS=SGHorizontalLine>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></BODY>

</HTML>