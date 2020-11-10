<?
//########## IF NOT AN AUTHORIZED MEMBER ##############################
if ($_COOKIE[auth] != "ok"){
	header ("Location: http://www.americanhypnosisclinic.com/intranet/index.htm");
	exit;
}
//########## IF NOT HIGH ENOUGH PERMISSION FOR THIS PARTICULAR PAGE #################
$permission = $_COOKIE[permission];

if ($permission !="god"){ // |$permission="PC"|$permission="mgr"... etc.
	header ("Location: http://www.americanhypnosisclinic.com/intranet/Dbase Admin/User Authentication/no_permission.htm");
	exit;	
}
//###################### if data didn't come through ####################################

if ((!$_POST[num_fields]) || (!$_POST[table_name])){ 
	header("location: show_createtable.htm");
	// notice NO HTML before using HEADER - which takes you back if error
	exit;
}


/* NEXT WE START WRITING AN HTML FORM (TO DEFINE THE DB FIELDS)ON THE FLY USING THE INFORMATION WE JUST GATHERED*/
/* THE FORM BLOCK VARIABLE IS GOING TO BE THE HTML AND FORM THAT THE COMPUTER WILL READ */
/* HIDDEN FIELDs IMPORT IN THE DATA FROM THE PREVIOUS FORM*/

$form_block = "<FORM METHOD = \"post\" action = \"do_createtable.php\">
<INPUT TYPE = \"HIDDEN\" NAME = \"table_name\" VALUE=\"$_POST[table_name]\">
<TABLE CELLSPACING=5 CELLPADDING=5>
<TR>
<TH>FIELD NAME</TH><TH>FIELD TYPE</TH><TH>FIELD LENGTH</TH><TH>PRIMARY KEY?</TH><TH>AUTO-INCREMENT?</TH></TR>";

/*CREATE THE FORM FIELDS*/

//DO ONCE FOR EACH FIELD IN DATABASE TABLE
/*the variable field_name[] array - will come up as $_POST[field_name][0], $_POST[field_name][1], etc. */

for ($i=0; $i < $_POST[num_fields]; $i++){

		//add one row to form block for each field in database table
	$form_block .= "
		<TR>
				<TD ALIGN=CENTER><INPUT TYPE=\"text\" NAME=\"field_name[]\" SIZE=\"30\"></TD>
		<TD ALIGN=CENTER>
		<SELECT NAME=\"field_type[]\">
		<OPTION VALUE=\"char\">char</OPTION>
		<OPTION VALUE=\"date\">date</OPTION>
		<OPTION VALUE=\"float\">float</OPTION>
		<OPTION VALUE=\"int\">int</OPTION>
		<OPTION VALUE=\"text\" selected>text</OPTION>
		<OPTION VALUE=\"varchar\">varchar</OPTION>

		</select>
		</td>

		<TD ALIGN=CENTER><INPUT TYPE=\"text\" NAME=\"field_length[]\" SIZE=\"5\"></TD>
        <TD ALIGN=CENTER><INPUT TYPE=\"checkbox\" NAME=\"primary[]\" VALUE=\"Y\"></TD>
        <TD ALIGHN=CENTER><INPUT TYPE=\"checkbox\" NAME=\"auto_increment[]\" VALUE=\"Y\"></TD>
		</TR>";// end the form block




	}//close the for loop

// add submit button
	$form_block .= "
	<tr>
	<td align = center colspan=3><input type=\"submit\" value=\"Create Table\"></td>
	</tr>
	</table>
	</form>"; //end text variable and html form block

?>

<html>
<head>
<title>Create a Database Table:Step 2</title>
<meta name="Microsoft Border" content="r, default">
</head>
<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1>Define Fields for <? echo "$_POST[table_name]"; ?></h1>

<?
echo "$form_block";
?>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>
</html>