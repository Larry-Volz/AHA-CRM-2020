<?php
require_once("includes/config.php");

set_time_limit (120);

initial_checks();

function initial_checks()
{
	IF(defined('IS_INSTALLED'))
	{
		error('You have already installed Store Locator');
		exit;
	}
	$dir[] = "includes/config.php";
	
	foreach ($dir as $value) {
		IF(!is_writable($value))
		{
			error("You must chmod the " . $value . " to 0777");
		}
	}
}

function error($msg)
{
	exit("<b>Critical Error: </b> " . $msg);
}

IF(isset($_POST['Submit']))
{
?>
<html>
<head>
<style type="text/css"><!--

div {
 margin: 1px;
 height: 20px;
 padding: 1px;
 border: 1px solid #000;
 width: 275px;
 background: #fff;
 color: #000;
 float: left;
 clear: right;
 top: 38px;
 z-index: 9
}

.percents {
 background: #FFF;
 border: 1px solid #CCC;
 margin: 1px;
 height: 20px;
 position:absolute;
 width:275px;
 z-index:10;
 left: 10px;
 top: 38px;
 text-align: center;
}

.blocks {
 background: #EEE;
 border: 1px solid #CCC;
 margin: 1px;
 height: 20px;
 width: 10px;
 position: absolute;
 z-index:11;
 left: 12px;
 top: 38px;
 filter: alpha(opacity=50);
 -moz-opacity: 0.5;
 opacity: 0.5;
 -khtml-opacity: .5
}

-->
</style>
<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../../_themes/breeze/bree1011-28591.css"><meta name="Microsoft Theme" content="breeze 1011, default">
<meta name="Microsoft Border" content="none, default">
</head>
<body>

<?
	$db_connection = mysql_connect ($_POST['DBHost'], $_POST['DBUser'], $_POST['DBPass']) OR error (error(mysql_error()));
	$db_select = mysql_select_db ($_POST['DBName']) or error(mysql_error());

    IF($handle = fopen("includes/config.php", 'w'))
    {
        fwrite($handle, "<?php\r\n");
		fwrite($handle, "// Database Host\n");
		fwrite($handle, "\$DBHost = '" . $_POST['DBHost'] . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Database Name\n");
		fwrite($handle, "\$DBName = '" . $_POST['DBName'] . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Database Username\n");
		fwrite($handle, "\$DBUser = '" . $_POST['DBUser'] . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Database Password\n");
		fwrite($handle, "\$DBPass = '" . $_POST['DBPass'] . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Radius in which a store can be counted as nearby\n");
		fwrite($handle, "\$store_radius = '20';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Admin Email Address\n");
		fwrite($handle, "\$admin_email = '" . $_POST['adm_email'] . "';\n");
		fwrite($handle, "\n");
		fwrite($handle, "// Template Folder Name\n");
		fwrite($handle, "\$tpl_name = 'default';\n");		
		fwrite($handle, "\n");
		fwrite($handle,"DEFINE('IS_INSTALLED', 1);");
	    fwrite($handle, "?>");
        fclose($handle);
	}
	
	echo "<font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Starting to install, this may take a few minutes..<br><br><Br>";

	flush();
	$i=0;
	$handle = fopen ("install/data.sql", "r");
	while (!feof ($handle)) {
	$i++;
	$ee=$i/455;
	if($ee==4 OR $ee==8 OR $ee==12 OR $ee==16 OR $ee==20 OR $ee==24 OR $ee==28 OR $ee==32 OR $ee==36 OR $ee==40 OR $ee==44 OR $ee==48 OR $ee==52 OR $ee==56 OR $ee==60 OR $ee==64 OR $ee==68 OR $ee==72 OR $ee==76 OR $ee==80 OR $ee==84 OR $ee==88 OR $ee==92 OR $ee==96 OR $ee==100){
	   $d = $d + 11;
	   $m=$d+10;
	   //This div will show loading percents
	   echo '<div class="percents">' . $ee . '%&nbsp;complete</div>';
	   //This div will show progress bar
	   echo '<div class="blocks" style="left: '.$d.'px">&nbsp;</div>';
	   flush();
	   ob_flush();
	   sleep(1);
	 }
		$buffer = fgets($handle, 4096);
		$value = eregi_replace("\n", "", $buffer);
		$value = eregi_replace("\r", "", $value);
		mysql_query($value);
	}
	ob_end_flush();
?>
<div class="percents" style="z-index:12">Done.</div>
</body>
</html> 
<?
	fclose ($handle);
	echo "<br><br>MySQl table creation...";
	echo "\t\t<font color=#009900>Successful</font><br><br>";
	flush();

	mysql_query("INSERT INTO `admins` VALUES ('', '" . $_POST['adm_user'] . "', '" . md5($_POST['adm_pass']) . "');");
	echo "<br><Br><br>Thank you for installing Store Locator, you must now <b>delete</b> the install.php file and the /install/ directory<br><br><br>";
	echo "You can now login to the admin section <a href=\"adm/\">here!</a></font>";
	exit;
}
ELSE
{
	IF(!isset($_POST['license']))
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>License Agreement</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center">
  <form name="form1" method="post" action="">
    <textarea name="license" cols="60" rows="15" id="textarea">GHOST SCRIPTER
END USER LICENSE AGREEMENT (EULA) This End User License Agreement ("Agreement") is a legal agreement between you (as an individual or an entity) and Ghost Scripter (&#8220;Company&#8221;). It sets forth the terms and conditions that apply to your right to use Amazon Shopping Cart(TM) and such other Company branded products and/or services that reference this document, as well as all user documentation and successor products and/or services to the same ("Software"). 

Before you install, use, copy, download, access the Software or click the &#8220;Agree&#8221; button associated with the presentation of this document, carefully read the following terms and conditions of this agreement. BY CLICKING THE &#8220;AGREE&#8221; BUTTON OR INSTALLING, COPYING, DOWNLOADING, ACCESSING OR USING THE SOFTWARE, YOU AGREE TO BE BOUND BY AND BECOME A PARTY TO THIS AGREEMENT. IF YOU DO NOT SO AGREE, DO NOT CLICK THE &#8220;AGREE&#8221; BUTTON AND DO NOT INSTALL, COPY, DOWNLOAD, ACCESS OR USE THE SOFTWARE AND RETURN OR DESTROY ALL COPIES OF IT IN YOUR POSSESSION. 

1. LICENSE
The Software is proprietary to Company and/or its suppliers and licensers and is protected by United States copyright and other laws as well as by international treaty. You shall not use, copy or distribute the Software without express, written authorization from the Company, and your right to use the Software is limited by the applicable license stated in this Agreement and to your internal use. Company reserves all rights not expressly granted herein.
1.2 Grant of License. Based upon the nature of the Software and the Company's designation of the applicable license for it, and your payment of the applicable fees when due, one or the other of Sections 1.2(a) or 1.2(b) will apply to your license of the Software: 
(a) Non-subscription/Retail. Company hereby grants to you a nonexclusive license to use a single copy of the object code version of the Software under the terms and conditions of this Agreement. You may use this copy of the Software on a single computer. You may not copy the Software except that you may either (i) make a copy of the Software solely for backup or archival purposes, or (ii) transfer the Software to a single hard disk provided you keep the original solely for backup or archival purposes. This license is effective on the date you open this package and will remain in force until terminated.
(b) Subscription. During the term of your subscription license, Company hereby grants you the right to use one copy of the specified version of the Software on only one computer, and only by one user, at a time. If you have purchased multiple licenses for the Software, then at any time you may have as many copies of the Software in use as you have licenses. The Software is &#8220;in use&#8221; on a computer when it is loaded into the temporary memory (i.e. RAM) or installed into the permanent memory (e.g., hard disk, CD-ROM, or other storage device) of that computer. Unless otherwise expressly stated in writing to you by the Company, a term for your subscription shall be for 365 days from the date that Company accepts your payment for it. Upon expiration of your subscription, the Company may automatically renew your subscription to the Software at the then prevailing price using credit card information you have previously provided. You may elect not to renew your subscription by contacting the Company's customer service department and informing them of your desire not to renew your subscription prior to any such renewal.

2. OWNERSHIP, USE LIMITATIONS, GOVERNMENT RESTRICTED RIGHTS
2.1Ownership. This Agreement is one for license and not sale. Company and/or its licensor own all rights, title and interest to the Software and all copies of it as well as to all trade secrets, copyrights, patent rights, trademarks and other intellectual property rights in and to the Software. You agree to not alter, remove, or conceal any copyright, confidentiality or other rights notice that appears on or within the Software and to reproduce such notices on any copies of the Software which are made by or for you. 

2.2Restrictions. Except to the extent permitted by applicable law, you shall not sublicense, rent or lease the Software, nor may you modify, adapt, reverse engineer, decompile, or disassemble it, and you shall not modify or create derivative works based on the Software. 

2.3 U.S. Government-Restricted Rights. The Software is "commercial computer Software" and includes "commercial computer Software documentation," respectively, pursuant to DFAR Section 227.7202 and FAR Section 12.212. Any use, modification, reproduction release, performance, display or disclosure of the Software by the U. S. Government will be governed solely by the terms of this Agreement and will be prohibited except to the extent expressly permitted by the terms of this Agreement. Manufacturer is Ghost Scripter, 56 Carlogie Road, Carnoustie, Angus, DD76EY, United Kingdom.

3. EXPORT & TRANSFER
3.1 Export Restrictions. You may not download, export, or re-export the Software (a) into, or to a national or resident of, any country to which the United States has embargoed goods, or (b) to anyone on the United States Treasury Department's list of Specially Designated Nationals or the U.S. Commerce Department's Table of Deny Orders. By downloading or using the Software, you are representing and warranting that you are not located in, under the control of, or a national or resident of any such country or on any such list. You acknowledge that it is your sole responsibility to comply with any and all government export and other applicable laws and that the Company has no further responsibility for such after the initial license to you.
3.2Assignment. You may not rent, lease or loan the Software, but you may transfer your rights under this Agreement permanently, provided you transfer this Agreement, the Software and all accompanying printed materials, retain no copies, and the recipient agrees to the terms of this Agreement.

4. PRIVACY POLICY. 
You agree that the Company may collect, retain and use information about you, including your name, e-mail address and credit card information. The Company employs other companies and individuals to perform functions on its behalf (i.e., fulfilling orders, analyzing data, processing credit card payments, etc.). They have access to such information about you as they may need to perform their functions. The Company publishes a privacy policy on its Web site, which it may amend from time to time at its sole discretion. You should refer to the Company's privacy policy prior to agreeing to this Agreement for a more detailed explanation of how your information will be collected, stored and used by the Company. 

5. WARRANTY DISCLAIMER & LIABILITY LIMITATION
the software is provided "AS IS" and without a warranty of any kind, and to the maximum extent permitted by applicable law, Company disclaims on behalf of itself and its suppliers all other warranties, express or implied, including (without limitation) the implied warranties of merchantability, fitness for a particular purpose, and non-infringement with respect to the Software and its availability, accessibility, and/or performance. To the maximum extent permitted by applicable law, Company and its suppliers shall not be liable for any incidental, special, or consequential damages that arise from this Agreement or result from your use or inability to use the Software, even if advised of the possibility of such damages, including (without limitation) damages for loss of profits, business interruption, loss of data or information, loss of goodwill, etc. Furthermore, in no event will company's total liability to you for all damages in any one or more cause(s) of action, regardless of the theory, exceed the license fee paid by you for the software. Some states do not allow limitations on implied warranties or consequential / incidental damages, so the above limitations may not apply to you. You hereby acknowledge that the software may not be available and/or your use of it disrupted due to factors, including but not limited to, periodic system maintenance (scheduled or unscheduled), telecommunications infrastructure failure, viruses, denial of service attacks, increased or fluctuating demand, and actions and omissions of third parties.

6. TERMINATION
The license rights granted to you under this Agreement automatically and immediately terminate should you breach any term or condition of this Agreement or receive notice of termination from the Company. In such event, you must immediately destroy all copies of the Software in your possession. Additionally, the Software may contain code that tracks whether you have failed to pay a required fee and may contain code that renders the Software inoperable in the event that a fee is overdue or an obligation is violated. Consequently, the Software may no longer operate and Company will under no circumstances be liable for any damages caused by or related to the Software's cessation of operation. 

7. GENERAL
7.1 Jurisdiction and Venue. This Agreement shall be governed by the laws of the United States and the State of Massachusetts without regard to conflict of law principles. The application of the United Nations Convention of Contracts for the International Sale of Goods is expressly excluded. This Agreement shall not be subject to the Uniform Commercial Code. Any dispute between you and Company regarding this Agreement will be subject to the exclusive venue of the state courts in, and the federal courts closest to, the county of Santa Cruz, State of California, USA.


7.2 Other. This Agreement and any addendum or amendment to it which is included by the Company with the Software is the entire agreement between you and the Company relating to the Software and all Company provided services, if any, and supersedes any other communication, correspondence, advertisement or display with respect to the subject matter covered by this Agreement. To the extent that the terms of any Company policy or program conflict with the terms of this Agreement, the terms of this Agreement shall control. If for any reason a court of competent jurisdiction finds any provision of the Agreement, or portion thereof, to be unenforceable, that provision of the Agreement shall be enforced to the maximum extent permissible so as to affect the intent of the parties, and the remainder of this Agreement shall continue in full force and effect. No provision hereof shall be deemed waived or modified except in a written addendum signed by an authorized representative of the Company.</textarea>
    <br>
    <input type="button" name="Button" value="Cancel">
&nbsp;
<input name="agree" type="submit" id="agree2" value="I Agree">
  </form>
</div>
</body>
</html>
<?
	exit;
	}
}
?> 
<form name="form1" method="post" action="">
  <table border="0" align="center" cellpadding="3" cellspacing="0">
    <tr> 
      <td><div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Database 
          Configuration</strong></font></div></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr> 
            <td width="250"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">DB 
              Host</font></td>
            <td><input name="DBHost" type="text" id="DBHost" value="localhost" size="40"></td>
          </tr>
          <tr> 
            <td width="250"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">DB 
              Name</font></td>
            <td><input name="DBName" type="text" id="DBName" size="40"></td>
          </tr>
          <tr> 
            <td width="250"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">DB 
              Username</font></td>
            <td><input name="DBUser" type="text" id="DBUser" size="40"></td>
          </tr>
          <tr> 
            <td width="250"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">DB 
              Password </font></td>
            <td><input name="DBPass" type="password" id="DBPass" size="40"></td>
          </tr>
        </table>
      </td>
    </tr>
	
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Admin 
          Information </strong></font></div></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr> 
            <td width="250"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Admin 
              Username </font></td>
            <td><input name="adm_user" type="text" id="adm_user" size="40"></td>
          </tr>
          <tr> 
            <td width="250"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Admin 
              Password </font></td>
            <td><input name="adm_pass" type="password" id="adm_pass" size="40"></td>
          </tr>
          <tr>
            <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Admin Email</font></td>
            <td><input name="adm_email" type="text" id="adm_email" size="40"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><div align="center"><br>
        </div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input type="submit" name="Submit" value="Start Install">
        </div></td>
    </tr>
  </table>
</form>