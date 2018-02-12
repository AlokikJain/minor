<?php
require_once("pages/layout.php");

// Checking the login status of user
if(empty($_SESSION['id']))
{
	echo "<script>location.href='login.php';</script>";
	exit;
}

// on successful login

//renderPage("pdetails"); not working☻

require("pages/pdetails.php");

?>