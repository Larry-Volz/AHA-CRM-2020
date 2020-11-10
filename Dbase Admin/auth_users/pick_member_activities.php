<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do basic security check
$ahcDB->securityCheckBasic();


//######################## connect #########################################

session_start();//IF NOT ALREADY STARTED

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED



// ###################### STUFF GOES HERE ####################

$table_name="auth_users";

//create the sql statement
$sql = "SELECT id, f_name, l_name FROM $table_name ORDER BY l_name";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

// check for results
$num= mysql_num_rows($result);

if ($num <1){
	$display_block = "<p><em>Sorry!  No Results.</em></p>";
	echo $display_block;
	exit;
    }else{
    	while ($row = mysql_fetch_array($result)){
        	$user_id = $row['id'];
            $f_name = $row['f_name'];
            $l_name = $row['l_name'];

            //Populate options for a select input block
            $option_block .= "<option value=\"$user_id\">$l_name, $f_name</option>";
            }//close while loop

       
} // end if-else block  


?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>AHC Members:  View Member Activities</title>



<meta name="Microsoft Border" content="r, default">

<!-- DATE PICKER BACKEND -->
|<script language="javascript">
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


<!-- DATE PICKER #2 FOR THE SECOND FORM -->
<script language="javascript">
	monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31)

	function populateDays(monthChosen){		//creates new variable called monthChosen from result from the month drop down list?
		monthStr = monthChosen.options[monthChosen.selectedIndex].value //month STRING = the value of the selected index ex: 4 for May
		if (monthStr !="") { 				// if something was actually chosen then...
			theMonth=parseInt(monthStr)		//The choice again -> but makes sure it's keeping just the number, not a string

			document.myForm2.days.options.length = 0	//clears the options menu
			for (i=0;i<monthDays[theMonth];i++){	// Monthdays is the array holding the max days in the month
				document.myForm2.days.options[i] = new Option(i+1) //new Option() must be a system function that adds another option with what's in ()... I imaging you could use strings ("day"+i) for example
				}
			}
		}

	function blow_me(){
		document.write('...days.selectedIndex = '+ document.myForm2.days.selectedIndex);
		document.write('...options[...selectedIndex].value = '+ document.myForm2.days.options[document.myForm2.days.selectedIndex].value);
		}
//	document.myForm2.months.selectedIndex=0
</script>


</head>

<body>
<!--msnavigation-->
<table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<!--msnavigation-->
		<td valign="top">
			<h1>AHC Members</h1>
				<h2><em>View Member Activities - Select from List</em></h2>

			<p>Select a member from the list below and a date in order to view his or her activities.</p>

<form method="post" action = "show_member_activities.php" name="myForm">

<table>
	<tr>
		<td>		
		<select name="user_id">
			<? echo "$option_block"; ?>
		</select>
		</td>
		<td>

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
		</td>
	</tr>
</table>

<INPUT TYPE="hidden" name="f_name" value="<? echo $f_name; ?>">
<INPUT TYPE="hidden" name="l_name" value="<? echo $l_name; ?>">

 	  <p><INPUT TYPE = "SUBMIT" NAME = "submit" VALUE = "Select This Member"></p>
   
</form>
<br><br>
<!-- ############################### SECOND FORM FOR ALL PC'S ########################## -->
<form method="post" action = "show_allpcs_activities.php" name="myForm2">
<strong><i>Pick a date and click "Go" to see all PC's activities for a given day.</i></strong>
<table>
	<tr>

		<td>

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
		</td>
		<td>
		 	  <INPUT TYPE = "SUBMIT" NAME = "submit" VALUE = "Go">		
		</td>
	</tr>
</table>



   
</form>


<br><p><a href="contact_menu.php">Return to Main Menu</a></p>


<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>
<iframe name="I1" src="../../right_border_testimonials.php" width="218" height="560" border="0" frameborder="0" scrolling="no">
Your browser does not support inline frames or is currently configured not to display inline frames.
</iframe></p>

</td></tr><!--msnavigation--></table>

</body>

</html>