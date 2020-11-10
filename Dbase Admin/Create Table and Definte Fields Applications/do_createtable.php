<?
// create variable for name of database
$db_name = "america2_AHC";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//Start building the query
$sql = "CREATE TABLE $_POST[table_name] (";

//Loop to add parameter for each choice client made in previous form - used COUNT
	for ($i = 0; $i < count($_POST[field_name]); $i++){

		$sql .= $_POST[field_name][$i]." ".$_POST[field_type][$i];

        //IF TO CHECK FOR AUTO INCREMENT AND PRIMARY KEYS
        if ($_POST[auto_increment][$i] == "Y"){
        	$additional = "NOT NULL auto_increment";
            }else{
            	$additional = "";
            }

        if ($_POST[primary][$i] == "Y"){
        	$additional .= ", primary key (".$_POST[field_name][$i].")";
            } else {
            	$additional = "";
            }

		//if block for those that have specific lengths
		if ($_POST[field_length][$i] !=""){
			$sql .= " (".$_POST[field_length][$i].") $additional ,";

		//if no length present just print comma to separate field definitions
		}else{
			$sql .= ",";
			}

	}	//close the for loop for each field

// Get rid of the extra comma at the end...
$sql = substr($sql, 0, -1);

$sql .= ")";

// create var to hold result of query
$result = mysql_query($sql, $connection) or die(mysql_error());

//test value of result to make sure it worked
if ($result){
	$msg = "<p>".$_POST[table_name]." has been created!</p>";
	}

?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Create a Database Table</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1>Adding table to <? echo "$db_name"; ?>...</h1>
<br>
<? echo "$msg"; ?>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>


