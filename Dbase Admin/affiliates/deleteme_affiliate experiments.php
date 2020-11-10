<?php

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// SELECT DB - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//######################### QUERY ################################################

$get_affil_id_query = "SELECT id FROM affiliates WHERE f_name='Testy' and l_name='Jones'";

//execute the sql statement and create a variable you can use to display or work with it
$get_affil_id_result = mysql_query($get_affil_id_query) or die(mysql_error());
WHILE ($affil_id = mysql_fetch_array($get_affil_id_result)){

echo "id number is $affil_id";
 }
?>
<html>

<head>
  <title></title>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
<meta name="Microsoft Border" content="none, default">
</head>

<body>



</body>

</html>