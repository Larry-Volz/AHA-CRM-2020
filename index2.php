<?php

//###################### SESSION SECURITY CHECK ########################

session_start();

$auth = $_SESSION[auth];
$permission = $_SESSION[permission];
$f_name=$_SESSION[f_name];

IF ($auth !="ok"){
	$destination = "authenticate.htm";
	}else{
	  $destination=$_SESSION[destination];
	}


//------------------------------ end security check --------------------------


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>AHC Intranet</title>
<!-- <meta name="Microsoft Border" content="r, default"> --><!-- SHARED BORDER -->
</head>
	<frameset framespacing="1" border="1" frameborder="1" rows="111,*">

		<frame name="banner" scrolling="no" noresize src="_borders/top.php">
	
<!-- 1st column small for navigation 2nd column is 100% of what's left' -->
<!-- 2nd frameset of 2 columns fills up the 2nd row -->

		<frameset cols="160,*">
			<frame name="contents" border="1" frameborder="1" noresize src="_borders/left.php">
			<frame name="main" src="<?echo $destination; ?>" scrolling="auto">
		</frameset>
	
		<iframe name="I1" src="right_border_testimonials.php" width="218" height="560" border="0" frameborder="0" scrolling="no">	</iframe>
				</p>
	<noframes>
	
	<body>
		
		
				<table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
				
				<td valign="top">
			
				<p>This page uses frames, but your browser doesnt support them.</p>
			
				</td><td valign="top" width="24"></td><td valign="top" width="1%">
		<p>
		
					
						Your browser does not support inline frames or is currently configured not to display inline frames.
			
			
				</td>
			</tr>
		
	</table>
	</body>
</noframes> 
	
</frameset> 

</html>