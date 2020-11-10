<html>
<head>
<title>Recent AHC Leads</title>

</head>
<body>
<?php

//define default start and end date
$start_date= time()-604800;//one week ago
$end_date = time();//today

  $start_month=date(F,$start_date);
  $start_day=date(j,$start_date);  
  $start_year=date(Y,$start_date);  
  
  $end_month=date(F,$end_date);
  $end_day=date(j,$end_date);  
  $end_year=date(Y,$end_date); 

//RETRIEVE VARIABLES
/* FANCY - DO LATER
//From Get
	if ($_GET[start_date]){
	  $start_date=$_GET[start_date];
	}
	
	if ($_GET[end_date]){
	  $end_date=$_GET[end_date];
	}

//Or from self-eating-watermelon form
	if ($_POST[start_date]){
	  $start_date=$_POST[start_date];
	}
	
	if ($_POST[end_date]){
	  $end_date=$_POST[end_date];
	}
*/

IF ($_POST['start_year']){
//  IF (IsSet($start_month)){
  
  $start_month=$_POST['start_month']+1;
  $start_day=$_POST['start_day'];  
  $start_year=$_POST['start_year'];  
  
  $end_month=$_POST['end_month']+1;
  $end_day=$_POST['end_day']+1;  
  $end_year=$_POST['start_year'];    
  

//convert time into a timestamp

$start_date = mktime(0,0,0,$start_month,$start_day,$start_year);
$end_date = mktime(11,59,59,$end_month,$end_day,$end_year);
}	
//INPUT FORM - need to set up date inputs that convert to timestamps first

?>

<form action="show_all_leads.php" method="post">
<h1 align="center">Recent Leads from Web Inquiries</h2>
<table width="100%">
	<tr>
		<td align="center">Start Date:<br>
&nbsp;<select name="start_month">
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

<select name="start_day">
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>11</option>
	<option>11</option>
	<option>12</option>
	<option>13</option>
	<option>14</option>
	<option>15</option>
	<option>16</option>
	<option>17</option>
	<option>18</option>
	<option>19</option>
	<option>20</option>
	<option>21</option>
	<option>22</option>
	<option>23</option>
	<option>24</option>
	<option>25</option>
	<option>26</option>
	<option>27</option>
	<option>28</option>
	<option>29</option>
	<option>30</option>
	<option>31</option>
</select>

<select name="start_year">
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
</p>

</select>

		</td>
		<td align="center">
		End Date:<br>
&nbsp;<select name="end_month">
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

<select name="end_day">
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>11</option>
	<option>11</option>
	<option>12</option>
	<option>13</option>
	<option>14</option>
	<option>15</option>
	<option>16</option>
	<option>17</option>
	<option>18</option>
	<option>19</option>
	<option>20</option>
	<option>21</option>
	<option>22</option>
	<option>23</option>
	<option>24</option>
	<option>25</option>
	<option>26</option>
	<option>27</option>
	<option>28</option>
	<option>29</option>
	<option>30</option>
	<option>31</option>
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

</form>
		
		</td>
	</tr>
</table>

<p align="center">

<input type="submit" value="Submit" name="submit">
<hr>

</form>

<?



//$output = "Web leads from $start_month $start_day, $start_year to $end_month $end_day, $end_year:";	?????????????????????????????????????????????????? FIX ??????????????????????????????????????????

$output = "<h3>Recent Web Leads:</h3>
$start_month/$start_day/$start_year - $end_month/$end_day/$end_year<br>
Timestamp start = $start_date, timestamp end = $end_date";	

//echo "start = $start_date end = $end_date<br>";


// set up connection parameters

	$db_name="america2_AHC";
	$table_name="new_leads";
	
	//################################## CONNECT ###########################################

//Get my class and methods
include_once("../../ahcDatabase_class.php");

//connect to db
$ahcDB->dbConnect();

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name WHERE time_stamp > '$start_date' AND time_stamp <= '$end_date'ORDER BY time_stamp DESC"; //WHERE time_stamp > $start_date AND time_stamp < $end_date

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());

//Create bulleted list of contacts
$output .="<table border=\"1\" width =\"100%\">";

	while ($row = mysql_fetch_array($result)){
    	$id=$row['id'];
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        $primary_goal=$row['primary_goal'];
        $city=$row['city'];
        $state=$row['state'];
        $zip=$row['zip'];        
        $day_phone=$row['day_phone'];
        $email=$row['email'];
        $time_stamp=$row['time_stamp'];
        
        $readable_timestamp= date("F j, Y \a\\t g.i a", $time_stamp);


        // Notice how this next line passes a variable by using ?var=$var in the href!!!
        $output .= "<tr><td><a href=\"show_one_lead.php?id=$id\">$f_name $l_name</td><td>$primary_goal</td><td>$city, $state $zip</a></td><td>$readable_timestamp</td></tr>";

    }//close the while loop
    $output .= "</table>";


//echo the output string
echo $output;


/*
unset($start_date);
$start_date="";
unset($end_date);
$end_date="";
unset($start_month);
*/

?>

</p>

</body>
</html>