<?
//$affiliate[distance][id]    $miles away: link $f_name
$miles = 10;
$f_name =  "george";
$id=123456;

$affiliate[$miles][$id] = "$miles away: link $f_name";

$miles = 10;
$f_name = "Henry";
$id=654321;

foreach ($affiliate as $output){
  $print_name=$output['miles']['firstname'];
	echo $print_name;
}
?>