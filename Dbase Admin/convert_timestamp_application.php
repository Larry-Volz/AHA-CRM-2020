<?php
//################# check for input (same script for form & backend)
if ($_POST['months']){
  
  
//############################### Convert Javascript Date Into Timestamp ###############################

$month=$_POST['months']+1;
$day=$_POST['days'];
$year=$_POST['year'];

$timestamp=mktime(0,0,0,$month,$day,$year);


//================================ END DATE TO TIMESTAMP CONVERSION =================================
  
  
  
}//End If Block


//############### Get data ##################
?>
<html>
<head>
<title>convert time to timestamp and back</title>

<script language="javascript">
	monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31)
	
	function populateDays(monthChosen){		//creates new variable called monthChosen from result from the month drop down list?
		monthStr = monthChosen.options[monthChosen.selectedIndex].value //month STRING = the value of the selected index ex: 4 for May
		if (monthStr !="") { 				// if something was actually chosen then...
			theMonth=parseInt(monthStr)		//The choice again -> but makes sure it's keeping just the number, not a string
			
			document.convert_timestamp.days.options.length = 0	//clears the options menu
			for (i=0;i<monthDays[theMonth];i++){	// Monthdays is the array holding the max days in the month
				document.convert_timestamp.days.options[i] = new Option(i+1) //new Option() must be a system function that adds another option with what's in ()... I imaging you could use strings ("day"+i) for example
				}
			}
		}
	

</script>
<meta name="Microsoft Border" content="r, default">
</head>
<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1>convert time to timestamp and back</h1>
<br><br><br>

<form action="<?php echo "$_SERVER[PHP_SELF]"; ?>" name = "convert_timestamp" method="POST">

<!-- ##################################### INPUT TABLE ################################################# -->

<table WIDTH ="100%" border = "1">
	<tr>
		<td colspan="2">
		<strong><font align="center">INPUT</font></strong>
		</td>
	</tr>
	<tr>
		<td>

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

	
</select>

		</td>
		<td>
			Timestamp in: <input type="text" name="timestamp_in" value="<? echo $_POST['timestamp_in']; ?>">
		</td>
	</tr>


<!-- ############################## OUTPUT TABLE HERE ########################### -->
	<tr>
		<td colspan="2">
		<strong><font align="center">OUTPUT</font></strong>
		</td>
	</tr>
	<TR>
		<TD>
<strong>Last Chosen Timestamp = </strong><? echo "$timestamp "; ?>

		</TD>
		<TD>
			<strong>Date from timestamp =</strong>&nbsp;
			<?
			
			$timestamp_in = $_POST['timestamp_in'];
						
			if ($timestamp_in > 0 ){
			  

				$timestamp_day = date("j", $timestamp_in);	//day of month from 1 to 31
				$timestamp_month = date("n", $timestamp_in);
				$timestamp_year = date("Y", $timestamp_in);
				
				$timestamp_hour = date("g", $timestamp_in);
				$timestamp_minutes = date("i", $timestamp_in);	
				$timestamp_seconds = date("s", $timestamp_in);							
								
				$timestamp_am_pm = date("A", $timestamp_in);
				
				$timestamp_output = date("F j , Y  g:i:s A",$timestamp_in);
				
				echo $timestamp_output;			
					
			}//end if
			?>
		</TD>
	</TR>
	<tr>
		<td>
		Seconds elapsed today:&nbsp;
<?
		$now=time();
		
		//get date for today		
		$today = date("j", $now);	//day of month from 1 to 31
		$month = date("n", $now);
		$year = date("Y", $now);
		  
		//create todays timestamp from date but starting at midnight
		$today_midnight = mktime(0,0,0,$month,$today,$year);
		//subtract midnight from now for new time elapsed
		$seconds_elapsed=$now-$today_midnight;

		echo $seconds_elapsed;


?>
		</td>
		<td>
		&nbsp;
		</td>
	</tr>
</TABLE>

<input type="submit" value="Convert" />

</form>
</body>
</html>

