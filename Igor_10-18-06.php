<?
//###################### SESSION SECURITY CHECK ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

$user_id=$_SESSION[user];

IF ($auth !="ok"){
        header ("Location: http://www.americanhypnosisclinic.com/intranet/authenticate.htm");
        exit;
}

//------------------------------ end security check --------------------------
?>
<html>

<head>

<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>IGOR</title>




 <script language = "JavaScript" type="text/javascript" src="Igor_variables.js";></script>
<script language="javascript">
// Define variables
        var payments=1
        var finance_percent=0
        var current_finance_rate = 0.19
        maxPayments = new Array(1,12,6,6,6,10,3,12,7,1,12,5,1,6,1,6,5,4,4,5,6,5,6,2,5,6,4,3,4,1,1,8,4,20)

//*START OF FUNCTION DEFINITIONS*

//        function play_random_sound() { // silly program to play fun sounds if internet explorer
//                rnd=Math.round(Math.random()*10)
//          document.embeds[rnd].play();

//        }

//###############################################################################################################
//Functions to blur or focus on waiting on check date selection box depending on check box
		function wait_to_charge(){
		  if (document.Igor.wait.checked == false){
			    document.Igor.wait_month.blur();
			    document.Igor.wait_day.blur();
			    document.Igor.wait_year.blur();
			}//end if
		}//end function
		
		function wait_to_charge_month(){
		  if (document.Igor.wait.checked == false){
		    document.Igor.wait_month.blur();
			}//end if  
		}//end function	
		
		function wait_to_charge_day(){
		  if (document.Igor.wait.checked == false){
		    document.Igor.wait_day.blur();
			}//end if
		}//end function	
		
		function wait_to_charge_year(){
		  if (document.Igor.wait.checked == false){
		    document.Igor.wait_year.blur();
			}//end if
		}//end function						

// Function to populate the max number of payments based on index from program_index drop down box
        //program_max_sessions array already defined in variables
        function reset_payments(){
                payments=1;
                document.Igor.num_payments_display.value=1;
                deposit = 100; document.Igor.deposit.value=100.00
                        }

        function populatepayments(programChosen){         // old monthpayments
                maxStr = programChosen.options[programChosen.selectedIndex].value //maxString= old maxStr, programChosen is old programChosen
                if (maxStr !="") {
                        theProgram=parseInt(maxStr) //theProgram is the old theMonth

                        document.Igor.payments.options.length = 1 //changed payments for days
                        for (i=0;i<maxPayments[theProgram];i++){
                                document.Igor.payments.options[i] = new Option(i+1)
                                }
                        }
                }

function define_payments(){ //Called whenever the # of payments is changed
        payments = document.Igor.payments.selectedIndex + 1; //payments is the # of payments from selection
        document.Igor.num_payments_display.value = payments; //display # of payments
        payment_amount = (total-deposit)/payments //(total minus deposit)/number of payments
//        payment_amount = (Math.round(payment_amount*100))/100
//        document.Igor.payment_display.value = payment_amount;
        calculate_program_costs()
        }

