<?php
// ################################# SECURITY #####################################

if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
}


//################################ CONNECT ########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "my_contacts";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//########################################## QUERY #################################################



?>
<html>

<head>
  <title></title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<?php

echo "Hello!";

?>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>