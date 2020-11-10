<?php
function log_action($title)
{
	mysql_query("INSERT INTO `logs` ( `log_id` , `log_title` , `log_time` , `log_user` , `log_ip` ) VALUES ('', '". $title . "', '" . time() . "', '" . $_SESSION['admin']['username'] . "', '" . $_SERVER['REMOTE_ADDR'] . "');");
}
function transfer($url,$msg)
{
	ob_start();
	echo "<html>\n";
	echo "<head>\n";
	echo "<title>Store Locator</title>\n";
	echo "<STYLE>\n";
	echo "<!--\n";
	echo "TABLE, TR, TD                { font-family:Verdana, Tahoma, Arial;font-size: 7.5pt; color:#000000}\n";
	echo "a:link, a:visited, a:active  { text-decoration:underline; color:#000000 }\n";
	echo "a:hover                      { color:#0a9014 }\n";
	echo "#alt1   { background-color: #EFEFEF  }\n";
	echo "body {\n";
	echo "	background-color: #EEEEEE;\n";
	echo "}\n";
	echo "-->\n";
	echo "</STYLE>\n";
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "function changeurl(){\n";
	echo "eval(self.location='" . $url . "');\n";
	echo "}\n";
	echo "</script>\n";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\"></head>\n";
	echo "<body onload=\"window.setTimeout('changeurl();',2000);\">\n";
	echo "<table width='95%' height='85%'>\n";
	echo "<tr>\n";
	echo "<td valign='middle'>\n";
	echo "<table align='center' border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#0a9014\">\n";
	echo "<tr>\n";
	echo "<td id='mainbg'>";
	echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"12\">\n";
	echo "<tr>\n";
	echo "<td width=\"100%\" align=\"center\" id=alt1>\n";
	echo $msg . "<br><br>\n";
	echo "Please wait while we transfer you...<br><br>\n";
	echo "(<a href='" . $url . "'>Or click here if you do not wish to wait</a>)</td>\n";
	echo "</tr>\n";
	echo "</table>\n";
	echo "</td>\n";
	echo "</tr>\n";
	echo "</table>\n";
	echo "</td>\n";
	echo "</tr>\n";
	echo "</table>\n";
	echo "</body></html>\n";
	ob_end_flush();
}

function country_code($code)
{
	// Convert the Post/Zip Code to uppercase
	$code = strtoupper($code);
	
	// Remove punctuation marks
	$code = ereg_replace('[[:punct:]]', ' ', $code);
	
	// Remove Spaces
	$code = ereg_replace('[[:space:]]+', ' ', $code);
	
	// Convert O to 0(zero)
	$code = str_replace(' O',' 0', $code);

	//Check if the first character is a O and convert to a 0	
	IF($code{0} == '0')
	{
		$code{0} = '0';
	}
	
	//Check if the second character is a O and convert to a 0	
	IF($code{1} == 'O')
	{
		$code{1} = '0';
	}

	// Check if code matches UK postcode format, if not it's a usa zip code
	IF(eregi('^(([A-Z][A-Z]?)([1-9]*[0-9A-HJ-RT-Y]?))|(BFPO) ?(([0-9]{1}[ABD-HJLNP-UW-Z]{1,2})|([0-9]{2}))$', $code))
	{
		return 'uk';
	}
	ELSE
	{
		return 'usa';
	}
}

function db_connect($DBHost,$DBName,$DBUser,$DBPass)
{
	// Connect to the database
    $db_connection = @mysql_connect ($DBHost, $DBUser, $DBPass) OR error (mysql_error());
    
	// Select the database
	$db_select = @mysql_select_db ($DBName) or error (mysql_error());
	
	// Return the resource #ID
	return $db_connection;
}

function calculate_distance($lon1,$lat1,$lon2,$lat2)
{
	// Value of Pi
	$pi = 3.1415926;
	
	// Conver to radians
	$rad = doubleval($pi/180.0); 
	
	// Get Radians Value of Latitude 1
	$lat1 = doubleval($lat1)*$rad; 
	
	// Get Radians Value of Longtitude 1
	$lon1 = doubleval($lon1)*$rad; 
	
	// Get Radians Value of Latitude 2
	$lat2 = doubleval($lat2)*$rad; 
	
	// Get Radians Value of Longtitude 2
	$lon2 = doubleval($lon2)*$rad; 
	
	// Get the value of Theta
	$theta = $lon2 - $lon1; 
	
	// Get the shortest route using trigonomitory
	$dist = acos(sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($theta)); 
	
	// Times value by Pi if less than 0
	if ($dist < 0) 
	{ 
		$dist += $pi; 
	} 
	
	// Get the distance value
	$dist = $dist * 6371.2; 
	
	// Get the distance in miles
	$miles = doubleval($dist * 0.621); 
	
	// Get the distance in inches
	$inches = doubleval($miles*63360); 
	
	// Format the Distance value
	$dist = sprintf("%.2f",$dist); 
	
	// Format the miles value
	$miles = sprintf("%.2f",$miles); 
	
	// Format the inches value
	$inches = sprintf("%.2f",$inches); 
	
	// Return miles as it's all we are really interested
	return $miles;
}

function error($msg)
{
	die($msg);
}
?>