function calculate_program_costs()
        {
//Constants and clean up: Convert form information into more readable variables
                        program_index = document.Igor.program_index.value
                        discount = document.Igor.discount.value //The percentage off as a whole number from the input
                        base_price = program_price[program_index ]
                        deposit = document.Igor.deposit.value
                        current_finance_rate = document.Igor.finance_rate_display.value/100
//                        num_payments = document.Igor.num_payments.value //number of payments requested from drop-down


        //Calculations: discount
                        discount_dollars_off=0
                        if (discount>0) discount_dollars_off = Math.round(base_price*discount/100);
                        discounted_price = base_price - discount_dollars_off

        // Calculate Pc's Commissions
        //                pc_commission_35 = Math.round(discounted_price*3.5)/100
                        pc_commission_50 = Math.round(discounted_price*5)/100

        //Print PC's commissions\
        //        document.Igor.pc_commission_35_display.value = pc_commission_35
                document.Igor.pc_commission_50_display.value = pc_commission_50

        //Calculations: financing/payment
                                if (payments > 1) { // 7% finance charge for more than one payment
                                        finance_cost = (Math.round((base_price-deposit)*current_finance_rate*100)/100);
                                        pif_discount = 0 //financing program cost but not the $100 deposit
                                        }
                                else {finance_cost = 0;
                                        pif_discount = (Math.round((base_price-deposit)*current_finance_rate*100)/100);
                                        }

        //Calculations: Total price
                        total = discounted_price + finance_cost;

        //Calculations: payment amount
                payment_amount = (total-deposit)/payments //(total minus deposit of $100)/number of payments

                payment_amount = (Math.round(payment_amount*100))/100 //round it off to 2 digits
                document.Igor.payment_display.value = payment_amount;

        //Calculations: amount saved by paying in full
                        //pif_discount = Math.round((total-100)*current_finance_rate) // what you save by paying in full


        //****????MEDICARE HANDLER
                if (document.Igor.medicare_yesno.value = "medicareYES") {        //If medicare box is checked
                        //????INSERT FUNCTION HERE --> ADD 1 TO NUMBER OF OPTIONS?                                                                //Then we'll go one more payment...
                        }

        //Display: Program price via input boxes on the right
                document.Igor.price_display.value = program_price[program_index] //CORRECT

        //Display: # of sessions in text box:  If more than one display min-max and if equal just display that number
                        if (program_max_sessions[program_index] != program_min_sessions[program_index]) {
                        document.Igor.num_sessions_display.value = program_min_sessions[program_index] + "-" + program_max_sessions[program_index]
                                }
                        else document.Igor.num_sessions_display.value = program_max_sessions[program_index]

        //Display: amount of finance cost
                document.Igor.finance_cost_display.value = finance_cost //CORRECT

        //Display: amount of discount
                document.Igor.discount_display.value = discount_dollars_off; //CORRECT

        //Display total amount in box
                document.Igor.total_display.value = total //CORRECT

        //Display num_payments in box to right
//                document.Igor.num_payments_display.value = payments        //Display monthly payment amount in box to right
//                document.Igor.payment_display.value = payment_amount

        //Display max # of payments allowed in box
                document.Igor.max_payments_display.value = program_max_payments[program_index];        //CORRECT Display max # of payments allowed

        //Display paid in full saved
                document.Igor.pif_discount_display.value = pif_discount

        //Display total savings
                total_savings = discount_dollars_off + pif_discount
                document.Igor.total_saved_display.value = total_savings

//                document.Igor.discount_display.value = parseInt(document.Igor.discount_display.value); //convert these back to integers... I have no idea how they became strings...
//                document.Igor.pif_discount_display.value = parseInt(document.Igor.pif_discount_display.value);
//                document.Igor.total_saved_display.value = parseInt(document.Igor.total_saved_display.value);
//                        if (document.Igor.payments.value = 1) {
//                                document.Igor.total_saved_display.value = document.Igor.discount_display.value + document.Igor.pif_discount_display.value
//                                }
//                        else document.Igor.total_saved_display.value = document.Igor.discount_display.value
                } //END OF THIS BIG BAD-ASS FUNCTION

</script>


<script LANGUAGE='Javascript' SRC='includes/javas.js'></script>

<script  LANGUAGE='Javascript'>

function  validare()
{

        var strMsg = "";

        if ( document.Igor.price_display.value=="0" )   strMsg += "***Please select a Program." + "\r\n";
        if ( ( document.Igor.days.value=="" ) || ( document.Igor.months.value==""  ) )  strMsg += "***Please choose Appt. Date. " + "\r\n";
        if ( !isEmail(document.Igor.email.value) ) strMsg += "***Not valid email address. Please input email address and be sure there are not blank spaces." + "\r\n";
        if ( document.Igor.affiliate_id.value=="0"   )   strMsg += "***Please choose Affiliate." + "\r\n";
        
        if ( document.Igor.client_id.value==""   )   strMsg += "***Please enter client id." + "\r\n";        
        
        if(strMsg != "")
        {
                alert(strMsg);
                return false;
        }
        else
        {
         document.Igor.submit();
        }

}
</script>

<!-- <meta name="Microsoft Border" content="r, default"> -->
</head>

