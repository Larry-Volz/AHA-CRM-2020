<?
//########## IF NOT AN AUTHORIZED MEMBER ##############################
if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
}
//########## IF NOT HIGH ENOUGH PERMISSION FOR THIS PARTICULAR PAGE #################
$permission = $_COOKIE[permission];

if (($permission !="god")&&($permission !="pc")&&($permission !="admin")){ 
	header ("Location: http://www.americanhypnosisclinic.com/intranet/Dbase Admin/User Authentication/no_permission.htm");
	exit;	
}
?>
	<HTML>

	<HEAD>

	<title>The American Hypnosis Clinic Secure Order Form</title>

	<meta name="Microsoft Border" content="r, default">
</HEAD>

	<BODY BGCOLOR="#FFFFFF"><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<FORM Method='POST' Action='https://secure.paymentclearing.com/cgi-bin/mas/split.cgi' AUTOCOMPLETE = 'off'>	<center>
	<BR>
	<H2>The American Hypnosis Clinic<BR> <!img src="https://secure.paymentclearing.com/images/securekey.gif" border=0> Secure Order Form  <!img src="https://secure.paymentclearing.com/images/securekey.gif" border=0></H2><P>

<!-- ============================ PASSBACK COMMANDS AND VARIABLES =============================== -->
<input type="hidden" name="ret_mode" value="post">
<input type="hidden" name="post_back_on_error" value="1">

<!-- CREDIT CARD TRANSACTION INFORMATION -->
<INPUT type="hidden" name="lookup" value="total">
<INPUT type="hidden" name="lookup" value="authcode">
<INPUT type="hidden" name="lookup" value="xid">
<INPUT type="hidden" name="lookup" value="avs_response">
<INPUT type="hidden" name="lookup" value="cc_last_four">
<INPUT type="hidden" name="lookup" value="cc_name">
<INPUT type="hidden" name="lookup" value="cvv2_response">
<INPUT type="hidden" name="lookup" value="trans_type">
<INPUT type="hidden" name="lookup" value="when">
<INPUT type="hidden" name="lookup" value="status">
<INPUT type="hidden" name="lookup" value="error_message">

<!-- RECURRING INFO -->
<!-- MIGHT NEED 1-DESC, 1-COST, 1-X, 2-DESC, ETC... -->

<INPUT type="hidden" name="lookup" value="recipe_name">
<INPUT type="hidden" name="lookup" value="recipe_every">
<INPUT type="hidden" name="lookup" value="recipe_period">
<INPUT type="hidden" name="lookup" value="orig_xid">
<INPUT type="hidden" name="lookup" value="rem_reps">
<INPUT type="hidden" name="lookup" value="start_date">
<INPUT type="hidden" name="lookup" value="recur_desc">
<INPUT type="hidden" name="lookup" value="recur_total">

<!-- CONTACT INFO -->
<INPUT type="hidden" name="lookup" value="first_name">
<INPUT type="hidden" name="lookup" value="last_name">
<INPUT type="hidden" name="lookup" value="address">
<INPUT type="hidden" name="lookup" value="city">
<INPUT type="hidden" name="lookup" value="state">
<INPUT type="hidden" name="lookup" value="zip">
<INPUT type="hidden" name="lookup" value="ctry">
<INPUT type="hidden" name="lookup" value="email">


<!-- shipping info - unused? -->
<INPUT type="hidden" name="lookup" value="saddr">
<INPUT type="hidden" name="lookup" value="scity">
<INPUT type="hidden" name="lookup" value="sctry">
<INPUT type="hidden" name="lookup" value="sfname">
<INPUT type="hidden" name="lookup" value="slname">
<INPUT type="hidden" name="lookup" value="sstate">
<INPUT type="hidden" name="lookup" value="szip">


