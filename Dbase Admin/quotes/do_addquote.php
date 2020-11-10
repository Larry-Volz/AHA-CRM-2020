<?
// ####################################### SECURITY ###########################################



//###################################### if no entry made... ######################################

if ((!$_POST[l_name])&&(!$_POST[quote]))
{
	header( "Location: show_addquote.php");
    exit;
}//end check if data entered block

// ############################################### CONNECT ###################################################


// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "quotes";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// SELECT DB create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

// ############################################### MY SQL STATEMENT ###################################################

//create the sql statement  first () does names in order and 2nd () sends strings
$sql = "INSERT INTO $table_name
(id, f_name, l_name, caption, quote, picture_url) VALUES ('', '$_POST[f_name]', '$_POST[l_name]', '$_POST[caption]', '$_POST[quote]',
'$_POST[picture_url]')";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>American Hypnosis Clinic: Testimonial Quote Added</title>


<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1>AHC Testimonials</h1>
<h2><em>Add a Quote:  Testimonial ADDED</em></h2>

<p>The following information was successfully added to <? echo "$table_name"; ?></p>

<table cellspacing=2 cellpadding=1>

<tr><td><? echo " <img src=$_POST[picture_url]> "; ?></td></tr>

<tr><td><? echo " $_POST[quote] "; ?></td></tr>

<tr><td justify="right"><? echo "-- $_POST[f_name] $_POST[l_name]"; ?></td></tr>
<tr><td justify="right"><? echo " $_POST[caption] "; ?></td></tr>



<tr><td><a href="quotes_menu.php">Return to Main Menu</a></td></tr>
</table>


<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
