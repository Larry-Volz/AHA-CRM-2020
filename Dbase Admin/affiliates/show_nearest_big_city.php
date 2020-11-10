<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Where is your nearest big city?</title>
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">
<h1 align="center">Where's your nearest big city?</h1>
<p><i>Please take a moment and fill in the form below with the three largest 
metropolitan areas near you.&nbsp; If you only have one or two, that's fine - 
just let us know what big cities are located near you that people are most 
likely to travel from in order to seek your services.</i></p>
<p><i>For instance, if your mailing address is Chesterfield Virginia, but that's 
really a suburb of Richmond (a large city) - then make sure you put &quot;Richmond&quot; 
in the box below.&nbsp; You do not need to put in your actual mailing address 
city since that is already on file. <b>Please remember to hit SUBMIT when you are done.</b></p>
<p><i>This will enable us to better market your services and hopefully send you 
more clients!</i></p>
<p><i>Thanks,</i></p>
<p><i>Larry Volz, PhD</i></p>
<hr>
<form method="POST" action="do_nearest_big_city.php">
	
	<p>Please select your name from the list below and then enter the three 
	biggest metro areas near you.  <font color="red">Please enter only the city names UNLESS THE NEARBY CITY IS IN A DIFFERENT STATE:</font></p>
				<?
				
				
			//CREATE SELECT BOX FOR AFFILATE THERAPIST AND THE VALUE IS THEIR ID#
			
			// get includes
			include "../../includes/classes_all_clients.php";
			
			//connect to database and loop through therapists while building select box
			$acIncludes->dbConnect();//connects to db
				
				$desc_table="affiliates";
				$select_box_name="affiliate_id";
				
				$output="<select name = \"".$select_box_name."\">";
				$output .= "<option value = \"0\">Click on Your Name</option>";
			
				//get all descriptions
				$query1 = "SELECT * FROM $desc_table WHERE l_name !='' AND membership_status='Affiliate'ORDER BY 'l_name'";
				$results1 = mysql_query($query1);// or die(mysql_error())
			
					//start looping through descriptions one by one
					while ($descriptions = mysql_fetch_array($results1)){
						  
						  $id = $descriptions['id'];
						  $f_name = $descriptions['f_name'];
						  $l_name = $descriptions['l_name'];
						  $city = $descriptions['address2'];
						  $state = $descriptions['address3'];
						  
							  $output .= "<option value = \"".$id."\"";
							  
					  		
					  $output .=">$l_name, $f_name -- $city, $state</option>";
					  }//end while  
				
				$output .= "</select>";
			  
			
			//echo it
			echo $output;	
		
			?>

	<p>City 1: <input type="text" name="city1" size="47"> </p>
	<p>City 2: <input type="text" name="city2" size="47"> </p>
	<p>City 3: <input type="text" name="city3" size="47"> </p>
	<p><input type="submit" value="Submit" name="B1"></p>
</form>

<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
