<?

// ################################# SECURITY #####################################
if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
}
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

$username="america2_larryvo";
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
echo ("File has been changed  successfully");

?>