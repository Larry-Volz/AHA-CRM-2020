<?

//METHOD TO CONNECTS TO MAIN AHC DATABASE.  CALL BY:   $ahcDB->dbConnect();



//FUNCTION TO CHECK BASIC SECURITY. (line 73 ish)) CALL BY:   $ahcDB->securityCheckBasic();



//FUNCTION LOG EACH PAGE ACTIVITY AND CHECK TIMER/LOGOUT IF NECCESSARY (LINE 95 ish):

//CALL BY:  $ahcDB->dbConnect(); $ahcDB->logEntry($list_id);



//METHOD TO DO A QUERY (line 152 ish).  CALL BY:   $ahcDB->doQuery($sql);



//METHOD TO RETRIEVE A VARIABLE FROM A TABLE AND ASSIGNS THEM TO A php VARIABLE (LINE 179):

//CALL BY:   $variable = $ahcDB->getVar($table_name,$id,$fieldName);

//example:  $description = $ahcDB->getVar('desc_whatever',$id,$desc)



//METHOD TO MAKE CERTIFICATIONS PRINT STRING (LINE 207):

//CALL $cert_print_block = $ahcDB->makeCertBlock();



//Collect and Print ISSUES (LINE 247)

//CALL WITH:  $issues_print_block = $ahcDB->makeIssuesBlock($affil_id);



//Collect and Print EDUCATION (LINE 295 ish)

//CALL WITH:  $issues_print_block = $ahcDB->makeEduBlock($affil_id);



//Collect and Print Styles and Techniques (LINE 341 ish)

//Call by: $styles_print_block = $ahcDB->makeStyleBlock($affil_id);



//Collect and Print ORGANIZATIONS (line 385 ish)

//Call by: $org_print_block = $ahcDB->makeOrgBlock($affil_id);



// METHOD TO POPULATE A DROP-DOWN (SELECT) LIST AND HIGHLIGHT THE PREVIOUSLY SELECTED CHOICES (line 427 ish)

//CALL BY: $ahcDB->dropDownSelected($person_id,$rel_table,$desc_table,$output);



//METHOD TO COUNT NEW AFFILIATES This week (line 510 ish)

//CALL BY: $count_new_affil_week = $ahcDB->countNewAffiliates();



//METHOD TO COUNT Active AFFILIATES (571 ish)

//CALL BY: $count_active_affil = $ahcDB->countActiveAffiliates();



//METHOD TO COUNT Active AFFILIATES in a given STATE ( 614 ish)

//CALL BY: $count_state = $ahcDB->countStateAffiliates($state);



//METHOD TO COUNT NEW AFFILIATES Today (652 ish)

//CALL BY: $count_new_today = $ahcDB->countNewAffiliatesToday();