<body onload="document.Igor.program_index.selectedIndex=0" topmargin="1">
<td valign="top">

<table border="0" width="100%" id="table2">
        <tr>
                <td bgcolor="#FFFFFF" bordercolor="#FFFFFF">
                <p align="center">
                <iframe name="I1" src="Igor_Walks_Off.htm" width="127" height="115" scrolling="no">
                Your browser does not support inline frames or is currently configured not to display inline frames.
                </iframe></td>
                <td align="center" bgcolor="#FFFFFF" bordercolor="#FFFFFF"><b><font size="7" color="#000080">Igor</font><font size="5"><br>
</font></b><i><font size="5">The PCs Assistant</font></i></td>
                <td bgcolor="#FFFFFF" bordercolor="#FFFFFF">
                <p align="center"><font size="1">v. 1.6<br>
                (c) Larry Volz<br>
                All Rights Reserved</font></td>
        </tr>
</table>

<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="2">
        <tr>
                <td width="45%" height="119">
<form name="Igor" method="POST" action="do_igor_paperwork.php">
<p>
<b>Select the Program<br>
</b>
<select size="5" name="program_index" onchange ="reset_payments(); populatepayments(this); calculate_program_costs()"> <!-- find out how to manipulate data for "multiple"-->
                <option value="0">Enter a Program</option>
                <option value="1">Alcohol Self Control</option>
                <option value="2">Anger Management </option>
                <option value="3">Childbirth with Less Pain</option>
                <option value="4">Class - CHt </option>
                <option value="5">Class - CHt/MHt </option>
                <option value="6">Class - MHt </option>
                <option value="7">Drug Self Control </option>
                <option value="8">Emotional Self Improvement (depression)</option>
                <option value="9">Fibromyalgia (Single Session)</option>
                <option value="10">Fibromyalgia (Complete Program)</option>
                <option value="11">Gambling</option>
                <option value="12">High Blood Pressure (Single Session)</option>
                <option value="13">High Blood Pressure (Complete Program)</option>
                <option value="14">Irritable Bowel Syndrome (Single Session)</option>
                <option value="15">Irritable Bowel Syndrome (Complete Program)</option>
                <option value="16">Learning Improvement (ADD/ADHD)</option>
                <option value="17">Memory Improvement</option>
                <option value="18">Morning Sickness</option>
                <option value="19">Motivation </option>
                <option value="20">Impulse Control (Obsessive Compulsive)</option>
                <option value="21">Pain Management</option>
                <option value="22">Phobia</option>
                <option value="23">Regression</option>
                <option value="24">Self-Esteem</option>
                <option value="25">Sexual issues</option>
                <option value="26">Sleep</option>
                <option value="27" selected>Smoking</option>
                <option value="28">Stress/Anxiety</option>
                <option value="29">Unusual Per-HOUR Issues (need approval)</option>
                <option value="30">Unusual Per-SESSION Issues (need approval)</option>
                <option value="31">Weight Loss</option>
                <option value="32">Weight Loss mini (4 sess/1 yr)</option>
                <option value="33">Wellness</option>

        </select></p>

                </td>
                <td width="23%" bgcolor="#9999FF" align="left" height="119">
                <p align="right"><b>Program Price $</b><br>
                Est. # of Sessions</td>
                <td bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" align="left" height="119">
                <input name="price_display" value = 0 size="7" style="font-weight: 700; float:left" readonly="readonly" onfocus="this.blur()"><p><input name="num_sessions_display" value = "0" size="7" style="font-weight: 700; float:left" readonly="readonly" onfocus="this.blur()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td width="19%" bgcolor="#C0C0C0" bordercolor="#C0C0C0" bordercolorlight="#C0C0C0" bordercolordark="#C0C0C0" align="center" height="119" colspan="2">
                <font size="2">After Deposit Leaves...</font><b><font size="2">
                </font>&nbsp;</b><input name="num_payments_display" value = "0" size="2        " style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ><b> </b>
                <font size="2">equal monthly payments
                of $</font><input name="payment_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
        </tr>
        <tr>
                <td width="45%">
                <font color="#000080">
                $<input name="deposit" value = "100" size="7" style="font-weight: 700" onchange ="calculate_program_costs()" >
                Deposit <i><font size="2">(min $100)</font></i></font><p>
                &nbsp;

