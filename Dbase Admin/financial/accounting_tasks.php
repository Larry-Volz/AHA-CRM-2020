<?php

//Get my includes
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory
include_once("../../includes/financial_task_includes.php");

//do basic security check
//$ahcDB->securityCheckBasic();

//CONNECT to DB
$ahcDB->dbConnect();

// ###################### STUFF GOES HERE ####################


$current_financial_tasks = ListCurrentFinancialTasks();
	
echo $current_financial_tasks;

?>
<html>
<head>
<title></title>
</head>
<body>
</body>
</html>