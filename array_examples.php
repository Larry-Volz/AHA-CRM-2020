<?php

$f_name[]="Bob";
$f_name[]="Edith";
$f_name[]="Charlotte";
$f_name[]="Zachary";
$f_name[]="Larry";
$f_name[]="Wendy";
$f_name[]="Rupert";
$f_name[]="Vermathidrax";

echo "trying to just say array_charles[1]['name'] = bob<br>";
$array_charles[1]['name'] = "bob";
echo "and the value of array_charles is... ".$array_charles[1]['name']."<br><br>";

echo "<br><br>okay... trying to assign and print three in a loop...<br>";
echo "<h1> array_charles 0-2</h1><br>";

	for ($i=0; $i<3; $i++){
    	$array_charles[$i]['name']= "song ".$i;
        echo $array_charles[$i]['name']."<br>";
         }//end for loop

   echo "<br>";


$affiliate = array(
				array("distance"=>"10","id"=>"111111","name"=>"Larry"),
				array("distance"=>"30","id"=>"333333","name"=>"Mildred"),
  				array("distance"=>"20","id"=>"222222","name"=>"Beatrice")
                );



// ################### PRINT OUT THE WHOLE ARRAY EASILY WITH print_r() #########
echo"<pre>";
print_r($f_name);
echo"</pre>";
// ##############################################################################

/*
echo"<ul>";
for ($i=0; $i<=8; $i++){

	echo "<li>$f_name[$i]</li>";

}//close for loop

echo"</ul>";
*/

asort($f_name);
echo" this is asort()...<br>";
echo"<pre>";
print_r($f_name);
echo"</pre>";

sort($f_name);

echo" this is sort()...<br>";
echo"<pre>";
print_r($f_name);
echo"</pre>";

echo"This is the affiliate array";
echo"<pre>";
print_r($affiliate);
echo"</pre>";

echo"this is what happens when you write echo affiliate[1] <br><br>";
echo $affiliate[1]."<br>";

echo "this is what happens when you write echo affiliate[1]['distance'][0] NO QUOTES!!!<br><br>";
echo $affiliate[1]['distance']." miles to ".$affiliate[1]['name']."'s house";

echo" okay... now here's what happens when you perform an asort() on our multi-dimensional array...<br><br>";
asort($affiliate);
echo"<pre>";
print_r($affiliate);
echo"</pre>";

echo" okay... now here's what happens when you perform a sort() (without the a) on our multi-dimensional array...<br><br>";
sort($affiliate);
echo"<pre>";
print_r($affiliate);
echo"</pre>";

?>
<html>

<head>
  <title></title>
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">




</html>