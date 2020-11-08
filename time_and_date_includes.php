<?
//###################################### Convert Javascript Date Into Timestamp #####################################

$month=$_POST['months']+1;
$day=$_POST['days'];
$year=$_POST['year'];

$timestamp=mktime(0,0,0,$month,$day,$year);


//========================================== END DATE TO TIMESTAMP CONVERSION =======================================



?>
