<?php
//########## IF NOT AN AUTHORIZED MEMBER ##############################


//************************ Modified by Sergiu********************
include "../../includes/cls_session.php";
include "../../includes/mysql.inc.php";
include "../../includes/functions.inc.php"; 
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
<h2><em>Change a Member's  password</em></h2>
<script language="Javascript" src="../../includes/javas.js"></script>


<script language="Javascript">
function check_pass()
{
 if ( isEmpty(document.parola.password.value) ) 
 {
 alert ("Invalid password"+"\n");
 exit();
 }
 else if( document.parola.password.value != document.parola.confirm.value ) 
 {
 alert ("Passwords do not match!"+"\n"); 
 exit();  
 }
 document.parola.submit();

}
</script>
<!--msnavigation--></td>
<td valign="top" width="24"></td>
<td valign="top" width="1%"><p>&nbsp;</p></td>
</tr>
<tr>
<td colspan="3">

<?

  switch($_POST['action'])
  {
      
  case "":    

   $sql="select id,pre_name,f_name,m_name,l_name,suf_name,honorific,title,company,prim_tel,ext_tel,sec_tel,mob_tel,fax,email,email2,address1,address2,address3,postcode,country,home_address1,home_address2,home_address3,home_postcode,home_country,SSN,hire_date,fire_date,starting_pay,current_pay,birthday,anniversary,favorite_gifts,notes,username,password,member_type,website from auth_users where id=$_GET[iduser] ";
   $DB->select($sql);
   
   
   echo "
   <form name='parola' action='$_SERVER[PHP_SELF]' method='post'><input type='hidden' name='iduser' value='$_GET[iduser]'>  <input type='hidden' name='action' value='sent'>
   <table cellpadding='2' cellspacing='0' border='0' style='border: 1px #000000 solid; font-family: Verdana; font-size: 12px;line-height: 25px;'>";
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
    echo "<td bgcolor='$bgcolor'>&nbsp;</td>"; 
    echo "</tr>";
    $i++;
   }
   echo "<tr style='font-weight: bold;'><td >&nbsp;</td><td align='left' colspan=4>&nbsp;</td></tr>"; 
   echo "<tr style='font-weight: bold;'><td >New Password:</td><td align='left' colspan=4><input type='text' name='password'></td></tr>";  
   echo "<tr style='font-weight: bold;'><td >Confirm Password:</td><td align='left' colspan=4><input type='text' name='confirm'></td></tr>";
   echo "<tr style='font-weight: bold;'><td colspan=2><input type='button' name='send' value='Update' onclick='check_pass();'></td></tr>"; 
   echo "</table></form>  "; 
  
  break;
  
  
  
  case "sent":
  

    $sql=" select PASSWORD('test') as passtest";
    $DB->select($sql); 
    $pass_gen=$DB->FetchArray;
    settype($pass_funct,"string");
    
    if (!IsValidPassword($_POST['password']))    
    {
    echo "<br /><font color='red'><b>Error:  Password must have between 4-12 alphanumeric chars</font>";
    meta_redirect("change_pass.php",2);
    exit();
    }
    if  (strlen(trim($pass_gen['passtest']))>16) $pass_funct = "OLD_PASSWORD";
    else                                         $pass_funct ="PASSWORD";   
    
    
    
    $sql ="update auth_users set password=$pass_funct('".$_POST['password']."') where id=$_POST[iduser] ";
 
    
    if ( $DB->update($sql) ) 
    {
    echo "<br /><font color='green'><b>Password Succesfully Updated</font>";
    meta_redirect("show_modpasswords.php",3);    
    }
    else                     echo "<br /><font color='red'><b>Error:  Password is not updated</font>";    
  
  break;
  
  }
  
   

?>

</td></tr></table></body>

</html>

