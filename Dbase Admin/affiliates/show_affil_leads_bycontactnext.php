<?php
//###################### SESSION SECURITY CHECK ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

IF ($auth !="ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/authenticate.htm");
	exit;
}

//------------------------------ end security check --------------------------

//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
$list_id=11; //code for 'view leads by contact next' - PUT IN CORRECT CODE FOR PAGE!

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());

//###################################### QUERY ##########################################

$sql="SELECT * FROM $table_name WHERE membership_status = 'Lead' ORDER BY contact_next";

// var to hold result

$result=mysql_query($sql) or die(mysql_error());

//Create bulleted list of contacts
$contact_list="<table border=\"1\"><ul>";

	while ($row = mysql_fetch_array($result)){
    	$id=$row['id'];
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        $company=$row['company'];
        $address2=$row['address2'];
        $address3=$row['address3'];
        $date_modified=$row['date_modified'];
        $contact_next=$row['contact_next'];
        
        $readablecontact_next= date("F j, Y \a\\t g.i a", $contact_next);


        // Notice how this next line passes a variable by using ?var=$var in the href!!!
        $contact_list .= "<tr><td><li>$address3 ($address2):</td><td>  <a href=\"show_affiliate.php?id=$id\">$f_name $l_name - $company</a></td><td>$readablecontact_next</td></tr>";

    }//close the while loop
    $contact_list .= "</ul></table>";


?>
<html>

<head>
  <title>American Hypnosis Clinic:  Affiliate Leads By Contact Next</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1>Affiliate LEADS<br>
<i><font size="5" color="#000080">By Date to Contact Next</font></i></h1>
<p>Select an affiliate from the list below to view his or her record.</p>

<? echo "$contact_list"; ?>

<br><p><a href="affiliates_menu.php">Return to Main Menu</a></p>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>