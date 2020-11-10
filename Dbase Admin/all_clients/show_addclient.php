<?
unset($client_id);


//################################ security #####################################################
//include file
require_once('../../includes/classes_all_clients.php');

//basic security check
$acIncludes->securityCheckBasic();


//################################ get needed variables #######################################

//open database
$acIncludes->dbConnect();

//establish created date:
$created=time();

//establish created_by:
$created_by=$user_id;

//established modifieds...
$modified=$created;
$modified_by=$created_by;

//=========================================== END PHP ===========================================
//===============================================================================================

?>
<html>

<head>

<!-- PUT IN HEAD -->
<script language="javascript">
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

	function blow_me(){
		document.write('...days.selectedIndex = '+ document.myForm.days.selectedIndex);
		document.write('...options[...selectedIndex].value = '+ document.myForm.days.options[document.myForm.days.selectedIndex].value);
		}
//	document.myForm.months.selectedIndex=0
</script>




<title>Add a Client</title>

<meta name="Microsoft Border" content="r, default">
</head>
<body bgcolor="#FFFFFF"><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top"><!-- /*################################ BODY STARTS HERE #############################*/ -->




<form name="myForm" method="POST" action="do_addclient.php" enctype="application/x-www-form-urlencoded">

			<INPUT TYPE="hidden" name="created" value="<? echo $created; ?>" >
			<INPUT TYPE="hidden" name="created_by" value="<? echo $created_by; ?>" >
			<INPUT TYPE="hidden" name="modified" value="<? echo $modified; ?>" >
			<INPUT TYPE="hidden" name="modified_by" value="<? echo $modified_by; ?>" >

<br />			
<table border="0" width="722">
	<tr>
		<td align="left">
			<font size="5">Add a Client</font><br>
		</td>
		<td align="right">
			<input type="submit" value="SAVE" name="save0"></font>	
		</td>
	</tr>
</table>			
			<hr>

<table border="0" width="725" id="table2">
	<tr>
		<td align="left" rowspan="2" width="100%">
		
			<font face="Arial"><font size="2">
			
				First: <input type="text" name="client_f_name" size=22 maxlength=20 >&nbsp;	
				Mid: <input type="text" name="client_middle_initial" size="2" >&nbsp;	
				Last: <input type="text" name="client_l_name" size=24 maxlength=30 >
				
			</font>
		</td>
	</tr>
	<tr>
		<td align="right">
			
		</td>
	</tr>
</table>
<table width=700 border = "0"align="right">
	<tr>
		<td align="right" width = "700" valign="top">
<?
//Get drop down for action
$desc_table="desc_action_at_appointment";
$select_box_name="action";
$desc_field_name="action";
$actionPrintBlock=$acIncludes->dropDownEcho($desc_table,$select_box_name);

echo "$actionPrintBlock";

?>
		</td>
	</tr>
	<tr>
		<td align="right">
<?

//Get drop down for client flags
$desc_table="desc_client_flags";
$select_box_name="client_flags";
$desc_field_name="client_flags";
$flagsPrintBlock=$acIncludes->dropDownEcho($desc_table,$select_box_name);


echo "$flagsPrintBlock";
?>
		</tr>
	</td>
</table>

<br /><br />


<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>

<table cellspacing=0 cellpadding=3 width="722" border="0" id="table5" bgcolor="#FFFFFF">
	<tr>
		<td width="110" rowspan="2">

			<p style="margin-top: 2px; margin-bottom: 2px" align="right">
			<font face="Arial" size="2">
			
				Phone (Home):&nbsp;
				Work/Ext:&nbsp;
				<br>
				Mobile/Other:&nbsp;
			
			</font> </p>
		</td>

		<td width="211" rowspan="2">

			<font face="Arial" size="2">
			
				<input type="text" name="prim_tel" size=15 maxlength=15 >
					
				<input type="text" name="sec_tel" size=15 maxlength=150 >
				
				<input type="text" name="phone_ext" size=7 maxlength=7 >
					
				<input type="text" name="mob_tel" size=15 maxlength=15 >
				
			</font>
			
		</td>
	
		<td width="159" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px outset #CCCCFF; ">
		
			<p align="left">
				Id: <i>(to be assigned)</i>
							
		</td>

		<td width="97" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px outset #CCCCFF; ">
			<p style="margin-top: 2px; margin-bottom: 2px; text-align:right"><font face="Arial">
				<font size="2">
				
				Sales Category: 
				
				</font>
			</p>
		</td>

		<td width="106" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px outset #CCCCFF; ">
		
			<p align="left">
				<font face="Arial" size="3">

