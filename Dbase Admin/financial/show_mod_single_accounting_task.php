<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory
include "../../includes/classes_all_clients.php";

//do basic security check
$ahcDB->securityCheckBasic();

//CONNECT to DB
$ahcDB->dbConnect();
//$acIncludes->dbConnect();//connects to db

//Get the id for the record we are working with
$xaction_id=$_GET['xaction_id'];

//bring up all variables from single chosen task with filled-in text input boxes -----------------------------

                                $table_name="financial";

                                //get all variables
                                $query1 = "SELECT * FROM $table_name WHERE id ='$xaction_id'";
                                $results1 = mysql_query($query1) or die(mysql_error());

                                        //start looping through descriptions one by one
                                        while ($row = mysql_fetch_array($results1)){

                                                  $f_name = $row['client_f_name'];
                                                  $l_name = $row['client_l_name'];
                                                  $client_id = $row['client_id'];
												  $amount = $row['amount'];
												  
												  $date = $row['date'];//charge date
												  
												  		$charge_date_month= date("F", $date);
												  		$charge_date_month_num = date("n", $date);
												  		$charge_date_day= date("j", $date);
												  		$charge_date_year= date("Y", $date);
												  		
											//work out conversion to readable	  
												  
												  $cc_number = $row['cc_number'];
												  
												  $cc_expiration_date = $row['cc_expiration_date'];
												  
												  		$cc_expiration_month= date("n", $cc_expiration_date);
												  		$cc_expiration_year= date("Y", $cc_expiration_date);													  
												  
												  $cc_type = $row['cc_type'];
												  $xaction_status = $row['xaction_status'];
												  $ck_routing_number = $row['ck_routing_number'];
												  $ck_account_number = $row['ck_account_number'];
												  $ck_number = $row['ck_number'];
												  $program_id = $row['program_id']+1;
												  $program_cost = $row['program_cost'];
												  $number_of_payments = $row['number_of_payments'];
												  $equal_payments_of = $row['equal_payments_of'];
												  $notes = $row['notes'];
												  $pc_id = $row['pc_id'];

												  $date_sold = $row['date_sold'];
												  
												  		$date_sold_month= date("n", $date_sold);
												  		$date_sold_day= date("j", $date_sold);
												  		$date_sold_year= date("Y", $date_sold);
														$readable_date_sold = date ("M j\, Y", $date_sold);	
														
												   $apt_date = 	$row['apt_date'];
												  		$apt_month= date("n", $apt_date);
												  		$apt_day= date("j", $apt_date);
												  		$apt_year= date("Y", $apt_date);
														$readable_apt_date = date ("M j\, Y", $apt_date);													   						  
												  		$readable_apt_time = date ("h\:i A", $apt_date);
												  		$apt_hour = date("g", $apt_date);
												  		$apt_minute = date("i", $apt_date);
												  		$apt_am_pm = date("A", $apt_date);
												  	
														  
													$therapist_id= $row['therapist_id']	;
											//work out conversion to variables to populate date to charge drop-down
											
											//work out conversion to readable

                                          }//end while


//-------------------------------------------------------------------------------------------------------------

//get xaction id from posts

//using that get all fields from database

//create input boxes with selected data

//show html with filled in text boxes

//click on them to go to a do_modify script which takes user back to updated inside_index_admin page



?>
<html>
<head>
<title></title>
</head>
<body>

<form method="post" action="do_mod_single_accounting_task.php">

<input type="hidden" name = "xaction_id" value="<? echo $xaction_id; ?>">
<input type="hidden" name = "f_name" value="<? echo $f_name; ?>">
<input type="hidden" name = "l_name" value="<? echo $l_name; ?>">
<input type="hidden" name = "date_sold" value="<? echo $date_sold; ?>">
<input type="hidden" name = "client_id" value="<? echo $client_id; ?>">

<table width="100%">
	<tr>
		<td>
		<a href="accounting_tasks.php">&lt<-- Back</a>
		</td>
		<td align="right">
			<input type="submit" value="Update" name="update">
		</td>
	</tr>
