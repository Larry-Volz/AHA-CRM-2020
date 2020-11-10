<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do basic security check
$ahcDB->securityCheckBasic();

//CONNECT to DB
$ahcDB->dbConnect();

// ###################### STUFF GOES HERE ####################

/*

- Set up new table
	follow_up_id, 
	client_id, 
	follow_up_date, 
	follow_up_interval (week, (WL - 3 months), 6 months, 1 year)
	follow_up completed_yesno, 
	outcome (success, partial success/ongoing, gave up), 
	customer satisfaction w/affiliate(1-10), 
	cust. satisfaction with company, 
	first_affiliate_id, 
	last_affiliate_id, 
	num_sessions, notes, 
	remind to refer
	finished_w_program_yesno
	
- Fix Igor to update a table for follow-up statistics with a follow up date of 1 week out from 1st appt
	- different time schedule for different goals
	- week out, six month follow-up, 1 year follow-up
	
- Create table of those to call with $_get to individual ones in order by date

- Set up individual client form pages

- do back end

- do summary on inside_index page + link on Mom's page

*/



?>
<html>
<head>
<title></title>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
</head>
<body>
</body>
</html>