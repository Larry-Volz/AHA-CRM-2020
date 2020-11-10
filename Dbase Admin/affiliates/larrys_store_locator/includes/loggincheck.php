<?php
// Start Session
session_start();

// Check to see if an admin session exists
IF(!isset($_SESSION['admin']['id']))
{
	// If a session doesn't exists go to the login page
	header("Location: login.php");
}
?>