<?

$affiliate_id=$_POST['affiliate_id'];

//make sure that affiliate is chosen
if ($affiliate_id=="0"){
  header("Location: show_nearest_big_city.php");
  exit;
}

$city1=$_POST['city1'];
$city2=$_POST['city2'];
$city3=$_POST['city3'];

//update the database listing


//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//Get my class and methods
include_once("../../ahcDatabase_class.php");

//CONNECT TO DB
$ahcDB->dbConnect();


//open the SQL connection to AHC server databases
//$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
//$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "UPDATE $table_name SET close_city1='$city1', close_city2='$city2', close_city3='$city3' WHERE id='$affiliate_id'";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());

//###########################################################################################


	
//Output something nice as a thank you

echo "The following has been entered into your database record:<br><br>city 1 = $city1<br>city 2 = $city2<br>city 3 = $city3<br><br>";

echo "Thanks for helping us to better serve you!<br><br>If you have any questions please feel free to e-mail Heather Merrill at heather@ahc.intranets.com";

//e-mail a confirmation to Dr. Larry
  	//HTML headers
	$mailheaders = "MIME-Version: 1.0\r\n";
	$mailheaders .= "From: Larry Volz <larry@americanhypnosisclinic.com>\r\n";
	$mailheaders .= "Content-type: text/html; charset=ISO-8859-1/4/n"; 
	
$subject="Another therapist has updated his or her nearby cities list";
$message="The following has been entered into affiliate # $affiliate_id database record:<br><br>city 1 = $city1<br>city 2 = $city2<br>city 3 = $city3<br>";
$recipient="larry@americanhypnosisclinic.com";

mail($recipient,$subject,$message,$mailheaders);

?>