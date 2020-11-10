<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>AHC Program Financial Planning</title>

 <script language = "JavaScript" type="text/javascript" src="Igor_variables.js";></script> 
<script language="javascript"> 
// Define variables
	var payments=1
	var finance_percent=0
	var current_finance_rate = 0.19
	maxPayments = new Array(1,12,6,6,6,10,3,12,7,1,12,5,1,6,1,6,5,4,4,5,6,5,6,2,5,6,4,3,4,1,1,8,20)

//*START OF FUNCTION DEFINITIONS*

//	function play_random_sound() { // silly program to play fun sounds if internet explorer
//		rnd=Math.round(Math.random()*10)
//	  document.embeds[rnd].play();

//	}

// Function to populate the max number of payments based on index from program_index drop down box
	//program_max_sessions array already defined in variables
	function reset_payments(){
		payments=1;
		document.Igor.num_payments_display.value=1;
		deposit = 100; document.Igor.deposit.value=100.00
			}
	
	function populatepayments(programChosen){ 	// old monthpayments
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
//	payment_amount = (Math.round(payment_amount*100))/100
//	document.Igor.payment_display.value = payment_amount;
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
//			num_payments = document.Igor.num_payments.value //number of payments requested from drop-down

		
	//Calculations: discount	
			discount_dollars_off=0
			if (discount>0) discount_dollars_off = Math.round(base_price*discount/100);
			discounted_price = base_price - discount_dollars_off

	// Calculate Pc's Commissions
	//		pc_commission_35 = Math.round(discounted_price*3.5)/100
			pc_commission_50 = Math.round(discounted_price*5)/100	
			
	//Print PC's commissions\
	//	document.Igor.pc_commission_35_display.value = pc_commission_35
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
		if (document.Igor.medicare_yesno.value = "medicareYES") {	//If medicare box is checked
			//????INSERT FUNCTION HERE --> ADD 1 TO NUMBER OF OPTIONS?								//Then we'll go one more payment...
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
//		document.Igor.num_payments_display.value = payments	//Display monthly payment amount in box to right
//		document.Igor.payment_display.value = payment_amount 

	//Display max # of payments allowed in box
		document.Igor.max_payments_display.value = program_max_payments[program_index];	//CORRECT Display max # of payments allowed

	//Display paid in full saved
		document.Igor.pif_discount_display.value = pif_discount 
		
	//Display total savings
		total_savings = discount_dollars_off + pif_discount 
		document.Igor.total_saved_display.value = total_savings

//		document.Igor.discount_display.value = parseInt(document.Igor.discount_display.value); //convert these back to integers... I have no idea how they became strings...
//		document.Igor.pif_discount_display.value = parseInt(document.Igor.pif_discount_display.value);
//		document.Igor.total_saved_display.value = parseInt(document.Igor.total_saved_display.value);
//			if (document.Igor.payments.value = 1) {
//				document.Igor.total_saved_display.value = document.Igor.discount_display.value + document.Igor.pif_discount_display.value
//				}
//			else document.Igor.total_saved_display.value = document.Igor.discount_display.value
		} //END OF THIS BIG BAD-ASS FUNCTION


function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}

function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
}

function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}
</script>



<meta name="Microsoft Border" content="r, default">
</head>

<body onload="FP_preloadImgs(/*url*/'../../images/buttonE.jpg', /*url*/'../../images/buttonD.jpg', /*url*/'../../images/button17.jpg', /*url*/'../../images/button16.jpg', /*url*/'../../images/button1A1.jpg', /*url*/'../../images/button1B.jpg', /*url*/'../../images/button2D.jpg', /*url*/'../../images/button2E.jpg'); document.Igor.program_index.selectedIndex=0" topmargin="1" bgcolor="#FFFFFF"><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<table border="0" width="100%" id="table5">
	<tr>
		<td width="106"><a href="show_single_client.php">
		<img border="0" id="img5" src="../../images/button23.jpg" height="20" width="100" alt="Client View" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../images/button1A1.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../images/button23.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../images/button1B.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../images/button1A1.jpg')" fp-style="fp-btn: Jewel 1" fp-title="Client View"></a></td>
		<td width="105"><a href="show_scheduling.php">
		<img border="0" id="img2" src="../../images/buttonC.jpg" height="20" width="100" alt="Scheduling" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/buttonD.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/buttonC.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/buttonE.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/buttonD.jpg')" fp-style="fp-btn: Jewel 1; fp-orig: 0" fp-title="Scheduling"></a></td>
		<td width="100"><a href="show_modclient.php">
		<img border="0" id="img3" src="../../images/buttonF.jpg" height="20" width="100" alt="Modify" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/button16.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/buttonF.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/button17.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/button16.jpg')" fp-style="fp-btn: Jewel 1; fp-orig: 0" fp-title="Modify"></a></td>
		<td><a href="show_allclients_main.php">
		<img border="0" id="img6" src="../../images/button2C.jpg" height="20" width="100" alt="Home" onmouseover="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../images/button2D.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../images/button2C.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../images/button2E.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../images/button2D.jpg')" fp-style="fp-btn: Jewel 1" fp-title="Home"></a></td>
	</tr>
