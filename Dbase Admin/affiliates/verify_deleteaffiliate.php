<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//do basic security check
$ahcDB->securityCheckBasic();

//CONNECT to DB
$ahcDB->dbConnect();

// ###################### GET VARIABLES ####################

$id=$_GET['id'];

$table_name="affiliates";

$fieldName="f_name";
$f_name = $ahcDB->getVar($table_name,$id,$fieldName);

$fieldName="l_name";
$l_name = $ahcDB->getVar($table_name,$id,$fieldName);

$fieldName="membership_status";
$membership_status = $ahcDB->getVar($table_name,$id,$fieldName);

//-----------------------------------------------------------


?>
<html>
<head>
<title></title>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/axis/axis1011.css"><meta name="Microsoft Theme" content="axis 1011, default">
</head>
<body>
	<form method="post" ACTION = "do_delaffiliate.php">
	<input type="hidden" name="id" value="<? echo $id ?> ">
	<center><? echo "Are you sure you want to delete $f_name $l_name who is in the sales category $membership_status?" ?>
	
	<input type="submit" value="YES" /> &nbsp;&nbsp;&nbsp;<a href="show_everyone.php">No</a></center>
</body>
</html>