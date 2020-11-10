<?
session_start();

//register a variable named 'count' in session
session_register('count');
session_register('f_name');
session_register('l_name');
session_register('prim_tel');
session_register('company');
session_register('email');


$_SESSION[count]++;
$_SESSION[f_name]="Larry";
$f_name=$_SESSION[f_name];

$msg="<P>Hi $f_name, you have been here {$_SESSION[count]} times.</P>";




?>

<html>
<head>
<title>COUNT # OF VISITS</title>



<meta name="Microsoft Border" content="r, default">
</head>
<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<? echo "$msg"; ?>


<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>
</html>