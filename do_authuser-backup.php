<?
// Check and make sure entries made for both
if ((!$_POST[username]) || (!$_POST[password])){
	header( "Location: show_login.htm");
    exit;
}

//################################# CONNECT #################################################

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "auth_users";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// Select Database and create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//#################################### QUERY 1  Password match #######################################
//create the sql statement
$sql = "SELECT * FROM $table_name WHERE username = '$_POST[username]' AND password = password('$_POST[password]')";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());

// check for number rows returned
$num = mysql_num_rows($result);

//################### New ######## QUERY 2 Get LEVEL of permission granted ######################
$query2="SELECT * from $table_name WHERE username = '$_POST[username]' AND password = password('$_POST[password]')";
$result2=@mysql_query($query2) or die(mysql_error());
$perm_array=mysql_fetch_array($result2);
$permission=$perm_array[member_type];
$user_id = $perm_array[id];
//####################### ##########################################################################

//if # returned is more than one then we have a winner!
if ($num !=0){

		//set cookie to say yes to authorized users
		
		$cookie_name= "auth";
		$cookie_value = "ok";
		$cookie_expire = "0";
		$cookie_domain = ".americanhypnosisclinic.com";
		setcookie($cookie_name, $cookie_value, $cookie_expire, "/", $cookie_domain, 0);


//################NEW set 2nd cookie to give level of permissions throughout the site #################
		
		$cookie2_name= "permission";		
		$cookie2_value = $permission;
		$cookie2_expire = "0";
		$cookie2_domain = ".americanhypnosisclinic.com";
		setcookie($cookie2_name, $cookie2_value, $cookie2_expire, "/", $cookie2_domain, 0);	
#################NEW SET 3RD COOKIE TO ID THIS USER #################################################
		$cookie3_name= "user";		
		$cookie3_value = $user_id;
		$cookie3_expire = "0";
		$cookie3_domain = ".americanhypnosisclinic.com";
		setcookie($cookie3_name, $cookie3_value, $cookie3_expire, "/", $cookie3_domain, 0);	
			
    	header("Location: index2.php");
        exit;
        
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
        