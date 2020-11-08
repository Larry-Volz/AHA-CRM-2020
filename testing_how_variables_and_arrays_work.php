<?php
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "auth_users";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// Select Database and create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql="SELECT member_type from $table_name WHERE id='1'";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

//Get data back
$perm_array=mysql_fetch_array($result);
$permissions=$perm_array[member_type];


echo "<h1> Results of the query:</h1><br>
result = mysql_query($sql) or die(mysql_error()) = $result <br>
after using sql=\"SELECT member_type from table_name WHERE id='1')\"<br><br>
permissions = mysql_fetch_array(result) =  $perm_array<br>
permissions = perm_array[member_type] = $permissions";

// check for number rows returned
$num = mysql_num_rows($result);


?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>New Page 1</title>
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>