<? 

	//define needed variables - client_id already defined
	$desc_table = "desc_sales_categories";
	$select_box_name = "sales_category";
	$desc_field_name ="sales_category";//desc field name from ALL_CLIENTS!!! duh!
	
	//call function to create drop-down
	$salesCategoryDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $salesCategoryDropDown;

?>

			</font>
		</td>
	</tr>
	<tr>

		<td bgcolor="#CCCCFF" align="center" colspan="3" height="78" style="border-style: outset; border-width: 1px">
			<p style="margin-top: 2px; margin-bottom: 2px" align="right"><font face="Arial">
			<strong style="font-weight: 400">

			<font size="2">
			
			&nbsp; Sales Stage: &nbsp;
			
			</font></strong>
			<font size="3">&nbsp;

<?

	//define needed variables - client_id already defined
	$desc_table = "desc_sales_stage";
	$select_box_name = "sales_stage";
	$desc_field_name ="sales_stage";
	
	//call function to create drop-down
	$salesStageDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $salesStageDropDown;


?>

			</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px" align="right"><font face="Arial">
			<font size="2">
			
				Sales Contact Next:&nbsp;&nbsp;&nbsp;&nbsp;

			</font></strong>

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
				</font>
			<strong style="font-weight: 400"><font size="2">
			
				Record Mgr/Program Counselor:
				
			</font>&nbsp;				
			</strong>
			<font face="Arial" size="3">

<?

//################################# set up record_manager drop-down ################################

//Start $recordMgrSelectBox
$recordMgrSelectBox="<select name = \"record_manager\"><option value=0 selected>None</option><br>";

// establish query to get record manager's' names and id#'s
$recordMgrQuery="SELECT f_name, l_name, id 
FROM auth_users
WHERE member_type !='therapist'
ORDER BY f_name";

//run query
$resultola=mysql_query($recordMgrQuery);

	//get info about record manager
	WHILE ($row=mysql_fetch_array($resultola)){
	  
	  $rec_mgr_f_name=$row['f_name'];
	  $rec_mgr_l_name=$row['l_name'];
	  $rec_mgr_id=$row['id'];  
	  
	  	//make the options list
	  	$recordMgrSelectBox .= "<option value = \"".$rec_mgr_id."\"";
	  	
	  		//check if selected
	  		if ($record_manager == $rec_mgr_id){//if this choice is one of those selected...
			  	
							//	$msg .= "\$choice_id = $choice_id and \$id = $id -> Match!<br><br>"; //testing????????			  
	  						//if yes then list as selected
						  	$recordMgrSelectBox .= " selected";
			  			  
			}//end of if statement 
	  
	  //add clients names	
	  $recordMgrSelectBox.= ">".$rec_mgr_f_name."&nbsp;".$rec_mgr_l_name."</option>";
	  
	}//end while statement

//put final tag on select box
$recordMgrSelectBox .= "</select>";

echo "$recordMgrSelectBox";
	
?>

		</font></font></p>
		</td>
	</tr>

	<tr>
		<td width="328" colspan="2" valign="top">
			<font face="Arial" size="2">
			
				Address:<br>
				
				<input type="text" name="address1" size=40 maxlength=50 >
				
			</font>
		</td>

		<td bgcolor="#CCCCFF" align="center" colspan="3" style="border-style: outset; border-width: 1px">
			<p style="margin-top: 2px; margin-bottom: 2px; text-align:right">
			<font face="Arial" size="2">
			
				Date Sold:&nbsp;
				
		

			</font>
			</p>
		</td>
	</tr>
	<tr>
		<td width="328" colspan="2" valign="top">
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Arial" size="2">
			
				City:<br>
				
			</font>
			<font size="3">

				<input type="text" name="address2" size=25 maxlength=40 >
			</font>
			<font size="2">
			</font>
			</p>