<!--        <select size="1" name="num_payments" onchange ="calculate_program_costs()">
                <option value = "1" selected>1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>
                <option value = "4">4</option>
                <option value = "5">5</option>
                <option value = "6">6</option>
                <option value = "7">7</option>
                <option value = "8">8</option>
                <option value = "9">9</option>
                <option value = "10">10</option>
                <option value = "11">11</option>
                <option value = "12">12</option>
                <option value = "13">13</option>
                <option value = "14">14</option>
                <option value = "15">15</option>
                <option value = "16">16</option>
                <option value = "17">17</option>
                <option value = "18">18</option>
                <option value = "19">19</option>
                <option value = "20">20</option>
                <option value = "21">21</option>
        </select> -->


                <select name="payments" onchange="define_payments()">
        <option>1</option>
</select>&nbsp;


        Number of Payments Planned</td>
                <td width="23%" bgcolor="#9999FF" align="right">Finance Charge <i><font size="2">
                <br>
                (Applied after $100 deposit)</font></i></td>
                <td width="11%" bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF">
                &nbsp;
                <input name="finance_rate_display" value = "19" size="2" style="font-weight: 700" onchange ="calculate_program_costs()"  >%<br>
                $<input name="finance_cost_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
                <td width="19%" align="right" bgcolor="#C0C0C0" bordercolor="#C0C0C0" bordercolorlight="#C0C0C0" bordercolordark="#C0C0C0" colspan="2">
                <p align="center">
                <i>1st payment due at your first appointment.</i></td>
        </tr>
        <tr>
                <td width="45%">
        <i><font color="#000080">
        <font size="2">(Maximum of</font> </i>
                <input name="max_payments_display" value = "0" size="2" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ><i>
                <font size="2">payments allowed for this goal)</font></i></font></td>
                <td align="right" bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF">
                <font color="#000080">
                <b><font size="2">With This Discount You Save</font></b>:&nbsp; </font> </td>
                <td width="11%" bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF">
                <input name="discount_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
                <td width="19%" align="right" bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
                <td width="45%">
        &nbsp;</td>
                <td align="right" bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF">
                <font size="2" color="#000080"><b>Savings From Paying in </b></font>
                <font color="#000080">
                <b><font size="2">Full
                </font> </b></font></td>
                <td width="11%" bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF">
                <input name="pif_discount_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
                <td width="19%" align="right" bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
                <td width="45%" rowspan="2">
                <p>
<!--        <input type="text" name="discount"  size="2" value="0" onchange ="calculate_program_costs()">%&nbsp; Discount -->
        <select size="1" name="discount" onchange ="calculate_program_costs()">
                <option value = "0" selected>No Discount</option>
                <option value = "5">5% Discount</option>
                <option value = "7">7% Discount (Waive Finance Charge)</option>
                <option value = "10">10% Discount</option>
                <option value = "15">15% (need approval)</option>
                <option value = "20">20% (need approval)</option>
</select></td>
                <td align="right" bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" rowspan="2">
                <font color="#000080">
                <b>Total Savings Now</b></font></td>
                <td width="11%" bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" rowspan="2">
                <input name="total_saved_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
                <td align="center" bgcolor="#008000" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" valign="bottom">
                <i><font size="2">Commission </font></i></td>
        </tr>
        <tr>


                <td bgcolor="#008000" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" valign="bottom" width="9%">
                <p align="center">
                <i><font size="2">5%</font></i></td>
        </tr>
        <tr>
                <td width="45%">
        &nbsp;</td>
                <td width="23%" bgcolor="#9999FF" align="right" valign="top">
                <br>
                <b>Total Cost of Program</b></td>
                <td width="11%" bgcolor="#9999FF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF">
                <p align="left">------------<br>
                <input name="total_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>


                <td bgcolor="#008000" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" align="center">
                <input name="pc_commission_50_display" value = "0" size="7" style="font-weight: 700; float:left" readonly="readonly" onfocus="this.blur()" ></td>
        </tr>
        <tr>
                <td width="45%" height="48">
        <input type="checkbox" name="medicare_yesno" value="medicareYES" onchange ="calculate_program_costs()">
