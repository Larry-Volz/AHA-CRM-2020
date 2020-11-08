<?
    include_once "igor/initialization.inc.php";
    include_once "igor/conditions.inc.php";
    include_once "igor/ahclog.inc.php"; 


    echo
    "<DIV ID=\"slowScreenSplash\" STYLE=\"position:absolute;z-index:5;top:40%;left:15%;\"
    align=\"center\">
    <font style='font-family: Verdana;'><b> Please wait while required paperwork is generated <img src='images/mozilla_blu.gif' border='0' width='16' height='16' hspace='0' vspace='0' align='absmiddle'></b></font>
    <br><br>Larry: paperwork_only variable = $paperwork_only
    </DIV>";


    //***********  Financial data is only inserted if the Igor form page does NOT have a checked  "Only paperwork"  checkbox
    if ($paperwork_only != "checked")
    {
        $table_name="financial";
        $sql = "INSERT INTO $table_name
        (client_id, cc_type, cc_number, cc_expiration_date, ck_routing_number, ck_account_number, ck_number, xaction_status, date, amount, program_id, program_cost, number_of_payments, equal_payments_of, notes, pc_id, date_sold, client_f_name, client_l_name, apt_date, therapist_id) VALUES ('$client_id', '$cc_type', '$cc_number', '$cc_expiration_date', '$ck_routing_number', '$ck_account_number', '$ck_number', '$xaction_status', '$charge_date', '$amount_to_charge', '$program_index', '$total_display', '$number_of_payments', '$equal_payments_of', '$financial_notes', '$pc_id', '$date_sold', '$f_name', '$l_name','$apt_date','$affiliate_id')";
        $results = mysql_query($sql) or die(mysql_error());
    }




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

 //start looping through descriptions one by one  --- only one loop cause there cannot be more than one affiliate with one id 
 while ($descriptions = mysql_fetch_array($results))
 {


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
  
  //****GENERATE THE AFFILIATE PAPERWORK  SELECTED IN IGOR FORM 
  $query1 = "SELECT * FROM $desc_table WHERE id='$affiliate_id'";
  $results1 = mysql_query($query1);// or die(mysql_error())

  //start looping through descriptions one by one --- only one loop cause there cannot be more than one affiliate with one id
  while ($descriptions = mysql_fetch_array($results1))
  {

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

  }
  
  //**** END GENERATE THE AFFILIATE PAPERWORK  SELECTED IN IGOR FORM  
  

  include_once "igor/paperwork_includes.inc.php";  

?>

</head>
<body>

<?




  //**************************** READ RECEIPT FEATURE ***********************
  $sql="SELECT max(id) max_id from email_receipt";
  $results = mysql_query($sql);
  $row = mysql_fetch_array($results);
  $max=$row['max_id'];
  $code = $max.RandomCode();
  $email_receipt_url="http://www.americanhypnosisclinic.com/intranet/confirm_mail.php?code=$code";    
  
  $client_mail_body = "$intro_letter"."By clicking below I acknowledge that I have read and agree to the terms and conditions in The Lifetime Commitment Guarantee and Client Contract.
  <a href=\"$email_receipt_url\">$email_receipt_url</a>
  <br><br>If clicking the link does not take you to a confirmation page please copy the following link to your favorite browser: $email_receipt_url</p> ".$intro_letter_end;    
  
  
 

  
  $sql = "INSERT INTO email_receipt (id , id_user , client_email , mail_body ,  code , status , DATA, f_name, l_name, client_id )";
  $sql.= " VALUES ( '' , '".$_SESSION['user']."' , '$_POST[email]' , '$client_mail_body' , '$code' , 0 , NOW() , '$_POST[f_name]' , '$_POST[l_name]', '$_POST[client_id]' )";
  $results = mysql_query($sql) ;
       

  //**************************** END READ RECEIPT FEATURE ***********************  


  $complete_text = "$intro_letter"."$email_receipt_url";
  $i=0;
  $attach_files=array();
  define("IMAGE_DIR","/home/america2/public_html/intranet/images/");
  define("IMAGE_DIR_URL","http://www.americanhypnosisclinic.com/intranet/images/");
  $htmltopdf = new HTML_TO_PDF();
  $htmltopdf->useURL(HKC_USE_ABC);
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


        /*
        echo "Pc email: ".$user_email."<br />";
        echo "Client email: ".$_POST['email']."<br />"; 
        echo "User email: ".$user_email."<br />"; 
        exit;
        */
        

        // $cc_to_meredith  and $cc_to_larry
        $m1= new Mail; // create the mail
        $m1->From( $headers['from'] );
        $m1->To( "$cc_to_meredith" );
        $m1->ReplyTo ( $headers['replyto']);
        $m1->Subject( "$cc_subject" );
        //$m1->Subject( "Mail to meredith" );
                             
        $m1->Content_type($headers['contenttype']);
        $m1->Cc( "$cc_to_larry" );
        //$m1->Bcc( "$cc_to_sergiu" );
        $m1->Priority(3) ;        // set the priority to Normal
        //$m1->ReadReceipt("svarga15@yahoo.com");
        $m1->Body("$cc_msg");
        foreach ($attach_files AS $key=>$value) $m1->Attach( IMAGE_DIR.$value , "application/pdf" ) ;
        if ( !$m1->Send() ) $sent=0;



        IF (is_email($affil_email))
        {
        // mail to  therapist
        $m1= new Mail; // create the mail
        $m1->From( $headers_affiliate['from'] );
        $m1->To( "$affil_email" );
        //$m1->To( "sergiu.varga@gmail.com" ); 
        
        
        //$m1->To( "$cc_to_sergiu" );

 //       $m1->Bcc( "$cc_to_sergiu" );
  //      $m1->Bcc( "$cc_to_larry" );
        $m1->ReplyTo ( $headers_affiliate['replyto']);
        $m1->Subject( "$therapist_subject" );
       // $m1->Subject( "Mail to therapist" ); 
        $m1->Content_type($headers_affiliate['contenttype']);
        $m1->Priority(3) ;        // set the priority to Normal
        $m1->Body("$therapist_message");
        foreach ($attach_files AS $key=>$value) $m1->Attach( IMAGE_DIR.$value , "application/pdf" ) ;
        if ( !$m1->Send() ) $sent=0;
        //***************** end modified by Sergiu****************************
        }


        /*//if it's to be printed then echo it to the screen & e-mail therapist, Meredith and I
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
        
            IF (!is_email($affil_email))
                            {
                                    $no_email_subject="****PLEASE CALL $affil_f_name $affil_l_name";
                                    $no_email_message="$affil_f_name $affil_l_name does not have an e-mail listed in the database and so please call this therapist and inform about the appointment just made for $f_name $l_name on $appointment_date at $appointment_time";
                                    //mail($cc_to_meredith, $no_email_subject, $no_email_message, $mailheaders);

                                    //mail to meredith if the affiliate email is empty
                                    $m1= new Mail; // create the mail
                                    $m1->From( $headers['from'] );
                                    //$m1->To( "$cc_to_meredith" );
                                    $m1->To( "sergiu.varga@gmail.com" ); 
                                    $m1->ReplyTo ( $headers['replyto']);
                                    $m1->Subject( "$no_email_subject" );
                                    $m1->Content_type($headers['contenttype']);
                                    //$m1->Cc( "sergiu.varga@gmail.com" );
                                    $m1->Priority(3) ;        // set the priority to Normal
                                    $m1->Body("$no_email_message");
                                    $m1->Send();
                            }
        }  
       */

        //***************** start modified by Sergiu****************************

        // mail to client
        $m1= new Mail; // create the mail
        $m1->From( $headers['from'] );
        //$m1->To( "$cc_to_sergiu" );
        $m1->To( "$_POST[email]" );
  //      $m1->Bcc( "$cc_to_larry" );
 //       $m1->Bcc( "$cc_to_sergiu" );
        $m1->ReplyTo ( $headers['replyto']);
        $m1->Subject( "$subject" );
        //$m1->Subject( "Mail to client" );
        
        $m1->Content_type($headers['contenttype']);
        $m1->Priority(3) ;        // set the priority to Normal
        $m1->Body("$client_mail_body");
        foreach ($attach_files AS $key=>$value) $m1->Attach( IMAGE_DIR.$value , "application/pdf" ) ;
        if ( !$m1->Send() ) $sent=0;




        //if affiliate has no e-mail address
        IF (!is_email($affil_email))
                        {
                                $no_email_subject="****PLEASE CALL $affil_f_name $affil_l_name";
                                $no_email_message="$affil_f_name $affil_l_name does not have an e-mail listed in the database and so please call this therapist and inform about the appointment just made for $f_name $l_name on $appointment_date at $appointment_time";
                                //mail($cc_to_meredith, $no_email_subject, $no_email_message, $mailheaders);
                                $m1= new Mail; // create the mail
                                $m1->From( $headers['from'] );
                                $m1->To( "$cc_to_meredith" );
                                //$m1->To( "sergiu.varga@gmail.com" ); 
                                $m1->ReplyTo ( $headers['replyto']);
                                $m1->Subject( "$no_email_subject" );
                                //$m1->Subject( "Affiliate no email" );
                                $m1->Content_type($headers['contenttype']);
                                $m1->Cc( "$cc_to_larry" );
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

            IF ($sent==0)
            {
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
           //$m1->To( "$cc_to_sergiu" );
           $m1->To( "$user_email" );
           $m1->ReplyTo ( $headers['replyto']);
           $m1->Subject( "$user_subject" );
           //$m1->Subject( "Mail to pc" );
           
           $m1->Content_type($headers['contenttype']);
           $m1->Priority(3) ;        // set the priority to Normal
           $m1->Body("$client_mail_body");
           
           foreach ($attach_files AS $key=>$value) $m1->Attach( IMAGE_DIR.$value , "application/pdf" ) ;
           if ( !$m1->Send() ) $sent=0;


           foreach ($attach_files AS $key=>$value) @unlink(IMAGE_DIR.$value) ;



?>

</body>
</html>
