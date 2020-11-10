


<form method="POST" action="show_allclients_main.php" target="_top" enctype="application/x-www-form-urlencoded">

<p><font size="5">Modify Client</font><br><hr></p>

<table border="0" width="99%" id="table2" style="border-style: outset; border-width: 1px">
	<tr>
		<td width="202"><font face="Arial"><font size="2">First:</font><font face="Arial" size="3"><input type="text" name="f_name" size=22 maxlength=20 value="<? echo $client_f_name; ?>" ></font><font size="2">
		</font> </font>
		</td>
		<td width="136">
		<font face="Arial"><font size="2">Mid init.</font><input type="text" name="middle_initial" size="2" value="<? echo $client_middle_initial; ?>" ></font></td>
		<td width="228">
		<p align="left"><font face="Arial"><font size="2">Last:</font><font face="Arial" size="3"><input type="text" name="l_name" size=24 maxlength=30 value ="<? echo $client_l_name; ?>" ></font></font></td>
		<td>
		<p align="center">
		<font face="Arial">
		<input type="submit" value="SAVE" name="save0"></font></td>
	</tr>
</table>

<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>

<table cellspacing=0 cellpadding=3 width="722" border="0" id="table5" bgcolor="#FFFFFF">
<tr>
<td width="110" rowspan="2">

<p style="margin-top: 2px; margin-bottom: 2px" align="right"><font face="Arial">Phone (Home):<br>
Phone (Work):&nbsp; 
</font> </p>
<p style="margin-top: 2px; margin-bottom: 2px" align="right"><font face="Arial">Ext:<br>
Mobile/Other:&nbsp;
</font> </p>
</td>

<td width="211" rowspan="2">

<font face="Arial" size="3">
<input type="text" name="prim_tel" size=15 maxlength=15 value="<? echo $prim_tel; ?>" ></font><font size="2" face="Arial"><br>
</font>

<font size="3" face="Arial">
<font face="Arial">
<input type="text" name="sec_tel" size=15 maxlength=150 value="<? echo $sec_tel; ?>" ></font><font size="2" face="Arial"><br>
</font><font face="Arial">
<input type="text" name="phone_ext" size=7 maxlength=7 value="<? echo $phone_ext; ?>" ></font><font size="2" face="Arial"><br>
</font><font face="Arial">
<input type="text" name="mob_tel" size=15 maxlength=15 value="<? echo $mob_tel; ?>" ></font></font></td>

<td width="159" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px outset #CCCCFF; ">
<p align="left">Id#: <input type="text" name="client_id" size="13" value="<? echo $client_id; ?>" ></td>

<td width="97" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px outset #CCCCFF; ">
<p style="margin-top: 2px; margin-bottom: 2px; text-align:right"><font face="Arial">
<font size="2">Sales Category</font>: </font></p></td>

<td width="106" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px outset #CCCCFF; ">
<p align="left">
<font face="Arial" size="3">

<?

	//define needed variables - client_id already defined
	$desc_table = "desc_sales_categories";
	$select_box_name = "sales_category";
	$desc_field_name ="description";
	
	//call function to create drop-down
	$salesCategoryDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $salesCategoryDropDown;


?>

<!-- /*
<select name="sales_category" value="Lead" size="1">
	<option value="Lead" selected>Lead</option>
	<option value="Client">Client</option>
	<option value="Affiliate Lead">Affiliate Lead</option>
	<option value="Affiliate Client">Affiliate Client</option>
	<option value="Class Lead">Class Lead</option>
	<option value="Class Client">Class Client</option>
	<option value="Employee">Employee</option>
	<option value="Vendor">Vendor</option>
	<option value="Other">Other</option>

*/ -->


</select></font></td>

</tr>

<tr>

<td bgcolor="#CCCCFF" align="center" colspan="3" height="78" style="border-style: outset; border-width: 1px">
<p style="margin-top: 2px; margin-bottom: 2px" align="right"><font face="Arial">
<strong style="font-weight: 400"><font size="2">&nbsp; Sales Stage: &nbsp;</font></strong><font size="3">&nbsp;

<?
	//define needed variables - client_id already defined
	$desc_table = "desc_sales_stage";
	$select_box_name = "sales_stage";
	$desc_field_name ="description";
	
	//call function to create drop-down
	$salesStageDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $salesStageDropDown;

?>

<!-- /*
<select name="sales_stage" value="1- Call Immediately" size="1">
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

</select>

*/ -->


</font></font></p>
<p style="margin-top: 2px; margin-bottom: 2px" align="right"><font face="Arial">
<font size="2">Sales Contact Next</font><strong style="font-weight: 400"><font size="2">:&nbsp;</font>&nbsp;&nbsp;&nbsp;
</strong>

<font size="3">

<select name="months" onchange="populateDays(this)" size="1">
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

<select name="days" onchange="format_sales_contact_next();" size="1">
	<option>Day</option>
</select></font> <font size="3">

<select name="year" onchange="format_sales_contact_next();" size="1">
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

	
</select><br>
</font><strong style="font-weight: 400"><font size="2">Record Mgr/Program Counselor:</font>&nbsp;
</strong>
<font face="Arial" size="3">


<?

	//define needed variables - client_id already defined
	$desc_table = "auth_users";
	$select_box_name = "record_manager";
	$desc_field_name ="f_name";
	
	//call function to create drop-down
	$recordManagerDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $recordManagerDropDown;


?>

<!-- /*
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

</select>
*/ -->

</font></font></p>
</td>
</tr>

<tr>
<td width="328" colspan="2" valign="top">
<font face="Arial"><font size="2">Address:<br>
</font><font face="Arial" size="3">
<input type="text" name="address1" size=40 maxlength=50 value="<? echo $address1; ?>"></font></font></td>