&nbsp;Medicare Client? <i><font size="2"><br>
                (Additional payments possible)</font></i></td>
                <td width="23%" align="right" height="48">
                &nbsp;</td>
                <td width="31%" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" colspan="3" height="48">
                &nbsp;</td>
        </tr>
        <tr>
                <td width="761" colspan="5">
<p align="center"><strong><font size="4">
Sale Confirmation Information</strong></font><br>
<font color="#FF0000" size="2">*Igor automatically charges the deposit.&nbsp; If client is paying more than $100 up-front, put that amount in deposit field.</font>
</p>

<table border="1" width="100%" id="table3">
        <tr>
                <td width="252">Client ID#
				<font style="font-size: 9pt" color="#FF0000">(please cut and 
				paste to avoid errors)</font><br>
				<input type="text" name="client_id" size="24" ></td>
                <td width="232">Client First Name:<input type="text" name="f_name" size="24"></td>
                <td>Client Last Name:<br>
                <input type="text" name="l_name" size="25"></tr>
        <tr>
                <td width="252">Client e-mail:<br>
                <input type="text" name="email" size="28"></td>

                </td>
                <td width="232">Appt. Date:<br>

<select name="months">
        <option value="">Month</option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
</select>

<select name="days">
        <option value="">Day</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
</select>

<select name="year">
        <option value="">Year</option>
        <option value=2006 selected>2006</option>
        <option value=2007>2007</option>
        <option value=2008>2008</option>         
        <option value=2009>2009</option>
        <option value=2010>2010</option>
        <option value=2011>2011</option>
        <option value=2012>2012</option>
        <option value=2013>2013</option>
        <option value=2014>2014</option>
        <option value=2015>2015</option>
        <option value=2016>2016</option>
        <option value=2017>2017</option>
        <option value=2018>2018</option>
        <option value=2019>2019</option>
        <option value=2020>2020</option>
</select> </td>
                <td>Appt. Time:<br>
                <!-- <input type="text" name="appointment_time"</td> -->
				
					<select name="appt_hour">
					        <option value="" selected></option>
					        <option value=8>8</option>
					        <option value=9>9</option>
					        <option value=10>10</option>
					        <option value=11>11</option>         
					        <option value=12>12</option>
					        <option value=1>1</option>
					        <option value=2>2</option>
					        <option value=3>3</option>
					        <option value=4>4</option>
					        <option value=5>5</option>
					        <option value=6>6</option>
					        <option value=7>7</option>
					</select>
					<select name="appt_minutes">
					        <option value=0 selected>:00</option>
					        <option value=15>:15</option>
					        <option value=30>:30</option>         
					        <option value=45>:45</option>
					</select>
					<select name="am_pm">
					        <option value="AM" selected>AM</option>
					        <option value="PM">PM</option>
					</select>
				
				</td>
        </tr>
        <tr>
                <td colspan="3">Affiliate:<br>
                        <?
                        //CREATE SELECT BOX FOR AFFILATE THERAPIST AND THE VALUE IS THEIR ID#

                        // get includes
                        include "includes/classes_all_clients.php";

                        //connect to database and loop through therapists while building select box
                        $acIncludes->dbConnect();//connects to db

                                $desc_table="affiliates";
                                $select_box_name="affiliate_id";

                                $output="<select name = \"".$select_box_name."\">";
                                $output .= "<option value = \"0\">Choose Therapist</option>";

                                //get all descriptions
                                $query1 = "SELECT * FROM $desc_table WHERE l_name !='' AND membership_status='Affiliate'ORDER BY 'l_name'";
                                $results1 = mysql_query($query1);// or die(mysql_error())

                                        //start looping through descriptions one by one
                                        while ($descriptions = mysql_fetch_array($results1)){

                                                  $id = $descriptions['id'];
                                                  $f_name = $descriptions['f_name'];
                                                  $l_name = $descriptions['l_name'];
                                                  $city = $descriptions['address2'];
                                                  $state = $descriptions['address3'];

                                                          $output .= "<option value = \"".$id."\"";


                                          $output .=">$l_name, $f_name -- $city, $state</option>";
                                          }//end while

                                $output .= "</select>";


                        //echo it
                        echo $output;

                        ?>
                </td>
        </tr>
        <tr>
        	<td>
        		Credit Card Type:<br>
        		<select name="cc_type">
        		<option value="">Choose</option>
        		<option value="visa">Visa</option>
        		<option value="mc">Master Card</option>
        		<option value="amex">American Express</option>
        		<option value="discover">Discover</option>
        	</td>
        	<td>
        		Credit Card Number:<br>
        		<input type="text" name = "cc_number">
        	</td>
        	<td>
        		Expiration Date:<br>
        		<select name="cc_expiration_month">
        <option value="">Month</option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
