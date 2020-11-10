<?
//make a simpler variable to work with from the imported certifications variable
$certifications = $_POST[certifications];

//create a print block for combined certifications for confirmation
$combined_certs_print_block = "Certifications: ";

//START INSERTING CERT ID'S WITH CLIENT ID INTO RELATIONSHIPS DATABASE
$i=0;
foreach($certifications as $cert_id) {  //Puts certification # from this array into $cert_id
echo "loop ".$i."<br>";
echo "cert_id is = ".$cert_id."<br>";
$i++;

    //insert a new relationship record for each certification found in the array
//	$insert_results = mysql_query($insert_certs_query) or die(mysql_error());

    //Get description of certification from affiliates_certifications table
    	//Run query
 //       $desc_results=mysql_query($retrieve_descriptions_query) or die(mysql_error());
        //get JUST the description using the built-in FETCH function: mysql_result (gets ONLY one value!)
//        $description = mysql_result($desc_results,0,desc);

    //add to print block
//    $combined_certs_print_block .= $description." ";

}//### END FOREACH BLOCK ###


?>
<html>

<head>
  <title></title>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/axis/axis1011.css"><meta name="Microsoft Theme" content="axis 1011, default">
<meta name="Microsoft Border" content="none, default">
</head>

<body>



</body>

</html>