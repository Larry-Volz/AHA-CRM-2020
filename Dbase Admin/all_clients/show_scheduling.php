<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do basic security check
$ahcDB->securityCheckBasic();

//CONNECT to DB
$ahcDB->dbConnect();

//########################################################################################
//# APPOINTMENTS STRATEGY																 #
//#																						 #
//# FIELDS:  id(unique)	 			client_id	 				affiliate_id			 #
//# apt_type(int - related)			appointment_number									 #
//# goal(integer)					start_time					end_time				 #
//# recurring(yes/no)				recurring_interval(int)	recurring_end(int)		 	 #
//#																						 #
//# RELATED TABLE: desc_apt_type 														 #
//# id and description(open, initial, return, regression, personal, free_form)			 #
//########################################################################################
//#                                                                                      #
//# DOCUMENTS:  show_scheduling_menu (can pick several therapists to view)				 #
//# 			view_multiple_scheds, show_modappt, do_modappt (pc's do)				 #
//#				show_addappt, do_addappt, show_recurappt, do_recurappt (all admin)		 #
//#																						 #
//#																						 #
//# FUNCTIONS:  displayOneAffilDay(), displayOneAffilWeek(), displayOneAffilMonth()		 #
//#																						 #
//########################################################################################

?>
<html>
<head>
<title>AHC Scheduling Menu</title>
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
</head>
<body onload="FP_preloadImgs(/*url*/'../../images/buttonB.jpg', /*url*/'../../images/buttonA.jpg', /*url*/'../../images/button17.jpg', /*url*/'../../images/button16.jpg', /*url*/'../../images/button1E.jpg', /*url*/'../../images/button1F.jpg', /*url*/'../../images/button30.jpg', /*url*/'../../images/button31.jpg')">
<table border="0" width="100%" id="table1">
	<tr>
		<td width="106"><a href="show_single_client.php">
		<img border="0" id="img5" src="../../images/button1D.jpg" height="20" width="100" alt="Client View" fp-style="fp-btn: Jewel 1" fp-title="Client View" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../images/button1E.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../images/button1D.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../images/button1F.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../images/button1E.jpg')"></a></td>
		<td width="105"><a href="show_financial.php">
		<img border="0" id="img1" src="../../images/button9.jpg" height="20" width="100" alt="Financial" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/buttonA.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/button9.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/buttonB.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/buttonA.jpg')" fp-style="fp-btn: Jewel 1; fp-orig: 0" fp-title="Financial"></a></td>
		<td width="100"><a href="show_modclient.php">
		<img border="0" id="img3" src="../../images/buttonF.jpg" height="20" width="100" alt="Modify" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/button16.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/buttonF.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/button17.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/button16.jpg')" fp-style="fp-btn: Jewel 1; fp-orig: 0" fp-title="Modify"></a></td>
		<td><a href="show_allclients_main.php">
		<img border="0" id="img6" src="../../images/button2F.jpg" height="20" width="100" alt="Home" onmouseover="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../images/button30.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../images/button2F.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../images/button31.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../images/button30.jpg')" fp-style="fp-btn: Jewel 1" fp-title="Home"></a></td>
	</tr>
</table>
<p><font size="5">Client Scheduling</font><br><hr></p>

</body>
</html>