</select>

<select name="cc_expiration_year">
        <option value="">Year</option>
        <option value=2006 selected>2006</option>
        <option value=2007>2007</option>
        <option value=2008>2008</option>         
        <option value=2009>2009</option>
        <option value=2010>2010</option>
        <option value=2011>2011</option>
        <option value=2012>2012</option>
        <option value=2013>2013</option>
        <option value=2014>2014</option>
        <option value=2015>2015</option>
        <option value=2016>2016</option>
        <option value=2017>2017</option>
        <option value=2018>2018</option>
        <option value=2019>2019</option>
        <option value=2020>2020</option>
</select>
        	</td>
   
        </tr>
        <tr>
        	<td>
        		Check Routing #:<br>
        		<input type="text" name="ck_routing_number">
        	</td>
        	<td>
        		Checking Account #:<br>
        		<input type="text" name="ck_account_number">
        	</td>
        	<td>
        		Check #:<br>	
        		<input type="text" name="ck_number">
        	</td>  
        </tr>
        <tr>
        	<td colspan="3">
        		<input type="checkbox" name="wait" value="checked" onchange ="wait_to_charge();">Hold charge date until: 
<select name="wait_month" onfocus="wait_to_charge_month();">
        <option value="">Month</option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
</select>

<select name="wait_day" onfocus="wait_to_charge_day();">
        <option value="">Day</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
</select>

<select name="wait_year" onfocus="wait_to_charge_year();">
        <option value="">Year</option>
        <option value=2006 selected>2006</option>
        <option value=2007>2007</option>
        <option value=2008>2008</option>         
        <option value=2009>2009</option>
        <option value=2010>2010</option>
        <option value=2011>2011</option>
        <option value=2012>2012</option>
        <option value=2013>2013</option>
        <option value=2014>2014</option>
        <option value=2015>2015</option>
        <option value=2016>2016</option>
        <option value=2017>2017</option>
        <option value=2018>2018</option>
        <option value=2019>2019</option>
        <option value=2020>2020</option>
</select>
<font color="#FF0000" size="2">(Otherwise deposit is applied today.)</font>
        	</td>
        </tr>
        <tr>
        	<td colspan="3">
        Financial Notes: <input type="text" name="financial_notes" size=90>
        	</td>
        </tr>
        <tr>
			<td colspan="3">
			        <input type="checkbox" name="paperwork_only" value="checked" onchange ="wait_to_charge();">Send 
					paperwork only - do not task Meredith/Charge account
			</td>   
		</tr>     
</table>
<p align="center">

        </p>
<p align="center">
<input type="button" onclick='validare();'  value="Create Paperwork" name="submit_button">
<input type="reset" value="Start Igor Over Again" name="B2"></p>

<p align="center">
&nbsp;</td>
        </tr>
        </table>
        &nbsp;


<p>

<!--        <input type="button" value="CLICK HERE to Calculate" onClick="display_program_costs();"></p> -->

        &nbsp;<!-- <script language="javascript">

        ind=document.Igor.Program.selectedIndex;
        program_index = document.Igor.Program.options[ind].value;
                document.write("<font color='#000080'><h1>"+program_index+"</h1></font>");

</script> -->



<input type="hidden" name="pc_id" value="<? echo $user_id; ?>">


</form>
</body>

</html>