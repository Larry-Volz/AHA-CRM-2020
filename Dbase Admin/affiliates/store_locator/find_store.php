<?php
require_once("includes/config.php");
require_once("includes/global_functions.php");
require_once("includes/class_templates.php");

IF(!defined('IS_INSTALLED'))
{
	header("Location: install.php");
	exit;
}

// Connect to MySQL
db_connect($DBHost,$DBName,$DBUser,$DBPass);

// Check to see if a post/zip code has been sent
IF(!isset($_POST['zip']))
{

	// If no zip/post code entered then display search template
	$page = new HtmlTemplate ('templates/'.$tpl_name.'/search.html');
	
	// Output the page
	$page->CreatePageEcho();
	
}
ELSE
{
	$_POST['zip'] = ereg_replace('[[:punct:]]', '', $_POST['zip']);
	$_POST['zip'] = ereg_replace('[[:space:]]', '', $_POST['zip']);

	// Check which country the Zip/Post code is for
	$country = country_code($_POST['zip']);

	// Include the code relevant to that country
	require_once("includes/code_" . $country . ".php");

}
?>