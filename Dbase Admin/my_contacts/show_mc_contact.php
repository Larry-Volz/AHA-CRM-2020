<?php
//######################## VERIFY INPUT DATA WAS SENT #####################
if (!$_GET[id]){
	header( "Location: contact_menu.php");
    exit;
}

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory


//do basic security check
$ahcDB->securityCheckBasic();


//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
$list_id=25; //code for 'show a contact'

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------
///################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "my_contacts";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost","america2_larryvo","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//###########################################################################################

//validate id...
$chk_id = "SELECT id FROM $table_name WHERE id = '$_GET[id]'";

$chk_id_res = mysql_query($chk_id) or die(mysql_error());

//count # of rows in result...
$chk_id_num = mysql_num_rows($chk_id_res);

//deal with results of validation...

if ($chk_id_num !=1){//if there was no input...
	header("Location: contact_menu.php");
    exit;

    }else{
    	//Er... coulda just said SELECT * in the query... duh...
       	$sql = "SELECT * FROM $table_name WHERE id = '$_GET[id]'";

        $result=mysql_query($sql,$connection) or die(mysql_error());



        //CREATE AN ARRAY CALLED $row() FOR EACH RECORD IN RESULT SET
        while ($row = mysql_fetch_array($result)){
        	$f_name = $row['f_name'];
        	$l_name = $row['l_name'];
            $title = $row['title'];
            $company = $row['company'];
            $address1 = $row['address1'];
            $address2 = $row['address2'];
            $address3 = $row['address3'];
            $postcode = $row['postcode'];
            $country = $row['country'];
            $prim_tel = $row['prim_tel'];
            $sec_tel = $row['sec_tel'];
            $mob_tel = $row['mob_tel'];
            $email = $row['email'];
            $birthday = $row['birthday'];
            $fax = $row['fax'];
            $home_address1 = $row['home_address1'];
            $home_address2 = $row['home_address2'];
            $home_address3 = $row['home_address3'];
            $website = $row['website'];
            $notes = $row['notes'];

            }//close while loop that assigns values from fetch_array


 }  //closes else clause...
?>
<html>

<head>
  <title>American Hypnosis Clinic Contacts:  Read-only Contact Details</title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<h1>AHC Contacts:  Contact Details (read-only)</h1>
<h2>Contact Details for <? echo "$f_name $l_name"; ?></h2>

<p><strong>Name & Address:</strong><br>
<?

echo " $f_name $l_name<br> ";

if (($title !="")||($company != "")){
    	echo "$title , $company<br>";
        }//close if

if ($website != ""){
    	echo "<a href=\"http://$website\">$website</a><br>";
        }//close if

if ($address1 !=""){
 	   echo "$address1<br>";
    }//close if

if (($address2 !="")||($address3 !="")||($postcode !="")){
  	  echo "$address2, $address3 $postcode <br>";
    }//close if

if ($country !=""){
    echo "$country<br></p> ";
    }//close if


if ($prim_tel !=""){
 		echo "<p><strong>Tel 1:</strong> $prim_tel <br> ";
    }// close if

if ($sec_tel !=""){
 		echo "<strong>Tel 2:</strong> $sec_tel <br> ";
    }// close if

if ($mob_tel !=""){
	echo "<strong>Mobile:</strong> $mob_tel <br> ";
    }// close if

 if ($fax !=""){
	echo "<strong>Fax:</strong> $fax <br> ";
    }// close if

if ($email !=""){
	echo "<strong>E-mail:</strong> <a href=\"mailto:$email\">$email</a> <br> </p>";
    }// close if


if ($birthday !=""){
	echo "<p><strong>Birthday:</strong> $birthday </p> ";
    }// close if

if (($home_address2 !="")||($home_address3 !="")||($home_postcode !="")){
  	  echo "<p><strong>Home Address:</strong><br>$home_address1<br>$home_address2, $home_address3 $home_postcode</p>";
    }//close if

 if ($notes !=""){
  		echo "<p><strong>Notes:</strong> $notes <br> </p><br>";
    }// close if

?>

<p><a href="show_mc_contactsbyname.php">Return to List by Last Name</a> -- <a href="show_mc_contactsbycompany.php">Return to List by Company</a> -- <a href="contact_menu.php">Return to Main Menu</a></p>


<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>