<table border="0" width="100%" id="table6">
	<tr>
		<td>
			<font face="Arial" size="2">
			
				State:<br>

			</font>

			<font size="3">
<?			
				//call function to output state drop-down with selected
				$state_print = $acIncludes->stateDropDown($address3);
				
				//output
				echo "$state_print";
				
?>				
				
			</font><font size="2">

</font></font></td>
		<td><font face="Arial"><font size="2">Zip: <br>
		</font> <font size="3"> 

			<input type="text" name="postcode" size=15 maxlength=15 ></font></font>

		</td>
	</tr>
</table>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Arial" size="2">
			
				e-mail:
			<br>
			</font>
			<font size="3">

				<input type="text" name="email" size=35 maxlength=55 ></font></font></p>
		</td>
		<td bgcolor="#CCCCFF" align="center" colspan="3" style="border-style: outset; border-width: 1px" valign="top">
			<font face="Arial" size="2">
			
				Referred By: 
			</font>
			<i><font size="2">
			<br>

				<input type="radio" value="1" name="referral_category" checked> Advertising? 
				<input type="radio" value="2" name="referral_category">A Client?&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" value="3" name="referral_category">A Physician?</font></i></font><p>

<?

	//define needed variables - client_id already defined
	$desc_table = "desc_referred_by";
	$select_box_name = "referred_by";
	$desc_field_name ="referred_by";
	
	//call function to create drop-down
	$referredByDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $referredByDropDown;


?>

			</p>
			<p><i><font size="2">
			
				Details
				
			</font></i><br>

				<input type="text" name="referred_by_details" size="50" >
		</td>
	</tr>
</table>

<table cellspacing=0 cellpadding=3 width="722" border="0" id="table1" style="border-style: outset; border-width: 1px">
	<tr>
		<td width="328" valign="top" bgcolor="#CCCCFF" rowspan="2">
			<p style="margin-top: 2px; margin-bottom: 2px" align="center">
			<font face="Arial" size="2">
			
				Primary Goal of Therapy:
				
			</font><br>
			
			
<?

	//define needed variables - client_id already defined
	$desc_table = "desc_primary_goal";
	$select_box_name = "primary_goal";
	$desc_field_name ="primary_goal";
	
	//call function to create drop-down
	$primaryGoalDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $primaryGoalDropDown;

?>




			<p style="margin-top: 2px; margin-bottom: 2px" align="center">
			
				Secondary Goal (If applicable):<br>
				
			<font size="3" face="Arial">



<?

	//define needed variables - client_id already defined
	$desc_table = "desc_primary_goal";
	$select_box_name = "secondary_goal";
	$desc_field_name ="secondary_goal";
	
	//call function to create drop-down
	$secondaryGoalDropDown=$acIncludes->dropDownModify($desc_table,$select_box_name,$client_id,$desc_field_name);
	
	//output dropdown with (hopefully) 
	echo $secondaryGoalDropDown;


?>




			</font>
			<p style="margin-top: 2px; margin-bottom: 2px" align="center">

				Primary Motivations to Change:<br>

			<font size="3" face="Arial">
	
				<textarea name="motivation" cols=37 rows=3></textarea>

			</font>
			<p style="margin-top: 2px; margin-bottom: 2px; text-align:center">
			<font size="2">
			
				Why Us?
				
			</font><br>
			<font size="3" face="Arial">

				<textarea name="why_us" cols=37 rows=3 wrap=virtual></textarea>
				
			</font>
			<br /><br /><br /><br />
			
				<input type="submit" value="SAVE" method="POST" action="do_modclient.php" name="save"></td>

		<td width="378" valign="top" bgcolor="#FFFFFF" rowspan="2">
			<p style="margin-top: 2px; margin-bottom: 2px" align="center">
			<font face="Arial">
			<strong style="font-weight: 400">
			<font size="2">
			
				Additional Information:
				
			</font></strong>
			<font size="2">
			<br />
			</font>
			<font face="Arial" size="3">

				<textarea name="log_entry" cols=41 rows=5 wrap=virtual>
				</textarea>
				
			</font>

		</td>
	</tr>
</table>

</form>




<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>