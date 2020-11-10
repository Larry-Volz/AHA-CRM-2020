<?
$ud_first=$_POST['ud_first'];
$ud_title=$_POST['ud_title'];

$username="america2_larryvo";
$password="magiclar";
$database="america2_AHC";
mysql_connect(localhost,$username,$password);


@mysql_select_db($database) or die( "Unable to select database");
$query="update my_contacts set title='$ud_title' where f_name='$ud_first'";
mysql_query($query);
echo ("Title has been changed to '$ud_title' successfully");
?>
