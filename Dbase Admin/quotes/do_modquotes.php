<?php


//################################ CONNECT ########################################

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "quotes";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//########################################## QUERY #################################################


$sql = "UPDATE $table_name SET f_name='$_POST[f_name]',l_name='$_POST[l_name]',quote='$_POST[quote]',
caption='$_POST[caption]',picture_url='$_POST[picture_url]' WHERE id='$_POST[id]'";

$result=mysql_query($sql,$connection) or die(mysql_error());

?>

<html>

<head>
  <title>AHC Testimonials:  Update a Quote</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<h1>AHC Testimonials:  Update a Quote</h1>
<h2><em>Modify a Contact - Contact Updated</em></h2>

<p>The following information was successfully modified in <? echo "$table_name"; ?></p>

<table cellspacing=2 cellpadding=1>

<tr><td><? echo " $_POST[f_name] "; ?></td></tr>
<tr><td><? echo " $_POST[l_name] "; ?></td></tr>
<tr><td><? echo " $_POST[quote] "; ?></td></tr>
<tr><td><? echo " $_POST[caption] "; ?></td></tr>
<tr><td><? echo " $_POST[picture_url] "; ?></td></tr>

<tr><td><a href="quotes_menu.php">Return to Main Menu</a></td></tr>
</table>


<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>