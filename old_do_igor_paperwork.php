<?

//###################### Get user id via session check ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name = $_SESSION[f_name];
$user_id = $_SESSION[user];


/* ################################### FIX #####################################################

- stop the confirmations e-mails coming to me?
*/



//look up the affiliate and get the appropriate variables for directions to their clinic and contact numbers etc.
$affiliate_id=$_POST['affiliate_id'];

//import client info from form
$program_index=$_POST['program_index'];
$email=$_POST['email'];

$appointment_time=$_POST['appointment_time'];
$total_program_cost=$_POST['price_display'];
$number_of_payments=$_POST['num_payments_display'];
$equal_payments_of=$_POST['payment_display'];
$print_or_email=$_POST['print_or_email'];
$total_display = $_POST['total_display'];
$finance_rate_display = $_POST['finance_rate_display'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];

//Appointment date calculations...
$apt_month = $_POST['months'];
$apt_day = $_POST['days'];
$apt_year = $_POST['year'];

$appointment_date = "$apt_month/$apt_day/$apt_year";



//need to have a program/dollar amount and name chosen or return with message
IF (($total_program_cost=="0")||(trim($l_name)=="")||(trim($apt_day)=="")||(trim($appointment_time)=="")||($affiliate_id=="0")){
   	header ("Location: http://www.americanhypnosisclinic.com/intranet/more_info_required.htm");
	exit;
}

// If e-mailing and there is no e-mail address...
IF (($print_or_email=="e-mail")&&(trim($email)=="")){
   	header ("Location: http://www.americanhypnosisclinic.com/intranet/more_info_required.htm");
	exit;
}

// log in and create an activity log for this action
//Get my class and methods
include_once("ahcDatabase_class.php");//drop the ../ if in root directory



//do basic security check
$ahcDB->securityCheckBasic();


//CONNECT to DB
$ahcDB->dbConnect();

//############################## DO LOG ENTRY ##############################################

//do log entry
$now=time();
$list_id=38; //code for 'SALE! - sending paperwork' - PUT IN CORRECT CODE FOR PAGE!

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------

//################# SET UP E-MAIL VARIABLES ##############

// look up the PC's e-mail address from her client id
		$desc_table="auth_users";
						
				//get all descriptions
				$query = "SELECT * FROM $desc_table WHERE id='$user_id'";
				$results = mysql_query($query);// or die(mysql_error())
			
					//start looping through descriptions one by one
					while ($descriptions = mysql_fetch_array($results)){
						  

						  $user_f_name = $descriptions['f_name'];
						  $user_l_name = $descriptions['l_name'];
						  $user_email = $descriptions['email'];


					}//end while loop

?>
<html>
<head>
<title>American Hypnosis Clinic</title>

<link rel="StyleSheet" href="client_paperwork/css_for_client_paperwork.css" type="text/css">

<?

//include standard includes
include "includes/classes_all_clients.php";





			//connect to database 
			$acIncludes->dbConnect();
				
				$desc_table="affiliates";
						
				//get all descriptions
				$query1 = "SELECT * FROM $desc_table WHERE id='$affiliate_id'";
				$results1 = mysql_query($query1);// or die(mysql_error())
			
					//start looping through descriptions one by one
					while ($descriptions = mysql_fetch_array($results1)){
						  

						  $affil_f_name = $descriptions['f_name'];
						  $affil_l_name = $descriptions['l_name'];
						  $address = $descriptions['address1'];
						  $city = $descriptions['address2'];
						  $state = $descriptions['address3'];
						  $zip = $descriptions['postcode'];
						  $phone = $descriptions['prim_tel'];
						  $fax = $descriptions['fax'];
						  $affil_email = $descriptions['affil_email'];
						  $directions_to_clinic = $descriptions['directions_to_clinic'];
						  $affil_prim_tel = $descriptions['prim_tel'];
						  $affil_email = $descriptions['email'];


					}//end while loop
					
