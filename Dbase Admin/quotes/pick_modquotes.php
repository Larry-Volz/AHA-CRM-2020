<?php

//################################### SECURITY ###################################
//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory


//do basic security check
$ahcDB->securityCheckBasic();

//################################# CONNECT ##################################

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "quotes";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//################################### my SQL ***************************************


//create the sql statement
$sql = "SELECT id, f_name, l_name, quote FROM $table_name ORDER BY l_name";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());


// ********************************* check for results *****************************

$num= mysql_num_rows($result);

if ($num <1){
	$display_block = "<p><em>Sorry!  No Results.</em></p>";
    }else{
    	while ($row = mysql_fetch_array($result)){
        	$id = $row['id'];
            $f_name = $row['f_name'];
            $l_name = $row['l_name'];
	    $quote = $row['quote'];
	    $quotebit = substr($quote,0,35);


//****************************************** CREATE FORM *************************************************

            //Populate options for a select input block
            $option_block .= "<option value=\"$id\">$l_name, $f_name  -  $quotebit ...</option>";
            }//close while loop

        //create display block to hold form - earlier var with same name won't be used unless there's an error

        $display_block ="<FORM METHOD =\"POST\" ACTION = \"show_modquotes.php\">
        <p><strong>Contact:</strong>

        <select name=\"id\"> $option_block </select>

   <INPUT TYPE = \"SUBMIT\" NAME = \"submit\" VALUE = \"Select This Client's Quote\"></p>
        </form>";
        
} // end if-else block  

?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>AHC Testimonials:  Modify a Quote</title>



<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<h1>AHC Contacts</h1>
<h2><em>Modify a Quote - Select from List</em></h2>
<p>Select a contact from the list below, to modify the author's testimonial.  You may change the order of sentences
or repair typos - but do not change the wording since these are the clients' actual testimonials.</p>



<? echo "$display_block"; ?>

<br><p><a href="quotes_menu.php">Return to Main Menu</a></p>


<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
