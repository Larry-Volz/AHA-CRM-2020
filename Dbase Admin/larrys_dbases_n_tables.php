<?
//Create a variable to hold the result of the mysql_connect() function
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die(mysql_error());

//test connection
//if ($connection) {$msg = "success!";}

// Create a variable to hold result of mysql_list_dbs() function which lists the databases on a server
$dbs = @mysql_list_dbs($connection) or die (mysql_error());

//will be looping.  Here's where I start the bulleted list and counter
$db_list = "<ul>";
$db_num=0;

//while $db_num is less than the number of rows in the database list...
while ($db_num < mysql_num_rows($dbs)){
	
	//within loop - get the name of the db reflected in the current row
	$db_names[$db_num] = mysql_tablename($dbs, $db_num);
	
	//Check to see if it's one of my databases by seeing if it's got "america2" in it's name
	if (strstr($db_names[$db_num], "america2")){
		
	//add the current database name to the bullet list:
	$db_list .= "<li>$db_names[$db_num]";
	
	//Create var to hold result of tables function - the tables LIST for THIS CURRENT database
	$tables = @mysql_list_tables($db_names[$db_num]) or die(mysql_error());
	
		//start the inner bulleted list outside of the innter loop
		$table_list = "<ul>";
		$table_num = 0;
			
			while ($table_num < mysql_num_rows($tables)){
			$table_names[$table_num] = mysql_tablename($tables, $table_num);
			$table_list .= "<li>$table_names[$table_num]";
			$table_num++;
		}
		
		$table_list .= "</ul>";
		
	$db_list .= "$table_list";
	
	} //finish Big "if it's one of Larry's" Loop
	
	$db_num++;
}

$db_list .= "</ul>";
	
?>





<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>My SQL Tables</title>
<h1>My SQL Databases and Tables on Localhost</h1><br />
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<? echo "$db_list"; ?>

<a href="Administrative%20Links.php">Back to Administrative Links</a><br>
<a href="../index.php">HOME</a>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>


