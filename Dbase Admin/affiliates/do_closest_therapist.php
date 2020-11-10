<?
//###################### SESSION SECURITY CHECK ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

IF ($auth !="ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/authenticate.htm");
	exit;
}
//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
$list_id=5; //code for 'lookup nearest affiliate'

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

//------------------------------ end security check --------------------------



// Get STORE LOCATOR include files..........................................
require_once("../../store_locator/includes/config.php");
require_once("../../store_locator/includes/global_functions.php");

//set up a counter for ongoing sort
$last_affil_miles = 0;

// retrieve entered zip code 1 from <FORM> and assign $postcode the $_POST['zip'] value
$postcode=$_POST['client_zip'];
$postcode = substr($postcode,0,5);

// Get the first character of the Zipcode
$postcode1 = substr($postcode,0,1);

// Get the first 2 characters of the Zipcode
$postcode2 = substr($postcode,0,2);

// Get the first 3 characters of the Zipcode
$postcode3 = substr($postcode,0,3);

// Get the first 4 characters of the Zipcode if zip is more than 7 characters 
IF(strlen($postcode) == 5)
{
	$postcode4 = substr($postcode,0,5);
}
ELSE
{
	$postcode4 = $postcode3;
}

// Query the database for the latitude and longitude from the most complete Post code it can find
$query = "SELECT lng,lat,name,state FROM `data_usa` WHERE postcode='" . $postcode4 . "' OR postcode='" . $postcode3 . "' OR postcode='" . $postcode2 . "' OR postcode='" . $postcode1 . "' ORDER BY length(postcode) desc LIMIT 1";

// Perform the Query
$query_result = @mysql_query ($query) OR die(mysql_error());

// Fetch Array of postcode information
while ($info = @mysql_fetch_array($query_result))
{

	// Latitude
	$x1 = $info['lng'];
	
	// Longtitude
	$y1 = $info['lat'];
	
	// Place Name
	$place1 = $info['name'];
	
	// State
	$state1 = $info['state'];
	
}

// Echo the starting place
$starting_zip = $_POST['client_zip'];
echo "<h2><font color=\"navy\">Therapists within 200 miles of this client in $place1 $state1 $starting_zip</font></h2>";


//############################### Start affiliate information gathering ###########################################

//Do query for all affiliates
$query2 = "SELECT * FROM affiliates WHERE membership_status = 'Affiliate' ORDER BY postcode";

// Run query for all affiliate info
$query2_result = @mysql_query($query2);// OR die(mysql_error());


//************************ start loop:  foreach record returned by the query **********************************
while ($info2 = @mysql_fetch_array($query2_result)){

	// ########################### Get lat/longitude of zip code 2 ####################################
					// retrieve entered zip code 1 from <FORM> and assign $postcode the $_POST['zip'] value
				$postcode=$info2['postcode'];
				$postcode = substr($postcode,0,5);
				
				// Get the first character of the Zipcode
				$postcode1 = substr($postcode,0,1);
				
				// Get the first 2 characters of the Zipcode
				$postcode2 = substr($postcode,0,2);
				
				// Get the first 3 characters of the Zipcode
				$postcode3 = substr($postcode,0,3);
				
				// Get the first 4 characters of the Zipcode if zip is more than 7 characters 
				IF(strlen($postcode) == 5)
				{
					$postcode4 = substr($postcode,0,5);
				}
				ELSE
				{
					$postcode4 = $postcode3;
				}
				
				// Query the database for the latitude and longitude from the most complete Post code it can find
				$query = "SELECT lng,lat,name,state FROM data_usa WHERE postcode='" . $postcode4 . "' OR postcode='" . $postcode3 . "' OR postcode='" . $postcode2 . "' OR postcode='" . $postcode1 . "' ORDER BY length(postcode) desc LIMIT 1";
				
				// Perform the Query
				$query_result = @mysql_query ($query);// OR die(mysql_error());
				
				// Fetch Array of postcode information
				while ($info = @mysql_fetch_array($query_result))
				{
				
					// Latitude 2
					$x2 = $info['lng'];
					
					// Longtitude 2
					$y2 = $info['lat'];
					
					// Place Name 2
					$place2 = $info['name'];
					
					// State 2
					$state2 = $info['state'];
					
				}//end inner loop to get latitude and longitude for each affiliate
				
				
			$affil_id = $info2['id'];


	//Get distance between zip1 and zip2
		$miles = calculate_distance($x1,$y1,$x2,$y2);		

		
// If distance is less than 200 miles then==============================================================
			if ($miles <= 200){
			  	 
				//add to array this affiliate  
				$affil_array[$affil_id] = $miles;  
			  
			}//end of distance - if statement===========================================================
	
		
}//finish outer loop of each affiliate -----------------------------------------------------------------------	


	// Sort the array
	$a = $affil_array;
	asort($a);

	//create output string from array 
	foreach ($a as $a_id => $distance){
	  
	//get info from client id key
	$query3 = "SELECT * FROM affiliates WHERE id=$a_id";
	
			// Run query for all affiliate info
			$query3_result = @mysql_query($query3);// OR die(mysql_error());
		
		
		//************************ start loop:  foreach record returned by the query **********************************
		while ($info3 = @mysql_fetch_array($query3_result)){
		  			$affil_id = $info3['id'];
					$affil_f_name = $info3['f_name'];
					$affil_l_name = $info3['l_name'];
					$affil_company = $info3['company'];		
					$affil_city = $info3['address2'];
					$affil_state = $info3['address3'];
					$affil_zip = $info3['postcode'];
					$ranking = $info3['ranking'];
		  
	
	  //do output
 	 $output.= "<tr><td>$distance</td><td>$ranking</td><td><a href=\"show_affiliate.php?id=$a_id\">$affil_f_name</a></td><td><a href=\"show_affiliate.php?id=$affil_id\">$affil_l_name</a></td><td>$affil_city</td><td>$affil_state</td><td>$affil_zip</td></tr>";
  
  		}//end of while statement to get info from $a_id
  		
	}//end of foreach statement that creates output


//put beginning and ending on table output
$placeholder = $output;
$output = "<table border=\"1\" width=\"100%\"><tr><td><strong>Distance</strong></td><td><strong>Ranking</strong></td><td><strong>First Name</strong></td><td><strong>Last Name</strong></td><td><strong>City</strong></td><td><strong>State</strong></td><td><strong>Zip</strong></td></tr>".$placeholder."</table>";

echo $output;


?>