<!-- ============================ END PASSBACK VARIABLES =============================== -->


    <input type='hidden' name='acceptcards' value="1">
    <input type='hidden' name='acceptchecks' value="1">
    <input type='hidden' name='accepteft' value="1">

    <input type='hidden' name='ameximage' value="1">
    <input type='hidden' name='cost1' value="">
    <input type='hidden' name='cost2' value="">
    <input type='hidden' name='cost3' value="">
    <input type='hidden' name='desc1' value="">
    <input type='hidden' name='desc2' value="">
    <input type='hidden' name='desc3' value="">
    <input type='hidden' name='discimage' value="1">
    <input type='hidden' name='formtype' value="1">

    <input type='hidden' name='home_page' value="http://www.americanhypnosisclinic.com">
    <input type='hidden' name='items' value="3">
    <input type='hidden' name='layout1' value="3">
    <input type='hidden' name='layout2' value="3">
    <input type='hidden' name='layout3' value="3">
    <input type='hidden' name='mcimage' value="1">
    <input type='hidden' name='mername' value="The American Hypnosis Clinic">
    <input type='hidden' name='ret_addr' value="http://www.americanhypnosisclinic.com/intranet/Dbase Admin/financial/do_programfinancial.php">
    <input type='hidden' name='vendor_id' value="57716">

    <input type='hidden' name='visaimage' value="1">
	
	<table width=590>
	<TR>
	<TD>
<P>
Select the item(s) below that you would like to order.  Your transaction will be confirmed by email.</P>

<!/table>

<INPUT type="checkbox" name='1-desc' value="Smoking Program"> <B>Smoking Program </B> (&#036 495.00 each)<BR>

<INPUT type = 'hidden' NAME='1-cost' value='495.00'>
<INPUT type = 'hidden' NAME='1-qty' value='1'>


<INPUT type="checkbox" name='2-desc' value=""> <B></B> (&#036  each)<BR>
<INPUT type = 'hidden' NAME='2-cost' value=''>
<INPUT type = 'hidden' NAME='2-qty' value='1'>


<INPUT type="checkbox" name='3-desc' value=""> <B></B> (&#036  each)<BR>

<INPUT type = 'hidden' NAME='3-cost' value=''>
<INPUT type = 'hidden' NAME='3-qty' value='1'>

</TD></table><TABLE WIDTH=590>

<td>
<strong><center><HR><font size=-1 color=blue><B>GENERAL INFORMATION</b></FONT><HR></strong></center></td>
</tr>
</TABLE>

<TABLE WIDTH=590>
<TR>
<TD ALIGN="right"><B>First Name: </B> </TD>
<TD><INPUT NAME="first_name" SIZE=15 value="Testy"> <B>Last Name: </B>

<INPUT NAME="last_name" SIZE=15 value="Testerson"> <BR> </TD>
</TR>

<TR>
<TD ALIGN="right"><B>Address: </B> </TD>
<TD><INPUT NAME="address" SIZE=30 value="111 Testy Lane"><BR></TD>
</TR>

<TR>
<TD ALIGN="right"><B>City: </B> </TD>
<TD><INPUT NAME="city" SIZE=15 value="Testersville"> <B> State: </B>

<INPUT NAME="state" SIZE=2 MAXLENGTH=2 value="TN"> <B> Zip: </B>
<INPUT NAME="zip" SIZE=10 maxlength=5 value="11111"><BR></TD>
</TR>

<TR>
<TD ALIGN="right"><B>Country: </B> </TD>
<TD><INPUT NAME="country" SIZE=45 value="USA"><BR></TD>
</TR>

<TR>
<TD ALIGN="right"><B>Phone Number: </B> </TD>

<TD><strong><INPUT NAME="phone" SIZE=15 value="123-456-7890"><BR></TD>
</TR>

<TR>
<TD ALIGN="right"><B>E-Mail Address: </B> </TD>
<TD><INPUT NAME="email" SIZE=30 value="larry@americanhypnosisclinic.com"><BR></TD>
</TR>

</TABLE>

<!HR width=590></CENTER>

<INPUT type=hidden name="visaimage" value="1">
<INPUT type=hidden name="mcimage" value="1">
<INPUT type=hidden name="ameximage" value="1">

<INPUT type=hidden name="discimage" value="1">
<INPUT type=hidden name="dinerimage" value="">

<P><CENTER><INPUT TYPE="submit" VALUE="Proceed to Secure Server">

</FORM>
<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></BODY>
</HTML>