<td bgcolor="#CCCCFF" align="center" colspan="3" style="border-style: outset; border-width: 1px">
<p style="margin-top: 2px; margin-bottom: 2px; text-align:right"><font face="Arial">
<font size="2">Date Sold:</font><strong style="font-weight: 400">&nbsp;
</strong>

<font size="3">

<select name="months1" onchange="populateDays(this)" size="1">
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

<select name="days1" onchange="format_sales_contact_next();" size="1">
	<option>Day</option>
</select></font> <font face="Arial" size="3">

<select name="year1" onchange="format_sales_contact_next();" size="1">
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

	
</select></font></font></p></td>

</tr>

<tr>
<td width="328" colspan="2" valign="top">
<p style="margin-top: 2px; margin-bottom: 2px">
<font face="Arial"><font size="2">City:<br>
</font><font size="3">
<input type="text" name="address2" size=25 maxlength=40 value="<? echo $address2; ?>"></font><font size="2">
</font> </font></p>
<table border="0" width="100%" id="table6">
	<tr>
		<td><font face="Arial"><font size="2">State:

<br>

		</font>

<font size="3">

<select name="address3" size="1">
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
</select></font><font size="2">

</font></font></td>
		<td><font face="Arial"><font size="2">Zip: <br>
		</font> <font size="3"> 
<input type="text" name="postcode" size=15 maxlength=15 value="<? echo $postcode; ?>"></font></font></td>
	</tr>
</table>
<p style="margin-top: 2px; margin-bottom: 2px">
<font face="Arial"><font size="2">e-mail:
<br>
</font>
<font size="3">
<input type="text" name="email" size=35 maxlength=55 value="<? echo $email; ?>"></font></font></p>
</td>

<td bgcolor="#CCCCFF" align="center" colspan="3" style="border-style: outset; border-width: 1px" valign="top">
<font face="Arial">
<font size="2">Referred By: 
</font><i>
<font size="2">
<br>
<input type="radio" value="Advertising" name="referral_category" checked> Advertising? 
<input type="radio" value="Client" name="referral_category">A Client?&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" value="Physician" name="referral_category">A Physician?</font></i></font><p>

<?

	//define needed variables - client_id already defined
	$desc_table = "desc_referred_by";
	$select_box_name = "referred_by";
	$desc_field_name ="description";
	
	//call function to create drop-down
	$referredByDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $referredByDropDown;

?>


<!-- /*
<select size="1" name="referred_by_advertiser">
<option value="0">Choose One</option>
</select>
*/ -->

</p>
<p><i><font size="2">Details</font></i><br>
<input type="text" name="T1" size="50" value="<? echo $referred_by_details; ?>" ></td>

</tr>

</table>



<table cellspacing=0 cellpadding=3 width="722" border="0" id="table1" style="border-style: outset; border-width: 1px">

<tr>
<td width="328" valign="top" bgcolor="#CCCCFF" rowspan="2">
<p style="margin-top: 2px; margin-bottom: 2px" align="center"><font face="Arial">
<font size="2">Primary Goal 
of Therapy:</font><br>
<font size="3">

<?

	//define needed variables - client_id already defined
	$desc_table = "desc_primary_goal";
	$select_box_name = "primary_goal";
	$desc_field_name ="description";
	
	//call function to create drop-down
	$primaryGoalDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $primaryGoalDropDown;

?>

<!-- /*
<select name="primary_goal" value="1- Call Immediately" size="1">
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
</select>
*/ -->

</font></font><p style="margin-top: 2px; margin-bottom: 2px" align="center">Secondary 
Goal (If applicable):<br>
<font size="3" face="Arial">

<?

	//define needed variables - client_id already defined
	$desc_table = "desc_primary_goal";
	$select_box_name = "secondary_goal";
	$desc_field_name ="description";
	
	//call function to create drop-down
	$secondaryGoalDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $secondaryGoalDropDown;


?>


<!-- /*
<input type="text" name="secondary_goal" size=44 maxlength=150 value="<? echo $secondary_goal; ?>">

*/ -->

</font><p style="margin-top: 2px; margin-bottom: 2px" align="center">
Primary Motivations to Change:<br>
<font size="3" face="Arial">
<input type="text" name="motivation" size=44 maxlength=150 value="<? echo $motivation ?>"></font><p style="margin-top: 2px; margin-bottom: 2px; text-align:center">
<font size="2">Why Us?</font><br>
<font size="3" face="Arial">
<textarea name="why_us" cols=37 rows=3 wrap=virtual><? echo $why_us ?></textarea></font><p style="margin-top: 2px; margin-bottom: 2px" align="center">
&nbsp;<p style="margin-top: 2px; margin-bottom: 2px" align="center">
&nbsp;<p style="margin-top: 2px; margin-bottom: 2px; text-align:center">
		<input type="submit" value="SAVE" name="save_vital_info1"></td>

<td width="378" valign="top" bgcolor="#FFFFFF" rowspan="2">
		<p style="margin-top: 2px; margin-bottom: 2px" align="center">
<font face="Arial"><strong style="font-weight: 400"><font size="2">Additional Information:</font></strong><font size="2"><br />
</font><font face="Arial" size="3">
<textarea name="log_entry" cols=41 rows=5 wrap=virtual></textarea></font></font><p style="margin-top: 2px; margin-bottom: 2px; text-align:center">
&nbsp;<p style="margin-top: 2px; margin-bottom: 2px" align="center">
<font face="Arial" size="2"><strong>Most Recent Contacts: </strong></font><br>
<p style="margin-top: 2px; margin-bottom: 2px" align="center">

	<? echo "$contact_log"; ?>
	
	</td>

</tr>

</table>

</form>