//define program description variables (get from Igor_variables if needed to update)					
		$program_title[0]= "No Program Selected";
		$program_title[1] = "Alcohol Self Control";
		$program_title[2] = "Anger Management";
		$program_title[3] = "Childbirth with Less Pain";
		$program_title[4] = "Class - CHt ";
		$program_title[5] = "Class - CHt/MHt ";
		$program_title[6] = "Class - MHt ";
		$program_title[7] = "Drug Self Control ";
		$program_title[8] = "Emotional Self-Improvement";
		$program_title[9] = "Fibromyalgia";
		$program_title[10] = "Single-Session Fibromyalgia";
		$program_title[11] = "Gambling Self-Control"	;	
		$program_title[12] = "Single-Session High Blood Pressure Reduction";
		$program_title[13] = "High Blood Pressure Reduction";
		$program_title[14] = "Single-Session I.B.S. Improvement";
		$program_title[15] = "I.B.S. Improvement";
		$program_title[16] = "Learning Improvement [ADD/ADHD]";
		$program_title[17] = "Memory Improvement";
		$program_title[18] = "Morning Sickness Reduction";
		$program_title[19] = "Motivation Improvement";
		$program_title[20] = "Improved Self-Control Over Impulses";
		$program_title[21] = "Pain Management";
		$program_title[22] = "Phobia Elimination";
		$program_title[23] = "Exploratory Regression";
		$program_title[24] = "Self-Esteem Improvement";
		$program_title[25] = "Sexual Issue Improvement";
		$program_title[26] = "Sleep Improvement";
		$program_title[27] = "Smoking Cessation";
		$program_title[28] = "Stress/Anxiety Reduction";		
		$program_title[29] = "Unusual Per-HOUR Issues [need approval]";
		$program_title[30] = "Unusual Per-SESSION Issues [need approval]";
		$program_title[31] = "Weight Management";
		$program_title[32] = "Mini-Weight Management";		
		$program_title[33] = "Multi-Goal Wellness";
						  
//include individual client letters
	include "client_paperwork/intro_letter.php";
	include "client_paperwork/smoking_paperwork.php";
	include "client_paperwork/wt_loss_paperwork.php";
	include "client_paperwork/general_program_paperwork.php";
	include "client_paperwork/promissary_note.php";	
	include "client_paperwork/light_sound_waiver.php";
	include "client_paperwork/MD_release.php";
	include "client_paperwork/MD_waiver.php";
	include "client_paperwork/client_contract.php";	
	
	include "client_paperwork/expect_of_hypnosis.php";			
	include "client_paperwork/directions_to_richmond.php";	
	include "client_paperwork/directions_to_clinic.php";
	include "client_paperwork/peer_referral.php";

?>

</head>
<body>

<? 
//build the complete text from individual letters
$complete_text = "$intro_letter"; 


####################### TEMPORARILY MAKE ALL PAPERWORK GENERAL UNTIL WL AND SMOKING IS FIXED ####################

//add paperwork if smoker
if($program_index=="27"){
  $complete_text .= "$smoking_letter";
}


//add paperwork if WL
if($program_index=="31"){
  $complete_text .= "$wt_loss_letter";
}


//otherwise...
if(($program_index != "31")AND($program_index !="27")){
  $complete_text .= "$general_program_letter";
}



// ########################## DELETE THIS LINE ONCE WL AND SMOKING ARE FIXED!!!##################
//$complete_text .= "$general_program_letter";

//?????????????????????????????????????????????? EXPERIMENT ????????????????????????????????????????
//$peer_referral_output = "EXPERIMENTAL TEXT";