</table>
<table border="1" cellspacing="1" cellpadding="2" width="100%" id="table1">
        <tr>
                <td colspan="2" bgcolor="#CCFFCC"><b><font size="5">Edit Task #<? echo $xaction_id; ?></font></b></td>
                <td colspan="2" bgcolor="#CCFFCC">
				<p align="right"><b><font size="5">Task Status</font><font size="4">
				</font></b>
        		<select name="xaction_status" size="1">
        		<option value="">Choose</option>
        		<option value="pending" 
					<? 				
						if ($xaction_status == "pending"){
						  echo "selected";
						}					
					?>
				>Pending</option>
        		<option value="charged" 
					<? 				
						if ($xaction_status == "charged"){
						  echo "selected";
						}					
					?>				
				>Charged</option>
        		<option value="failed" 
					<? 				
						if ($xaction_status == "failed"){
						  echo "selected";
						}					
					?>				
				>Failed</option>
        		<option value="deleted" 
					<? 				
						if (($xaction_status == "deleted") OR ($xaction_status == "delete") ){
						  echo "selected";
						}					
					?>				
				>Delete</option>
        		</select><b><font size="5">&nbsp; </font></b></td>
                <tr>
                <td width="252">Client ID: <? echo "<strong>$client_id</strong>"; ?></td>
                <td width="232" colspan="2"><? echo "<strong>$f_name $l_name</strong>"; ?>
				</td>
                <td>
				<? 
				//Inner while loop to find the description of the primary goal index ----------------------------------
						$table2 = "desc_primary_goal";
                        $sql2 = "SELECT * FROM $table2 WHERE id = $program_id";

                        $result2 = mysql_query($sql2) or die(mysql_error());//

                //CREATE AN ARRAY CALLED $row() FOR EACH RECORD IN RESULT SET
		        while ($row2 = mysql_fetch_array($result2)){
				  
				  $primary_goal = $row2['description'];

           		}//close while loop that assigns values from fetch_array
				
				echo "<strong>$primary_goal</strong>"; 
				
				?>
                </td>
		</tr>
        <tr>
        	<td colspan="4" bgcolor="#EAFFEA">
        		Charge on: 
<? 
//######################## MAKE DATA-SELECTED MONTH SELECT BOXES ##############################################

$month_name = array('','January','February','March','April','May','June','July','August','September','October','November','December');

$charge_month_select="<select name=\"charge_month\">";
      		
for ($i=1; $i<13; $i++)
	{
	  
$charge_month_select .= "<option value=\"$i\"";

	IF ($i == ($charge_date_month_num)){
	  
	  $charge_month_select .= " selected";
	}//end of IF statement

$charge_month_select .= ">{$month_name[$i]}</option>";

	  
	}//end for statement
        		
 $charge_month_select .= "</select>";   
 echo $charge_month_select;    		

//CREATE DATA-SELECTED HTML SELECT BOX FOR CHARGE DATE DAY
$charge_day_select="<select name=\"charge_day\"><option value=\"\">Day</option>";

		//for days 1 through 31...
		for ($i = 1; $i < 32; $i++){
		  
				$charge_day_select .= "<option value=\"$i\"";
				
				if ($i==$charge_date_day){
				  
				  $charge_day_select .=" selected";				  
				}//end inner comparison if statement
								
				$charge_day_select .= ">$i</option>";
		   
		}//end if statement

$charge_day_select .= "</select>";
echo $charge_day_select;


//CREATE DATA-SELECTED HTML SELECT BOX FOR CHARGE DATE YEAR
$charge_year_select="<select name=\"charge_year\">";

		//for 2006 thru 2020...
		for ($i = 2006; $i < 2021; $i++){
		  
				$charge_year_select .= "<option value=\"$i\"";
				
				if ($i==$charge_date_year){
				  
				  $charge_year_select .=" selected";				  
				}//end inner comparison if statement
								
				$charge_year_select .= ">$i</option>";
		   
		}//end if statement
		
$charge_year_select .= "</select>";
echo $charge_year_select;

//--------------------------------------------------------------------------------------------------
?>


        	</td>
        </tr>
        <tr>
                <td width="252" bgcolor="#EAFFEA">
				
				Charge Amount:
        		<input type="text" name="amount" size="14" value="<? echo $amount; ?>"></td>
				<td width="232" colspan="2" bgcolor="#EAFFEA">
				Program Cost:
        		<input type="text" name="program_cost" size="14" value="<? echo $program_cost; ?>"></td>
                <td bgcolor="#EAFFEA">
					Owed:
					
        		<input type="text" name="owed" size="14" value="
				<?
						$owed=$equal_payments_of*$number_of_payments;
						echo "\$$owed";
				?>
				"></td>					
				
				
        </tr>
        <tr>
                <td width="252" bgcolor="#EAFFEA">
				
				# of Payments:
        		<input type="text" name="number_of_payments" size="14" value="<? echo $number_of_payments; ?>"></td>
				<td width="232" colspan="2" bgcolor="#EAFFEA">
				Payment amounts:
        		<input type="text" name="equal_payments_of" size="14" value="<? echo $equal_payments_of; ?>"></td>
                <td bgcolor="#EAFFEA">
					&nbsp;</td>					
				
				
        </tr>
        <tr>
                <td width="252" bgcolor="#EAFFEA">
				
        		Credit Card Type:<br>
        		<select name="cc_type">
        		<option value="">Choose</option>
        		<option value="visa"
					<? 				
						if ($cc_type == "visa"){
						  echo "selected";
						}					
					?>				
				>Visa</option>
        		<option value="mc"
					<? 				
						if ($cc_type == "mc"){
						  echo "selected";
						}					
					?>				
				>Master Card</option>
        		<option value="amex"
					<? 				
						if ($cc_type == "amex"){
						  echo "selected";
						}					
					?>				
				>American Express</option>
        		<option value="discover"
					<? 				
						if ($cc_type == "discover"){
						  echo "selected";
						}					
					?>				
				>Discover</option>
        		</td>
        		
				<td width="232" colspan="2" bgcolor="#EAFFEA">
        			Credit Card Number:<br>
        		<input type="text" name = "cc_number" value="<? echo $cc_number; ?>">
        					
				</td>
                <td bgcolor="#EAFFEA">
        		Expiration Date:<br>
