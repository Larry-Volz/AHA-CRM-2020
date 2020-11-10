<?php
//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory


//do basic security check
$ahcDB->securityCheckBasic();





// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "my_contacts";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT id, f_name, l_name FROM $table_name ORDER BY l_name";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

// check for results
$num= mysql_num_rows($result);

if ($num <1){
	$display_block = "<p><em>Sorry!  No Results.</em></p>";
    }else{
    	while ($row = mysql_fetch_array($result)){
        	$id = $row['id'];
            $f_name = $row['f_name'];
            $l_name = $row['l_name'];

            //Populate options for a select input block
            $option_block .= "<option value=\"$id\">$l_name, $f_name</option>";
            }//close while loop

        //create display block to hold form -earlier one won't be used unless there's an error

        $display_block ="<FORM METHOD =\"POST\" ACTION = \"show_mc_modcontact.php\">
        <p><strong>Contact:</strong>

        <select name=\"id\"> $option_block </select>

   <INPUT TYPE = \"SUBMIT\" NAME = \"submit\" VALUE = \"Select This Contact\"></p>
        </form>";
        
} // end if-else block  

?><html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>AHC Contacts:  Modify a Contact</title>



<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<h1>AHC Contacts</h1>
<h2><em>Modify a Contact - Select from List</em></h2>
<p>Select a contact from the list below, to modify the contacts record.</p>
<? echo "$display_block"; ?>

<br><p><a href="contact_menu.php">Return to Main Menu</a></p>


<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
