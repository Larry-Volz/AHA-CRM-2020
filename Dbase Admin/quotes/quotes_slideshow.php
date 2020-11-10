<?php

session_start();

//#################### check to see if returning #######################

if (!$_SESSION[returning]){
  session_register('returning');
  $_SESSION[returning]=1 ;    // notes that we've been here before so skip this next time
  $returning = $_SESSION[returning];

  session_register('id_q'); //keeps track of which quote to echo - didn't like the var name quote_id
  $_SESSION[id_q] = 1 ;
  $id_q = $SESSION[id_q];

  session_register('quote_start_time'); // registers the start time in the session file
  $_SESSION[quote_start_time]=time(); //sets the start time for the quote generator as now
  $quote_start_time = $_SESSION[quote_start_time];


  //only echos this message the 1st time - used to check variablesand that worked
echo "Welcome to the first session start!<br> id_q started == $id_q <br>
returning == $returning <br> quote_start_time == $quote_start_time<br>";



}

//############# End doing the stuff you do the first time only #################

// ************************** DEFINE SIMPLE VARIABLES ************************

$quote_start_time = $_SESSION[quote_start_time]; // just so it's easier to read...

// increment count for current # of times this page was accessed - not really neccessary part of original exercize...
$_SESSION[count]++;

//******************** Do the stuff needed before the timer starts ************************

//################################# CONNECT ##################################
/*
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "quotes";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());
*/
//################################### my SQL ***************************************

/* ########################### COMMENTING OUT ALL MYSQL #########################################
//create the sql statement

$sql = "SELECT * FROM $table_name WHERE id = $id_q ";  //system didnt like $quote_id!!! ****

echo "The sql statement reads: <br> $sql ";  //FOR TESTING PURPOSES ONLY

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());


// ********************************* check for results *****************************

$num_quotes = mysql_num_rows($result);
*/   ############################### END COMMENTING OUT  MYSQL ############################################

echo "<h1> $num_quotes records returned from query </h1>";

/* ########################### COMMENTING OUT ALL MYSQL #########################################
while ($quote_row = mysql_fetch_array($result)){
    $f_name = $quote_row['f_name'];
    $l_name = $quote_row['l_name'];
    $quote = $quote_row['quote'];
    $caption = $quote_row['caption'];
    $picture_url = $quote_row['pictue_url'];
}

*/ ########################### END COMMENTING OUT  MYSQL #########################################

//********************** **************** OUTPUT QUOTE ***************** ***********************
/*
$print_block = " $quote <br> $f_name $l_name <br> $caption <br><br>";

echo " $print_block ";
*/

//********************** CALCULATIONS TO DETERMINE WHEN TO RELOAD PAGE ***********************
/*
$current_time = time();
$quotes_time_difference = $current_time - $quote_start_time; //How long since started...
$quotes_timer = $quotes_time_difference%30; //if div/30  has no remainder or every 30 seconds...
*/


/*do{
    $current_time = time();
	$quotes_time_difference = $current_time - $quote_start_time;
    $quotes_timer = $quotes_time_difference%30;
} while ($quotes_timer != 0);
*/

/*if($quotes_timer == 0){
	echo "BOO";
    $_SESSION[id_q]++;
    $id_q= $_SESSION[id_q];
    }
*/

/*if ( $quotes_timer == 0) {
	echo "<h1>TIMES UP!</h1>";   For testing only - it worked!
    $id_q++;
    	if ($id_q > $num_quotes){
        	$id_q = 1;
            } //re-set the number of the current quote if it's more than are entered
}
 */
?>

<html>

<head>
  <title>COUNT ME!</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>