<?
//####################################### SECURITY ##################################3
//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory


//do basic security check
$ahcDB->securityCheckBasic();

//####################################### CONNECT #####################################

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "quotes";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar"") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//###################################### SQL #####################################3


//create the sql statement PICK EVERYTHING where id number matches
$sql = "SELECT * FROM `quotes` WHERE id = '$_POST[id]'";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

//################################## GET RESULTS ##################################


while ($row = mysql_fetch_array($result)){
	$id = $row['id'];
	$f_name = $row['f_name'];
	$l_name = $row['l_name'];
	$quote = $row['quote'];
	$caption = $row['caption'];
	$picture_url = $row['picture_url'];

}
/*##################### COMMENTED OUT ####################################################

######################################################################################### */
?>



<html>

<head>

<title>AHC Contacts:  Modify a Quote</title>


<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<h1>AHC Testimonials</h1>
<h2><em>Modify a Quote</em></h2>
<p> You may change the order of sentences or repair typos - but do not change the wording since these are the clients' 
actual testimonials.</p>


<form method="post" action="do_modquotes.php">

<input type="hidden" name="id" value="<? 'echo $post[id]'; ?>" >

<table cellspacing=3 cellpadding=5 width="763">
<tr valign = "middle">
<th width = "356">

<p align="left">Clients and Quotes</th>

</tr>
<tr>
<TD valign=top width="356">

<p><strong>First Name:</strong><br />
<input type="text" name="f_name" value="<? echo " $f_name "; ?>" size="35" maxlength="75"></p>

<p><strong>Last Name:</strong><br />
<input type="text" name="l_name" value="<? echo "$l_name"; ?>" size="35" maxlength="75"></p>

<p><strong>Quote:</strong><br />
<!-- <input type="text" name="quote" value="<? echo "$quote"; ?>"></p>-->
<textarea name="quote" rows="8" cols="80" ><? echo "$quote"; ?></textarea></p>

<p><strong>Caption:</strong><br />
<input type="text" name="caption" value="<? echo "$caption"; ?>" size="75" maxlength="200""></p>


<p><strong>URL of Picture (if available):</strong><br />
<input type="text" name="picture_url" value="<? echo "$picture_url"; ?>"></p>



<p><input type="submit" name="submit" value="Modify Quote"></p>

<p><a href="quotes_menu.php">Return to Main Menu</a></p>

</td>
</tr>

</table>


</form>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>