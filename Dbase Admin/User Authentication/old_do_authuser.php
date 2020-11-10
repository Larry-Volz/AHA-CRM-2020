<?
// Check and make sure entries made for both
if ((!$_POST[username]) || (!$_POST[password])){
	header( "Location: show_login.htm");
    exit;
}

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "auth_users";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// Select Database and create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name WHERE username = '$_POST[username]' AND password = password('$_POST[password]')";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

// check for number rows returned
$num = mysql_num_rows($result);

//if # returned is more than one then we have a winner!
if ($num !=0){
	$msg = "<p> Congrats... You're authorized!</p>";
    } else {
    	header("Location: show_login.htm");
        exit;
    }
?>

<html>
<head>
<title>Private Area</title>
<meta name="Microsoft Border" content="r, default">
</head>
<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<? echo "$msg"; ?>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>
</html>
        