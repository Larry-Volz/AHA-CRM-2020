<?

//################################## INCLUDE FILES ##############################################

//include file for log entry
include_once("../../ahcDatabase_class.php");

//include file for variables and security
require_once('../../includes/classes_all_clients.php');


//################################ security #####################################################

//open database
$acIncludes->dbConnect();

//basic security check
$acIncludes->securityCheckBasic();


//############################## DO LOG ENTRY ##############################################

session_start();//IF NOT ALREADY STARTED

//do log entry
$now=time();
$list_id=31; //code for 'view single client' 

//DO LOG ENTRY
$ahcDB->logEntry($list_id);

//------------------------------ END LOG ENTRY --------------------------------------------------



//################################ get client's variables #######################################

//get all client's variables
$client_id=$_GET['client_id'];

//$id=$client_id;

//CALL FUNCTION TO GET BACK ALL VARIABLES AS GLOBALS
$client=$acIncludes->getAllVariables($client_id);



//WRITE CLIENT TO SESSION 
//$acIncludes->writeClientToSession($client_id,$f_name,$l_name);


//=========================================== END PHP ===========================================
//===============================================================================================
?>
<html>
<head>

<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>New Page 1</title>
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">

<script language="JavaScript">
<!--
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
// -->
</script>
<meta name="Microsoft Border" content="r, default">
</head>

<body onload="FP_preloadImgs(/*url*/'../../images/buttonA.jpg', /*url*/'../../images/buttonB.jpg', /*url*/'../../images/buttonD.jpg', /*url*/'../../images/buttonE.jpg', /*url*/'../../images/button16.jpg', /*url*/'../../images/button17.jpg', /*url*/'../../images/button20.jpg', /*url*/'../../images/button21.jpg')"><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">



<td valign="top">


<table border="0" width="100%" id="table1">
	<tr>
		<td width="106"><a href="show_financial.php">
		<img border="0" id="img1" src="../../images/button9.jpg" height="20" width="100" alt="Financial" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/buttonA.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/button9.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/buttonB.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/buttonA.jpg')" fp-style="fp-btn: Jewel 1" fp-title="Financial"></a></td>
		<td width="105"><a href="show_scheduling.php">
		<img border="0" id="img2" src="../../images/buttonC.jpg" height="20" width="100" alt="Scheduling" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/buttonD.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/buttonC.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/buttonE.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/buttonD.jpg')" fp-style="fp-btn: Jewel 1" fp-title="Scheduling"></a></td>
		<td width="100"><a href="show_modclient.php?client_id=<? echo "$client_id"; ?>" ?>">
		<img border="0" id="img3" src="../../images/buttonF.jpg" height="20" width="100" alt="Modify" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/button16.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/buttonF.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/button17.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/button16.jpg')" fp-style="fp-btn: Jewel 1" fp-title="Modify"></a></td>
		<td><a href="show_allclients_main.php">
		<img border="0" id="img4" src="../../images/button22.jpg" height="20" width="100" alt="Home" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/button20.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/button22.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/button21.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/button20.jpg')" fp-style="fp-btn: Jewel 1" fp-title="Home"></a></td>
	</tr>
</table>

<!-- ########################################## END BUTTONS ################################################ -->
<br />

<table border="0" width="722">
	<tr>
		<td align="left">
			<font size="5">View Client</font><br>
		</td>
		<td align="right">

<?

IF ($action !="Action to take at appointment"){
  echo "<strong><font color=\"red\">$action &nbsp;</strong></font>";
}

IF ($client_flags !="Client Flags"){
	  echo "<strong><font color=\"red\"><blink>$client_flags &nbsp;</blink></strong></font>";  
}

?>

			
		</td>
	</tr>
</table>			
			<hr>

<!-- ########################################## START OF MAIN OUTPUT ######################################### -->


<table id="table8">
	<tr>
		<td>
			<font size=4><strong>
				<? echo "$client_f_name &nbsp;";
					if ($client_middle_initial !=""){
					  echo "$client_middle_initial. &nbsp;";
					}  
				echo "$client_l_name"; 
				?>
			</font></strong>
		</td>
	</tr>
</table>

<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>

<table cellspacing=0 cellpadding=3 width="722" border="0" id="table9" bgcolor="#FFFFFF">
<tr>
	<td width="25%" rowspan="2">

		<p style="margin-top: 2px; margin-bottom: 2px" align="right"><font face="Arial">Phone (Home):<br>
		Phone (Work):&nbsp; 
		</font> </p>
		<p style="margin-top: 2px; margin-bottom: 2px" align="right"><font face="Arial">Ext:<br>
		Mobile/Other:&nbsp;
		</font> </p>
	</td>

	<td rowspan="2">

		<font face="Arial" size="3">
		<? echo " $prim_tel"; ?><br>
		</font>

		<font size="3" face="Arial">
		<font face="Arial">
		<? echo " $sec_tel"; ?></font><font size="2" face="Arial"><br>
		</font><font face="Arial">
		<? echo " $phone_ext"; ?></font><font size="2" face="Arial"><br>
		</font><font face="Arial">
		<? echo " $mob_tel"; ?></font></font>
	</td>

	<td width="159" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px outset #CCCCFF; ">
		<p align="left">Id#: <? echo " $client_id"; ?>
	</td>

	<td width="97" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px outset #CCCCFF; ">
		<p style="margin-top: 2px; margin-bottom: 2px; text-align:right"><font face="Arial">
		<font size="2">Sales Category</font>: </font></p>
	</td>

	<td width="106" bgcolor="#CCCCFF" height="44" align="center" style="border: 1px outset #CCCCFF; ">
		<p align="left">
		<font face="Arial" size="3">
		<? echo " $sales_category"; ?></font>
	</td>
