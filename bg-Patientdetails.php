<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$_SESSION['pname'] = $_POST["name"];
	$_SESSION['pcontact'] = $_POST["contact"];
	
	echo "<script>location.href='prescription.php';</script>";
}