</table>
<p><font size="5">Financial Worksheet</font><br><hr></p>

<form name="Igor">
<input type = "hidden" name="num_payments_display" value = "0" size="2	" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" >

<p style="margin-top: 0; margin-bottom: 0">Working with: <br>
&nbsp;</p>

<table border="0" width="94%" id="table1" cellspacing="0" cellpadding="2">
	<tr>
		<td width="36%" rowspan="7">
<div align="center">
<table border="1" width="98%" id="table3" height="345">
	<tr>
		<td width="234" height="27" bgcolor="#9999FF" align="center">
		<p align="center" valign="middle"><b><font color="#FFFFFF">Programs Purchased</font></b></td>
	</tr>
	<tr>
		<td width="234" height="310" align="center" valign="top">
		<table border="0" width="99%" id="table4" height="305" bgcolor="#FFFFFF">
			<tr>
				<td>
				<!--webbot bot="PurpleText" PREVIEW="PUT PHP IN HERE TO GET $_POST['VARIABLES'] AND ECHO NAME OF PROGRAM/PRICE IN TEXT INPUT BOXES.  THEY SHOULD BE RE-SETABLE AND ADD INTO NEW PROGRAM TOTALS WITHIN DO_IGOR_INTERMEDIATE." -->&nbsp;
<?				
	//Get all variables	via a post (from self)			
				
	//if they aren't there then print "None"
	
	//if they are - then USE TEXT INPUT BOXES to echo program title and price of each (so reset will work)
	

			
?>				
<input name="test" value="">					
				
				
	
		
				</td>
			</tr>
			<tr>
				<td height="45">
				<p align="center">
				&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
		</div>
		</td>
		<td bgcolor="#CCCCFF" align="left" colspan="2" style="border-style: outset; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"> 
		<p align="center">
<b>Select the Program<br>
</b>
<select size="4" name="program_index" onchange ="reset_payments(); populatepayments(this); calculate_program_costs()"> <!-- find out how to manipulate data for "multiple"-->
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
		<option value="32">Wellness</option>

	</select><br>
<span style="font-size: 9pt">&nbsp;</span><input name="num_sessions_display" value = "0" size="7" style="font-weight: 700 readonly="readonly" onfocus="this.blur()" ><span style="font-size: 9pt"> 
Sessions on Ave. </span><font color="#000080">&nbsp;</font></td>
		<td bgcolor="#CCCCFF" align="center" colspan="2" style="border-style: outset; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"> 
		<p><b>Price $<br>
		</b><input name="price_display" value = 0 size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()"><p>
		<i> 
		<font style="font-size: 9pt">Max payments </font></i>
		<font color="#000080">
		<input name="max_payments_display" value = "0" size="2" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ><i> 
		</i></font></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" align="left" width="18%"> 
		&nbsp;</td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" align="left" colspan="2"> 
		 
		&nbsp;</td>
		<td bgcolor="#CCCCFF" bordercolor="#C0C0C0" bordercolorlight="#C0C0C0" bordercolordark="#C0C0C0" align="center" width="10%"> 
		&nbsp;</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" align="left" width="18%"> 
		<p align="center">Deposit<font color="#000080"><br>
		$<input name="deposit" value = "100" size="7" style="font-weight: 700" onchange ="calculate_program_costs()" ><i><font size="2"><br>
		&nbsp;</font></i></font></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" align="left" colspan="2"> 
		 
		Split into<br>
	
	
		<select name="payments" onchange="define_payments()">
	<option>1</option>