<?  
//######################################## EXPIRATION DATE CHOOSER #########################################      		
$exp_month_select="<select name=\"exp_month\">";
      		
for ($i=1; $i<13; $i++)
	{
	  
$exp_month_select .= "<option value=\"$i\"";

	IF ($i == $cc_expiration_month){
	  
	  $exp_month_select .= " selected";
	}//end of IF statement

$exp_month_select .= ">{$month_name[$i]}</option>";

	  
	}//end for statement
        		
 $exp_month_select .= "</select>";   
 echo $exp_month_select;    		        		
 // -----------------                       Year Picker       		 ----------------------------------
 
 //CREATE DATA-SELECTED HTML SELECT BOX FOR EXP DATE YEAR
$exp_year_select="<select name=\"exp_year\">";

		//for 2006 thru 2020...
		for ($i = 2006; $i < 2021; $i++){
		  
				$exp_year_select .= "<option value=\"$i\"";
				
				if ($i==$cc_expiration_year){
				  
				  $exp_year_select .=" selected";				  
				}//end inner comparison if statement
								
				$exp_year_select .= ">$i</option>";
		   
		}//end if statement
		
$exp_year_select .= "</select>";
echo $exp_year_select;
 
 
?>        		
        		
        		</td>					
				
				
        </tr>
        <tr>
                <td width="252" bgcolor="#EAFFEA">
				
        		Check Routing #:<br>
        		<input type="text" name="ck_routing_number" value="<? echo $ck_routing_number; ?>">
        		</td>
				<td width="232" colspan="2" bgcolor="#EAFFEA">
        		Checking Account #:<br>
        		<input type="text" name="ck_account_number" value="<? echo $ck_account_number; ?>">
        					
				</td>
                <td bgcolor="#EAFFEA">
        		Check #:<br>	
        		<input type="text" name="ck_number" value="<? echo $ck_number; ?>">
        		</td>					
				
				
        </tr>
        <tr>
        	<td colspan="4" bgcolor="#EAFFEA">
        Financial Notes: <input type="text" name="financial_notes" size=90 value="<? echo $notes; ?>">
        	</td>
        </tr>
		<tr>
        	<td colspan="2">
        		Sold on: <? echo $readable_date_sold; ?>
        	</td>
        	<td colspan="2">
        		PC: <?
        		
        		$pc_select_box = "<select name=\"pc_id\">";
        		
        		//Inner while loop to find the name of the pc from the user_id
						$table4 = "auth_users";
                        //$sql4 = "SELECT * FROM $table4 WHERE id = $pc_id";
                        $sql4 = "SELECT * FROM $table4 WHERE member_type='pc' OR member_type='admin' OR member_type='manager' OR member_type='god' ORDER BY f_name";

                        $result4 = mysql_query($sql4) or die(mysql_error());//

                //CREATE AN ARRAY CALLED $row() FOR EACH RECORD IN RESULT SET
		        while ($row4 = mysql_fetch_array($result4)){

                        $f_name = $row4['f_name'];
                        $l_name = $row4['l_name'];                        
                        $pc_name= "$f_name $l_name";
                        
                        $current_pc_id=$row4['id'];
                        
                    $pc_select_box .= "<option value=\"$current_pc_id\"";
                    
                    IF($pc_id==$current_pc_id){
					  
					  $pc_select_box .= " selected";
					}
					
					$pc_select_box .= ">$pc_name</option>";

           }//close while loop that assigns values from fetch_array
        		
        		$pc_select_box .= "</select>";
        		echo $pc_select_box;
        		
        		?>
        		
        	</td>
        	</tr>
        <tr>
                <td width="252">
				
				Appt. Date:<br>
<?
//######################## MAKE DATA-SELECTED APPOINTMENT DATE SELECT BOXES ####################################

$month_name = array('','January','February','March','April','May','June','July','August','September','October','November','December');

$apt_month_select="<select name=\"apt_month\">";
      		
