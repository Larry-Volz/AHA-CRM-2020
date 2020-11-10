<?
//########## IF NOT AN AUTHORIZED MEMBER ##############################
if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
}
//########## IF NOT HIGH ENOUGH PERMISSION FOR THIS PARTICULAR PAGE #################
$permission = $_COOKIE[permission];

if ($permission !="god"){ // |$permission="PC"|$permission="mgr"... etc.
	header ("Location: http://www.americanhypnosisclinic.com/intranet/Dbase Admin/User Authentication/no_permission.htm");
	exit;	
}

?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>New Page 1</title>
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<h1>all_clients Field Definitions </h1>
<p>(Manually entered - How do I write code to look them up?...)</p>
<ul>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">client_id</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">first_name</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">last_name</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">sales_category</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">sales_stage</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">sales_contact_next</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">date_client_sold</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">record_manager</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">referred_by</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">referred_by_details</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">client_flags</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">address_1</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">address_2</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">city</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">state</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">zip</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">country</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">e_mail</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">home_phone</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">work_phone</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">phone_ext</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">mobile_phone</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">primary_goal</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">secondary_goal</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">additional_information</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">first_appointment</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">therapist</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">action</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">payment_type</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">cc_number</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">cc_expires</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">alt_phone</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">log_entry_yes</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">appt_yes</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">created</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">created_by</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">modified</li>
	<li>
	<p style="margin-top: 0; margin-bottom: 0">modified_by</li>
</ul>
<p>&nbsp;</p>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