//include universal letters
$complete_text .="$promissary_note";
$complete_text .="$light_sound_waiver";
$complete_text .="$MD_release";
$complete_text .="$MD_waiver";
$complete_text .="$client_contract";
$complete_text .="$peer_referral_output";
$complete_text .="$directions_to_clinic_output";
$complete_text .="$expect_of_hypnosis";



  
  	//HTML headers
	$mailheaders = "MIME-Version: 1.0\r\n";
	$mailheaders .= "From: $user_f_name at American Hypnosis Clinic <$user_email>\r\n";
	$mailheaders .= "Content-type: text/html; charset=ISO-8859-1/4/n";  	
	
	$affiliate_mailheaders = "MIME-Version: 1.0\r\n";
	$affiliate_mailheaders .= "From: $user_f_name $user_l_name <$user_email>\r\n";
	$affiliate_mailheaders .= "Content-type: text/html; charset=ISO-8859-1/4/n";	
  
  
  $recipient = $email;//To Client
  
  $cc_to_meredith="receptionist@americanhypnosisclinic.com";
  $cc_to_larry="larry@americanhypnosisclinic.com";
  
	$replyToAddress = "$user_email";
	$subject = "Confirmation & paperwork for your appointment with $affil_f_name $affil_l_name";
	
	$cc_subject = "Sale confirmation: $f_name $l_name, $program_title[$program_index] \$$total_program_cost with $affil_f_name $affil_l_name in $state";
	$therapist_subject = "Appointment scheduled with you for $appointment_date at $appointment_time";
	
	//combine them for one long html message:
$msg = $complete_text;
$cc_msg = "The following was sent to $f_name $l_name<br><br>$complete_text";
$therapist_message ="You have been scheduled an appointment with $f_name $l_name on $appointment_date at $appointment_time for the goal of $program_title[$program_index].<br><br>If this appointment date or time does not work with your schedule please call us as soon as possible at 804-594-2600 so that we can reschedule with your client.<br><br>The client should have his or her paperwork but if not, a copy of it follows below.<br><br>Thanks for working with us and we are proud to have you as part of the team.<br><br>Sincerely,<br><br>Larry Volz, PhD<br>President, American Hypnosis Clinic.<br><br>$complete_text";



//if it's to be printed then echo it to the screen & e-mail therapist, Meredith and I
if ($print_or_email == "print")
{
	echo $complete_text;
	
	mail($cc_to_meredith, $cc_subject, $cc_msg, $mailheaders);
	mail($cc_to_larry, $cc_subject, $cc_msg, $mailheaders);
	mail($affil_email, $therapist_subject, $therapist_message, $affiliate_mailheaders);
	
	//if affiliate has no e-mail address
	if ($affil_email="")
			{
				$no_email_subject="****PLEASE CALL $affil_f_name $affil_l_name";
				$no_email_message="$affil_f_name $affil_l_name does not have an e-mail listed in the database and so please call this therapist and inform about the appointment just made for $f_name $l_name on $appointment_date at $appointment_time";
				mail($cc_to_meredith, $no_email_subject, $no_email_message, $mailheaders);	  
			}
}

//if it's to be e-mailed then put it together and send it
if ($print_or_email == "e-mail"){


//send the mail
mail($recipient, $subject, $msg, $mailheaders);
mail($cc_to_meredith, $cc_subject, $cc_msg, $mailheaders);
mail($cc_to_larry, $cc_subject, $cc_msg, $mailheaders);
mail($affil_email, $therapist_subject, $therapist_message, $mailheaders);

	//if affiliate has no e-mail address
	if ($affil_email="")
			{
				$no_email_subject="****PLEASE CALL $affil_f_name $affil_l_name";
				$no_email_message="$affil_f_name $affil_l_name does not have an e-mail listed in the database and so please call this therapist and inform about the appointment just made for $f_name $l_name on $appointment_date at $appointment_time";
				mail($cc_to_meredith, $no_email_subject, $no_email_message, $mailheaders);	  
			}

include("paperwork_sent.htm");

}

//####################### In any case, send a paperwork confirmation to PC ###########################



//send confirmation e-mail to PC that sold it
$user_subject = "CONGRATS ON THE SALE $user_f_name!  Here is backup paperwork for $f_name $l_name";

mail($user_email, $user_subject, $msg, $mailheaders);

?>

</body>
</html>