<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do basic security check
$ahcDB->securityCheckBasic();

//CONNECT to DB
$ahcDB->dbConnect();

// ###################### STUFF GOES HERE ####################

/*
GOAL:  Create a control panel that displays those whose paperwork has been clicked automatically and those whose have not.  Should be able to check a box if it has come in and update it, or un-check it.  Should also be able to sort it by beginning and ending first appointment date.  Unchecked (unreceived) boxes should be in red, checked ones should be in green.  Fields should show 1st appointment date, fname, lname and client id#.


*/

//Check for get variables (begin and end dates)
$begin_date=$_GET['begin_date'];
$end_date=$_GET['end_date'];

?>

<html>
<head>
<title></title>
</head>
<body>


<!-- -----------------------Output the input fields with get data if present at top of screen ---------------- -->
<?
//define default start and end date

// ######################## MAY HAVE TO USE DIFFERENT DATE/TIME SYSTEM IF USING SERGIU'S ########################

$start_date= time()-604800;//one week ago
$end_date = time();//today

  $start_month=date(F,$start_date);
  $start_day=date(j,$start_date);  
  $start_year=date(Y,$start_date);  
  
  $end_month=date(F,$end_date);
  $end_day=date(j,$end_date);  
  $end_year=date(Y,$end_date); 



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

<?





//Open verification database and get all data (does it include 1st appointment?)

//(Later) Open all_clients database for additional data

//Output a list with client id# and checkbox checked if paperwork received and color coded red/bolded if not

// ############# MAYBE one check box for internet confirmation and a second one for written contract
//check legality of electronic agreement?

//Submit button for change goest to a do_.php file that updates changes to database and re-directs back to this page with get variables 




</body>
</html>