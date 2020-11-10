<?php
//########## IF NOT AN AUTHORIZED MEMBER ##############################


//************************ Modified by Sergiu********************
include "../../includes/cls_session.php";
include "../../includes/mysql.inc.php";
$sess=new MYSession;  
$DB=new class_mysql;     

if ( $sess->get('auth') != "ok" )
{
    header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
    exit;
}

$permission = $sess->get('permission');  

if ($permission !="god"){
    header ("Location: http://www.americanhypnosisclinic.com/intranet/Dbase Admin/User Authentication/no_permission.htm");
    exit;    
}

//************************END Modified by Sergiu********************      


//########## IF NOT HIGH ENOUGH PERMISSION FOR THIS PARTICULAR PAGE #################



?>



<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>AHC Intranet:  Administration Interface</title>

<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation-->
<table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation-->
<td valign="top">
<h1>AHC Intranet:  Administration Interface</h1>
<h2><em>Change a Member's password</em></h2>


<!--msnavigation--></td>
<td valign="top" width="24"></td>
<td valign="top" width="1%"><p>&nbsp;</p></td>
</tr>
<tr>
<td colspan="3">

<?


   $sql="select id,pre_name,f_name,m_name,l_name,suf_name,honorific,title,company,prim_tel,ext_tel,sec_tel,mob_tel,fax,email,email2,address1,address2,address3,postcode,country,home_address1,home_address2,home_address3,home_postcode,home_country,SSN,hire_date,fire_date,starting_pay,current_pay,birthday,anniversary,favorite_gifts,notes,username,password,member_type,website from auth_users";
   $DB->select($sql);
   
   
   echo "<table cellpadding='2' cellspacing='0' border='0' style='border: 1px #000000 solid; font-family: Verdana; font-size: 12px;line-height: 25px;'>";
   echo "<tr style='font-weight: bold;'><td >First name</td><td>Last name</td><td>E-mail</td><td>Username</td><td>Permissions</td><td></td></tr>";
   $i=1;
   while( $line = $DB->fetchArray()  )
   {
    if ($i%2==1) $bgcolor= "#CFCFCF";
    else         $bgcolor= "#FFFFFF"; 
    echo "<tr>";
    echo "<td bgcolor='$bgcolor'>".$line['f_name']."</td>";
    echo "<td bgcolor='$bgcolor'>".$line['l_name']."</td>";   
    echo "<td bgcolor='$bgcolor'>".$line['email']."</td>";   
    echo "<td bgcolor='$bgcolor'>".$line['username']."</td>"; 
    echo "<td bgcolor='$bgcolor'>".$line['member_type']."</td>";  
    echo "<td bgcolor='$bgcolor'><a href='change_pass.php?iduser=$line[id]'>Change Password</a></td>"; 
    echo "</tr>";
    $i++;
   }
   echo "</table>";

?>

</td></tr></table></body>

</html>