</select><font size="2"> 
		<!--webbot bot="PurpleText" PREVIEW="CHANGE THIS TO LESS PAYMENTS FOR DRUG ADDICTION!!!!" -->Monthly 
		payments of<br>
		</font><input name="payment_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" >&nbsp;</td>
		<td bgcolor="#CCCCFF" bordercolor="#C0C0C0" bordercolorlight="#C0C0C0" bordercolordark="#C0C0C0" align="center" width="10%"> 
		<p align="center">
		<i><font size="2">1st payment due at first appointment.</font></i>&nbsp;</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" align="left" width="18%"> 
		<p>&nbsp;</td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" align="left" colspan="2"> 
		&nbsp;</td>
		<td bgcolor="#CCCCFF" bordercolor="#C0C0C0" bordercolorlight="#C0C0C0" bordercolordark="#C0C0C0" align="center" width="10%"> 
		&nbsp;</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" align="right" width="18%" style="border-style: inset; border-width: 1px">Finance Charge <i><font size="2">
		<br>
		(Applied after $100 deposit)</font></i></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="17%" style="border-style: inset; border-width: 1px">
		&nbsp;
		<input name="finance_rate_display" value = "19" size="2" style="font-weight: 700" onchange ="calculate_program_costs()"  >%<br>
		$<input name="finance_cost_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="10%">
		&nbsp;</td>
		<td align="right" bgcolor="#CCCCFF" bordercolor="#C0C0C0" bordercolorlight="#C0C0C0" bordercolordark="#C0C0C0" width="10%">
		&nbsp;</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="18%" style="border-style: inset; border-width: 1px">
		<font size="2" color="#000080"><b>Discount Saves</b></font></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="17%" style="border-style: inset; border-width: 1px">
		$<input name="discount_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="10%">
		&nbsp;</td>
		<td align="right" bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="10%">
		&nbsp;</td>
	</tr>
	<tr>
		<td align="right" bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="18%" style="border-style: inset; border-width: 1px">
		<font size="2" color="#000080"><b>Pay in </b></font>
		<font color="#000080">
		<b><font size="2">Full</font></b></font><font size="2" color="#000080"><b> Saves</b></font><font color="#000080"><b><font size="2">
		</font> </b></font></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="17%" style="border-style: inset; border-width: 1px">
		$<input name="pif_discount_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="10%">
		&nbsp;</td>
		<td align="right" bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="10%">
		&nbsp;</td>
	</tr>
	<tr>
		<td width="36%">
		<!--	<input type="text" name="discount"  size="2" value="0" onchange ="calculate_program_costs()">%&nbsp; Discount -->
		Discounts<br>
	<select size="1" name="discount" onchange ="calculate_program_costs()"> 
		<option value = "0" selected>No Discount</option>
		<option value = "5">5% Discount</option>
		<option value = "7">7% Discount (Waive Finance Charge)</option>
		<option value = "10">10% Discount</option>
		<option value = "15">15% (need approval)</option>
		<option value = "20">20% (need approval)</option>
</select></td>
		<td align="right" bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="18%" style="border-style: inset; border-width: 1px">
		<font color="#000080">
		<b>Total Savings </b></font></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="17%" style="border-style: inset; border-width: 1px">
		$<input name="total_saved_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" width="10%">
		&nbsp;</td>
		<td align="center" bgcolor="#CCFFCC" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" rowspan="2" width="10%">
		<i><font size="2">Commission <br>
		</font></i>
		<input name="pc_commission_50_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
	</tr>
	<tr>
		<td width="36%">
	<input type="checkbox" name="medicare_yesno" value="medicareYES" onchange ="calculate_program_costs()">
&nbsp;Medicare Client? <i><font size="2"><br>
		(Additional payments possible)</font></i></td>
		<td bgcolor="#CCCCFF" align="right" valign="top" width="18%" style="border-style: inset; border-width: 1px">
		<b>Total Cost </b></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" align="center" valign="top" width="17%" style="border-style: inset; border-width: 1px">
		<p align="left">
		$<input name="total_display" value = "0" size="7" style="font-weight: 700" readonly="readonly" onfocus="this.blur()" ></td>
		<td bgcolor="#CCCCFF" bordercolor="#9999FF" bordercolorlight="#9999FF" bordercolordark="#9999FF" align="center" valign="top" width="10%">
		&nbsp;</td>
	</tr>
	</table>
	<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
	<table width="100%">
		<tr>
			<td valign="top" align="center" width="260">
			<input type="submit" value="Add to Cart" name="add_to_cart">
			
			</td>
			<td valign="top" align="center" width="268">
				<input type="reset" value="Reset All" name="reset"></td>
			<td align="center">
			</form>
			<form>
			<input type="button" value="Purchase" name="purchase">

<!--webbot bot="PurpleText" PREVIEW="PUT JAVASCRIPT HERE TO POPULATE HIDDEN DUPLICATE FIELDS FOR THIS FORM!" -->		<!-- Do javascript here to echo all input fields here in this form hidden!-->
		
			</form>
			</td>
		</tr>
</table>

	
	<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>