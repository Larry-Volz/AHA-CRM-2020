<?
//show_one_lead.php

//get get variable

$id=$_GET['id'];
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
$sql = "SELECT * FROM $table_name WHERE id='$id'"; //WHERE time_stamp > $start_date AND time_stamp < $end_date

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());

//Create bulleted list of contacts


	while ($row = mysql_fetch_array($result)){
    	$id=$row['id'];
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        $primary_goal=$row['primary_goal'];
        $secondary_goal=$row['secondary_goal'];
		$address=$row['address'];
        $city=$row['city'];
        $state=$row['state'];
        $zip=$row['zip'];        
        $day_phone=$row['day_phone'];
        $email=$row['email'];
        $time_stamp=$row['time_stamp'];
        $best_time_to_call=$row['best_time_to_call']; 
        $alt_phone=$row['alt_phone'];		
        $problem_details=$row['problem_details'];
        $motivation=$row['motivation'];
        $travel_distance=$row['travel_distance'];
        $travel_units=$row['travel_units'];						
        $referred_by=$row['referred_by'];
        $why_us=$row['why_us'];
						       
        $readable_timestamp= date("F j, Y \a\\t g.i a", $time_stamp);


}//end while

//output
	$msg ="
	
<h2>New Lead</h2>
<p>Filled out his web inquiry on ".date('M j\, Y',$EST)." at ".date('h\:i',$EST)."</p>

Name: $f_name $l_name <br>
Daytime Phone: $day_phone <br>
Best time to call: $best_time_to_call <br>
Alternate phone: $alt_phone <br>
e-mail: $email <br><br>

Address:<br>
$address<br>
$city, $state $zip<br><br>

Primary goal:  $primary_goal <br>
Secondary goal: $secondary_goal <br>
Problem details:  $problem_details <br>
Motivation:  $motivation <br><br>

Will travel: $travel_distance $travel_units<br><br>

Referred_by: $referred_by <br><br>

Why us? $why_us <br>	
	";
	
echo "$msg";

echo "<p><a href=\"show_all_leads.php\">Back</a>";

?>