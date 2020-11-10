<?


//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

include_once("../../includes/mysql.inc.php");
include_once("../../includes/cls_sendmail.php"); 



//do basic security check
$ahcDB->securityCheckBasic();

//CONNECT TO DB
$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry
$now=time();
$list_id=39; //code for 'e-mail all affiliates' - PUT IN CORRECT CODE FOR PAGE!

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//###################### Get user id via session check ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name = $_SESSION[f_name];
$user_id = $_SESSION[user];

//------------------------------ END LOG ENTRY --------------------------------------------------

//Get form information
$subject=stripslashes($_POST['subject']);
$message=stripslashes($_POST['message']);

if(($subject=="")||($message=="")){
   	header ("Location: show_e-mail_affiliates.htm");
	exit;
}

//################# SET UP E-MAIL VARIABLES ##############

// look up the PC's e-mail address from her client id
		$desc_table="auth_users";
						
				//get all descriptions
				$query = "SELECT * FROM $desc_table WHERE id='$user_id'";
				$results = mysql_query($query) or die(mysql_error());
			
					//start looping through descriptions one by one
					while ($descriptions = mysql_fetch_array($results)){
						  

						  $user_f_name = $descriptions['f_name'];
						  $user_l_name = $descriptions['l_name'];
						  $user_email = $descriptions['email'];

					}//end while loop

//HTML headers

$headers=array();   
$headers['from'] = "$user_f_name $user_l_name<$user_email>\r\n";
$headers['replyto'] =  "$user_f_name $user_l_name<$user_email>\r\n"; 
$headers['contenttype'] = "text/html";


//Start loop to look up affiliates names and e-mail addresses

		$desc_table="affiliates";
						
				//get all descriptions
				$query = "SELECT f_name,l_name,email FROM $desc_table WHERE LOWER(membership_status)='affiliate'";
				$results = mysql_query($query) or die(mysql_error());
			
					//start looping through descriptions one by one
					$sent =1;
                    while ($descriptions = mysql_fetch_array($results)){
						  

						  $affiliate_f_name = $descriptions['f_name'];
						  $affiliate_l_name = $descriptions['l_name'];
						  $affiliate_email = $descriptions['email'];
						  
										


                             //   echo "<b>$descriptions[email]</b>";
                                $m1= new Mail; // create the mail
                                $m1->From( $headers['from'] );
                                $m1->To( $descriptions['email'] );
                                $m1->ReplyTo ( $headers['replyto']);
                                $m1->Subject( "$subject" );        
                                $m1->Content_type($headers['contenttype']);
                                $m1->Priority(3) ;        // set the priority to Normal
                                $m1->Body($message);  
                                if ( !$m1->Send() ) $sent=0;                                       
                            
                   //         }   
                        //        mail($affiliate_email, $subject, $message, $mailheaders);						  
													  
							//Create output string for verification
							$output .= "$affiliate_f_name $affiliate_l_name at $affiliate_email<br><br>";
					
					
					}//end while loop


/* // for testing only
$affiliate_email="larry@americanhypnosisclinic.com";
mail($affiliate_email, $subject, $message, $mailheaders);
*/


//OUTPUT
echo "Message subject: $subject<br><br>message = $message<br><br>";
echo "Was sent from $user_f_name $user_l_name at $user_email<br><br>";

                     if ($sent) echo "<br /><br /><b>All e-mails sent!</b><br /><br />";
                     else       echo  "<br /><br />Not all e-mails sent!<br /><br />";

echo "<strong>Message was sent to:</strong><br><br>";
echo $output;



?>