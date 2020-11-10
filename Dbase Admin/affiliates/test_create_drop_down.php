<?php
//Get my class and methods
include_once("ahcDatabase_class.php");

//CONNECT to DB
$ahcDB->dbConnect();



// ###################### TEST DROP-DOWN CREATION ####################
//
$person_id=627; //Testy testytesty4
$person_table="affiliates";
$rel_table="affiliates_certifications_rel"; 
$desc_table="hyp_certifications";
$select_name="choose_certifications";

$print_string = $ahcDB->dropDownSelected($person_id,$rel_table,$desc_table,$select_name);

echo "<h1> $print_string </h1>";

?>