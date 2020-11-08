<?

$test="123";
function test($test){
  
  global $test;
  $test="inside the function";
  echo "inside the function \$test = ".$test."<br>";
  
}
  test($test);
  echo "outside the function \$test = ".$test."<br>";


?>