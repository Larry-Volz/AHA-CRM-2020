<?
//###################### SESSION SECURITY CHECK ########################


session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

IF (($auth !="ok")||(($permission !="god")&&($permission !="admin"))){
	header ("Location: not_authorized.php");
	exit;
}


//------------------------------ end security check --------------------------
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Links to Dbas Administrative Tools</title>
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">


<h1 align="center"><font color="#000080">Links to Administrative Tools</font></h1>
<p align="center"><i>Click the links below to use the work-in-progress dbase 
administration tools located at
<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/">
www.americanhypnosisclinic.com/intranet/Dbase Admin/</a>&nbsp; folder</i></p>
<ul>
	<li>
	<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/larrys_dbases_n_tables.php">
	View Directory of All My Databases and Tables</a></li>
	<li>
	<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/Create%20Table%20and%20field%20defs/show_createtable.htm">
	Create a Table and Define it's fields (within AHC intranet)</a></li>
	<li>
	<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/view_all_clients_field_defs.php">
	View all_clients field definitions</a></li>
	<li>
	<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/User%20Authentication/show_adduser.htm">
	Create New User/Password</a></li>
	<li>
	<a target="_self" href="User%20Authentication/show_modpasswords.php">Modify 
	Usernames/Passwords</a></li>
	<li>
	<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/financial/show_programfinancial.php">Program Ordering Front End (show_programfinancial.htm)</a></li>
	<li>	<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/auth_users/pick_member_activities.php">Show Member Activities</a></li>
	<li>	<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/all_clients/show_createview.php">Create a New View for All_Clients Database</a></li>
<li>	<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/affiliates/show_e-mail_affiliates.htm">e-mail All Current Affiliate Therapists</a></li>
<li>	<a href="http://www.americanhypnosisclinic.com/intranet/Dbase%20Admin/convert_timestamp_application.php">Convert a Date Into a Timestamp</a></li>
</ul>
<p>&nbsp;</p>


<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
