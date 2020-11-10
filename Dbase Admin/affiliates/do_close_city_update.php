<?php

//Get my class and methods
include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory

//CONNECT to DB
$ahcDB->dbConnect();

//#### Get variables ####

$affil_id=$_POST['affil_id'];
$close_city1=$_POST['close_city1'];
$close_city2=$_POST['close_city2'];
$close_city3=$_POST['close_city3'];

// ##### verify id # is correct
$sql="SELECT * FROM affiliates WHERE id=$affil_id";
$result = mysql_query($sql);

//########## VERIFY THIS IS THE RIGHT PERSON!!!! ###################



//might need additional script...



//#### if not -return to sender #####
If ((!$_POST[affil_id])||(!$result)){
  header( "Location: http://www.americanhypnosisclinic.com/show_add_close_cities.php");
    exit;
}

//#### if so, update those fields ####
$table_name="affiliates";

$sql = "UPDATE $table_name SET close_city1='$close_city1',close_city2='$close_city2',close_city2='$close_city2' WHERE id='$affil_id'";

$result = mysql_query($sql);

?>
<html>
<head>
<title></title>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
</head>
<body>
</body>
</html>