for ($i=1; $i<13; $i++)
	{
	  
$apt_month_select .= "<option value=\"$i\"";

	IF ($i == ($apt_month)){
	  
	  $apt_month_select .= " selected";
	}//end of IF statement

$apt_month_select .= ">{$month_name[$i]}</option>";

	  
	}//end for statement
        		
 $apt_month_select .= "</select>";   
 echo $apt_month_select;    		

//CREATE DATA-SELECTED HTML SELECT BOX FOR CHARGE DATE DAY
$apt_day_select="<select name=\"apt_day\"><option value=\"\">Day</option>";

		//for days 1 through 31...
		for ($i = 1; $i < 32; $i++){
		  
				$apt_day_select .= "<option value=\"$i\"";
				
				if ($i==$apt_day){
				  
				  $apt_day_select .=" selected";				  
				}//end inner comparison if statement
								
				$apt_day_select .= ">$i</option>";
		   
		}//end if statement

$apt_day_select .= "</select>";
echo $apt_day_select;


//CREATE DATA-SELECTED HTML SELECT BOX FOR CHARGE DATE YEAR
$apt_year_select="<select name=\"apt_year\">";

		//for 2006 thru 2020...
		for ($i = 2006; $i < 2021; $i++){
		  
				$apt_year_select .= "<option value=\"$i\"";
				
				if ($i==$apt_year){
				  
				  $apt_year_select .=" selected";				  
				}//end inner comparison if statement
								
				$apt_year_select .= ">$i</option>";
		   
		}//end if statement
		
$apt_year_select .= "</select>";
echo $apt_year_select;

//--------------------------------------------------------------------------------------------------

//echo $readable_apt_date;

?>

				</td>
				<td width="232" colspan="2">
				Appt. Time:<br>
				<? 
				
				// ################################ HOURS ######################################
				$select_apt_hour = "<select name=\"apt_hour\">";
				
				For ($i=8; $i<21; $i++){
				  
				 $non_military_time = $i;
				 
				 	IF ($non_military_time > 12) {
				   
				   		$non_military_time -= 12;
					}//end if statment
				
				
				$select_apt_hour .="<option value = $i";
				
					IF ($non_military_time == $apt_hour){
					  
					  $select_apt_hour .= " selected";
					  
					}
					
				$select_apt_hour .= ">$non_military_time</option>";
				  
				}// end FOR loop
				
				$select_apt_hour .= "</select>";
				
				echo $select_apt_hour;
				
				//---------------------------------------------------------------------------------------
				
				//################################# MINUTES ############################################
				
								$select_apt_minutes = "<select name=\"apt_minutes\">";
				
				For ($i=0; $i<4; $i++){

				$minutes=$i*15;
				$readable_minutes="$minutes";
					IF ($readable_minutes == 0){
					  $readable_minutes = "00";
					}
				
				$select_apt_minutes .="<option value = $minutes";
				
					IF ($readable_minutes == $apt_minute){
					  
					  $select_apt_minutes .= " selected";
					  
					}
					
				$select_apt_minutes .= ">$readable_minutes</option>";
				  
				}// end FOR loop
				
				$select_apt_minutes .= "</select>";
				
				echo "$select_apt_minutes - $apt_hour:$apt_minute $apt_am_pm";
				

				
				?>
				
				</td>
                <td>
					&nbsp;
				</td>					
				
				
        </tr>
        <tr>
                <td colspan="4">Affiliate:<br>
                        <?                        
                    
                        //CREATE SELECT BOX FOR AFFILATE THERAPIST AND THE VALUE IS THEIR ID#


								//connect to database and loop through therapists while building select box
                                $desc_table="affiliates";
                                $select_box_name="affiliate_id";

                                $output="<select name = \"".$select_box_name."\">";
                                $output .= "<option value = \"0\">Choose Therapist</option>";

                                //get all descriptions
                                $query1 = "SELECT * FROM $desc_table WHERE l_name !='' AND membership_status='Affiliate'ORDER BY 'l_name'";
                                $results1 = mysql_query($query1) or die(mysql_error());

                                        //start looping through descriptions one by one
                                        while ($descriptions = mysql_fetch_array($results1)){

                                                  $id = $descriptions['id'];
                                                  $f_name = $descriptions['f_name'];
                                                  $l_name = $descriptions['l_name'];
                                                  $city = $descriptions['address2'];
                                                  $state = $descriptions['address3'];

                                          $output .= "<option value = \"".$id."\"";
												
												IF ($id==$therapist_id){
												  
												  $output .=" selected";
												}

                                          $output .=">$l_name, $f_name -- $city, $state</option>";
                                          }//end while

                                $output .= "</select>";


                        //echo it
                        echo $output;

	
                        ?>
                </td>
        </tr>
        <tr>
        	<td align="center" colspan="4">
        		
        	</td>
        </tr>
</table>

&nbsp;

</form>
</body>
</html>