</tr>

<tr>

<td bgcolor="#CCCCFF" align="center" colspan="2" height="78" style="border-style: outset; border-width: 1px">
		<p style="margin-top: 2px; margin-bottom: 2px" align="right"><font face="Arial">
		<strong style="font-weight: 400">
		<font size="2">
			&nbsp; Sales Stage: &nbsp;
		</font></p>
		<p style="margin-top: 2px; margin-bottom: 2px" align="right"><font face="Arial">
		<font size="2">Sales Contact Next</font><strong style="font-weight: 400"><font size="2">:&nbsp;</font><br>&nbsp;&nbsp;&nbsp;
		</strong>
		

		<br>
		</font><strong style="font-weight: 400"><font size="2">Record Mgr/Program Counselor:</font>&nbsp;
		</strong>
		<font face="Arial" size="3"></p>
	</td>

	<td bgcolor="#CCCCFF" align="left" colspan="2" height="78" style="border-style: outset; border-width: 1px">
		&nbsp;
		<font face="Arial" size="2">
			<? echo "$sales_stage"; ?>		

			<?
			$readableContactNext=date('h\:i a \o\n n\-j\-y',$contact_next);
			echo "$readableContactNext <br>";
			?>

		<? 
		//RIDICULOUS REDUNDANCY - BUT GIT'ER DONE!
		//CALL FUNCTION TO GET BACK ALL VARIABLES AS GLOBALS
		$client=$acIncludes->getAllVariables($client_id);
		
		echo "$rec_man_f_name $rec_man_l_name"; ?>		
		
		</font>
		
		</td>
</tr>

<tr>
	<td width="328" colspan="2" valign="top">
<font face="Arial" size="3">
		<? echo "$address1 <br>$address2, $address3 $postcode"; ?></font>
	</td>
	
	<td bgcolor="#CCCCFF" align="center" colspan="3" style="border-style: outset; border-width: 1px">
		<p style="margin-top: 2px; margin-bottom: 2px; text-align:right"><font face="Arial">
		<font size="2">Date Sold:</font><strong style="font-weight: 400">&nbsp;
		</strong>
		
		<font size="2">
		
			<?
			$searchString="Client";
			if (strpos($sales_category,$searchString)=== true){
			$readableDateSold=date('h\:i a \o\n n\-j\-y',$date_sold);
			}else{
			  $readableDateSold="N/A";
			}
			echo "$readableDateSold";
			?>
		
		</font></font></p>
	</td>

</tr>

<tr>
	<td colspan="3" valign="top">
	
<tr>
	<td>

	</td>
	<td>
	</td>
</tr>
	<td width="300">	
		<p style="margin-top: 2px; margin-bottom: 2px">
		<font face="Arial"><font size="3">e-mail:
		
			<? echo "&nbsp;$email"; ?>
			
		</p>
		<br>
		</font>

	</td>
	<td>
	</td>
	<!--  style="border-style: outset; border-width: 1px" -->
	<td bgcolor="#CCCCFF" colspan="3" align="left" valign="top" width="300">
		<font face="Arial">
		<font size="3">Referred By:<br> 
		</font><i>
		<font size="2">
		
			<? echo "$referred_by"; ?></p>
			
		<p><i><font size="3">Details</font></i><br>
		<font size="2">
		
			<? echo "$referred_by_details"; ?>
		
		</font>
	</td>

</tr>

</table></table>



<table cellspacing=0 cellpadding=3 width="722" border="0" id="table11" style="border-style: outset; border-width: 1px">

<tr>
<td width="328" valign="top" bgcolor="#CCCCFF" rowspan="2">
<p style="margin-top: 2px; margin-bottom: 2px" align="left"><font face="Arial">
<font size="3">Primary Goal 
of Therapy:</font><br>
<font size="2">

	<? echo "$primary_goal<br><br>"; ?>

</font></font><p style="margin-top: 2px; margin-bottom: 2px" align="left"><font size="3" face="Arial">Secondary 
Goal (If applicable):</font><br>
<? echo "$secondary_goal<br><br>"; ?>
<br><BR>

<!-- ################################### INSERT SEC GOAL HERE!!!!!????????????????????????????????????????????????? -->

<p style="margin-top: 2px; margin-bottom: 2px" align="left"><font size="3" face="Arial">
Primary Motivations to Change:<br></font>
<font size="2" face="Arial">

	<? echo "$motivation<br><br>"; ?>

</font><p style="margin-top: 2px; margin-bottom: 2px; text-align:left">
<font size="3">Why Us?</font><br>
<font size="2" face="Arial">

	<? echo "$why_us<br>"; ?>

</font><p style="margin-top: 2px; margin-bottom: 2px" align="left">
&nbsp;<p style="margin-top: 2px; margin-bottom: 2px" align="left">
&nbsp;<p style="margin-top: 2px; margin-bottom: 2px; text-align:left">
</td>

<td width="378" valign="top" bgcolor="#FFFFFF" rowspan="2">
		<p style="margin-top: 2px; margin-bottom: 2px" align="center">
<font face="Arial"><strong style="font-weight: 400"><font size="2">Additional Information:</font></strong><font size="2"><br />
</font><font face="Arial" size="3">

			<textarea name="additional_information" cols=41 rows=5 wrap=virtual>
			</textarea></font></font><p style="margin-top: 2px; margin-bottom: 2px; text-align:center">

&nbsp;<p style="margin-top: 2px; margin-bottom: 2px" align="center">
<font face="Arial" size="3"><strong>Most Recent Contacts: </strong></font>
<p style="margin-top: 2px; margin-bottom: 2px" align="center">
<font face="Arial" size="2">

	<? echo "$contact_log"; ?>
	
</font>&nbsp;</td>

</tr>

</table>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>