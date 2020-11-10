<?

include_once("ahcDatabase_class.php");

$ahcDB->dbConnect();

$table_name="affiliates";
$id=21;
$fieldName="f_name";
$variable = $ahcDB->getVar($table_name,$id,$fieldName);

echo $variable;

?>