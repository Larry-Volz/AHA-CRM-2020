<?

 include "includes/mysql.inc.php";
 include "includes/functions.inc.php";
 $cdb=new class_mysql;
 $sql="update email_receipt set status = 1 where code='$_GET[code]' ";
 if ( $cdb->update($sql) )
 echo "<br><br><p align=\"center\"><strong>Thank You for confirming your appointment.<br><br>We look forward to serving you!</strong></p>";
 meta_redirect("http://www.americanhypnosisclinic.com",3);

?>