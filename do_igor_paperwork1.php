<?

//###################### Get user id via session check ########################

//###################### Get user id via session check ########################
session_start();


include("includes/functions.inc.php");


$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name = $_SESSION[f_name];
$user_id = $_SESSION[user];
//-----------------------------------------------------------------------------

/* //for testing purposes
foreach ($_POST as $key => $value)

 echo "$key => $value <br>";
*/

//look up the affiliate and get the appropriate variables for directions to their clinic and contact numbers etc.
$affiliate_id=$_POST['affiliate_id'];

//import client info from form
$program_index=$_POST['program_index'];
$email=$_POST['email'];


$total_program_cost=$_POST['price_display'];
$number_of_payments=$_POST['num_payments_display'];
$equal_payments_of=$_POST['payment_display'];
$print_or_email=$_POST['print_or_email'];
$total_display = $_POST['total_display'];
$finance_rate_display = $_POST['finance_rate_display'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$amount_to_charge = $_POST['deposit'];

//Appointment date calculations...
$apt_month = $_POST['months'];
$apt_day = $_POST['days'];
$apt_year = $_POST['year'];

$appt_hour = $_POST['appt_hour'];
$military_appt_hour = $appt_hour;
$appt_minutes= $_POST['appt_minutes'];
$am_pm = $_POST['am_pm'];

if ($am_pm=="PM"){
  $military_appt_hour += 12;
}
$readable_minutes=$appt_minutes;
if ($readable_minutes==0){
  $readable_minutes="00";
}
$appointment_time = "$appt_hour:$readable_minutes $am_pm";
$appointment_date = "$apt_month/$apt_day/$apt_year";
$apt_date=mktime($military_appt_hour,$appt_minutes,0,$apt_month,$apt_day,$apt_year);

//NEW VARIABLES FOR CREDIT CARD INFORMATION
$client_id=$_POST['client_id'];
$pc_id=$_POST['pc_id'];


$cc_type=$_POST['cc_type'];
$cc_number=$_POST['cc_number'];
$cc_expiration_month=$_POST['cc_expiration_month'];
$cc_expiration_year=$_POST['cc_expiration_year'];

        $cc_expiration_date=mktime(0,0,0,$cc_expiration_month,1,$cc_expiration_year);

$override_cc_exp = $_POST['override_cc_exp'];

$ck_routing_number=$_POST['ck_routing_number'];
$ck_account_number=$_POST['ck_account_number'];
$ck_number=$_POST['ck_number'];

//set financial variables
$xaction_status="pending";//later options are - charged, failed, deleted
$charge_date=time();

$date_sold_month = $_POST['date_sold_month'];
$date_sold_day = $_POST['date_sold_day'];
$date_sold_year = $_POST['date_sold_year'];
$date_sold_hour = $_POST['date_sold_hour'];
$date_sold_minute = $_POST['date_sold_minute'];

$date_sold = mktime($date_sold_hour,$date_sold_minute,0,$date_sold_month,$date_sold_day,$date_sold_year);


//wait on charge date calculations
$wait_month = $_POST['wait_month'];
$wait_day = $_POST['wait_day'];
$wait_year = $_POST['wait_year'];

$financial_notes = $_POST['financial_notes'];

$paperwork_only = $_POST['paperwork_only'];

IF ($wait_day !=""){

        $charge_date = mktime(0,0,0,$wait_month,$wait_day,$wait_year);

}//end create a delayed charge date if checked


//need to have a program/dollar amount and name chosen or return with message


IF (($total_program_cost=="0")||(trim($l_name)=="")||(trim($apt_day)=="")||($affiliate_id=="0")||(trim($appointment_time)=="")){
           header ("Location: http://www.americanhypnosisclinic.com/intranet/more_info_required.htm");
        exit;
}


IF (!is_email($email)){
           header ("Location: http://www.americanhypnosisclinic.com/intranet/not_valid_email.htm");
        exit;
}



//#################################CREDIT CARD INFORMATION TESTER##################################################

//if neither cc information nor check information is filled out
// if (any of these things are blank)AND(any of these things are blank)then -> redirect
// if(true= not all filled out)and (true=not all filled out)-> redirects
//if (false=all filled out)and(true=not all filled out)-> does not redirect


IF (((trim($cc_type)=="") OR (trim($cc_number=="")) OR (trim(cc_expiration_month)=="") OR (trim(cc_expiration_year)=="")) AND ((trim($ck_routing_number)=="") OR (trim($ck_account_number=="")) OR (trim($ck_number)==""))){
           header ("Location: http://www.americanhypnosisclinic.com/intranet/more_info_required.htm");
        exit;
}

//########################### Test to make credit card date extends past last payment ########################

IF ((trim($cc_number != "")) AND ($override_cc_exp !="checked")){

        //look at first appointment date and add as many months to it as we have payments to determine last payment

        $last_pmt_month = ($apt_month + $number_of_payments - 1);
        $last_pmt_year = $apt_year;

                if ($last_pmt_month > 12){
                  $last_pmt_month -= 12;
                  $last_pmt_year += 1;
                }//end last payment month december/january check

                //cc expires last day of the month...
                $last_payment_day=30;
                        if ($last_pmt_month==2){//unless february...
                          $last_payment_day=28;
                        }

        $last_pmt_date = mktime(11,59,00,$last_pmt_month,$last_payment_day,$last_pmt_year);

        //compare cc expiration to last payment date.  If cc_exp < last payment then header to no way dude page
        If ($cc_expiration_date < $last_pmt_date){

                header ("Location: http://www.americanhypnosisclinic.com/intranet/cc_expires_too_soon.php");
                exit;

        }//end credit card expiration date comparison

}//end ONLY IF CREDIT CARD

echo
"<DIV ID=\"slowScreenSplash\" STYLE=\"position:absolute;z-index:5;top:40%;left:15%;\"
align=\"center\">
<font style='font-family: Verdana;'><b> Please wait while required paperwork is generated <img src='images/mozilla_blu.gif' border='0' width='16' height='16' hspace='0' vspace='0' align='absmiddle'></b></font>
<br><br>Larry: paperwork_only variable = $paperwork_only
</DIV>";



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


//############################## LOG THE CREDIT CARD CHARGE IN THE FINANCIAL DATABASE TABLE ######################


foreach ($_POST as $key=>$value)
echo "$key => $value<br>";



if ($paperwork_only != "checked"){


$table_name="financial";

$sql = "INSERT INTO $table_name
(client_id, cc_type, cc_number, cc_expiration_date, ck_routing_number, ck_account_number, ck_number, xaction_status, date, amount, program_id, program_cost, number_of_payments, equal_payments_of, notes, pc_id, date_sold, client_f_name, client_l_name, apt_date, therapist_id) VALUES ('$client_id', '$cc_type', '$cc_number', '$cc_expiration_date', '$ck_routing_number', '$ck_account_number', '$ck_number', '$xaction_status', '$charge_date', '$amount_to_charge', '$program_index', '$total_display', '$number_of_payments', '$equal_payments_of', '$financial_notes', '$pc_id', '$date_sold', '$f_name', '$l_name','$apt_date','$affiliate_id')";

echo $sql;

 $results = mysql_query($sql) or die(mysql_error());

 exit;      

}// end of updating task database script


/*

???????????????????????/// DO TYPE OF PROGRAM_index, total_program_cost, NUMBER OF PYAMENTS ETC
                                                                                                                IN FINANCIAL LOG!!!                 ?????????????????????
$number_of_payments=$_POST['num_payments_display'];
$equal_payments_of=$_POST['payment_display'];

*/



//-----------------------------------------END FINANCIAL TABLE INSERTION ----------------------------------------




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
                $program_title[11] = "Gambling Self-Control"        ;
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
//        include "client_paperwork/light_sound_waiver.php";
//        include "client_paperwork/MD_release.php";
//        include "client_paperwork/MD_waiver.php";
        include "client_paperwork/client_contract.php";

//        include "client_paperwork/expect_of_hypnosis.php";
        include "client_paperwork/directions_to_richmond.php";
        include "client_paperwork/directions_to_clinic.php";
        include "client_paperwork/peer_referral.php";

?>

</head>
<body>

<?
  //build the complete text from individual letters

//***************** start modified by Sergiu****************************

  $sql="SELECT max(id) max_id from email_receipt";
  $results = mysql_query($sql);
  $row = mysql_fetch_array($results);
  $max=$row['max_id'];
  $code = $max.RandomCode();
  $email_receipt_url="http://www.americanhypnosisclinic.com/intranet/confirm_mail.php?code=$code";

//**************end Sergiu********************************************************

  include("includes/cls_sendmail.php");
  include("includes/cls_html_to_pdf.php");


//changed Ooiginal because I'm trying to put the confirmation link in that script

$client_mail_body = "$intro_letter"."By clicking below I acknowledge that I have read and agree to the terms and conditions in The Lifetime Commitment Guarantee and Client Contract.
  <a href=\"$email_receipt_url\"><p align=\"center\"><input type=\"button\" value=\"Confirm Appointment\" name=\"I_agree\"></a>
  <br><br>If clicking the link does not take you to a confirmation page please copy the following link to your favorite browser: $email_receipt_url</p> ".$intro_letter_end;



  $complete_text = "$intro_letter"."$email_receipt_url";
  $i=0;
  $attach_files=array();
  define("IMAGE_DIR","/home/america2/public_html/intranet/images/");
  define("IMAGE_DIR_URL","http://www.americanhypnosisclinic.com/intranet/images/");
  $htmltopdf = new HTML_TO_PDF();
  $htmltopdf->useURL(HKC_USE_EASYW);
  $sent=1;



####################### TEMPORARILY MAKE ALL PAPERWORK GENERAL UNTIL WL AND SMOKING IS FIXED ####################


//add paperwork if smoker
if($program_index=="27"){
$complete_text .= "$smoking_letter";

  //create html file to be converted into pdf

  $htmfilename = GenerateFilename ( "smoking_letter" , "html" ) ;
  CreateHtmlFile(IMAGE_DIR.$htmfilename ,"$smoking_letter");
  //create pdf file to be attached
  $attach_files[$i]=GenerateFilename("smoking_letter","pdf");
  $htmltopdf->saveFile(IMAGE_DIR.$attach_files[$i++]);
  $result1 = $htmltopdf->convertURL(IMAGE_DIR_URL.$htmfilename);
  if($result1==false) echo $htmltopdf->error();
  @unlink(IMAGE_DIR.$htmfilename);
}


//add paperwork if WL
if($program_index=="31"){

$complete_text .= "$wt_loss_letter";

  $htmfilename = GenerateFilename ( "wt_loss_letter" , "html" ) ;
  CreateHtmlFile(IMAGE_DIR.$htmfilename ,"$wt_loss_letter");
  //create pdf file to be attached
  $attach_files[$i]=GenerateFilename("wt_loss_letter","pdf");
  $htmltopdf->saveFile(IMAGE_DIR.$attach_files[$i++]);
  $result1 = $htmltopdf->convertURL(IMAGE_DIR_URL.$htmfilename);
  if($result1==false) echo $htmltopdf->error();
  @unlink(IMAGE_DIR.$htmfilename);


}


//otherwise...
if(($program_index != "31")AND($program_index !="27")){

$complete_text .= "$general_program_letter";

  $htmfilename = GenerateFilename ( "general_program_letter" , "html" ) ;
  CreateHtmlFile(IMAGE_DIR.$htmfilename ,"$general_program_letter");
  //create pdf file to be attached
  $attach_files[$i]=GenerateFilename("general_program_letter","pdf");
  $htmltopdf->saveFile(IMAGE_DIR.$attach_files[$i++]);
  $result1 = $htmltopdf->convertURL(IMAGE_DIR_URL.$htmfilename);
  if($result1==false) echo $htmltopdf->error();
  @unlink(IMAGE_DIR.$htmfilename);

}


// ########################## DELETE THIS LINE ONCE WL AND SMOKING ARE FIXED!!!##################
//$complete_text .= "$general_program_letter";

//?????????????????????????????????????????????? EXPERIMENT ????????????????????????????????????????
//$peer_referral_output = "EXPERIMENTAL TEXT";

//include universal letters


/*
$complete_text .="$promissary_note";

  $htmfilename = GenerateFilename ( "promissary_note" , "html" ) ;
  CreateHtmlFile(IMAGE_DIR.$htmfilename ,"$print"."$promissary_note");
  //create pdf file to be attached
  $attach_files[$i]=GenerateFilename("promissary_note","pdf");
  $htmltopdf->saveFile(IMAGE_DIR.$attach_files[$i++]);
  $result1 = $htmltopdf->convertURL(IMAGE_DIR_URL.$htmfilename);
  if($result1==false) echo $htmltopdf->error();

  $html_files[$j++]=$htmfilename;
  //@unlink(IMAGE_DIR.$htmfilename);

*/

//$complete_text .="$light_sound_waiver";
//$complete_text .="$MD_release";
//$complete_text .="$MD_waiver";

$complete_text .="$client_contract";
  $htmfilename = GenerateFilename ( "contract" , "html" ) ;
  CreateHtmlFile(IMAGE_DIR.$htmfilename ,"$print"."$client_contract");
  //create pdf file to be attached
  $attach_files[$i]=GenerateFilename("contract","pdf");
  $htmltopdf->saveFile(IMAGE_DIR.$attach_files[$i++]);
  $result1 = $htmltopdf->convertURL(IMAGE_DIR_URL.$htmfilename);
  if($result1==false) echo $htmltopdf->error();
  @unlink(IMAGE_DIR.$htmfilename);


$complete_text .="$peer_referral_output";
  $htmfilename = GenerateFilename ( "referral" , "html" ) ;
  CreateHtmlFile(IMAGE_DIR.$htmfilename ,"$peer_referral_output");
  //create pdf file to be attached
  $attach_files[$i]=GenerateFilename("referral","pdf");
  $htmltopdf->saveFile(IMAGE_DIR.$attach_files[$i++]);
  $result1 = $htmltopdf->convertURL(IMAGE_DIR_URL.$htmfilename);
  if($result1==false) echo $htmltopdf->error();
  @unlink(IMAGE_DIR.$htmfilename);


$complete_text .="$directions_to_clinic_output";
  $htmfilename = GenerateFilename ( "directions_to_clinic" , "html" ) ;
  CreateHtmlFile(IMAGE_DIR.$htmfilename ,"$directions_to_clinic_output");
  //create pdf file to be attached
  $attach_files[$i]=GenerateFilename("directions_to_clinic","pdf");
  $htmltopdf->saveFile(IMAGE_DIR.$attach_files[$i++]);
  $result1 = $htmltopdf->convertURL(IMAGE_DIR_URL.$htmfilename);
  if($result1==false) echo $htmltopdf->error();
  @unlink(IMAGE_DIR.$htmfilename);




//$complete_text .="$expect_of_hypnosis";

        //***************** start modified by Sergiu****************************
        $headers=array();
        $headers['from']="$user_f_name at American Hypnosis Clinic<$user_email>";
        $headers['replyto'] = "$user_f_name at American Hypnosis Clinic<$user_email>";
        $headers['contenttype']="text/html";

        $headers_affiliate=array();
        $headers_affiliate['from']="$user_f_name $user_l_name <$user_email>";
        $headers_affiliate['replyto'] = "$user_f_name $user_l_name <$user_email>";
        $headers_affiliate['contenttype']="text/html";


        //***************** end modified by Sergiu****************************


          //HTML headers
        //$mailheaders = "MIME-Version: 1.0\r\n";
        //$mailheaders .= "From: $user_f_name at American Hypnosis Clinic <$user_email>\r\n";
        //$mailheaders .= "Content-type: text/html; charset=ISO-8859-1/4/n";

        //$affiliate_mailheaders = "MIME-Version: 1.0\r\n";
        //$affiliate_mailheaders .= "From: $user_f_name $user_l_name <$user_email>\r\n";
        //$affiliate_mailheaders .= "Content-type: text/html; charset=ISO-8859-1/4/n";


        $recipient = $email;//To Client

        $cc_to_meredith="receptionist@americanhypnosisclinic.com";
        $cc_to_larry="larry@americanhypnosisclinic.com";
        $cc_to_sergiu="sergiu.varga@gmail.com";


        $replyToAddress = "$user_email";
        $subject = "Your doctor appointment on $appointment_date at $appointment_time";

        $cc_subject = "Sale confirmation: $f_name $l_name, $program_title[$program_index] \$$total_program_cost with $affil_f_name $affil_l_name in $state";
        $therapist_subject = "Appointment scheduled with you for $appointment_date at $appointment_time";

        //combine them for one long html message:
$msg = $complete_text;
$cc_msg = "The following was sent to $f_name $l_name<br><br>$client_mail_body";
$therapist_message ="You have been scheduled an appointment with $f_name $l_name on $appointment_date at $appointment_time for the goal of $program_title[$program_index].<br><br>If this appointment date or time does not work with your schedule please call us as soon as possible at 804-594-2600 so that we can reschedule with your client.<br><br>The client should have his or her paperwork but if not, a copy of it follows below.<br><br>Thanks for working with us and we are proud to have you as part of the team.<br><br>Sincerely,<br><br>Larry Volz, PhD<br>President, American Hypnosis Clinic.<br><br>";

//echo "Emails to send: ".$cc_to_meredith." ".$affil_email." ".$recipient ;

        //***************** start modified by Sergiu****************************

//send email to both larry , meredith and therapist ,
//the difference between  email and print  button is only the client email

        // $cc_to_meredith  and $cc_to_larry
        $m1= new Mail; // create the mail
        $m1->From( $headers['from'] );
        //$m1->To( "$cc_to_meredith" );
        $m1->To($cc_to_sergiu );
        $m1->ReplyTo ( $headers['replyto']);
        $m1->Subject( "$cc_subject" );
        $m1->Content_type($headers['contenttype']);
        $m1->Cc( "$cc_to_larry" );
//        $m1->Bcc( "$cc_to_sergiu" );
        $m1->Priority(3) ;        // set the priority to Normal
        $m1->ReadReceipt("svarga15@yahoo.com");
        $m1->Body("$cc_msg");
     //   foreach ($attach_files AS $key=>$value) $m1->Attach( IMAGE_DIR.$value , "application/pdf" ) ;
        if ( !$m1->Send() ) $sent=0;



        IF (is_email($affil_email))
        {
        // mail to  therapist
        $m1= new Mail; // create the mail
        $m1->From( $headers_affiliate['from'] );
        //$m1->To( "$affil_email" );
        $m1->To( "$cc_to_sergiu" );

 //       $m1->Bcc( "$cc_to_sergiu" );
  //      $m1->Bcc( "$cc_to_larry" );
        $m1->ReplyTo ( $headers_affiliate['replyto']);
        $m1->Subject( "$therapist_subject" );
        $m1->Content_type($headers_affiliate['contenttype']);
        $m1->Priority(3) ;        // set the priority to Normal
        $m1->Body("$therapist_message");
    //    foreach ($attach_files AS $key=>$value) $m1->Attach( IMAGE_DIR.$value , "application/pdf" ) ;
        if ( !$m1->Send() ) $sent=0;
        //***************** end modified by Sergiu****************************
        }


//if it's to be printed then echo it to the screen & e-mail therapist, Meredith and I
if ($print_or_email == "print")
{


        echo "<h3>List of paperwork files</h3><br><br><table border='0'>";
        $files="";
        foreach ($html_files as $key=>$value)
        {
        echo "<tr><td><font color='blue'>".str_replace(".html","",$value)."</font>&nbsp;&nbsp;&nbsp;</td><td><a href='javascript: void window.open(\"".IMAGE_DIR_URL.$value."\",\"popup1\",\"toolbar=0,width=800,height=600,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=0,copyhistory=0\");'><font color='red'><b> "."PRINT</b></font></a></td></tr>";
        $files.=$value.";";
        }
        echo "</table><br><br>";


        echo "<a href='do_clear_printfiles.php?files=$files'><font color='red'><b> Delete files</b></font></a>";


      //  mail($cc_to_meredith, $cc_subject, $cc_msg, $mailheaders);
     //   mail($cc_to_larry, $cc_subject, $cc_msg, $mailheaders);
   //     mail($affil_email, $therapist_subject, $therapist_message, $affiliate_mailheaders);

       // mail("sergiu.varga@gmail.com", $cc_subject, $cc_msg, $mailheaders);
       // mail("sergiu.varga@gmail.com", $cc_msg, $mailheaders);
        //mail("sergiu.varga@gmail.com", $therapist_subject, $therapist_message, $affiliate_mailheaders);


        //if affiliate has no e-mail address
        IF (!is_email($affil_email))
                        {
                                $no_email_subject="****PLEASE CALL $affil_f_name $affil_l_name";
                                $no_email_message="$affil_f_name $affil_l_name does not have an e-mail listed in the database and so please call this therapist and inform about the appointment just made for $f_name $l_name on $appointment_date at $appointment_time";
                                //mail($cc_to_meredith, $no_email_subject, $no_email_message, $mailheaders);

                                //mail to meredith if the affiliate email is empty
                                $m1= new Mail; // create the mail
                                $m1->From( $headers['from'] );
                               // $m1->To( "$cc_to_meredith" );
                                $m1->ReplyTo ( $headers['replyto']);
                                $m1->Subject( "$no_email_subject" );
                                $m1->Content_type($headers['contenttype']);
                                $m1->TO( "sergiu.varga@gmail.com" );
                                $m1->Priority(3) ;        // set the priority to Normal
                                $m1->Body("$no_email_message");
                                $m1->Send();


                        }
}

//if it's to be e-mailed then put it together and send it
//if ($print_or_email == "e-mail"){


//send the mail

//mail($recipient, $subject, $msg, $mailheaders);
//mail($cc_to_meredith, $cc_subject, $cc_msg, $mailheaders);
//mail($cc_to_larry, $cc_subject, $cc_msg, $mailheaders);
//mail($affil_email, $therapist_subject, $therapist_message, $mailheaders);



        //***************** start modified by Sergiu****************************

        // mail to client
        $m1= new Mail; // create the mail
        $m1->From( $headers['from'] );
        $m1->To( "$cc_to_sergiu" );
       // $m1->To( "$recipient" );
  //      $m1->Bcc( "$cc_to_larry" );
 //       $m1->Bcc( "$cc_to_sergiu" );
        $m1->ReplyTo ( $headers['replyto']);
        $m1->Subject( "$subject" );
        $m1->Content_type($headers['contenttype']);
        $m1->Priority(3) ;        // set the priority to Normal
        $m1->Body("$client_mail_body");
     //   foreach ($attach_files AS $key=>$value) $m1->Attach( IMAGE_DIR.$value , "application/pdf" ) ;
        if ( !$m1->Send() ) $sent=0;




        //if affiliate has no e-mail address
        IF (!is_email($affil_email))
                        {
                                $no_email_subject="****PLEASE CALL $affil_f_name $affil_l_name";
                                $no_email_message="$affil_f_name $affil_l_name does not have an e-mail listed in the database and so please call this therapist and inform about the appointment just made for $f_name $l_name on $appointment_date at $appointment_time";
                                //mail($cc_to_meredith, $no_email_subject, $no_email_message, $mailheaders);
                                $m1= new Mail; // create the mail
                                $m1->From( $headers['from'] );
                               // $m1->To( "$cc_to_meredith" );
                                $m1->To( "$cc_to_sergiu" );
                                $m1->ReplyTo ( $headers['replyto']);
                                $m1->Subject( "$no_email_subject" );
                                $m1->Content_type($headers['contenttype']);
                                //$m1->Cc( "sergiu.varga@gmail.com" );
                                $m1->Priority(3) ;        // set the priority to Normal
                                $m1->Body("$no_email_message");
                                $m1->Send();

                        }
           //***************** end modified by Sergiu****************************

include("paperwork_sent.htm");




echo "<script>
document.all[\"slowScreenSplash\"].style.display = \"none\";
</script>";

//####################### In any case, send a paperwork confirmation to PC ###########################

IF ($sent==0){
           echo "<h2>Error: mail not sent!!! Please try again</h2>";
           exit;
}

//send confirmation e-mail to PC that sold it
$user_subject = "CONGRATS ON THE SALE $user_f_name!  Here is backup paperwork for $f_name $l_name";

//mail($user_email, $user_subject, $msg, $mailheaders);

//mail("sergiu.varga@gmail.com", $user_subject, $msg, $mailheaders);

        // mail to pc
        $m1= new Mail; // create the mail
        $m1->From( $headers['from'] );
        $m1->To( "$cc_to_sergiu" );
        //$m1->To( "$user_email" );
        $m1->ReplyTo ( $headers['replyto']);
        $m1->Subject( "$user_subject" );
        $m1->Content_type($headers['contenttype']);
        $m1->Priority(3) ;        // set the priority to Normal
        $m1->Body("$client_mail_body");
  //     foreach ($attach_files AS $key=>$value) $m1->Attach( IMAGE_DIR.$value , "application/pdf" ) ;
        if ( !$m1->Send() ) $sent=0;


        foreach ($attach_files AS $key=>$value) @unlink(IMAGE_DIR.$value) ;




        // receipt system
       /*
        $sql = "INSERT INTO email_receipt (id , id_user , client_email , mail_body ,  code , status , DATA, f_name, l_name, client_id )";
        $sql.= " VALUES ( '' , $user_id , '$recipient' , '$client_mail_body' , '$code' , 0 , NOW() , '$f_name' , '$l_name', '$client_id' )";
        $results = mysql_query($sql);
       */


?>

</body>
</html>
