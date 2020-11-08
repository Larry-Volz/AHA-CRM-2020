<?
$error_yesno=0;
$error_msg = "<font color=\"red\">All required fields must be filled in.  <br>Missing fields: ";

//Get variables and make sure all fields are there
$address = $_POST['address'];
	if (!$_POST['address']){
	  if ($error_yesno>0){
	    $error_msg .=",";
		}
	  $error_msg .= "address ";
	  $error_yesno++;
	}
	
$alt_phone = $_POST['alt_phone']; 

$best_time_to_call = $_POST['best_time_to_call'];
	if (!$_POST['best_time_to_call']){
	  	  if ($error_yesno>0){
		    $error_msg .=",";
			}
	  $error_msg .= "best_time_to_call ";
	  $error_yesno+=1;
	}
	
$city = $_POST['city'];
	if (!$_POST['city']){
	  	  if ($error_yesno>0){
		    $error_msg .=",";
			}	  
	  $error_msg .= "city ";
	  $error_yesno=1;
	}
	
$day_phone = $_POST['day_phone'];
	if (!$_POST['day_phone']){
	  	  if ($error_yesno>0){
		    $error_msg .=",";
			}	  
	  $error_msg .= "day_phone ";
	  $error_yesno++;
	}
	
$email = $_POST['email'];
	if (!$_POST['email']){
	  	  if ($error_yesno>0){
		    $error_msg .=",";
			}	  
	  $error_msg .= "email ";
	  $error_yesno++;
	}
	
$f_name = $_POST['f_name'];
	if (!$_POST['f_name']){
	  	  if ($error_yesno>0){
		    $error_msg .=",";
			}	  
	  $error_msg .= "f_name ";
	  $error_yesno++;
	}
	
$l_name = $_POST['l_name'];
	if (!$_POST['l_name']){
	  	  if ($error_yesno>0){
		    $error_msg .=",";
			}	  
	  $error_msg .= "l_name ";
	  $error_yesno++;
	}
	
$motivation = $_POST['motivation'];

$primary_goal = $_POST['primary_goal'];
	if (!$_POST['primary_goal']){
	  	  if ($error_yesno>0){
		    $error_msg .=",";
			}	  
	  $error_msg .= "primary_goal ";
	  $error_yesno++;
	}
	
$problem_details = $_POST['problem_details'];

$referred_by = $_POST['referred_by'];

$secondary_goal = $_POST['secondary_goal'];

$state = $_POST['state'];
	if (!$_POST['state']){
	  	  if ($error_yesno>0){
		    $error_msg .=",";
			}	  
	  $error_msg .= "state ";
	  $error_yesno++;
	}
	
$travel_distance = $_POST['travel_distance'];
$travel_units = $_POST['travel_units'];
$why_us = $_POST['why_us'];

$zip = $_POST['zip'];
	if (!$_POST['zip']){
	  	  if ($error_yesno>0){
		    $error_msg .=",";
			}	  
	  $error_msg .= "zip code ";
	  $error_yesno++;
	}

$error_msg .="Click the BACK button on your browser to avoid losing the information you have already typed and then fill in the missing fields.</font>";

//If anything was missing - send 'em on back!
if ($error_yesno > 0){
     	header ("Location: http://www.americanhypnosisclinic.com/E-mailInquiryForm.php?error_msg=$error_msg");
		exit; 
}


//note the time and date
$now=time();

//insert all variables along with time and date into database table for new leads

//################################## CONNECT ###########################################

//Get my class and methods
include_once("ahcDatabase_class.php");

//connect to db
$ahcDB->dbConnect();

// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "new_leads";

//open the SQL connection to AHC server databases
$connection = mysql_connect("localhost", "america2_AHC", "magiclar") or die (mysql_error());

// create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());

//create the sql statement
//$sql = "SELECT * FROM $table_name";

$sql ="INSERT INTO $table_name (id, address, alt_phone, best_time_to_call,city,day_phone,email,f_name,l_name,motivation,primary_goal,problem_details,referred_by,secondary_goal,state,travel_distance,travel_units,why_us,zip,time_stamp) VALUES('','$address','$alt_phone','$best_time_to_call','$city','$day_phone','$email','$f_name','$l_name','$motivation','$primary_goal','$problem_details','$referred_by','$secondary_goal','$state','$travel_distance','$travel_units','$why_us','$zip','$now')"; 

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());


//###########################################################################################

//e-mail copy of all variable information to ahcsales@hotmail.com, meredith and me
 	//HTML headers
 	$user_email="webinquiry@americanhypnosisclinic.com";
 	
	$mailheaders = "MIME-Version: 1.0\r\n";
	$mailheaders .= "From: AHC Web Inquiry Form <$user_email>\r\n";
	$mailheaders .= "Content-type: text/html; charset=ISO-8859-1/4/n";  	

  $recipient = "webinquiry@americanhypnosisclinic.com";//To Client
  
  $cc_to_meredith="receptionist@americanhypnosisclinic.com";
  $cc_to_hotmail="ahcsales@hotmail.com";

	$replyToAddress = "$user_email";
	$subject = "Response: I would like to learn more";	
	
    $EST = $now+10800;	
    
	$msg ="
	
<h2>New Lead</h2>
<p>Filled out his web inquiry on ".date('M j\, Y',$EST)." at ".date('h\:i',$EST)."</p>

Name: $f_name $l_name <br>
Daytime Phone: $day_phone <br>
Best time to call: $best_time_to_call <br>
Alternate phone: $alt_phone <br>
e-mail: $email <br><br>

Address:<br>
$address<br>
$city, $state $zip<br><br>

Primary goal:  $primary_goal <br>
Secondary goal: $secondary_goal <br>
Problem details:  $problem_details <br>
Motivation:  $motivation <br><br>

Will travel: $travel_distance $travel_units<br><br>

Referred_by: $referred_by <br><br>

Why us? $why_us <br>	
	";
	
	mail($recipient, $subject, $msg, $mailheaders);
	mail($cc_to_meredith, $subject, $msg, $mailheaders);
	mail($cc_to_hotmail, $subject, $msg, $mailheaders);


// Go to a pretty confirmation page
   	header ("Location: http://www.americanhypnosisclinic.com/thankyou.html");
	exit;

?>

<html>
<head>
<title></title>



</head>
<body>




</body>
</html>