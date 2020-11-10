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


//####################################### ZIP CODE LOOKUP STUFF #######################
 /*	$fromZipCode="";
	if ( isset($HTTP_GET_VARS["fromZipCode"]) )$fromZipCode=trim($HTTP_GET_VARS["fromZipCode"]);
	if ( isset($HTTP_POST_VARS["fromZipCode"]) )$fromZipCode=trim($HTTP_POST_VARS["fromZipCode"]);
	$toZipCode="";
	if ( isset($HTTP_GET_VARS["toZipCode"]) )$toZipCode=trim($HTTP_GET_VARS["toZipCode"]);
	if ( isset($HTTP_POST_VARS["toZipCode"]) )$toZipCode=trim($HTTP_POST_VARS["toZipCode"]);
	$toZipCodeMoving=$toZipCode;
	$fromZipCodeMoving=$fromZipCode; */

	include( "DrivingDistanceCalcFunctions.php" ); //all the guts to this thang...

global $fromZipCode; //define the variables that will go in and out of functions as global
global $toZipCode;
// ========================================================================================

// #################### create variable for name of database & table  ##################
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


// ########################## QUERY: MAKE SURE $_POST matches the input variable!!!###############

//create the sql statement
$client_state = $_POST['client_state'];

$sql = "SELECT * FROM $table_name  WHERE address3='$client_state' AND (membership_status != 'Do Not Recommend') ORDER BY postcode";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql) or die(mysql_error());



// check for results
$num= mysql_num_rows($result);

//======================================= END QUERY =======================================

//Check for Results
if ($num <1){
	$display_block = "<p><em>Sorry!  No Results.</em></p>";
    }else{
    	$display_block = "<ul>";//BEGIN OUTPUT BLOCK


//DEFINE CLIENT'S ZIP CODE (from the query) IN The functions' language - static
$fromZipCode=$_POST['client_zip'];


    	while ($row = mysql_fetch_array($result)){

        //GET THE VALUES FROM THE DATABASE INTO SIMPLE VARIABLES
	        $id = $row['id']; //fetching from the database into an array
	        $f_name = $row['f_name'];
	        $l_name = $row['l_name'];
	        $company = $row['company'];
	        $postcode = $row['postcode'];//This is the zipcode... our magic number here...
	        $address1 = $row['address1'];
	        $address2 = $row['address2'];
	        $address3 = $row['address3'];
	        $sec_tel = $row['sec_tel'];
	        $prim = $row['prim_tel'];
	        $mob_tel = $row['mob_tel'];
            $membership_status = $row['membership_status'];
            $ranking = $row['ranking'];

 //#*#**#**#*#*#**#*#*#*#*#* DIVE IN and Get the distance!!! #######*#*#*#*#*#*#*#*
	$toZipCode = $row['postcode'];  //parameter for function

	getDistance($fromZipCode,$toZipCode);   // function call

$distance = number_format($DrivingDistance,0);  //My important result

//$ToCity and $ToState are the variables that give the destination city and state

//==========================================================================================



//########################### MAKE MY AFFILIATES INDEX CARD ######################
 $affiliate = array(
				array("distance"=>$distance,"id"=>$id,
             		"f_name"=> $f_name,"l_name"=>$l_name)
                    );
//================================================================================


 $i++;     //increment counter


// FINISH FORMATTING THE DISPLAY BLOCK...

$display_block .= "<br><strong>".$distance." miles away</strong> - ".$membership_status." in ".$ToCity.", ".$ToState.":<br>";

$display_block .= "<li><a href=\"show_affiliate.php?id=$id\">".$f_name." ".$l_name."</a>, ".$company." at ".$prim_tel." ".$sec_tel." ".$mob_tel." </li>";

//############## FOR TESTING ARRAY ################
// echo "<pre>";
// print_r($affiliate);
// echo "</pre>";
//========================================================

//IMPORTANT!!! ###########
	}//Close while loop  #
//########################

// *********************** OUTPUT!!! ********************

        $display_block .= "</ul>";


}//close If loop for RESULTS VS NO-RESULTS


/* ********************************* COMMENTED OUT ****************************************
*/  //******************************* END OF COMMENT-OUT ******************************




//##################################### WORK HERE!!! ####################################
//#  While this loop is getting values keep using the subroutine to calculate a new     #
//# array called DISTANCES.  Then sort the list by the distance from this zip code      #
//# and output a block with the distance on the left so they can see who is the closest #
//#                                                                                     #
//#######################################################################################

            //Populate options for a select input block
//            $option_block .= "<option value=\"$id\">$l_name, $f_name</option>";

//}close original while loop

        //create display block to hold form -earlier one won't be used unless there's an error
/*
        $display_block ="<FORM METHOD =\"POST\" ACTION = \"show_mc_modcontact.php\">
        <p><strong>Contact:</strong>

        <select name=\"id\"> $option_block </select>

   <INPUT TYPE = \"SUBMIT\" NAME = \"submit\" VALUE = \"Select This Contact\"></p>
        </form>";

} // end if-else block

*/
?>
<HTML>
<HEAD>
<TITLE>American Hypnosis Clinic Office Near THIS CLIENT</TITLE>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
<meta name="Microsoft Border" content="none, default">
</HEAD>
<BODY>
<h1>Nearest AHC Affiliates</h1>

<h3>Near this client in <? echo $FromCity.", ".$FromState." " ?>(zip code <? echo $postcode; ?>) are:</h3>
<?
    	    echo $display_block;
?>
<br>
<a href="affiliates_menu.php">Back to Main Menu</a>
</body>
</html>