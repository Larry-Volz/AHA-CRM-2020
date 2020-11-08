<?
require_once "PEAR.php";

echo "I'm pear_experiments... you found me";

$timestamp=time();

$this_hour=PEAR::thisHour($timestamp);

echo"<br><br> timestamp= $timestamp<br><br> thisHour= $this_hour";
?>