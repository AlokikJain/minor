<?php
require_once("pages/layout.php");

// Checking the login status of user
if(empty($_SESSION['id']))
{
	echo "<script>location.href='login.php';</script>";
	exit;
}

/**			NOT WORKING ☻☻☻☻
// on successful login
renderPage("patientDetails");

*/
include("pages/patientDetails.php");
?>