//**** NOTE:  $ahcDB DEFINED as primary object from this class at end of script...



 class ahcDatabase {





//##############################################################################################

//########### METHOD TO CONNECTS TO MAIN AHC DATABASE.  CALL BY:   $ahcDB->dbConnect();  #######

//###########Or... ahcDatabase::dbConnect();

//##############################################################################################



  function dbConnect(){

    global $db_name,$connection,$db;



    $db_name = "america2_AHC";

        $servername = "mysql.americanhypnotherapyassociation.com";
            $username = "larryvolz";
            $password = "ZacNat727";
            $dbname = "america2_ahc";



        //open the SQL connection to AHC server databases

        //$connection = mysql_connect("localhost","america2_AHC","magiclar");// or die (mysql_error())
        $connection = mysql_connect($servername, $username, $password);



        // SELECT DB - create var to hold the result of select db function

        $db = mysql_select_db($db_name, $connection);// or die (mysql_error())

        return $db;



}//======================================== END  METHOD ===========================================







//#######################################################################################

//##### FUNCTION TO CHECK BASIC SECURITY.  CALL BY:   $ahcDB->securityCheckBasic();  ###

//###### OR... Just use ahcDatabase::securityCheckBasic();

//#######################################################################################



  function securityCheckBasic(){



session_start();



$auth = $_SESSION[auth];

$permission = $_SESSION[permission];

$f_name=$_SESSION[f_name];



IF ($auth !="ok"){

        header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");

        exit;

}



//------------------------------ end security check --------------------------





}//======================================== END  METHOD ===========================================



//#############################################################################################

//####### FUNCTION LOG EACH PAGE ACTIVITY AND CHECK TIMER/LOGOUT IF NECCESSARY ################

//## CALL BY:  $ahcDB->dbConnect(); $ahcDB->logEntry($list_id); ##############################

//#############################################################################################

//strategy:

// - Check timer_start to see if this person signed in today

// - Check activity_log database and select all entries with this person's id and find when the last log entry

//   was made

// - subtract the time of the last log entry from now and if over 20 minutes have elapsed then destroy session

//   post time-related (opt) vars and go to logout screen







function logEntry($list_id){

//Where list_id is the kind of log entry:  ex, 1 might be add user 3 might be add affiliate... 1 for each page...

//put right after security check or make sure you use a 'session start' before calling this

//make sure database has been opened 1st otherwise do that before calling this function



//get user_id and timer_start from session and current time from php

        $user_id = $_SESSION[user];

        $timer_start=$_SESSION[timer_start];

        $timer_start += 7200; //converts to eastern standard time

        $now=time();

        $auth=$_SESSION[auth];



//if not logged in then redirect to log in

        if ($auth !="ok"){

          Header("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");

          exit;

        }



//****MAKE SURE TO CONNECT to db in case not connected already

// **** USE $ahcDB->dbConnect(); IN SCRIPT



//open activity_log table/get  biggest time value from from this person or timer_start

        $sql="SELECT MAX(time) FROM activity_log WHERE id=$user_id";

          $result = mysql_query($sql) or die(mysql_error());



        while ($row=mysql_fetch_array($result)){



                  $last_entry=$row['MAX(time)'];



}//end while/fetch_array





//and use whichever is biggest               ********NOT SURE THIS IS WORKING!!! TEST THIS MORE!!!!**************

If ($last_entry > $timer_start){

  $tester_time=$last_entry;

} else {

  $tester_time=$timer_start;

}







//subtract last log entry (or timer_start) from now.

$difference = $now-$tester_time;

$permission = $_SESSION[permission];

$too_long=60*60;//if 60 minutes = 60 sec/min x 60 min = total Numb minutes



//If difference > 60 minutes then destroy session,logout and put a "timeout" in log entry


//?????????????????????????????????????????????????????????????????????????????????????????????????????????????
//???????????????????????????? TIME OUT AND LOG OFF BLOCK BELOW IF WANT TO REINSTATE ??????????????????????????
//?????????????????????????????????????????????????????????????????????????????????????????????????????????????

/*

if(($difference > $too_long) AND ($permission !='god') AND ($permission !='admin') AND ($permission !='manager')){



                          // make timeout log entry

                        $table_name="activity_log";

                        $sql2="INSERT INTO $table_name (id,user_id,list_id,time) VALUES ('','$user_id','10','$now')";

                        mysql_query($sql2) or die(mysql_error());



                          //go to timeout announcement page/re-login sequence

                         Header("Location: http://www.americanhypnosisclinic.com/intranet/logout.php");

                         exit;



//else make a log entry and return as everything's okay.

}else{

*/

  $table_name="activity_log";



  $sql2="INSERT INTO $table_name (id,user_id,list_id,time) VALUES ('','$user_id','$list_id','$now')";

  mysql_query($sql2) or die(mysql_error());



//}//end of if/else TIME OUT AND LOG OFF block















}//end of method



//==================================== END  LOG ENTRY METHOD ===========================================







//###########################################################################################

//########################## METHOD TO DO A QUERY.  CALL BY:   $ahcDB->doQuery($sql);  ######

//###########################################################################################



  function doQuery($sql){



    // $sql is the string containing the query to do



    //execute the sql statement and create a variable you can use to display or work with it

    // performs query (UPDATE,INSERT,SELECT OR DELETE)



        $result = mysql_query($sql);// or die(mysql_error())



        //returns reciept of query

        return $result;



}//=========================== END PERFORM QUERY METHOD =================================





//########################################################################################

//################# METHOD TO RETRIEVE A VARIABLE FROM TABLE ##################

//################### AND ASSIGNS THEM TO A php VARIABLE  ################################

//####  CALL BY:   $variable = $ahcDB->getVar($table_name,$id,$fieldName);  #################

//#### example:  $description = $ahcDB->getVar('desc_whatever',$id,$desc)

//########################################################################################



        function getVar($table_name,$id,$fieldName){



                        //DO QUERY TO RETRIEVE ALL VARIABLES FOR PERSON # $ID

                          $sql = "SELECT * FROM $table_name WHERE id = '$id'";

                        $result = mysql_query($sql) or die(mysql_error());//



                //CREATE AN ARRAY CALLED $row() FOR EACH RECORD IN RESULT SET

        while ($row = mysql_fetch_array($result)){



                        $variable = $row[$fieldName];



           }//close while loop that assigns values from fetch_array



return $variable;



}//end function



//-------------------------------------- END GET VARIABLE -------------------------------------------







//################################################################################################

//###################### METHOD TO MAKE CERTIFICATIONS PRINT STRING:  ############################

//##################CALL $cert_print_block = $ahcDB->makeCertBlock();  ###########################

//################################################################################################



function makeCertBlock($affil_id){



        $cert_print_block = "";



        $affiliates_certifications_rel = "affiliates_certifications_rel";//relationship table

        $hyp_certifications ="hyp_certifications";//certifications descriptions table



        //        Lookup related certification numbers array through affil_cert_rel by id#

        $cert_id_lookup = "SELECT list_id FROM $affiliates_certifications_rel WHERE affil_id=$affil_id";

        $cert_id_result=mysql_query($cert_id_lookup);// or die(mysql_error())



                //Get certifications id#'s array from array reciept...

                while ($row = mysql_fetch_array($cert_id_result)){

                        $list_id=$row['list_id'];



                        //         Lookup description for each cert_id#

                        $desc_lookup="SELECT * FROM $hyp_certifications WHERE id=$list_id";

                                        $cert_desc_result=mysql_query($desc_lookup);// or die(mysql_error())

                                                    while ($inner_loop = mysql_fetch_array($cert_desc_result)){

                            $cert_desc = $inner_loop['desc'];

                            $cert_print_block .= " ".$cert_desc;



                      }//end desc - fetching loop

               }//end id# - fetching loop



               return $cert_print_block;



}// end method def



//++++++++++++++++++++++++++++++++++++++++ END METHOD DEF +++++++++++++++++++++++++++++++++++





//###############################################################################################

//############################# Collect and Print ISSUES ########################################

//############## CALL WITH:  $issues_print_block = $ahcDB->makeIssuesBlock($affil_id); ##########

//###############################################################################################



function makeIssuesBlock($affil_id){



        //assign other name to id for cut & pasted code for related tables

        $issues_print_block = "<ul>";

        $affiliates_issues_rel = "affiliates_issues_rel";//issues relationship table

        $hyp_issues ="hyp_issues";//issues descriptions table



        //        Lookup related issue numbers array through affil_issue_rel by id#

        $issues_id_lookup = "SELECT list_id FROM $affiliates_issues_rel WHERE affil_id=$affil_id";

        $issues_id_result=mysql_query($issues_id_lookup);// or die(mysql_error())



                //Get certifications id#'s array from array reciept...

                while ($row = mysql_fetch_array($issues_id_result)){

                        $list_id=$row['list_id'];



                        //         Lookup description for each cert_id#

                        $desc_lookup="SELECT * FROM $hyp_issues WHERE id=$list_id";

                                        $issues_desc_result=mysql_query($desc_lookup);// or die(mysql_error())

                                                    while ($inner_loop = mysql_fetch_array($issues_desc_result)){

                            $issue_desc = $inner_loop['desc'];

                            $issues_print_block .= "<li>".$issue_desc."</li>";



                      }//end desc - fetching loop

               }//end id# - fetching loop



               if ($other_issues !=""){

               $issues_print_block .= "<li>$other_issues</li>";

               }

               $issues_print_block .= "</ul>";



               return $issues_print_block;



}//end method definition



//+++++++++++++++++++++++++ END ISSUES MAKE PRINT BLOCK METHOD ++++++++++++++++++++







//############################################################################################

//####################################### Collect and Print EDUCATION ########################

//############## CALL WITH:  $issues_print_block = $ahcDB->makeEduBlock($affil_id); ##########

//############################################################################################



function makeEduBlock($affil_id){

        //assign other name to id for cut & pasted code for related tables

        $edu_print_block = " ";

        $affiliates_edu_rel = "affiliates_edu_rel";//issues relationship table

        $education ="education";//issues descriptions table



        //        Lookup related issue numbers array through affil_issue_rel by id#

        $edu_id_lookup = "SELECT list_id FROM $affiliates_edu_rel WHERE affil_id=$affil_id";

        $edu_id_result=mysql_query($edu_id_lookup);// or die(mysql_error())



                //Get certifications id#'s array from array reciept...

                while ($row = mysql_fetch_array($edu_id_result)){

                        $list_id=$row['list_id'];



                        //         Lookup description for each cert_id#

                        $desc_lookup="SELECT * FROM $education WHERE id=$list_id";

                                        $edu_desc_result=mysql_query($desc_lookup);// or die(mysql_error())

                                                    while ($inner_loop = mysql_fetch_array($edu_desc_result)){

                            $edu_desc = $inner_loop['desc'];

                            $edu_print_block .= $edu_desc." ";



                      }//end desc - fetching loop

               }//end id# - fetching loop



               $suffix = $edu_print_block;

               if ($suffix = " No advanced degree - just certifications"){

               $suffix="";

               }

               if ($education_details !=""){

               $edu_print_block .= "<br>$education_details";

               }

                return $edu_print_block;

}

//+++++++++++++++++++++++++ END EDUCATION ADD AND VERIFY BLOCK ++++++++++++++++++++







###############################################################################################

######################### Collect and Print Styles and Techniques #############################

################### Call by: $styles_print_block = $ahcDB->makeStyleBlock($affil_id); #########

###############################################################################################



function makeStyleBlock($affil_id){



        //assign other name to id for cut & pasted code for related tables

        $styles_print_block = "<ul>";

        $affiliates_styles_rel = "affiliates_styles_rel";//issues relationship table

        $hyp_styles ="hyp_styles";//issues descriptions table



        //        Lookup related issue numbers array through affil_issue_rel by id#

        $styles_id_lookup = "SELECT list_id FROM $affiliates_styles_rel WHERE affil_id=$affil_id";

        $styles_id_result=mysql_query($styles_id_lookup);// or die(mysql_error())



                //Get certifications id#'s array from array reciept...

                while ($row = mysql_fetch_array($styles_id_result)){

                        $list_id=$row['list_id'];



                        //         Lookup description for each cert_id#

                        $desc_lookup="SELECT * FROM $hyp_styles WHERE id=$list_id";

                                        $styles_desc_result=mysql_query($desc_lookup);// or die(mysql_error())

                                                    while ($inner_loop = mysql_fetch_array($styles_desc_result)){

                            $style_desc = $inner_loop['desc'];

                            $styles_print_block .= "<li>".$style_desc."</li>";



                      }//end desc - fetching loop

               }//end id# - fetching loop



               if ($other_styles !=""){

               $styles_print_block .= "<li>$other_styles</li>";

               }

               $styles_print_block .= "</ul>";

               return $styles_print_block;



}//end method definition



//+++++++++++++++++++++++++ END STYLES/TECHNIQUES ADD AND VERIFY BLOCK ++++++++++++++++++++





//#################################################################################################

//########################### Collect and Print ORGANIZATIONS #####################################

//##################### Call by: $org_print_block = $ahcDB->makeOrgBlock($affil_id); ##############

//#################################################################################################



function makeOrgBlock($affil_id){



        //assign other name to id for cut & pasted code for related tables

        $org_print_block = "<ul>";

        $affiliates_organizations_rel = "affiliates_organizations_rel";//issues relationship table

        $hyp_organizations ="hyp_organizations";//issues descriptions table



        //        Lookup related issue numbers array through affil_issue_rel by id#

        $list_id_lookup = "SELECT list_id FROM $affiliates_organizations_rel WHERE affil_id=$affil_id";

        $list_id_result=mysql_query($list_id_lookup);// or die(mysql_error())



                //Get certifications id#'s array from array reciept...

                while ($row = mysql_fetch_array($list_id_result)){

                        $list_id=$row['list_id'];



                        //         Lookup description for each list_id#

                        $desc_lookup="SELECT * FROM $hyp_organizations WHERE id=$list_id";

                                        $org_desc_result=mysql_query($desc_lookup);// or die(mysql_error())

                                                    while ($inner_loop = mysql_fetch_array($org_desc_result)){

                            $org_desc = $inner_loop['desc'];

                            $org_print_block .= "<li>".$org_desc."</li>";



                      }//end desc - fetching loop

               }//end id# - fetching loop



               if ($other_organizations !=""){

               $org_print_block .= "<li>$other_organizations</li>";

               }

               $org_print_block .= "</ul>";

               return $org_print_block;



}//end method definition



//+++++++++++++++++++++++++ END ORGANIZATIONS ADD AND VERIFY BLOCK ++++++++++++++++++++





###################################################################################################

################# METHOD TO POPULATE A DROP-DOWN (SELECT) LIST AND ################################

###################### HIGHLIGHT THE PREVIOUSLY SELECTED CHOICES ##################################

##### CALL BY: $ahcDB->dropDownSelected($person_id,$rel_table,$desc_table,$output); #######

###################################################################################################

#

# Strategy:  Outer loop

#                                                - get each description string

#                                                - use if-then block to choose whether edu, org, etc. if needed

#                         inner loop - get each chosen item

#                                                - use if-then block to choose whether edu, org, etc. if needed

#                                                - compare each chosen item to the description string

#                                                - if same, then add to print$ with "selected"

#                                                - else add to print$ without "selected"

#                                                - repeat and output

#                        detail:                - can do horiz or vertical dependent on $bullet

#var definitions:        $person_id = affil_id, or contact id or whatever program is calling this

#                                        $rel_table is the name of the table of relationships

#                                        $desc_table is the name of the table with descriptions

#                                        $output is the print string to ouput to browser

#                                        $person_table is the person list like affiliates or my_contacts

#                                        $select_name is the name of the select list

#

######################################################################################################



function dropDownSelected($person_id,$rel_table,$desc_table,$select_name){

//EXAMPLE:

//$person_id=$affil_id

//$person_table="affiliates"

//$rel_table="affiliates_certifications_rel",

//$desc_table="hyp_certifications"

//$select_name="certifications[]" //#*#*#*#*#*#*#*use [] since it's an ARRAY you want to post!!!



         $output="<select name = \"".$select_name."\" multiple>";



        //get all descriptions

        $query1 = "SELECT * FROM $desc_table";

        $results1 = mysql_query($query1);// or die(mysql_error())



                //start looping through descriptions one by one

                while ($descriptions = mysql_fetch_array($results1)){



                  $id = $descriptions['id'];

                  $desc = $descriptions['desc'];



                  if ($desc !="N/A"){

                  $output .= "<option value = \"".$id."\"";

                  }

                  //query for all the id numbers for the list items that the person picked



                                // NOTE: IF I USE THIS FOR ANOTHER DATABASE TABLE LATER OTHER THAN AFFILIATES

                                // I WILL NEED TO CHANGE IT FROM affil_id to something else (id or person_id or something)

                  $query2 ="SELECT list_id FROM $rel_table WHERE affil_id=$person_id";

                  $results2= mysql_query($query2);// or die(mysql_error())



                          //Get list descriptions id#s array from array reciept...

                          while ($choices = mysql_fetch_array($results2)){



                                $list_id = $choices['list_id'];



                                        if ($list_id == $id){//if this choice is one of those selected...



                                                  $output .= " selected";



                                        }//end of if statement



                        }//end inner compare-to-chosen-items loop



                        $output .= ">".$desc."</option>";



          }//end outer list descriptions loop



  return $output;



}//end function definition



################################ END dropDownSelected DEFINITION ####################################











//##################### METHOD TO COUNT NEW AFFILIATES This week ###########################

//######################## CALL BY: $count_new_affil_week = $ahcDB->countNewAffiliates(); #################



function countNewAffiliates(){



 //################################ CONNECT ########################################

// create variable for name of database & table

$db_name = "america2_AHC";

$table_name = "affiliates";



//open the SQL connection to AHC server databases

//$connection = mysql_connect("localhost","america2_larryvo","magiclar");// or die (mysql_error())
$connection = mysql_connect("localhost", "america2_AHC", "magiclar");



// create var to hold the result of select db function

$db = mysql_select_db($db_name, $connection);// or die (mysql_error())



//--------------------------- COUNT DB AFFILIATES QUERY -----------------------------



$sql = "SELECT count(id) FROM $table_name";

$result=mysql_query($sql,$connection);// or die(mysql_error())



$count = mysql_result($result,0,"count(id)");// or die(mysql_error())



//--------------------------- COUNT DB ACTIVE QUERY -----------------------------------



$sql2 = "SELECT count(id) FROM $table_name WHERE membership_status='Affiliate'";

$result2=mysql_query($sql2,$connection);// or die(mysql_error())



$count_active = mysql_result($result2,0,"count(id)");// or die(mysql_error())



//--------------------------- COUNT DB NEW AFFILIATES QUERY -----------------------------

$count_new = 0;

$this_moment = time();

$one_week = 60*60*24*7; //number of seconds in a week for timestamp

$one_week_ago = $this_moment-$one_week;

$AffiliateWord = "Affiliate";





$sql3 = "SELECT count(id) FROM $table_name WHERE date_applied >= $one_week_ago AND membership_status = '$AffiliateWord'";





$result3=mysql_query($sql3,$connection);// or die(mysql_error())



$count_new = mysql_result($result3,0,"count(id)");// or die(mysql_error())



//?????????????????????????????????????????????????????????????????????????????????????????



return $count_new;







}//end function

//-------------------------------END countNewAffiliates------------------------------------







//########################### METHOD TO COUNT Active AFFILIATES ###########################

//######################## CALL BY: $count_active_affil = $ahcDB->countActiveAffiliates(); #################



function countActiveAffiliates(){



 //################################ CONNECT ########################################

// create variable for name of database & table

$db_name = "america2_AHC";

$table_name = "affiliates";



//open the SQL connection to AHC server databases

//$connection = mysql_connect("localhost","america2_larryvo","magiclar");// or die (mysql_error())
$connection = mysql_connect("localhost", "america2_AHC", "magiclar");



// create var to hold the result of select db function

$db = mysql_select_db($db_name, $connection);// or die (mysql_error())



//############################### COUNT DB AFFILIATES QUERY #################################################



$sql = "SELECT count(id) FROM $table_name";

$result=mysql_query($sql,$connection);// or die(mysql_error())



$count = mysql_result($result,0,"count(id)");// or die(mysql_error())



//############################### COUNT DB ACTIVE QUERY ###################################



$sql2 = "SELECT count(id) FROM $table_name WHERE membership_status='Affiliate'";

$result2=mysql_query($sql2,$connection);// or die(mysql_error())



$count_active = mysql_result($result2,0,"count(id)") ;//or die(mysql_error())



return $count_active;







}//end function

//-------------------------------END countActiveAffiliates------------------------------------









//################### METHOD TO COUNT Active AFFILIATES in a given STATE####################

//################## CALL BY: $count_state = $ahcDB->countStateAffiliates($state); #########



function countStateAffiliates($state){



 //################################ CONNECT ########################################

// create variable for name of database & table

$db_name = "america2_AHC";

$table_name = "affiliates";



//open the SQL connection to AHC server databases

//$connection = mysql_connect("localhost","america2_larryvo","magiclar");// or die (mysql_error())
$connection = mysql_connect("localhost", "america2_AHC", "magiclar");



// create var to hold the result of select db function

$db = mysql_select_db($db_name, $connection);// or die (mysql_error())



//############################### COUNT DB AFFILIATES QUERY ##############################



$sql = "SELECT count(id) FROM $table_name";

$result=mysql_query($sql,$connection);// or die(mysql_error())



$count = mysql_result($result,0,"count(id)");// or die(mysql_error())



//############################### COUNT DB ACTIVE QUERY ###################################



$sql2 = "SELECT count(id) FROM $table_name WHERE membership_status='Affiliate' AND address3 ='$state'";

$result2=mysql_query($sql2,$connection) ;//or die(mysql_error())



$count_state = mysql_result($result2,0,"count(id)") ;//or die(mysql_error())



return $count_state;







}//end function

//-------------------------------END countActiveAffiliates------------------------------------





//##################### METHOD TO COUNT NEW AFFILIATES Today ###########################

//############# CALL BY: $count_new_today = $ahcDB->countNewAffiliatesToday(); ############



function countNewAffiliatesToday(){



 //################################ CONNECT ########################################

// create variable for name of database & table

$db_name = "america2_AHC";

$table_name = "affiliates";



//open the SQL connection to AHC server databases

//$connection = mysql_connect("localhost","america2_larryvo","magiclar") ;//or die (mysql_error())
$connection = mysql_connect("localhost", "america2_AHC", "magiclar");



// create var to hold the result of select db function

$db = mysql_select_db($db_name, $connection) ;//or die (mysql_error())





//--------------------------- COUNT DB NEW AFFILIATES QUERY -----------------------------

$count_new = 0;

$this_moment = time();

$one_day = 60*60*24; //number of seconds in a day for timestamp

$one_day_ago = $this_moment-$one_day;

$AffiliateWord = "Affiliate";





$sql3 = "SELECT count(id) FROM $table_name WHERE date_applied >= $one_day_ago AND membership_status = '$AffiliateWord'";





$result3=mysql_query($sql3,$connection) ;//or die(mysql_error())





//??????????????????PROBLEM!!! IF NO NEW CLIENTS - SCREEN GOES BLANK HERE ???????????????????



$count_new_today = mysql_result($result3,0,"count(id)") ;//or die(mysql_error())



//$count_new_today=0;



//?????????????????????????????????????????????????????????????????????????????????????????



return $count_new_today;







}//end function

//-------------------------------END countNewAffiliates------------------------------------



//##################### METHOD TO COUNT NEW AFFILIATES This Month ###########################

//############# CALL BY: $count_new_affil_month = $ahcDB->countNewAffiliatesMonth(); ############



function countNewAffiliatesMonth(){



 //################################ CONNECT ########################################

// create variable for name of database & table

$db_name = "america2_AHC";

$table_name = "affiliates";



//open the SQL connection to AHC server databases

//$connection = mysql_connect("localhost","america2_larryvo","magiclar") ;//or die (mysql_error())
$connection = mysql_connect("localhost", "america2_AHC", "magiclar");


// create var to hold the result of select db function

$db = mysql_select_db($db_name, $connection) ;//or die (mysql_error())



//--------------------------- COUNT DB NEW AFFILIATES QUERY -----------------------------

$count_new = 0;

$this_moment = time();

$month = 60*60*24*30; //number of seconds in a day for timestamp

$month_ago = $this_moment - $month;

$AffiliateWord = "Affiliate";





$sql3 = "SELECT count(id) FROM $table_name WHERE date_applied >= $month_ago AND membership_status = '$AffiliateWord'";





$result3=mysql_query($sql3,$connection) ;//or die(mysql_error())



$count_new_affil_month = mysql_result($result3,0,"count(id)") ;//or die(mysql_error())



//?????????????????????????????????????????????????????????????????????????????????????????

if (!$count_new_affil_month){

  $count_new_affil_month=0;

}

return $count_new_affil_month;







}//end function

//-------------------------------END countNewAffiliates------------------------------------

}//end class def







$ahcDB = new ahcDatabase();//create object from class



?>