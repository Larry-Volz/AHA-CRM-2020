<?php
session_start();
unset($_SESSION['admin']['id']);
unset($_SESSION['admin']['username']);
header("Location: login.php");
?>