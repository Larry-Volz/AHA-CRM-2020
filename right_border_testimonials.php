<?
//################################# STRATEGY ################################
// - Check database of quotes to see how many are there
// - set a session
// - see if a counter is already in place
// - if no, set counter at 0
// - if yes see if it's at max -> if yes then re-set to 0
// - if exists but not at max then increment by one
// - get quote[counter#] out of database
// - echo it
// - use html header refresh to refresh every 90 sec or so
// - ideally refresh with the ie fade in/out feature
//###########################################################################

//open or re-visit previously open session
session_start();


//################################## CONNECT ###########################################

include_once("ahcDatabase_class.php");

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "quotes";

//open the SQL connection to AHC server databases
//$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

$ahcDB->dbConnect();


// SELECT DataBase - create var to hold the result of select db function
//$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//query
$sql = "SELECT count(id) FROM $table_name";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());

//Get count of quotes by id#
$max_quotes = mysql_result($result,0,"count(id)") or die(mysql_error());
//###########################################################################################


// See if it's the first time
if (!isset($_SESSION[quote_counter])){
  
  //if it's the first time set a counter
  $_SESSION[quote_counter]=0;
  
	//make variable easier to read/write
  $quote_counter=$_SESSION[quote_counter];
  
}// end if block

  		$quote_counter=$_SESSION[quote_counter];
  		
  		$quote_counter++;
  		$_SESSION[quote_counter]=$quote_counter;
  		
  		if($quote_counter>$max_quotes){
		  	$quote_counter=1;  
		}// end reset if more than max
		

//get quote # $quote_counter from DB
$query2 = "SELECT * FROM $table_name WHERE id='$quote_counter'";

//run the query and get reciept
$result2 = mysql_query($query2, $connection) or die(mysql_error());

//make it into a string variable and echo it in the html
while ($get_array = mysql_fetch_array($result2)){
  	$current_quote = $get_array['quote'];
  	$f_name = $get_array['f_name'];
  	$l_name = $get_array['l_name'];  	
  	$caption = $get_array['caption'];  	
  	
}// finish while loop

  	$current_quote = stripslashes($current_quote);
  	$f_name = stripslashes($f_name);
  	$l_name = stripslashes($l_name);  	
  	$caption = stripslashes($caption);



//------------------------------ end security check --------------------------

?>
<html>
<head>
<meta http-equiv="Page-Enter" content="blendTrans(duration=1.0)">
<meta http-equiv="REFRESH" content="6;URL=right_border_testimonials.php">
<title>Shared Right Border</title>
<meta name="Microsoft Theme" content="none">
<meta name="Microsoft Border" content="none">
</head>
<body>
<table border="0" width="165" id="table2">
	<tr>
		<td>
			<? echo "<b><font size=\"5\">\"</font></b><i> $current_quote </i><b><font size=\"5\">\"</font></b><br />"; ?>
			<? echo "<p align=\"right\"> - $f_name $l_name <br />"; ?>
			<? echo "$caption </p>"; ?>
		</td>
	</tr>
</table>

</body>
</html>