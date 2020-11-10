<?

// ################################# SECURITY #####################################

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
$list_id=22; //code for 'modify contact'
//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------


//################################ DEFINE VARIABLES FROM POST ##############################
$ud_id=$_POST['ud_id'];
$title=$_POST['title'];
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$address3=$_POST['address3'];
$postcode=$_POST['postcode'];
$country=$_POST['country'];
$prim_tel=$_POST['prim_tel'];
$sec_tel=$_POST['sec_tel'];
$mob_tel=$_POST['mob_tel'];
$email=$_POST['email'];

$birthday=$_POST['birthday'];
$company=$_POST['company'];
$fax=$_POST['fax'];
$home_address1=$_POST['home_address1'];
$home_address2=$_POST['home_address2'];
$home_address3=$_POST['home_address3'];
$notes=$_POST['notes'];
$website=$_POST['website'];

//######################################## CONNECTION ###########################

$username="america2_AHC";
$password="magiclar";
$database="america2_AHC";
$table_name="my_contacts";

$connection=mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

//################################## QUERY ############################################
//**************** FOR GODS SAKE DONT PUT A COMMA BEFORE WHERE****************

$query="update $table_name set title='$title',f_name='$f_name',l_name='$l_name',
address1='$address1',address2='$address2',address3='$address3',postcode='$postcode',
country='$country',prim_tel='$prim_tel',sec_tel='$sec_tel',mob_tel='$mob_tel',email='$email',
birthday='$birthday',company='$company',fax='$fax',home_address1='$home_address1',
home_address2='$home_address2',home_address3='home_address3',notes='$notes',website='$website'
WHERE id='$ud_id'";

mysql_query($query);

//################################ OUTPUT ##########################################

?>
<html>
<head>
<title>AHC Contacts: Modify a Contact</title>
<meta name="Microsoft Border" content="r, default">
</head>
<body bgcolor=""><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<!-- <form action="do_mc_modcontact.php" method="post">  I think this is an error-->

<h1>AHC Contacts:&nbsp; Modify a Contact</h1>
<h2><i>This individual's contact information has been modified.</i></h2>

<table width="580" id="table1">
<tr>
<td width="300">

</td>
</tr>
<p><strong>Name & Address:</strong><br>
<?

//echo "(Id: $ud_id)";
echo "$f_name $l_name<br> ";

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
echo "</h6>";
?>

<p><a href="show_mc_contactsbyname.php">Return to List by Last Name</a> -- <a href="show_mc_contactsbycompany.php">Return to List by Company</a> -- <a href="contact_menu.php">Return to Main Menu</a></p>


</p>


</html>