<?
//include file
require_once('../../../FORMfields/tableHelpers.php');

//instantiate class
    $table2 = new TableSet();
    $table2->enableSort = true;

//DON'T TOUCH THE BEGINNING!  Syntax is TRICKY!'
//Creates a clickable link in the start!
//Need to specify WHERE for various searches

        
$table2->loadQuery("SELECT CONCAT('<a href=\"show_affiliate.php?id=',id,'\">','View','</a>') AS 'View',CONCAT('<a href=\"show_modaffiliate_getmethod.php?id=',id,'\">','Edit','</a>') AS 'Edit',l_name AS 'Last Name',f_name AS 'First Name',company AS 'Company Name', prim_tel AS 'Phone', sec_tel AS 'Alt Phone',CONCAT('<a href=\"mailto:',email,'\">',email,'</a>') AS 'e-Mail' FROM affiliates WHERE membership_status='Affiliate'");

?>
<html>

<head>
<title>Example 1</title>
<link rel="stylesheet" type="text/css" href="../../../FORMfields/tableHelpers.css" />
</head>
<body>
	<?  
	//call method to make table and echo to browser
		echo $table2->getTableTag(); 
	?> 
</body>

</html>